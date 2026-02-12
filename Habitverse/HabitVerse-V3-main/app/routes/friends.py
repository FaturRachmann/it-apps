from fastapi import APIRouter, Request, Depends
from fastapi.responses import HTMLResponse
from sqlalchemy.orm import Session
from app.core.database import get_db
from app.core.security import get_current_user
from app.db.models import User

router = APIRouter()

@router.get("/friends", response_class=HTMLResponse)
def friends_page(
    request: Request,
    db: Session = Depends(get_db),
    current_user: User = Depends(get_current_user),
):
    return HTMLResponse(
        content=f"""
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Friends - HabitVerse</title>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>
        <body class="bg-slate-50 min-h-screen">
            <nav class="bg-white shadow-sm border-b px-6 py-4">
                <div class="flex items-center justify-between max-w-6xl mx-auto">
                    <div class="flex items-center space-x-8">
                        <h1 class="text-xl font-bold text-blue-600">HabitVerse</h1>
                        <div class="flex space-x-6">
                            <a href="/dashboard" class="text-slate-600 hover:text-blue-600">Dashboard</a>
                            <a href="/habits" class="text-slate-600 hover:text-blue-600">Habits</a>
                            <a href="/community" class="text-slate-600 hover:text-blue-600">Community</a>
                            <a href="/friends" class="text-blue-600 font-medium">Friends</a>
                            <a href="/profile" class="text-slate-600 hover:text-blue-600">Profile</a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-slate-600">Level {current_user.level}</span>
                        <span class="text-sm text-slate-600">{current_user.xp} XP</span>
                        <a href="/auth/logout" class="text-sm text-red-600 hover:text-red-700">Logout</a>
                    </div>
                </div>
            </nav>

            <div class="max-w-6xl mx-auto p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-semibold">Friends</h1>
                        <p class="text-slate-600">Connect with other HabitVerse users</p>
                    </div>
                    <button id="btn-search-users" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Find Friends
                    </button>
                </div>

                <!-- Friend Requests Section -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                    <h2 class="text-lg font-semibold mb-4">Friend Requests</h2>
                    <div id="friend-requests" class="space-y-3">
                        <p class="text-slate-500">Loading friend requests...</p>
                    </div>
                </div>

                <!-- Friends List Section -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h2 class="text-lg font-semibold mb-4">Your Friends</h2>
                    <div id="friends-list" class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <p class="text-slate-500">Loading friends...</p>
                    </div>
                </div>
                
                <!-- Recent Activity with Modern Action Bar -->
                <div class="bg-white rounded-xl shadow-sm p-6 mt-6">
                    <h2 class="text-lg font-semibold mb-4">Recent Activity</h2>
                    <div id="activity-feed" class="space-y-4">
                        <p class="text-slate-500">Loading activity...</p>
                    </div>
                </div>
            </div>

            <!-- Search Users Modal -->
            <div id="modal-search-users" class="hidden fixed inset-0 z-50 flex items-center justify-center">
                <div class="absolute inset-0 bg-black/40"></div>
                <div class="relative z-10 w-full max-w-2xl mx-auto p-6 rounded-2xl bg-white shadow-2xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold">Find Friends</h3>
                        <button id="btn-close-search" class="text-slate-500 hover:text-slate-700">✕</button>
                    </div>
                    
                    <div class="mb-4">
                        <input id="search-input" type="text" placeholder="Search by name or email..." 
                               class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500" />
                    </div>
                    
                    <div id="search-results" class="max-h-96 overflow-y-auto space-y-3">
                        <p class="text-slate-500 text-center py-8">Enter at least 2 characters to search</p>
                    </div>
                </div>
            </div>

            <script>
                // Load friend requests
                async function loadFriendRequests() {{
                    try {{
                        const res = await fetch('/api/friends/requests', {{ credentials: 'include' }});
                        if (res.ok) {{
                            const requests = await res.json();
                            const container = document.getElementById('friend-requests');
                            
                            if (requests.length === 0) {{
                                container.innerHTML = '<p class="text-slate-500">No pending friend requests</p>';
                                return;
                            }}
                            
                            container.innerHTML = requests.map(req => `
                                <div class="flex items-center justify-between p-4 border rounded-lg">
                                    <a href="/u/${{req.requester.id}}" class="flex items-center space-x-3 group">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                            ${{req.requester.avatar_url ? 
                                                `<img src="${{req.requester.avatar_url}}" class="w-10 h-10 rounded-full object-cover" />` :
                                                `<span class="text-white font-medium">${{req.requester.name[0].toUpperCase()}}</span>`
                                            }}
                                        </div>
                                        <div>
                                            <p class="font-medium group-hover:underline">${{req.requester.name}}</p>
                                            <p class="text-sm text-slate-600">Level ${{req.requester.level}} • ${{req.requester.xp}} XP</p>
                                        </div>
                                    </a>
                                    <div class="flex space-x-2">
                                        <button onclick="acceptFriendRequest('${{req.friendship_id}}')" 
                                                class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700">
                                            Accept
                                        </button>
                                        <button onclick="rejectFriendRequest('${{req.friendship_id}}')" 
                                                class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">
                                            Reject
                                        </button>
                                    </div>
                                </div>
                            `).join('');
                        }}
                    }} catch (error) {{
                        console.error('Failed to load friend requests:', error);
                    }}
                }}

                // Load friends list
                async function loadFriends() {{
                    try {{
                        const res = await fetch('/api/friends', {{ credentials: 'include' }});
                        if (res.ok) {{
                            const friends = await res.json();
                            const container = document.getElementById('friends-list');
                            
                            if (friends.length === 0) {{
                                container.innerHTML = '<p class="text-slate-500 col-span-full text-center py-8">No friends yet. Start by finding some friends!</p>';
                                return;
                            }}
                            
                            container.innerHTML = friends.map(friend => `
                                <div class="p-4 border rounded-lg hover:shadow-md transition-shadow">
                                    <a href="/u/${{friend.id}}" class="flex items-center space-x-3 mb-3 group">
                                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                            ${{friend.avatar_url ? 
                                                `<img src="${{friend.avatar_url}}" class="w-12 h-12 rounded-full object-cover" />` :
                                                `<span class="text-white font-medium">${{friend.name[0].toUpperCase()}}</span>`
                                            }}
                                        </div>
                                        <div>
                                            <p class="font-medium group-hover:underline">${{friend.name}}</p>
                                            <p class="text-sm text-slate-600">Level ${{friend.level}} • ${{friend.xp}} XP</p>
                                        </div>
                                    </a>
                                    ${{friend.profile ? `<p class="text-sm text-slate-600 mb-2">${{friend.profile}}</p>` : ''}}
                                    <div class="flex items-center gap-4">
                                      <a href="/dm?to=${{friend.id}}" class="text-sm text-indigo-600 hover:text-indigo-700">Message</a>
                                      <button onclick="removeFriend('${{friend.id}}')" 
                                              class="text-sm text-red-600 hover:text-red-700">
                                          Remove Friend
                                      </button>
                                    </div>
                                </div>
                            `).join('');
                        }}
                    }} catch (error) {{
                        console.error('Failed to load friends:', error);
                    }}
                }}

                // Search users
                let searchTimeout;
                document.getElementById('search-input').addEventListener('input', (e) => {{
                    clearTimeout(searchTimeout);
                    const query = e.target.value.trim();
                    
                    if (query.length < 2) {{
                        document.getElementById('search-results').innerHTML = 
                            '<p class="text-slate-500 text-center py-8">Enter at least 2 characters to search</p>';
                        return;
                    }}
                    
                    searchTimeout = setTimeout(async () => {{
                        try {{
                            const res = await fetch(`/api/users/search?q=${{encodeURIComponent(query)}}`, {{ credentials: 'include' }});
                            if (res.ok) {{
                                const users = await res.json();
                                const container = document.getElementById('search-results');
                                
                                if (users.length === 0) {{
                                    container.innerHTML = '<p class="text-slate-500 text-center py-8">No users found</p>';
                                    return;
                                }}
                                
                                container.innerHTML = users.map(user => `
                                    <div class="flex items-center justify-between p-3 border rounded-lg">
                                        <a href="/u/${{user.id}}" class="flex items-center space-x-3 group">
                                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                                ${{user.avatar_url ? 
                                                    `<img src="${{user.avatar_url}}" class="w-10 h-10 rounded-full object-cover" />` :
                                                    `<span class="text-white font-medium">${{user.name[0].toUpperCase()}}</span>`
                                                }}
                                            </div>
                                            <div>
                                                <p class="font-medium group-hover:underline">${{user.name}}</p>
                                                <p class="text-sm text-slate-600">Level ${{user.level}} • ${{user.xp}} XP</p>
                                            </div>
                                        </a>
                                        <div class="flex items-center gap-3">
                                            <a href="/dm?to=${{user.id}}" class="text-sm text-indigo-600 hover:text-indigo-700">Message</a>
                                            ${{getFriendshipButton(user)}}
                                        </div>
                                    </div>
                                `).join('');
                            }}
                        }} catch (error) {{
                            console.error('Search failed:', error);
                        }}
                    }}, 300);
                }});

                function getFriendshipButton(user) {{
                    switch(user.friendship_status) {{
                        case 'friends':
                            return '<span class="text-sm text-green-600">Friends</span>';
                        case 'request_sent':
                            return '<span class="text-sm text-yellow-600">Request Sent</span>';
                        case 'request_received':
                            return '<span class="text-sm text-blue-600">Request Received</span>';
                        default:
                            return `<button onclick="sendFriendRequest('${{user.id}}')" class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">Add Friend</button>`;
                    }}
                }}

                // Friend request actions
                async function sendFriendRequest(userId) {{
                    try {{
                        const res = await fetch(`/api/friends/request/${{userId}}`, {{
                            method: 'POST',
                            credentials: 'include'
                        }});
                        if (res.ok) {{
                            alert('Friend request sent!');
                            document.getElementById('search-input').dispatchEvent(new Event('input'));
                        }} else {{
                            const error = await res.json();
                            alert(error.detail || 'Failed to send friend request');
                        }}
                    }} catch (error) {{
                        alert('Network error');
                    }}
                }}

                async function acceptFriendRequest(friendshipId) {{
                    try {{
                        const res = await fetch(`/api/friends/accept/${{friendshipId}}`, {{
                            method: 'POST',
                            credentials: 'include'
                        }});
                        if (res.ok) {{
                            loadFriendRequests();
                            loadFriends();
                        }}
                    }} catch (error) {{
                        alert('Failed to accept friend request');
                    }}
                }}

                async function rejectFriendRequest(friendshipId) {{
                    try {{
                        const res = await fetch(`/api/friends/reject/${{friendshipId}}`, {{
                            method: 'POST',
                            credentials: 'include'
                        }});
                        if (res.ok) {{
                            loadFriendRequests();
                        }}
                    }} catch (error) {{
                        alert('Failed to reject friend request');
                    }}
                }}

                async function removeFriend(friendId) {{
                    if (!confirm('Are you sure you want to remove this friend?')) return;
                    try {{
                        const res = await fetch(`/api/friends/${{friendId}}`, {{
                            method: 'DELETE',
                            credentials: 'include'
                        }});
                        if (res.ok) {{
                            loadFriends();
                        }}
                    }} catch (error) {{
                        alert('Failed to remove friend');
                    }}
                }}

                // --- Activity Feed (Demo) with Modern Action Bar ---
                const demoPosts = [
                    {{ id: 'p1', user: '{current_user.name}', text: 'Crushed my morning workout habit! 💪 Day 12 in a row.', likes: 18, comments: 3, shares: 1, liked: false }},
                    {{ id: 'p2', user: 'Jordan', text: 'Meditation 10 minutes done. Feeling centered ✨', likes: 7, comments: 1, shares: 0, liked: true }},
                ];

                function actionButton(icon, label, count, active = false, action = '', postId = '') {{
                    const base = 'group inline-flex items-center gap-2 px-4 py-2 rounded-full border transition-all select-none';
                    const rest = active
                        ? 'bg-blue-600 text-white border-blue-600 shadow-sm hover:bg-blue-600/90'
                        : 'bg-white text-slate-700 border-slate-200 hover:border-slate-300 hover:bg-slate-50';
                    return `
                        <button data-action="${{action}}" data-post="${{postId}}" class="${{base}} ${{rest}}">
                            <span class="w-5 h-5">${{icon}}</span>
                            <span class="text-sm font-medium">${{label}}</span>
                            <span class="text-xs text-slate-500 group-[.bg-blue-600]:text-white/90">${{count}}</span>
                        </button>
                    `;
                }}

                const icons = {{
                    heart: `<svg viewBox="0 0 24 24" fill="currentColor"><path d="M11.645 20.91l-.007-.003-.022-.012a20.55 20.55 0 01-.383-.218 22.048 22.048 0 01-3.532-2.522C5.262 16.212 2.25 13.352 2.25 9.75 2.25 7.264 4.286 5.25 6.75 5.25c1.676 0 3.134.795 4.03 2.024a4.873 4.873 0 014.03-2.024c2.464 0 4.5 2.014 4.5 4.5 0 3.602-3.012 6.463-5.451 8.405a22.048 22.048 0 01-3.532 2.522 20.55 20.55 0 01-.383.218l-.022.012-.007.004-.003.001a.75.75 0 01-.69 0l-.003-.001z"/></svg>`,
                    chat: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3h6m-9.75 6.75V6.75A2.25 2.25 0 015.25 4.5h13.5A2.25 2.25 0 0121 6.75v6.75a2.25 2.25 0 01-2.25 2.25H8.06a1.5 1.5 0 00-1.06.44l-3 3z"/></svg>`,
                    share: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25l9-9m0 0h-6m6 0v6M18 15.75v3.75A2.25 2.25 0 0115.75 21H6.75A2.25 2.25 0 014.5 18.75V9.75A2.25 2.25 0 016.75 7.5h3.75"/></svg>`,
                }};

                function renderPostCard(p) {{
                    return `
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 text-white grid place-items-center font-semibold">${{p.user[0].toUpperCase()}}</div>
                                <div>
                                    <p class="font-medium">${{p.user}}</p>
                                    <p class="text-xs text-slate-500">just now</p>
                                </div>
                            </div>
                            <p class="text-slate-700 mb-4">${{p.text}}</p>
                            <div class="flex items-center gap-3">
                                ${{actionButton(icons.heart, p.liked ? 'Liked' : 'Like', p.likes, p.liked, 'like', p.id)}}
                                ${{actionButton(icons.chat, 'Comment', p.comments, false, 'comment', p.id)}}
                                ${{actionButton(icons.share, 'Share', p.shares, false, 'share', p.id)}}
                            </div>
                        </div>
                    `;
                }}

                function renderFeed() {{
                    const container = document.getElementById('activity-feed');
                    if (!container) return;
                    container.innerHTML = demoPosts.map(renderPostCard).join('');
                }}

                // Event delegation for action bar
                document.addEventListener('click', async (e) => {{
                    const btn = e.target.closest('button[data-action]');
                    if (!btn) return;
                    const action = btn.getAttribute('data-action');
                    const postId = btn.getAttribute('data-post');
                    const post = demoPosts.find(p => p.id === postId);
                    if (!post) return;

                    if (action === 'like') {{
                        post.liked = !post.liked;
                        post.likes += post.liked ? 1 : -1;
                        // TODO: POST /api/posts/{id}/like
                        renderFeed();
                    }} else if (action === 'comment') {{
                        alert('Open comment modal for ' + postId);
                    }} else if (action === 'share') {{
                        try {{
                            if (navigator.share) {{
                                await navigator.share({{ title: 'HabitVerse', text: post.text, url: window.location.href }});
                            }} else {{
                                await navigator.clipboard.writeText(window.location.href);
                                alert('Link copied to clipboard');
                            }}
                            post.shares += 1;
                            renderFeed();
                        }} catch (_) {{}}
                    }}
                }});

                // Modal handlers
                document.getElementById('btn-close-search').addEventListener('click', () => {{
                    document.getElementById('modal-search-users').classList.add('hidden');
                    document.getElementById('search-input').value = '';
                    document.getElementById('search-results').innerHTML = 
                        '<p class="text-slate-500 text-center py-8">Enter at least 2 characters to search</p>';
                }});

                // Load data on page load
                loadFriendRequests();
                loadFriends();
                renderFeed();
            </script>
        </body>
        </html>
        """
    )
