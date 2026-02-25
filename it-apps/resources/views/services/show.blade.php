<x-app-layout>
    <section class="section" style="background: var(--gray-50);">
        <div class="container">
            <!-- Breadcrumb -->
            <div style="margin-bottom: 32px;">
                <div class="breadcrumb">
                    <span onclick="window.location.href='{{ route('home') }}'">Beranda</span>
                    <span class="sep">/</span>
                    <span onclick="window.location.href='{{ route('services.index') }}'">Layanan</span>
                    <span class="sep">/</span>
                    <span style="color: var(--gray-600);">{{ $service->name ?? 'Detail Layanan' }}</span>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1.4fr; gap: 64px; align-items: start;">
                <!-- Service Details -->
                <div>
                    <div style="margin-bottom: 32px;">
                        <div class="svc-icon" style="width: 80px; height: 80px; margin-bottom: 24px;">
                            @if($service->icon_svg ?? null)
                                {!! $service->icon_svg !!}
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="3" width="20" height="14" rx="2"/>
                                    <path d="M8 21h8M12 17v4"/>
                                </svg>
                            @endif
                        </div>
                        <h1 style="font-size: 2rem; font-weight: 800; color: var(--navy-900); margin-bottom: 16px; letter-spacing: -0.02em;">{{ $service->name ?? 'Detail Layanan' }}</h1>
                        <p style="font-size: 1.125rem; color: var(--gray-600); line-height: 1.8;">{{ $service->description ?? 'Deskripsi layanan akan ditampilkan di sini.' }}</p>
                    </div>

                    @if($service->price ?? null)
                    <div style="background: var(--blue-100); border-radius: 12px; padding: 20px; margin-bottom: 32px;">
                        <div style="font-size: 0.8rem; font-weight: 600; color: var(--blue-600); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 8px;">Harga Mulai Dari</div>
                        <div style="font-size: 1.875rem; font-weight: 800; color: var(--navy-900);">{{ $service->price }}</div>
                    </div>
                    @endif

                    <div style="margin-bottom: 32px;">
                        <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--navy-900); margin-bottom: 16px; letter-spacing: -0.01em;">Cakupan Layanan</h2>
                        <div class="scope-list">
                            <div class="scope-item">
                                <div class="scope-check">✓</div>
                                <div style="font-size: 0.925rem; color: var(--gray-700);">Konsultasi awal gratis</div>
                            </div>
                            <div class="scope-item">
                                <div class="scope-check">✓</div>
                                <div style="font-size: 0.925rem; color: var(--gray-700);">Pemeriksaan dan diagnosa lengkap</div>
                            </div>
                            <div class="scope-item">
                                <div class="scope-check">✓</div>
                                <div style="font-size: 0.925rem; color: var(--gray-700);">Pelaporan hasil pekerjaan</div>
                            </div>
                            <div class="scope-item">
                                <div class="scope-check">✓</div>
                                <div style="font-size: 0.925rem; color: var(--gray-700);">Garansi layanan</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Form -->
                <div class="contact-form">
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--navy-900); margin-bottom: 24px;">Pesan Layanan Ini</h3>
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="service" value="{{ $service->name ?? '' }}">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="john@contoh.com" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="+62 812-3456-7890">
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan / Kebutuhan</label>
                            <textarea id="message" name="message" rows="5" class="form-control" placeholder="Jelaskan kebutuhan Anda..." required></textarea>
                        </div>
                        <button type="submit" class="btn-submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="22" y1="2" x2="11" y2="13"/>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                            </svg>
                            Kirim Pesan
                        </button>
                    </form>

                    <div style="margin-top: 24px; padding-top: 24px; border-top: 1px solid var(--gray-200);">
                        <h4 style="font-size: 1rem; font-weight: 700; color: var(--navy-900); margin-bottom: 12px;">Butuh Bantuan Cepat?</h4>
                        <button onclick="openWA()" class="btn-wa" style="width: 100%; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                                <path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.895-1.424A9.956 9.956 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2"/>
                            </svg>
                            Hubungi via WhatsApp
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
