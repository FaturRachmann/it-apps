<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TechFix') }} - Admin Panel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --navy-950: #0a111a;
            --navy-900: #0f1a27;
            --navy-800: #162438;
            --blue-600: #2563eb;
            --blue-500: #3b82f6;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #374151;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: var(--gray-100);
            color: var(--gray-700);
        }
        
        /* Admin Sidebar Layout */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 280px;
            background: var(--navy-900);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 50;
        }
        
        .sidebar-header {
            padding: 24px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.35rem;
            font-weight: 800;
            color: white;
            text-decoration: none;
        }
        
        .sidebar-logo span { color: var(--blue-500); }
        
        .logo-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--blue-600), var(--navy-800));
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .sidebar-nav {
            padding: 16px 0;
        }
        
        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 24px;
            color: var(--gray-400);
            text-decoration: none;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }
        
        .nav-item:hover {
            background: rgba(255,255,255,0.05);
            color: white;
        }
        
        .nav-item.active {
            background: rgba(37, 99, 235, 0.1);
            color: white;
            border-left-color: var(--blue-500);
        }
        
        .nav-item svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }
        
        .nav-label {
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            min-height: 100vh;
        }
        
        /* Top Bar */
        .top-bar {
            background: white;
            border-bottom: 1px solid var(--gray-200);
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 40;
        }
        
        .top-bar h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--navy-900);
        }
        
        .top-bar-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        
        .btn-view-site {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: var(--gray-100);
            color: var(--gray-700);
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .btn-view-site:hover {
            background: var(--gray-200);
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 16px;
            background: var(--gray-100);
            border-radius: 10px;
        }
        
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--blue-600);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
        }
        
        .user-name {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--gray-800);
        }
        
        .user-role {
            font-size: 0.75rem;
            color: var(--gray-500);
        }
        
        /* Page Content */
        .page-content {
            padding: 32px;
        }
        
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }
        
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }
        
        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .stat-icon.blue { background: #dbeafe; color: var(--blue-600); }
        .stat-icon.green { background: #dcfce7; color: #16a34a; }
        .stat-icon.purple { background: #f3e8ff; color: #9333ea; }
        .stat-icon.yellow { background: #fef3c7; color: #d97706; }
        .stat-icon.red { background: #fee2e2; color: #dc2626; }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--navy-900);
            line-height: 1;
        }
        
        .stat-label {
            font-size: 0.875rem;
            color: var(--gray-500);
            margin-top: 4px;
        }
        
        /* Action Buttons */
        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 24px;
        }
        
        .btn-action {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px 24px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .btn-action.blue {
            background: var(--blue-600);
            color: white;
        }
        
        .btn-action.blue:hover {
            background: var(--blue-500);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }
        
        .btn-action.green {
            background: #16a34a;
            color: white;
        }
        
        .btn-action.green:hover {
            background: #15803d;
        }
        
        .btn-action.yellow {
            background: #d97706;
            color: white;
        }
        
        .btn-action.yellow:hover {
            background: #b45309;
        }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
                    <div class="logo-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="14" rx="2"/>
                            <path d="M8 21h8"/>
                            <path d="M12 17v4"/>
                        </svg>
                    </div>
                    InfraHome<span>Tech</span>
                </a>
            </div>
            
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="7" height="9" x="3" y="3" rx="1"/>
                        <rect width="7" height="5" x="14" y="3" rx="1"/>
                        <rect width="7" height="9" x="14" y="12" rx="1"/>
                        <rect width="7" height="5" x="3" y="16" rx="1"/>
                    </svg>
                    <span class="nav-label">Dashboard</span>
                </a>
                
                <a href="{{ route('admin.services.index') }}" class="nav-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                    </svg>
                    <span class="nav-label">Layanan</span>
                </a>
                
                <a href="{{ route('admin.articles.index') }}" class="nav-item {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" x2="8" y1="13" y2="13"/>
                        <line x1="16" x2="8" y1="17" y2="17"/>
                        <line x1="10" x2="8" y1="9" y2="9"/>
                    </svg>
                    <span class="nav-label">Artikel</span>
                </a>
                
                <a href="{{ route('admin.messages.index') }}" class="nav-item {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                    <span class="nav-label">Pesan</span>
                </a>
                
                <div style="margin-top: 32px; padding-top: 16px; border-top: 1px solid rgba(255,255,255,0.1);">
                    <a href="{{ route('home') }}" class="nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                        <span class="nav-label">Lihat Website</span>
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-item" style="width: 100%; text-align: left; background: none; border: none; cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                <polyline points="16 17 21 12 16 7"/>
                                <line x1="21" x2="9" y1="12" y2="12"/>
                            </svg>
                            <span class="nav-label">Logout</span>
                        </button>
                    </form>
                </div>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Bar -->
            <div class="top-bar">
                <h1>@yield('page-title', 'Admin Panel')</h1>
                
                <div class="top-bar-actions">
                    <a href="{{ route('home') }}" class="btn-view-site">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                        Lihat Website
                    </a>
                    
                    <div class="user-menu">
                        <div class="user-avatar">
                            {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ auth()->user()->name ?? 'Admin' }}</span>
                            <span class="user-role">Administrator</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Page Content -->
            <div class="page-content">
                @if(session('success'))
                    <div style="margin-bottom: 24px; background: #dcfce7; border: 1px solid #16a34a; color: #15803d; padding: 14px 18px; border-radius: 10px;" role="alert">
                        <strong>✓ Berhasil!</strong> {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div style="margin-bottom: 24px; background: #fee2e2; border: 1px solid #dc2626; color: #b91c1c; padding: 14px 18px; border-radius: 10px;" role="alert">
                        <strong>✗ Error!</strong> {{ session('error') }}
                    </div>
                @endif
                
                {{ $slot ?? '' }}
            </div>
        </div>
    </div>
</body>
</html>
