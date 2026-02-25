<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TechFix – IT Home Service</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet" />
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
</head>
<body>

<!-- NAVBAR -->
<nav id="navbar">
  <div class="nav-inner" style="position:relative;">
    <a class="nav-logo" onclick="showPage('home')">
      <div class="logo-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg>
      </div>
      Tech<span>Fix</span>
    </a>
    <button class="hamburger" onclick="toggleMenu()" id="hamburgerBtn">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#374151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
    </button>
    <div class="nav-links" id="navLinks">
      <a onclick="showPage('home')" id="nav-home" class="active">Beranda</a>
      <a onclick="showPage('about')" id="nav-about">About</a>
      <a onclick="showPage('services')" id="nav-services">Layanan</a>
      <a onclick="showPage('articles')" id="nav-articles">Artikel</a>
      <a onclick="showPage('contact')" id="nav-contact">Kontak</a>
    </div>
    <button class="nav-cta" onclick="openWA()">
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/><path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.895-1.424A9.956 9.956 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2"/></svg>
      WhatsApp
    </button>
  </div>
</nav>

<!-- ======================== HOME PAGE ======================== -->
<div id="page-home" class="page active">
  <!-- HERO -->
  <section class="hero">
    <div class="hero-grid"></div>
    <div class="hero-inner">
      <div class="hero-content">
        <div class="hero-badge">
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10"/></svg>
          Layanan Tersedia Sekarang
        </div>
        <h1>Solusi IT Support <span>Profesional</span> untuk Kebutuhan Anda</h1>
        <p>Service laptop, instalasi jaringan, backup data, hingga keamanan siber. Cepat, terpercaya, dan berpengalaman lebih dari 8 tahun.</p>
        <div class="hero-btns">
          <button class="btn-primary" onclick="showPage('services')">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
            Lihat Layanan
          </button>
          <button class="btn-wa" onclick="openWA()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/><path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.895-1.424A9.956 9.956 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2"/></svg>
            Hubungi Sekarang
          </button>
        </div>
      </div>
      <div class="hero-visual">
        <div class="hero-card">
          <div class="hero-stats">
            <div class="stat-box"><div class="num">500+</div><div class="lbl">Klien Puas</div></div>
            <div class="stat-box"><div class="num">8+</div><div class="lbl">Tahun Pengalaman</div></div>
            <div class="stat-box"><div class="num">24/7</div><div class="lbl">Support</div></div>
            <div class="stat-box"><div class="num">98%</div><div class="lbl">Solved Rate</div></div>
          </div>
          <div class="hero-services-list">
            <div class="hero-svc"><div class="hero-svc-dot"></div>🖥️ Service Laptop & PC</div>
            <div class="hero-svc"><div class="hero-svc-dot" style="background:#34d399"></div>🌐 Instalasi Jaringan</div>
            <div class="hero-svc"><div class="hero-svc-dot" style="background:#f59e0b"></div>💾 Recovery Data</div>
            <div class="hero-svc"><div class="hero-svc-dot" style="background:#a78bfa"></div>🛡️ Keamanan Sistem</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- LAYANAN UTAMA -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <div class="section-tag">Layanan Kami</div>
        <h2>Apa yang Bisa Kami Bantu?</h2>
        <p>Dari masalah hardware hingga keamanan jaringan, kami siap menangani semua kebutuhan IT Anda dengan profesional.</p>
      </div>
      <div class="services-grid">
        <div class="service-card" onclick="showPage('service-detail', 'laptop')">
          <div class="svc-icon">🖥️</div>
          <h3>Service Laptop & PC</h3>
          <p>Perbaikan hardware, penggantian komponen, cleaning, dan upgrade performa perangkat Anda.</p>
          <span class="service-price">Mulai Rp 100.000</span>
        </div>
        <div class="service-card" onclick="showPage('service-detail', 'network')">
          <div class="svc-icon">🌐</div>
          <h3>Instalasi Jaringan</h3>
          <p>Setup WiFi, LAN, konfigurasi router, dan troubleshooting koneksi internet rumah/kantor.</p>
          <span class="service-price">Mulai Rp 200.000</span>
        </div>
        <div class="service-card" onclick="showPage('service-detail', 'data')">
          <div class="svc-icon">💾</div>
          <h3>Recovery & Backup Data</h3>
          <p>Pemulihan data hilang atau rusak, serta setup sistem backup otomatis yang aman.</p>
          <span class="service-price">Mulai Rp 250.000</span>
        </div>
        <div class="service-card" onclick="showPage('service-detail', 'software')">
          <div class="svc-icon">⚙️</div>
          <h3>Instalasi Software</h3>
          <p>Instalasi OS, driver, software produktivitas, antivirus, dan konfigurasi sistem.</p>
          <span class="service-price">Mulai Rp 75.000</span>
        </div>
        <div class="service-card" onclick="showPage('service-detail', 'security')">
          <div class="svc-icon">🛡️</div>
          <h3>Keamanan & Antivirus</h3>
          <p>Pembersihan virus/malware, hardening sistem, dan setup proteksi menyeluruh.</p>
          <span class="service-price">Mulai Rp 150.000</span>
        </div>
        <div class="service-card" onclick="showPage('service-detail', 'remote')">
          <div class="svc-icon">🖱️</div>
          <h3>Remote Support</h3>
          <p>Bantuan teknis jarak jauh untuk troubleshooting cepat tanpa perlu kunjungan langsung.</p>
          <span class="service-price">Mulai Rp 50.000</span>
        </div>
      </div>
    </div>
  </section>

  <!-- KEUNGGULAN -->
  <section class="section bg-gray-50">
    <div class="container">
      <div class="section-header">
        <div class="section-tag">Mengapa Kami?</div>
        <h2>Keunggulan TechFix</h2>
        <p>Bukan sekadar teknisi – kami adalah mitra IT yang peduli dengan keberlangsungan produktivitas Anda.</p>
      </div>
      <div class="features-grid">
        <div class="feature-item">
          <div class="feat-icon">⚡</div>
          <h3>Respons Cepat</h3>
          <p>Dalam hitungan jam masalah IT Anda sudah mulai ditangani. Tidak ada waktu menunggu lama.</p>
        </div>
        <div class="feature-item">
          <div class="feat-icon">🎯</div>
          <h3>Tepat Sasaran</h3>
          <p>Diagnosa akurat dengan pendekatan sistematis. Tidak ada tebak-tebakan dalam perbaikan.</p>
        </div>
        <div class="feature-item">
          <div class="feat-icon">🔒</div>
          <h3>Terpercaya</h3>
          <p>Data dan privasi Anda aman bersama kami. Beroperasi dengan profesionalisme tinggi.</p>
        </div>
        <div class="feature-item">
          <div class="feat-icon">💬</div>
          <h3>Komunikatif</h3>
          <p>Selalu menjelaskan masalah dan solusi dengan bahasa yang mudah dipahami.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ARTIKEL PREVIEW -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <div class="section-tag">Artikel Terbaru</div>
        <h2>Tips & Panduan IT</h2>
        <p>Edukasi teknologi untuk membantu Anda merawat dan memaksimalkan perangkat digital.</p>
      </div>
      <div class="articles-grid">
        <div class="article-card" onclick="showPage('article-detail', 'a1')">
          <div class="article-img" style="background: linear-gradient(135deg,#eff6ff,#dbeafe);">💻</div>
          <div class="article-body">
            <div class="article-tag">Tips & Trik</div>
            <h3>7 Cara Menjaga Laptop Tetap Cepat dan Responsif</h3>
            <p>Laptop lemot bisa sangat mengganggu produktivitas. Simak tips sederhana ini untuk menjaga performa optimal.</p>
            <div class="article-meta"><span>15 Jan 2025</span><span>• 5 menit baca</span></div>
          </div>
        </div>
        <div class="article-card" onclick="showPage('article-detail', 'a2')">
          <div class="article-img" style="background: linear-gradient(135deg,#f0fdf4,#dcfce7);">🌐</div>
          <div class="article-body">
            <div class="article-tag">Jaringan</div>
            <h3>Cara Mengamankan Jaringan WiFi Rumah dari Pembajak</h3>
            <p>WiFi yang tidak aman bisa dibobol siapa saja. Pelajari langkah-langkah melindungi jaringan rumah Anda.</p>
            <div class="article-meta"><span>8 Jan 2025</span><span>• 6 menit baca</span></div>
          </div>
        </div>
        <div class="article-card" onclick="showPage('article-detail', 'a3')">
          <div class="article-img" style="background: linear-gradient(135deg,#fefce8,#fef9c3);">🛡️</div>
          <div class="article-body">
            <div class="article-tag">Keamanan</div>
            <h3>Tanda-tanda PC Anda Terinfeksi Malware dan Cara Mengatasinya</h3>
            <p>Kenali gejala awal infeksi virus dan tindakan yang harus segera dilakukan untuk menyelamatkan data Anda.</p>
            <div class="article-meta"><span>2 Jan 2025</span><span>• 7 menit baca</span></div>
          </div>
        </div>
      </div>
      <div style="text-align:center;margin-top:36px;">
        <button class="btn-primary" onclick="showPage('articles')">Lihat Semua Artikel →</button>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-banner">
    <div class="container">
      <h2>Ada masalah IT? Hubungi kami sekarang!</h2>
      <p>Konsultasi gratis, estimasi harga transparan, penanganan profesional.</p>
      <div class="cta-btns">
        <button class="btn-wa" onclick="openWA()">💬 Chat via WhatsApp</button>
        <button class="btn-outline-white" onclick="showPage('contact')">Kirim Pesan</button>
      </div>
    </div>
  </section>

  <footer>
    <div class="footer-inner">
      <div class="footer-top">
        <div class="footer-brand">
          <div class="footer-logo">Tech<span>Fix</span></div>
          <p class="footer-desc">Layanan IT Support profesional untuk rumah dan bisnis kecil. Cepat, terpercaya, berpengalaman.</p>
        </div>
        <div class="footer-col">
          <h4>Halaman</h4>
          <a onclick="showPage('home')">Beranda</a>
          <a onclick="showPage('about')">About</a>
          <a onclick="showPage('services')">Layanan</a>
          <a onclick="showPage('articles')">Artikel</a>
          <a onclick="showPage('contact')">Kontak</a>
        </div>
        <div class="footer-col">
          <h4>Layanan</h4>
          <a onclick="showPage('service-detail','laptop')">Service Laptop</a>
          <a onclick="showPage('service-detail','network')">Instalasi Jaringan</a>
          <a onclick="showPage('service-detail','data')">Recovery Data</a>
          <a onclick="showPage('service-detail','security')">Keamanan Sistem</a>
        </div>
        <div class="footer-col">
          <h4>Kontak</h4>
          <a>📱 +62 812-3456-7890</a>
          <a>📧 hello@techfix.id</a>
          <a>📍 Jakarta Selatan</a>
          <a>⏰ Senin–Sabtu, 08–20</a>
        </div>
      </div>
      <div class="footer-bottom">
        <span>© 2025 TechFix. All rights reserved.</span>
        <span>Made with ❤️ for tech users</span>
      </div>
    </div>
  </footer>
