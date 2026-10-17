<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Saya - Pixel Community</title>
    
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
            --blue-soft: #bfdbfe;
            --green: #10b981;
            --green-light: #ecfdf5;
            --green-text: #059669;
            --orange: #ea580c;
            --orange-light: #fff7ed;
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

        /* ── Header ── */
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

        /* ── Page Content ── */
        .content {
            padding: 40px 48px 60px;
            max-width: 1400px;
            width: 100%;
        }

        .page-header-wrap {
            margin-bottom: 28px;
        }

        .page-title {
            font-size: 2.25rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .page-subtitle {
            font-size: 0.95rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* ── Filter Pills Bar ── */
        .filter-pills-row {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 36px;
            flex-wrap: wrap;
        }

        .filter-pill {
            padding: 8px 20px;
            border-radius: 999px;
            font-family: var(--font-main);
            font-size: 0.875rem;
            font-weight: 600;
            border: 1px solid var(--border-color);
            background-color: var(--bg-white);
            color: var(--text-dark);
            cursor: pointer;
            transition: all 0.2s ease;
            user-select: none;
        }

        .filter-pill:hover:not(.active) {
            background-color: #f1f5f9;
            border-color: #cbd5e1;
        }

        .filter-pill.active {
            background-color: var(--text-dark);
            color: #ffffff;
            border-color: var(--text-dark);
            box-shadow: 0 4px 10px rgba(15, 23, 42, 0.15);
        }

        /* ── Quizzes Grid ── */
        .quizzes-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        /* ── Quiz Card ── */
        .quiz-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 28px;
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.04), 0 4px 6px -2px rgba(15, 23, 42, 0.01);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 310px;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            position: relative;
        }

        .quiz-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 35px -8px rgba(15, 23, 42, 0.09);
        }

        /* Card Top */
        .quiz-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        /* Status Badges */
        .quiz-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 999px;
        }

        .quiz-badge.upcoming {
            background-color: #f1f5f9;
            color: #475569;
            border: 1px solid #e2e8f0;
        }

        .quiz-badge.completed {
            background-color: #ecfdf5;
            color: #059669;
            border: 1px solid #d1fae5;
        }

        .quiz-badge.in-progress {
            background-color: #ffedd5;
            color: #c2410c;
            border: 1px solid #fed7aa;
        }

        .quiz-card-menu-btn {
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px;
            border-radius: 6px;
            transition: all 0.15s ease;
        }

        .quiz-card-menu-btn:hover {
            color: var(--text-dark);
            background-color: #f1f5f9;
        }

        .quiz-score-badge {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-dark);
            letter-spacing: -0.02em;
        }

        /* Card Info */
        .quiz-card-title {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--text-dark);
            letter-spacing: -0.02em;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .quiz-card-desc {
            font-size: 0.875rem;
            color: var(--text-muted);
            line-height: 1.5;
            margin-bottom: 24px;
            font-weight: 450;
        }

        /* Meta Items */
        .quiz-meta-row {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

        .quiz-meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-muted);
        }

        .quiz-meta-item i {
            color: #94a3b8;
        }

        .quiz-extra-info {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.78rem;
            font-weight: 600;
            color: #64748b;
            margin-bottom: 22px;
        }

        .quiz-extra-info i {
            color: #94a3b8;
        }

        /* Progress Bar (for In-Progress) */
        .quiz-progress-wrap {
            margin-bottom: 22px;
        }

        .quiz-progress-labels {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 8px;
        }

        .quiz-progress-track {
            height: 6px;
            background-color: #f1f5f9;
            border-radius: 999px;
            overflow: hidden;
        }

        .quiz-progress-fill {
            height: 100%;
            background-color: var(--text-dark);
            border-radius: 999px;
            transition: width 0.4s ease;
        }

        /* Buttons */
        .quiz-btn {
            width: 100%;
            padding: 12px 20px;
            border-radius: 12px;
            font-family: var(--font-main);
            font-size: 0.9rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
            text-align: center;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .quiz-btn-dark {
            background-color: #0f172a;
            color: #ffffff;
            border: 1px solid #0f172a;
        }

        .quiz-btn-dark:hover {
            background-color: #1e293b;
            border-color: #1e293b;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);
        }

        .quiz-btn-outline {
            background-color: transparent;
            color: var(--text-dark);
            border: 1.5px solid var(--border-color);
        }

        .quiz-btn-outline:hover {
            background-color: #f8fafc;
            border-color: #cbd5e1;
        }

        .quiz-btn-accent {
            background-color: #a8c7ea;
            color: #0f172a;
            border: 1px solid #9bbde3;
        }

        .quiz-btn-accent:hover {
            background-color: #93b9e4;
            color: #0f172a;
            transform: translateY(-1px);
        }

        /* ── Interactive Quiz Modal ── */
        .quiz-modal-backdrop {
            position: fixed;
            inset: 0;
            background-color: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(4px);
            z-index: 100;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 24px;
            animation: modalFadeIn 0.2s ease;
        }

        .quiz-modal-backdrop.show {
            display: flex;
        }

        @keyframes modalFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .quiz-modal-box {
            background: #ffffff;
            border-radius: 24px;
            width: 100%;
            max-width: 680px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);
            display: flex;
            flex-direction: column;
            animation: modalSlideUp 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes modalSlideUp {
            from { transform: translateY(16px) scale(0.98); }
            to { transform: translateY(0) scale(1); }
        }

        .quiz-modal-header {
            padding: 24px 28px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .quiz-modal-header h3 {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--text-dark);
        }

        .quiz-modal-timer {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: #fef2f2;
            color: #ef4444;
            font-weight: 700;
            font-size: 0.85rem;
            padding: 4px 12px;
            border-radius: 999px;
            border: 1px solid #fee2e2;
        }

        .quiz-modal-close {
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            padding: 4px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.15s ease;
        }

        .quiz-modal-close:hover {
            color: var(--text-dark);
            background-color: #f1f5f9;
        }

        .quiz-modal-body {
            padding: 28px;
        }

        .quiz-step-indicator {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--blue);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 8px;
            display: block;
        }

        .quiz-question-text {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.45;
            margin-bottom: 24px;
        }

        .quiz-options-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 28px;
        }

        .quiz-option-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            border-radius: 14px;
            border: 1.5px solid var(--border-color);
            background-color: #ffffff;
            cursor: pointer;
            transition: all 0.2s ease;
            user-select: none;
        }

        .quiz-option-item:hover {
            border-color: #cbd5e1;
            background-color: #f8fafc;
        }

        .quiz-option-item.selected {
            border-color: var(--blue);
            background-color: #eff6ff;
        }

        .option-bullet {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            border: 2px solid #cbd5e1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.2s ease;
        }

        .quiz-option-item.selected .option-bullet {
            border-color: var(--blue);
            background-color: var(--blue);
        }

        .option-bullet-dot {
            width: 8px;
            height: 8px;
            background-color: #ffffff;
            border-radius: 50%;
            display: none;
        }

        .quiz-option-item.selected .option-bullet-dot {
            display: block;
        }

        .option-label-text {
            font-size: 0.925rem;
            font-weight: 600;
            color: #334155;
            flex: 1;
        }

        .quiz-option-item.selected .option-label-text {
            color: #1e3a8a;
        }

        .quiz-modal-footer {
            padding: 18px 28px 24px;
            border-top: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Result View inside Modal */
        .quiz-result-view {
            text-align: center;
            padding: 24px 0 12px;
            display: none;
        }

        .quiz-result-view.show {
            display: block;
        }

        .result-badge-circle {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            color: var(--green-text);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 20px;
            border: 3px solid #a7f3d0;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.2);
        }

        .result-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .result-desc {
            font-size: 0.9rem;
            color: var(--text-muted);
            max-width: 420px;
            margin: 0 auto 24px;
        }

        .result-stats-row {
            display: flex;
            justify-content: center;
            gap: 24px;
            margin-bottom: 28px;
        }

        .result-stat-card {
            background-color: #f8fafc;
            padding: 14px 22px;
            border-radius: 14px;
            border: 1px solid var(--border-color);
        }

        .result-stat-card .val {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--text-dark);
            display: block;
        }

        .result-stat-card .lbl {
            font-size: 0.75rem;
            color: var(--text-muted);
            font-weight: 600;
        }

        /* Toast Notification */
        .quiz-toast {
            position: fixed;
            bottom: 32px;
            right: 32px;
            background: #0f172a;
            color: #ffffff;
            padding: 14px 20px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.875rem;
            font-weight: 600;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.25);
            z-index: 100;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .quiz-toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        /* Header Dropdowns (Messages & Notifications) */
        .header-dropdown-menu {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            width: 320px;
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.85);
            border-radius: 16px;
            box-shadow: 0 16px 36px -8px rgba(15, 23, 42, 0.14);
            padding: 12px;
            z-index: 60;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-8px);
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .header-dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .header-dropdown-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 6px 8px 12px;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 8px;
        }
        .header-dropdown-head h4 {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--text-dark);
        }
        .header-dropdown-list {
            display: flex;
            flex-direction: column;
            gap: 6px;
            max-height: 280px;
            overflow-y: auto;
        }
        .header-dropdown-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 10px;
            border-radius: 10px;
            background: #f8fafc;
            font-size: 0.825rem;
            color: var(--text-dark);
            cursor: pointer;
            transition: background 0.15s ease;
        }
        .header-dropdown-item:hover {
            background: #f1f5f9;
        }
        .header-dropdown-item i {
            color: var(--blue);
            margin-top: 2px;
            flex-shrink: 0;
        }

        /* Card 3-dots Menu */
        .card-dropdown-menu {
            position: absolute;
            top: 36px;
            right: 0;
            width: 200px;
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 14px;
            box-shadow: 0 12px 28px -6px rgba(15, 23, 42, 0.18);
            padding: 6px;
            z-index: 25;
            display: none;
        }
        .card-dropdown-menu.show {
            display: block;
        }
        .card-dropdown-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #334155;
            text-decoration: none;
            background: transparent;
            border: none;
            width: 100%;
            cursor: pointer;
            text-align: left;
            transition: all 0.15s ease;
        }
        .card-dropdown-item:hover {
            background: #f1f5f9;
            color: var(--blue);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .quizzes-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 1024px) {
            .sidebar { display: none; }
            .main-content { margin-left: 0; }
            .header { padding: 14px 24px; }
            .content { padding: 30px 24px; }
            .quizzes-grid { grid-template-columns: 1fr; }
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
                <li class="active"><a href="{{ route('quizzes') }}"><i data-lucide="list-checks"></i> Kuis</a></li>
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
                        <span>Kuis Saya</span>
                    </div>
                </div>

                <div class="header-actions">
                    <!-- Streak Indicator -->
                    <div class="streak-badge" title="Klik untuk info streak belajar" onclick="showStreakInfo()" style="cursor: pointer;">
                        <i data-lucide="flame" size="16"></i>
                        <span>5 Hari</span>
                    </div>

                    <!-- Message Dropdown -->
                    <div style="position: relative;">
                        <button class="icon-btn" id="btnMessage" title="Pesan Diskusi" onclick="toggleMessageDropdown(event)">
                            <i data-lucide="message-circle" size="18"></i>
                        </button>
                        <div class="header-dropdown-menu" id="messageDropdown">
                            <div class="header-dropdown-head">
                                <h4>Pesan Instruktur</h4>
                                <span style="font-size: 0.72rem; color: var(--blue); font-weight: 600; cursor: pointer;" onclick="showToastNotification('Semua pesan ditandai telah dibaca.')">Tandai Dibaca</span>
                            </div>
                            <div class="header-dropdown-list">
                                <div class="header-dropdown-item" onclick="window.location.href='{{ route('quizzes.take', ['slug' => 'ui-ux']) }}'">
                                    <i data-lucide="user-check" size="16"></i>
                                    <div>
                                        <div style="font-weight: 700;">Sarah Jenkins (Lead Designer)</div>
                                        <div style="font-size: 0.75rem; color: #64748b; margin-top: 2px;">"Fokus pada pertanyaan seputar prinsip User Persona dan WCAG Contrast ya. Semangat!"</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Dropdown -->
                    <div style="position: relative;">
                        <button class="icon-btn has-dot" id="btnNotification" title="Notifikasi" onclick="toggleNotificationDropdown(event)">
                            <i data-lucide="bell" size="18"></i>
                        </button>
                        <div class="header-dropdown-menu" id="notificationDropdown">
                            <div class="header-dropdown-head">
                                <h4>Notifikasi Kuis</h4>
                                <span style="font-size: 0.72rem; color: var(--blue); font-weight: 600; cursor: pointer;" onclick="clearNotifDot()">Hapus Notifikasi</span>
                            </div>
                            <div class="header-dropdown-list">
                                <div class="header-dropdown-item" onclick="window.location.href='{{ route('quizzes.take', ['slug' => 'ui-ux']) }}'">
                                    <i data-lucide="clock" size="16"></i>
                                    <div>
                                        <div style="font-weight: 600;">UI/UX Design Quiz Siap</div>
                                        <div style="font-size: 0.75rem; color: #64748b; margin-top: 2px;">Batas waktu pengumpulan kuis: Hari ini pukul 23:59.</div>
                                    </div>
                                </div>
                                <div class="header-dropdown-item" onclick="openResultModal('HTML/CSS Basics', '85%', '13 Benar dari 15 Soal')">
                                    <i data-lucide="award" size="16" style="color: #10b981;"></i>
                                    <div>
                                        <div style="font-weight: 600;">HTML/CSS Basics Selesai</div>
                                        <div style="font-size: 0.75rem; color: #64748b; margin-top: 2px;">Hasil kuis Anda bernilai 85% (Lulus).</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

            <!-- Page Body -->
            <div class="content">
                
                <div class="page-header-wrap">
                    <h1 class="page-title">My Quiz</h1>
                    <p class="page-subtitle">Uji pemahamanmu dari materi yang telah dipelajari.</p>
                </div>

                <!-- Filter Pills -->
                <div class="filter-pills-row">
                    <button type="button" class="filter-pill active" data-filter="all" onclick="filterQuizzes('all', this)">All</button>
                    <button type="button" class="filter-pill" data-filter="upcoming" onclick="filterQuizzes('upcoming', this)">Upcoming</button>
                    <button type="button" class="filter-pill" data-filter="completed" onclick="filterQuizzes('completed', this)">Completed</button>
                    <button type="button" class="filter-pill" data-filter="in-progress" onclick="filterQuizzes('in-progress', this)">In Progress</button>
                </div>

                <!-- Quizzes Grid -->
                <div class="quizzes-grid" id="quizzesGrid">
                    
                    <!-- Card 1: Upcoming (UI/UX Design Quiz) -->
                    <div class="quiz-card" data-category="upcoming">
                        <div>
                            <div class="quiz-card-top" style="position: relative;">
                                <span class="quiz-badge upcoming">UPCOMING</span>
                                <button type="button" class="quiz-card-menu-btn" title="Opsi" onclick="toggleCardMenu(event, 'menu-uiux')"><i data-lucide="more-horizontal" size="18"></i></button>
                                <div class="card-dropdown-menu" id="menu-uiux">
                                    <a href="{{ route('quizzes.take', ['slug' => 'ui-ux']) }}" class="card-dropdown-item"><i data-lucide="play" size="14"></i> Kerjakan Kuis</a>
                                    <button type="button" class="card-dropdown-item" onclick="copyQuizLink('{{ route('quizzes.take', ['slug' => 'ui-ux']) }}')"><i data-lucide="share-2" size="14"></i> Bagikan Link</button>
                                    <button type="button" class="card-dropdown-item" onclick="showQuizInfo('UI/UX Design Quiz', '10 Soal • 20 Menit • Modul 3')"><i data-lucide="info" size="14"></i> Detail Modul</button>
                                </div>
                            </div>
                            <h2 class="quiz-card-title">UI/UX Design Quiz</h2>
                            <p class="quiz-card-desc">Test your knowledge on user research and wireframing fundamentals.</p>
                        </div>
                        <div>
                            <div class="quiz-meta-row">
                                <span class="quiz-meta-item"><i data-lucide="help-circle" size="15"></i> 10 Questions</span>
                                <span class="quiz-meta-item"><i data-lucide="clock" size="15"></i> 20 Mins</span>
                            </div>
                            <div class="quiz-extra-info">
                                <i data-lucide="rotate-ccw" size="13"></i> Attempt 0/1
                            </div>
                            <button type="button" class="quiz-btn quiz-btn-dark" onclick="window.location.href='{{ route('quizzes.take', ['slug' => 'ui-ux']) }}'">
                                Start Quiz
                            </button>
                        </div>
                    </div>

                    <!-- Card 2: Completed (HTML/CSS Basics) -->
                    <div class="quiz-card" data-category="completed">
                        <div>
                            <div class="quiz-card-top" style="position: relative;">
                                <span class="quiz-badge completed">COMPLETED</span>
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <span class="quiz-score-badge">85%</span>
                                    <button type="button" class="quiz-card-menu-btn" title="Opsi" onclick="toggleCardMenu(event, 'menu-htmlcss')"><i data-lucide="more-horizontal" size="18"></i></button>
                                </div>
                                <div class="card-dropdown-menu" id="menu-htmlcss">
                                    <button type="button" class="card-dropdown-item" onclick="openResultModal('HTML/CSS Basics', '85%', '13 Benar dari 15 Soal')"><i data-lucide="award" size="14"></i> Lihat Hasil</button>
                                    <button type="button" class="card-dropdown-item" onclick="showQuizInfo('HTML/CSS Basics', '15 Soal • Nilai: 85% (Lulus)')"><i data-lucide="info" size="14"></i> Detail Modul</button>
                                </div>
                            </div>
                            <h2 class="quiz-card-title">HTML/CSS Basics</h2>
                            <p class="quiz-card-desc">Foundational web layout and styling concepts.</p>
                        </div>
                        <div>
                            <div class="quiz-meta-row" style="margin-bottom: 22px;">
                                <span class="quiz-meta-item"><i data-lucide="help-circle" size="15"></i> 15 Questions</span>
                                <span class="quiz-meta-item"><i data-lucide="clock" size="15"></i> 30 Mins</span>
                            </div>
                            <button type="button" class="quiz-btn quiz-btn-outline" onclick="openResultModal('HTML/CSS Basics', '85%', '13 Benar dari 15 Soal')">
                                View Results
                            </button>
                        </div>
                    </div>

                    <!-- Card 3: In Progress (JavaScript ES6+) -->
                    <div class="quiz-card" data-category="in-progress">
                        <div>
                            <div class="quiz-card-top" style="position: relative;">
                                <span class="quiz-badge in-progress">IN PROGRESS</span>
                                <button type="button" class="quiz-card-menu-btn" title="Opsi" onclick="toggleCardMenu(event, 'menu-js')"><i data-lucide="more-horizontal" size="18"></i></button>
                                <div class="card-dropdown-menu" id="menu-js">
                                    <a href="{{ route('quizzes.take', ['slug' => 'js']) }}" class="card-dropdown-item"><i data-lucide="play" size="14"></i> Lanjutkan Kuis</a>
                                    <button type="button" class="card-dropdown-item" onclick="copyQuizLink('{{ route('quizzes.take', ['slug' => 'js']) }}')"><i data-lucide="share-2" size="14"></i> Bagikan Link</button>
                                    <button type="button" class="card-dropdown-item" onclick="showQuizInfo('JavaScript ES6+', '20 Soal • Progress: 5/20')"><i data-lucide="info" size="14"></i> Detail Modul</button>
                                </div>
                            </div>
                            <h2 class="quiz-card-title">JavaScript ES6+</h2>
                            <p class="quiz-card-desc">Modern JavaScript syntax and features evaluation.</p>
                        </div>
                        <div>
                            <div class="quiz-progress-wrap">
                                <div class="quiz-progress-labels">
                                    <span>Progress</span>
                                    <span style="font-weight:700; color:var(--text-dark);">5/20</span>
                                </div>
                                <div class="quiz-progress-track">
                                    <div class="quiz-progress-fill" style="width: 25%;"></div>
                                </div>
                            </div>
                            <button type="button" class="quiz-btn quiz-btn-accent" onclick="window.location.href='{{ route('quizzes.take', ['slug' => 'js']) }}'">
                                Resume Quiz
                            </button>
                        </div>
                    </div>

                    <!-- Card 4: Upcoming (React & State Management) -->
                    <div class="quiz-card" data-category="upcoming">
                        <div>
                            <div class="quiz-card-top" style="position: relative;">
                                <span class="quiz-badge upcoming">UPCOMING</span>
                                <button type="button" class="quiz-card-menu-btn" title="Opsi" onclick="toggleCardMenu(event, 'menu-react')"><i data-lucide="more-horizontal" size="18"></i></button>
                                <div class="card-dropdown-menu" id="menu-react">
                                    <a href="{{ route('quizzes.take', ['slug' => 'react']) }}" class="card-dropdown-item"><i data-lucide="play" size="14"></i> Kerjakan Kuis</a>
                                    <button type="button" class="card-dropdown-item" onclick="copyQuizLink('{{ route('quizzes.take', ['slug' => 'react']) }}')"><i data-lucide="share-2" size="14"></i> Bagikan Link</button>
                                    <button type="button" class="card-dropdown-item" onclick="showQuizInfo('React.js & Hooks', '12 Soal • 25 Menit')"><i data-lucide="info" size="14"></i> Detail Modul</button>
                                </div>
                            </div>
                            <h2 class="quiz-card-title">React.js & Hooks</h2>
                            <p class="quiz-card-desc">Components lifecycle, custom hooks, and modern frontend state.</p>
                        </div>
                        <div>
                            <div class="quiz-meta-row">
                                <span class="quiz-meta-item"><i data-lucide="help-circle" size="15"></i> 12 Questions</span>
                                <span class="quiz-meta-item"><i data-lucide="clock" size="15"></i> 25 Mins</span>
                            </div>
                            <div class="quiz-extra-info">
                                <i data-lucide="rotate-ccw" size="13"></i> Attempt 0/1
                            </div>
                            <button type="button" class="quiz-btn quiz-btn-dark" onclick="window.location.href='{{ route('quizzes.take', ['slug' => 'react']) }}'">
                                Start Quiz
                            </button>
                        </div>
                    </div>

                    <!-- Card 5: Completed (UI Typography & Color) -->
                    <div class="quiz-card" data-category="completed">
                        <div>
                            <div class="quiz-card-top" style="position: relative;">
                                <span class="quiz-badge completed">COMPLETED</span>
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <span class="quiz-score-badge">92%</span>
                                    <button type="button" class="quiz-card-menu-btn" title="Opsi" onclick="toggleCardMenu(event, 'menu-typo')"><i data-lucide="more-horizontal" size="18"></i></button>
                                </div>
                                <div class="card-dropdown-menu" id="menu-typo">
                                    <button type="button" class="card-dropdown-item" onclick="openResultModal('Typography & Color Theory', '92%', '11 Benar dari 12 Soal')"><i data-lucide="award" size="14"></i> Lihat Hasil</button>
                                    <button type="button" class="card-dropdown-item" onclick="showQuizInfo('Typography & Color Theory', '10 Soal • Nilai: 92% (Sangat Baik)')"><i data-lucide="info" size="14"></i> Detail Modul</button>
                                </div>
                            </div>
                            <h2 class="quiz-card-title">Typography & Color Theory</h2>
                            <p class="quiz-card-desc">Color harmony, WCAG contrast accessibility, and typography scale.</p>
                        </div>
                        <div>
                            <div class="quiz-meta-row" style="margin-bottom: 22px;">
                                <span class="quiz-meta-item"><i data-lucide="help-circle" size="15"></i> 10 Questions</span>
                                <span class="quiz-meta-item"><i data-lucide="clock" size="15"></i> 15 Mins</span>
                            </div>
                            <button type="button" class="quiz-btn quiz-btn-outline" onclick="openResultModal('Typography & Color Theory', '92%', '11 Benar dari 12 Soal')">
                                View Results
                            </button>
                        </div>
                    </div>

                    <!-- Card 6: In Progress (Backend API Standards) -->
                    <div class="quiz-card" data-category="in-progress">
                        <div>
                            <div class="quiz-card-top" style="position: relative;">
                                <span class="quiz-badge in-progress">IN PROGRESS</span>
                                <button type="button" class="quiz-card-menu-btn" title="Opsi" onclick="toggleCardMenu(event, 'menu-backend')"><i data-lucide="more-horizontal" size="18"></i></button>
                                <div class="card-dropdown-menu" id="menu-backend">
                                    <a href="{{ route('quizzes.take', ['slug' => 'backend']) }}" class="card-dropdown-item"><i data-lucide="play" size="14"></i> Lanjutkan Kuis</a>
                                    <button type="button" class="card-dropdown-item" onclick="copyQuizLink('{{ route('quizzes.take', ['slug' => 'backend']) }}')"><i data-lucide="share-2" size="14"></i> Bagikan Link</button>
                                    <button type="button" class="card-dropdown-item" onclick="showQuizInfo('Backend API & Database', '15 Soal • Progress: 8/15')"><i data-lucide="info" size="14"></i> Detail Modul</button>
                                </div>
                            </div>
                            <h2 class="quiz-card-title">Backend API & Database</h2>
                            <p class="quiz-card-desc">RESTful API conventions, endpoint authentication, and database schemas.</p>
                        </div>
                        <div>
                            <div class="quiz-progress-wrap">
                                <div class="quiz-progress-labels">
                                    <span>Progress</span>
                                    <span style="font-weight:700; color:var(--text-dark);">8/15</span>
                                </div>
                                <div class="quiz-progress-track">
                                    <div class="quiz-progress-fill" style="width: 53%;"></div>
                                </div>
                            </div>
                            <button type="button" class="quiz-btn quiz-btn-accent" onclick="window.location.href='{{ route('quizzes.take', ['slug' => 'backend']) }}'">
                                Resume Quiz
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="quiz-toast" id="quizToast">
        <i data-lucide="check-circle" size="18" style="color: #10b981;"></i>
        <span id="toastMsg">Link kuis berhasil disalin.</span>
    </div>
        </div>
    </div>

    <!-- ── Interactive Quiz Modal ── -->
    <div class="quiz-modal-backdrop" id="quizModal">
        <div class="quiz-modal-box">
            <div class="quiz-modal-header">
                <div>
                    <h3 id="modalQuizTitle">UI/UX Design Quiz</h3>
                </div>
                <div style="display:flex; align-items:center; gap:12px;">
                    <div class="quiz-modal-timer" id="modalTimer">
                        <i data-lucide="clock" size="14"></i> <span id="timerDigits">19:45</span>
                    </div>
                    <button type="button" class="quiz-modal-close" onclick="closeQuizModal()"><i data-lucide="x" size="20"></i></button>
                </div>
            </div>

            <!-- Question Screen -->
            <div class="quiz-modal-body" id="quizQuestionsBody">
                <span class="quiz-step-indicator" id="quizStepText">Pertanyaan 1 dari 5</span>
                <p class="quiz-question-text" id="quizQuestionText">Apa tujuan utama dari pembuatan User Persona dalam proses desain produk?</p>

                <div class="quiz-options-list" id="quizOptionsList">
                    <div class="quiz-option-item" onclick="selectQuizOption(0, this)">
                        <div class="option-bullet"><span class="option-bullet-dot"></span></div>
                        <span class="option-label-text">Mempresentasikan target audiens fiktif berdasarkan riset nyata untuk memandu keputusan desain.</span>
                    </div>
                    <div class="quiz-option-item" onclick="selectQuizOption(1, this)">
                        <div class="option-bullet"><span class="option-bullet-dot"></span></div>
                        <span class="option-label-text">Menentukan harga jual lisensi perangkat lunak di pasar komersial.</span>
                    </div>
                    <div class="quiz-option-item" onclick="selectQuizOption(2, this)">
                        <div class="option-bullet"><span class="option-bullet-dot"></span></div>
                        <span class="option-label-text">Membuat palet warna dan tipografi tanpa memerlukan riset pengguna.</span>
                    </div>
                    <div class="quiz-option-item" onclick="selectQuizOption(3, this)">
                        <div class="option-bullet"><span class="option-bullet-dot"></span></div>
                        <span class="option-label-text">Mengganti peran tim engineering dalam membangun database sistem.</span>
                    </div>
                </div>
            </div>

            <!-- Result Screen -->
            <div class="quiz-modal-body quiz-result-view" id="quizResultView">
                <div class="result-badge-circle" id="resultScoreCircle">90%</div>
                <h3 class="result-title">Selamat! Anda Lulus Kuis 🎉</h3>
                <p class="result-desc">Anda telah menyelesaikan kuis dengan pemahaman materi yang sangat baik.</p>
                
                <div class="result-stats-row">
                    <div class="result-stat-card">
                        <span class="val" id="resultCorrectVal">4 / 5</span>
                        <span class="lbl">Jawaban Benar</span>
                    </div>
                    <div class="result-stat-card">
                        <span class="val">01:42</span>
                        <span class="lbl">Waktu Pengerjaan</span>
                    </div>
                    <div class="result-stat-card">
                        <span class="val" style="color:var(--green-text);">LULUS</span>
                        <span class="lbl">Status Kelulusan</span>
                    </div>
                </div>
            </div>

            <!-- Footer Controls -->
            <div class="quiz-modal-footer" id="quizModalFooter">
                <button type="button" class="quiz-btn quiz-btn-outline" style="width:auto;" onclick="closeQuizModal()">Batalkan</button>
                <button type="button" class="quiz-btn quiz-btn-dark" style="width:auto;" id="quizNextBtn" onclick="nextQuestionOrSubmit()">Pertanyaan Selanjutnya <i data-lucide="arrow-right" size="16"></i></button>
            </div>
        </div>
    </div>

    <!-- ── Interactive Result Detail Modal ── -->
    <div class="quiz-modal-backdrop" id="resultModal">
        <div class="quiz-modal-box">
            <div class="quiz-modal-header">
                <div>
                    <h3 id="resDetailTitle">Hasil Kuis</h3>
                </div>
                <button type="button" class="quiz-modal-close" onclick="closeResultModal()"><i data-lucide="x" size="20"></i></button>
            </div>
            <div class="quiz-modal-body text-center" style="text-align:center;">
                <div class="result-badge-circle" id="resDetailScore">85%</div>
                <h3 class="result-title" id="resDetailHeading">Lulus dengan Predikat Sangat Baik</h3>
                <p class="result-desc" id="resDetailSummary">13 Benar dari 15 Soal • Waktu Pengerjaan: 18 Menit</p>

                <div style="background-color:#f8fafc; border-radius:16px; border:1px solid var(--border-color); padding:20px; text-align:left; margin-bottom:20px;">
                    <h4 style="font-size:0.9rem; font-weight:700; color:var(--text-dark); margin-bottom:12px;"><i data-lucide="check-circle-2" size="16" style="color:var(--green-text); vertical-align:middle;"></i> Ringkasan Kompetensi</h4>
                    <p style="font-size:0.85rem; color:var(--text-muted); line-height:1.5;">Anda telah menguasai konsep dasar selektor, flexbox layout, dan CSS responsive media query dengan akurasi tinggi.</p>
                </div>
            </div>
            <div class="quiz-modal-footer" style="justify-content: flex-end;">
                <button type="button" class="quiz-btn quiz-btn-dark" style="width:auto;" onclick="closeResultModal()">Tutup Hasil</button>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();

        // ── Filter Pills Functionality ──
        function filterQuizzes(category, btn) {
            document.querySelectorAll('.filter-pill').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const cards = document.querySelectorAll('.quiz-card');
            cards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // ── Quiz Taking Questions Simulation Data ──
        const quizQuestions = [
            {
                q: "Apa tujuan utama dari pembuatan User Persona dalam proses desain produk?",
                options: [
                    "Mempresentasikan target audiens fiktif berdasarkan riset nyata untuk memandu keputusan desain.",
                    "Menentukan harga jual lisensi perangkat lunak di pasar komersial.",
                    "Membuat palet warna dan tipografi tanpa memerlukan riset pengguna.",
                    "Mengganti peran tim engineering dalam membangun database sistem."
                ],
                correct: 0
            },
            {
                q: "Tahapan pertama dalam metodologi Design Thinking yang berfokus pada memahami pengguna adalah?",
                options: [
                    "Prototype (Membuat purwarupa)",
                    "Empathize (Berempati dengan masalah pengguna)",
                    "Ideate (Mengumpulkan ide solusi)",
                    "Testing (Uji coba pengguna)"
                ],
                correct: 1
            },
            {
                q: "Manakah dari berikut ini yang merupakan definisi tepat dari Wireframe low-fidelity?",
                options: [
                    "Sketsa tata letak struktural berformat hitam-putih sederhana tanpa detail visual kompleks.",
                    "Desain final dengan animasi mikro dan aset grafis 3D resolusi tinggi.",
                    "Kode HTML dan CSS yang siap dideploy ke server produksi.",
                    "Desain grafis spanduk promosi pemasaran media sosial."
                ],
                correct: 0
            },
            {
                q: "Mengapa prinsip rasio kontras warna (WCAG Contrast Ratio) sangat penting dalam UI Design?",
                options: [
                    "Untuk memastikan teks mudah dibaca oleh semua pengguna, termasuk penderita gangguan penglihatan.",
                    "Agar ukuran file gambar SVG menjadi lebih kecil di browser.",
                    "Sebagai syarat agar aplikasi bisa di-upload ke server cloud.",
                    "Untuk mempercepat waktu koneksi database backend."
                ],
                correct: 0
            },
            {
                q: "Apa perbedaan mendasar antara UI (User Interface) dan UX (User Experience)?",
                options: [
                    "UI fokus pada tampilan visual dan estetika, sedangkan UX fokus pada alur dan kepuasan pengalaman pengguna.",
                    "UI hanya dipakai di mobile app, sedangkan UX hanya dipakai di website desktop.",
                    "UI dan UX adalah dua istilah yang memiliki arti sama persis tanpa perbedaan.",
                    "UX adalah bahasa pemrograman, sedangkan UI adalah framework CSS."
                ],
                correct: 0
            }
        ];

        let currentQuestionIdx = 0;
        let selectedOptionIdx = null;
        let correctAnswersCount = 0;
        let timerInterval = null;
        let remainingSeconds = 1200; // 20 mins

        function startQuizModal(title, isResume = false) {
            document.getElementById('modalQuizTitle').textContent = title;
            document.getElementById('quizQuestionsBody').style.display = 'block';
            document.getElementById('quizResultView').classList.remove('show');
            document.getElementById('quizModalFooter').style.display = 'flex';
            document.getElementById('quizNextBtn').innerHTML = 'Pertanyaan Selanjutnya <i data-lucide="arrow-right" size="16"></i>';

            currentQuestionIdx = isResume ? 1 : 0;
            correctAnswersCount = isResume ? 1 : 0;
            renderQuestion(currentQuestionIdx);

            remainingSeconds = 1200;
            startTimer();

            document.getElementById('quizModal').classList.add('show');
            lucide.createIcons();
        }

        function renderQuestion(idx) {
            selectedOptionIdx = null;
            const qData = quizQuestions[idx];
            document.getElementById('quizStepText').textContent = `Pertanyaan ${idx + 1} dari ${quizQuestions.length}`;
            document.getElementById('quizQuestionText').textContent = qData.q;

            const list = document.getElementById('quizOptionsList');
            list.innerHTML = '';
            qData.options.forEach((optText, optIdx) => {
                const item = document.createElement('div');
                item.className = 'quiz-option-item';
                item.onclick = function() { selectQuizOption(optIdx, item); };
                item.innerHTML = `
                    <div class="option-bullet"><span class="option-bullet-dot"></span></div>
                    <span class="option-label-text">${optText}</span>
                `;
                list.appendChild(item);
            });

            if (idx === quizQuestions.length - 1) {
                document.getElementById('quizNextBtn').innerHTML = 'Selesaikan Kuis <i data-lucide="check" size="16"></i>';
            } else {
                document.getElementById('quizNextBtn').innerHTML = 'Pertanyaan Selanjutnya <i data-lucide="arrow-right" size="16"></i>';
            }
            lucide.createIcons();
        }

        function selectQuizOption(optIdx, el) {
            selectedOptionIdx = optIdx;
            document.querySelectorAll('.quiz-option-item').forEach(item => item.classList.remove('selected'));
            el.classList.add('selected');
        }

        function nextQuestionOrSubmit() {
            if (selectedOptionIdx === null) {
                alert('Silakan pilih salah satu jawaban terlebih dahulu.');
                return;
            }

            if (selectedOptionIdx === quizQuestions[currentQuestionIdx].correct) {
                correctAnswersCount++;
            }

            if (currentQuestionIdx < quizQuestions.length - 1) {
                currentQuestionIdx++;
                renderQuestion(currentQuestionIdx);
            } else {
                // Show Result Screen
                clearInterval(timerInterval);
                document.getElementById('quizQuestionsBody').style.display = 'none';
                document.getElementById('quizResultView').classList.add('show');
                document.getElementById('quizModalFooter').style.display = 'none';

                const pct = Math.round((correctAnswersCount / quizQuestions.length) * 100);
                document.getElementById('resultScoreCircle').textContent = pct + '%';
                document.getElementById('resultCorrectVal').textContent = `${correctAnswersCount} / ${quizQuestions.length}`;
                lucide.createIcons();
            }
        }

        function startTimer() {
            clearInterval(timerInterval);
            timerInterval = setInterval(() => {
                if (remainingSeconds <= 0) {
                    clearInterval(timerInterval);
                    nextQuestionOrSubmit();
                    return;
                }
                remainingSeconds--;
                const mins = String(Math.floor(remainingSeconds / 60)).padStart(2, '0');
                const secs = String(remainingSeconds % 60).padStart(2, '0');
                document.getElementById('timerDigits').textContent = `${mins}:${secs}`;
            }, 1000);
        }

        function closeQuizModal() {
            clearInterval(timerInterval);
            document.getElementById('quizModal').classList.remove('show');
        }

        function openResultModal(title, score, summary) {
            document.getElementById('resDetailTitle').textContent = 'Hasil ' + title;
            document.getElementById('resDetailScore').textContent = score;
            document.getElementById('resDetailSummary').textContent = summary + ' • Waktu Pengerjaan: 18 Menit';
            document.getElementById('resultModal').classList.add('show');
            lucide.createIcons();
        }

        function closeResultModal() {
            document.getElementById('resultModal').classList.remove('show');
        }

        // Close on backdrop click
        document.querySelectorAll('.quiz-modal-backdrop').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('show');
                    clearInterval(timerInterval);
                }
            });
        });

        // ── Toast Notification ──
        function showToastNotification(msg) {
            const toast = document.getElementById('quizToast');
            const msgEl = document.getElementById('toastMsg');
            if (msgEl) msgEl.textContent = msg;
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 2600);
        }

        // ── Header Dropdowns & Actions ──
        function toggleMessageDropdown(e) {
            if (e) e.stopPropagation();
            closeAllCardMenus();
            const msgDropdown = document.getElementById('messageDropdown');
            const notifDropdown = document.getElementById('notificationDropdown');
            const userDropdown = document.getElementById('userDropdownMenu');
            const userProfileBtn = document.getElementById('userProfileBtn');

            if (notifDropdown) notifDropdown.classList.remove('show');
            if (userDropdown) userDropdown.classList.remove('show');
            if (userProfileBtn) userProfileBtn.classList.remove('active');

            if (msgDropdown) {
                msgDropdown.classList.toggle('show');
                lucide.createIcons();
            }
        }

        function toggleNotificationDropdown(e) {
            if (e) e.stopPropagation();
            closeAllCardMenus();
            const msgDropdown = document.getElementById('messageDropdown');
            const notifDropdown = document.getElementById('notificationDropdown');
            const userDropdown = document.getElementById('userDropdownMenu');
            const userProfileBtn = document.getElementById('userProfileBtn');

            if (msgDropdown) msgDropdown.classList.remove('show');
            if (userDropdown) userDropdown.classList.remove('show');
            if (userProfileBtn) userProfileBtn.classList.remove('active');

            if (notifDropdown) {
                notifDropdown.classList.toggle('show');
                lucide.createIcons();
            }
        }

        function clearNotifDot() {
            const btn = document.getElementById('btnNotification');
            if (btn) btn.classList.remove('has-dot');
            showToastNotification('Semua notifikasi kuis telah ditandai dibaca.');
        }

        function showStreakInfo() {
            showToastNotification('🔥 Streak Belajar 5 Hari! Pertahankan konsistensi belajar Anda setiap hari.');
        }

        // ── Card 3-dots Menu ──
        function toggleCardMenu(e, menuId) {
            if (e) e.stopPropagation();
            const targetMenu = document.getElementById(menuId);
            const isShown = targetMenu && targetMenu.classList.contains('show');
            closeAllCardMenus();
            if (targetMenu && !isShown) {
                targetMenu.classList.add('show');
                lucide.createIcons();
            }
        }

        function closeAllCardMenus() {
            document.querySelectorAll('.card-dropdown-menu').forEach(menu => menu.classList.remove('show'));
        }

        function copyQuizLink(url) {
            closeAllCardMenus();
            const fullUrl = window.location.origin + url;
            if (navigator.clipboard) {
                navigator.clipboard.writeText(fullUrl).then(() => {
                    showToastNotification('✓ Link kuis berhasil disalin ke clipboard!');
                }).catch(() => {
                    showToastNotification('✓ Link: ' + fullUrl);
                });
            } else {
                showToastNotification('✓ Link: ' + fullUrl);
            }
        }

        function showQuizInfo(title, meta) {
            closeAllCardMenus();
            showToastNotification(`ℹ️ ${title}: ${meta}`);
        }

        // User Profile Dropdown Toggle & Global Click Outside
        document.addEventListener('DOMContentLoaded', function() {
            const userProfileBtn = document.getElementById('userProfileBtn');
            const userDropdownMenu = document.getElementById('userDropdownMenu');
            if (userProfileBtn && userDropdownMenu) {
                userProfileBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    closeAllCardMenus();
                    const msgDropdown = document.getElementById('messageDropdown');
                    const notifDropdown = document.getElementById('notificationDropdown');
                    if (msgDropdown) msgDropdown.classList.remove('show');
                    if (notifDropdown) notifDropdown.classList.remove('show');

                    const isOpen = userDropdownMenu.classList.contains('show');
                    userProfileBtn.classList.toggle('active', !isOpen);
                    userDropdownMenu.classList.toggle('show', !isOpen);
                });
            }

            document.addEventListener('click', function(e) {
                const userProfileBtn = document.getElementById('userProfileBtn');
                const userDropdownMenu = document.getElementById('userDropdownMenu');
                const msgDropdown = document.getElementById('messageDropdown');
                const btnMessage = document.getElementById('btnMessage');
                const notifDropdown = document.getElementById('notificationDropdown');
                const btnNotification = document.getElementById('btnNotification');

                if (userProfileBtn && userDropdownMenu && !userProfileBtn.contains(e.target) && !userDropdownMenu.contains(e.target)) {
                    userProfileBtn.classList.remove('active');
                    userDropdownMenu.classList.remove('show');
                }

                if (msgDropdown && btnMessage && !btnMessage.contains(e.target) && !msgDropdown.contains(e.target)) {
                    msgDropdown.classList.remove('show');
                }

                if (notifDropdown && btnNotification && !btnNotification.contains(e.target) && !notifDropdown.contains(e.target)) {
                    notifDropdown.classList.remove('show');
                }

                closeAllCardMenus();
            });
        });
    </script>
</body>
</html>
