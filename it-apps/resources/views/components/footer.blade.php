<footer>
    <div class="footer-inner">
        <div class="footer-top">
            <!-- Brand Column -->
            <div class="footer-brand">
                <a href="{{ route('home') }}" class="footer-logo">
                    InfraHome<span>Tech</span>
                </a>
                <p class="footer-desc">
                    Solusi IT home service profesional yang dapat dipercaya. Melayani dengan hati-hati dan profesionalisme lebih dari 8 tahun.
                </p>
            </div>

            <!-- Layanan -->
            <div class="footer-col">
                <h4>Layanan</h4>
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('about') }}">Tentang Kami</a>
                <a href="{{ route('services.index') }}">Service Komputer</a>
                <a href="{{ route('services.index') }}">Instalasi Jaringan</a>
            </div>

            <!-- Dukungan -->
            <div class="footer-col">
                <h4>Dukungan</h4>
                <a href="{{ route('faq') }}">FAQ</a>
                <a href="{{ route('contact.index') }}">Kontak</a>
                <a href="{{ route('articles.index') }}">Artikel</a>
                <a href="#">Portal Support</a>
            </div>

            <!-- Perusahaan -->
            <div class="footer-col">
                <h4>Perusahaan</h4>
                <a href="#">Blog</a>
                <a href="#">Karir</a>
                <a href="#">Berita</a>
                <a href="{{ route('contact.index') }}">Hubungi Kami</a>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="footer-bottom">
            <span>
                © {{ date('Y') }} <a href="{{ route('home') }}" style="color: var(--blue-400); text-decoration: none;">InfraHome Tech™</a>. All Rights Reserved.
            </span>
            <div style="display: flex; gap: 20px;">
                <a href="{{ route('privacy-policy') }}" style="color: var(--gray-500); text-decoration: none;">Privacy Policy</a>
                <a href="{{ route('terms-of-service') }}" style="color: var(--gray-500); text-decoration: none;">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
