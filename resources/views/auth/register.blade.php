<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Daftar Akun - Komunitas Pixel</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            --primary-dark: #0f172a;
            --primary-navy: #090d16;
            --primary-slate: #1e293b;
            --accent-blue: #2563eb;
            --accent-blue-hover: #1d4ed8;
            --accent-cyan: #06b6d4;
            --text-light: #ffffff;
            --text-slate: #cbd5e1;
            --text-muted: #94a3b8;
            --border-glass: rgba(255, 255, 255, 0.12);
            --danger: #ef4444;
            --danger-bg: rgba(239, 68, 68, 0.15);
            --success: #10b981;
            --success-bg: rgba(16, 185, 129, 0.15);
            --font-main: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-main);
            background: linear-gradient(135deg, #090d16 0%, #0f172a 50%, #1e293b 100%);
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
            position: relative;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Ambient Glowing Background Orbs */
        .ambient-orb {
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }

        .ambient-orb-1 {
            width: 480px;
            height: 480px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.3) 0%, rgba(37, 99, 235, 0) 70%);
            top: -100px;
            left: 50%;
            transform: translateX(-50%) translateX(-240px);
        }

        .ambient-orb-2 {
            width: 520px;
            height: 520px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.22) 0%, rgba(6, 182, 212, 0) 70%);
            bottom: -120px;
            left: 50%;
            transform: translateX(-50%) translateX(240px);
        }

        /* Auth Container & Card */
        .auth-wrapper {
            width: 100%;
            max-width: 460px;
            position: relative;
            z-index: 10;
            margin: auto;
        }

        .auth-card {
            background: rgba(15, 23, 42, 0.85);
            border: 1px solid var(--border-glass);
            border-radius: 20px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6), 0 0 0 1px rgba(255, 255, 255, 0.05);
            padding: 34px 30px;
            position: relative;
            box-sizing: border-box;
        }

        @media (max-width: 480px) {
            .auth-card {
                padding: 26px 20px;
                border-radius: 16px;
            }
        }

        /* Brand Logo */
        .brand-header {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .brand-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: transform 0.2s ease;
        }

        .brand-link:hover {
            transform: scale(1.02);
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            box-shadow: 0 6px 14px -3px rgba(37, 99, 235, 0.45);
        }

        .brand-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.02em;
        }

        /* Card Header */
        .card-heading {
            text-align: center;
            margin-bottom: 22px;
        }

        .card-heading h1 {
            font-size: 1.45rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.025em;
            margin-bottom: 6px;
        }

        .card-heading p {
            font-size: 0.85rem;
            color: var(--text-muted);
            line-height: 1.45;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            font-size: 0.825rem;
            font-weight: 600;
            color: var(--text-slate);
            margin-bottom: 6px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .form-input {
            width: 100%;
            height: 44px;
            padding: 8px 14px 8px 42px;
            font-size: 0.875rem;
            font-family: inherit;
            color: #ffffff;
            background-color: rgba(30, 41, 59, 0.6);
            border: 1.5px solid var(--border-glass);
            border-radius: 10px;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-input.has-toggle {
            padding-right: 42px;
        }

        .form-input::placeholder {
            color: #64748b;
        }

        .form-input:focus {
            border-color: #3b82f6;
            background-color: rgba(30, 41, 59, 0.9);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
        }

        .input-wrapper:focus-within .input-icon {
            color: #60a5fa;
        }

        .form-input.is-invalid {
            border-color: var(--danger);
            background-color: rgba(239, 68, 68, 0.1);
        }

        .form-input.is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.25);
        }

        .password-toggle-btn {
            position: absolute;
            right: 10px;
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 6px;
            border-radius: 6px;
            transition: color 0.2s ease;
        }

        .password-toggle-btn:hover {
            color: #ffffff;
        }

        .error-message {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.775rem;
            color: #f87171;
            margin-top: 5px;
            font-weight: 500;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: #ffffff;
            font-family: inherit;
            font-size: 0.925rem;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 6px 18px -3px rgba(37, 99, 235, 0.5);
            transition: all 0.2s ease;
            margin-top: 6px;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
            transform: translateY(-1px);
            box-shadow: 0 8px 24px -3px rgba(37, 99, 235, 0.65);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* Footer & Links */
        .form-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .login-link {
            font-weight: 700;
            color: #60a5fa;
            transition: color 0.2s ease;
        }

        .login-link:hover {
            color: #93c5fd;
            text-decoration: underline;
        }

        /* Trust / Security badge */
        .trust-badge {
            margin-top: 18px;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* Back to Home Link */
        .back-home-wrapper {
            text-align: center;
            margin-top: 18px;
        }

        .back-home-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--text-slate);
            padding: 8px 18px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 9999px;
            backdrop-filter: blur(8px);
            transition: all 0.2s ease;
        }

        .back-home-link:hover {
            background: rgba(255, 255, 255, 0.14);
            color: #ffffff;
            transform: translateX(-3px);
        }
    </style>
