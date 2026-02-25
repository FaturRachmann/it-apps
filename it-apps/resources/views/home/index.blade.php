<x-app-layout>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                        <circle cx="12" cy="12" r="10"/>
                    </svg>
                    InfraHome Tech - Home Service IT Profesional
                </div>
                <h1>Ahli IT Support di <span>Depan Pintu Anda</span></h1>
                <p>Jasa service komputer, instalasi jaringan, dan dukungan teknologi profesional di kenyamanan rumah Anda. Cepat, terpercaya, dan terjangkau - karena teknologi Anda tidak boleh membuat Anda menunggu.</p>
                <div class="hero-btns">
                    <button class="btn-primary" onclick="openWA()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/>
                        </svg>
                        Pesan Teknisi
                    </button>
                    <button class="btn-wa" onclick="openWA()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                            <path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.895-1.424A9.956 9.956 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2"/>
                        </svg>
                        WhatsApp Sekarang
                    </button>
                </div>
                
                <!-- Trust Indicators -->
                <div style="margin-top: 48px; padding-top: 32px; border-top: 1px solid rgba(255,255,255,0.1);">
                    <div style="display: flex; gap: 32px; flex-wrap: wrap;">
                        <div>
                            <div style="font-size: 1.75rem; font-weight: 800; color: var(--blue-400); line-height: 1;">500+</div>
                            <div style="font-size: 0.8rem; color: var(--gray-400); margin-top: 4px;">Pelanggan Puas</div>
                        </div>
                        <div>
                            <div style="font-size: 1.75rem; font-weight: 800; color: var(--blue-400); line-height: 1;">2 Jam</div>
                            <div style="font-size: 0.8rem; color: var(--gray-400); margin-top: 4px;">Rata-rata Respon</div>
                        </div>
                        <div>
                            <div style="font-size: 1.75rem; font-weight: 800; color: var(--blue-400); line-height: 1;">98%</div>
                            <div style="font-size: 0.8rem; color: var(--gray-400); margin-top: 4px;">Tingkat Keberhasilan</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-visual">
                <div class="hero-card">
                    <div style="margin-bottom: 24px;">
                        <h3 style="color: white; font-size: 1.1rem; font-weight: 700; margin-bottom: 16px;">Layanan Home Service Kami:</h3>
                    </div>
                    <div class="hero-services-list">
                        <div class="hero-svc">
                            <div class="hero-svc-dot"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-right: 8px; flex-shrink: 0;">
                                <rect x="2" y="3" width="20" height="14" rx="2"/>
                                <path d="M8 21h8M12 17v4"/>
                            </svg>
                            Service Komputer & Laptop
                        </div>
                        <div class="hero-svc">
                            <div class="hero-svc-dot"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-right: 8px; flex-shrink: 0;">
                                <rect x="2" y="2" width="6" height="6"/>
                                <rect x="16" y="2" width="6" height="6"/>
                                <rect x="2" y="16" width="6" height="6"/>
                                <rect x="16" y="16" width="6" height="6"/>
                            </svg>
                            Instalasi WiFi Rumah
                        </div>
                        <div class="hero-svc">
                            <div class="hero-svc-dot"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-right: 8px; flex-shrink: 0;">
                                <rect x="3" y="11" width="18" height="11" rx="2"/>
                                <path d="M7 11V7a5 5 0 0110 0v4"/>
                            </svg>
                            Hapus Virus & Malware
                        </div>
                        <div class="hero-svc">
                            <div class="hero-svc-dot"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-right: 8px; flex-shrink: 0;">
                                <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"/>
                            </svg>
                            Backup Data
                        </div>
                        <div class="hero-svc">
                            <div class="hero-svc-dot"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-right: 8px; flex-shrink: 0;">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M12 6v6l4 2"/>
                            </svg>
                            Layanan Hari Ini Tersedia
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="section" style="background: white;">
        <div class="container">
            <div class="section-header">
                <div class="section-tag">Cara Kerja</div>
                <h2>Pesan Teknisi dalam 3 Langkah Mudah</h2>
                <p>Mendapatkan dukungan IT ahli di rumah tidak pernah semudah ini. Tidak perlu ke kantor, tidak perlu antre.</p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px; margin-top: 48px;">
                <div style="text-align: center;">
                    <div style="width: 80px; height: 80px; margin: 0 auto 24px; background: var(--blue-100); border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--blue-600)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/>
                        </svg>
                    </div>
                    <h3 style="font-size: 1.25rem; margin-bottom: 12px;">1. Hubungi Kami</h3>
                    <p style="color: var(--gray-600);">Telepon, WhatsApp, atau pesan online. Ceritakan masalah teknologi Anda dan kami akan menjadwalkan kunjungan.</p>
                </div>

                <div style="text-align: center;">
                    <div style="width: 80px; height: 80px; margin: 0 auto 24px; background: var(--blue-100); border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--blue-600)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                    </div>
                    <h3 style="font-size: 1.25rem; margin-bottom: 12px;">2. Kami Datang ke Rumah Anda</h3>
                    <p style="color: var(--gray-600);">Teknisi bersertifikat kami datang ke rumah Anda dengan semua peralatan dan suku cadang yang diperlukan.</p>
                </div>

                <div style="text-align: center;">
                    <div style="width: 80px; height: 80px; margin: 0 auto 24px; background: var(--blue-100); border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--blue-600)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                    </div>
                    <h3 style="font-size: 1.25rem; margin-bottom: 12px;">3. Masalah Terselesaikan</h3>
                    <p style="color: var(--gray-600);">Kami memperbaiki masalah di tempat, menjelaskan apa yang kami lakukan, dan memberikan garansi layanan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section class="section" style="background: var(--gray-50);">
        <div class="container">
            <div class="section-header">
                <div class="section-tag">Layanan Kami</div>
                <h2>Solusi IT Lengkap untuk Rumah Anda</h2>
                <p>Dari komputer lambat hingga masalah WiFi, kami menangani semua kebutuhan teknologi rumah Anda dengan layanan profesional dan harga transparan.</p>
            </div>

            <div class="services-grid">
                @isset($services)
                    @forelse($services as $service)
                        <x-service-card :service="$service" />
                    @empty
                        <!-- Default services -->
                        <div class="service-card">
                            <div class="svc-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="3" width="20" height="14" rx="2"/>
                                    <path d="M8 21h8M12 17v4"/>
                                </svg>
                            </div>
                            <h3>Service Komputer & Laptop</h3>
                            <p>Perbaikan hardware, instalasi software, optimasi kecepatan untuk semua merek. Kami datang ke rumah Anda.</p>
                            <div class="service-price">Mulai Rp 150.000</div>
                        </div>
                        <div class="service-card">
                            <div class="svc-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12.55a11 11 0 0 1 14.08 0"/>
                                    <path d="M1.42 9a16 16 0 0 1 21.16 0"/>
                                    <path d="M8.53 16.11a6 6 0 0 1 6.95 0"/>
                                    <line x1="12" y1="20" x2="12.01" y2="20"/>
                                </svg>
                            </div>
                            <h3>Instalasi WiFi Rumah</h3>
                            <p>Setup WiFi lengkap, konfigurasi router, dan optimasi sinyal untuk setiap ruangan di rumah Anda.</p>
                            <div class="service-price">Mulai Rp 500.000</div>
                        </div>
                        <div class="service-card">
                            <div class="svc-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                            </div>
                            <h3>Hapus Virus & Malware</h3>
                            <p>Pembersihan total dan setup perlindungan terhadap virus, ransomware, dan ancaman online lainnya.</p>
                            <div class="service-price">Mulai Rp 350.000</div>
                        </div>
                        <div class="service-card">
                            <div class="svc-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                    <polyline points="17 8 12 3 7 8"/>
                                    <line x1="12" y1="3" x2="12" y2="15"/>
                                </svg>
                            </div>
                            <h3>Backup & Recovery Data</h3>
                            <p>Setup backup otomatis dan pemulihan file yang hilang dari drive dan perangkat yang rusak.</p>
                            <div class="service-price">Mulai Rp 300.000</div>
                        </div>
                        <div class="service-card">
                            <div class="svc-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                    <polyline points="9 22 9 12 15 12 15 22"/>
                                </svg>
                            </div>
                            <h3>Setup Smart Home</h3>
                            <p>Instalasi dan konfigurasi perangkat smart, kamera, dan sistem otomatisasi rumah.</p>
                            <div class="service-price">Mulai Rp 400.000</div>
                        </div>
                        <div class="service-card">
                            <div class="svc-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                </svg>
                            </div>
                            <h3>Konsultasi Gratis</h3>
                            <p>Tidak yakin apa yang Anda butuhkan? Dapatkan saran ahli gratis untuk solusi terbaik sesuai situasi Anda.</p>
                            <div class="service-price">Gratis</div>
                        </div>
                    @endforelse
                @else
                    <div class="service-card">
                        <div class="svc-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="3" width="20" height="14" rx="2"/>
                                <path d="M8 21h8M12 17v4"/>
                            </svg>
                        </div>
                        <h3>Service Komputer & Laptop</h3>
                        <p>Perbaikan hardware, instalasi software, optimasi kecepatan untuk semua merek. Kami datang ke rumah Anda.</p>
                        <div class="service-price">Mulai Rp 150.000</div>
                    </div>
                    <div class="service-card">
                        <div class="svc-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="6" height="6"/>
                                <rect x="16" y="2" width="6" height="6"/>
                                <rect x="2" y="16" width="6" height="6"/>
                                <rect x="16" y="16" width="6" height="6"/>
                            </svg>
                        </div>
                        <h3>Instalasi WiFi Rumah</h3>
                        <p>Setup WiFi lengkap, konfigurasi router, dan optimasi sinyal untuk setiap ruangan di rumah Anda.</p>
                        <div class="service-price">Mulai Rp 500.000</div>
                    </div>
                    <div class="service-card">
                        <div class="svc-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2"/>
                                <path d="M7 11V7a5 5 0 0110 0v4"/>
                            </svg>
                        </div>
                        <h3>Hapus Virus & Malware</h3>
                        <p>Pembersihan total dan setup perlindungan terhadap virus, ransomware, dan ancaman online lainnya.</p>
                        <div class="service-price">Mulai Rp 350.000</div>
                    </div>
                    <div class="service-card">
                        <div class="svc-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"/>
                            </svg>
                        </div>
                        <h3>Backup & Recovery Data</h3>
                        <p>Setup backup otomatis dan pemulihan file yang hilang dari drive dan perangkat yang rusak.</p>
                        <div class="service-price">Mulai Rp 300.000</div>
                    </div>
                    <div class="service-card">
                        <div class="svc-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17.5 19c0-1.7-1.3-3-3-3h-5c-1.7 0-3 1.3-3 3M12 3v13"/>
                                <path d="M8 8h8M6 11h12"/>
                            </svg>
                        </div>
                        <h3>Setup Smart Home</h3>
                        <p>Instalasi dan konfigurasi perangkat smart, kamera, dan sistem otomatisasi rumah.</p>
                        <div class="service-price">Mulai Rp 400.000</div>
                    </div>
                    <div class="service-card">
                        <div class="svc-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
                            </svg>
                        </div>
                        <h3>Konsultasi Gratis</h3>
                        <p>Tidak yakin apa yang Anda butuhkan? Dapatkan saran ahli gratis untuk solusi terbaik sesuai situasi Anda.</p>
                        <div class="service-price">Gratis</div>
                    </div>
                @endisset
            </div>

            <div style="text-align: center; margin-top: 48px;">
                <a href="{{ route('services.index') }}" class="inline-flex items-center px-8 py-4 text-base font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    Lihat Semua Layanan
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 8px;">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE US -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <div class="section-tag">Mengapa Memilih InfraHome Tech</div>
                <h2>Keunggulan Home Service InfraHome Tech</h2>
                <p>Kami mengerti bahwa mengundang teknisi ke rumah Anda membutuhkan kepercayaan. Inilah alasan ratusan keluarga memilih InfraHome Tech.</p>
            </div>

            <div class="features-grid">
                <div class="feature-item">
                    <div class="feat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                    </div>
                    <h3>Teknisi Terverifikasi</h3>
                    <p>Semua teknisi kami telah melalui pemeriksaan latar belakang, bersertifikat, dan terlatih untuk etika layanan rumah.</p>
                </div>
                <div class="feature-item">
                    <div class="feat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                    </div>
                    <h3>Layanan Hari Ini</h3>
                    <p>Sebagian besar masalah dapat ditangani di hari yang sama Anda menghubungi. Kami menghargai waktu dan jadwal Anda.</p>
                </div>
                <div class="feature-item">
                    <div class="feat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 1v22M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                        </svg>
                    </div>
                    <h3>Harga Transparan</h3>
                    <p>Tidak ada kejutan. Anda akan mengetahui biaya pasti sebelum kami memulai pekerjaan. Transparan dan adil.</p>
                </div>
                <div class="feature-item">
                    <div class="feat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                    </div>
                    <h3>Garansi Layanan</h3>
                    <p>Semua perbaikan dilengkapi garansi. Jika masalah kembali, kami perbaiki gratis.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA BANNER -->
    <section class="cta-banner">
        <h2>Butuh Dukungan IT di Rumah?</h2>
        <p>Teknisi kami siap membantu. Layanan cepat, profesional, dan terjangkau di depan pintu Anda.</p>
        <div class="cta-btns">
            <button class="btn-wa" onclick="openWA()">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                    <path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.895-1.424A9.956 9.956 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2"/>
                </svg>
                Pesan via WhatsApp
            </button>
            <button class="btn-outline-white" onclick="window.location.href='{{ route('contact.index') }}'">
                Minta Hubungi Kembali
            </button>
        </div>
    </section>

</x-app-layout>
