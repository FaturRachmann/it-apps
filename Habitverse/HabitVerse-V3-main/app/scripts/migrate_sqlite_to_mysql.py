# app/scripts/migrate_sqlite_to_mysql.py
"""
One-time data migration from existing SQLite database file to MySQL.

Usage (Windows PowerShell example):

  # 1) Ensure MySQL is running and DATABASE_URL for destination is set
  #    Example: $env:DATABASE_URL = "mysql+pymysql://habitverse:habitverse@localhost:3306/habitverse?charset=utf8mb4"
  # 2) Activate your venv and install requirements
  # 3) Run:
  #    python -m app.scripts.migrate_sqlite_to_mysql --sqlite ./habitverse.db

This script reads using SQLAlchemy ORM models defined in app.db.models, so schema
must be compatible on both sides. It copies rows in parent-first order.
"""

from __future__ import annotations

import argparse
import os
from typing import Iterable, List, Type

from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker

from app.config import settings
from app.db import models as m


def get_engine_and_session(db_url: str):
    engine = create_engine(db_url, pool_pre_ping=True)
    SessionLocal = sessionmaker(bind=engine, autoflush=False, expire_on_commit=False)
    return engine, SessionLocal


def copy_table(src_sess, dst_sess, model: Type[m.Base], chunk_size: int = 500):
    total = 0
    q = src_sess.query(model)
    offset = 0
    while True:
        rows: List[m.Base] = q.offset(offset).limit(chunk_size).all()
        if not rows:
            break
        for row in rows:
            data = {}
            for col in model.__table__.columns:
                data[col.name] = getattr(row, col.name)
            # Create a new instance with the same scalar values
            obj = model(**data)
            dst_sess.add(obj)
        dst_sess.commit()
        total += len(rows)
        offset += len(rows)
        print(f"  -> Copied {total} {model.__tablename__} records...")
    print(f"Done: {model.__tablename__}: {total}")


def main():
    parser = argparse.ArgumentParser(description="Migrate data from SQLite to MySQL")
    parser.add_argument("--sqlite", required=True, help="Path to SQLite .db file (e.g., ./habitverse.db)")
    parser.add_argument(
        "--mysql-url",
        default=settings.DATABASE_URL,
        help="Destination MySQL SQLAlchemy URL (defaults to settings.DATABASE_URL)",
    )
    args = parser.parse_args()

    sqlite_path = args.sqlite
    if not os.path.exists(sqlite_path):
        raise FileNotFoundError(f"SQLite file not found: {sqlite_path}")

    src_url = f"sqlite:///{os.path.abspath(sqlite_path)}"
    dst_url = args.mysql_url

    print(f"Source (SQLite): {src_url}")
    print(f"Destination (MySQL): {dst_url}")

    # Engines and sessions
    src_engine, SrcSession = get_engine_and_session(src_url)
    dst_engine, DstSession = get_engine_and_session(dst_url)

    # Ensure destination schema exists (no-op if exists)
    print("Ensuring destination schema exists...")
    m.Base.metadata.create_all(bind=dst_engine)

    src_sess = SrcSession()
    dst_sess = DstSession()

    try:
        # Parent-first order to satisfy FKs
        parent_first: List[Type[m.Base]] = [
            m.User,
            m.Community,
            m.Badge,
        ]
        then_children: List[Type[m.Base]] = [
            m.Habit,
            m.Reflection,
            m.Challenge,
            m.CommunityMember,
            m.Friendship,
            m.Post,
            m.PostComment,
            m.PostLike,
            m.CommentLike,
            m.Follow,
            m.UserBadge,
            m.ChallengeMember,
            m.HabitLog,
            m.Message,
        ]

        print("Starting copy...")
        for model in parent_first + then_children:
            print(f"Copying table: {model.__tablename__}")
            copy_table(src_sess, dst_sess, model)

        print("Migration complete.")
    finally:
        src_sess.close()
        dst_sess.close()


if __name__ == "__main__":
    main()
