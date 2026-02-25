<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'TechFix – IT Home Service' }}</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'Professional IT Support Services for businesses of all sizes. 24/7 support, cloud solutions, and network security.')">
    <meta name="keywords" content="@yield('keywords', 'IT support, technical support, network security, cloud solutions')">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', 'TechFix – IT Home Service')">
    <meta property="og:description" content="@yield('og_description', 'Professional IT Support Services')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    <meta property="og:type" content="website">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --blue-950: #0a1628;
            --blue-900: #0f2240;
            --blue-800: #1a3a6e;
            --blue-600: #1d5fb4;
            --blue-500: #2563eb;
            --blue-400: #3b82f6;
            --blue-300: #93c5fd;
            --accent: #00d4ff;
            --accent-soft: #e0f7ff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-400: #94a3b8;
            --gray-600: #475569;
            --gray-800: #1e293b;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #fff; color: var(--gray-800); }
        .page { display: none; }
        .page.active { display: block; }

        /* NAV */
        nav {
            position: sticky; top: 0; z-index: 100;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--gray-200);
        }
        .nav-inner {
            max-width: 1200px; margin: 0 auto;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 24px; height: 68px;
        }
        .nav-logo {
            display: flex; align-items: center; gap: 10px;
            font-size: 1.25rem; font-weight: 800; color: var(--blue-900);
            cursor: pointer; text-decoration: none;
        }
        .nav-logo span { color: var(--blue-500); }
        .logo-icon {
            width: 36px; height: 36px; border-radius: 8px;
            background: linear-gradient(135deg, var(--blue-500), var(--accent));
            display: flex; align-items: center; justify-content: center;
        }
        .logo-icon svg { color: white; }
        .nav-links { display: flex; gap: 4px; }
        .nav-links a {
            padding: 8px 14px; border-radius: 8px;
            font-size: 0.875rem; font-weight: 500; color: var(--gray-600);
            cursor: pointer; text-decoration: none; transition: all 0.2s;
        }
        .nav-links a:hover { background: var(--gray-100); color: var(--blue-500); }
        .nav-links a.active { background: var(--blue-500); color: white; }
        .nav-cta {
            background: var(--blue-500); color: white;
            padding: 9px 20px; border-radius: 8px;
            font-size: 0.875rem; font-weight: 600;
            cursor: pointer; border: none; transition: all 0.2s;
            display: flex; align-items: center; gap: 6px;
        }
        .nav-cta:hover { background: var(--blue-600); transform: translateY(-1px); box-shadow: 0 4px 12px rgba(37,99,235,0.3); }
        .hamburger { display: none; background: none; border: none; cursor: pointer; padding: 4px; }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, var(--blue-950) 0%, var(--blue-900) 50%, #0d2d55 100%);
            position: relative; overflow: hidden;
            padding: 100px 24px 80px;
        }
        .hero::before {
            content: '';
            position: absolute; inset: 0;
            background: radial-gradient(ellipse 800px 600px at 80% 50%, rgba(0,212,255,0.08) 0%, transparent 70%);
        }
        .hero-grid {
            position: absolute; inset: 0; opacity: 0.04;
            background-image: linear-gradient(rgba(255,255,255,0.5) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(255,255,255,0.5) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        .hero-inner {
            max-width: 1200px; margin: 0 auto;
            display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;
            position: relative;
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(0,212,255,0.15); border: 1px solid rgba(0,212,255,0.3);
            color: var(--accent); padding: 6px 14px; border-radius: 100px;
            font-size: 0.8rem; font-weight: 600; margin-bottom: 20px;
            font-family: 'IBM Plex Mono', monospace;
        }
        .hero h1 {
            font-size: clamp(2rem, 4vw, 3.25rem);
            font-weight: 800; line-height: 1.15;
            color: white; margin-bottom: 20px;
        }
        .hero h1 span {
            background: linear-gradient(135deg, var(--accent), var(--blue-300));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .hero p { color: #94a3b8; font-size: 1.05rem; line-height: 1.7; margin-bottom: 32px; }
        .hero-btns { display: flex; gap: 12px; flex-wrap: wrap; }
        .btn-primary {
            background: var(--blue-500); color: white;
            padding: 13px 28px; border-radius: 10px;
            font-size: 0.95rem; font-weight: 600;
            border: none; cursor: pointer; transition: all 0.2s;
            display: inline-flex; align-items: center; gap: 8px;
        }
        .btn-primary:hover { background: var(--blue-600); transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,99,235,0.35); }
        .btn-wa {
            background: #25d366; color: white;
            padding: 13px 28px; border-radius: 10px;
            font-size: 0.95rem; font-weight: 600;
            border: none; cursor: pointer; transition: all 0.2s;
            display: inline-flex; align-items: center; gap: 8px;
        }
        .btn-wa:hover { background: #1fb857; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,211,102,0.3); }
        .hero-visual {
            display: flex; justify-content: center; align-items: center;
        }
        .hero-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px; padding: 32px;
            backdrop-filter: blur(10px); width: 100%;
        }
        .hero-stats {
            display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px;
        }
        .stat-box {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px; padding: 18px; text-align: center;
        }
        .stat-box .num { font-size: 1.8rem; font-weight: 800; color: var(--accent); }
        .stat-box .lbl { font-size: 0.75rem; color: #64748b; margin-top: 2px; }
        .hero-services-list { display: flex; flex-direction: column; gap: 8px; }
        .hero-svc {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 14px; border-radius: 10px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.07);
            color: #cbd5e1; font-size: 0.875rem;
        }
        .hero-svc-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--accent); flex-shrink: 0; }

        /* SECTIONS */
        .section { padding: 80px 24px; }
        .section-sm { padding: 60px 24px; }
        .container { max-width: 1200px; margin: 0 auto; }
        .section-header { text-align: center; margin-bottom: 56px; }
        .section-tag {
            display: inline-block;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.75rem; font-weight: 500;
            color: var(--blue-500); background: #eff6ff;
            padding: 4px 12px; border-radius: 100px;
            margin-bottom: 12px; letter-spacing: 0.05em; text-transform: uppercase;
        }
        .section-header h2 {
            font-size: clamp(1.6rem, 3vw, 2.4rem);
            font-weight: 800; color: var(--blue-950); line-height: 1.2;
            margin-bottom: 14px;
        }
        .section-header p { color: var(--gray-600); max-width: 560px; margin: 0 auto; line-height: 1.7; }

        /* SERVICES CARDS */
        .services-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .service-card {
            border: 1px solid var(--gray-200);
            border-radius: 16px; padding: 28px;
            transition: all 0.25s; cursor: pointer;
            background: white; position: relative; overflow: hidden;
        }
        .service-card::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0; height: 3px;
            background: linear-gradient(90deg, var(--blue-500), var(--accent));
            transform: scaleX(0); transform-origin: left;
            transition: transform 0.3s;
        }
        .service-card:hover { border-color: var(--blue-300); box-shadow: 0 8px 30px rgba(37,99,235,0.1); transform: translateY(-3px); }
        .service-card:hover::before { transform: scaleX(1); }
        .svc-icon {
            width: 52px; height: 52px; border-radius: 12px;
            background: #eff6ff; display: flex; align-items: center; justify-content: center;
            margin-bottom: 18px; font-size: 1.5rem;
        }
        .service-card h3 { font-size: 1rem; font-weight: 700; color: var(--blue-950); margin-bottom: 8px; }
        .service-card p { font-size: 0.875rem; color: var(--gray-600); line-height: 1.6; margin-bottom: 14px; }
        .service-price {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.8rem; font-weight: 500;
            color: var(--blue-500); background: #eff6ff;
            padding: 4px 10px; border-radius: 6px; display: inline-block;
        }

        /* FEATURES */
        .features-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; }
        .feature-item { text-align: center; padding: 24px 16px; }
        .feat-icon {
            width: 60px; height: 60px; border-radius: 14px;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 16px; font-size: 1.6rem;
        }
        .feature-item h3 { font-size: 0.95rem; font-weight: 700; color: var(--blue-950); margin-bottom: 8px; }
        .feature-item p { font-size: 0.82rem; color: var(--gray-600); line-height: 1.6; }

        /* ARTICLES */
        .articles-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
        .article-card {
            border: 1px solid var(--gray-200); border-radius: 16px; overflow: hidden;
            transition: all 0.25s; cursor: pointer; background: white;
        }
        .article-card:hover { box-shadow: 0 8px 30px rgba(0,0,0,0.08); transform: translateY(-3px); }
        .article-img {
            height: 180px;
            display: flex; align-items: center; justify-content: center;
            font-size: 3rem;
        }
        .article-body { padding: 20px; }
        .article-tag {
            font-size: 0.7rem; font-weight: 600; text-transform: uppercase;
            color: var(--blue-500); letter-spacing: 0.06em; margin-bottom: 8px;
            font-family: 'IBM Plex Mono', monospace;
        }
        .article-card h3 { font-size: 0.95rem; font-weight: 700; color: var(--blue-950); margin-bottom: 8px; line-height: 1.4; }
        .article-card p { font-size: 0.8rem; color: var(--gray-600); line-height: 1.6; margin-bottom: 12px; }
        .article-meta { font-size: 0.75rem; color: var(--gray-400); display: flex; gap: 12px; }

        /* ABOUT */
        .about-grid { display: grid; grid-template-columns: 1fr 1.6fr; gap: 60px; align-items: start; }
        .about-profile {
            position: sticky; top: 90px;
        }
        .profile-photo {
            width: 100%; aspect-ratio: 1; border-radius: 20px;
            background: linear-gradient(135deg, var(--blue-800), var(--blue-500));
            display: flex; align-items: center; justify-content: center;
            font-size: 5rem; margin-bottom: 24px;
        }
        .about-name { font-size: 1.4rem; font-weight: 800; color: var(--blue-950); margin-bottom: 4px; }
        .about-title { font-size: 0.9rem; color: var(--blue-500); font-weight: 600; margin-bottom: 16px; }
        .about-badges { display: flex; flex-wrap: wrap; gap: 8px; }
        .about-badge {
            font-size: 0.75rem; font-weight: 500;
            background: var(--gray-100); color: var(--gray-600);
            padding: 5px 12px; border-radius: 100px;
        }
        .about-content h2 { font-size: 1.8rem; font-weight: 800; color: var(--blue-950); margin-bottom: 16px; line-height: 1.2; }
        .about-content p { color: var(--gray-600); line-height: 1.8; margin-bottom: 20px; }
        .skills-section h3 { font-size: 1.05rem; font-weight: 700; color: var(--blue-950); margin-bottom: 16px; }
        .skill-item { margin-bottom: 14px; }
        .skill-label { display: flex; justify-content: space-between; margin-bottom: 6px; font-size: 0.875rem; }
        .skill-label span:first-child { font-weight: 500; color: var(--gray-800); }
        .skill-label span:last-child { font-family: 'IBM Plex Mono', monospace; font-size: 0.8rem; color: var(--blue-500); }
        .skill-bar { height: 6px; background: var(--gray-200); border-radius: 100px; }
        .skill-fill { height: 100%; border-radius: 100px; background: linear-gradient(90deg, var(--blue-500), var(--accent)); }
        .values-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 24px; }
        .value-item {
            background: var(--gray-50); border-radius: 12px; padding: 16px;
            border: 1px solid var(--gray-200);
        }
        .value-item h4 { font-size: 0.875rem; font-weight: 700; color: var(--blue-950); margin-bottom: 4px; }
        .value-item p { font-size: 0.8rem; color: var(--gray-600); line-height: 1.5; }

        /* CONTACT */
        .contact-grid { display: grid; grid-template-columns: 1fr 1.4fr; gap: 50px; align-items: start; }
        .contact-info h2 { font-size: 1.8rem; font-weight: 800; color: var(--blue-950); margin-bottom: 16px; }
        .contact-info p { color: var(--gray-600); line-height: 1.7; margin-bottom: 28px; }
        .contact-item {
            display: flex; align-items: center; gap: 14px;
            padding: 16px; border-radius: 12px;
            background: var(--gray-50); border: 1px solid var(--gray-200);
            margin-bottom: 12px;
        }
        .contact-item-icon {
            width: 42px; height: 42px; border-radius: 10px;
            background: #eff6ff; display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem; flex-shrink: 0;
        }
        .contact-item h4 { font-size: 0.8rem; font-weight: 500; color: var(--gray-400); margin-bottom: 2px; }
        .contact-item p { font-size: 0.9rem; font-weight: 600; color: var(--blue-950); margin: 0; }
        .contact-form {
            background: white; border: 1px solid var(--gray-200);
            border-radius: 20px; padding: 36px;
        }
        .contact-form h3 { font-size: 1.15rem; font-weight: 700; color: var(--blue-950); margin-bottom: 24px; }
        .form-group { margin-bottom: 18px; }
        .form-group label {
            display: block; font-size: 0.85rem; font-weight: 600;
            color: var(--gray-800); margin-bottom: 6px;
        }
        .form-control {
            width: 100%; padding: 11px 14px;
            border: 1.5px solid var(--gray-200); border-radius: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.9rem; color: var(--gray-800);
            transition: border-color 0.2s; outline: none;
            background: var(--gray-50);
        }
        .form-control:focus { border-color: var(--blue-400); background: white; box-shadow: 0 0 0 3px rgba(59,130,246,0.1); }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .btn-submit {
            width: 100%; padding: 14px;
            background: var(--blue-500); color: white;
            border: none; border-radius: 10px; cursor: pointer;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.95rem; font-weight: 600;
            transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-submit:hover { background: var(--blue-600); transform: translateY(-1px); box-shadow: 0 4px 14px rgba(37,99,235,0.3); }

        /* SERVICE DETAIL PAGE */
        .breadcrumb {
            display: flex; align-items: center; gap: 8px;
            font-size: 0.85rem; color: var(--gray-400); margin-bottom: 32px;
            flex-wrap: wrap;
        }
        .breadcrumb span { cursor: pointer; }
        .breadcrumb span:hover { color: var(--blue-500); }
        .breadcrumb .sep { color: var(--gray-300); }
        .service-detail-header {
            background: linear-gradient(135deg, var(--blue-950), var(--blue-800));
            padding: 70px 24px; color: white; text-align: center;
        }
        .service-detail-icon {
            font-size: 3rem; margin-bottom: 16px;
            width: 80px; height: 80px; border-radius: 20px;
            background: rgba(255,255,255,0.1);
            display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;
        }
        .service-detail-header h1 { font-size: 2rem; font-weight: 800; margin-bottom: 12px; }
        .service-detail-header p { color: #94a3b8; max-width: 500px; margin: 0 auto; line-height: 1.7; }
        .scope-list { display: flex; flex-direction: column; gap: 10px; }
        .scope-item {
            display: flex; align-items: flex-start; gap: 12px;
            padding: 14px; background: var(--gray-50); border-radius: 10px;
            border: 1px solid var(--gray-200);
        }
        .scope-check { color: #22c55e; font-size: 1rem; margin-top: 1px; flex-shrink: 0; }

        /* ARTICLES PAGE */
        .articles-page-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }

        /* CTA BANNER */
        .cta-banner {
            background: linear-gradient(135deg, var(--blue-900), var(--blue-800));
            padding: 70px 24px; text-align: center;
        }
        .cta-banner h2 { font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; color: white; margin-bottom: 14px; }
        .cta-banner p { color: #94a3b8; margin-bottom: 28px; }
        .cta-btns { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
        .btn-outline-white {
            padding: 13px 28px; border-radius: 10px;
            font-size: 0.95rem; font-weight: 600;
            border: 1.5px solid rgba(255,255,255,0.3); color: white;
            background: transparent; cursor: pointer; transition: all 0.2s;
        }
        .btn-outline-white:hover { background: rgba(255,255,255,0.08); }

        /* FOOTER */
        footer {
            background: var(--blue-950);
            padding: 48px 24px 24px; color: #64748b;
        }
        .footer-inner { max-width: 1200px; margin: 0 auto; }
        .footer-top { display: grid; grid-template-columns: 1.5fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 40px; }
        .footer-brand { }
        .footer-logo { font-size: 1.25rem; font-weight: 800; color: white; margin-bottom: 12px; }
        .footer-logo span { color: var(--accent); }
        .footer-desc { font-size: 0.85rem; line-height: 1.7; }
        .footer-col h4 { font-size: 0.875rem; font-weight: 700; color: #cbd5e1; margin-bottom: 14px; }
        .footer-col a {
            display: block; font-size: 0.85rem; color: #64748b;
            margin-bottom: 8px; text-decoration: none; cursor: pointer; transition: color 0.2s;
        }
        .footer-col a:hover { color: var(--accent); }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.07);
            padding-top: 20px; display: flex; justify-content: space-between; align-items: center;
            font-size: 0.8rem;
        }

        /* MOBILE */
        @media (max-width: 768px) {
            .nav-links { display: none; }
            .nav-links.open {
                display: flex; flex-direction: column; gap: 4px;
                position: absolute; top: 68px; left: 0; right: 0;
                background: white; padding: 12px; border-bottom: 1px solid var(--gray-200);
                z-index: 99;
            }
            .hamburger { display: block; }
            .hero-inner { grid-template-columns: 1fr; gap: 40px; }
            .hero-visual { display: none; }
            .services-grid { grid-template-columns: 1fr 1fr; }
            .features-grid { grid-template-columns: 1fr 1fr; }
            .articles-grid, .articles-page-grid { grid-template-columns: 1fr; }
            .about-grid { grid-template-columns: 1fr; }
            .about-profile { position: static; }
            .contact-grid { grid-template-columns: 1fr; }
            .footer-top { grid-template-columns: 1fr 1fr; }
            .values-grid { grid-template-columns: 1fr; }
            .form-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 500px) {
            .services-grid { grid-template-columns: 1fr; }
            .features-grid { grid-template-columns: 1fr 1fr; }
        }

        /* ANIMATIONS */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .page.active .hero-content { animation: fadeInUp 0.6s ease both; }
        .page.active .hero-visual { animation: fadeInUp 0.6s 0.2s ease both; }
        .bg-gray-50 { background: var(--gray-50); }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Header -->
    <x-header />

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <x-footer />

    <!-- Scripts -->
    @stack('scripts')

    <script>
        // Initialize Flowbite components
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFlowbite);
        } else {
            initFlowbite();
        }

        // WhatsApp function
        function openWA() {
            const phone = '6281234567890'; // Ganti dengan nomor WhatsApp Anda
            const message = 'Halo TechFix, saya butuh bantuan IT support.';
            window.open(`https://wa.me/${phone}?text=${encodeURIComponent(message)}`, '_blank');
        }

        // Mobile menu toggle
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('open');
        }

        // Page navigation (for SPA-like behavior if needed)
        function showPage(pageId) {
            // Hide all pages
            document.querySelectorAll('.page').forEach(page => {
                page.classList.remove('active');
            });
            // Show target page
            const targetPage = document.getElementById('page-' + pageId);
            if (targetPage) {
                targetPage.classList.add('active');
            }
            // Update nav links
            document.querySelectorAll('.nav-links a').forEach(link => {
                link.classList.remove('active');
            });
            const activeLink = document.getElementById('nav-' + pageId);
            if (activeLink) {
                activeLink.classList.add('active');
            }
            // Close mobile menu
            document.getElementById('navLinks').classList.remove('open');
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
</body>
</html>
