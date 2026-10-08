<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pixel Community</title>
    
    <!-- Google Fonts -->
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
            
            --blue-light: #e0f2fe;
            --blue: #0284c7;
            --blue-dark: #0369a1;
            
            --green-light: #dcfce7;
            --green: #16a34a;
            
            --orange-light: #ffedd5;
            --orange: #ea580c;
            
            --purple-light: #f3e8ff;
            --purple: #9333ea;
            
            --red-light: #fee2e2;
            --red: #dc2626;
            
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

        /* Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
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



        /* Main Content */
        .main-content {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: var(--bg-body);
            min-height: 100vh;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 48px;
            background-color: var(--bg-white);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 40;
        }

        .top-breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .top-breadcrumb span {
            color: var(--text-dark);
            font-weight: 700;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .search-box {
            display: flex;
            align-items: center;
            background-color: var(--bg-white);
            border: 1px solid rgba(226, 232, 240, 0.6);
            border-radius: 12px;
            padding: 0 16px;
            width: 320px;
            height: 44px;
            transition: border-color 0.2s, box-shadow 0.2s;
            box-shadow: 0 1px 2px rgba(0,0,0,0.02);
        }

        .search-box:focus-within {
            border-color: var(--border-color);
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        }

        .search-box i {
            color: var(--text-muted);
            flex-shrink: 0;
            display: flex;
        }

        .search-box input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 0 0 0 12px;
            font-family: var(--font-main);
            color: var(--text-dark);
            outline: none;
            font-size: 0.9rem;
            height: 100%;
        }

        .icon-btn {
            background-color: var(--bg-white);
            border: 1px solid transparent;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            color: var(--text-dark);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
            transition: all 0.2s;
        }
        
        .icon-btn:hover {
            border-color: var(--border-color);
        }
        
        .icon-btn.has-dot::after {
            content: '';
            position: absolute;
            top: 8px;
            right: 8px;
            width: 8px;
            height: 8px;
            background-color: var(--red);
            border-radius: 50%;
            border: 2px solid var(--bg-white);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-left: 24px;
            border-left: 1px solid var(--border-color);
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--bg-white);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-info .name {
            font-weight: 700;
            font-size: 0.9rem;
        }

        .user-info .role {
            color: var(--text-muted);
            font-size: 0.75rem;
            font-weight: 500;
        }

        /* Content Body */
        .content {
            padding: 40px 48px 48px;
            max-width: 1400px;
        }

        /* Grid System */
        .top-row {
            display: grid;
            grid-template-columns: 2.2fr 1fr 1fr 1fr 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }

        .card {
            background-color: var(--bg-white);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
            border: 1px solid rgba(226, 232, 240, 0.4);
        }

        .welcome-card {
            grid-column: 1 / 2;
            background-color: var(--text-dark);
            color: var(--bg-white);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .welcome-card::after {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .welcome-card h2 {
            font-size: 1.75rem;
            font-weight: 800;
            margin-bottom: 8px;
            line-height: 1.3;
            letter-spacing: -0.01em;
            position: relative;
            z-index: 1;
        }

        .welcome-card p {
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
            margin-bottom: 24px;
            line-height: 1.5;
            max-width: 90%;
            position: relative;
            z-index: 1;
        }

        .btn-white {
            background-color: var(--bg-white);
            color: var(--text-dark);
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: transform 0.2s;
            align-self: flex-start;
            position: relative;
            z-index: 1;
        }

        .btn-white:hover { 
            transform: translateY(-2px);
        }

        .stat-card {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            gap: 16px;
        }

        .icon-circle {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }

        .stat-info h3 {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 2px;
        }

        .stat-info p {
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 600;
            white-space: nowrap;
        }

        .middle-row {
            display: grid;
            grid-template-columns: 2fr 1.5fr 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-header h3 {
            font-size: 1.1rem;
            font-weight: 800;
            letter-spacing: -0.01em;
        }

        .view-all {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-dark);
            text-decoration: none;
        }

        /* My Learning List */
        .learning-item {
            display: flex;
            align-items: center;
            gap: 16px;
            background-color: var(--bg-white);
            padding: 16px;
            border-radius: 20px;
            margin-bottom: 16px;
            border: 1px solid rgba(226, 232, 240, 0.4);
            box-shadow: 0 2px 4px rgba(0,0,0,0.01);
            transition: transform 0.2s;
        }
        
        .learning-item:hover {
            transform: translateX(4px);
            border-color: var(--border-color);
        }

        .course-thumb {
            width: 100px;
            height: 70px;
            border-radius: 12px;
            object-fit: cover;
        }

        .course-info {
            flex: 1;
        }

        .course-info h4 {
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .course-info p {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 12px;
            font-weight: 500;
        }

        .progress-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .progress-bar {
            flex: 1;
            height: 6px;
            background-color: #f1f5f9;
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background-color: var(--text-dark);
            border-radius: 3px;
        }

        .progress-text {
            font-size: 0.75rem;
            font-weight: 700;
            min-width: 35px;
        }

        .btn-outline {
            padding: 10px 20px;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            background-color: transparent;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-outline:hover {
            background-color: var(--text-dark);
            color: var(--bg-white);
            border-color: var(--text-dark);
        }

        /* Activity Card */
        .activity-card {
            display: flex;
            flex-direction: column;
            padding: 24px;
        }

        .dropdown {
            font-size: 0.8rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
            cursor: pointer;
            font-weight: 600;
            background-color: #f1f5f9;
            padding: 6px 12px;
            border-radius: 8px;
        }

        .activity-stats .subtitle {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .activity-stats .time {
            font-size: 1.75rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 32px;
            letter-spacing: -0.02em;
        }

        .badge-green {
            background-color: var(--green-light);
            color: var(--green);
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .chart-container {
            flex: 1;
            position: relative;
            margin-top: 10px;
            min-height: 120px;
        }
        
        .chart-svg {
            width: 100%;
            height: 100%;
            overflow: visible;
        }

        .chart-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 16px;
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--text-muted);
        }

        /* Upcoming Tasks */
        .task-item {
            display: flex;
            align-items: center;
            gap: 16px;
            background-color: var(--bg-white);
            padding: 16px;
            border-radius: 16px;
            margin-bottom: 12px;
            border: 1px solid rgba(226, 232, 240, 0.4);
            cursor: pointer;
            transition: transform 0.2s, border-color 0.2s;
        }
        
        .task-item:hover {
            transform: translateX(4px);
            border-color: var(--border-color);
        }

        .task-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .task-info {
            flex: 1;
        }

        .task-info h4 {
            font-size: 0.9rem;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .task-info p {
            font-size: 0.75rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
        }

        .arrow {
            color: var(--text-muted);
        }

        /* Bottom Row */
        .bottom-row {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
        }
        
        .quiz-wrapper {
            display: flex;
            gap: 24px;
        }

        .quiz-card {
            background-color: var(--bg-white);
            border-radius: 24px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(226, 232, 240, 0.4);
            flex: 1;
        }

        .quiz-icon {
            width: 44px;
            height: 44px;
            background-color: var(--blue-light);
            color: var(--blue);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
        }

        .quiz-content h3 {
            font-size: 1.15rem;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: -0.01em;
        }

        .quiz-content p {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 24px;
            font-weight: 500;
        }

        .btn-outline-dark {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            background-color: transparent;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s;
        }
        
        .btn-outline-dark:hover {
            background-color: var(--bg-body);
        }

        .up-next-card {
            background-color: var(--text-dark);
            color: var(--bg-white);
            border-radius: 24px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            flex: 1;
        }
        
        .up-next-card::after {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
        }

        .next-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            position: relative;
            z-index: 1;
        }
        
        .next-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .badge-gray {
            background-color: rgba(255,255,255,0.1);
            color: var(--bg-white);
            padding: 6px 10px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .up-next-card .subtitle {
            font-size: 0.8rem;
            color: rgba(255,255,255,0.7);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .up-next-card h3 {
            font-size: 1.15rem;
            font-weight: 700;
            line-height: 1.4;
            position: relative;
            z-index: 1;
        }

        /* Utilities */
        .bg-blue { background-color: var(--blue-light); }
        .text-blue { color: var(--blue); }
        .bg-green { background-color: var(--green-light); }
        .text-green { color: var(--green); }
        .bg-orange { background-color: var(--orange-light); }
        .text-orange { color: var(--orange); }
        .bg-purple { background-color: var(--purple-light); }
        .text-purple { color: var(--purple); }
        .bg-red-light { background-color: var(--red-light); }
        .text-red { color: var(--red); }
        
        @media (max-width: 1400px) {
            .top-row { grid-template-columns: 2fr 1fr 1fr 1fr 1fr; }
            .middle-row { grid-template-columns: 1fr 1fr; }
            .tasks-section { grid-column: 1 / -1; }
        }
        
        @media (max-width: 1024px) {
            .sidebar { display: none; }
            .main-content { margin-left: 0; }
            .top-row { grid-template-columns: 1fr 1fr 1fr; }
            .welcome-card { grid-column: 1 / -1; }
            .middle-row { grid-template-columns: 1fr; }
            .bottom-row { grid-template-columns: 1fr; }
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
                <li class="active"><a href="{{ url('/dashboard') }}"><i data-lucide="layout-dashboard"></i> Beranda</a></li>
                <li><a href="{{ route('courses') }}"><i data-lucide="compass"></i> Jelajahi Kelas</a></li>
                <li><a href="{{ route('videos') }}"><i data-lucide="book-open"></i> Kelas Saya</a></li>
                <li><a href="#"><i data-lucide="list-checks"></i> Kuis</a></li>
                <li><a href="#"><i data-lucide="award"></i> Sertifikat</a></li>
                <li><a href="#"><i data-lucide="clipboard-list"></i> Tugas</a></li>
                <li><a href="#"><i data-lucide="credit-card"></i> Pembayaran</a></li>
            </ul>


        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="top-breadcrumb">
                    Pixel Community <i data-lucide="chevron-right" size="14"></i> <span>Beranda</span>
                </div>
                <div class="header-actions">
                    <div style="display:flex; align-items:center; gap:6px; background-color:#fff7ed; color:#ea580c; padding:6px 12px; border-radius:20px; font-weight:700; font-size:0.85rem; border:1px solid #ffedd5;">
                        <i data-lucide="flame" size="18" style="fill:#ea580c; color:#ea580c;"></i>
                        <span>5 Hari</span>
                    </div>
                    <button class="icon-btn"><i data-lucide="message-circle" size="20"></i></button>
                    <button class="icon-btn has-dot"><i data-lucide="bell" size="20"></i></button>
                    <div class="user-profile">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Putri Zeee') }}&background=random" alt="User">
                        <div class="user-info">
                            <span class="name">{{ auth()->user()->name ?? 'Putri & Zeee' }}</span>
                            <span class="role">Pelajar</span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" style="display:inline; margin-left: 12px;">
                            @csrf
                            <button type="submit" style="background-color: var(--red-light);border:none;cursor:pointer;display:flex;align-items:center;padding:10px;border-radius:10px;" title="Keluar">
                                <i data-lucide="log-out" size="18" color="#dc2626"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <div class="content">
                <!-- Top Row (Greeting + Stats) -->
                <div class="top-row">
                    <div class="card welcome-card">
                        <h2>Halo, {{ auth()->user()->name ?? 'Pengguna' }}! 👋</h2>
                        <p>Yuk, lanjutkan belajar hari ini!</p>
                        <button class="btn-white">Lanjutkan Belajar <i data-lucide="arrow-right" size="16"></i></button>
                    </div>

                    <div class="card stat-card">
                        <div class="icon-circle bg-blue"><i data-lucide="book-open" class="text-blue"></i></div>
                        <div class="stat-info">
                            <h3>12</h3>
                            <p>Kelas Diikuti</p>
                        </div>
                    </div>

                    <div class="card stat-card">
                        <div class="icon-circle bg-green"><i data-lucide="check-circle" class="text-green"></i></div>
                        <div class="stat-info">
                            <h3>7</h3>
                            <p>Selesai</p>
                        </div>
                    </div>

                    <div class="card stat-card">
                        <div class="icon-circle bg-orange"><i data-lucide="clock" class="text-orange"></i></div>
                        <div class="stat-info">
                            <h3>3</h3>
                            <p>Tugas Tertunda</p>
                        </div>
                    </div>

                    <div class="card stat-card">
                        <div class="icon-circle bg-purple"><i data-lucide="award" class="text-purple"></i></div>
                        <div class="stat-info">
                            <h3>5</h3>
                            <p>Sertifikat</p>
                        </div>
                    </div>
                </div>

                <!-- Middle Row (My Learning, Activity, Upcoming Tasks) -->
                <div class="middle-row">
                    <!-- My Learning -->
                    <div class="learning-section">
                        <div class="section-header">
                            <h3>Kelas Saya</h3>
                            <a href="#" class="view-all">Lihat Semua</a>
                        </div>
                        
                        <div class="learning-list">
                            <!-- Item 1 -->
                            <div class="learning-item">
                                <img src="/images/course_uiux_1790558583074.jpg" alt="UI/UX" class="course-thumb">
                                <div class="course-info">
                                    <h4>UI/UX Design Fundamental</h4>
                                    <p>12/16 Pelajaran Selesai</p>
                                    <div class="progress-container">
                                        <div class="progress-bar"><div class="progress-fill" style="width: 75%"></div></div>
                                        <span class="progress-text">75%</span>
                                    </div>
                                </div>
                                <button class="btn-outline">Lanjutkan</button>
                            </div>
                            <!-- Item 2 -->
                            <div class="learning-item">
                                <img src="/images/course_react_1790558572624.jpg" alt="Web Dev" class="course-thumb">
                                <div class="course-info">
                                    <h4>Web Development Bootcamp</h4>
                                    <p>10/25 Pelajaran Selesai</p>
                                    <div class="progress-container">
                                        <div class="progress-bar"><div class="progress-fill" style="width: 40%"></div></div>
                                        <span class="progress-text">40%</span>
                                    </div>
                                </div>
                                <button class="btn-outline">Lanjutkan</button>
                            </div>
                        </div>
                        
                        <div class="quiz-wrapper" style="margin-top: 24px;">
                            <div class="quiz-card">
                                <div class="quiz-icon"><i data-lucide="list-todo" size="20"></i></div>
                                <div class="quiz-content">
                                    <h3>Kuis UI/UX</h3>
                                    <p>10 Pertanyaan â€¢ 20 Menit</p>
                                </div>
                                <button class="btn-outline-dark">Mulai Kuis</button>
                            </div>
                            
                            <div class="up-next-card">
                                <div class="next-header">
                                    <div class="next-icon"><i data-lucide="play" size="20"></i></div>
                                    <span class="badge-gray">Tersisa 18:32</span>
                                </div>
                                <div>
                                    <p class="subtitle">Berikutnya</p>
                                    <h3>Memahami<br>User Persona</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Activity -->
                    <div class="card activity-card">
                        <div class="section-header">
                            <h3>Aktivitas</h3>
                            <div class="dropdown">Minggu Ini <i data-lucide="chevron-down" size="14"></i></div>
                        </div>
                        <div class="activity-stats">
                            <p class="subtitle">Total Waktu Belajar</p>
                            <div class="time">
                                24h 35m
                                <span class="badge-green"><i data-lucide="arrow-up" size="12"></i> 18%</span>
                            </div>
                        </div>
                        <div class="chart-container">
                            <!-- Smooth SVG Line Chart -->
                            <svg viewBox="0 0 200 100" class="chart-svg" preserveAspectRatio="none">
                                <!-- Line Path (Smoothed via L with round joins and bezier) -->
                                <path d="M10,85 C30,70 40,70 50,65 C70,55 80,75 90,80 C110,85 120,50 140,40 C160,30 180,15 195,10" fill="none" stroke="#0f172a" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                
                                <!-- Filled Area under curve -->
                                <path d="M10,85 C30,70 40,70 50,65 C70,55 80,75 90,80 C110,85 120,50 140,40 C160,30 180,15 195,10 L195,100 L10,100 Z" fill="url(#gradient)" opacity="0.1" />
                                
                                <defs>
                                    <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                        <stop offset="0%" stop-color="#0f172a" />
                                        <stop offset="100%" stop-color="#ffffff" stop-opacity="0" />
                                    </linearGradient>
                                </defs>
                                
                                <!-- Data Points -->
                                <circle cx="10" cy="85" r="4" fill="#ffffff" stroke="#0f172a" stroke-width="2" />
                                <circle cx="50" cy="65" r="4" fill="#ffffff" stroke="#0f172a" stroke-width="2" />
                                <circle cx="90" cy="80" r="4" fill="#ffffff" stroke="#0f172a" stroke-width="2" />
                                <circle cx="140" cy="40" r="4" fill="#ffffff" stroke="#0f172a" stroke-width="2" />
                                <circle cx="195" cy="10" r="4" fill="#ffffff" stroke="#0f172a" stroke-width="2" />
                            </svg>
                        </div>
                        <div class="chart-labels">
                            <span>Sen</span>
                            <span>Rab</span>
                            <span>Jum</span>
                            <span>Min</span>
                        </div>
                    </div>

                    <!-- Upcoming Tasks -->
                    <div class="tasks-section">
                        <div class="section-header">
                            <h3>Tugas Mendatang</h3>
                        </div>
                        <div class="tasks-list">
                            <!-- Task 1 -->
                            <div class="task-item">
                                <div class="task-icon bg-red-light text-red"><i data-lucide="pen-tool" size="20"></i></div>
                                <div class="task-info">
                                    <h4>Tugas Desain UI</h4>
                                    <p><i data-lucide="calendar" size="12"></i> Besok</p>
                                </div>
                                <i data-lucide="more-vertical" size="18" class="arrow"></i>
                            </div>
                            <!-- Task 2 -->
                            <div class="task-item">
                                <div class="task-icon bg-blue-light text-blue"><i data-lucide="code" size="20"></i></div>
                                <div class="task-info">
                                    <h4>Proyek Web Dev</h4>
                                    <p><i data-lucide="calendar" size="12"></i> 3 hari lagi</p>
                                </div>
                                <i data-lucide="more-vertical" size="18" class="arrow"></i>
                            </div>
                            <!-- Task 3 -->
                            <div class="task-item">
                                <div class="task-icon bg-green-light text-green"><i data-lucide="video" size="20"></i></div>
                                <div class="task-info">
                                    <h4>Zoom Meeting</h4>
                                    <p><i data-lucide="calendar" size="12"></i> Jumat, 14:00</p>
                                </div>
                                <i data-lucide="more-vertical" size="18" class="arrow"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Initialize Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>

