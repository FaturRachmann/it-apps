<x-app-layout>

    <!-- SERVICES SECTION -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <div class="section-tag">Layanan Kami</div>
                <h2>Solusi IT Lengkap untuk Anda</h2>
                <p>Dari perbaikan perangkat keras hingga keamanan jaringan, kami menyediakan layanan IT profesional untuk semua kebutuhan Anda.</p>
            </div>

            <div class="services-grid">
                @isset($services)
                    @forelse($services as $service)
                        <x-service-card :service="$service" />
                    @empty
                        <div class="service-card">
                            <div class="svc-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="3" width="20" height="14" rx="2"/>
                                    <path d="M8 21h8M12 17v4"/>
                                </svg>
                            </div>
                            <h3>Service Komputer & Laptop</h3>
                            <p>Perbaikan hardware, instalasi software, upgrade performa untuk semua merek.</p>
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
                            <h3>Instalasi Jaringan</h3>
                            <p>Setup jaringan LAN/WiFi, konfigurasi router, troubleshooting koneksi untuk kantor dan rumah.</p>
                            <div class="service-price">Mulai Rp 500.000</div>
                        </div>
                        <div class="service-card">
                            <div class="svc-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                            </div>
                            <h3>Keamanan Siber</h3>
                            <p>Proteksi dari malware, ransomware, dan ancaman digital lainnya dengan solusi keamanan terkini.</p>
                            <div class="service-price">Mulai Rp 750.000</div>
                        </div>
                        <div class="service-card">
                            <div class="svc-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                    <polyline points="17 8 12 3 7 8"/>
                                    <line x1="12" y1="3" x2="12" y2="15"/>
                                </svg>
                            </div>
                            <h3>Backup & Recovery</h3>
                            <p>Backup data otomatis dan pemulihan data yang hilang atau rusak dengan tingkat keberhasilan tinggi.</p>
                            <div class="service-price">Mulai Rp 300.000</div>
                        </div>
                        <div class="service-card">
                            <div class="svc-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"/>
                                </svg>
                            </div>
                            <h3>Cloud Solutions</h3>
                            <p>Migrasi ke cloud, setup Google Workspace, Microsoft 365, dan layanan cloud lainnya.</p>
                            <div class="service-price">Mulai Rp 400.000</div>
                        </div>
                        <div class="service-card">
                            <div class="svc-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                </svg>
                            </div>
                            <h3>Konsultasi IT</h3>
                            <p>Konsultasi gratis untuk solusi IT terbaik sesuai kebutuhan bisnis dan anggaran Anda.</p>
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
                        <p>Perbaikan hardware, instalasi software, upgrade performa untuk semua merek.</p>
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
                        <h3>Instalasi Jaringan</h3>
                        <p>Setup jaringan LAN/WiFi, konfigurasi router, troubleshooting koneksi untuk kantor dan rumah.</p>
                        <div class="service-price">Mulai Rp 500.000</div>
                    </div>
                    <div class="service-card">
                        <div class="svc-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2"/>
                                <path d="M7 11V7a5 5 0 0110 0v4"/>
                            </svg>
                        </div>
                        <h3>Keamanan Siber</h3>
                        <p>Proteksi dari malware, ransomware, dan ancaman digital lainnya dengan solusi keamanan terkini.</p>
                        <div class="service-price">Mulai Rp 750.000</div>
                    </div>
                    <div class="service-card">
                        <div class="svc-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"/>
                            </svg>
                        </div>
                        <h3>Backup & Recovery</h3>
                        <p>Backup data otomatis dan pemulihan data yang hilang atau rusak dengan tingkat keberhasilan tinggi.</p>
                        <div class="service-price">Mulai Rp 300.000</div>
                    </div>
                    <div class="service-card">
                        <div class="svc-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17.5 19c0-1.7-1.3-3-3-3h-5c-1.7 0-3 1.3-3 3M12 3v13"/>
                                <path d="M8 8h8M6 11h12"/>
                            </svg>
                        </div>
                        <h3>Cloud Solutions</h3>
                        <p>Migrasi ke cloud, setup Google Workspace, Microsoft 365, dan layanan cloud lainnya.</p>
                        <div class="service-price">Mulai Rp 400.000</div>
                    </div>
                    <div class="service-card">
                        <div class="svc-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
                            </svg>
                        </div>
                        <h3>Konsultasi IT</h3>
                        <p>Konsultasi gratis untuk solusi IT terbaik sesuai kebutuhan bisnis dan anggaran Anda.</p>
                        <div class="service-price">Gratis</div>
                    </div>
                @endisset
            </div>
        </div>
    </section>

    <!-- CTA BANNER -->
    <section class="cta-banner">
        <h2>Butuh Bantuan Memilih Layanan?</h2>
        <p>Konsultasikan kebutuhan IT Anda dengan tim ahli kami. Gratis konsultasi tanpa kewajiban!</p>
        <div class="cta-btns">
            <button class="btn-wa" onclick="openWA()">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                    <path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.895-1.424A9.956 9.956 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2"/>
                </svg>
                Chat WhatsApp
            </button>
            <button class="btn-outline-white" onclick="window.location.href='{{ route('contact.index') }}'">
                Hubungi Kami
            </button>
        </div>
    </section>

</x-app-layout>