</div>

<!-- ======================== ABOUT PAGE ======================== -->
<div id="page-about" class="page">
  <div style="background: linear-gradient(135deg, var(--blue-950), var(--blue-800)); padding: 60px 24px; text-align:center;">
    <div class="container">
      <div class="section-tag" style="color:var(--accent);background:rgba(0,212,255,0.15);">Tentang Saya</div>
      <h1 style="font-size:2rem;font-weight:800;color:white;margin-top:10px;">Kenalan dengan TechFix</h1>
    </div>
  </div>
  <section class="section">
    <div class="container">
      <div class="about-grid">
        <div class="about-profile">
          <div class="profile-photo">👨‍💻</div>
          <div class="about-name">Ahmad Rizky Pratama</div>
          <div class="about-title">IT Support Specialist & Network Engineer</div>
          <div class="about-badges">
            <span class="about-badge">CompTIA A+</span>
            <span class="about-badge">CCNA</span>
            <span class="about-badge">MCP Windows</span>
            <span class="about-badge">Linux Sysadmin</span>
          </div>
        </div>
        <div class="about-content">
          <h2>8 Tahun Membantu Masalah IT Anda</h2>
          <p>Saya adalah teknisi IT berpengalaman yang telah membantu ratusan individu dan bisnis kecil mengatasi berbagai permasalahan teknologi. Berawal dari hobi sejak remaja, kini passion ini telah menjadi profesi yang saya tekuni dengan sepenuh hati.</p>
          <p>Dengan sertifikasi internasional dan pengalaman lapangan yang luas, saya memastikan setiap pekerjaan diselesaikan dengan standar tinggi dan komunikasi yang jujur. Tidak ada biaya tersembunyi, tidak ada solusi asal-asalan.</p>
          <div class="skills-section">
            <h3>Keahlian Teknis</h3>
            <div class="skill-item">
              <div class="skill-label"><span>Hardware Repair & Maintenance</span><span>95%</span></div>
              <div class="skill-bar"><div class="skill-fill" style="width:95%"></div></div>
            </div>
            <div class="skill-item">
              <div class="skill-label"><span>Network Configuration</span><span>88%</span></div>
              <div class="skill-bar"><div class="skill-fill" style="width:88%"></div></div>
            </div>
            <div class="skill-item">
              <div class="skill-label"><span>Windows & Linux Administration</span><span>92%</span></div>
              <div class="skill-bar"><div class="skill-fill" style="width:92%"></div></div>
            </div>
            <div class="skill-item">
              <div class="skill-label"><span>Cybersecurity & Data Recovery</span><span>85%</span></div>
              <div class="skill-bar"><div class="skill-fill" style="width:85%"></div></div>
            </div>
          </div>
          <div class="values-grid">
            <div class="value-item">
              <h4>🎯 Transparan</h4>
              <p>Estimasi harga jelas di awal, tidak ada biaya kejutan di akhir pengerjaan.</p>
            </div>
            <div class="value-item">
              <h4>⚡ Responsif</h4>
              <p>Tersedia 7 hari seminggu dengan waktu respons di bawah 2 jam untuk konsultasi.</p>
            </div>
            <div class="value-item">
              <h4>🔒 Bertanggung Jawab</h4>
              <p>Garansi pengerjaan 30 hari. Jika masalah sama muncul kembali, gratis penanganan ulang.</p>
            </div>
            <div class="value-item">
              <h4>🤝 Edukatif</h4>
              <p>Selalu menjelaskan penyebab masalah dan cara mencegahnya agar Anda lebih mandiri.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="cta-banner">
    <div class="container">
      <h2>Tertarik bekerja sama dengan saya?</h2>
      <p>Hubungi sekarang untuk konsultasi gratis dan tanpa tekanan.</p>
      <div class="cta-btns">
        <button class="btn-wa" onclick="openWA()">💬 WhatsApp Sekarang</button>
        <button class="btn-outline-white" onclick="showPage('contact')">Kirim Pesan</button>
      </div>
    </div>
  </section>
