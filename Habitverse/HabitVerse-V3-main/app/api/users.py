# app/api/users.py
from fastapi import APIRouter, Depends, HTTPException
from sqlalchemy.orm import Session
from sqlalchemy import or_, and_

from app.core.database import get_db
from app.core.security import get_current_user
from app.db.models import User, Friendship

router = APIRouter()

def _are_friends(db: Session, user_a, user_b) -> bool:
    return db.query(Friendship).filter(
        or_(
            and_(Friendship.requester_id == user_a, Friendship.addressee_id == user_b),
            and_(Friendship.requester_id == user_b, Friendship.addressee_id == user_a),
        ),
        Friendship.status == "accepted",
    ).first() is not None


@router.get("/users/{user_id}")
async def get_user(user_id: str, db: Session = Depends(get_db), current_user: User = Depends(get_current_user)):
    user = db.query(User).filter(User.id == user_id).first()
    if not user:
        raise HTTPException(status_code=404, detail="User not found")
    include_email = (current_user.id == user.id) or _are_friends(db, current_user.id, user.id)
    data = {
        "id": str(user.id),
        "name": user.name,
        "avatar_url": user.avatar_url,
        "profile": user.profile,
        "level": user.level,
        "xp": user.xp,
    }
    if include_email:
        data["email"] = user.email
    return data
