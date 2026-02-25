<x-admin-layout>
    @section('page-title', 'Dashboard')
    
    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <div>
                    <div class="stat-value">{{ $stats['total_services'] }}</div>
                    <div class="stat-label">Total Layanan</div>
                </div>
                <div class="stat-icon blue">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div>
                    <div class="stat-value">{{ $stats['active_services'] }}</div>
                    <div class="stat-label">Layanan Aktif</div>
                </div>
                <div class="stat-icon green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                        <polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div>
                    <div class="stat-value">{{ $stats['published_articles'] }}</div>
                    <div class="stat-label">Artikel Published</div>
                </div>
                <div class="stat-icon purple">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                        <polyline points="14 2 14 8 20 8"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div>
                    <div class="stat-value">{{ $stats['total_messages'] }}</div>
                    <div class="stat-label">Total Pesan</div>
                </div>
                <div class="stat-icon yellow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div>
                    <div class="stat-value">{{ $stats['unread_messages'] }}</div>
                    <div class="stat-label">Pesan Belum Dibaca</div>
                </div>
                <div class="stat-icon red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div style="background: white; border-radius: 16px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--navy-900); margin-bottom: 20px;">Aksi Cepat</h2>
        
        <div class="action-grid">
            <a href="{{ route('admin.services.index') }}" class="btn-action blue">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                    <line x1="9" x2="15" y1="9" y2="15"/>
                    <line x1="15" x2="9" y1="9" y2="15"/>
                </svg>
                Kelola Layanan
            </a>
            
            <a href="{{ route('admin.articles.index') }}" class="btn-action green">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                    <polyline points="14 2 14 8 20 8"/>
                </svg>
                Kelola Artikel
            </a>
            
            <a href="{{ route('admin.messages.index') }}" class="btn-action yellow">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                </svg>
                Lihat Pesan
                @if($stats['unread_messages'] > 0)
                    <span style="background: #dc2626; color: white; font-size: 0.75rem; padding: 2px 8px; border-radius: 100px; margin-left: 4px;">{{ $stats['unread_messages'] }}</span>
                @endif
            </a>
        </div>
    </div>

    <!-- Info Cards -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-top: 24px;">
        <div style="background: linear-gradient(135deg, var(--navy-900), var(--navy-800)); border-radius: 16px; padding: 24px; color: white;">
            <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 12px;">👋 Selamat Datang, {{ auth()->user()->name ?? 'Admin' }}!</h3>
            <p style="font-size: 0.875rem; opacity: 0.8; line-height: 1.6;">
                Anda telah login ke panel admin TechFix. Gunakan menu di samping untuk mengelola semua konten website.
            </p>
        </div>
        
        <div style="background: linear-gradient(135deg, var(--blue-600), var(--blue-500)); border-radius: 16px; padding: 24px; color: white;">
            <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 12px;">📊 Ringkasan Sistem</h3>
            <p style="font-size: 0.875rem; opacity: 0.8; line-height: 1.6;">
                Total {{ $stats['total_services'] }} layanan aktif, {{ $stats['published_articles'] }} artikel published, dan {{ $stats['unread_messages'] }} pesan belum dibaca.
            </p>
        </div>
    </div>
</x-admin-layout>
