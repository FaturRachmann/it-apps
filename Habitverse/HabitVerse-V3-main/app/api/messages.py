# app/api/messages.py
from datetime import datetime, timezone
from typing import List, Optional
from uuid import UUID

from fastapi import APIRouter, Depends, HTTPException, Query
from pydantic import BaseModel, constr, Field
from sqlalchemy.orm import Session
from sqlalchemy import or_, and_

from app.core.database import get_db
from app.core.security import get_current_user
from app.db.models import User, Message, Friendship
from app.ws import notify_message_created, notify_messages_read

router = APIRouter()


def _are_friends(db: Session, user_a: UUID, user_b: UUID) -> bool:
    friendship = db.query(Friendship).filter(
        or_(
            and_(Friendship.requester_id == user_a, Friendship.addressee_id == user_b),
            and_(Friendship.requester_id == user_b, Friendship.addressee_id == user_a),
        ),
        Friendship.status == "accepted",
    ).first()
    return friendship is not None


def _parse_iso_naive_utc(ts: str) -> datetime:
    """Parse an ISO timestamp string into a naive UTC datetime.
    - Accepts trailing 'Z' (JS toISOString) by converting to '+00:00'
    - If timezone-aware, convert to UTC and drop tzinfo to match DB naive timestamps
    """
    s = ts
    if s.endswith("Z"):
        s = s[:-1] + "+00:00"
    dt = datetime.fromisoformat(s)
    if dt.tzinfo is not None:
        dt = dt.astimezone(timezone.utc).replace(tzinfo=None)
    return dt


class MessageCreate(BaseModel):
    to: UUID
    content: constr(min_length=1, max_length=4000)


class MarkReadInput(BaseModel):
    # 'with' is reserved in Python; map JSON key 'with' -> other_user_id
    other_user_id: UUID = Field(alias="with")
    before: Optional[str] = None

    class Config:
        allow_population_by_field_name = True

@router.get("/messages/with/{other_user_id}")
def get_conversation(
    other_user_id: UUID,
    limit: int = Query(50, ge=1, le=200),
    before: Optional[str] = Query(None, description="ISO timestamp to paginate older messages"),
    db: Session = Depends(get_db),
    current_user: User = Depends(get_current_user),
):
    """Fetch recent direct messages between current user and other_user_id, most recent first."""
    # Validate other user
    other = db.query(User).filter(User.id == other_user_id).first()
    if not other:
        raise HTTPException(status_code=404, detail="User not found")

    # Optional: ensure they are friends (can relax if you want open DMs)
    if not _are_friends(db, current_user.id, other_user_id):
        raise HTTPException(status_code=403, detail="You can only message friends")

    q = db.query(Message).filter(
        or_(
            and_(Message.sender_id == current_user.id, Message.recipient_id == other_user_id),
            and_(Message.sender_id == other_user_id, Message.recipient_id == current_user.id),
        )
    )

    if before:
        try:
            before_dt = _parse_iso_naive_utc(before)
            q = q.filter(Message.created_at < before_dt)
        except Exception:
            raise HTTPException(status_code=400, detail="Invalid 'before' timestamp")

    items = q.order_by(Message.created_at.desc()).limit(limit).all()

    return [
        {
            "id": str(m.id),
            "sender_id": str(m.sender_id),
            "recipient_id": str(m.recipient_id),
            "content": m.content,
            "created_at": m.created_at.isoformat(),
            "read_at": m.read_at.isoformat() if m.read_at else None,
        }
        for m in items
    ]


@router.get("/messages/unread/with/{other_user_id}")
def get_unread_count(
    other_user_id: UUID,
    db: Session = Depends(get_db),
    current_user: User = Depends(get_current_user),
):
    """Return count of unread messages from other_user -> current_user."""
    # Validate other user
    other = db.query(User).filter(User.id == other_user_id).first()
    if not other:
        raise HTTPException(status_code=404, detail="User not found")

    if not _are_friends(db, current_user.id, other_user_id):
        raise HTTPException(status_code=403, detail="You can only query unread with friends")

    count = (
        db.query(Message)
        .filter(
            Message.sender_id == other_user_id,
            Message.recipient_id == current_user.id,
            Message.read_at.is_(None),
        )
        .count()
    )
    return {"count": count}


@router.post("/messages/send")
async def send_message(
    to: Optional[UUID] = None,
    content: Optional[str] = Query(None, min_length=1, max_length=4000),
    payload: Optional[MessageCreate] = None,
    db: Session = Depends(get_db),
    current_user: User = Depends(get_current_user),
):
    """Send a direct message to a user."""
    # Prefer JSON body if provided; fallback to query parameters for backward compatibility
    target_to: Optional[UUID] = payload.to if payload and getattr(payload, "to", None) is not None else to
    target_content: Optional[str] = (
        payload.content if payload and getattr(payload, "content", None) is not None else content
    )

    if target_to is None or target_content is None:
        raise HTTPException(status_code=422, detail="'to' and 'content' are required")

    if target_to == current_user.id:
        raise HTTPException(status_code=400, detail="Cannot send message to yourself")

    # Validate target user
    recipient = db.query(User).filter(User.id == target_to).first()
    if not recipient:
        raise HTTPException(status_code=404, detail="Recipient not found")

    # Optional: ensure they are friends
    if not _are_friends(db, current_user.id, target_to):
        raise HTTPException(status_code=403, detail="You can only message friends")

    msg = Message(sender_id=current_user.id, recipient_id=target_to, content=target_content.strip())
    db.add(msg)
    db.commit()
    db.refresh(msg)

    payload_out = {
        "id": str(msg.id),
        "sender_id": str(msg.sender_id),
        "recipient_id": str(msg.recipient_id),
        "content": msg.content,
        "created_at": msg.created_at.isoformat(),
    }

    # Realtime notify both parties
    try:
        await notify_message_created(msg.sender_id, msg.recipient_id, payload_out)
    except Exception:
        pass

    return payload_out


@router.post("/messages/read")
async def mark_messages_read(
    payload: MarkReadInput,
    db: Session = Depends(get_db),
    current_user: User = Depends(get_current_user),
):
    """Mark messages from other_user -> current_user as read (set read_at)."""
    # Validate other user exists
    other = db.query(User).filter(User.id == payload.other_user_id).first()
    if not other:
        raise HTTPException(status_code=404, detail="User not found")

    # Optional: ensure they are friends before marking
    if not _are_friends(db, current_user.id, payload.other_user_id):
        raise HTTPException(status_code=403, detail="You can only mark messages with friends")

    q = db.query(Message).filter(
        Message.sender_id == payload.other_user_id,
        Message.recipient_id == current_user.id,
        Message.read_at.is_(None),
    )

    if payload.before:
        try:
            before_dt = _parse_iso_naive_utc(payload.before)
            q = q.filter(Message.created_at <= before_dt)
        except Exception:
            raise HTTPException(status_code=400, detail="Invalid 'before' timestamp")

    updated = q.update({Message.read_at: datetime.utcnow()}, synchronize_session=False)
    db.commit()

    # Notify both parties for UI sync
    try:
        await notify_messages_read(current_user.id, payload.other_user_id, payload.before, updated)
    except Exception:
        pass

    return {"updated": updated}
