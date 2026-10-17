<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil & Pengaturan Akun - Pixel Community</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            --bg-body: #f4f7fa;
            --bg-white: #ffffff;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --blue: #2563eb;
            --blue-hover: #1d4ed8;
            --blue-light: #eff6ff;
            --green: #10b981;
            --green-light: #ecfdf5;
            --orange: #ea580c;
            --orange-light: #fff7ed;
            --red: #ef4444;
            --red-light: #fef2f2;
            --font-main: 'Inter', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-main);
            background-color: var(--bg-body);
            color: var(--text-dark);
            -webkit-font-smoothing: antialiased;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* ── Sidebar ── */
        .sidebar {
            width: 260px;
            background-color: #0f172a;
            color: #ffffff;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
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

        .logo-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-menu {
            padding: 24px 16px;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1;
            overflow-y: auto;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
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

        /* ── Main Content ── */
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
            color: var(--blue);
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

        /* User Profile & Dropdown */
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

        .dropdown-item:hover,
        .dropdown-item.active {
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

        /* ── Profile Content Area ── */
        .content {
            padding: 36px 40px 60px;
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        /* Hero Profile Card */
        .profile-hero-card {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 60%, #1e3a8a 100%);
            border-radius: 24px;
            padding: 32px 36px;
            color: #ffffff;
            margin-bottom: 28px;
            box-shadow: 0 16px 36px -10px rgba(15, 23, 42, 0.15);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
            position: relative;
            overflow: hidden;
        }

        .profile-hero-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 320px;
            height: 320px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.25) 0%, transparent 70%);
            pointer-events: none;
        }

        .profile-hero-left {
            display: flex;
            align-items: center;
            gap: 24px;
            position: relative;
            z-index: 1;
        }

        .profile-hero-avatar-wrap {
            position: relative;
            width: 88px;
            height: 88px;
            flex-shrink: 0;
        }

        .profile-hero-avatar {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        .profile-hero-status {
            position: absolute;
            bottom: 4px;
            right: 4px;
            width: 16px;
            height: 16px;
            background-color: #10b981;
            border: 3px solid #0f172a;
            border-radius: 50%;
        }

        .profile-hero-info h1 {
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            margin-bottom: 6px;
            line-height: 1.2;
        }

        .profile-hero-info p {
            color: #94a3b8;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .profile-badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 10px;
            background: rgba(37, 99, 235, 0.35);
            border: 1px solid rgba(96, 165, 250, 0.3);
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 700;
            color: #bfdbfe;
        }

        .profile-hero-stats {
            display: flex;
            align-items: center;
            gap: 20px;
            position: relative;
            z-index: 1;
        }

        .profile-hero-stat-box {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 12px 20px;
            border-radius: 16px;
            text-align: center;
            min-width: 105px;
        }

        .profile-hero-stat-box .num {
            font-size: 1.35rem;
            font-weight: 800;
            color: #ffffff;
            display: block;
            line-height: 1.2;
        }

        .profile-hero-stat-box .lbl {
            font-size: 0.75rem;
            color: #94a3b8;
            font-weight: 500;
            margin-top: 2px;
        }

        /* ── Tabs Navigation ── */
        .profile-tabs-bar {
            display: flex;
            gap: 12px;
            border-bottom: 2px solid var(--border-color);
            margin-bottom: 28px;
            padding-bottom: 4px;
        }

        .profile-tab-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            background: none;
            border: none;
            border-bottom: 2px solid transparent;
            margin-bottom: -6px;
            font-family: var(--font-main);
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-muted);
            cursor: pointer;
            transition: all 0.2s ease;
            border-radius: 8px 8px 0 0;
        }

        .profile-tab-btn:hover {
            color: var(--blue);
            background-color: rgba(37, 99, 235, 0.04);
        }

        .profile-tab-btn.active {
            color: var(--blue);
            border-bottom-color: var(--blue);
            font-weight: 700;
        }

        /* ── Tab Panes ── */
        .tab-pane {
            display: none;
            animation: fadeIn 0.25s ease forwards;
        }

        .tab-pane.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ── Form Card & Layout ── */
        .settings-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 28px;
        }

        .card-box {
            background-color: var(--bg-white);
            border-radius: 20px;
            padding: 28px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
            margin-bottom: 24px;
        }

        .card-box-header {
            margin-bottom: 22px;
            padding-bottom: 14px;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-box-header h2 {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-box-header p {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            background-color: #f8fafc;
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            font-family: var(--font-main);
            font-size: 0.9rem;
            color: var(--text-dark);
            transition: all 0.2s ease;
            outline: none;
        }

        .form-input:focus {
            background-color: #ffffff;
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .form-input.is-invalid {
            border-color: var(--red);
            background-color: #fffaf0;
        }

        .form-error {
            color: var(--red);
            font-size: 0.78rem;
            font-weight: 600;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .btn-submit {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: #0f172a;
            color: #ffffff;
            font-family: var(--font-main);
            font-size: 0.9rem;
            font-weight: 700;
            padding: 12px 24px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(15, 23, 42, 0.1);
        }

        .btn-submit:hover {
            background-color: #1e293b;
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(15, 23, 42, 0.15);
        }

        .btn-submit-danger {
            background-color: var(--red);
        }

        .btn-submit-danger:hover {
            background-color: #dc2626;
        }

        /* Success Alert */
        .alert-success {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: var(--green-light);
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 20px;
            animation: fadeIn 0.3s ease;
        }

        /* Danger Card */
        .card-danger {
            border: 1.5px solid #fecaca;
            background-color: #fffbfb;
        }

        .card-danger .card-box-header {
            border-bottom-color: #fee2e2;
        }

        .card-danger .card-box-header h2 {
            color: var(--red);
        }

        /* Side info items */
        .side-info-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .side-info-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.85rem;
            color: #475569;
            line-height: 1.45;
        }

        .side-info-item i {
            color: var(--blue);
            flex-shrink: 0;
            margin-top: 2px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar { display: none; }
            .main-content { margin-left: 0; }
            .header { padding: 14px 24px; }
            .content { padding: 24px 20px; }
            .settings-grid { grid-template-columns: 1fr; }
            .profile-hero-card { flex-direction: column; align-items: flex-start; }
            .profile-hero-stats { width: 100%; justify-content: space-between; }
            .profile-hero-stat-box { flex: 1; }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-logo">
                <div class="logo-icon"><i data-lucide="graduation-cap"></i></div>
                <span>Pixel Community</span>
            </div>

            <ul class="sidebar-menu">
                <li><a href="{{ url('/dashboard') }}"><i data-lucide="layout-dashboard"></i> Beranda</a></li>
                <li><a href="{{ route('courses') }}"><i data-lucide="compass"></i> Jelajahi Kelas</a></li>
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
                        <a href="{{ url('/dashboard') }}">Pixel Community</a> 
                        <i data-lucide="chevron-right" size="14"></i> 
                        <span id="breadcrumbTitle">Profil Saya</span>
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
                            <a href="#profile" class="dropdown-item" onclick="switchProfileTab('profile');">
                                <i data-lucide="user" size="15"></i>
                                <span>Profil Saya</span>
                            </a>
                            <a href="#settings" class="dropdown-item" onclick="switchProfileTab('settings');">
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

            <!-- Page Body -->
            <div class="content">
                
                <!-- Profile Hero Banner -->
                <div class="profile-hero-card">
                    <div class="profile-hero-left">
                        <div class="profile-hero-avatar-wrap">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=2563eb&color=ffffff&bold=true" alt="{{ auth()->user()->name ?? 'User' }}" class="profile-hero-avatar">
                            <span class="profile-hero-status" title="Online"></span>
                        </div>
                        <div class="profile-hero-info">
                            <h1>{{ auth()->user()->name ?? 'Pengguna' }}</h1>
                            <p>
                                <span><i data-lucide="mail" size="14" style="vertical-align:middle; margin-right:4px;"></i> {{ auth()->user()->email }}</span>
                                <span class="profile-badge-pill"><i data-lucide="shield-check" size="12"></i> Pelajar Aktif</span>
                                <span><i data-lucide="calendar" size="14" style="vertical-align:middle; margin-right:4px;"></i> Bergabung {{ auth()->user()->created_at ? auth()->user()->created_at->format('M Y') : 'Okt 2026' }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="profile-hero-stats">
                        <div class="profile-hero-stat-box">
                            <span class="num">12</span>
                            <span class="lbl">Kelas Diikuti</span>
                        </div>
                        <div class="profile-hero-stat-box">
                            <span class="num">7</span>
                            <span class="lbl">Kelas Selesai</span>
                        </div>
                        <div class="profile-hero-stat-box">
                            <span class="num">5</span>
                            <span class="lbl">Sertifikat</span>
                        </div>
                    </div>
                </div>

                <!-- Tabs Bar -->
                <div class="profile-tabs-bar">
                    <button type="button" class="profile-tab-btn active" id="tabBtnProfile" onclick="switchProfileTab('profile')">
                        <i data-lucide="user" size="17"></i> Profil Saya
                    </button>
                    <button type="button" class="profile-tab-btn" id="tabBtnSettings" onclick="switchProfileTab('settings')">
                        <i data-lucide="settings" size="17"></i> Pengaturan Akun & Keamanan
                    </button>
                </div>

                <!-- Tab Pane 1: Profil Saya -->
                <div class="tab-pane active" id="paneProfile">
                    <div class="settings-grid">
                        
                        <!-- Left: Profile Info Form -->
                        <div class="card-box">
                            <div class="card-box-header">
                                <div>
                                    <h2><i data-lucide="user-check" size="20" style="color:var(--blue);"></i> Informasi Profil</h2>
                                    <p>Perbarui identitas akun dan alamat email yang Anda gunakan.</p>
                                </div>
                            </div>

                            @if (session('status') === 'profile-updated')
                                <div class="alert-success">
                                    <i data-lucide="check-circle-2" size="18"></i>
                                    <span>Informasi profil Anda telah berhasil diperbarui!</span>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" id="name" name="name" class="form-input @error('name') is-invalid @enderror" value="{{ old('name', auth()->user()->name) }}" required autocomplete="name" placeholder="Masukkan nama lengkap Anda">
                                    @error('name')
                                        <div class="form-error"><i data-lucide="alert-circle" size="14"></i> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label">Alamat Email</label>
                                    <input type="email" id="email" name="email" class="form-input @error('email') is-invalid @enderror" value="{{ old('email', auth()->user()->email) }}" required autocomplete="email" placeholder="nama@email.com">
                                    @error('email')
                                        <div class="form-error"><i data-lucide="alert-circle" size="14"></i> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div style="display:flex; justify-content:flex-end; margin-top: 24px;">
                                    <button type="submit" class="btn-submit">
                                        <i data-lucide="save" size="16"></i> Simpan Perubahan Profil
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Right: Profile Info Sidebar -->
                        <div>
                            <div class="card-box">
                                <div class="card-box-header">
                                    <h2><i data-lucide="award" size="18" style="color:#f59e0b;"></i> Status Belajar</h2>
                                </div>
                                <ul class="side-info-list">
                                    <li class="side-info-item">
                                        <i data-lucide="check-circle" size="16" style="color:var(--green);"></i>
                                        <div><strong>Akun Aktif</strong><br>Email telah diverifikasi untuk akses kelas penuh.</div>
                                    </li>
                                    <li class="side-info-item">
                                        <i data-lucide="flame" size="16" style="color:var(--orange);"></i>
                                        <div><strong>Streak 5 Hari</strong><br>Konsistensi belajar harian terus dipertahankan.</div>
                                    </li>
                                    <li class="side-info-item">
                                        <i data-lucide="book-marked" size="16"></i>
                                        <div><strong>Akses Seumur Hidup</strong><br>Semua materi kelas tersimpan di akun Anda.</div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Tab Pane 2: Pengaturan Akun & Keamanan -->
                <div class="tab-pane" id="paneSettings">
                    <div class="settings-grid">
                        
                        <!-- Left: Password & Security Forms -->
                        <div>
                            <!-- Password Update Card -->
                            <div class="card-box">
                                <div class="card-box-header">
                                    <div>
                                        <h2><i data-lucide="lock" size="20" style="color:var(--blue);"></i> Ganti Kata Sandi</h2>
                                        <p>Pastikan akun Anda menggunakan kata sandi yang kuat dan aman.</p>
                                    </div>
                                </div>

                                @if (session('status') === 'password-updated')
                                    <div class="alert-success">
                                        <i data-lucide="check-circle-2" size="18"></i>
                                        <span>Kata sandi Anda telah berhasil diperbarui!</span>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    @method('put')

                                    <div class="form-group">
                                        <label for="current_password" class="form-label">Kata Sandi Saat Ini</label>
                                        <input type="password" id="current_password" name="current_password" class="form-input @error('current_password', 'updatePassword') is-invalid @enderror" autocomplete="current-password" placeholder="Masukkan kata sandi lama">
                                        @error('current_password', 'updatePassword')
                                            <div class="form-error"><i data-lucide="alert-circle" size="14"></i> {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="form-label">Kata Sandi Baru</label>
                                        <input type="password" id="password" name="password" class="form-input @error('password', 'updatePassword') is-invalid @enderror" autocomplete="new-password" placeholder="Minimal 8 karakter">
                                        @error('password', 'updatePassword')
                                            <div class="form-error"><i data-lucide="alert-circle" size="14"></i> {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi Baru</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-input @error('password_confirmation', 'updatePassword') is-invalid @enderror" autocomplete="new-password" placeholder="Ulangi kata sandi baru">
                                        @error('password_confirmation', 'updatePassword')
                                            <div class="form-error"><i data-lucide="alert-circle" size="14"></i> {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div style="display:flex; justify-content:flex-end; margin-top: 24px;">
                                        <button type="submit" class="btn-submit">
                                            <i data-lucide="key" size="16"></i> Perbarui Kata Sandi
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Danger Zone: Delete Account -->
                            <div class="card-box card-danger">
                                <div class="card-box-header">
                                    <div>
                                        <h2><i data-lucide="alert-triangle" size="20"></i> Zona Berbahaya: Hapus Akun</h2>
                                        <p style="color:#b91c1c;">Setelah akun dihapus, semua data kelas dan progres belajar akan terhapus secara permanen.</p>
                                    </div>
                                </div>

                                <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini secara permanen? Tindakan ini tidak dapat dibatalkan.');">
                                    @csrf
                                    @method('delete')

                                    <div class="form-group">
                                        <label for="delete_password" class="form-label" style="color:#991b1b;">Konfirmasi Kata Sandi Anda</label>
                                        <input type="password" id="delete_password" name="password" class="form-input @error('password', 'userDeletion') is-invalid @enderror" required placeholder="Masukkan kata sandi untuk menghapus akun">
                                        @error('password', 'userDeletion')
                                            <div class="form-error"><i data-lucide="alert-circle" size="14"></i> {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div style="display:flex; justify-content:flex-end; margin-top: 16px;">
                                        <button type="submit" class="btn-submit btn-submit-danger">
                                            <i data-lucide="trash-2" size="16"></i> Hapus Akun Saya Permanen
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Right: Security Tips -->
                        <div>
                            <div class="card-box">
                                <div class="card-box-header">
                                    <h2><i data-lucide="shield" size="18" style="color:var(--blue);"></i> Tips Keamanan</h2>
                                </div>
                                <ul class="side-info-list">
                                    <li class="side-info-item">
                                        <i data-lucide="check" size="16"></i>
                                        <div>Gunakan kombinasi huruf besar, huruf kecil, angka, dan simbol.</div>
                                    </li>
                                    <li class="side-info-item">
                                        <i data-lucide="check" size="16"></i>
                                        <div>Hindari menggunakan kata sandi yang sama dengan akun platform lain.</div>
                                    </li>
                                    <li class="side-info-item">
                                        <i data-lucide="check" size="16"></i>
                                        <div>Jangan pernah membagikan kredensial login kepada siapa pun.</div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();

        // Switch between Profile and Settings tabs
        function switchProfileTab(tabName) {
            const paneProfile = document.getElementById('paneProfile');
            const paneSettings = document.getElementById('paneSettings');
            const btnProfile = document.getElementById('tabBtnProfile');
            const btnSettings = document.getElementById('tabBtnSettings');
            const breadcrumbTitle = document.getElementById('breadcrumbTitle');

            if (tabName === 'settings') {
                paneProfile.classList.remove('active');
                paneSettings.classList.add('active');
                btnProfile.classList.remove('active');
                btnSettings.classList.add('active');
                if (breadcrumbTitle) breadcrumbTitle.textContent = 'Pengaturan Akun';
                window.location.hash = 'settings';
            } else {
                paneSettings.classList.remove('active');
                paneProfile.classList.add('active');
                btnSettings.classList.remove('active');
                btnProfile.classList.add('active');
                if (breadcrumbTitle) breadcrumbTitle.textContent = 'Profil Saya';
                window.location.hash = 'profile';
            }
            lucide.createIcons();
        }

        // On page load, detect URL hash or validation errors
        document.addEventListener('DOMContentLoaded', function() {
            const hash = window.location.hash;
            const hasPasswordError = {{ $errors->updatePassword->any() ? 'true' : 'false' }};
            const isPasswordUpdated = {{ session('status') === 'password-updated' ? 'true' : 'false' }};

            if (hash === '#settings' || hasPasswordError || isPasswordUpdated) {
                switchProfileTab('settings');
            } else {
                switchProfileTab('profile');
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
        });
    </script>
</body>
</html>
