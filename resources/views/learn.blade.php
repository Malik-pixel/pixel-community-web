<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video - Pixel Community</title>
    
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
            --red: #dc2626;
            --red-light: #fee2e2;
            --blue: #0284c7;
            --blue-light: #e0f2fe;
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
            margin-left: 260px; flex: 1;
            display: flex; flex-direction: column;
            background-color: var(--bg-body); min-height: 100vh;
        }

        /* â”€â”€ Header â”€â”€ */
        .header {
            display: flex; justify-content: space-between; align-items: center;
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
            border-radius: 12px; padding: 0 16px;
            width: 280px; height: 42px;
        }

        .search-box i { color: var(--text-muted); flex-shrink: 0; }

        .search-box input {
            flex: 1; border: none; background: transparent;
            padding: 0 0 0 10px; font-family: var(--font-main);
            color: var(--text-dark); outline: none; font-size: 0.875rem; height: 100%;
        }

        .search-box input::placeholder { color: #94a3b8; }

        .icon-btn {
            background-color: var(--bg-body); border: 1px solid var(--border-color);
            width: 42px; height: 42px; border-radius: 12px;
            cursor: pointer; display: flex; align-items: center; justify-content: center;
            position: relative;
        }

        .icon-btn.has-dot::after {
            content: ''; position: absolute; top: 8px; right: 8px;
            width: 7px; height: 7px;
            background-color: var(--red); border-radius: 50%;
            border: 2px solid var(--bg-body);
        }

        .user-profile {
            display: flex; align-items: center; gap: 10px;
            padding-left: 20px; border-left: 1px solid var(--border-color);
        }

        .user-profile img {
            width: 38px; height: 38px; border-radius: 50%; object-fit: cover;
            border: 2px solid var(--bg-white); box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .user-info { display: flex; flex-direction: column; }
        .user-info .name { font-weight: 700; font-size: 0.875rem; }
        .user-info .role { color: var(--text-muted); font-size: 0.75rem; font-weight: 500; }

        /* â”€â”€ Content â”€â”€ */
        .content { padding: 40px 48px; }

        .page-title { font-size: 2rem; font-weight: 800; letter-spacing: -0.02em; margin-bottom: 8px; }
        .page-subtitle { color: var(--text-muted); font-size: 0.95rem; margin-bottom: 36px; }

        /* â”€â”€ Layout: video + sidebar â”€â”€ */
        .video-layout {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 28px;
            align-items: start;
        }

        /* â”€â”€ Video Player Card â”€â”€ */
        .video-player-card {
            background-color: var(--bg-white);
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(226,232,240,0.5);
            box-shadow: 0 4px 12px rgba(0,0,0,0.04);
        }

        .video-thumbnail {
            position: relative;
            width: 100%;
            aspect-ratio: 16/9;
            background-color: #1e293b;
            overflow: hidden;
            cursor: pointer;
        }

        .video-thumbnail img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform 0.4s;
            filter: brightness(0.7);
        }

        .video-thumbnail:hover img { transform: scale(1.03); }

        .video-overlay {
            position: absolute; inset: 0;
            display: flex; flex-direction: column;
            justify-content: flex-end;
            padding: 24px;
        }

        .play-btn {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 72px; height: 72px;
            background-color: rgba(255,255,255,0.95);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            box-shadow: 0 8px 24px rgba(0,0,0,0.3);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .play-btn:hover {
            transform: translate(-50%, -50%) scale(1.08);
            box-shadow: 0 12px 32px rgba(0,0,0,0.4);
        }

        .play-btn i { color: var(--text-dark); margin-left: 4px; }

        .video-category {
            display: inline-flex; align-items: center;
            background-color: rgba(255,255,255,0.2);
            backdrop-filter: blur(8px);
            color: #fff; font-size: 0.75rem; font-weight: 700;
            padding: 5px 12px; border-radius: 20px;
            margin-bottom: 10px;
            border: 1px solid rgba(255,255,255,0.2);
            width: fit-content;
        }

        .video-title-overlay {
            color: #fff; font-size: 1.5rem; font-weight: 800;
            letter-spacing: -0.01em; margin-bottom: 8px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .video-author-overlay {
            display: flex; align-items: center; gap: 8px;
            color: rgba(255,255,255,0.85); font-size: 0.85rem; font-weight: 500;
        }

        .video-duration {
            position: absolute; bottom: 24px; right: 24px;
            background-color: rgba(0,0,0,0.65);
            backdrop-filter: blur(4px);
            color: #fff; font-size: 0.8rem; font-weight: 700;
            padding: 4px 10px; border-radius: 6px;
            display: flex; align-items: center; gap: 6px;
        }

        /* â”€â”€ Tabs Below Player â”€â”€ */
        .video-tabs-container { margin-top: 24px; }
        
        .video-tabs {
            display: flex; gap: 32px; border-bottom: 1px solid var(--border-color);
            margin-bottom: 24px;
        }

        .tab-btn {
            background: none; border: none; font-size: 0.95rem; font-weight: 600;
            color: var(--text-muted); padding-bottom: 12px; cursor: pointer;
            position: relative; font-family: var(--font-main); transition: color 0.2s;
        }

        .tab-btn:hover { color: var(--text-dark); }
        .tab-btn.active { color: var(--text-dark); }
        .tab-btn.active::after {
            content: ''; position: absolute; bottom: -1px; left: 0; width: 100%;
            height: 2px; background-color: var(--text-dark);
        }

        .tab-content { font-size: 0.9rem; color: #475569; line-height: 1.6; display: none; }
        .tab-content.active { display: block; }
        
        .tab-content h3 { font-size: 1.1rem; font-weight: 700; color: var(--text-dark); margin-bottom: 12px; }

        /* â”€â”€ Playlist (Right Column) â”€â”€ */
        .playlist-card {
            background-color: var(--bg-white);
            border-radius: 20px; overflow: hidden;
            border: 1px solid rgba(226,232,240,0.5);
            box-shadow: 0 4px 8px rgba(0,0,0,0.03);
            display: flex; flex-direction: column;
        }

        .playlist-header {
            padding: 20px 24px; border-bottom: 1px solid var(--border-color);
            display: flex; justify-content: space-between; align-items: center;
        }

        .playlist-header h3 { font-size: 1.1rem; font-weight: 800; }
        .playlist-header span { font-size: 0.8rem; font-weight: 600; color: var(--text-muted); background: #f1f5f9; padding: 4px 8px; border-radius: 6px; }

        .playlist-items {
            display: flex; flex-direction: column;
            max-height: 500px; overflow-y: auto;
        }

        .playlist-item {
            display: flex; gap: 14px; padding: 16px 24px;
            border-bottom: 1px solid #f1f5f9; cursor: pointer;
            transition: background-color 0.2s;
        }

        .playlist-item:hover { background-color: #f8fafc; }
        .playlist-item.active { background-color: var(--blue-light); border-left: 3px solid var(--blue); padding-left: 21px; }

        .play-status { flex-shrink: 0; margin-top: 2px; }
        .play-status i { color: var(--text-muted); }
        .playlist-item.active .play-status i { color: var(--blue); }
        .playlist-item.done .play-status i { color: var(--green); }

        .play-info h4 { font-size: 0.9rem; font-weight: 600; margin-bottom: 4px; line-height: 1.4; color: var(--text-dark); }
        .playlist-item.active .play-info h4 { color: var(--blue); font-weight: 700; }
        
        .play-info span { font-size: 0.75rem; color: var(--text-muted); font-weight: 500; display: flex; align-items: center; gap: 4px; }

        /* â”€â”€ Responsive â”€â”€ */
        @media (max-width: 1200px) {
            .video-layout { grid-template-columns: 1fr; }
        }

        @media (max-width: 1024px) {
            .sidebar { display: none; }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>
<div class="page-container">

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
                Pixel Community <i data-lucide="chevron-right" size="14"></i> <span>Video Pembelajaran</span>
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

        <!-- Content -->
        <div class="content">
            <h2 class="page-title">Fundamental UI/UX Design</h2>
            <p class="page-subtitle">Pelajaran 4 dari 7 â€¢ Menonton: Memahami User Persona</p>

            <div class="video-layout">

                <!-- Left: Video Player -->
                <div class="video-player-card">
                    <div class="video-thumbnail" onclick="playVideo()">
                        <img src="/images/course_uiux_1790558583074.jpg" alt="Understanding User Persona" id="videoThumb">
                        <div class="play-btn" id="playBtn">
                            <i data-lucide="play" size="28"></i>
                        </div>
                        <div class="video-overlay">
                            <span class="video-category">UX Research</span>
                            <h2 class="video-title-overlay">Memahami User Persona</h2>
                            <div class="video-author-overlay">
                                <i data-lucide="user" size="14"></i>
                                Sarah Jenkins
                            </div>
                        </div>
                        <div class="video-duration">
                            <i data-lucide="clock" size="13"></i> 18:32
                        </div>
                    </div>

                    <!-- Tabs Info -->
                    <div class="video-info" style="padding-top: 10px;">
                        <div class="video-tabs-container">
                            <div class="video-tabs">
                                <button class="tab-btn active" onclick="switchTab('ringkasan', this)">Ringkasan</button>
                                <button class="tab-btn" onclick="switchTab('qa', this)">Tanya Jawab</button>
                                <button class="tab-btn" onclick="switchTab('lampiran', this)">Lampiran</button>
                            </div>
                            
                            <div id="tab-ringkasan" class="tab-content active">
                                <h3>Tentang Materi Ini</h3>
                                <p style="margin-bottom: 16px;">Dalam video ini, kita akan membahas cara mengidentifikasi dan mendefinisikan audiens target Anda. User persona adalah representasi fiktif dari audiens ideal Anda yang dibangun berdasarkan riset dan data pengguna yang sebenarnya.</p>
                                <div style="display:flex; align-items:center; gap:16px; margin-top:24px; padding:16px; background:#f8fafc; border-radius:12px;">
                                    <img src="https://ui-avatars.com/api/?name=Sarah+Jenkins&background=0D8ABC&color=fff" style="width:48px; height:48px; border-radius:50%;">
                                    <div>
                                        <h4 style="font-size:0.95rem; font-weight:700; color:var(--text-dark);">Sarah Jenkins</h4>
                                        <p style="font-size:0.8rem; color:var(--text-muted);">Lead UX Designer</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="tab-qa" class="tab-content">
                                <h3>Tanya Jawab</h3>
                                <p>Punya pertanyaan tentang materi ini? Tanyakan langsung ke mentor dan sesama siswa.</p>
                                <button class="btn-primary" style="background-color:var(--text-dark); margin-top:12px; font-size:0.85rem; padding:8px 16px; border-radius:8px; color:#fff; border:none; cursor:pointer;">Buat Pertanyaan Baru</button>
                            </div>
                            
                            <div id="tab-lampiran" class="tab-content">
                                <h3>File Pendukung</h3>
                                <div style="display:flex; align-items:center; gap:12px; padding:12px; border:1px solid var(--border-color); border-radius:8px; margin-top:12px;">
                                    <div style="background:var(--red-light); color:var(--red); padding:8px; border-radius:8px;"><i data-lucide="file-text" size="20"></i></div>
                                    <div style="flex:1;">
                                        <h4 style="font-size:0.9rem; font-weight:600;">Template User Persona.pdf</h4>
                                        <p style="font-size:0.75rem; color:var(--text-muted);">PDF â€¢ 2.4 MB</p>
                                    </div>
                                    <button style="background:none; border:none; color:var(--blue); cursor:pointer;"><i data-lucide="download" size="20"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Playlist -->
                <div class="playlist">

                    <!-- Curriculum Playlist -->
                    <div class="playlist-card">
                        <div class="playlist-header">
                            <h3>Materi Kelas</h3>
                            <span>7 Pelajaran</span>
                        </div>
                        <div class="playlist-items">
                            <div class="playlist-item done">
                                <div class="play-status"><i data-lucide="check-circle-2" size="18"></i></div>
                                <div class="play-info">
                                    <h4>Apa itu Desain UI/UX?</h4>
                                    <span><i data-lucide="clock" size="12"></i> 5:20</span>
                                </div>
                            </div>
                            <div class="playlist-item done">
                                <div class="play-status"><i data-lucide="check-circle-2" size="18"></i></div>
                                <div class="play-info">
                                    <h4>Gambaran Umum Proses Desain</h4>
                                    <span><i data-lucide="clock" size="12"></i> 8:45</span>
                                </div>
                            </div>
                            <div class="playlist-item done">
                                <div class="play-status"><i data-lucide="check-circle-2" size="18"></i></div>
                                <div class="play-info">
                                    <h4>Alat Bantu Desain (Figma)</h4>
                                    <span><i data-lucide="clock" size="12"></i> 12:10</span>
                                </div>
                            </div>
                            <div class="playlist-item active">
                                <div class="play-status"><i data-lucide="play-circle" size="18"></i></div>
                                <div class="play-info">
                                    <h4>Memahami User Persona</h4>
                                    <span><i data-lucide="clock" size="12"></i> 18:32</span>
                                </div>
                            </div>
                            <div class="playlist-item">
                                <div class="play-status"><i data-lucide="circle" size="18"></i></div>
                                <div class="play-info">
                                    <h4>Membuat Wireframe</h4>
                                    <span><i data-lucide="clock" size="12"></i> 22:15</span>
                                </div>
                            </div>
                            <div class="playlist-item">
                                <div class="play-status"><i data-lucide="circle" size="18"></i></div>
                                <div class="play-info">
                                    <h4>Prototyping Interaktif</h4>
                                    <span><i data-lucide="clock" size="12"></i> 18:40</span>
                                </div>
                            </div>
                            <div class="playlist-item">
                                <div class="play-status"><i data-lucide="circle" size="18"></i></div>
                                <div class="play-info">
                                    <h4>Pengujian Pengguna</h4>
                                    <span><i data-lucide="clock" size="12"></i> 10:05</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    lucide.createIcons();

    function playVideo() {
        const btn = document.getElementById('playBtn');
        const thumb = document.getElementById('videoThumb');
        btn.style.transform = 'translate(-50%,-50%) scale(0.9)';
        setTimeout(() => {
            btn.style.opacity = '0.5';
        }, 100);
        // Simulate playback state
        btn.style.pointerEvents = 'none';
        thumb.style.filter = 'brightness(0.5)';
        setTimeout(() => {
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="#0f172a" stroke="none"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>';
            btn.style.opacity = '1';
            btn.style.transform = 'translate(-50%,-50%) scale(1)';
            btn.style.pointerEvents = 'auto';
            btn.onclick = pauseVideo;
        }, 400);
    }

    function pauseVideo() {
        lucide.createIcons();
        document.getElementById('playBtn').onclick = null;
        document.getElementById('videoThumb').style.filter = 'brightness(0.7)';
        document.getElementById('playBtn').innerHTML = '';
        const icon = document.createElement('i');
        icon.setAttribute('data-lucide', 'play');
        icon.setAttribute('size', '28');
        document.getElementById('playBtn').appendChild(icon);
        lucide.createIcons();
        document.getElementById('playBtn').onclick = playVideo;
    }

    function switchTab(tabId, btn) {
        // Remove active class from all tabs
        document.querySelectorAll('.tab-btn').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
        
        // Add active class to clicked tab
        btn.classList.add('active');
        document.getElementById('tab-' + tabId).classList.add('active');
    }
</script>
</body>
</html>