</div>

<!-- ======================== SERVICES PAGE ======================== -->
<div id="page-services" class="page">
  <div style="background: linear-gradient(135deg, var(--blue-950), var(--blue-800)); padding: 60px 24px; text-align:center;">
    <div class="container">
      <div class="section-tag" style="color:var(--accent);background:rgba(0,212,255,0.15);">Layanan</div>
      <h1 style="font-size:2rem;font-weight:800;color:white;margin-top:10px;">Semua Layanan IT Support</h1>
      <p style="color:#94a3b8;margin-top:10px;max-width:500px;margin-left:auto;margin-right:auto;">Harga transparan, pengerjaan profesional, dan garansi kepuasan untuk setiap layanan.</p>
    </div>
  </div>
  <section class="section">
    <div class="container">
      <div class="services-grid">
        <div class="service-card" onclick="showPage('service-detail', 'laptop')">
          <div class="svc-icon">🖥️</div>
          <h3>Service Laptop & PC</h3>
          <p>Perbaikan hardware, penggantian komponen rusak, thermal cleaning, upgrade RAM/SSD untuk performa optimal.</p>
          <span class="service-price">Mulai Rp 100.000</span>
        </div>
        <div class="service-card" onclick="showPage('service-detail', 'network')">
          <div class="svc-icon">🌐</div>
          <h3>Instalasi Jaringan</h3>
          <p>Setup WiFi mesh, konfigurasi router enterprise, instalasi kabel LAN, dan troubleshooting koneksi.</p>
          <span class="service-price">Mulai Rp 200.000</span>
        </div>
        <div class="service-card" onclick="showPage('service-detail', 'data')">
          <div class="svc-icon">💾</div>
          <h3>Recovery & Backup Data</h3>
          <p>Pemulihan data dari HDD/SSD rusak, partisi terhapus, dan setup backup cloud otomatis.</p>
          <span class="service-price">Mulai Rp 250.000</span>
        </div>
        <div class="service-card" onclick="showPage('service-detail', 'software')">
          <div class="svc-icon">⚙️</div>
          <h3>Instalasi & Konfigurasi Software</h3>
          <p>Instalasi Windows/Linux, driver lengkap, software produktivitas, dan optimasi sistem operasi.</p>
          <span class="service-price">Mulai Rp 75.000</span>
        </div>
        <div class="service-card" onclick="showPage('service-detail', 'security')">
          <div class="svc-icon">🛡️</div>
          <h3>Keamanan & Antivirus</h3>
          <p>Pembersihan virus/malware, setup antivirus profesional, firewall, dan penguatan keamanan sistem.</p>
          <span class="service-price">Mulai Rp 150.000</span>
        </div>
        <div class="service-card" onclick="showPage('service-detail', 'remote')">
          <div class="svc-icon">🖱️</div>
          <h3>Remote Support</h3>
          <p>Bantuan teknis jarak jauh via AnyDesk/TeamViewer. Cepat dan efisien tanpa perlu kunjungan.</p>
          <span class="service-price">Mulai Rp 50.000</span>
        </div>
        <div class="service-card" onclick="showPage('service-detail', 'printer')">
          <div class="svc-icon">🖨️</div>
          <h3>Service Printer</h3>
          <p>Perbaikan printer macet, head cleaning, isi ulang tinta/toner, dan konfigurasi printer jaringan.</p>
          <span class="service-price">Mulai Rp 80.000</span>
        </div>
        <div class="service-card" onclick="showPage('service-detail', 'cctv')">
          <div class="svc-icon">📷</div>
          <h3>Instalasi CCTV & Smart Home</h3>
          <p>Pemasangan kamera CCTV, DVR/NVR setup, monitoring jarak jauh, dan integrasi smart home.</p>
          <span class="service-price">Mulai Rp 350.000</span>
        </div>
        <div class="service-card" onclick="showPage('service-detail', 'konsultasi')">
          <div class="svc-icon">💡</div>
          <h3>Konsultasi IT</h3>
          <p>Rekomendasi perangkat, perencanaan infrastruktur IT, dan panduan pembelian yang tepat budget.</p>
          <span class="service-price">Gratis (1 jam pertama)</span>
        </div>
      </div>
    </div>
  </section>
  <section class="cta-banner">
    <div class="container">
      <h2>Tidak menemukan layanan yang Anda cari?</h2>
      <p>Ceritakan masalah IT Anda dan kami akan carikan solusinya.</p>
      <div class="cta-btns">
        <button class="btn-wa" onclick="openWA()">💬 Tanya via WhatsApp</button>
        <button class="btn-outline-white" onclick="showPage('contact')">Kirim Detail Masalah</button>
      </div>
    </div>
  </section>
</div>

