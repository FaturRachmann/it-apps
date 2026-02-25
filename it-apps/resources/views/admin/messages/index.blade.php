<x-admin-layout>
    @section('page-title', 'Pesan Masuk')

    <div style="max-width: 1200px;">
        <!-- Header dengan Back Button -->
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 32px;">
            <div style="display: flex; align-items: center; gap: 16px;">
                <a href="{{ route('admin.dashboard') }}" style="display: flex; align-items: center; gap: 8px; padding: 10px 16px; background: white; border-radius: 10px; text-decoration: none; color: var(--gray-600); font-size: 0.9rem; font-weight: 500; transition: all 0.2s; box-shadow: 0 1px 3px rgba(0,0,0,0.1);"
                   onmouseover="this.style.background='var(--blue-50)'; this.style.color='var(--blue-600)'; this.style.transform='translateX(-2px)'"
                   onmouseout="this.style.background='white'; this.style.color='var(--gray-600)'; this.style.transform='translateX(0)'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                    Dashboard
                </a>
                <div>
                    <h1 style="font-size: 1.75rem; font-weight: 800; color: var(--navy-900); letter-spacing: -0.02em;">Pesan Masuk</h1>
                    <p style="color: var(--gray-500); font-size: 0.9rem; margin-top: 4px;">Kelola pesan dari form kontak website</p>
                </div>
            </div>
            <div style="display: flex; align-items: center; gap: 12px;">
                <span style="display: inline-flex; align-items: center; gap: 8px; padding: 8px 16px; background: var(--blue-50); border-radius: 100px; font-size: 0.875rem; font-weight: 600; color: var(--blue-600);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                    {{ $messages->count() }} Pesan
                </span>
            </div>
        </div>

        @if(session('success'))
            <div style="margin-bottom: 24px; padding: 16px 20px; background: linear-gradient(135deg, #dcfce7 0%, #f0fdf4 100%); border: 2px solid #16a34a; border-radius: 14px; display: flex; align-items: center; gap: 12px; animation: slideIn 0.3s ease-out;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                <span style="color: #166534; font-weight: 600; font-size: 0.95rem;">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Messages Card -->
        <div style="background: white; border-radius: 20px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); overflow: hidden;">
            <!-- Card Header -->
            <div style="padding: 24px 32px; border-bottom: 1px solid var(--gray-100); background: linear-gradient(135deg, var(--gray-50) 0%, white 100%);">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: linear-gradient(135deg, var(--blue-500), var(--blue-600)); display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(37,99,235,0.2);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--navy-900);">Daftar Pesan</h2>
                        <p style="color: var(--gray-500); font-size: 0.875rem; margin-top: 2px;">{{ $messages->where('is_read', false)->count() }} pesan belum dibaca</p>
                    </div>
                </div>
            </div>

            <!-- Messages Table -->
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: var(--gray-50); border-bottom: 2px solid var(--gray-100);">
                            <th style="padding: 16px 24px; text-align: left; font-size: 0.75rem; font-weight: 700; color: var(--gray-500); text-transform: uppercase; letter-spacing: 0.05em;">Pengirim</th>
                            <th style="padding: 16px 24px; text-align: left; font-size: 0.75rem; font-weight: 700; color: var(--gray-500); text-transform: uppercase; letter-spacing: 0.05em;">Subjek</th>
                            <th style="padding: 16px 24px; text-align: left; font-size: 0.75rem; font-weight: 700; color: var(--gray-500); text-transform: uppercase; letter-spacing: 0.05em; width: 140px;">Tanggal</th>
                            <th style="padding: 16px 24px; text-align: center; font-size: 0.75rem; font-weight: 700; color: var(--gray-500); text-transform: uppercase; letter-spacing: 0.05em; width: 100px;">Status</th>
                            <th style="padding: 16px 24px; text-align: right; font-size: 0.75rem; font-weight: 700; color: var(--gray-500); text-transform: uppercase; letter-spacing: 0.05em; width: 220px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                        <tr style="border-bottom: 1px solid var(--gray-100); transition: background 0.2s; {{ !$message->is_read ? 'background: linear-gradient(90deg, #eff6ff 0%, white 100%);' : '' }}"
                            onmouseover="this.style.background='{{ !$message->is_read ? 'linear-gradient(90deg, #dbeafe 0%, #eff6ff 100%)' : 'var(--gray-50)' }}'"
                            onmouseout="this.style.background='{{ !$message->is_read ? 'linear-gradient(90deg, #eff6ff 0%, white 100%)' : 'white' }}'">
                            <td style="padding: 20px 24px;">
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <div style="width: 42px; height: 42px; border-radius: 12px; background: linear-gradient(135deg, var(--blue-100), var(--blue-50)); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                        <span style="font-size: 1.1rem; font-weight: 700; color: var(--blue-600);">{{ strtoupper(substr($message->name, 0, 1)) }}</span>
                                    </div>
                                    <div>
                                        <div style="font-weight: 700; color: var(--gray-800); font-size: 0.95rem;">{{ $message->name }}</div>
                                        <div style="font-size: 0.8rem; color: var(--gray-500); margin-top: 2px;">{{ $message->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td style="padding: 20px 24px;">
                                <div style="font-size: 0.9rem; color: var(--gray-700); font-weight: 500;">{{ Str::limit($message->subject, 40) }}</div>
                                @if($message->message)
                                <div style="font-size: 0.8rem; color: var(--gray-400); margin-top: 4px;">{{ Str::limit(strip_tags($message->message), 60) }}</div>
                                @endif
                            </td>
                            <td style="padding: 20px 24px;">
                                <div style="font-size: 0.85rem; color: var(--gray-600); font-weight: 500;">{{ $message->created_at->format('d M Y') }}</div>
                                <div style="font-size: 0.75rem; color: var(--gray-400); margin-top: 2px;">{{ $message->created_at->format('H:i') }}</div>
                            </td>
                            <td style="padding: 20px 24px; text-align: center;">
                                <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; border-radius: 100px; font-size: 0.75rem; font-weight: 700; {{ $message->is_read ? 'background: #dcfce7; color: #16a34a;' : 'background: linear-gradient(135deg, #fef3c7, #fde68a); color: #92400e;' }}">
                                    <span style="width: 6px; height: 6px; border-radius: 50%; {{ $message->is_read ? 'background: #16a34a;' : 'background: #d97706;' }}"></span>
                                    {{ $message->is_read ? 'Dibaca' : 'Baru' }}
                                </span>
                            </td>
                            <td style="padding: 20px 24px; text-align: right;">
                                <div style="display: flex; align-items: center; justify-content: flex-end; gap: 8px;">
                                    <a href="mailto:{{ $message->email }}" style="display: inline-flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 10px; background: var(--blue-50); color: var(--blue-600); text-decoration: none; transition: all 0.2s; border: 2px solid transparent;"
                                       onmouseover="this.style.background='var(--blue-100)'; this.style.borderColor='var(--blue-300)'; this.style.transform='scale(1.05)'"
                                       onmouseout="this.style.background='var(--blue-50)'; this.style.borderColor='transparent'; this.style.transform='scale(1)'"
                                       title="Reply Email">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                                    </a>
                                    @if(!$message->is_read)
                                    <form action="{{ route('admin.messages.read', $message->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" style="display: inline-flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 10px; background: linear-gradient(135deg, #dcfce7, #f0fdf4); color: #16a34a; border: 2px solid transparent; cursor: pointer; transition: all 0.2s;"
                                                onmouseover="this.style.background='linear-gradient(135deg, #bbf7d0, #dcfce7)'; this.style.borderColor='#86efac'; this.style.transform='scale(1.05)'"
                                                onmouseout="this.style.background='linear-gradient(135deg, #dcfce7, #f0fdf4)'; this.style.borderColor='transparent'; this.style.transform='scale(1)'"
                                                title="Mark as Read">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"/>
                                            </svg>
                                        </button>
                                    </form>
                                    @endif
                                    <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this message?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="display: inline-flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 10px; background: linear-gradient(135deg, #fee2e2, #fef2f2); color: #dc2626; border: 2px solid transparent; cursor: pointer; transition: all 0.2s;"
                                                onmouseover="this.style.background='linear-gradient(135deg, #fecaca, #fee2e2)'; this.style.borderColor='#fca5a5'; this.style.transform='scale(1.05)'"
                                                onmouseout="this.style.background='linear-gradient(135deg, #fee2e2, #fef2f2)'; this.style.borderColor='transparent'; this.style.transform='scale(1)'"
                                                title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"/>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="padding: 60px 24px; text-align: center;">
                                <div style="width: 80px; height: 80px; border-radius: 50%; background: var(--gray-100); display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--gray-400)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                    </svg>
                                </div>
                                <div style="font-size: 1.1rem; font-weight: 700; color: var(--gray-600); margin-bottom: 8px;">Belum ada pesan</div>
                                <div style="font-size: 0.9rem; color: var(--gray-400);">Pesan dari form kontak akan muncul di sini</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</x-admin-layout>