</head>
<body>

    <!-- Ambient Glow Orbs -->
    <div class="ambient-orb ambient-orb-1"></div>
    <div class="ambient-orb ambient-orb-2"></div>

    <div class="auth-wrapper">
        <!-- Auth Card / Box -->
        <div class="auth-card">
            
            <!-- Brand Logo Header -->
            <div class="brand-header">
                <a href="{{ url('/') }}" class="brand-link" title="Kembali ke Beranda">
                    <div class="brand-icon">
                        <i data-lucide="graduation-cap" style="width: 22px; height: 22px;"></i>
                    </div>
                    <span class="brand-title">Komunitas Pixel</span>
                </a>
            </div>

            <!-- Card Heading -->
            <div class="card-heading">
                <h1>Mulai Belajar Sekarang 🚀</h1>
                <p>Daftar akun gratis dan bangun masa depan karier digitalmu.</p>
            </div>

            <!-- Form Register -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <div class="input-wrapper">
                        <span class="input-icon">
                            <i data-lucide="user" style="width: 18px; height: 18px;"></i>
                        </span>
                        <input 
                            id="name" 
                            class="form-input {{ $errors->has('name') ? 'is-invalid' : '' }}" 
                            type="text" 
                            name="name" 
                            value="{{ old('name') }}" 
                            placeholder="Nama lengkap Anda" 
                            required 
                            autofocus 
                            autocomplete="name"
                        >
                    </div>
                    @if ($errors->has('name'))
                        <div class="error-message">
                            <i data-lucide="alert-circle" style="width: 14px; height: 14px;"></i>
                            <span>{{ $errors->first('name') }}</span>
                        </div>
                    @endif
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Alamat Email</label>
                    <div class="input-wrapper">
                        <span class="input-icon">
                            <i data-lucide="mail" style="width: 18px; height: 18px;"></i>
                        </span>
                        <input 
                            id="email" 
                            class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            placeholder="nama@email.com" 
                            required 
                            autocomplete="username"
                        >
                    </div>
                    @if ($errors->has('email'))
                        <div class="error-message">
                            <i data-lucide="alert-circle" style="width: 14px; height: 14px;"></i>
                            <span>{{ $errors->first('email') }}</span>
                        </div>
                    @endif
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="input-wrapper">
                        <span class="input-icon">
                            <i data-lucide="lock" style="width: 18px; height: 18px;"></i>
                        </span>
                        <input 
                            id="password" 
                            class="form-input has-toggle {{ $errors->has('password') ? 'is-invalid' : '' }}" 
                            type="password" 
                            name="password" 
                            placeholder="Minimal 8 karakter" 
                            required 
                            autocomplete="new-password"
                        >
                        <button 
                            type="button" 
                            class="password-toggle-btn" 
                            onclick="togglePasswordVisibility('password', 'password-toggle-icon')"
                            title="Lihat / sembunyikan kata sandi"
                        >
                            <i id="password-toggle-icon" data-lucide="eye" style="width: 17px; height: 17px;"></i>
                        </button>
                    </div>
                    @if ($errors->has('password'))
                        <div class="error-message">
                            <i data-lucide="alert-circle" style="width: 14px; height: 14px;"></i>
                            <span>{{ $errors->first('password') }}</span>
                        </div>
                    @endif
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                    <div class="input-wrapper">
                        <span class="input-icon">
                            <i data-lucide="shield-check" style="width: 18px; height: 18px;"></i>
                        </span>
                        <input 
                            id="password_confirmation" 
                            class="form-input has-toggle {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" 
                            type="password" 
                            name="password_confirmation" 
                            placeholder="Ulangi kata sandi Anda" 
                            required 
                            autocomplete="new-password"
                        >
                        <button 
                            type="button" 
                            class="password-toggle-btn" 
                            onclick="togglePasswordVisibility('password_confirmation', 'confirm-toggle-icon')"
                            title="Lihat / sembunyikan kata sandi"
                        >
                            <i id="confirm-toggle-icon" data-lucide="eye" style="width: 17px; height: 17px;"></i>
                        </button>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <div class="error-message">
                            <i data-lucide="alert-circle" style="width: 14px; height: 14px;"></i>
                            <span>{{ $errors->first('password_confirmation') }}</span>
                        </div>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">
                    <span>Daftar Sekarang</span>
                    <i data-lucide="arrow-right" style="width: 17px; height: 17px;"></i>
                </button>
            </form>

            <!-- Footer / Login Link -->
            <div class="form-footer">
                Sudah memiliki akun? 
                <a href="{{ route('login') }}" class="login-link">Masuk ke Akun</a>
            </div>

            <!-- Security Trust Note -->
            <div class="trust-badge">
                <i data-lucide="shield-check" style="width: 14px; height: 14px; color: #60a5fa;"></i>
                <span>Dilindungi keamanan enkripsi standar industri</span>
            </div>

        </div>

        <!-- Back to Home Link -->
        <div class="back-home-wrapper">
            <a href="{{ url('/') }}" class="back-home-link">
                <i data-lucide="arrow-left" style="width: 16px; height: 16px;"></i>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </div>

    <!-- Script: Lucide Icons & Interactions -->
    <script>
        lucide.createIcons();

        function togglePasswordVisibility(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (!input || !icon) return;

            if (input.type === 'password') {
                input.type = 'text';
                icon.setAttribute('data-lucide', 'eye-off');
            } else {
                input.type = 'password';
                icon.setAttribute('data-lucide', 'eye');
            }
            lucide.createIcons();
        }
    </script>
</body>
</html>