<!-- ======================== SERVICE DETAIL PAGE ======================== -->
<div id="page-service-detail" class="page">
  <div class="service-detail-header">
    <div class="container">
      <div class="service-detail-icon" id="svc-detail-icon">🖥️</div>
      <h1 id="svc-detail-title">Service Laptop & PC</h1>
      <p id="svc-detail-desc">Perbaikan menyeluruh untuk laptop dan komputer desktop Anda.</p>
    </div>
  </div>
  <section class="section">
    <div class="container">
      <div class="breadcrumb">
        <span onclick="showPage('home')">Beranda</span>
        <span class="sep">›</span>
        <span onclick="showPage('services')">Layanan</span>
        <span class="sep">›</span>
        <span id="svc-breadcrumb">Service Laptop & PC</span>
      </div>
      <div style="display:grid;grid-template-columns:1.5fr 1fr;gap:50px;align-items:start;" class="detail-layout">
        <div>
          <h2 style="font-size:1.5rem;font-weight:800;color:var(--blue-950);margin-bottom:16px;">Detail Layanan</h2>
          <p id="svc-detail-long" style="color:var(--gray-600);line-height:1.8;margin-bottom:28px;"></p>
          <h3 style="font-size:1rem;font-weight:700;color:var(--blue-950);margin-bottom:16px;">Cakupan Pekerjaan</h3>
          <div class="scope-list" id="svc-scope-list"></div>
        </div>
        <div>
          <div style="background:var(--gray-50);border:1px solid var(--gray-200);border-radius:16px;padding:28px;position:sticky;top:90px;">
            <div style="font-size:0.8rem;font-weight:600;color:var(--gray-400);margin-bottom:4px;">Estimasi Harga</div>
            <div id="svc-detail-price" style="font-size:1.6rem;font-weight:800;color:var(--blue-500);font-family:'IBM Plex Mono',monospace;margin-bottom:20px;"></div>
            <button class="btn-wa" style="width:100%;margin-bottom:10px;justify-content:center;" onclick="openWA()">💬 Hubungi via WhatsApp</button>
            <button class="btn-primary" style="width:100%;justify-content:center;" onclick="showPage('contact')">📧 Kirim Pesan</button>
            <div style="margin-top:16px;padding:12px;background:#f0fdf4;border-radius:10px;border:1px solid #bbf7d0;">
              <div style="font-size:0.8rem;font-weight:600;color:#15803d;">✅ Garansi 30 Hari</div>
              <div style="font-size:0.75rem;color:#166534;margin-top:2px;">Masalah berulang? Kami tangani gratis.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- ======================== ARTICLES PAGE ======================== -->
<div id="page-articles" class="page">
  <div style="background: linear-gradient(135deg, var(--blue-950), var(--blue-800)); padding: 60px 24px; text-align:center;">
    <div class="container">
      <div class="section-tag" style="color:var(--accent);background:rgba(0,212,255,0.15);">Artikel & Panduan</div>
      <h1 style="font-size:2rem;font-weight:800;color:white;margin-top:10px;">Tips & Edukasi IT</h1>
      <p style="color:#94a3b8;margin-top:10px;max-width:480px;margin-left:auto;margin-right:auto;">Panduan praktis untuk membantu Anda merawat dan memaksimalkan perangkat digital sehari-hari.</p>
    </div>
  </div>
  <section class="section">
    <div class="container">
      <div class="articles-page-grid">
        <div class="article-card" onclick="showPage('article-detail','a1')">
          <div class="article-img" style="background:linear-gradient(135deg,#eff6ff,#dbeafe);">💻</div>
          <div class="article-body">
            <div class="article-tag">Tips & Trik</div>
            <h3>7 Cara Menjaga Laptop Tetap Cepat dan Responsif</h3>
            <p>Laptop lemot bisa sangat mengganggu produktivitas. Simak tips sederhana ini untuk menjaga performa optimal sepanjang waktu.</p>
            <div class="article-meta"><span>15 Jan 2025</span><span>• 5 menit baca</span></div>
          </div>
        </div>
        <div class="article-card" onclick="showPage('article-detail','a2')">
          <div class="article-img" style="background:linear-gradient(135deg,#f0fdf4,#dcfce7);">🌐</div>
          <div class="article-body">
            <div class="article-tag">Jaringan</div>
            <h3>Cara Mengamankan Jaringan WiFi Rumah dari Pembajak</h3>
            <p>WiFi yang tidak aman bisa dibobol siapa saja. Pelajari langkah-langkah melindungi jaringan rumah Anda dari ancaman luar.</p>
            <div class="article-meta"><span>8 Jan 2025</span><span>• 6 menit baca</span></div>
          </div>
        </div>
        <div class="article-card" onclick="showPage('article-detail','a3')">
          <div class="article-img" style="background:linear-gradient(135deg,#fefce8,#fef9c3);">🛡️</div>
          <div class="article-body">
            <div class="article-tag">Keamanan</div>
            <h3>Tanda-tanda PC Anda Terinfeksi Malware dan Cara Mengatasinya</h3>
            <p>Kenali gejala awal infeksi virus dan tindakan yang harus segera dilakukan untuk menyelamatkan data Anda.</p>
            <div class="article-meta"><span>2 Jan 2025</span><span>• 7 menit baca</span></div>
          </div>
        </div>
        <div class="article-card" onclick="showPage('article-detail','a4')">
          <div class="article-img" style="background:linear-gradient(135deg,#fdf4ff,#fae8ff);">💾</div>
          <div class="article-body">
            <div class="article-tag">Data</div>
            <h3>Strategi Backup Data 3-2-1 yang Wajib Anda Ketahui</h3>
            <p>Kehilangan data bisa terjadi kapan saja. Terapkan strategi backup 3-2-1 untuk memastikan data Anda selalu aman.</p>
            <div class="article-meta"><span>28 Des 2024</span><span>• 4 menit baca</span></div>
          </div>
        </div>
        <div class="article-card" onclick="showPage('article-detail','a5')">
          <div class="article-img" style="background:linear-gradient(135deg,#fff7ed,#fed7aa);">⚡</div>
          <div class="article-body">
            <div class="article-tag">Hardware</div>
            <h3>Tanda Laptop Perlu Ganti Thermal Paste Segera</h3>
            <p>Laptop panas berlebih bisa merusak komponen internal. Kenali tanda-tanda thermal paste sudah kering dan perlu diganti.</p>
            <div class="article-meta"><span>20 Des 2024</span><span>• 5 menit baca</span></div>
          </div>
        </div>
        <div class="article-card" onclick="showPage('article-detail','a6')">
          <div class="article-img" style="background:linear-gradient(135deg,#f0fdfa,#ccfbf1);">🔋</div>
          <div class="article-body">
            <div class="article-tag">Tips & Trik</div>
            <h3>Tips Memperpanjang Usia Baterai Laptop hingga 3 Tahun</h3>
            <p>Kebiasaan pengisian daya yang salah bisa merusak baterai lebih cepat. Pelajari cara merawat baterai yang benar.</p>
            <div class="article-meta"><span>15 Des 2024</span><span>• 4 menit baca</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- ======================== ARTICLE DETAIL PAGE ======================== -->
