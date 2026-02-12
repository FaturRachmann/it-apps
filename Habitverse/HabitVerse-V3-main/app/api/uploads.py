from fastapi import APIRouter, UploadFile, File, HTTPException
from fastapi.responses import JSONResponse
import os
import uuid
from typing import Optional

router = APIRouter()

UPLOAD_DIR = os.path.join("app", "static", "uploads")
os.makedirs(UPLOAD_DIR, exist_ok=True)


def _safe_ext(filename: str) -> str:
    base, ext = os.path.splitext(filename)
    ext = ext.lower()
    # allow only common image extensions
    if ext in {".png", ".jpg", ".jpeg", ".gif", ".webp"}:
        return ext
    return ""

MAX_SIZE = 2 * 1024 * 1024  # 2 MB

async def _write_with_limit(dest_path: str, upload: UploadFile, *, max_size: int = MAX_SIZE):
    total = 0
    try:
        with open(dest_path, "wb") as out:
            while True:
                chunk = await upload.read(1024 * 1024)
                if not chunk:
                    break
                total += len(chunk)
                if total > max_size:
                    # stop and cleanup
                    out.close()
                    try:
                        os.remove(dest_path)
                    except Exception:
                        pass
                    raise HTTPException(status_code=413, detail="File terlalu besar. Maksimal 2MB")
                out.write(chunk)
    finally:
        await upload.close()


@router.post("/uploads/image")
async def upload_image(file: UploadFile = File(...)):
    # basic validation
    content_type = (file.content_type or "").lower()
    if not content_type.startswith("image/"):
        raise HTTPException(status_code=400, detail="File harus berupa gambar")

    ext = _safe_ext(file.filename or "")
    if not ext:
        # Fall back from content-type if filename doesn't have safe ext
        guessed = {
            "image/png": ".png",
            "image/jpeg": ".jpg",
            "image/jpg": ".jpg",
            "image/gif": ".gif",
            "image/webp": ".webp",
        }.get(content_type, "")
        if not guessed:
            raise HTTPException(status_code=400, detail="Ekstensi gambar tidak didukung")
        ext = guessed

    fname = f"{uuid.uuid4().hex}{ext}"
    path = os.path.join(UPLOAD_DIR, fname)

    await _write_with_limit(path, file, max_size=MAX_SIZE)

    url = f"/static/uploads/{fname}"
    return JSONResponse({"url": url})


ALLOWED_FILE_EXTS = {
    ".png", ".jpg", ".jpeg", ".gif", ".webp",
    ".pdf", ".txt", ".zip", ".doc", ".docx", ".xls", ".xlsx", ".ppt", ".pptx"
}

def _safe_file_ext(filename: str) -> str:
    base, ext = os.path.splitext(filename or "")
    ext = ext.lower()
    return ext if ext in ALLOWED_FILE_EXTS else ""


@router.post("/uploads/file")
async def upload_file(file: UploadFile = File(...)):
    ext = _safe_file_ext(file.filename)
    if not ext:
        raise HTTPException(status_code=400, detail="Tipe file tidak didukung")

    fname = f"{uuid.uuid4().hex}{ext}"
    path = os.path.join(UPLOAD_DIR, fname)

    await _write_with_limit(path, file, max_size=MAX_SIZE)

    url = f"/static/uploads/{fname}"
    return JSONResponse({"url": url, "name": file.filename})
