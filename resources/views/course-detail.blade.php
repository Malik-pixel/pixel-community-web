<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Detail - Pixel Community</title>
    
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
            --blue: #0284c7;
            --blue-light: #e0f2fe;
            --blue-dark: #0f172a; /* used for dark buttons matching sidebar */
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
            background-color: #0f172a; /* Dark sidebar from the image */
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

        .top-breadcrumb a {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .top-breadcrumb a:hover {
            color: var(--blue);
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

        .icon-btn {
            background-color: var(--bg-body);
            border: 1px solid var(--border-color);
            width: 42px; height: 42px;
            border-radius: 12px;
            cursor: pointer;
            display: flex; align-items: center; justify-content: center;
        }

        .user-profile {
            display: flex; align-items: center; gap: 10px;
            padding-left: 20px;
            border-left: 1px solid var(--border-color);
        }

        .user-profile img {
            width: 38px; height: 38px; border-radius: 50%;
            object-fit: cover;
        }

        .user-info { display: flex; flex-direction: column; }
        .user-info .name { font-weight: 700; font-size: 0.875rem; }
        .user-info .role { color: var(--text-muted); font-size: 0.75rem; font-weight: 500; }

        /* â”€â”€ Page Content â”€â”€ */
        .content { padding: 30px 48px; max-width: 1200px; margin: 0 auto; width: 100%; }



        .course-layout {
            display: grid;
            grid-template-columns: 2.2fr 1fr;
            gap: 32px;
        }

        /* Left Column */
        .course-video-wrapper {
            background-color: var(--bg-white);
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 24px;
            position: relative;
            border: 1px solid var(--border-color);
        }

        .video-thumbnail {
            width: 100%;
            height: 400px;
            object-fit: cover;
            display: block;
        }

        .play-btn {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 64px; height: 64px;
            background-color: var(--bg-white);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform 0.2s;
        }

        .play-btn:hover { transform: translate(-50%, -50%) scale(1.05); }

        .tags { display: flex; gap: 8px; margin-bottom: 16px; }
        .tag {
            padding: 4px 12px;
            background-color: var(--blue-light);
            color: var(--blue);
            font-size: 0.75rem;
            font-weight: 700;
            border-radius: 20px;
        }

        .course-title { font-size: 2rem; font-weight: 800; margin-bottom: 16px; letter-spacing: -0.02em; }

        .course-stats {
            display: flex;
            align-items: center;
            gap: 24px;
            margin-bottom: 32px;
            flex-wrap: wrap;
        }

        .stat-item {
            display: flex; align-items: center; gap: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .stat-item i { color: var(--text-muted); }
        .stat-item .rating { color: var(--yellow); }
        .stat-item span { color: var(--text-muted); font-weight: 500; }
        .stat-author img { width: 28px; height: 28px; border-radius: 50%; }

        .section-title { font-size: 1.25rem; font-weight: 800; margin-bottom: 16px; }
        .section-text {
            color: var(--text-muted);
            line-height: 1.6;
            font-size: 0.95rem;
            margin-bottom: 32px;
        }

        .learning-box {
            background-color: var(--bg-white);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 32px;
        }

        .learning-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .learning-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.9rem;
            color: var(--text-dark);
            line-height: 1.5;
            font-weight: 500;
        }

        .learning-item i { color: var(--blue); flex-shrink: 0; margin-top: 2px; }

        .requirements-list { list-style: disc; padding-left: 20px; color: var(--text-muted); font-size: 0.95rem; line-height: 1.8; }

        /* Right Column */
        .enroll-card {
            background-color: var(--bg-white);
            border-radius: 20px;
            padding: 24px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);
            margin-bottom: 24px;
            text-align: center;
        }

        .price { font-size: 2rem; font-weight: 800; margin-bottom: 4px; }
        .original-price { color: var(--text-muted); text-decoration: line-through; font-size: 0.9rem; margin-bottom: 24px; }

        .btn-primary {
            width: 100%;
            padding: 14px;
            background-color: var(--blue-dark);
            color: var(--bg-white);
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            margin-bottom: 12px;
            transition: background-color 0.2s;
        }

        .btn-primary:hover { background-color: #1e293b; }

        .btn-outline {
            width: 100%;
            padding: 14px;
            background-color: transparent;
            color: var(--text-dark);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            margin-bottom: 24px;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            transition: background-color 0.2s;
        }

        .btn-outline:hover { background-color: var(--bg-body); }

        .features-list { display: flex; flex-direction: column; gap: 12px; text-align: left; }
        .feature-item {
            display: flex; align-items: center; gap: 12px;
            font-size: 0.85rem; color: var(--text-muted); font-weight: 500;
        }

        .curriculum-card {
            background-color: var(--bg-white);
            border-radius: 20px;
            padding: 24px;
            border: 1px solid var(--border-color);
        }

        .curriculum-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .curriculum-header h3 { font-size: 1.1rem; font-weight: 800; }
        .curriculum-header span { font-size: 0.8rem; color: var(--text-muted); font-weight: 600; }

        .lesson-list { display: flex; flex-direction: column; gap: 16px; }
        
        .lesson-group {
            background-color: var(--bg-body);
            border-radius: 12px;
            padding: 16px;
        }

        .lesson-item {
            display: flex; justify-content: space-between; align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid var(--border-color);
        }
        
        .lesson-item:last-child { border-bottom: none; padding-bottom: 0; }
        .lesson-item:first-child { padding-top: 0; }

        .lesson-title { display: flex; align-items: center; gap: 12px; font-size: 0.85rem; font-weight: 600; color: var(--text-dark); }
        .lesson-title i { color: var(--blue); }
        .lesson-duration { font-size: 0.8rem; color: var(--text-muted); }

    </style>
</head>
<body>
<div class="page-container">

    <!-- Sidebar (matching screenshot) -->
    <nav class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-icon"><i data-lucide="graduation-cap" size="24"></i></div>
            <div>
                Pixel Community
                <span class="subtitle">Premium Learning</span>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li><a href="{{ url('/dashboard') }}"><i data-lucide="layout-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="{{ route('courses') }}"><i data-lucide="compass"></i> Jelajahi Kelas</a></li>
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
                <a href="{{ route('courses') }}">Jelajahi Kelas</a>
                <i data-lucide="chevron-right" size="14"></i>
                <span>{{ $course['title'] }}</span>
            </div>
            <div class="header-actions">
                <div style="display:flex; align-items:center; gap:6px; background-color:#fff7ed; color:#ea580c; padding:6px 12px; border-radius:20px; font-weight:700; font-size:0.85rem; border:1px solid #ffedd5;">
                    <i data-lucide="flame" size="16" style="fill:#ea580c; color:#ea580c;"></i>
                    <span>5 Hari</span>
                </div>
                <button class="icon-btn"><i data-lucide="message-circle" size="18"></i></button>
                <button class="icon-btn"><i data-lucide="bell" size="18"></i></button>
                <button class="icon-btn"><i data-lucide="mail" size="18"></i></button>
                <div class="user-profile">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Putri & Zeee') }}&background=random" alt="User">
                    <div class="user-info">
                        <span class="name">{{ auth()->user()->name ?? 'Putri & Zeee' }}</span>
                        <span class="role">Student</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content -->
        <div class="content">


            <div class="course-layout">
                <!-- Left Column -->
                <div class="course-left">
                    <div class="course-video-wrapper">
                        <img src="{{ $course['image'] }}" onerror="this.src='https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800&q=80'" alt="Course Preview" class="video-thumbnail">
                        <div class="play-btn">
                            <i data-lucide="play" size="24" style="fill:var(--text-dark); color:var(--text-dark); margin-left:4px;"></i>
                        </div>
                    </div>

                    <div class="tags">
                        <span class="tag">{{ $course['category'] }}</span>
                        <span class="tag" style="background-color: var(--bg-white); border:1px solid var(--border-color); color:var(--text-muted)">{{ $course['badge'] }}</span>
                    </div>

                    <h2 class="course-title">{{ $course['title'] }}</h2>

                    <div class="course-stats">
                        <div class="stat-item stat-author">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($course['author']) }}" alt="Author">
                            {{ $course['author'] }}
                        </div>
                        <div class="stat-item rating">
                            <i data-lucide="star" size="16" style="fill:var(--yellow); color:var(--yellow)"></i>
                            {{ $course['rating'] }} <span>({{ $course['reviews'] }})</span>
                        </div>
                        <div class="stat-item">
                            <i data-lucide="users" size="16"></i>
                            {{ $course['students'] }} Siswa
                        </div>
                        <div class="stat-item">
                            <i data-lucide="clock" size="16"></i>
                            {{ $course['duration'] }}
                        </div>
                    </div>

                    <h3 class="section-title">Tentang Kelas Ini</h3>
                    <p class="section-text">
                        {{ $course['desc'] }}
                    </p>

                    <div class="learning-box">
                        <h3 class="section-title" style="font-size:1.1rem">Yang Akan Anda Pelajari</h3>
                        <div class="learning-grid">
                            <div class="learning-item">
                                <i data-lucide="check-circle-2" size="18"></i>
                                Memahami prinsip dan hukum dasar UX.
                            </div>
                            <div class="learning-item">
                                <i data-lucide="check-circle-2" size="18"></i>
                                Membuat wireframe dan prototipe interaktif.
                            </div>
                            <div class="learning-item">
                                <i data-lucide="check-circle-2" size="18"></i>
                                Menguasai teori warna, tipografi, dan spasi (spacing).
                            </div>
                            <div class="learning-item">
                                <i data-lucide="check-circle-2" size="18"></i>
                                Melakukan riset pengguna dasar dan pengujian kegunaan.
                            </div>
                        </div>
                    </div>

                    <h3 class="section-title">Persyaratan</h3>
                    <ul class="requirements-list">
                        <li>Tidak diperlukan pengalaman desain sebelumnya.</li>
                        <li>Komputer (Mac atau PC) dengan akses internet.</li>
                        <li>Figma (versi gratis sudah cukup).</li>
                    </ul>
                </div>

                <!-- Right Column -->
                <div class="course-right">
                    <div class="enroll-card">
                        @if(isset($course['progress']) && $course['progress'] > 0)
                            <div style="margin-bottom: 20px;">
                                <div style="display:flex; justify-content:space-between; margin-bottom:8px; font-weight:700;">
                                    <span>Progress Belajar</span>
                                    <span style="color:var(--{{ $course['progress'] == 100 ? 'green' : 'text-dark' }});">{{ $course['progress'] }}%</span>
                                </div>
                                <div style="width:100%; height:8px; background-color:#e2e8f0; border-radius:4px; overflow:hidden;">
                                    <div style="height:100%; width:{{ $course['progress'] }}%; background-color:var(--{{ $course['progress'] == 100 ? 'green' : 'text-dark' }}); border-radius:4px;"></div>
                                </div>
                            </div>
                            
                            @if($course['progress'] == 100)
                                <button class="btn-outline" style="border-color:var(--green); color:var(--green); margin-bottom: 12px; font-weight:700;">Unduh Sertifikat</button>
                                <a href="{{ route('learn', ['slug' => $slug]) }}" class="btn-primary" style="background-color:var(--text-dark); display:block; text-align:center; text-decoration:none;">Tinjau Ulang Materi</a>
                            @else
                                <a href="{{ route('learn', ['slug' => $slug]) }}" class="btn-primary" style="display:block; text-align:center; text-decoration:none;">Lanjutkan Belajar</a>
                            @endif
                        @else
                            <div class="price">Rp 750.000</div>
                            <button class="btn-primary">Daftar Sekarang</button>
                            <button class="btn-outline">
                                <i data-lucide="bookmark" size="18"></i> Simpan untuk Nanti
                            </button>
                        @endif

                        <div class="features-list">
                            <div class="feature-item">
                                <i data-lucide="youtube" size="16"></i> 20 jam video on-demand
                            </div>
                            <div class="feature-item">
                                <i data-lucide="file-text" size="16"></i> 15 materi dapat diunduh
                            </div>
                            <div class="feature-item">
                                <i data-lucide="award" size="16"></i> Sertifikat penyelesaian
                            </div>
                            <div class="feature-item">
                                <i data-lucide="infinity" size="16"></i> Akses penuh seumur hidup
                            </div>
                        </div>
                    </div>

                    <div class="curriculum-card">
                        <div class="curriculum-header">
                            <h3>Kurikulum</h3>
                            <span>7 Pelajaran</span>
                        </div>
                        
                        <div class="lesson-list">
                            <div class="lesson-group">
                                <div class="lesson-item">
                                    <div class="lesson-title">
                                        <i data-lucide="check-circle-2" size="16"></i>
                                        Apa itu Desain UI/UX?
                                    </div>
                                    <span class="lesson-duration">5:20</span>
                                </div>
                                <div class="lesson-item">
                                    <div class="lesson-title">
                                        <i data-lucide="check-circle-2" size="16"></i>
                                        Gambaran Umum Proses Desain
                                    </div>
                                    <span class="lesson-duration">8:45</span>
                                </div>
                                <div class="lesson-item">
                                    <div class="lesson-title">
                                        <i data-lucide="check-circle-2" size="16"></i>
                                        Alat Bantu Desain (Pengenalan Figma)
                                    </div>
                                    <span class="lesson-duration">12:10</span>
                                </div>
                            </div>
                            <!-- Additional Lessons -->
                            <div class="lesson-group">
                                <div class="lesson-item">
                                    <div class="lesson-title">
                                        <i data-lucide="circle" size="16"></i>
                                        Prinsip-prinsip UX Dasar
                                    </div>
                                    <span class="lesson-duration">15:30</span>
                                </div>
                                <div class="lesson-item">
                                    <div class="lesson-title">
                                        <i data-lucide="circle" size="16"></i>
                                        Membuat Wireframe
                                    </div>
                                    <span class="lesson-duration">22:15</span>
                                </div>
                                <div class="lesson-item">
                                    <div class="lesson-title">
                                        <i data-lucide="circle" size="16"></i>
                                        Prototyping Interaktif
                                    </div>
                                    <span class="lesson-duration">18:40</span>
                                </div>
                                <div class="lesson-item">
                                    <div class="lesson-title">
                                        <i data-lucide="circle" size="16"></i>
                                        Pengujian Pengguna (User Testing)
                                    </div>
                                    <span class="lesson-duration">10:05</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="curriculum-card" style="margin-top: 24px;">
                        <div class="curriculum-header">
                            <h3>Mentor Kelas</h3>
                        </div>
                        <div style="display:flex; gap:16px; align-items:center; margin-top: 16px;">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($course['author']) }}&background=0D8ABC&color=fff" alt="Author" style="width: 56px; height: 56px; border-radius: 50%;">
                            <div>
                                <h4 style="font-size: 1rem; font-weight: 700; margin-bottom:4px;">{{ $course['author'] }}</h4>
                                <p style="font-size: 0.8rem; color: var(--text-muted); line-height:1.4;">Seorang praktisi profesional dengan pengalaman lebih dari 5 tahun di bidangnya. Senang berbagi ilmu dan membantu siswa berkembang.</p>
                            </div>
                        </div>
                        <button class="btn-outline" style="width: 100%; margin-top: 16px; font-weight:600;"><i data-lucide="message-square" size="18"></i> Hubungi Mentor</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    lucide.createIcons();
</script>
</body>
</html>