<div id="page-article-detail" class="page">
  <section class="section">
    <div class="container" style="max-width:780px;">
      <div class="breadcrumb">
        <span onclick="showPage('home')">Beranda</span>
        <span class="sep">›</span>
        <span onclick="showPage('articles')">Artikel</span>
        <span class="sep">›</span>
        <span id="art-breadcrumb">Artikel</span>
      </div>
      <div id="art-tag" class="article-tag" style="margin-bottom:12px;font-size:0.8rem;"></div>
      <h1 id="art-title" style="font-size:clamp(1.5rem,3vw,2rem);font-weight:800;color:var(--blue-950);line-height:1.3;margin-bottom:16px;"></h1>
      <div style="display:flex;gap:16px;align-items:center;margin-bottom:32px;padding-bottom:24px;border-bottom:1px solid var(--gray-200);">
        <div style="width:40px;height:40px;border-radius:10px;background:var(--blue-500);display:flex;align-items:center;justify-content:center;color:white;font-size:1rem;">👨‍💻</div>
        <div>
          <div style="font-size:0.875rem;font-weight:600;color:var(--blue-950);">Ahmad Rizky Pratama</div>
          <div id="art-meta" style="font-size:0.8rem;color:var(--gray-400);"></div>
        </div>
      </div>
      <div id="art-content" style="color:var(--gray-600);line-height:1.9;font-size:0.95rem;"></div>
      <div style="margin-top:40px;padding:24px;background:#eff6ff;border-radius:14px;border:1px solid #bfdbfe;text-align:center;">
        <div style="font-weight:700;color:var(--blue-950);margin-bottom:8px;">Butuh bantuan teknis langsung?</div>
        <div style="font-size:0.875rem;color:var(--gray-600);margin-bottom:16px;">Konsultasikan masalah IT Anda secara gratis.</div>
        <button class="btn-wa" onclick="openWA()" style="margin:0 auto;">💬 Hubungi via WhatsApp</button>
      </div>
    </div>
  </section>
</div>

