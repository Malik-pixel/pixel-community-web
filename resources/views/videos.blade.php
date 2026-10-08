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

        /* â”€â”€ Header â”€â”€ */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 48px;
            background-color: var(--bg-white);
            border-bottom: 1px solid var(--border-color);
            position: sticky; top: 0; z-index: 40;
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

        .header-actions { display: flex; align-items: center; gap: 16px; }

        .search-box {
            display: flex; align-items: center;
            background-color: var(--bg-body);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 0 16px;
            width: 300px; height: 42px;
        }

        .search-box i { color: var(--text-muted); flex-shrink: 0; }

        .search-box input {
            flex: 1; border: none; background: transparent;
            padding: 0 0 0 10px;
            font-family: var(--font-main);
            color: var(--text-dark);
            outline: none; font-size: 0.875rem; height: 100%;
        }

        .search-box input::placeholder { color: #94a3b8; }

        .icon-btn {
            background-color: var(--bg-body);
            border: 1px solid var(--border-color);
            width: 42px; height: 42px;
            border-radius: 12px;
            cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            position: relative;
        }

        .icon-btn.has-dot::after {
            content: '';
            position: absolute; top: 8px; right: 8px;
            width: 7px; height: 7px;
            background-color: var(--red); border-radius: 50%;
            border: 2px solid var(--bg-body);
        }

        .user-profile {
            display: flex; align-items: center; gap: 10px;
            padding-left: 20px;
            border-left: 1px solid var(--border-color);
        }

        .user-profile img {
            width: 38px; height: 38px; border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--bg-white);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .user-info { display: flex; flex-direction: column; }
        .user-info .name { font-weight: 700; font-size: 0.875rem; }
        .user-info .role { color: var(--text-muted); font-size: 0.75rem; font-weight: 500; }

        /* â”€â”€ Page Content â”€â”€ */
        .content { padding: 40px 48px; }

        .page-title { font-size: 2rem; font-weight: 800; letter-spacing: -0.02em; margin-bottom: 8px; }
        .page-subtitle { color: var(--text-muted); font-size: 0.95rem; margin-bottom: 36px; }

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

        .filter-search {
            display: flex; align-items: center;
            background-color: var(--bg-white);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 0 14px;
            height: 40px;
            gap: 8px;
        }

        .filter-search input {
            border: none; background: transparent;
            font-family: var(--font-main);
            font-size: 0.875rem;
            color: var(--text-dark);
            outline: none;
            width: 160px;
        }

        .filter-search input::placeholder { color: #94a3b8; }

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
                <li><a href="{{ route('courses') }}"><i data-lucide="compass"></i> Jelajahi Kelas</a></li>
                <li class="active"><a href="{{ route('videos') }}"><i data-lucide="book-open"></i> Kelas Saya</a></li>
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
                Pixel Community <i data-lucide="chevron-right" size="14"></i> <span>Kelas Saya</span>
            </div>
            <div class="header-actions">
                <div style="display:flex; align-items:center; gap:6px; background-color:#fff7ed; color:#ea580c; padding:6px 12px; border-radius:20px; font-weight:700; font-size:0.85rem; border:1px solid #ffedd5;">
                    <i data-lucide="flame" size="16" style="fill:#ea580c; color:#ea580c;"></i>
                    <span>5 Hari</span>
                </div>
                <button class="icon-btn"><i data-lucide="message-circle" size="18"></i></button>
                <button class="icon-btn has-dot"><i data-lucide="bell" size="18"></i></button>
                <div class="user-profile">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=random" alt="User">
                    <div class="user-info">
                        <span class="name">{{ auth()->user()->name ?? 'Pengguna' }}</span>
                        <span class="role">Pelajar</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="content">
            <h2 class="page-title">Kelas Saya</h2>
            <p class="page-subtitle">Kelola dan lanjutkan semua kelas yang sedang kamu ikuti.</p>

            <!-- Filter Bar -->
            <div class="filter-bar">
                <div class="tabs">
                    <button class="tab-btn active" onclick="filterCourses('semua', this)">Semua</button>
                    <button class="tab-btn" onclick="filterCourses('berlangsung', this)">Berlangsung</button>
                    <button class="tab-btn" onclick="filterCourses('selesai', this)">Selesai</button>
                    <button class="tab-btn" onclick="filterCourses('belum-mulai', this)">Belum Dimulai</button>
                </div>
                <div class="filter-right">
                    <div class="filter-search">
                        <i data-lucide="search" size="15" style="color:#94a3b8;"></i>
                        <input type="text" placeholder="Cari kelas..." id="courseSearch" oninput="searchCourses(this.value)">
                    </div>
                    <button class="sort-btn">Terbaru <i data-lucide="chevron-down" size="15"></i></button>
                </div>
            </div>

            <!-- Courses Grid -->
            <div class="courses-grid" id="coursesGrid">

                <!-- Card 1 - In Progress -->
                <div class="course-card" data-status="berlangsung">
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
                        <div class="progress-section" style="margin-top: auto;">
                            <div class="progress-label">
                                <span>Progress</span>
                                <span class="course-progress-pct">65%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill dark" style="width:65%"></div>
                            </div>
                        </div>
                        <a href="{{ route('learn', ['slug' => 'ui-ux']) }}" class="btn-continue" style="display:block; text-align:center; text-decoration:none;">Lanjutkan Belajar</a>
                    </div>
                </div>

                <!-- Card 2 - In Progress -->
                <div class="course-card" data-status="berlangsung">
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
                        <div class="progress-section" style="margin-top: auto;">
                            <div class="progress-label">
                                <span>Progress</span>
                                <span class="course-progress-pct">12%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill dark" style="width:12%"></div>
                            </div>
                        </div>
                        <a href="{{ route('learn', ['slug' => 'react']) }}" class="btn-continue" style="display:block; text-align:center; text-decoration:none;">Lanjutkan Belajar</a>
                    </div>
                </div>

                <!-- Card 3 - Completed -->
                <div class="course-card" data-status="selesai">
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
                        <div class="progress-section" style="margin-top: auto;">
                            <div class="progress-label">
                                <span>Progress</span>
                                <span class="course-progress-pct green">100%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill green" style="width:100%"></div>
                            </div>
                        </div>
                        <a href="{{ route('learn', ['slug' => 'growth']) }}" class="btn-continue outline" style="display:block; text-align:center; text-decoration:none;">Tinjau Ulang</a>
                    </div>
                </div>

                <!-- Card 4 - Not Started -->
                <div class="course-card" data-status="belum-mulai">
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
                        <div class="progress-section" style="margin-top: auto;">
                            <div class="progress-label">
                                <span>Progress</span>
                                <span class="course-progress-pct">0%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill dark" style="width:0%"></div>
                            </div>
                        </div>
                        <a href="{{ route('learn', ['slug' => 'python']) }}" class="btn-continue" style="display:block; text-align:center; text-decoration:none;">Mulai Belajar</a>
                    </div>
                </div>

                <!-- Card 5 - Digital Marketing -->
                <div class="course-card" data-status="belum-mulai">
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
                        <div class="progress-section" style="margin-top: auto;">
                            <div class="progress-label">
                                <span>Progress</span>
                                <span class="course-progress-pct">0%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill dark" style="width:0%"></div>
                            </div>
                        </div>
                        <a href="{{ route('learn', ['slug' => 'digital-marketing']) }}" class="btn-continue" style="display:block; text-align:center; text-decoration:none;">Mulai Belajar</a>
                    </div>
                </div>

            </div><!-- /courses-grid -->

        </div><!-- /content -->
    </div><!-- /main-content -->

</div><!-- /page-container -->

<script>
    lucide.createIcons();

    function filterCourses(status, btn) {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const cards = document.querySelectorAll('.course-card');
        cards.forEach(card => {
            const show = status === 'semua' || card.dataset.status === status;
            card.style.display = show ? 'flex' : 'none';
        });
    }

    function searchCourses(query) {
        const q = query.toLowerCase();
        document.querySelectorAll('.course-card').forEach(card => {
            const title = card.querySelector('.course-title').textContent.toLowerCase();
            card.style.display = title.includes(q) ? 'flex' : 'none';
        });
    }
</script>
</body>
</html>

