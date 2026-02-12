# app/routes/dm.py
from fastapi import APIRouter, Depends, Request
from fastapi.responses import HTMLResponse
from sqlalchemy.orm import Session

from app.core.database import get_db
from app.core.security import get_current_user
from app.db.models import User

router = APIRouter()


def page_shell(title: str, body: str) -> str:
    return f"""
    <!doctype html>
    <html lang=\"en\">
    <head>
      <meta charset=\"utf-8\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
      <title>{title} • HabitVerse</title>
      <script src=\"https://cdn.tailwindcss.com\"></script>
      <style>
        html,body{{font-family:ui-sans-serif,system-ui,Segoe UI,Roboto,Helvetica,Arial}}
        .glass{{background:rgba(255,255,255,.6);backdrop-filter:blur(12px);border:1px solid rgba(15,23,42,.06)}}
        .btn-primary{{background-image:linear-gradient(135deg,#6366F1,#A855F7); color:#fff}}
      </style>
    </head>
    <body class=\"bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 text-slate-800 min-h-screen\">\n
      <header class=\"glass sticky top-0 z-30\">\n        <div class=\"max-w-5xl mx-auto px-4 py-4 flex items-center justify-between\">\n          <a href=\"/dashboard\" class=\"font-semibold text-indigo-600\">HabitVerse</a>\n          <div class=\"text-sm text-slate-600\">Direct Messages</div>\n        </div>\n      </header>\n
      <main class=\"max-w-5xl mx-auto px-4 py-6 sm:py-8 pb-24\">{body}</main>\n
      <!-- Mobile bottom nav -->\n      <nav class=\"sm:hidden fixed bottom-0 inset-x-0 bg-white/80 backdrop-blur border-t border-slate-200/60 shadow-lg\">\n        <div class=\"max-w-5xl mx-auto grid grid-cols-5\">\n          <a href=\"/dashboard\" class=\"flex flex-col items-center justify-center py-3 text-[11px] text-slate-700\">Home</a>\n          <a href=\"/habits\" class=\"flex flex-col items-center justify-center py-3 text-[11px] text-slate-700\">Habits</a>\n          <a href=\"/community\" class=\"flex flex-col items-center justify-center py-3 text-[11px] text-slate-700\">Community</a>\n          <a href=\"/coach\" class=\"flex flex-col items-center justify-center py-3 text-[11px] text-slate-700\">Coach</a>\n          <a href=\"/profile\" class=\"flex flex-col items-center justify-center py-3 text-[11px] text-slate-700\">Profile</a>\n        </div>\n      </nav>\n    </body>\n    </html>
    """