<!-- ======================== CONTACT PAGE ======================== -->
<div id="page-contact" class="page">
  <div style="background: linear-gradient(135deg, var(--blue-950), var(--blue-800)); padding: 60px 24px; text-align:center;">
    <div class="container">
      <div class="section-tag" style="color:var(--accent);background:rgba(0,212,255,0.15);">Hubungi Kami</div>
      <h1 style="font-size:2rem;font-weight:800;color:white;margin-top:10px;">Siap Membantu Anda</h1>
      <p style="color:#94a3b8;margin-top:10px;">Konsultasi gratis, respons cepat, solusi tepat.</p>
    </div>
  </div>
  <section class="section">
    <div class="container">
      <div class="contact-grid">
        <div class="contact-info">
          <h2>Mari Terhubung</h2>
          <p>Ceritakan masalah IT Anda dan kami akan memberikan estimasi solusi secara gratis. Tidak ada tekanan, tidak ada biaya awal.</p>
          <div class="contact-item">
            <div class="contact-item-icon">📱</div>
            <div><h4>WhatsApp / Telepon</h4><p>+62 812-3456-7890</p></div>
          </div>
          <div class="contact-item">
            <div class="contact-item-icon">📧</div>
            <div><h4>Email</h4><p>hello@techfix.id</p></div>
          </div>
          <div class="contact-item">
            <div class="contact-item-icon">📍</div>
            <div><h4>Area Layanan</h4><p>Jakarta Selatan & Sekitarnya</p></div>
          </div>
          <div class="contact-item">
            <div class="contact-item-icon">⏰</div>
            <div><h4>Jam Operasional</h4><p>Senin – Sabtu, 08.00 – 20.00</p></div>
          </div>
          <div style="margin-top:20px;padding:20px;background:var(--gray-50);border-radius:14px;border:1px solid var(--gray-200);">
            <div style="font-weight:700;color:var(--blue-950);margin-bottom:8px;">💬 Respons Cepat via WhatsApp</div>
            <p style="font-size:0.85rem;color:var(--gray-600);margin-bottom:14px;line-height:1.6;">Untuk respons paling cepat, hubungi langsung via WhatsApp. Biasanya kami balas dalam 30 menit.</p>
            <button class="btn-wa" onclick="openWA()" style="width:100%;justify-content:center;">💬 Buka WhatsApp</button>
          </div>
        </div>
        <div>
          <div class="contact-form">
            <h3>📤 Kirim Pesan</h3>
            <div class="form-grid">
              <div class="form-group">
                <label>Nama Lengkap *</label>
                <input type="text" class="form-control" placeholder="Budi Santoso" />
              </div>
              <div class="form-group">
                <label>Email *</label>
                <input type="email" class="form-control" placeholder="budi@email.com" />
              </div>
            </div>
            <div class="form-group">
              <label>Nomor WhatsApp</label>
              <input type="tel" class="form-control" placeholder="+62 812-xxxx-xxxx" />
            </div>
            <div class="form-group">
              <label>Subjek / Jenis Masalah *</label>
              <select class="form-control">
                <option value="">— Pilih jenis masalah —</option>
                <option>Service Laptop / PC</option>
                <option>Instalasi Jaringan</option>
                <option>Recovery Data</option>
                <option>Instalasi Software</option>
                <option>Keamanan & Antivirus</option>
                <option>Remote Support</option>
                <option>Lainnya</option>
              </select>
            </div>
            <div class="form-group">
              <label>Deskripsi Masalah *</label>
              <textarea class="form-control" rows="5" placeholder="Ceritakan detail masalah IT Anda. Semakin detail, semakin akurat estimasi yang bisa kami berikan..."></textarea>
            </div>
            <button class="btn-submit" onclick="submitForm()">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
              Kirim Pesan
            </button>
          </div>
          <div id="form-success" style="display:none;text-align:center;padding:40px;background:#f0fdf4;border:1px solid #bbf7d0;border-radius:16px;margin-top:16px;">
            <div style="font-size:3rem;margin-bottom:12px;">✅</div>
            <div style="font-size:1.1rem;font-weight:700;color:#15803d;">Pesan Berhasil Dikirim!</div>
            <p style="color:#166534;margin-top:8px;font-size:0.875rem;">Kami akan menghubungi Anda secepatnya. Biasanya dalam 1–2 jam kerja.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
  const serviceData = {
    laptop: {
      icon: '🖥️', title: 'Service Laptop & PC',
      desc: 'Solusi perbaikan menyeluruh untuk laptop dan komputer desktop Anda.',
      price: 'Mulai Rp 100.000',
      long: 'Layanan service laptop dan PC mencakup diagnosis masalah secara menyeluruh, mulai dari kerusakan hardware seperti layar retak, keyboard tidak berfungsi, baterai drop, hingga masalah performa seperti lemot, overheat, dan sering restart sendiri. Setiap pengerjaan menggunakan suku cadang berkualitas dan dilakukan oleh teknisi bersertifikat.',
      scope: ['Diagnosa dan konsultasi masalah', 'Perbaikan dan penggantian hardware (layar, keyboard, baterai)', 'Thermal cleaning dan penggantian thermal paste', 'Upgrade RAM, SSD, dan komponen lainnya', 'Perbaikan port USB, HDMI, dan charger', 'Pembersihan debu dan perawatan berkala', 'Pengujian performa setelah pengerjaan']
    },
    network: {
      icon: '🌐', title: 'Instalasi Jaringan',
      desc: 'Setup jaringan WiFi dan LAN untuk rumah dan kantor kecil Anda.',
      price: 'Mulai Rp 200.000',
      long: 'Layanan instalasi jaringan mencakup perencanaan, pemasangan, dan konfigurasi infrastruktur jaringan rumah maupun kantor kecil. Kami memastikan koneksi stabil, aman, dan optimal sesuai kebutuhan pengguna dengan menggunakan perangkat jaringan berkualitas dari merk terpercaya.',
      scope: ['Survei lokasi dan perencanaan jaringan', 'Instalasi dan konfigurasi router/access point', 'Pemasangan kabel LAN CAT6', 'Setup WiFi mesh untuk coverage luas', 'Konfigurasi VLAN dan segmentasi jaringan', 'Setup bandwidth management', 'Troubleshooting koneksi internet lambat']
    },
    data: {
      icon: '💾', title: 'Recovery & Backup Data',
      desc: 'Pemulihan data yang hilang dan setup sistem backup otomatis.',
      price: 'Mulai Rp 250.000',
      long: 'Kehilangan data bisa sangat merusak produktivitas dan menyebabkan kerugian besar. Layanan data recovery kami menggunakan tools profesional untuk memulihkan file dari berbagai kondisi, mulai dari format tidak sengaja, kerusakan sistem file, hingga bad sector pada HDD/SSD. Garansi: jika data tidak berhasil dipulihkan, tidak ada biaya.',
      scope: ['Diagnosa kondisi storage (HDD/SSD/Flash)', 'Recovery dari partisi terhapus atau format', 'Pemulihan file foto, dokumen, dan database', 'Recovery dari sistem yang tidak bisa boot', 'Setup backup otomatis ke cloud (Google Drive, OneDrive)', 'Konfigurasi backup lokal dengan NAS', 'Edukasi strategi backup 3-2-1']
    },
    software: {
      icon: '⚙️', title: 'Instalasi & Konfigurasi Software',
      desc: 'Instalasi OS, driver, dan software produktivitas secara lengkap.',
      price: 'Mulai Rp 75.000',
      long: 'Layanan instalasi software mencakup pemasangan sistem operasi (Windows 10/11, Ubuntu, Linux Mint), instalasi driver lengkap, software produktivitas, dan konfigurasi sistem untuk performa terbaik. Kami memastikan semua software terinstall dengan benar dan sistem siap digunakan optimal.',
      scope: ['Instalasi Windows 10/11 atau Linux', 'Instalasi driver hardware lengkap', 'Setup Microsoft Office / LibreOffice', 'Instalasi software desain, akuntansi, dll', 'Konfigurasi startup dan performa sistem', 'Aktivasi dan lisensi software legal', 'Edukasi penggunaan fitur-fitur penting']
    },
    security: {
      icon: '🛡️', title: 'Keamanan & Antivirus',
      desc: 'Pembersihan virus/malware dan hardening keamanan sistem secara profesional.',
      price: 'Mulai Rp 150.000',
      long: 'Sistem yang terinfeksi virus/malware tidak hanya lambat, tapi juga berpotensi mencuri data sensitif Anda. Layanan keamanan kami melakukan pemindaian mendalam, pembersihan tuntas, dan penguatan sistem agar tahan terhadap ancaman yang akan datang.',
      scope: ['Pemindaian dan pembersihan virus/malware/spyware', 'Instalasi dan konfigurasi antivirus profesional', 'Setup Windows Firewall dan keamanan jaringan', 'Penghapusan ransomware dan pemulihan file', 'Hardening sistem operasi', 'Audit keamanan password dan akun', 'Edukasi keamanan siber untuk pengguna']
    },
    remote: {
      icon: '🖱️', title: 'Remote Support',
      desc: 'Bantuan teknis jarak jauh via AnyDesk/TeamViewer untuk solusi cepat.',
      price: 'Mulai Rp 50.000',
      long: 'Tidak semua masalah IT memerlukan kunjungan langsung. Dengan remote support, kami bisa mengakses komputer Anda dari jarak jauh (dengan izin penuh dari Anda) untuk mendiagnosa dan menyelesaikan berbagai masalah software, konfigurasi, dan troubleshooting dalam waktu singkat.',
      scope: ['Troubleshooting masalah software dan error', 'Konfigurasi dan setting sistem', 'Instalasi dan update software jarak jauh', 'Pembersihan file sampah dan optimasi', 'Bantuan setting email dan aplikasi bisnis', 'Konsultasi teknis via video call', 'Sesi maksimal 1 jam per sesi']
    },
    printer: {
      icon: '🖨️', title: 'Service Printer',
      desc: 'Perbaikan dan perawatan semua jenis printer inkjet maupun laser.',
      price: 'Mulai Rp 80.000',
      long: 'Printer bermasalah bisa menghambat pekerjaan penting Anda. Layanan service printer kami menangani berbagai merek dan jenis printer, mulai dari printer inkjet untuk kebutuhan sehari-hari hingga printer laser untuk kebutuhan bisnis.',
      scope: ['Perbaikan printer paper jam / macet kertas', 'Cleaning head dan nozzle tersumbat', 'Isi ulang tinta/toner', 'Penggantian cartridge dan drum', 'Konfigurasi printer jaringan (WiFi/LAN)', 'Reset counter ink absorber', 'Perbaikan error kode pada printer']
    },
    cctv: {
      icon: '📷', title: 'Instalasi CCTV & Smart Home',
      desc: 'Pemasangan sistem keamanan CCTV dan integrasi perangkat smart home.',
      price: 'Mulai Rp 350.000',
      long: 'Keamanan rumah dan kantor Anda adalah prioritas kami. Layanan instalasi CCTV mencakup survei lokasi, pemasangan kamera di titik strategis, konfigurasi DVR/NVR, dan setup monitoring jarak jauh dari smartphone Anda kapanpun dan dimanapun.',
      scope: ['Survei dan perencanaan penempatan kamera', 'Instalasi kamera CCTV indoor/outdoor', 'Setup DVR/NVR dan hard drive', 'Konfigurasi monitoring via aplikasi HP', 'Instalasi kabel dan perapian', 'Setup notifikasi gerak otomatis', 'Integrasi dengan smart home (Google Home, Alexa)']
    },
    konsultasi: {
      icon: '💡', title: 'Konsultasi IT',
      desc: 'Panduan dan rekomendasi IT profesional untuk kebutuhan Anda.',
      price: 'Gratis (1 jam pertama)',
      long: 'Bingung memilih perangkat baru? Ingin membangun infrastruktur IT yang tepat untuk bisnis kecil? Konsultasi IT kami hadir untuk membantu Anda membuat keputusan teknologi yang tepat, hemat biaya, dan sesuai dengan kebutuhan nyata Anda tanpa tekanan apapun.',
      scope: ['Rekomendasi laptop/PC sesuai kebutuhan dan budget', 'Perencanaan infrastruktur IT bisnis', 'Konsultasi perangkat jaringan', 'Audit IT sistem yang sudah ada', 'Panduan migrasi ke cloud', 'Rekomendasi software bisnis', 'Diskusi strategi keamanan IT']
    }
  };

  const articleData = {
    a1: {
      tag: 'Tips & Trik', title: '7 Cara Menjaga Laptop Tetap Cepat dan Responsif', meta: '15 Januari 2025 • 5 menit baca',
      content: `<p style="margin-bottom:16px;">Laptop yang lemot adalah masalah paling umum yang sering dikeluhkan. Kabar baiknya, sebagian besar penyebab kelemotan laptop bisa diatasi tanpa harus ke service center.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">1. Bersihkan File Sampah Secara Rutin</h3>
<p style="margin-bottom:16px;">File temporary, cache, dan file sampah bisa menumpuk hingga beberapa gigabyte. Gunakan Windows Disk Cleanup atau CCleaner secara rutin minimal sebulan sekali untuk membersihkannya.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">2. Kelola Program Startup</h3>
<p style="margin-bottom:16px;">Terlalu banyak program yang berjalan saat startup akan memperlambat proses booting dan menyita RAM. Buka Task Manager → Startup, lalu nonaktifkan program yang tidak perlu.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">3. Upgrade ke SSD</h3>
<p style="margin-bottom:16px;">Jika laptop Anda masih menggunakan HDD, upgrade ke SSD adalah investasi terbaik. SSD bisa membuat laptop booting 5-10x lebih cepat dan membuka aplikasi jauh lebih responsif.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">4. Tambah RAM</h3>
<p style="margin-bottom:16px;">RAM minimal 8GB sangat disarankan untuk penggunaan multitasking modern. Jika laptop Anda masih 4GB, upgrade RAM bisa memberikan peningkatan performa yang signifikan.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">5. Bersihkan Debu Secara Berkala</h3>
<p style="margin-bottom:16px;">Debu yang menumpuk pada heatsink dan kipas akan menyebabkan laptop overheat. Ketika terlalu panas, CPU akan throttling (menurunkan performa) untuk melindungi diri. Bersihkan setidaknya 6 bulan sekali.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">6. Update Driver dan Windows Secara Rutin</h3>
<p style="margin-bottom:16px;">Driver yang outdated seringkali menyebabkan masalah performa dan kompatibilitas. Pastikan Windows Update dan driver GPU/chipset selalu diperbarui.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">7. Scan Virus Secara Berkala</h3>
<p>Malware bisa berjalan di background dan memakan resource CPU/RAM secara diam-diam. Pastikan antivirus Anda aktif dan lakukan full scan minimal sebulan sekali.</p>`
    },
    a2: {
      tag: 'Jaringan', title: 'Cara Mengamankan Jaringan WiFi Rumah dari Pembajak', meta: '8 Januari 2025 • 6 menit baca',
      content: `<p style="margin-bottom:16px;">Jaringan WiFi yang tidak aman adalah undangan terbuka bagi siapa saja untuk menggunakan internet gratis Anda — bahkan lebih buruk, untuk mengintai aktivitas online Anda.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Ganti Password Default Router</h3>
<p style="margin-bottom:16px;">Router baru biasanya memiliki username/password default yang mudah ditebak (admin/admin). Segera ganti keduanya melalui halaman admin router (biasanya 192.168.1.1).</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Gunakan Enkripsi WPA3 atau WPA2</h3>
<p style="margin-bottom:16px;">Pastikan keamanan WiFi menggunakan WPA3 (jika router mendukung) atau minimal WPA2. Hindari WEP yang sudah sangat mudah dibobol.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Buat Password WiFi yang Kuat</h3>
<p style="margin-bottom:16px;">Gunakan password minimal 12 karakter dengan kombinasi huruf besar/kecil, angka, dan simbol. Hindari menggunakan nama, tanggal lahir, atau kata yang mudah ditebak.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Aktifkan Firewall Router</h3>
<p style="margin-bottom:16px;">Sebagian besar router modern memiliki firewall built-in. Pastikan fitur ini aktif untuk memblokir koneksi berbahaya dari luar.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Buat Jaringan Tamu (Guest Network)</h3>
<p>Jika ada tamu yang ingin menggunakan WiFi, buatkan jaringan tamu yang terpisah. Ini mencegah tamu mengakses perangkat di jaringan utama Anda.</p>`
    },
    a3: {
      tag: 'Keamanan', title: 'Tanda-tanda PC Anda Terinfeksi Malware', meta: '2 Januari 2025 • 7 menit baca',
      content: `<p style="margin-bottom:16px;">Malware yang menginfeksi komputer tidak selalu terlihat jelas. Seringkali ia bekerja secara diam-diam di background, mencuri data atau menggunakan resource komputer Anda untuk tujuan jahat.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Tanda #1: Komputer Tiba-tiba Sangat Lambat</h3>
<p style="margin-bottom:16px;">Jika komputer yang biasanya cepat tiba-tiba sangat lambat tanpa sebab jelas, bisa jadi ada proses malware yang berjalan di background dan memakan CPU/RAM.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Tanda #2: Iklan Bermunculan di Mana-mana</h3>
<p style="margin-bottom:16px;">Pop-up iklan yang muncul bahkan ketika tidak membuka browser, atau homepage browser berubah sendiri, adalah tanda adware yang menginfeksi sistem.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Tanda #3: Program Tidak Dikenal Muncul</h3>
<p style="margin-bottom:16px;">Perhatikan daftar program yang terinstall atau ikon-ikon baru di desktop. Software yang tidak pernah Anda install adalah bendera merah yang perlu segera diselidiki.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Langkah Penanganan</h3>
<p style="margin-bottom:16px;">Segera jalankan full scan dengan antivirus terpercaya seperti Malwarebytes, Windows Defender, atau Kaspersky. Jika infeksi sudah parah, pertimbangkan untuk menghubungi teknisi profesional agar data Anda aman.</p>`
    },
    a4: {
      tag: 'Data', title: 'Strategi Backup Data 3-2-1', meta: '28 Desember 2024 • 4 menit baca',
      content: `<p style="margin-bottom:16px;">Strategi backup 3-2-1 adalah standar industri yang direkomendasikan oleh para ahli keamanan data di seluruh dunia. Sederhana namun sangat efektif.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Apa itu 3-2-1?</h3>
<p style="margin-bottom:16px;"><strong>3</strong> salinan data total (termasuk original). <strong>2</strong> media penyimpanan berbeda (misalnya: HDD internal + flash drive). <strong>1</strong> salinan offsite atau cloud (misalnya: Google Drive atau hard drive di lokasi berbeda).</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Mengapa Penting?</h3>
<p style="margin-bottom:16px;">Banyak orang yang sudah backup tapi tetap kehilangan data karena backup dan original berada di perangkat yang sama yang kemudian rusak atau hilang. Strategi 3-2-1 melindungi dari berbagai skenario bencana.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Implementasi Mudah</h3>
<p>Gunakan software backup seperti FreeFileSync atau Macrium Reflect untuk otomatisasi. Kombinasikan dengan Google Drive (15GB gratis) atau OneDrive untuk backup cloud otomatis.</p>`
    },
    a5: {
      tag: 'Hardware', title: 'Tanda Laptop Perlu Ganti Thermal Paste', meta: '20 Desember 2024 • 5 menit baca',
      content: `<p style="margin-bottom:16px;">Thermal paste adalah pasta konduktor panas yang berada di antara CPU/GPU dan heatsink. Fungsinya memastikan panas dapat berpindah dengan efisien dari chip ke pendingin.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Tanda Perlu Ganti Thermal Paste</h3>
<p style="margin-bottom:16px;">Laptop terasa panas berlebih saat digunakan normal. Kipas berputar keras bahkan untuk tugas ringan. Laptop sering shutdown tiba-tiba karena overheat. Performa turun drastis (CPU throttling).</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Kapan Harus Ganti?</h3>
<p style="margin-bottom:16px;">Thermal paste biasanya perlu diganti setiap 2-3 tahun untuk laptop yang digunakan intensif, atau setiap 3-5 tahun untuk penggunaan normal. Laptop yang sudah berumur 4 tahun ke atas sangat disarankan untuk dicek.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Apakah Bisa Sendiri?</h3>
<p>Penggantian thermal paste laptop memerlukan pembongkaran yang cukup kompleks. Sebaiknya diserahkan ke teknisi berpengalaman untuk menghindari kerusakan komponen lain.</p>`
    },
    a6: {
      tag: 'Tips & Trik', title: 'Tips Memperpanjang Usia Baterai Laptop', meta: '15 Desember 2024 • 4 menit baca',
      content: `<p style="margin-bottom:16px;">Baterai laptop modern menggunakan teknologi lithium-ion yang memiliki jumlah siklus pengisian terbatas. Dengan kebiasaan yang tepat, Anda bisa memperpanjang usia baterai secara signifikan.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Jaga Level Baterai 20-80%</h3>
<p style="margin-bottom:16px;">Kebiasaan mengisi baterai dari 0% hingga 100% secara berulang mempercepat degradasi. Idealnya, charge ketika baterai mencapai 20% dan lepas charger sebelum 80-90%.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Hindari Suhu Ekstrem</h3>
<p style="margin-bottom:16px;">Baterai lithium sangat sensitif terhadap suhu. Hindari menggunakan laptop di atas permukaan empuk yang menghalangi ventilasi, dan jauhkan dari paparan sinar matahari langsung.</p>
<h3 style="font-size:1.05rem;font-weight:700;color:var(--blue-950);margin:24px 0 10px;">Aktifkan Battery Saver / Conservation Mode</h3>
<p>Sebagian besar laptop modern (Lenovo, ASUS, HP) memiliki fitur battery conservation mode yang membatasi pengisian hingga 60-80%. Aktifkan fitur ini jika laptop sering dicolok charger terus-menerus.</p>`
    }
  };

  let currentPage = 'home';

  function showPage(pageName, subId) {
    window.scrollTo({top: 0, behavior: 'smooth'});
    document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));

    if (pageName === 'service-detail' && subId) {
      const d = serviceData[subId];
      if (d) {
        document.getElementById('svc-detail-icon').textContent = d.icon;
        document.getElementById('svc-detail-title').textContent = d.title;
        document.getElementById('svc-detail-desc').textContent = d.desc;
        document.getElementById('svc-detail-long').textContent = d.long;
        document.getElementById('svc-detail-price').textContent = d.price;
        document.getElementById('svc-breadcrumb').textContent = d.title;
        const scopeEl = document.getElementById('svc-scope-list');
        scopeEl.innerHTML = d.scope.map(s => `
          <div class="scope-item">
            <span class="scope-check">✓</span>
            <span style="font-size:0.875rem;color:var(--gray-600);">${s}</span>
          </div>`).join('');
      }
      document.getElementById('page-service-detail').classList.add('active');
    } else if (pageName === 'article-detail' && subId) {
      const a = articleData[subId];
      if (a) {
        document.getElementById('art-tag').textContent = a.tag;
        document.getElementById('art-title').textContent = a.title;
        document.getElementById('art-meta').textContent = a.meta;
        document.getElementById('art-breadcrumb').textContent = a.title.substring(0, 30) + '...';
        document.getElementById('art-content').innerHTML = a.content;
      }
      document.getElementById('page-article-detail').classList.add('active');
    } else {
      const target = document.getElementById('page-' + pageName);
      if (target) target.classList.add('active');
    }

    // Update nav active state
    document.querySelectorAll('.nav-links a').forEach(a => a.classList.remove('active'));
    const activeNavMap = { 'home': 'nav-home', 'about': 'nav-about', 'services': 'nav-services', 'service-detail': 'nav-services', 'articles': 'nav-articles', 'article-detail': 'nav-articles', 'contact': 'nav-contact' };
    const navId = activeNavMap[pageName];
    if (navId) document.getElementById(navId)?.classList.add('active');

    // Close mobile menu
    document.getElementById('navLinks').classList.remove('open');
    currentPage = pageName;
  }

  function toggleMenu() {
    document.getElementById('navLinks').classList.toggle('open');
  }

  function openWA() {
    window.open('https://wa.me/6281234567890?text=Halo%20TechFix,%20saya%20butuh%20bantuan%20IT%20Support', '_blank');
  }

  function submitForm() {
    const form = document.querySelector('.contact-form');
    form.style.display = 'none';
    document.getElementById('form-success').style.display = 'block';
    document.getElementById('form-success').scrollIntoView({behavior:'smooth'});
  }

  // Detail layout responsive
  function updateDetailLayout() {
    const el = document.querySelector('.detail-layout');
    if (el) {
      if (window.innerWidth < 768) {
        el.style.gridTemplateColumns = '1fr';
      } else {
        el.style.gridTemplateColumns = '1.5fr 1fr';
      }
    }
  }
  window.addEventListener('resize', updateDetailLayout);
  updateDetailLayout();
</script>
</body>
</html>