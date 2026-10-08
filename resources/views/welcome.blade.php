<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Community - Belajar Tanpa Batas</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            --primary-dark: #0f172a;
            --primary-light: #1e293b;
            --accent-blue: #2563eb;
            --accent-hover: #1d4ed8;
            --text-light: #f8fafc;
            --text-muted: #94a3b8;
            --bg-main: #f8fafc;
            --bg-white: #ffffff;
            --border-color: #e2e8f0;
            --font-main: 'Inter', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-main);
            background-color: var(--bg-main);
            color: var(--primary-dark);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Navbar */
        .navbar {
            background-color: var(--primary-dark);
            color: var(--text-light);
            padding: 20px 0;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            font-size: 1.25rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-links {
            display: flex;
            gap: 32px;
        }

        .nav-links a {
            font-size: 0.9rem;
            color: var(--text-muted);
            transition: color 0.3s;
            font-weight: 500;
        }

        .nav-links a:hover, .nav-links a.active {
            color: var(--text-light);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .login-btn {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-light);
            transition: color 0.3s;
        }
        
        .login-btn:hover {
            color: var(--text-muted);
        }

        .signup-btn {
            background-color: var(--bg-white);
            color: var(--primary-dark);
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: transform 0.2s, background-color 0.2s;
        }

        .signup-btn:hover {
            transform: translateY(-2px);
            background-color: #f1f5f9;
        }

        /* Hero Section */
        .hero {
            background-color: var(--primary-dark);
            color: var(--text-light);
            padding: 80px 0 120px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -20%;
            right: -5%;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(37,99,235,0.15) 0%, rgba(15,23,42,0) 60%);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            position: relative;
            z-index: 1;
        }

        .hero-content {
            flex: 1;
            max-width: 600px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: rgba(255,255,255,0.1);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 24px;
            border: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: 24px;
            letter-spacing: -0.02em;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            color: var(--text-muted);
            margin-bottom: 40px;
            line-height: 1.7;
            max-width: 90%;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            margin-bottom: 60px;
        }

        .btn-primary {
            background-color: var(--bg-white);
            color: var(--primary-dark);
            padding: 14px 28px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255,255,255,0.15);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--text-light);
            padding: 14px 28px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1rem;
            border: 1px solid rgba(255,255,255,0.3);
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-outline:hover {
            background-color: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.5);
        }

        .hero-stats {
            display: flex;
            gap: 48px;
        }

        .stat-item h4 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 4px;
            color: var(--text-light);
        }

        .stat-item p {
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .hero-image {
            flex: 1;
            display: flex;
            justify-content: flex-end;
        }

        .circle-bg {
            width: 480px;
            height: 480px;
            background-color: var(--bg-white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 80px rgba(255,255,255,0.1);
            overflow: hidden;
            border: 10px solid rgba(255,255,255,0.05);
        }

        .circle-bg img {
            width: 80%;
            height: auto;
            object-fit: contain;
        }

        /* Features Section */
        .features {
            padding: 100px 0;
            text-align: center;
            background-color: var(--bg-main);
        }

        .section-title {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--primary-dark);
            letter-spacing: -0.01em;
        }

        .section-subtitle {
            color: #475569;
            max-width: 600px;
            margin: 0 auto 64px;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .feature-card {
            background-color: var(--bg-white);
            padding: 40px 24px;
            border-radius: 20px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -1px rgba(0,0,0,0.03);
            transition: all 0.3s;
            border: 1px solid rgba(226, 232, 240, 0.6);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
            border-color: var(--border-color);
        }

        .feature-icon {
            width: 56px;
            height: 56px;
            background-color: #f1f5f9;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            color: var(--primary-dark);
        }

        .feature-card h3 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 12px;
            color: var(--primary-dark);
        }

        .feature-card p {
            font-size: 0.9rem;
            color: #64748b;
            line-height: 1.6;
        }

        /* Courses Section */
        .courses {
            padding: 100px 0;
            background-color: var(--bg-white);
        }

        .courses-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 48px;
        }
        
        .courses-header .section-title {
            margin-bottom: 12px;
            text-align: left;
        }
        
        .courses-header .section-subtitle {
            margin: 0;
            text-align: left;
        }

        .btn-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary-dark);
            font-weight: 600;
            font-size: 0.95rem;
            transition: color 0.2s;
        }
        
        .btn-link:hover {
            color: var(--accent-blue);
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
        }

        .course-card {
            background-color: var(--bg-white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -1px rgba(0,0,0,0.03);
            transition: all 0.3s;
            border: 1px solid rgba(226, 232, 240, 0.6);
            display: flex;
            flex-direction: column;
        }

        .course-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
        }

        .course-image-wrapper {
            position: relative;
            height: 220px;
            width: 100%;
        }

        .course-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .course-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            background-color: rgba(255,255,255,0.9);
            color: var(--accent-blue);
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            backdrop-filter: blur(4px);
        }

        .course-content {
            padding: 24px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .course-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--primary-dark);
            line-height: 1.4;
        }

        .course-author {
            font-size: 0.9rem;
            color: #64748b;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .course-rating {
            display: flex;
            align-items: center;
            gap: 4px;
            color: #fbbf24;
            font-size: 0.9rem;
            margin-bottom: 24px;
        }

        .course-rating .rating-count {
            color: #64748b;
            margin-left: 8px;
            font-size: 0.85rem;
        }

        .course-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
            margin-top: auto;
        }

        .course-price {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .btn-small {
            background-color: #f1f5f9;
            color: var(--primary-dark);
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }

        .btn-small:hover {
            background-color: #e2e8f0;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 100px 0;
            background-color: var(--primary-dark);
            color: var(--text-light);
            text-align: center;
        }

        .testimonials .section-title {
            color: var(--text-light);
        }

        .testimonials .section-subtitle {
            color: var(--text-muted);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
        }

        .testimonial-card {
            background-color: var(--primary-light);
            padding: 32px;
            border-radius: 20px;
            text-align: left;
            border: 1px solid rgba(255,255,255,0.05);
            transition: transform 0.3s;
        }
        
        .testimonial-card:hover {
            transform: translateY(-5px);
        }

        .testimonial-user {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .testimonial-user img {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255,255,255,0.1);
        }

        .user-info h4 {
            font-size: 1.05rem;
            font-weight: 600;
            color: var(--text-light);
            margin-bottom: 2px;
        }

        .user-info p {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .testimonial-text {
            font-size: 1rem;
            line-height: 1.7;
            color: rgba(248, 250, 252, 0.9);
            font-style: italic;
        }

        /* Instructors Section */
        .instructors {
            padding: 100px 0;
            background-color: var(--bg-main);
            text-align: center;
        }

        .instructors-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
        }

        .instructor-card {
            background-color: var(--bg-white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            transition: all 0.3s;
            border: 1px solid rgba(226, 232, 240, 0.6);
        }
        
        .instructor-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);
        }

        .instructor-image-wrapper {
            width: 100%;
            height: 320px;
            overflow: hidden;
            background-color: #f1f5f9;
        }

        .instructor-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(100%) contrast(1.1);
            transition: all 0.5s ease;
        }

        .instructor-card:hover .instructor-image-wrapper img {
            filter: grayscale(0%) contrast(1);
            transform: scale(1.05);
        }

        .instructor-info {
            padding: 28px 24px;
        }

        .instructor-info h4 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 6px;
            color: var(--primary-dark);
        }

        .instructor-info p {
            font-size: 0.95rem;
            color: #64748b;
            margin-bottom: 20px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 16px;
        }
        
        .social-links a {
            color: #94a3b8;
            transition: color 0.2s, transform 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #f8fafc;
        }
        
        .social-links a:hover {
            color: var(--primary-dark);
            background-color: #e2e8f0;
            transform: translateY(-2px);
        }

        /* CTA Section */
        .cta {
            padding: 60px 0 100px;
            background-color: var(--bg-main);
        }

        .cta-box {
            background-color: var(--primary-dark);
            border-radius: 32px;
            padding: 80px 40px;
            text-align: center;
            color: var(--text-light);
            position: relative;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);
        }
        
        .cta-box::before, .cta-box::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 70%);
        }
        
        .cta-box::before {
            top: -100px;
            left: -100px;
        }
        
        .cta-box::after {
            bottom: -100px;
            right: -100px;
        }

        .cta-box h2 {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
            letter-spacing: -0.02em;
        }

        .cta-box p {
            color: var(--text-muted);
            margin-bottom: 48px;
            font-size: 1.1rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 1;
        }

        .cta-actions {
            display: flex;
            justify-content: center;
            gap: 16px;
            position: relative;
            z-index: 1;
        }

        /* Footer */
        .footer {
            background-color: var(--primary-dark);
            color: var(--text-muted);
            padding: 80px 0 32px;
            border-top: 1px solid rgba(255,255,255,0.05);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 48px;
            margin-bottom: 64px;
        }

        .footer-brand {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .footer-logo {
            color: var(--text-light);
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-brand p {
            font-size: 0.9rem;
            line-height: 1.6;
            max-width: 300px;
        }
        
        .footer-socials {
            display: flex;
            gap: 16px;
        }
        
        .footer-socials a {
            color: var(--text-muted);
            transition: color 0.2s;
        }
        
        .footer-socials a:hover {
            color: var(--text-light);
        }

        .footer-col h4 {
            color: var(--text-light);
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 24px;
        }

        .footer-col ul {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .footer-col a {
            font-size: 0.95rem;
            transition: color 0.3s;
        }

        .footer-col a:hover {
            color: var(--text-light);
        }

        .newsletter-form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        
        .newsletter-form p {
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .newsletter-input-group {
            display: flex;
            gap: 8px;
        }

        .newsletter-input-group input {
            flex: 1;
            padding: 12px 16px;
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.1);
            background-color: rgba(255,255,255,0.03);
            color: var(--text-light);
            outline: none;
            font-family: inherit;
            transition: border-color 0.2s;
        }
        
        .newsletter-input-group input:focus {
            border-color: rgba(255,255,255,0.3);
        }

        .newsletter-input-group button {
            padding: 12px 24px;
            border-radius: 8px;
            background-color: var(--bg-white);
            color: var(--primary-dark);
            border: none;
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
            transition: background-color 0.2s;
        }
        
        .newsletter-input-group button:hover {
            background-color: #f1f5f9;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 32px;
            border-top: 1px solid rgba(255,255,255,0.05);
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .features-grid, .courses-grid, .testimonials-grid, .instructors-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .hero-title {
                font-size: 3rem;
            }
            .circle-bg {
                width: 400px;
                height: 400px;
            }
            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .hero .container {
                flex-direction: column;
                text-align: center;
            }
            .hero-content {
                max-width: 100%;
            }
            .hero-subtitle {
                margin: 0 auto 32px;
            }
            .hero-buttons {
                justify-content: center;
            }
            .hero-stats {
                justify-content: center;
            }
            .hero-image {
                margin-top: 40px;
                justify-content: center;
            }
            .circle-bg {
                width: 320px;
                height: 320px;
            }
            .nav-links {
                display: none;
            }
            .features-grid, .courses-grid, .testimonials-grid, .instructors-grid, .footer-grid {
                grid-template-columns: 1fr;
            }
            .cta-actions {
                flex-direction: column;
            }
            .cta-actions .btn-primary, .cta-actions .btn-outline {
                width: 100%;
            }
            .courses-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="#" class="nav-brand">
                <i data-lucide="graduation-cap"></i>
                Pixel Community
            </a>
            
            <ul class="nav-links">
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="#">Testimonial</a></li>
                <li><a href="#">Team</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            
            <div class="nav-actions">
                @auth
                    <a href="{{ url('/dashboard') }}" class="signup-btn">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="login-btn">Login</a>
                    <a href="{{ route('register') }}" class="signup-btn">Sign Up</a>
                @endauth
            </div>
        </div>
    </nav>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <div class="badge">
                        <i data-lucide="sparkles" size="16"></i>
                        #1 Online Learning Platform
                    </div>
                    <h1 class="hero-title">Belajar Tanpa Batas, Raih Masa Depan Lebih Cerah.</h1>
                    <p class="hero-subtitle">Dapatkan akses ke materi terbaik dan mentor industri profesional. Mulai perjalanan karirmu bersama Pixel Community sekarang juga.</p>
                    
                    <div class="hero-buttons">
                        <a href="#" class="btn-primary">Mulai Belajar</a>
                        <a href="#" class="btn-outline">Lihat Kelas</a>
                    </div>
                    
                    <div class="hero-stats">
                        <div class="stat-item">
                            <h4>20k+</h4>
                            <p>Students</p>
                        </div>
                        <div class="stat-item">
                            <h4>500+</h4>
                            <p>Courses</p>
                        </div>
                        <div class="stat-item">
                            <h4>150+</h4>
                            <p>Mentors</p>
                        </div>
                        <div class="stat-item">
                            <h4>95%</h4>
                            <p>Success Rate</p>
                        </div>
                    </div>
                </div>
                
                <div class="hero-image">
                    <div class="circle-bg">
                        <img src="/images/pixel_logo_1790558562239.jpg" alt="Pixel Community">
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features">
            <div class="container">
                <h2 class="section-title">Mengapa Memilih Pixel Community?</h2>
                <p class="section-subtitle">Kami menyediakan ekosistem pembelajaran digital yang dirancang untuk mempercepat pertumbuhan profesional Anda dengan fitur-fitur unggulan.</p>
                
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i data-lucide="book-open"></i>
                        </div>
                        <h3>Materi Lengkap</h3>
                        <p>Kurikulum yang disusun sesuai standar industri terbaru, dari pemula hingga mahir.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i data-lucide="monitor-play"></i>
                        </div>
                        <h3>Video Interaktif</h3>
                        <p>Belajar lebih seru dengan video berkualitas HD yang bisa diakses kapan saja.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i data-lucide="award"></i>
                        </div>
                        <h3>Sertifikat Resmi</h3>
                        <p>Dapatkan sertifikat resmi yang diakui industri setelah menyelesaikan kelas.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i data-lucide="users"></i>
                        </div>
                        <h3>Mentor Profesional</h3>
                        <p>Dibimbing langsung oleh para profesional berpengalaman di bidangnya.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular Courses Section -->
        <section class="courses">
            <div class="container">
                <div class="courses-header">
                    <div>
                        <h2 class="section-title">Kelas Terpopuler</h2>
                        <p class="section-subtitle">Pilih dari ribuan kelas yang paling diminati untuk bangun skill baru.</p>
                    </div>
                    <a href="#" class="btn-link">Lihat semua kelas <i data-lucide="arrow-right" size="18"></i></a>
                </div>
                
                <div class="courses-grid">
                    <!-- Course 1 -->
                    <div class="course-card">
                        <div class="course-image-wrapper">
                            <span class="course-badge">Programming</span>
                            <img src="/images/course_react_1790558572624.jpg" alt="Mastering React 18 & Next.js" class="course-image">
                        </div>
                        <div class="course-content">
                            <h3 class="course-title">Mastering React 18 & Next.js</h3>
                            <div class="course-author">
                                <i data-lucide="user" size="16"></i> Oleh Alex Johnson â€¢ Senior Developer
                            </div>
                            <div class="course-rating">
                                <i data-lucide="star" fill="#fbbf24"></i>
                                <i data-lucide="star" fill="#fbbf24"></i>
                                <i data-lucide="star" fill="#fbbf24"></i>
                                <i data-lucide="star" fill="#fbbf24"></i>
                                <i data-lucide="star-half" fill="#fbbf24"></i>
                                <span class="rating-count">(1,204)</span>
                            </div>
                            <div class="course-footer">
                                <div class="course-price">Rp 499.000</div>
                                <button class="btn-small">Lihat Detail</button>
                            </div>
                        </div>
                    </div>

                    <!-- Course 2 -->
                    <div class="course-card">
                        <div class="course-image-wrapper">
                            <span class="course-badge">Design</span>
                            <img src="/images/course_uiux_1790558583074.jpg" alt="UI/UX Design for SaaS" class="course-image">
                        </div>
                        <div class="course-content">
                            <h3 class="course-title">UI/UX Design for SaaS</h3>
                            <div class="course-author">
                                <i data-lucide="user" size="16"></i> Oleh Sarah Chen â€¢ Lead Designer
                            </div>
                            <div class="course-rating">
                                <i data-lucide="star" fill="#fbbf24"></i>
                                <i data-lucide="star" fill="#fbbf24"></i>
                                <i data-lucide="star" fill="#fbbf24"></i>
                                <i data-lucide="star" fill="#fbbf24"></i>
                                <i data-lucide="star" fill="#fbbf24"></i>
                                <span class="rating-count">(845)</span>
                            </div>
                            <div class="course-footer">
                                <div class="course-price">Rp 399.000</div>
                                <button class="btn-small">Lihat Detail</button>
                            </div>
                        </div>
                    </div>

                    <!-- Course 3 -->
                    <div class="course-card">
                        <div class="course-image-wrapper">
                            <span class="course-badge">Marketing</span>
                            <img src="/images/course_marketing_1790558594033.jpg" alt="Digital Marketing Strategy 2024" class="course-image">
                        </div>
                        <div class="course-content">
                            <h3 class="course-title">Digital Marketing Strategy 2024</h3>
                            <div class="course-author">
                                <i data-lucide="user" size="16"></i> Oleh Mike Taylor â€¢ Marketing Director
                            </div>
                            <div class="course-rating">
                                <i data-lucide="star" fill="#fbbf24"></i>
                                <i data-lucide="star" fill="#fbbf24"></i>
                                <i data-lucide="star" fill="#fbbf24"></i>
                                <i data-lucide="star" fill="#fbbf24"></i>
                                <i data-lucide="star" color="#cbd5e1"></i>
                                <span class="rating-count">(2,140)</span>
                            </div>
                            <div class="course-footer">
                                <div class="course-price">Rp 450.000</div>
                                <button class="btn-small">Lihat Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials">
            <div class="container">
                <h2 class="section-title">Apa Kata Mereka?</h2>
                <p class="section-subtitle">Cerita dari ratusan ribu siswa lainnya yang telah merubah hidup mereka melalui Pixel Community.</p>
                
                <div class="testimonials-grid">
                    <div class="testimonial-card">
                        <div class="testimonial-user">
                            <img src="https://ui-avatars.com/api/?name=Zack+Wijaya&background=random&size=100" alt="Zack Wijaya">
                            <div class="user-info">
                                <h4>Zack Wijaya</h4>
                                <p>Front-End Developer</p>
                            </div>
                        </div>
                        <p class="testimonial-text">"Belajar di Pixel Community sangat membuka wawasan. Materinya update banget sesuai tren industri. Mentornya juga gampang diajak diskusi dan solutif banget!"</p>
                    </div>
                    
                    <div class="testimonial-card">
                        <div class="testimonial-user">
                            <img src="https://ui-avatars.com/api/?name=Nadia+Santoso&background=random&size=100" alt="Nadia Santoso">
                            <div class="user-info">
                                <h4>Nadia Santoso</h4>
                                <p>UI/UX Designer, Tech Co.</p>
                            </div>
                        </div>
                        <p class="testimonial-text">"Materi UI/UX-nya sangat detail dan jelas. Saya berhasil mendapatkan pekerjaan impian saya sebagai Product Designer berkat portfolio yang dibangun di sini."</p>
                    </div>
                    
                    <div class="testimonial-card">
                        <div class="testimonial-user">
                            <img src="https://ui-avatars.com/api/?name=Bima+Andika&background=random&size=100" alt="Bima Andika">
                            <div class="user-info">
                                <h4>Bima Andika</h4>
                                <p>Digital Marketer</p>
                            </div>
                        </div>
                        <p class="testimonial-text">"Pixel Community memberikan materi praktikal bukan hanya teori. Langsung bisa dipraktekkan di pekerjaan saya sehari-hari. Recommended banget!"</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Instructors Section -->
        <section class="instructors">
            <div class="container">
                <h2 class="section-title">Meet Your Instructors</h2>
                <p class="section-subtitle">Belajar langsung dari para ahli yang telah berpengalaman di bidangnya.</p>
                
                <div class="instructors-grid">
                    <!-- Instructor 1 -->
                    <div class="instructor-card">
                        <div class="instructor-image-wrapper">
                            <img src="/images/instructor_robert_1790558605600.jpg" alt="Dr. Robert Vance">
                        </div>
                        <div class="instructor-info">
                            <h4>Dr. Robert Vance</h4>
                            <p>Full-Stack Developer</p>
                            <div class="social-links">
                                <a href="#"><i data-lucide="twitter" size="18"></i></a>
                                <a href="#"><i data-lucide="linkedin" size="18"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Instructor 2 -->
                    <div class="instructor-card">
                        <div class="instructor-image-wrapper">
                            <img src="/images/instructor_elena_1790558619835.jpg" alt="Elena Rodriguez">
                        </div>
                        <div class="instructor-info">
                            <h4>Elena Rodriguez</h4>
                            <p>Lead UI/UX Designer</p>
                            <div class="social-links">
                                <a href="#"><i data-lucide="twitter" size="18"></i></a>
                                <a href="#"><i data-lucide="dribbble" size="18"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Instructor 3 -->
                    <div class="instructor-card">
                        <div class="instructor-image-wrapper">
                            <!-- Using robert as placeholder for the third one due to rate limit -->
                            <img src="/images/instructor_robert_1790558605600.jpg" alt="Jameson Wright">
                        </div>
                        <div class="instructor-info">
                            <h4>Jameson Wright</h4>
                            <p>Marketing Specialist</p>
                            <div class="social-links">
                                <a href="#"><i data-lucide="twitter" size="18"></i></a>
                                <a href="#"><i data-lucide="linkedin" size="18"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta">
            <div class="container">
                <div class="cta-box">
                    <h2>Mulai Perjalanan Belajarmu Hari Ini</h2>
                    <p>Jangan tunda lagi masa depanmu. Daftar sekarang dan dapatkan diskon 30% untuk pendaftaran pertama bulan ini.</p>
                    <div class="cta-actions">
                        <a href="{{ route('register') }}" class="btn-primary">Buat Akun Gratis</a>
                        <a href="#" class="btn-outline">Lihat Katalog</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="footer-logo">
                        <i data-lucide="graduation-cap"></i>
                        Pixel Community
                    </div>
                    <p>&copy; 2024 Pixel Community. Menyediakan ekosistem pembelajaran digital terbaik di Indonesia.</p>
                    <div class="footer-socials">
                        <a href="#"><i data-lucide="facebook" size="20"></i></a>
                        <a href="#"><i data-lucide="twitter" size="20"></i></a>
                        <a href="#"><i data-lucide="instagram" size="20"></i></a>
                        <a href="#"><i data-lucide="linkedin" size="20"></i></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Newsletter</h4>
                    <div class="newsletter-form">
                        <p>Subscribe untuk mendapatkan tips karir dan promo menarik.</p>
                        <div class="newsletter-input-group">
                            <input type="email" placeholder="Email address...">
                            <button>Join</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>Designed with â¤ï¸ for your success journey.</p>
            </div>
        </div>
    </footer>

    <!-- Initialize Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>

