# app/ws.py
from __future__ import annotations
from typing import Dict, Set, Any, List
from uuid import UUID

from fastapi import APIRouter, WebSocket, WebSocketDisconnect
from fastapi.websockets import WebSocketState
from sqlalchemy.orm import Session

from app.core.database import get_db
from app.core.security import verify_token
from app.db.models import User

router = APIRouter()


class ConnectionManager:
    def __init__(self):
        # user_id -> set of websockets
        self.active: Dict[UUID, Set[WebSocket]] = {}

    async def connect(self, user_id: UUID, websocket: WebSocket):
        await websocket.accept()
        self.active.setdefault(user_id, set()).add(websocket)

    def disconnect(self, user_id: UUID, websocket: WebSocket):
        try:
            conns = self.active.get(user_id)
            if conns and websocket in conns:
                conns.remove(websocket)
                if not conns:
                    self.active.pop(user_id, None)
        except Exception:
            pass

    async def send_to_user(self, user_id: UUID, message: Any):
        conns = list(self.active.get(user_id, set()))
        for ws in conns:
            if ws.application_state == WebSocketState.CONNECTED:
                try:
                    await ws.send_json(message)
                except Exception:
                    # Best-effort cleanup
                    self.disconnect(user_id, ws)

    async def send_to_users(self, user_ids: List[UUID], message: Any):
        for uid in set(user_ids):
            await self.send_to_user(uid, message)


manager = ConnectionManager()


def _get_user_from_ws(websocket: WebSocket, db: Session) -> User | None:
    # Auth via HTTP-only cookie 'access_token'
    token = None
    try:
        # FastAPI exposes headers & cookies on websocket via .cookies
        token = websocket.cookies.get("access_token")
    except Exception:
        token = None
    if not token:
        return None
    email = verify_token(token)
    if not email:
        return None
    user = db.query(User).filter(User.email == email).first()
    return user


@router.websocket("/ws/dm")
async def ws_dm(websocket: WebSocket):
    # Open a DB session manually for auth only
    db: Session = next(get_db())
    try:
        user = _get_user_from_ws(websocket, db)
        if not user:
            await websocket.close(code=4401)  # Unauthorized
            return
        await manager.connect(user.id, websocket)
        # Send ready event with my user id for the client to know 'me'
        await websocket.send_json({"type": "ready", "user_id": str(user.id)})

        # Listen for client-side events (typing, pings, etc.)
        while True:
            try:
                data = await websocket.receive_json()
            except WebSocketDisconnect:
                break
            except Exception:
                # If non-JSON, ignore
                try:
                    _ = await websocket.receive_text()
                    continue
                except WebSocketDisconnect:
                    break
                except Exception:
                    continue

            # Minimal protocol: handle optional typing events
            if not isinstance(data, dict):
                continue
            etype = data.get("type")
            if etype == "ping":
                await websocket.send_json({"type": "pong"})
            elif etype in ("typing_start", "typing_stop"):
                other_id = data.get("to")
                if other_id:
                    try:
                        target = UUID(str(other_id))
                    except Exception:
                        target = None
                    if target:
                        try:
                            await manager.send_to_user(target, {"type": etype, "from": str(user.id)})
                        except Exception:
                            pass

    finally:
        try:
            if 'user' in locals() and user:
                manager.disconnect(user.id, websocket)
        except Exception:
            pass
        try:
            db.close()
        except Exception:
            pass


# Helper functions to be used by API endpoints
async def notify_message_created(sender_id: UUID, recipient_id: UUID, message_payload: dict):
    event = {"type": "message_created", "message": message_payload}
    await manager.send_to_users([sender_id, recipient_id], event)


async def notify_messages_read(reader_id: UUID, other_user_id: UUID, before_iso: str | None, updated: int):
    event = {
        "type": "messages_read",
        "from": str(reader_id),
        "to": str(other_user_id),
        "before": before_iso,
        "count": updated,
    }
    # Notify the other party (other_user_id) and the reader (for UI sync)
    await manager.send_to_users([reader_id, other_user_id], event)
