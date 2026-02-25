<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'InfraHome Tech – IT Home Service') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <style>
        :root {
            /* Primary - Deep Navy */
            --navy-950: #0a111a;
            --navy-900: #0f1a27;
            --navy-800: #162438;
            --navy-700: #1e3350;
            --navy-600: #27446b;
            
            /* Accent - Refined Blue */
            --blue-600: #2563eb;
            --blue-500: #3b82f6;
            --blue-400: #60a5fa;
            --blue-100: #dbeafe;
            
            /* Neutral Grays */
            --gray-50: #fafbfc;
            --gray-100: #f4f5f7;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            
            /* Semantic */
            --success: #059669;
            --warning: #d97706;
        }
        
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: #ffffff; 
            color: var(--gray-700);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            line-height: 1.3;
            color: var(--navy-900);
            letter-spacing: -0.02em;
        }

        p { color: var(--gray-600); }

        /* NAV */
        nav {
            position: sticky; 
            top: 0; 
            z-index: 100;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid var(--gray-200);
        }
        
        .nav-inner {
            max-width: 1200px; 
            margin: 0 auto;
            display: flex; 
            align-items: center; 
            justify-content: space-between;
            padding: 0 32px; 
            height: 72px;
        }
        
        .nav-logo {
            display: flex; 
            align-items: center; 
            gap: 12px;
            font-size: 1.35rem; 
            font-weight: 800; 
            color: var(--navy-900);
            cursor: pointer; 
            text-decoration: none;
            letter-spacing: -0.03em;
        }
        
        .nav-logo span { 
            color: var(--blue-600); 
        }
        
        .logo-icon {
            width: 40px; 
            height: 40px; 
            border-radius: 10px;
            background: linear-gradient(135deg, var(--blue-600), var(--navy-700));
            display: flex; 
            align-items: center; 
            justify-content: center;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.2);
        }
        
        .logo-icon svg { 
            color: white; 
            width: 20px;
            height: 20px;
        }
        
        .nav-links { 
            display: flex; 
            gap: 8px; 
        }
        
        .nav-links a {
            padding: 10px 16px; 
            border-radius: 8px;
            font-size: 0.9rem; 
            font-weight: 500; 
            color: var(--gray-600);
            cursor: pointer; 
            text-decoration: none; 
            transition: all 0.2s ease;
        }
        
        .nav-links a:hover { 
            background: var(--gray-100); 
            color: var(--navy-900); 
        }
        
        .nav-links a.active { 
            background: var(--navy-900); 
            color: white; 
        }
        
        .nav-cta {
            background: var(--navy-900); 
            color: white;
            padding: 10px 24px; 
            border-radius: 8px;
            font-size: 0.9rem; 
            font-weight: 600;
            cursor: pointer; 
            border: none; 
            transition: all 0.2s ease;
            display: flex; 
            align-items: center; 
            gap: 8px;
        }
        
        .nav-cta:hover { 
            background: var(--navy-800);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(15, 26, 39, 0.25);
        }
        
        .hamburger { 
            display: none; 
            background: none; 
            border: none; 
            cursor: pointer; 
            padding: 8px; 
        }

        /* HERO */
        .hero {
            background: linear-gradient(180deg, var(--navy-950) 0%, var(--navy-900) 100%);
            position: relative; 
            overflow: hidden;
            padding: 120px 32px 100px;
        }
        
        .hero::before {
            content: '';
            position: absolute; 
            top: 0; 
            right: 0;
            width: 60%;
            height: 100%;
            background: radial-gradient(ellipse 100% 100% at 100% 0%, rgba(59, 130, 246, 0.08) 0%, transparent 60%);
        }
        
        .hero-inner {
            max-width: 1200px; 
            margin: 0 auto;
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 80px; 
            align-items: center;
            position: relative;
        }
        
        .hero-badge {
            display: inline-flex; 
            align-items: center; 
            gap: 8px;
            background: rgba(59, 130, 246, 0.1); 
            border: 1px solid rgba(59, 130, 246, 0.2);
            color: var(--blue-400); 
            padding: 6px 14px; 
            border-radius: 100px;
            font-size: 0.75rem; 
            font-weight: 600; 
            margin-bottom: 24px;
            font-family: 'IBM Plex Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }
        
        .hero h1 {
            font-size: clamp(2.25rem, 5vw, 3.5rem);
            font-weight: 800; 
            line-height: 1.15;
            color: white; 
            margin-bottom: 24px;
            letter-spacing: -0.03em;
        }
        
        .hero h1 span {
            color: var(--blue-400);
        }
        
        .hero p { 
            color: var(--gray-400); 
            font-size: 1.125rem; 
            line-height: 1.8; 
            margin-bottom: 40px;
            max-width: 540px;
        }
        
        .hero-btns { 
            display: flex; 
            gap: 16px; 
            flex-wrap: wrap; 
        }
        
        .btn-primary {
            background: var(--blue-600); 
            color: white;
            padding: 14px 32px; 
            border-radius: 10px;
            font-size: 0.95rem; 
            font-weight: 600;
            border: none; 
            cursor: pointer; 
            transition: all 0.2s ease;
            display: inline-flex; 
            align-items: center; 
            gap: 10px;
            letter-spacing: -0.01em;
        }
        
        .btn-primary:hover { 
            background: var(--blue-500); 
            transform: translateY(-2px); 
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.3);
        }
        
        .btn-wa {
            background: #16a34a; 
            color: white;
            padding: 14px 32px; 
            border-radius: 10px;
            font-size: 0.95rem; 
            font-weight: 600;
            border: none; 
            cursor: pointer; 
            transition: all 0.2s ease;
            display: inline-flex; 
            align-items: center; 
            gap: 10px;
        }
        
        .btn-wa:hover { 
            background: #15803d; 
            transform: translateY(-2px); 
            box-shadow: 0 8px 24px rgba(22, 163, 74, 0.3);
        }
        
        .hero-visual {
            display: flex; 
            justify-content: center; 
            align-items: center;
        }
        
        .hero-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px; 
            padding: 40px;
            backdrop-filter: blur(12px); 
            width: 100%;
        }
        
        .hero-stats {
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 20px; 
            margin-bottom: 32px;
        }
        
        .stat-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px; 
            padding: 24px; 
            text-align: center;
        }
        
        .stat-box .num { 
            font-size: 2rem; 
            font-weight: 800; 
            color: var(--blue-400);
            letter-spacing: -0.02em;
        }
        
        .stat-box .lbl { 
            font-size: 0.8rem; 
            color: var(--gray-500); 
            margin-top: 6px;
            font-weight: 500;
        }
        
        .hero-services-list { 
            display: flex; 
            flex-direction: column; 
            gap: 12px; 
        }
        
        .hero-svc {
            display: flex; 
            align-items: center; 
            gap: 12px;
            padding: 14px 18px; 
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            color: var(--gray-300); 
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .hero-svc-dot { 
            width: 6px; 
            height: 6px; 
            border-radius: 50%; 
            background: var(--blue-400); 
            flex-shrink: 0; 
        }

        /* SECTIONS */
        .section { 
            padding: 100px 32px; 
        }
        
        .section-sm { 
            padding: 60px 32px; 
        }
        
        .container { 
            max-width: 1200px; 
            margin: 0 auto; 
        }
        
        .section-header { 
            text-align: center; 
            margin-bottom: 64px; 
        }
        
        .section-tag {
            display: inline-block;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.75rem; 
            font-weight: 600;
            color: var(--blue-600); 
            background: var(--blue-100);
            padding: 6px 16px; 
            border-radius: 100px;
            margin-bottom: 16px; 
            letter-spacing: 0.08em; 
            text-transform: uppercase;
        }
        
        .section-header h2 {
            font-size: clamp(1.75rem, 3.5vw, 2.5rem);
            font-weight: 800; 
            color: var(--navy-900); 
            line-height: 1.2;
            margin-bottom: 16px;
            letter-spacing: -0.02em;
        }
        
        .section-header p { 
            color: var(--gray-600); 
            max-width: 600px; 
            margin: 0 auto; 
            line-height: 1.8;
            font-size: 1.05rem;
        }

        /* SERVICES CARDS */
        .services-grid { 
            display: grid; 
            grid-template-columns: repeat(3, 1fr); 
            gap: 24px; 
        }
        
        .service-card {
            border: 1px solid var(--gray-200);
            border-radius: 20px; 
            padding: 32px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: white; 
            position: relative; 
            overflow: hidden;
        }
        
        .service-card::before {
            content: '';
            position: absolute; 
            top: 0; 
            left: 0; 
            right: 0; 
            height: 3px;
            background: linear-gradient(90deg, var(--blue-600), var(--navy-700));
            transform: scaleX(0); 
            transform-origin: left;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .service-card:hover { 
            border-color: var(--gray-300); 
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08); 
            transform: translateY(-4px);
        }
        
        .service-card:hover::before { 
            transform: scaleX(1); 
        }
        
        .svc-icon {
            width: 56px; 
            height: 56px; 
            border-radius: 14px;
            background: var(--gray-50); 
            display: flex; 
            align-items: center; 
            justify-content: center;
            margin-bottom: 24px;
            font-size: 1.5rem;
            color: var(--navy-700);
        }
        
        .service-card h3 { 
            font-size: 1.125rem; 
            font-weight: 700; 
            color: var(--navy-900); 
            margin-bottom: 12px;
            letter-spacing: -0.01em;
        }
        
        .service-card p { 
            font-size: 0.925rem; 
            color: var(--gray-600); 
            line-height: 1.7; 
            margin-bottom: 20px;
        }
        
        .service-price {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.8rem; 
            font-weight: 600;
            color: var(--blue-600); 
            background: var(--blue-100);
            padding: 6px 12px; 
            border-radius: 6px; 
            display: inline-block;
            letter-spacing: 0.02em;
        }

        /* FEATURES */
        .features-grid { 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            gap: 32px; 
        }
        
        .feature-item { 
            text-align: center; 
            padding: 32px 24px; 
        }
        
        .feat-icon {
            width: 64px; 
            height: 64px; 
            border-radius: 16px;
            background: var(--gray-50);
            display: flex; 
            align-items: center; 
            justify-content: center;
            margin: 0 auto 20px; 
            font-size: 1.5rem;
            color: var(--navy-700);
        }
        
        .feature-item h3 { 
            font-size: 1rem; 
            font-weight: 700; 
            color: var(--navy-900); 
            margin-bottom: 10px;
            letter-spacing: -0.01em;
        }
        
        .feature-item p { 
            font-size: 0.875rem; 
            color: var(--gray-600); 
            line-height: 1.6;
        }

        /* ARTICLES */
        .articles-grid, .articles-page-grid { 
            display: grid; 
            grid-template-columns: repeat(3, 1fr); 
            gap: 24px; 
        }
        
        .article-card {
            border: 1px solid var(--gray-200); 
            border-radius: 16px; 
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
            cursor: pointer; 
            background: white;
        }
        
        .article-card:hover { 
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08); 
            transform: translateY(-4px); 
        }
        
        .article-img {
            height: 200px;
            display: flex; 
            align-items: center; 
            justify-content: center;
            font-size: 2.5rem;
            background: var(--gray-100);
        }
        
        .article-body { 
            padding: 24px; 
        }
        
        .article-tag {
            font-size: 0.7rem; 
            font-weight: 700; 
            text-transform: uppercase;
            color: var(--blue-600); 
            letter-spacing: 0.08em; 
            margin-bottom: 12px;
            font-family: 'IBM Plex Mono', monospace;
        }
        
        .article-card h3 { 
            font-size: 1.05rem; 
            font-weight: 700; 
            color: var(--navy-900); 
            margin-bottom: 10px; 
            line-height: 1.5;
            letter-spacing: -0.01em;
        }
        
        .article-card p { 
            font-size: 0.875rem; 
            color: var(--gray-600); 
            line-height: 1.6; 
            margin-bottom: 16px;
        }
        
        .article-meta { 
            font-size: 0.75rem; 
            color: var(--gray-400); 
            display: flex; 
            gap: 12px;
            font-weight: 500;
        }

        /* ABOUT */
        .about-grid { 
            display: grid; 
            grid-template-columns: 1fr 1.5fr; 
            gap: 80px; 
            align-items: start; 
        }
        
        .about-profile {
            position: sticky; 
            top: 100px;
        }
        
        .profile-photo {
            width: 100%; 
            aspect-ratio: 1; 
            border-radius: 24px;
            background: linear-gradient(135deg, var(--navy-700), var(--navy-900));
            display: flex; 
            align-items: center; 
            justify-content: center;
            font-size: 4rem;
            margin-bottom: 28px;
            color: rgba(255,255,255,0.8);
        }
        
        .about-name { 
            font-size: 1.5rem; 
            font-weight: 800; 
            color: var(--navy-900); 
            margin-bottom: 6px;
            letter-spacing: -0.02em;
        }
        
        .about-title { 
            font-size: 0.95rem; 
            color: var(--blue-600); 
            font-weight: 600; 
            margin-bottom: 20px;
        }
        
        .about-badges { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 10px; 
        }
        
        .about-badge {
            font-size: 0.8rem; 
            font-weight: 500;
            background: var(--gray-100); 
            color: var(--gray-600);
            padding: 8px 16px; 
            border-radius: 100px;
            border: 1px solid var(--gray-200);
        }
        
        .about-content h2 { 
            font-size: 1.875rem; 
            font-weight: 800; 
            color: var(--navy-900); 
            margin-bottom: 20px; 
            line-height: 1.3;
            letter-spacing: -0.02em;
        }
        
        .about-content p { 
            color: var(--gray-600); 
            line-height: 1.8; 
            margin-bottom: 24px;
            font-size: 1rem;
        }
        
        .skills-section h3 { 
            font-size: 1.125rem; 
            font-weight: 700; 
            color: var(--navy-900); 
            margin-bottom: 20px;
            letter-spacing: -0.01em;
        }
        
        .skill-item { 
            margin-bottom: 18px; 
        }
        
        .skill-label { 
            display: flex; 
            justify-content: space-between; 
            margin-bottom: 8px; 
            font-size: 0.875rem; 
        }
        
        .skill-label span:first-child { 
            font-weight: 500; 
            color: var(--gray-700); 
        }
        
        .skill-label span:last-child { 
            font-family: 'IBM Plex Mono', monospace; 
            font-size: 0.8rem; 
            color: var(--blue-600);
            font-weight: 600;
        }
        
        .skill-bar { 
            height: 6px; 
            background: var(--gray-200); 
            border-radius: 100px; 
            overflow: hidden;
        }
        
        .skill-fill { 
            height: 100%; 
            border-radius: 100px; 
            background: linear-gradient(90deg, var(--blue-600), var(--navy-700));
        }
        
        .values-grid { 
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 16px; 
            margin-top: 32px; 
        }
        
        .value-item {
            background: var(--gray-50); 
            border-radius: 16px; 
            padding: 20px;
            border: 1px solid var(--gray-200);
        }
        
        .value-item h4 { 
            font-size: 0.9rem; 
            font-weight: 700; 
            color: var(--navy-900); 
            margin-bottom: 6px;
            letter-spacing: -0.01em;
        }
        
        .value-item p { 
            font-size: 0.825rem; 
            color: var(--gray-600); 
            line-height: 1.5;
        }

        /* CONTACT */
        .contact-grid { 
            display: grid; 
            grid-template-columns: 1fr 1.3fr; 
            gap: 64px; 
            align-items: start; 
        }
        
        .contact-info h2 { 
            font-size: 1.875rem; 
            font-weight: 800; 
            color: var(--navy-900); 
            margin-bottom: 16px;
            letter-spacing: -0.02em;
        }
        
        .contact-info p { 
            color: var(--gray-600); 
            line-height: 1.8; 
            margin-bottom: 32px;
            font-size: 1rem;
        }
        
        .contact-item {
            display: flex; 
            align-items: flex-start; 
            gap: 16px;
            padding: 20px; 
            border-radius: 14px;
            background: var(--gray-50); 
            border: 1px solid var(--gray-200);
            margin-bottom: 16px;
        }
        
        .contact-item-icon {
            width: 44px; 
            height: 44px; 
            border-radius: 12px;
            background: var(--blue-100); 
            display: flex; 
            align-items: center; 
            justify-content: center;
            font-size: 1.1rem; 
            flex-shrink: 0;
            color: var(--blue-600);
        }
        
        .contact-item h4 { 
            font-size: 0.8rem; 
            font-weight: 600; 
            color: var(--gray-500); 
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .contact-item p { 
            font-size: 0.95rem; 
            font-weight: 600; 
            color: var(--navy-900); 
            margin: 0;
        }
        
        .contact-form {
            background: white; 
            border: 1px solid var(--gray-200);
            border-radius: 24px; 
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        }
        
        .contact-form h3 { 
            font-size: 1.25rem; 
            font-weight: 700; 
            color: var(--navy-900); 
            margin-bottom: 28px;
            letter-spacing: -0.01em;
        }
        
        .form-group { 
            margin-bottom: 20px; 
        }
        
        .form-group label {
            display: block; 
            font-size: 0.85rem; 
            font-weight: 600;
            color: var(--gray-700); 
            margin-bottom: 8px;
        }
        
        .form-control {
            width: 100%; 
            padding: 12px 16px;
            border: 1.5px solid var(--gray-200); 
            border-radius: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.95rem; 
            color: var(--gray-800);
            transition: all 0.2s ease; 
            outline: none;
            background: var(--gray-50);
        }
        
        .form-control:focus { 
            border-color: var(--blue-400); 
            background: white; 
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.08);
        }
        
        .form-grid { 
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 16px; 
        }
        
        .btn-submit {
            width: 100%; 
            padding: 14px;
            background: var(--navy-900); 
            color: white;
            border: none; 
            border-radius: 10px; 
            cursor: pointer;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.95rem; 
            font-weight: 600;
            transition: all 0.2s ease; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            gap: 8px;
        }
        
        .btn-submit:hover { 
            background: var(--navy-800); 
            transform: translateY(-1px); 
            box-shadow: 0 4px 16px rgba(15, 26, 39, 0.25);
        }

        /* CTA BANNER */
        .cta-banner {
            background: linear-gradient(135deg, var(--navy-900), var(--navy-800));
            padding: 80px 32px; 
            text-align: center;
        }
        
        .cta-banner h2 { 
            font-size: clamp(1.5rem, 3vw, 2.25rem); 
            font-weight: 800; 
            color: white; 
            margin-bottom: 16px;
            letter-spacing: -0.02em;
        }
        
        .cta-banner p { 
            color: var(--gray-400); 
            margin-bottom: 32px;
            font-size: 1.05rem;
        }
        
        .cta-btns { 
            display: flex; 
            gap: 12px; 
            justify-content: center; 
            flex-wrap: wrap; 
        }
        
        .btn-outline-white {
            padding: 14px 32px; 
            border-radius: 10px;
            font-size: 0.95rem; 
            font-weight: 600;
            border: 1.5px solid rgba(255, 255, 255, 0.3); 
            color: white;
            background: transparent; 
            cursor: pointer; 
            transition: all 0.2s ease;
        }
        
        .btn-outline-white:hover { 
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.5);
        }

        /* FOOTER */
        footer {
            background: var(--navy-950);
            padding: 56px 32px 32px; 
            color: var(--gray-500);
        }
        
        .footer-inner { 
            max-width: 1200px; 
            margin: 0 auto; 
        }
        
        .footer-top { 
            display: grid; 
            grid-template-columns: 1.5fr 1fr 1fr 1fr; 
            gap: 48px; 
            margin-bottom: 48px; 
        }
        
        .footer-brand { }
        
        .footer-logo { 
            font-size: 1.35rem; 
            font-weight: 800; 
            color: white; 
            margin-bottom: 16px;
            text-decoration: none;
            display: inline-block;
            letter-spacing: -0.02em;
        }
        
        .footer-logo span { 
            color: var(--blue-400); 
        }
        
        .footer-desc { 
            font-size: 0.875rem; 
            line-height: 1.8;
            max-width: 280px;
        }
        
        .footer-col h4 { 
            font-size: 0.8rem; 
            font-weight: 700; 
            color: var(--gray-300); 
            margin-bottom: 18px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }
        
        .footer-col a {
            display: block; 
            font-size: 0.875rem; 
            color: var(--gray-500);
            margin-bottom: 10px; 
            text-decoration: none; 
            cursor: pointer; 
            transition: color 0.2s ease;
        }
        
        .footer-col a:hover { 
            color: var(--gray-300); 
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 24px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            font-size: 0.8rem;
        }

        /* MOBILE */
        @media (max-width: 1024px) {
            .hero-inner { grid-template-columns: 1fr; gap: 48px; }
            .hero-visual { display: none; }
            .services-grid { grid-template-columns: 1fr 1fr; }
            .features-grid { grid-template-columns: 1fr 1fr; }
            .about-grid { grid-template-columns: 1fr; }
            .about-profile { position: static; }
            .contact-grid { grid-template-columns: 1fr; }
        }
        
        @media (max-width: 768px) {
            .nav-links { display: none; }
            .nav-links.open {
                display: flex; 
                flex-direction: column; 
                gap: 4px;
                position: absolute; 
                top: 72px; 
                left: 0; 
                right: 0;
                background: white; 
                padding: 12px; 
                border-bottom: 1px solid var(--gray-200);
                z-index: 99;
            }
            .hamburger { display: block; }
            .services-grid { grid-template-columns: 1fr; }
            .features-grid { grid-template-columns: 1fr; }
            .articles-grid, .articles-page-grid { grid-template-columns: 1fr; }
            .footer-top { grid-template-columns: 1fr 1fr; }
            .values-grid { grid-template-columns: 1fr; }
            .form-grid { grid-template-columns: 1fr; }
        }
        
        @media (max-width: 500px) {
            .features-grid { grid-template-columns: 1fr; }
            .footer-top { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        @include('components.header')

        <!-- Page Content -->
        <main class="flex-1">
            {{ $slot ?? '' }}
        </main>

        <!-- Footer -->
        @include('components.footer')
    </div>

    @stack('scripts')
</body>
</html>
