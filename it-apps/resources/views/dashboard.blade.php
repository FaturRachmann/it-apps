<x-app-layout>

    @php
        $isAdmin = auth()->user()->email === 'admin@techfix.com';
    @endphp

    @if($isAdmin)
        <!-- Admin Dashboard -->
        <section style="background: linear-gradient(135deg, var(--gray-100) 0%, white 100%); min-height: 100vh; padding: 40px 24px;">
            <div class="container" style="max-width: 1200px; margin: 0 auto;">

                <!-- Admin Welcome Banner -->
                <div style="background: linear-gradient(135deg, var(--navy-900), var(--navy-800)); border-radius: 20px; padding: 40px; margin-bottom: 32px; color: white;">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <h1 style="font-size: 2rem; font-weight: 800; margin-bottom: 8px; letter-spacing: -0.02em;">
                                👋 Admin Dashboard
                            </h1>
                            <p style="font-size: 1rem; opacity: 0.9;">
                                Kelola semua konten website InfraHome Tech dari sini
                            </p>
                        </div>
                        <a href="{{ route('admin.dashboard') }}" style="background: var(--blue-600); color: white; padding: 14px 28px; border-radius: 10px; text-decoration: none; font-weight: 600; transition: all 0.2s; display: inline-flex; align-items: center; gap: 8px;"
                           onmouseover="this.style.background='var(--blue-500)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(37,99,235,0.3)'"
                           onmouseout="this.style.background='var(--blue-600)'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                <polyline points="9 22 9 12 15 12 15 22"/>
                            </svg>
                            Buka Admin Panel
                        </a>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 24px; margin-bottom: 32px;">
                    <div style="background: white; border-radius: 16px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div>
                                <div style="font-size: 0.875rem; color: var(--gray-500); margin-bottom: 4px;">Total Layanan</div>
                                <div style="font-size: 2rem; font-weight: 800; color: var(--navy-900);">6</div>
                            </div>
                            <div style="width: 48px; height: 48px; border-radius: 12px; background: #dbeafe; display: flex; align-items: center; justify-content: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div style="background: white; border-radius: 16px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div>
                                <div style="font-size: 0.875rem; color: var(--gray-500); margin-bottom: 4px;">Total Artikel</div>
                                <div style="font-size: 2rem; font-weight: 800; color: var(--navy-900);">6</div>
                            </div>
                            <div style="width: 48px; height: 48px; border-radius: 12px; background: #dcfce7; display: flex; align-items: center; justify-content: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div style="background: white; border-radius: 16px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div>
                                <div style="font-size: 0.875rem; color: var(--gray-500); margin-bottom: 4px;">Pesan Masuk</div>
                                <div style="font-size: 2rem; font-weight: 800; color: var(--navy-900);">0</div>
                            </div>
                            <div style="width: 48px; height: 48px; border-radius: 12px; background: #fef3c7; display: flex; align-items: center; justify-content: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CRUD Management Cards -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
                    
                    <!-- Services Management -->
                    <div style="background: white; border-radius: 16px; padding: 28px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                            <div style="width: 48px; height: 48px; border-radius: 12px; background: #dbeafe; display: flex; align-items: center; justify-content: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                                </svg>
                            </div>
                            <div>
                                <h3 style="font-size: 1.125rem; font-weight: 700; color: var(--navy-900);">Kelola Layanan</h3>
                                <p style="font-size: 0.875rem; color: var(--gray-500);">Tambah, edit, hapus layanan</p>
                            </div>
                        </div>
                        <p style="font-size: 0.9rem; color: var(--gray-600); margin-bottom: 20px; line-height: 1.6;">
                            Kelola semua layanan IT yang ditawarkan. Update harga, deskripsi, dan icon untuk setiap layanan.
                        </p>
                        <div style="display: flex; gap: 12px;">
                            <a href="{{ route('admin.services.index') }}" style="flex: 1; background: var(--blue-600); color: white; padding: 12px 20px; border-radius: 10px; text-align: center; text-decoration: none; font-weight: 600; transition: all 0.2s;"
                               onmouseover="this.style.background='var(--blue-500)'; this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(37,99,235,0.3)'"
                               onmouseout="this.style.background='var(--blue-600)'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                Kelola Layanan
                            </a>
                            <a href="{{ route('admin.services.create') }}" style="flex: 1; background: var(--gray-100); color: var(--navy-900); padding: 12px 20px; border-radius: 10px; text-align: center; text-decoration: none; font-weight: 600; transition: all 0.2s;"
                               onmouseover="this.style.background='var(--gray-200)'"
                               onmouseout="this.style.background='var(--gray-100)'">
                                + Tambah Baru
                            </a>
                        </div>
                    </div>

                    <!-- Articles Management -->
                    <div style="background: white; border-radius: 16px; padding: 28px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                            <div style="width: 48px; height: 48px; border-radius: 12px; background: #dcfce7; display: flex; align-items: center; justify-content: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                </svg>
                            </div>
                            <div>
                                <h3 style="font-size: 1.125rem; font-weight: 700; color: var(--navy-900);">Kelola Artikel</h3>
                                <p style="font-size: 0.875rem; color: var(--gray-500);">Blog dan artikel edukasi</p>
                            </div>
                        </div>
                        <p style="font-size: 0.9rem; color: var(--gray-600); margin-bottom: 20px; line-height: 1.6;">
                            Buat dan kelola artikel blog, tips IT, dan konten edukasi untuk website.
                        </p>
                        <div style="display: flex; gap: 12px;">
                            <a href="{{ route('admin.articles.index') }}" style="flex: 1; background: #16a34a; color: white; padding: 12px 20px; border-radius: 10px; text-align: center; text-decoration: none; font-weight: 600; transition: all 0.2s;"
                               onmouseover="this.style.background='#15803d'; this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(22,163,74,0.3)'"
                               onmouseout="this.style.background='#16a34a'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                Kelola Artikel
                            </a>
                            <a href="{{ route('admin.articles.create') }}" style="flex: 1; background: var(--gray-100); color: var(--navy-900); padding: 12px 20px; border-radius: 10px; text-align: center; text-decoration: none; font-weight: 600; transition: all 0.2s;"
                               onmouseover="this.style.background='var(--gray-200)'"
                               onmouseout="this.style.background='var(--gray-100)'">
                                + Tambah Baru
                            </a>
                        </div>
                    </div>

                    <!-- Messages Management -->
                    <div style="background: white; border-radius: 16px; padding: 28px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                            <div style="width: 48px; height: 48px; border-radius: 12px; background: #fef3c7; display: flex; align-items: center; justify-content: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 style="font-size: 1.125rem; font-weight: 700; color: var(--navy-900);">Pesan Masuk</h3>
                                <p style="font-size: 0.875rem; color: var(--gray-500);">Dari form kontak</p>
                            </div>
                        </div>
                        <p style="font-size: 0.9rem; color: var(--gray-600); margin-bottom: 20px; line-height: 1.6;">
                            Lihat dan balas pesan yang masuk dari form kontak website.
                        </p>
                        <a href="{{ route('admin.messages.index') }}" style="display: block; background: #d97706; color: white; padding: 12px 20px; border-radius: 10px; text-align: center; text-decoration: none; font-weight: 600; transition: all 0.2s;"
                           onmouseover="this.style.background='#b45309'; this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(217,119,6,0.3)'"
                           onmouseout="this.style.background='#d97706'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            Lihat Pesan Masuk
                        </a>
                    </div>

                </div>

                <!-- Quick Links -->
                <div style="background: linear-gradient(135deg, var(--blue-600), var(--blue-500)); border-radius: 16px; padding: 28px; margin-top: 24px; color: white; box-shadow: 0 4px 16px rgba(37,99,235,0.2);">
                    <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 16px;">🚀 Akses Cepat</h3>
                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        <a href="{{ route('admin.dashboard') }}" style="background: rgba(255,255,255,0.2); color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 500; font-size: 0.9rem; transition: all 0.2s;"
                           onmouseover="this.style.background='rgba(255,255,255,0.3)'"
                           onmouseout="this.style.background='rgba(255,255,255,0.2)'">
                            📊 Dashboard Admin
                        </a>
                        <a href="{{ route('home') }}" style="background: rgba(255,255,255,0.2); color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 500; font-size: 0.9rem; transition: all 0.2s;"
                           onmouseover="this.style.background='rgba(255,255,255,0.3)'"
                           onmouseout="this.style.background='rgba(255,255,255,0.2)'">
                            🌐 Lihat Website
                        </a>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: rgba(255,255,255,0.2); color: white; padding: 10px 20px; border-radius: 8px; border: none; font-weight: 500; font-size: 0.9rem; cursor: pointer; transition: all 0.2s;"
                                  onmouseover="this.style.background='rgba(255,255,255,0.3)'"
                                  onmouseout="this.style.background='rgba(255,255,255,0.2)'">
                                🚪 Logout
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    @else
        <!-- Regular User Dashboard (show tickets etc) -->
        <section style="background: linear-gradient(135deg, var(--gray-100) 0%, white 100%); min-height: 100vh; padding: 40px 24px;">
            <div class="container" style="max-width: 1200px; margin: 0 auto;">
                
                <!-- Welcome Section -->
                <div style="background: linear-gradient(135deg, var(--navy-900), var(--navy-800)); border-radius: 20px; padding: 40px; margin-bottom: 32px; color: white;">
                    <h1 style="font-size: 2rem; font-weight: 800; margin-bottom: 12px; letter-spacing: -0.02em;">
                        Selamat Datang, {{ auth()->user()->name ?? 'User' }}! 👋
                    </h1>
                    <p style="font-size: 1rem; opacity: 0.9; line-height: 1.6;">
                        Terima kasih telah bergabung dengan InfraHome Tech. Kami siap membantu kebutuhan IT Anda.
                    </p>
                </div>

                <!-- Stats Cards -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; margin-bottom: 32px;">
                    <!-- Ticket Stats -->
                    <div style="background: white; border-radius: 16px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                            <div>
                                <div style="font-size: 0.875rem; color: var(--gray-500); margin-bottom: 4px;">Total Tiket</div>
                                <div style="font-size: 2.5rem; font-weight: 800; color: var(--navy-900); line-height: 1;">5</div>
                            </div>
                            <div style="width: 56px; height: 56px; border-radius: 14px; background: #dbeafe; display: flex; align-items: center; justify-content: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                </svg>
                            </div>
                        </div>
                        <div style="display: flex; gap: 12px; font-size: 0.875rem;">
                            <span style="color: #16a34a; font-weight: 600;">✓ 3 Selesai</span>
                            <span style="color: #d97706; font-weight: 600;">⏳ 2 Proses</span>
                        </div>
                    </div>

                    <!-- Service Stats -->
                    <div style="background: white; border-radius: 16px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                            <div>
                                <div style="font-size: 0.875rem; color: var(--gray-500); margin-bottom: 4px;">Layanan Aktif</div>
                                <div style="font-size: 2.5rem; font-weight: 800; color: var(--navy-900); line-height: 1;">2</div>
                            </div>
                            <div style="width: 56px; height: 56px; border-radius: 14px; background: #dcfce7; display: flex; align-items: center; justify-content: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                            </div>
                        </div>
                        <div style="font-size: 0.875rem; color: var(--gray-600);">
                            Paket Premium Support
                        </div>
                    </div>

                    <!-- Next Billing -->
                    <div style="background: white; border-radius: 16px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                            <div>
                                <div style="font-size: 0.875rem; color: var(--gray-500); margin-bottom: 4px;">Tagihan Berikutnya</div>
                                <div style="font-size: 2.5rem; font-weight: 800; color: var(--navy-900); line-height: 1;">12 Hari</div>
                            </div>
                            <div style="width: 56px; height: 56px; border-radius: 14px; background: #f3e8ff; display: flex; align-items: center; justify-content: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#9333ea" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                    <line x1="16" y1="2" x2="16" y2="6"/>
                                    <line x1="8" y1="2" x2="8" y2="6"/>
                                    <line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                            </div>
                        </div>
                        <div style="font-size: 1.25rem; font-weight: 700; color: var(--blue-600);">
                            Rp 299.000
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div style="background: white; border-radius: 16px; padding: 28px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                    <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--navy-900); margin-bottom: 20px; letter-spacing: -0.01em;">
                        Aksi Cepat
                    </h2>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
                        <a href="{{ route('contact.index') }}" style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 24px 16px; background: var(--gray-50); border-radius: 14px; text-decoration: none; transition: all 0.2s;"
                           onmouseover="this.style.background='#eff6ff'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(37,99,235,0.15)'"
                           onmouseout="this.style.background='var(--gray-50)'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            <div style="width: 52px; height: 52px; border-radius: 14px; background: #dbeafe; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                </svg>
                            </div>
                            <span style="font-weight: 600; color: var(--navy-900); font-size: 0.95rem;">Hubungi Kami</span>
                            <span style="font-size: 0.8rem; color: var(--gray-500); margin-top: 4px;">Kirim pesan</span>
                        </a>

                        <a href="{{ route('services.index') }}" style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 24px 16px; background: var(--gray-50); border-radius: 14px; text-decoration: none; transition: all 0.2s;"
                           onmouseover="this.style.background='#dcfce7'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(22,163,74,0.15)'"
                           onmouseout="this.style.background='var(--gray-50)'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            <div style="width: 52px; height: 52px; border-radius: 14px; background: #dcfce7; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                            </div>
                            <span style="font-weight: 600; color: var(--navy-900); font-size: 0.95rem;">Layanan</span>
                            <span style="font-size: 0.8rem; color: var(--gray-500); margin-top: 4px;">Lihat semua</span>
                        </a>

                        <a href="{{ route('articles.index') }}" style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 24px 16px; background: var(--gray-50); border-radius: 14px; text-decoration: none; transition: all 0.2s;"
                           onmouseover="this.style.background='#f3e8ff'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(147,51,234,0.15)'"
                           onmouseout="this.style.background='var(--gray-50)'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            <div style="width: 52px; height: 52px; border-radius: 14px; background: #f3e8ff; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#9333ea" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                                </svg>
                            </div>
                            <span style="font-weight: 600; color: var(--navy-900); font-size: 0.95rem;">Artikel</span>
                            <span style="font-size: 0.8rem; color: var(--gray-500); margin-top: 4px;">Tips & panduan</span>
                        </a>

                        <a href="{{ route('profile.show') }}" style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 24px 16px; background: var(--gray-50); border-radius: 14px; text-decoration: none; transition: all 0.2s;"
                           onmouseover="this.style.background='#fef3c7'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(217,119,6,0.15)'"
                           onmouseout="this.style.background='var(--gray-50)'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            <div style="width: 52px; height: 52px; border-radius: 14px; background: #fef3c7; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                            <span style="font-weight: 600; color: var(--navy-900); font-size: 0.95rem;">Profil</span>
                            <span style="font-size: 0.8rem; color: var(--gray-500); margin-top: 4px;">Pengaturan</span>
                        </a>
                    </div>
                </div>

            </div>
        </section>
    @endif

</x-app-layout>