@router.get("/dm", response_class=HTMLResponse)
async def dm_home(
    request: Request,
    current_user: User = Depends(get_current_user),
    db: Session = Depends(get_db),
):
    body = """
    <div class=\"grid gap-4 md:grid-cols-3\">\n      <!-- Sidebar: Friends + Search -->\n      <aside class=\"md:col-span-1 space-y-3\">\n        <div class=\"flex items-center justify-between\">\n          <h2 class=\"text-lg font-semibold\">Chats</h2>\n          <a href=\"/friends\" class=\"text-sm text-indigo-600 hover:text-indigo-700\">Find friends</a>\n        </div>\n        <div>\n          <input id=\"dm-search\" class=\"w-full border rounded-lg px-3 py-2\" placeholder=\"Search users...\" />\n        </div>\n        <div id=\"dm-search-results\" class=\"rounded-2xl glass divide-y hidden\"></div>\n        <div class=\"text-sm text-slate-500\">Your friends</div>\n        <div id=\"dm-friends\" class=\"rounded-2xl glass divide-y\">\n          <div class=\"p-3 text-sm text-slate-500\">Loading friends...</div>\n        </div>\n      </aside>\n
      <!-- Messages area -->\n      <section class=\"md:col-span-2 rounded-2xl glass p-4 flex flex-col h-[60vh]\">\n        <div id=\"dm-header\" class=\"pb-3 border-b mb-3 hidden\"></div>\n        <div id=\"dm-messages\" class=\"flex-1 overflow-auto space-y-2\">\n          <div class=\"text-center text-sm text-slate-500 my-4\">Start a conversation. Group chats and 1:1 will be supported.</div>\n        </div>\n        <div class=\"mt-3 flex items-center gap-2\">\n          <button id=\"dm-emoji-btn\" title=\"Emoji\" class=\"px-2 py-2 rounded-lg border bg-white/80\">😊</button>\n          <div class=\"relative\">\n            <button id=\"dm-attach-btn\" title=\"Attach\" class=\"px-2 py-2 rounded-lg border bg-white/80\">📎</button>\n            <input id=\"dm-file\" type=\"file\" class=\"hidden\" accept=\".png,.jpg,.jpeg,.gif,.webp,.pdf,.txt,.zip,.doc,.docx,.xls,.xlsx,.ppt,.pptx\" />\n          </div>\n          <input id=\"dm-input\" class=\"flex-1 border rounded-lg px-3 py-2\" placeholder=\"Type a message...\" disabled />\n          <button id=\"dm-send\" class=\"px-4 py-2 rounded-lg btn-primary opacity-60 cursor-not-allowed\" disabled>Send</button>\n        </div>\n        <div id=\"dm-emoji-picker\" class=\"mt-2 p-2 border rounded-lg bg-white/90 hidden max-w-sm\"></div>\n      </section>\n    </div>
    <script>
      const qs = (k)=> new URLSearchParams(location.search).get(k);

      async function loadFriends(){
        try{
          const res = await fetch('/api/friends', { credentials:'include' });
          const wrap = document.getElementById('dm-friends');
          if(!res.ok){ wrap.innerHTML = '<div class="p-3 text-sm text-red-600">Failed to load friends</div>'; return; }
          const friends = await res.json();
          if(!friends.length){ wrap.innerHTML = '<div class="p-3 text-sm text-slate-500">No friends yet. Go add some!</div>'; return; }
          wrap.innerHTML = friends.map(f=>`
            <a class="flex items-center gap-3 p-3 hover:bg-white/70" href="/dm?to=${f.id}" data-friend-id="${f.id}">
              ${f.avatar_url ? `<img src="${f.avatar_url}" class="w-8 h-8 rounded-full object-cover"/>` : `<div class=\"w-8 h-8 rounded-full bg-indigo-200 flex items-center justify-center text-xs text-indigo-800\">${(f.name||'?').slice(0,1).toUpperCase()}</div>`}
              <div class="flex-1 min-w-0">
                <div id="friend-name-${f.id}" class="text-sm font-medium truncate">${f.name}</div>
                <div class="text-xs text-slate-500">Level ${f.level} • ${f.xp} XP</div>
              </div>
              <span id="friend-unread-${f.id}" class="ml-2 inline-flex items-center justify-center rounded-full bg-indigo-600 text-white text-[10px] px-2 py-0.5 hidden"></span>
            </a>
          `).join('');
          // fetch unread counts per friend and update UI
          for(const f of friends){
            try{
              const r = await fetch(`/api/messages/unread/with/${f.id}`, { credentials:'include' });
              if(!r.ok) continue;
              const { count } = await r.json();
              const badge = document.getElementById(`friend-unread-${f.id}`);
              const name = document.getElementById(`friend-name-${f.id}`);
              if(!badge || !name) continue;
              if(count > 0){
                badge.textContent = count > 99 ? '99+' : String(count);
                badge.classList.remove('hidden');
                name.classList.add('font-semibold');
              }else{
                badge.classList.add('hidden');
                name.classList.remove('font-semibold');
              }
            }catch(_){ /* ignore per friend errors */ }
          }
          // intercept clicks to switch threads without full reload and clear unread immediately
          wrap.addEventListener('click', (ev)=>{
            const a = ev.target.closest('a[data-friend-id]');
            if(!a) return;
            ev.preventDefault();
            const id = a.getAttribute('data-friend-id');
            // clear badge + bold instantly
            const badge = document.getElementById(`friend-unread-${id}`);
            const name = document.getElementById(`friend-name-${id}`);
            if(badge) badge.classList.add('hidden');
            if(name) name.classList.remove('font-semibold');
            // immediately mark as read on server up to now to avoid badge reappearing later
            try{
              fetch('/api/messages/read', {
                method: 'POST',
                credentials: 'include',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ with: id, before: new Date().toISOString() })
              }).catch(()=>{});
            }catch(_){ }
            // update URL and load target
            const url = new URL(location.href);
            url.searchParams.set('to', id);
            history.pushState({}, '', url.toString());
            loadTarget();
          }, { once: false });
        }catch(e){
          document.getElementById('dm-friends').innerHTML = '<div class="p-3 text-sm text-red-600">Error loading friends</div>';
        }
      }

      // Live search users with AbortController
      let searchTimer;
      let searchController;
      document.getElementById('dm-search').addEventListener('input',(e)=>{
        clearTimeout(searchTimer);
        const q = e.target.value.trim();
        const box = document.getElementById('dm-search-results');
        if(q.length < 2){ box.classList.add('hidden'); box.innerHTML=''; return; }
        searchTimer = setTimeout(async()=>{
          try{
            if (searchController) { try { searchController.abort(); } catch(_){} }
            searchController = new AbortController();
            const res = await fetch(`/api/users/search?q=${encodeURIComponent(q)}`, { credentials:'include', signal: searchController.signal });
            if(!res.ok){ box.classList.remove('hidden'); box.innerHTML='<div class="p-3 text-sm text-red-600">Search failed</div>'; return; }
            const users = await res.json();
            if(!users.length){ box.classList.remove('hidden'); box.innerHTML='<div class="p-3 text-sm text-slate-500">No users found</div>'; return; }
            box.classList.remove('hidden');
            box.innerHTML = users.map(u=>`
              <div class="p-3 hover:bg-white/70 flex items-center justify-between">
                <a href="/u/${u.id}" class="flex items-center gap-3 group">
                  ${u.avatar_url ? `<img src="${u.avatar_url}" class="w-8 h-8 rounded-full object-cover"/>` : `<div class=\"w-8 h-8 rounded-full bg-indigo-200 flex items-center justify-center text-xs text-indigo-800\">${(u.name||'?').slice(0,1).toUpperCase()}</div>`}
                  <div>
                    <div class="text-sm font-medium group-hover:underline">${u.name}</div>
                    <div class="text-xs text-slate-500">Level ${u.level} • ${u.xp} XP</div>
                  </div>
                </a>
                <a href="/dm?to=${u.id}" class="text-xs text-indigo-600 hover:text-indigo-700">Message</a>
              </div>
            `).join('');
          }catch(e){ box.classList.remove('hidden'); box.innerHTML='<div class="p-3 text-sm text-red-600">Search error</div>'; }
        }, 300);
      });

      async function loadTarget(){
        const to = qs('to');
        const header = document.getElementById('dm-header');
        if(!to){ header.classList.add('hidden'); return; }
        // Immediately clear sidebar badge for active thread and mark server-side up to now
        try{
          const badge = document.getElementById(`friend-unread-${to}`);
          const name = document.getElementById(`friend-name-${to}`);
          if(badge) badge.classList.add('hidden');
          if(name) name.classList.remove('font-semibold');
          fetch('/api/messages/read', {
            method: 'POST',
            credentials: 'include',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ with: to, before: new Date().toISOString() })
          }).catch(()=>{});
        }catch(_){ }
        try{
          const res = await fetch(`/api/users/${to}`, { credentials:'include' });
          if(!res.ok){ header.classList.remove('hidden'); header.innerHTML = '<div class="text-sm text-red-600">User not found</div>'; return; }
          const u = await res.json();
          header.classList.remove('hidden');
          header.innerHTML = `
            <div class="flex items-center justify-between">
              <a href="/u/${u.id}" class="flex items-center gap-3 group">
                ${u.avatar_url ? `<img src="${u.avatar_url}" class="w-9 h-9 rounded-full object-cover"/>` : `<div class=\"w-9 h-9 rounded-full bg-indigo-200 flex items-center justify-center text-xs text-indigo-800\">${(u.name||'?').slice(0,1).toUpperCase()}</div>`}
                <div>
                  <div class="text-sm font-medium group-hover:underline">${u.name}</div>
                  <div class="text-xs text-slate-500">Level ${u.level} • ${u.xp} XP</div>
                </div>
              </a>
              <a href="/friends" class="text-xs text-slate-500 hover:text-slate-700">Manage</a>
            </div>
            <div id="dm-typing" class="text-xs text-slate-500 mt-1 hidden">Typing...</div>
          `;
          enableMessaging(u);
        }catch(e){ header.classList.remove('hidden'); header.innerHTML = '<div class="text-sm text-red-600">Failed to load user</div>'; }
      }

      function renderMessages(list, currentUserId){
        const wrap = document.getElementById('dm-messages');
        if(!list.length){ wrap.innerHTML = '<div class="text-center text-sm text-slate-500 my-4">No messages yet. Say hi! 👋</div>'; return; }
        const escapeHTML = (s)=> String(s)
          .replaceAll('&','&amp;')
          .replaceAll('<','&lt;')
          .replaceAll('>','&gt;')
          .replaceAll('"','&quot;')
          .replaceAll("'",'&#39;');
        const escapeAttr = (s)=> String(s)
          .replaceAll('&','&amp;')
          .replaceAll('"','&quot;')
          .replaceAll("'",'&#39;')
          .replaceAll('<','&lt;')
          .replaceAll('>','&gt;');
        const URL_RE = /(https?:\/\/[^\s]+)/g;
        const isImageUrl = (u)=> /\.(png|jpg|jpeg|gif|webp)(\?|#|$)/i.test(u);
        const isUploadPath = (u)=> typeof u === 'string' && u.startsWith('/static/uploads/');
        function renderContent(text){
          // Special case: structured file message
          try{
            const obj = JSON.parse(text);
            if (obj && obj.type === 'file' && obj.url){
              const name = escapeHTML(obj.name || obj.url.split('/').pop());
              const safeUrl = escapeAttr(obj.url);
              return `
                <div class="flex items-center gap-2 p-2 rounded-md border bg-white/70 text-slate-700 ${' '}">
                  <span>📎</span>
                  <a href="${safeUrl}" target="_blank" rel="noopener" class="underline decoration-indigo-400 break-all">${name}</a>
                </div>
              `;
            }
          }catch(_){ /* not JSON - fallthrough */ }

          const parts = String(text).split(URL_RE);
          let out = '';
          for(let i=0;i<parts.length;i++){
            const part = parts[i];
            if(!part) continue;
            if (part.startsWith('http://') || part.startsWith('https://') || isUploadPath(part)){
              const url = part;
              if(isImageUrl(url)){
                const safe = escapeAttr(url);
                const name = escapeHTML(url.split('/').pop());
                out += `
                  <div class="mt-1">
                    <img src="${safe}" class="max-h-64 rounded-md border" onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden')"/>
                    <a href="${safe}" target="_blank" rel="noopener" class="hidden underline decoration-indigo-400 break-all">${name}</a>
                  </div>
                `;
              }else{
                out += `<a href="${escapeAttr(url)}" target="_blank" rel="noopener" class="underline decoration-indigo-400 break-all">${escapeHTML(url)}</a>`;
              }
            }else{
              out += escapeHTML(part);
            }
          }
          return out;
        }
        wrap.innerHTML = list
          .map(m=>{
            const mine = m.sender_id === currentUserId;
            const html = renderContent(m.content);
            const seen = mine && m.read_at ? '<span class="ml-2 text-[10px] opacity-70">Seen</span>' : '';
            const unreadIncoming = !mine && !m.read_at;
            return `
              <div class="flex ${mine ? 'justify-end' : 'justify-start'}">
                <div class="max-w-[75%] px-3 py-2 rounded-xl text-sm ${mine ? 'bg-indigo-600 text-white' : 'bg-white/80 border'}">
                  <div class="prose prose-sm max-w-none ${unreadIncoming ? 'font-semibold' : ''}">${html}</div>
                  <div class="text-[10px] opacity-70 mt-1">${new Date(m.created_at).toLocaleTimeString()}${seen}</div>
                </div>
              </div>
            `;
          }).join('');
        wrap.scrollTop = wrap.scrollHeight;
      }

      const lastReadMark = {};
      const messageCache = {}; // { [otherId]: { items: oldestFirst[], oldest: isoString|null } }
      const loadingOlder = {};
      let ws = null;
      let wsConnected = false;
      let wsMe = null; // current user id from WS ready event
      let pollIntervalId = null;

      async function loadMessagesLoop(otherId){
        try{
          const res = await fetch(`/api/messages/with/${otherId}`, { credentials:'include' });
          if(!res.ok) return;
          const items = await res.json();
          // current user id is not exposed here; infer from sender/recipient by finding a friend anchor selected is not ideal.
          // Simpler approach: we request /api/users/${otherId} above; use a crude way to infer: pick any message and if sender != otherId -> that's me.
          let me = null;
          if(items.length){
            const any = items[0];
            me = (any.sender_id === otherId) ? any.recipient_id : any.sender_id;
          }
          // API returns most recent first, convert to oldest-first for UI
          const oldestFirst = items.slice().reverse();
          messageCache[otherId] = {
            items: oldestFirst,
            oldest: oldestFirst.length ? oldestFirst[0].created_at : null,
            me
          };
          renderMessages(messageCache[otherId].items, messageCache[otherId].me);

          // mark as read up to the newest message timestamp to reduce repeats
          const latest = items.length ? items.reduce((mx, m)=> (mx && new Date(mx) > new Date(m.created_at)) ? mx : m.created_at, null) : null;
          if(latest && lastReadMark[otherId] !== latest){
            lastReadMark[otherId] = latest;
            try{
              const resp = await fetch('/api/messages/read', {
                method: 'POST',
                credentials: 'include',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ with: otherId, before: latest })
              });
              if(resp.ok){
                // Optimistically mark incoming messages up to latest as read to remove bold
                const state = messageCache[otherId];
                if(state && state.items){
                  const cutoff = new Date(latest);
                  let changed = false;
                  for(const m of state.items){
                    const incoming = m.sender_id === otherId && m.recipient_id === state.me;
                    if(incoming && !m.read_at && new Date(m.created_at) <= cutoff){
                      m.read_at = new Date().toISOString();
                      changed = true;
                    }
                  }
                  if(changed){ renderMessages(state.items, state.me); }
                }
                // Reset unread badge for this friend thread (now viewed)
                const badge = document.getElementById(`friend-unread-${otherId}`);
                const name = document.getElementById(`friend-name-${otherId}`);
                if(badge && name){
                  badge.classList.add('hidden');
                  name.classList.remove('font-semibold');
                }
              }
            } catch(_){ }
          }
        }catch(e){ /* ignore */ }
      }

      async function loadOlderMessages(otherId){
        if(loadingOlder[otherId]) return;
        const state = messageCache[otherId];
        if(!state || !state.oldest) return;
        loadingOlder[otherId] = true;
        const wrap = document.getElementById('dm-messages');
        const prevHeight = wrap.scrollHeight;
        try{
          const res = await fetch(`/api/messages/with/${otherId}?before=${encodeURIComponent(state.oldest)}&limit=50`, { credentials: 'include' });
          if(!res.ok) return;
          const newerFirst = await res.json();
          if(!newerFirst.length) return; // no more
          const olderChunk = newerFirst.slice().reverse(); // to oldest-first
          state.items = olderChunk.concat(state.items);
          state.oldest = state.items[0].created_at;
          renderMessages(state.items, state.me);
          // maintain scroll position after prepending
          wrap.scrollTop = wrap.scrollHeight - prevHeight;
        } finally {
          loadingOlder[otherId] = false;
        }
      }

      function enableMessaging(user){
        const input = document.getElementById('dm-input');
        const btn = document.getElementById('dm-send');
        const emojiBtn = document.getElementById('dm-emoji-btn');
        const emojiPicker = document.getElementById('dm-emoji-picker');
        const attachBtn = document.getElementById('dm-attach-btn');
        const fileInput = document.getElementById('dm-file');
        input.disabled = false;
        btn.disabled = false;
        btn.classList.remove('opacity-60','cursor-not-allowed');

        // establish WS connection once
        function ensureWebSocket(){
          if(ws && wsConnected) return;
          try{
            const proto = location.protocol === 'https:' ? 'wss' : 'ws';
            ws = new WebSocket(`${proto}://${location.host}/ws/dm`);

            ws.addEventListener('open', ()=>{
              wsConnected = true;
              // stop polling when connected
              if(pollIntervalId){ clearInterval(pollIntervalId); pollIntervalId = null; }
            });

            ws.addEventListener('message', (ev)=>{
              try{
                const data = JSON.parse(ev.data);
                if(data.type === 'ready'){
                  wsMe = data.user_id;
                  return;
                }
                if(data.type === 'typing_start' || data.type === 'typing_stop'){
                  const fromId = data.from;
                  const to = qs('to');
                  if(!to || to !== fromId) return;
                  const el = document.getElementById('dm-typing');
                  if(!el) return;
                  if(data.type === 'typing_start') el.classList.remove('hidden');
                  else el.classList.add('hidden');
                  return;
                }
                if(data.type === 'message_created'){
                  const m = data.message;
                  const otherId = (m.sender_id === wsMe) ? m.recipient_id : m.sender_id;
                  // if current view matches, upsert and render
                  const to = qs('to');
                  // init cache if missing
                  if(!messageCache[otherId]){
                    messageCache[otherId] = { items: [], oldest: null, me: wsMe };
                  }
                  if(to === otherId){
                    // ensure not duplicated
                    const exists = messageCache[otherId].items.some(x=> x.id === m.id);
                    if(!exists){
                      // items are oldest-first; append at end if newer
                      messageCache[otherId].items.push(m);
                      // update oldest if needed
                      messageCache[otherId].oldest = messageCache[otherId].items.length ? messageCache[otherId].items[0].created_at : null;
                      renderMessages(messageCache[otherId].items, wsMe);
                      const wrap = document.getElementById('dm-messages');
                      wrap.scrollTop = wrap.scrollHeight;
                    }
                  }
                  // if it's an incoming message and not currently viewing this chat, bump unread badge
                  if(m.sender_id !== wsMe && to !== otherId){
                    const badge = document.getElementById(`friend-unread-${otherId}`);
                    const name = document.getElementById(`friend-name-${otherId}`);
                    if(badge && name){
                      const current = parseInt(badge.textContent || '0', 10) || 0;
                      const next = Math.min(current + 1, 999);
                      badge.textContent = next > 99 ? '99+' : String(next);
                      badge.classList.remove('hidden');
                      name.classList.add('font-semibold');
                    }
                  }
                  return;
                }
                if(data.type === 'messages_read'){
                  // Update sender-side seen state: mark my sent messages to this other as read
                  const readerId = data.from; // the one who read
                  const otherId = readerId; // conversation partner
                  const to = qs('to');
                  if(!to || to !== otherId) return; // only update if currently viewing
                  const state = messageCache[otherId];
                  if(!state || !state.items) return;
                  const cutoff = data.before ? new Date(data.before) : null;
                  let changed = false;
                  for(const m of state.items){
                    const mine = m.sender_id === wsMe && m.recipient_id === otherId;
                    if(!mine) continue;
                    if(m.read_at) continue;
                    if(!cutoff || new Date(m.created_at) <= cutoff){
                      m.read_at = new Date().toISOString();
                      changed = true;
                    }
                  }
                  if(changed){ renderMessages(state.items, wsMe); }
                  return;
                }
              }catch(_){ /* ignore malformed */ }
            });

            ws.addEventListener('close', ()=>{
              wsConnected = false;
              // resume polling if viewing a chat
              const to = qs('to');
              if(to && !pollIntervalId){ pollIntervalId = setInterval(()=> loadMessagesLoop(to), 4000); }
              // try reconnect after delay
              setTimeout(()=>{ wsConnected || ensureWebSocket(); }, 2000);
            });

            ws.addEventListener('error', ()=>{
              try{ ws.close(); }catch(_){ }
            });
          }catch(_){ /* ignore */ }
        }

        async function send(){
          const text = input.value.trim();
          if(!text) return;
          btn.disabled = true;
          try{
            const res = await fetch(`/api/messages/send`, {
              method:'POST',
              credentials:'include',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify({ to: user.id, content: text })
            });
            if(res.ok){
              input.value = '';
              // If WS connected, the new message will arrive via WS; fallback to quick refresh
              if(!wsConnected){ loadMessagesLoop(user.id); }
            }
          } finally {
            btn.disabled = false;
          }
        }

        // typing indicator: send start/stop with debounce
        const typingState = { active: false, timer: null };
        function sendTyping(type){
          if(!wsConnected || !ws || ws.readyState !== WebSocket.OPEN) return;
          try{ ws.send(JSON.stringify({ type, to: user.id })); }catch(_){ }
        }
        input.addEventListener('input', ()=>{
          if(!typingState.active){ typingState.active = true; sendTyping('typing_start'); }
          if(typingState.timer){ clearTimeout(typingState.timer); }
          typingState.timer = setTimeout(()=>{ typingState.active = false; sendTyping('typing_stop'); }, 1500);
        });
        input.addEventListener('blur', ()=>{
          if(typingState.active){ typingState.active = false; sendTyping('typing_stop'); }
          if(typingState.timer){ clearTimeout(typingState.timer); typingState.timer = null; }
        });

        btn.addEventListener('click', send);
        input.addEventListener('keydown', (e)=>{ if(e.key==='Enter' && !e.shiftKey){ e.preventDefault(); send(); } });

        // Emoji picker
        const EMOJIS = ['😀','😁','😂','🤣','😊','😍','😘','🤔','😎','🥳','👍','🙏','🔥','💪','🎉','✨','💯','😅','😴','😇','🙌','👏','🤝','❤️','💜','💙','💚','🧠','☕','📎'];
        function renderEmojiPicker(){
          emojiPicker.innerHTML = '<div class="grid grid-cols-10 gap-1">' + EMOJIS.map(e=>`<button type="button" class="px-1 py-1 hover:bg-slate-100 rounded">${e}</button>`).join('') + '</div>';
          emojiPicker.querySelectorAll('button').forEach(b=>{
            b.addEventListener('click', ()=>{
              input.value += b.textContent;
              input.focus();
            });
          });
        }
        renderEmojiPicker();
        emojiBtn.addEventListener('click', ()=>{
          emojiPicker.classList.toggle('hidden');
        });
        document.addEventListener('click', (ev)=>{
          if(!emojiPicker.classList.contains('hidden')){
            if(!emojiPicker.contains(ev.target) && ev.target !== emojiBtn){ emojiPicker.classList.add('hidden'); }
          }
        });

        // Attachment upload (max 2MB)
        attachBtn.addEventListener('click', ()=> fileInput.click());
        fileInput.addEventListener('change', async ()=>{
          const f = fileInput.files && fileInput.files[0];
          if(!f) return;
          try{
            if(f.size > 2*1024*1024){ alert('File terlalu besar. Maksimal 2MB'); fileInput.value=''; return; }
            const isImg = (f.type || '').toLowerCase().startsWith('image/');
            const url = isImg ? '/api/uploads/image' : '/api/uploads/file';
            const fd = new FormData();
            fd.append('file', f);
            const r = await fetch(url, { method: 'POST', body: fd, credentials: 'include' });
            if(!r.ok){ const t = await r.text(); alert('Upload gagal: '+t); return; }
            const data = await r.json();
            const link = data.url;
            // Send as inline image (URL) or structured file payload
            const content = isImg ? link : JSON.stringify({ type:'file', name: data.name || f.name, url: link });
            const res = await fetch(`/api/messages/send`, {
              method:'POST',
              credentials:'include',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify({ to: user.id, content })
            });
            if(!res.ok){ alert('Gagal mengirim pesan dengan lampiran'); }
          } catch(e){
            alert('Terjadi kesalahan saat upload');
          } finally {
            fileInput.value='';
          }
        });

        // initial load and polling/WS
        loadMessagesLoop(user.id);
        const wrap = document.getElementById('dm-messages');
        wrap.addEventListener('scroll', ()=>{
          if(wrap.scrollTop < 60){ loadOlderMessages(user.id); }
        });
        // start polling unless WS takes over
        if(!pollIntervalId){ pollIntervalId = setInterval(()=> loadMessagesLoop(user.id), 4000); }
        ensureWebSocket();
      }

      loadFriends();
      loadTarget();
      window.addEventListener('popstate', ()=>{ loadTarget(); });
    </script>
    """
    return HTMLResponse(content=page_shell("Direct Messages", body))
