<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas Saya - Pixel Community</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            --bg-body: #f4f7fa;
            --bg-white: #ffffff;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --green: #16a34a;
            --green-light: #dcfce7;
            --blue: #0284c7;
            --blue-light: #e0f2fe;
            --orange: #ea580c;
            --orange-light: #ffedd5;
            --red: #dc2626;
            --red-light: #fee2e2;
            --yellow: #ca8a04;
            --font-main: 'Inter', sans-serif;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: var(--font-main);
            background-color: var(--bg-body);
            color: var(--text-dark);
            -webkit-font-smoothing: antialiased;
        }

        .page-container { display: flex; min-height: 100vh; }

        /* â”€â”€ Sidebar â”€â”€ */
        .sidebar {
            width: 260px;
            background-color: #0f172a;
            color: #ffffff;
            position: fixed;
            height: 100vh;
            left: 0; top: 0;
            display: flex;
            flex-direction: column;
            z-index: 50;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 24px 28px;
            font-size: 1.25rem;
            font-weight: 800;
            color: #ffffff;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            letter-spacing: -0.02em;
        }

        .sidebar-logo .subtitle {
            display: block;
            font-size: 0.75rem;
            font-weight: 400;
            color: #94a3b8;
            margin-top: 2px;
        }

        .logo-icon {
            width: 40px; height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
        }

        .sidebar-menu {
            padding: 24px 16px;
            list-style: none;
            display: flex; flex-direction: column;
            gap: 8px;
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-menu::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-menu::-webkit-scrollbar-track {
            background: transparent;
        }
        .sidebar-menu::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.1);
            border-radius: 4px;
        }
        .sidebar-menu::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.2);
        }

        .sidebar-menu a {
            display: flex; align-items: center; gap: 12px;
            padding: 12px 16px;
            text-decoration: none;
            color: #cbd5e1;
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 12px;
            transition: all 0.2s;
        }

        .sidebar-menu a i { color: #94a3b8; transition: color 0.2s; }

        .sidebar-menu li.active a {
            background-color: #e0f2fe;
            color: #0f172a;
        }
        
        .sidebar-menu li.active a i { color: #0f172a; }

        .sidebar-menu a:hover:not(.active) {
            background-color: rgba(255,255,255,0.1);
            color: #ffffff;
        }



        /* â”€â”€ Main â”€â”€ */
        .main-content {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: var(--bg-body);
            min-height: 100vh;
        }

        /* ── Header Layout ── */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 40px;
            background-color: var(--bg-white);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 40;
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .top-breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: var(--text-muted);
            font-weight: 500;
            white-space: nowrap;
        }

        .top-breadcrumb a {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.15s ease;
        }

        .top-breadcrumb a:hover {
            color: #2563eb;
        }

        .top-breadcrumb span {
            color: var(--text-dark);
            font-weight: 700;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .streak-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #fff7ed, #ffedd5);
            color: #c2410c;
            padding: 0 14px;
            height: 40px;
            border-radius: 9999px;
            font-weight: 700;
            font-size: 0.825rem;
            border: 1px solid #fed7aa;
            box-shadow: 0 1px 2px rgba(234, 88, 12, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            cursor: default;
            user-select: none;
            white-space: nowrap;
        }

        .streak-badge:hover {
            transform: translateY(-1px);
            box-shadow: 0 3px 8px rgba(234, 88, 12, 0.12);
        }

        .streak-badge i {
            color: #ea580c;
            fill: #ea580c;
        }

        .icon-btn {
            background-color: var(--bg-white);
            border: 1px solid var(--border-color);
            width: 40px;
            height: 40px;
            border-radius: 12px;
            color: #475569;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 1px 2px rgba(0,0,0,0.03);
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .icon-btn:hover {
            background-color: #f8fafc;
            border-color: #cbd5e1;
            color: #0f172a;
            transform: translateY(-1px);
            box-shadow: 0 3px 6px -1px rgba(0,0,0,0.05);
        }
        
        .icon-btn.has-dot::after {
            content: '';
            position: absolute;
            top: 7px;
            right: 7px;
            width: 8px;
            height: 8px;
            background-color: #ef4444;
            border-radius: 50%;
            border: 2px solid #ffffff;
            box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.2);
        }

        .header-divider {
            width: 1px;
            height: 24px;
            background-color: var(--border-color);
            margin: 0 2px;
        }

        /* User Profile & Interactive Dropdown */
        .user-menu-wrapper {
            position: relative;
        }

        .user-profile-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 4px 10px 4px 6px;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            user-select: none;
            border: 1px solid transparent;
        }

        .user-profile-btn:hover,
        .user-profile-btn.active {
            background-color: #f8fafc;
            border-color: #e2e8f0;
        }

        .avatar-wrapper {
            position: relative;
            width: 38px;
            height: 38px;
            flex-shrink: 0;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ffffff;
            box-shadow: 0 2px 6px rgba(37, 99, 235, 0.25);
        }

        .avatar-status-dot {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 10px;
            height: 10px;
            background-color: #10b981;
            border: 2px solid #ffffff;
            border-radius: 50%;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        .user-info .name {
            font-weight: 700;
            font-size: 0.875rem;
            color: #0f172a;
            line-height: 1.2;
            white-space: nowrap;
        }

        .user-info .role {
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 500;
            margin-top: 2px;
        }

        .menu-chevron {
            color: #94a3b8;
            transition: transform 0.2s ease;
            margin-left: 2px;
        }

        .user-profile-btn.active .menu-chevron {
            transform: rotate(180deg);
            color: #2563eb;
        }

        /* Profile Dropdown Menu Card */
        .user-dropdown-menu {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            width: 230px;
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.85);
            border-radius: 16px;
            box-shadow: 0 16px 36px -8px rgba(15, 23, 42, 0.12), 0 0 1px 1px rgba(15, 23, 42, 0.04);
            padding: 8px;
            z-index: 50;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-8px);
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .user-dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .user-dropdown-header {
            padding: 10px 12px;
        }

        .user-dropdown-name {
            font-weight: 700;
            font-size: 0.875rem;
            color: #0f172a;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-dropdown-email {
            font-size: 0.75rem;
            color: #64748b;
            margin-top: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .dropdown-divider {
            height: 1px;
            background-color: #f1f5f9;
            margin: 6px 0;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: 10px;
            font-size: 0.825rem;
            font-weight: 500;
            color: #334155;
            transition: all 0.15s ease;
            text-decoration: none;
            width: 100%;
            background: none;
            border: none;
            cursor: pointer;
            text-align: left;
        }

        .dropdown-item:hover {
            background-color: #f8fafc;
            color: #2563eb;
        }

        .dropdown-item.dropdown-logout-btn {
            color: #ef4444;
        }

        .dropdown-item.dropdown-logout-btn:hover {
            background-color: #fef2f2;
            color: #dc2626;
        }

        /* â”€â”€ Page Content â”€â”€ */
        .content { padding: 40px 48px; }

        .page-title { font-size: 2rem; font-weight: 800; letter-spacing: -0.02em; margin-bottom: 8px; }
        .page-subtitle { color: var(--text-muted); font-size: 0.95rem; margin-bottom: 36px; }

        /* â”€â”€ Hero Banner (Ultra Premium - Compact) â”€â”€ */
        .hero-banner {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 40%, #1e3a8a 100%);
            border-radius: 16px;
            padding: 24px 32px;
            color: #ffffff;
            margin-bottom: 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.1);
            position: relative;
            overflow: hidden;
        }

        .hero-banner::before {
            content: '';
            position: absolute;
            top: -100px; right: -100px;
            width: 250px; height: 250px;
            background: radial-gradient(circle, rgba(96, 165, 250, 0.2) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        
        .hero-banner::after {
            content: '';
            position: absolute;
            bottom: -80px; left: -80px;
            width: 180px; height: 180px;
            background: radial-gradient(circle, rgba(167, 139, 250, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-content {
            max-width: 600px;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .hero-badge {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 4px 10px;
            border-radius: 100px;
            font-size: 0.7rem;
            font-weight: 600;
            color: #93c5fd;
            margin-bottom: 8px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            backdrop-filter: blur(4px);
        }

        .hero-title {
            font-size: 1.75rem;
            font-weight: 900;
            margin-bottom: 6px;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .hero-title span {
            background: linear-gradient(to right, #93c5fd, #a78bfa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 0.85rem;
            color: #cbd5e1;
            margin-bottom: 16px;
            line-height: 1.4;
            max-width: 500px;
        }

        .hero-search {
            display: flex;
            align-items: center;
            background: #ffffff;
            border-radius: 100px;
            padding: 4px 4px 4px 16px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: relative;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .hero-search:focus-within {
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.15);
        }

        .hero-search i {
            color: #64748b;
            margin-right: 8px;
            flex-shrink: 0;
        }

        .hero-search input {
            flex: 1;
            border: none;
            background: transparent;
            font-size: 0.85rem;
            font-family: var(--font-main);
            color: var(--text-dark);
            outline: none;
            min-width: 0;
            padding: 8px 0;
        }
        
        .hero-search input::placeholder {
            color: #94a3b8;
            font-weight: 500;
        }

        .hero-search-btn {
            background-color: #2563eb;
            color: #ffffff;
            border: none;
            border-radius: 100px;
            padding: 8px 20px;
            font-weight: 700;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.2s;
            flex-shrink: 0;
            margin-left: 6px;
        }

        .hero-search-btn:hover {
            background-color: #1d4ed8;
        }
        
        .hero-stats {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 24px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid rgba(255,255,255,0.1);
            width: 100%;
        }
        
        .hero-stat-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .hero-stat-icon {
            width: 28px; height: 28px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
        }
        
        .hero-stat-text {
            display: flex;
            flex-direction: column;
            text-align: left;
        }
        
        .hero-stat-val { font-weight: 800; font-size: 0.9rem; }
        .hero-stat-label { font-size: 0.7rem; color: #cbd5e1; font-weight: 500; }

        /* â”€â”€ Filter Bar â”€â”€ */
        .filter-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .tabs { display: flex; gap: 4px; }

        .tab-btn {
            padding: 8px 20px;
            border-radius: 8px;
            border: none;
            background: none;
            font-family: var(--font-main);
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-muted);
            cursor: pointer;
            transition: all 0.2s;
        }

        .tab-btn.active {
            background-color: var(--text-dark);
            color: var(--bg-white);
        }

        .tab-btn:hover:not(.active) { background-color: #f1f5f9; color: var(--text-dark); }

        .filter-right { display: flex; align-items: center; gap: 12px; }



        .sort-btn {
            display: flex; align-items: center; gap: 8px;
            background-color: var(--bg-white);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 0 16px; height: 40px;
            font-family: var(--font-main);
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-dark);
            cursor: pointer;
        }

        /* â”€â”€ Course Grid â”€â”€ */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .course-card {
            background-color: var(--bg-white);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(226,232,240,0.5);
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);
            transition: transform 0.25s, box-shadow 0.25s;
            display: flex;
            flex-direction: column;
        }

        .course-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 30px -8px rgba(0,0,0,0.1);
        }

        .course-img-wrapper { position: relative; height: 200px; overflow: hidden; }

        .course-img-wrapper img {
            width: 100%; height: 100%;
            object-fit: cover;
            transition: transform 0.4s;
        }

        .course-card:hover .course-img-wrapper img { transform: scale(1.05); }

        .course-badge {
            position: absolute; top: 14px; left: 14px;
            background-color: rgba(255,255,255,0.92);
            backdrop-filter: blur(4px);
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .course-body { 
            padding: 22px; 
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .course-title {
            font-size: 1.1rem;
            font-weight: 800;
            line-height: 1.4;
            margin-bottom: 8px;
            letter-spacing: -0.01em;
        }

        .course-author {
            display: flex; align-items: center; gap: 6px;
            font-size: 0.8rem; color: var(--text-muted);
            font-weight: 500; margin-bottom: 12px;
        }

        .course-meta {
            display: flex; align-items: center; gap: 16px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex; align-items: center; gap: 5px;
            font-size: 0.8rem; color: var(--text-muted);
            font-weight: 500;
        }

        .rating {
            display: flex; align-items: center; gap: 4px;
            font-size: 0.8rem; font-weight: 700; color: var(--yellow);
        }

        .rating span { color: var(--text-muted); font-weight: 500; }

        .progress-section { margin-bottom: 20px; }

        .progress-label {
            display: flex; justify-content: space-between;
            font-size: 0.75rem; font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-muted);
        }

        .progress-label span:last-child { font-weight: 700; }

        .progress-bar {
            height: 6px;
            background-color: #f1f5f9;
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        .progress-fill.green { background-color: var(--green); }
        .progress-fill.dark { background-color: var(--text-dark); }

        .course-progress-pct { font-size: 0.8rem; font-weight: 700; }
        .course-progress-pct.green { color: var(--green); }

        .btn-continue {
            width: 100%;
            padding: 13px;
            border-radius: 12px;
            border: none;
            background-color: var(--text-dark);
            color: var(--bg-white);
            font-family: var(--font-main);
            font-size: 0.9rem;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.2s;
        }

        .btn-continue:hover { background-color: #1e293b; transform: translateY(-1px); }

        .btn-continue.outline {
            background-color: transparent;
            color: var(--text-dark);
            border: 1px solid var(--border-color);
        }

        .btn-continue.outline:hover { background-color: #f8fafc; }

        /* â”€â”€ Responsive â”€â”€ */
        @media (max-width: 1200px) {
            .courses-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 1024px) {
            .sidebar { display: none; }
            .main-content { margin-left: 0; }
            .header { padding: 14px 24px; }
            .courses-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<div class="page-container">

    <!-- Sidebar -->
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-logo">
                <div class="logo-icon"><i data-lucide="graduation-cap"></i></div>
                <span>Pixel Community</span>
            </div>

            <ul class="sidebar-menu">
                <li><a href="{{ url('/dashboard') }}"><i data-lucide="layout-dashboard"></i> Beranda</a></li>
                <li class="active"><a href="{{ route('courses') }}"><i data-lucide="compass"></i> Jelajahi Kelas</a></li>
                <li><a href="{{ route('videos') }}"><i data-lucide="book-open"></i> Kelas Saya</a></li>
                <li><a href="{{ route('quizzes') }}"><i data-lucide="list-checks"></i> Kuis</a></li>
                <li><a href="#"><i data-lucide="award"></i> Sertifikat</a></li>
                <li><a href="#"><i data-lucide="clipboard-list"></i> Tugas</a></li>
                <li><a href="#"><i data-lucide="credit-card"></i> Pembayaran</a></li>
            </ul>


        </nav>

    <!-- Main Content -->
    <div class="main-content">

        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <div class="top-breadcrumb">
                    Pixel Community <i data-lucide="chevron-right" size="14"></i> <span>Jelajahi Kelas</span>
                </div>
            </div>

            <div class="header-actions">
                <!-- Streak Indicator -->
                <div class="streak-badge" title="Streak belajar aktif 5 hari berturut-turut!">
                    <i data-lucide="flame" size="16"></i>
                    <span>5 Hari</span>
                </div>

                <!-- Message & Notification -->
                <button class="icon-btn" title="Pesan"><i data-lucide="message-circle" size="18"></i></button>
                <button class="icon-btn has-dot" title="Notifikasi"><i data-lucide="bell" size="18"></i></button>

                <div class="header-divider"></div>

                <!-- User Profile & Dropdown -->
                <div class="user-menu-wrapper" id="userMenuWrapper">
                    <div class="user-profile-btn" id="userProfileBtn" role="button" tabindex="0">
                        <div class="avatar-wrapper">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=2563eb&color=ffffff&bold=true" alt="{{ auth()->user()->name ?? 'User' }}" class="avatar-img">
                            <span class="avatar-status-dot"></span>
                        </div>
                        <div class="user-info">
                            <span class="name">{{ auth()->user()->name ?? 'Pengguna' }}</span>
                            <span class="role">Pelajar</span>
                        </div>
                        <i data-lucide="chevron-down" size="14" class="menu-chevron" id="userChevron"></i>
                    </div>

                    <!-- Dropdown Menu -->
                    <div class="user-dropdown-menu" id="userDropdownMenu">
                        <div class="user-dropdown-header">
                            <p class="user-dropdown-name">{{ auth()->user()->name ?? 'Pengguna' }}</p>
                            <p class="user-dropdown-email">{{ auth()->user()->email ?? 'pelajar@pixelcommunity.id' }}</p>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('profile.edit') }}#profile" class="dropdown-item">
                            <i data-lucide="user" size="15"></i>
                            <span>Profil Saya</span>
                        </a>
                        <a href="{{ route('profile.edit') }}#settings" class="dropdown-item">
                            <i data-lucide="settings" size="15"></i>
                            <span>Pengaturan Akun</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                            @csrf
                            <button type="submit" class="dropdown-item dropdown-logout-btn">
                                <i data-lucide="log-out" size="15"></i>
                                <span>Keluar dari Akun</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="content">
            
            <!-- Hero Banner -->
            <div class="hero-banner">
                <div class="hero-content">
                    <div class="hero-badge">
                        <i data-lucide="sparkles" size="12"></i> Platform Edukasi No. 1
                    </div>
                    <h1 class="hero-title">Bangun Karir Impianmu<br>Mulai dari <span>Sekarang</span></h1>
                    <p class="hero-subtitle">Jelajahi ratusan kelas premium interaktif yang disusun oleh para pakar industri terkemuka. Belajar kapan saja, di mana saja.</p>
                    
                    <form class="hero-search" onsubmit="event.preventDefault(); document.getElementById('coursesGrid').scrollIntoView({behavior: 'smooth', block: 'start'})">
                        <i data-lucide="search" size="16"></i>
                        <input type="text" placeholder="Mau belajar apa? (Misal: UI/UX...)" id="courseSearch" oninput="searchCourses(this.value)">
                        <button type="submit" class="hero-search-btn">Cari Kelas</button>
                    </form>

                    <div class="hero-stats">
                        <div class="hero-stat-item">
                            <div class="hero-stat-icon"><i data-lucide="users" size="14" style="color:#93c5fd;"></i></div>
                            <div class="hero-stat-text">
                                <span class="hero-stat-val">50.000+</span>
                                <span class="hero-stat-label">Siswa Aktif</span>
                            </div>
                        </div>
                        <div class="hero-stat-item">
                            <div class="hero-stat-icon"><i data-lucide="video" size="14" style="color:#a78bfa;"></i></div>
                            <div class="hero-stat-text">
                                <span class="hero-stat-val">300+</span>
                                <span class="hero-stat-label">Kelas Video</span>
                            </div>
                        </div>
                        <div class="hero-stat-item">
                            <div class="hero-stat-icon"><i data-lucide="star" size="14" style="color:#fcd34d;"></i></div>
                            <div class="hero-stat-text">
                                <span class="hero-stat-val">4.9/5</span>
                                <span class="hero-stat-label">Rata-rata Rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Bar -->
            <div class="filter-bar">
                <div class="tabs">
                    <button class="tab-btn active" onclick="filterCourses('semua', this)">Semua Kelas</button>
                    <button class="tab-btn" onclick="filterCourses('pemrograman', this)">Pemrograman</button>
                    <button class="tab-btn" onclick="filterCourses('desain', this)">Desain</button>
                    <button class="tab-btn" onclick="filterCourses('bisnis', this)">Bisnis</button>
                </div>
                <div class="filter-right">
                    <select class="sort-btn" onchange="sortCourses(this.value)" style="appearance:none; padding-right:32px; background: url('data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'16\' height=\'16\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><polyline points=\'6 9 12 15 18 9\'/></svg>') no-repeat right 12px center; background-color: var(--bg-white);">
                        <option value="terbaru">Terbaru</option>
                        <option value="terlama">Terlama</option>
                        <option value="termahal">Harga Termahal</option>
                        <option value="termurah">Harga Termurah</option>
                        <option value="gratis">Gratis</option>
                    </select>
                </div>
            </div>

            <!-- Courses Grid -->
            <div class="courses-grid" id="coursesGrid">

                <!-- Card 1 - UI/UX -->
                <div class="course-card" data-category="desain" data-price="0" data-id="1">
                    <div class="course-img-wrapper">
                        <img src="/images/course_uiux_1790558583074.jpg" alt="UI/UX Design">
                        <span class="course-badge">UI/UX Design</span>
                    </div>
                    <div class="course-body">
                        <h3 class="course-title">Desain Antarmuka Pengguna Tingkat Lanjut</h3>
                        <div class="course-author">
                            <i data-lucide="user" size="13"></i>
                            Sarah Jenkins, Lead Designer
                        </div>
                        <div class="course-meta">
                            <div class="rating">
                                <i data-lucide="star" size="13" style="fill:#ca8a04;"></i>
                                4.8 <span>(1.2k ulasan)</span>
                            </div>
                            <div class="meta-item">
                                <i data-lucide="layout-list" size="13"></i>
                                24 Pelajaran
                            </div>
                            <div class="meta-item">
                                <i data-lucide="clock" size="13"></i>
                                12j 30m
                            </div>
                        </div>
                        <div style="font-weight: 800; font-size: 1.1rem; margin-top: auto; margin-bottom: 16px; color: var(--text-dark); display:flex; align-items:center; justify-content:space-between;">
                            <div>Gratis <span style="font-size: 0.8rem; color: var(--text-muted); text-decoration: line-through; font-weight: 500; margin-left: 8px;">Rp 750.000</span></div>
                            <span style="display:inline-flex; align-items:center; gap:4px; font-size:0.75rem; background-color:#dcfce7; color:#16a34a; padding:4px 8px; border-radius:6px; font-weight:700;"><i data-lucide="check-circle" size="14"></i> Sudah Dibeli</span>
                        </div>
                        <a href="{{ route('courses.detail', ['slug' => 'ui-ux']) }}" class="btn-continue" style="display:block; text-align:center; text-decoration:none;">Lihat Detail</a>
                    </div>
                </div>

                <!-- Card 2 - React -->
                <div class="course-card" data-category="pemrograman" data-price="1250000" data-id="2">
                    <div class="course-img-wrapper">
                        <img src="/images/course_react_1790558572624.jpg" alt="Web Dev">
                        <span class="course-badge">Web Dev</span>
                    </div>
                    <div class="course-body">
                        <h3 class="course-title">Fullstack React & Node.js Masterclass</h3>
                        <div class="course-author">
                            <i data-lucide="user" size="13"></i>
                            Michael Chen, Sr. Engineer
                        </div>
                        <div class="course-meta">
                            <div class="rating">
                                <i data-lucide="star" size="13" style="fill:#ca8a04;"></i>
                                4.9 <span>(3.4k ulasan)</span>
                            </div>
                            <div class="meta-item">
                                <i data-lucide="layout-list" size="13"></i>
                                42 Pelajaran
                            </div>
                            <div class="meta-item">
                                <i data-lucide="clock" size="13"></i>
                                35j 15m
                            </div>
                        </div>
                        <div style="font-weight: 800; font-size: 1.1rem; margin-top: auto; margin-bottom: 16px; color: var(--text-dark); display:flex; align-items:center; justify-content:space-between;">
                            <div>Rp 1.250.000</div>
                            <span style="display:inline-flex; align-items:center; gap:4px; font-size:0.75rem; background-color:#dcfce7; color:#16a34a; padding:4px 8px; border-radius:6px; font-weight:700;"><i data-lucide="check-circle" size="14"></i> Sudah Dibeli</span>
                        </div>
                        <a href="{{ route('courses.detail', ['slug' => 'react']) }}" class="btn-continue" style="display:block; text-align:center; text-decoration:none;">Lihat Detail</a>
                    </div>
                </div>

                <!-- Card 3 - Growth -->
                <div class="course-card" data-category="bisnis" data-price="850000" data-id="3">
                    <div class="course-img-wrapper">
                        <img src="/images/course_marketing_1790558594033.jpg" alt="Marketing">
                        <span class="course-badge">Digital Marketing</span>
                    </div>
                    <div class="course-body">
                        <h3 class="course-title">Strategi Growth Hacking & Analitik Digital</h3>
                        <div class="course-author">
                            <i data-lucide="user" size="13"></i>
                            Elena Rodriguez, CMO
                        </div>
                        <div class="course-meta">
                            <div class="rating">
                                <i data-lucide="star" size="13" style="fill:#ca8a04;"></i>
                                4.7 <span>(876 ulasan)</span>
                            </div>
                            <div class="meta-item">
                                <i data-lucide="layout-list" size="13"></i>
                                18 Pelajaran
                            </div>
                            <div class="meta-item">
                                <i data-lucide="clock" size="13"></i>
                                8j 45m
                            </div>
                        </div>
                        <div style="font-weight: 800; font-size: 1.1rem; margin-top: auto; margin-bottom: 16px; color: var(--text-dark); display:flex; align-items:center; justify-content:space-between;">
                            <div>Rp 850.000</div>
                            <span style="display:inline-flex; align-items:center; gap:4px; font-size:0.75rem; background-color:#dcfce7; color:#16a34a; padding:4px 8px; border-radius:6px; font-weight:700;"><i data-lucide="check-circle" size="14"></i> Sudah Dibeli</span>
                        </div>
                        <a href="{{ route('courses.detail', ['slug' => 'growth']) }}" class="btn-continue" style="display:block; text-align:center; text-decoration:none;">Lihat Detail</a>
                    </div>
                </div>

                <!-- Card 4 - Python -->
                <div class="course-card" data-category="pemrograman" data-price="1100000" data-id="4">
                    <div class="course-img-wrapper">
                        <img src="/images/course_uiux_1790558583074.jpg" alt="Python">
                        <span class="course-badge">Data Science</span>
                    </div>
                    <div class="course-body">
                        <h3 class="course-title">Python untuk Data Science & Machine Learning</h3>
                        <div class="course-author">
                            <i data-lucide="user" size="13"></i>
                            Dr. Ahmad Rizky, PhD
                        </div>
                        <div class="course-meta">
                            <div class="rating">
                                <i data-lucide="star" size="13" style="fill:#ca8a04;"></i>
                                4.8 <span>(2.1k ulasan)</span>
                            </div>
                            <div class="meta-item">
                                <i data-lucide="layout-list" size="13"></i>
                                36 Pelajaran
                            </div>
                            <div class="meta-item">
                                <i data-lucide="clock" size="13"></i>
                                28j 00m
                            </div>
                        </div>
                        <div style="font-weight: 800; font-size: 1.1rem; margin-top: auto; margin-bottom: 16px; color: var(--text-dark); display:flex; align-items:center; justify-content:space-between;">
                            <div>Rp 1.100.000</div>
                            <span style="display:inline-flex; align-items:center; gap:4px; font-size:0.75rem; background-color:#dcfce7; color:#16a34a; padding:4px 8px; border-radius:6px; font-weight:700;"><i data-lucide="check-circle" size="14"></i> Sudah Dibeli</span>
                        </div>
                        <a href="{{ route('courses.detail', ['slug' => 'python']) }}" class="btn-continue" style="display:block; text-align:center; text-decoration:none;">Lihat Detail</a>
                    </div>
                </div>

                <!-- Card 5 - Flutter -->
                <div class="course-card" data-category="pemrograman" data-price="950000" data-id="5">
                    <div class="course-img-wrapper">
                        <img src="/images/course_flutter.jpg" alt="Flutter">
                        <span class="course-badge">Mobile Dev</span>
                    </div>
                    <div class="course-body">
                        <h3 class="course-title">Mobile App Development dengan Flutter</h3>
                        <div class="course-author">
                            <i data-lucide="user" size="13"></i>
                            Budi Santoso, Mobile Engineer
                        </div>
                        <div class="course-meta">
                            <div class="rating">
                                <i data-lucide="star" size="13" style="fill:#ca8a04;"></i>
                                4.8 <span>(1.5k ulasan)</span>
                            </div>
                            <div class="meta-item">
                                <i data-lucide="layout-list" size="13"></i>
                                28 Pelajaran
                            </div>
                            <div class="meta-item">
                                <i data-lucide="clock" size="13"></i>
                                21j 00m
                            </div>
                        </div>
                        <div style="font-weight: 800; font-size: 1.1rem; margin-top: auto; margin-bottom: 16px; color: var(--text-dark);">
                            Rp 950.000
                        </div>
                        <a href="{{ route('courses.detail', ['slug' => 'flutter']) }}" class="btn-continue" style="display:block; text-align:center; text-decoration:none;">Lihat Detail</a>
                    </div>
                </div>

                <!-- Card 6 - Digital Marketing -->
                <div class="course-card" data-category="bisnis" data-price="0" data-id="6">
                    <div class="course-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1432888622747-4eb9a8efeb07?w=800&q=80" alt="Digital Marketing">
                        <span class="course-badge">Bisnis</span>
                    </div>
                    <div class="course-body">
                        <h3 class="course-title">Digital Marketing: SEO & SEM Mastery</h3>
                        <div class="course-author">
                            <i data-lucide="user" size="13"></i>
                            Diana Putri, SEO Specialist
                        </div>
                        <div class="course-meta">
                            <div class="rating">
                                <i data-lucide="star" size="13" style="fill:#ca8a04;"></i>
                                4.6 <span>(950 ulasan)</span>
                            </div>
                            <div class="meta-item">
                                <i data-lucide="layout-list" size="13"></i>
                                15 Pelajaran
                            </div>
                            <div class="meta-item">
                                <i data-lucide="clock" size="13"></i>
                                10j 45m
                            </div>
                        </div>
                        <div style="font-weight: 800; font-size: 1.1rem; margin-top: auto; margin-bottom: 16px; color: var(--text-dark); display:flex; align-items:center; justify-content:space-between;">
                            <div>Gratis <span style="font-size: 0.8rem; color: var(--text-muted); text-decoration: line-through; font-weight: 500; margin-left: 8px;">Rp 500.000</span></div>
                            <span style="display:inline-flex; align-items:center; gap:4px; font-size:0.75rem; background-color:#dcfce7; color:#16a34a; padding:4px 8px; border-radius:6px; font-weight:700;"><i data-lucide="check-circle" size="14"></i> Sudah Dibeli</span>
                        </div>
                        <a href="{{ route('courses.detail', ['slug' => 'digital-marketing']) }}" class="btn-continue" style="display:block; text-align:center; text-decoration:none;">Lihat Detail</a>
                    </div>
                </div>

            </div><!-- /courses-grid -->

        </div><!-- /content -->
    </div><!-- /main-content -->

</div><!-- /page-container -->

<script>
    lucide.createIcons();

    function filterCourses(category, btn) {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const sortType = document.querySelector('.sort-btn').value;
        const cards = document.querySelectorAll('.course-card');
        cards.forEach(card => {
            const isCategoryMatch = category === 'semua' || card.dataset.category === category;
            const isSortMatch = sortType === 'gratis' ? parseInt(card.dataset.price) === 0 : true;
            card.style.display = (isCategoryMatch && isSortMatch) ? 'flex' : 'none';
        });
    }

    function searchCourses(query) {
        const q = query.toLowerCase();
        const activeTab = document.querySelector('.tab-btn.active');
        const category = activeTab ? activeTab.getAttribute('onclick').match(/'([^']+)'/)[1] : 'semua';
        const sortType = document.querySelector('.sort-btn').value;

        document.querySelectorAll('.course-card').forEach(card => {
            const title = card.querySelector('.course-title').textContent.toLowerCase();
            const isCategoryMatch = category === 'semua' || card.dataset.category === category;
            const isSortMatch = sortType === 'gratis' ? parseInt(card.dataset.price) === 0 : true;
            card.style.display = (title.includes(q) && isCategoryMatch && isSortMatch) ? 'flex' : 'none';
        });
    }

    function sortCourses(type) {
        const grid = document.getElementById('coursesGrid');
        const cards = Array.from(grid.querySelectorAll('.course-card'));

        cards.sort((a, b) => {
            if (type === 'termurah' || type === 'gratis') return parseInt(a.dataset.price) - parseInt(b.dataset.price);
            if (type === 'termahal') return parseInt(b.dataset.price) - parseInt(a.dataset.price);
            if (type === 'terbaru') return parseInt(b.dataset.id) - parseInt(a.dataset.id); // Highest ID first
            if (type === 'terlama') return parseInt(a.dataset.id) - parseInt(b.dataset.id); // Lowest ID first
            return 0;
        });

        const activeTab = document.querySelector('.tab-btn.active');
        const category = activeTab ? activeTab.getAttribute('onclick').match(/'([^']+)'/)[1] : 'semua';

        cards.forEach(card => {
            grid.appendChild(card);
            const isCategoryMatch = category === 'semua' || card.dataset.category === category;
            const isSortMatch = type === 'gratis' ? parseInt(card.dataset.price) === 0 : true;
            card.style.display = (isCategoryMatch && isSortMatch) ? 'flex' : 'none';
        });
    }

    // User Profile Dropdown Toggle
    const userProfileBtn = document.getElementById('userProfileBtn');
    const userDropdownMenu = document.getElementById('userDropdownMenu');
    if (userProfileBtn && userDropdownMenu) {
        userProfileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            const isOpen = userDropdownMenu.classList.contains('show');
            userProfileBtn.classList.toggle('active', !isOpen);
            userDropdownMenu.classList.toggle('show', !isOpen);
        });

        document.addEventListener('click', function(e) {
            if (!userProfileBtn.contains(e.target) && !userDropdownMenu.contains(e.target)) {
                userProfileBtn.classList.remove('active');
                userDropdownMenu.classList.remove('show');
            }
        });
    }
</script>
</body>
</html>

