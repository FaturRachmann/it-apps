<nav id="navbar">
    <div class="nav-inner" style="position:relative;">
        <a class="nav-logo" href="{{ route('home') }}">
            <div class="logo-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="3" width="20" height="14" rx="2"/>
                    <path d="M8 21h8"/>
                    <path d="M12 17v4"/>
                </svg>
            </div>
            InfraHome<span>Tech</span>
        </a>
        <button class="hamburger" onclick="toggleMenu()" id="hamburgerBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="6" x2="21" y2="6"/>
                <line x1="3" y1="12" x2="21" y2="12"/>
                <line x1="3" y1="18" x2="21" y2="18"/>
            </svg>
        </button>
        <div class="nav-links" id="navLinks">
            <a href="{{ route('home') }}" id="nav-home" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('about') }}" id="nav-about" class="{{ request()->is('about') ? 'active' : '' }}">Tentang</a>
            <a href="{{ route('services.index') }}" id="nav-services" class="{{ request()->is('services*') ? 'active' : '' }}">Layanan</a>
            <a href="{{ route('articles.index') }}" id="nav-articles" class="{{ request()->is('articles*') ? 'active' : '' }}">Artikel</a>
            <a href="{{ route('contact.index') }}" id="nav-contact" class="{{ request()->is('contact') ? 'active' : '' }}">Kontak</a>
        </div>
        <button class="nav-cta" onclick="openWA()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                <path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.895-1.424A9.956 9.956 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2"/>
            </svg>
            Contact Us
        </button>
    </div>
</nav>

<script>
    function toggleMenu() {
        const navLinks = document.getElementById('navLinks');
        navLinks.classList.toggle('open');
    }

    function openWA() {
        const phone = '6281234567890';
        const message = 'Hello TechFix, I need IT support assistance.';
        window.open(`https://wa.me/${phone}?text=${encodeURIComponent(message)}`, '_blank');
    }

    function showPage(pageId) {
        document.getElementById('navLinks').classList.remove('open');
        
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.classList.remove('active');
        });
        const activeLink = document.getElementById('nav-' + pageId);
        if (activeLink) {
            activeLink.classList.add('active');
        }
    }
</script>
