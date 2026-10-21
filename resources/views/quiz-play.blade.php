<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mulai Kuis - UI/UX Design Quiz | Pixel Community</title>
    
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
            --blue-selected: #f0f9ff;
            --blue-border: #0284c7;
            --red-timer: #e11d48;
            --red-bg: #fff1f2;
            --red-border: #fecdd3;
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

        /* ── Sidebar (Standard Pixel Community) ── */
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
            user-select: none;
        }

        .streak-badge i { color: #ea580c; fill: #ea580c; }

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
            transition: all 0.2s ease;
        }

        .icon-btn:hover {
            background-color: #f8fafc;
            color: #0f172a;
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
        }

        .header-divider {
            width: 1px;
            height: 24px;
            background-color: var(--border-color);
            margin: 0 2px;
        }

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

        .user-dropdown-menu {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            width: 230px;
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.85);
            border-radius: 16px;
            box-shadow: 0 16px 36px -8px rgba(15, 23, 42, 0.12);
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
        }

        .user-dropdown-email {
            font-size: 0.75rem;
            color: #64748b;
            margin-top: 2px;
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

        .dropdown-item.dropdown-logout-btn { color: #ef4444; }
        .dropdown-item.dropdown-logout-btn:hover { background-color: #fef2f2; color: #dc2626; }

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

        /* Review Accordion */
        .btn-review-toggle {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            background: #f8fafc;
            color: var(--text-dark);
            font-weight: 700;
            font-size: 0.85rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-bottom: 16px;
            transition: background 0.2s;
        }
        .btn-review-toggle:hover {
            background: #e2e8f0;
        }
        .review-item {
            padding: 12px;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            margin-bottom: 8px;
            background: #ffffff;
            font-size: 0.825rem;
        }
        .review-item.correct {
            border-color: #86efac;
            background: #f0fdf4;
        }
        .review-item.incorrect {
            border-color: #fca5a5;
            background: #fef2f2;
        }

        /* ── Quiz Play Area ── */
        .quiz-container {
            padding: 32px 48px 80px;
            max-width: 980px;
            width: 100%;
            margin: 0 auto;
        }

        /* In-page Breadcrumb */
        .quiz-inner-breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.825rem;
            color: var(--text-muted);
            margin-bottom: 24px;
            font-weight: 500;
        }

        .quiz-inner-breadcrumb a {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.15s ease;
        }

        .quiz-inner-breadcrumb a:hover {
            color: var(--blue);
        }

        .quiz-inner-breadcrumb span {
            color: var(--text-dark);
            font-weight: 700;
        }

        /* Header Card */
        .quiz-header-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid var(--border-color);
            padding: 24px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 12px -2px rgba(15, 23, 42, 0.03);
            margin-bottom: 32px;
        }

        .quiz-header-info h1 {
            font-size: 1.65rem;
            font-weight: 800;
            letter-spacing: -0.025em;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .quiz-module-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .quiz-module-tag i {
            color: #94a3b8;
        }

        /* Timer Badge (Red Accent) */
        .quiz-timer-box {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: var(--red-bg);
            border: 1.5px solid var(--red-border);
            color: var(--red-timer);
            padding: 8px 18px;
            border-radius: 12px;
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: -0.01em;
            box-shadow: 0 2px 4px rgba(225, 29, 72, 0.05);
            font-variant-numeric: tabular-nums;
        }

        .quiz-timer-box i {
            color: var(--red-timer);
        }

        /* Progress Info & Bar */
        .quiz-progress-section {
            margin-bottom: 24px;
        }

        .quiz-progress-meta {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 10px;
        }

        .question-counter-text {
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--text-dark);
            letter-spacing: -0.01em;
        }

        .completed-percentage-text {
            font-size: 0.85rem;
            font-weight: 700;
            color: #64748b;
        }

        .quiz-progress-bar-track {
            height: 8px;
            background-color: #e2e8f0;
            border-radius: 999px;
            overflow: hidden;
            width: 100%;
        }

        .quiz-progress-bar-fill {
            height: 100%;
            background-color: var(--text-dark);
            border-radius: 999px;
            width: 10%;
            transition: width 0.35s ease-in-out;
        }

        /* Question Card */
        .quiz-question-box {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid var(--border-color);
            padding: 40px;
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.04);
            margin-bottom: 28px;
        }

        .quiz-question-title {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1.4;
            margin-bottom: 32px;
            letter-spacing: -0.015em;
        }

        /* Options */
        .quiz-options-group {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .quiz-option-card {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 22px;
            border-radius: 14px;
            border: 1.5px solid var(--border-color);
            background-color: #ffffff;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            user-select: none;
        }

        .quiz-option-card:hover {
            border-color: #cbd5e1;
            background-color: #f8fafc;
        }

        /* Selected State (matches screenshot Option B) */
        .quiz-option-card.selected {
            background-color: #f0f9ff;
            border-color: var(--blue-border);
            box-shadow: 0 4px 12px rgba(2, 132, 199, 0.08);
        }

        /* Custom Radio Circle */
        .option-radio {
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

        .quiz-option-card:hover .option-radio {
            border-color: #94a3b8;
        }

        .quiz-option-card.selected .option-radio {
            border-color: #0284c7;
        }

        .option-radio-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #0284c7;
            opacity: 0;
            transform: scale(0.5);
            transition: all 0.2s ease;
        }

        .quiz-option-card.selected .option-radio-dot {
            opacity: 1;
            transform: scale(1);
        }

        .option-content {
            display: flex;
            align-items: baseline;
            gap: 8px;
            font-size: 1rem;
            color: #1e293b;
        }

        .option-prefix {
            font-weight: 800;
            color: var(--text-dark);
            min-width: 24px;
        }

        .option-text {
            font-weight: 500;
            line-height: 1.4;
        }

        .quiz-option-card.selected .option-text {
            font-weight: 600;
            color: #0f172a;
        }

        /* Bottom Controls Row */
        .quiz-controls-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .btn-prev {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            border-radius: 12px;
            border: 1.5px solid var(--border-color);
            background: #ffffff;
            color: #64748b;
            font-family: inherit;
            font-size: 0.925rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-prev:hover:not(:disabled) {
            background-color: #f8fafc;
            border-color: #cbd5e1;
            color: var(--text-dark);
        }

        .btn-prev:disabled {
            opacity: 0.45;
            cursor: not-allowed;
            border-color: #e2e8f0;
            color: #94a3b8;
        }

        .controls-right-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .btn-draft {
            background: none;
            border: none;
            color: #475569;
            font-family: inherit;
            font-size: 0.925rem;
            font-weight: 600;
            cursor: pointer;
            padding: 12px 16px;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .btn-draft:hover {
            color: var(--text-dark);
            background-color: #f1f5f9;
        }

        .btn-next {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 12px;
            border: none;
            background-color: #0f172a;
            color: #ffffff;
            font-family: inherit;
            font-size: 0.925rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 10px rgba(15, 23, 42, 0.12);
        }

        .btn-next:hover:not(:disabled) {
            background-color: #1e293b;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(15, 23, 42, 0.2);
        }

        .btn-next:disabled {
            opacity: 0.45;
            cursor: not-allowed;
            box-shadow: none;
            transform: none !important;
        }

        /* Submit Button Area */
        .quiz-submit-row {
            display: flex;
            justify-content: flex-end;
            margin-top: 12px;
        }

        .btn-submit-quiz {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 12px;
            border: 1.5px solid #ef4444;
            background-color: #ffffff;
            color: #ef4444;
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-submit-quiz:hover {
            background-color: #fef2f2;
            border-color: #dc2626;
            color: #dc2626;
            transform: translateY(-1px);
        }

        /* Toast Notification */
        .quiz-toast {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #0f172a;
            color: #ffffff;
            padding: 14px 22px;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 100;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .quiz-toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        /* Modal Overlay for Results & Submission */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(6px);
            z-index: 100;
            display: none;
            overflow-y: auto;
            padding: 16px;
        }

        .modal-overlay.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content-card {
            background: #ffffff;
            border-radius: 20px;
            max-width: 520px;
            width: 100%;
            padding: 24px 24px 20px;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);
            animation: modalPop 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            margin: auto;
            position: relative;
            max-height: min(600px, calc(100vh - 32px));
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
        }

        .modal-content-card.result-card {
            max-width: 480px;
            padding: 22px 22px 18px;
            max-height: min(580px, calc(100vh - 32px));
        }

        .modal-scroll-area {
            overflow-y: auto;
            flex: 1 1 auto;
            min-height: 0;
            padding-right: 4px;
            margin-right: -4px;
        }

        .modal-scroll-area::-webkit-scrollbar {
            width: 5px;
        }
        .modal-scroll-area::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }
        .modal-scroll-area::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        .modal-scroll-area::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        #reviewQuestionsBox {
            max-height: 190px;
            overflow-y: auto;
            margin-bottom: 12px;
            padding-right: 4px;
            text-align: left;
        }

        #reviewQuestionsBox::-webkit-scrollbar {
            width: 5px;
        }
        #reviewQuestionsBox::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }
        #reviewQuestionsBox::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        #reviewQuestionsBox::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .btn-modal-close {
            position: absolute;
            top: 14px;
            right: 14px;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 1px solid var(--border-color);
            background: #f8fafc;
            color: #64748b;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.15s ease;
            z-index: 5;
        }
        .btn-modal-close:hover {
            background: #fee2e2;
            color: #ef4444;
            border-color: #fca5a5;
        }

        .modal-score-badge {
            width: 62px;
            height: 62px;
            border-radius: 50%;
            margin: 0 auto 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.55rem;
            font-weight: 800;
            background: #eff6ff;
            color: #2563eb;
            border: 3px solid #bfdbfe;
            flex-shrink: 0;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .modal-subtitle {
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.45;
            margin-bottom: 14px;
        }

        .modal-stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 12px;
        }

        .modal-stat-item {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 8px 12px;
        }

        .modal-stat-val {
            font-size: 1.1rem;
            font-weight: 800;
            color: #0f172a;
        }

        .modal-stat-label {
            font-size: 0.72rem;
            font-weight: 600;
            color: #64748b;
            margin-top: 2px;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid var(--border-color);
            flex-shrink: 0;
        }

        .btn-modal-back {
            flex: 1;
            padding: 10px 14px;
            border-radius: 10px;
            border: 1.5px solid var(--border-color);
            background: #ffffff;
            color: var(--text-dark);
            font-weight: 700;
            font-size: 0.875rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }
        .btn-modal-back:hover {
            background: #f1f5f9;
        }

        .btn-modal-retry {
            flex: 1;
            padding: 10px 14px;
            border-radius: 10px;
            border: none;
            background: #0f172a;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.875rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: all 0.2s ease;
        }
        .btn-modal-retry:hover {
            background: #1e293b;
        }

        @media (max-width: 768px) {
            .sidebar { display: none; }
            .main-content { margin-left: 0; }
            .quiz-container { padding: 20px 16px 60px; }
            .quiz-header-card { flex-direction: column; align-items: flex-start; gap: 16px; padding: 20px; }
            .quiz-question-box { padding: 24px 20px; }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        
        <!-- Standard Pixel Community Sidebar (Untouched) -->
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
                        <a href="{{ route('quizzes') }}">Kuis Saya</a>
                        <i data-lucide="chevron-right" size="14"></i>
                        <span id="topQuizTitleBreadcrumb">UI/UX Design Quiz</span>
                    </div>
                </div>

                <div class="header-actions">
                    <div class="streak-badge" title="Klik untuk info streak" onclick="showStreakInfo()" style="cursor: pointer;">
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
                                <span style="font-size: 0.72rem; color: var(--blue); font-weight: 600; cursor: pointer;">Tandai Dibaca</span>
                            </div>
                            <div class="header-dropdown-list">
                                <div class="header-dropdown-item">
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
                                <div class="header-dropdown-item">
                                    <i data-lucide="clock" size="16"></i>
                                    <div>
                                        <div style="font-weight: 600;">Kuis Sedang Berlangsung</div>
                                        <div style="font-size: 0.75rem; color: #64748b; margin-top: 2px;">Waktu pengerjaan UI/UX Design Quiz sedang aktif.</div>
                                    </div>
                                </div>
                                <div class="header-dropdown-item">
                                    <i data-lucide="award" size="16" style="color: #10b981;"></i>
                                    <div>
                                        <div style="font-weight: 600;">HTML/CSS Selesai</div>
                                        <div style="font-size: 0.75rem; color: #64748b; margin-top: 2px;">Hasil kuis Anda bernilai 85% (Lulus).</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="header-divider"></div>

                    <!-- User Profile Dropdown -->
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

            <!-- Quiz Play Area -->
            <div class="quiz-container">
                
                <!-- Inner Breadcrumb (Matches Screenshot) -->
                <div class="quiz-inner-breadcrumb">
                    <a href="{{ route('quizzes') }}">Quizzes</a>
                    <i data-lucide="chevron-right" size="13"></i>
                    <a href="{{ route('quizzes') }}">My Quiz</a>
                    <i data-lucide="chevron-right" size="13"></i>
                    <span id="activeQuizBreadcrumb">UI/UX Design Quiz</span>
                </div>

                <!-- Quiz Header Card (Matches Screenshot) -->
                <div class="quiz-header-card">
                    <div class="quiz-header-info">
                        <h1 id="quizTitleDisplay">UI/UX Design Quiz</h1>
                        <div class="quiz-module-tag">
                            <i data-lucide="help-circle" size="16"></i>
                            <span id="quizModuleDisplay">Module 3 Assessment</span>
                        </div>
                    </div>

                    <!-- Red Accent Countdown Timer -->
                    <div class="quiz-timer-box" id="quizTimerWrapper" onclick="toggleTimerInfo()" style="cursor: pointer;" title="Klik untuk info timer">
                        <i data-lucide="clock" size="20"></i>
                        <span id="timerDigits">19:42</span>
                    </div>
                </div>

                <!-- Progress Section (Matches Screenshot) -->
                <div class="quiz-progress-section">
                    <div class="quiz-progress-meta">
                        <div class="question-counter-text" id="questionStepText">Question 1 of 10</div>
                        <div class="completed-percentage-text" id="completedPercentageText">10% Completed</div>
                    </div>
                    <div class="quiz-progress-bar-track">
                        <div class="quiz-progress-bar-fill" id="progressBarFill" style="width: 10%;"></div>
                    </div>
                </div>

                <!-- Question Card Box -->
                <div class="quiz-question-box">
                    <h2 class="quiz-question-title" id="questionPrompt">
                        Which principle is most important in user-centered design?
                    </h2>

                    <!-- Options List -->
                    <div class="quiz-options-group" id="optionsContainer">
                        <!-- Populated by JavaScript -->
                    </div>
                </div>

                <!-- Controls Row -->
                <div class="quiz-controls-row">
                    <button type="button" class="btn-prev" id="prevBtn" onclick="goPrevQuestion()" disabled>
                        <i data-lucide="chevron-left" size="16"></i> Previous
                    </button>

                    <div class="controls-right-actions">
                        <button type="button" class="btn-draft" onclick="saveDraft()">
                            Save Draft
                        </button>
                        <button type="button" class="btn-next" id="nextBtn" onclick="goNextQuestion()">
                            Next <i data-lucide="chevron-right" size="16"></i>
                        </button>
                    </div>
                </div>

                <!-- Submit Button Row -->
                <div class="quiz-submit-row">
                    <button type="button" class="btn-submit-quiz" onclick="openConfirmModal()">
                        Submit Quiz <i data-lucide="check-check" size="18"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Toast Notification for Save Draft -->
    <div class="quiz-toast" id="quizToast">
        <i data-lucide="check-circle" size="18" style="color: #10b981;"></i>
        <span id="toastMsg">Jawaban draft berhasil disimpan sementara.</span>
    </div>

    <!-- Custom In-App Confirmation Modal -->
    <div class="modal-overlay" id="confirmModal">
        <div class="modal-content-card" style="max-width: 480px;">
            <div style="width: 64px; height: 64px; background: #fff1f2; color: #e11d48; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                <i data-lucide="help-circle" size="32"></i>
            </div>
            <h2 class="modal-title">Kumpulkan Jawaban Kuis?</h2>
            <p class="modal-subtitle" id="confirmStatusText">Anda telah menjawab 1 dari 10 pertanyaan.</p>
            
            <div style="background: #f8fafc; border: 1px solid var(--border-color); border-radius: 12px; padding: 12px 16px; margin-bottom: 24px; text-align: left; font-size: 0.85rem; color: #475569; display: flex; align-items: flex-start; gap: 8px;">
                <i data-lucide="info" size="16" style="color: var(--blue); margin-top: 2px; flex-shrink: 0;"></i>
                <span>Jawaban akan langsung dinilai dan hasil evaluasi kompetensi Anda akan langsung ditampilkan.</span>
            </div>

            <div class="modal-actions">
                <button type="button" class="btn-modal-back" onclick="closeConfirmModal()">
                    Lanjutkan Mengerjakan
                </button>
                <button type="button" class="btn-modal-retry" style="background: #e11d48;" onclick="executeSubmitQuiz()">
                    <i data-lucide="check-check" size="16"></i> Ya, Kumpulkan
                </button>
            </div>
        </div>
    </div>

    <!-- Modal for Result -->
    <div class="modal-overlay" id="resultModal">
        <div class="modal-content-card result-card">
            <button type="button" class="btn-modal-close" onclick="closeResultModalAndReturn()" title="Tutup">
                <i data-lucide="x" size="18"></i>
            </button>

            <div class="modal-scroll-area">
                <div class="modal-score-badge" id="modalScoreDisplay">90%</div>
                <h2 class="modal-title">Kuis Selesai! 🎉</h2>
                <p class="modal-subtitle" id="modalMessage">Kerja bagus! Anda telah menyelesaikan seluruh soal dengan pemahaman yang sangat mendalam.</p>
                
                <div class="modal-stats-grid">
                    <div class="modal-stat-item">
                        <div class="modal-stat-val" id="statCorrectAnswers">9 / 10</div>
                        <div class="modal-stat-label">Jawaban Benar</div>
                    </div>
                    <div class="modal-stat-item">
                        <div class="modal-stat-val" id="statTimeSpent">02:18</div>
                        <div class="modal-stat-label">Waktu Digunakan</div>
                    </div>
                </div>

                <!-- Review Questions Accordion -->
                <button type="button" class="btn-review-toggle" onclick="toggleReviewQuestions()">
                    <i data-lucide="help-circle" size="15"></i> <span id="reviewToggleText">Lihat Pembahasan 10 Soal</span>
                </button>
                <div id="reviewQuestionsBox" style="display:none; text-align:left;"></div>
            </div>

            <div class="modal-actions">
                <a href="{{ route('quizzes') }}" class="btn-modal-back">
                    Ke Halaman Kuis
                </a>
                <button type="button" class="btn-modal-retry" onclick="restartQuiz()">
                    <i data-lucide="rotate-ccw" size="16"></i> Ulangi Kuis
                </button>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();

        // ── Quiz Topics Database ──
        const quizTopics = {
            'ui-ux': {
                title: 'UI/UX Design Quiz',
                module: 'Module 3 Assessment',
                breadcrumb: 'UI/UX Design Quiz',
                timeLimit: 1182, // 19:42 (matches reference screenshot)
                defaultAnswers: { 0: 1 }, // Option B selected on Q1 as shown in screenshot
                questions: [
                    {
                        q: "Which principle is most important in user-centered design?",
                        options: [
                            "Visual decoration",
                            "User needs",
                            "Animation",
                            "Color palette"
                        ],
                        correct: 1,
                        explanation: "User needs adalah fokus utama dalam User-Centered Design (UCD) agar produk memecahkan masalah nyata pengguna."
                    },
                    {
                        q: "What is the primary purpose of creating a User Persona in UX research?",
                        options: [
                            "To replace the backend engineer database schema",
                            "To represent real user archetypes based on qualitative and quantitative research",
                            "To choose marketing slogans for billboard promotions",
                            "To estimate cloud server hosting costs"
                        ],
                        correct: 1,
                        explanation: "User Persona merepresentasikan profil kelompok target pengguna riil untuk memandu keputusan desain."
                    },
                    {
                        q: "What is the first step in the 5-stage Design Thinking methodology?",
                        options: [
                            "Ideate",
                            "Prototype",
                            "Empathize",
                            "Test"
                        ],
                        correct: 2,
                        explanation: "Empathize adalah langkah pertama untuk memahami kebutuhan, kesulitan, dan konteks target pengguna."
                    },
                    {
                        q: "What best characterizes a low-fidelity wireframe?",
                        options: [
                            "Pixel-perfect UI mockup with final typography and 3D graphics",
                            "Simple grayscale skeletal layout focusing on layout structure and information hierarchy",
                            "Interactive prototype coded in modern React and Next.js",
                            "High-resolution video walkthrough for marketing launch"
                        ],
                        correct: 1,
                        explanation: "Low-fidelity wireframe menggunakan sketsa monokrom/grayscale sederhana berfokus pada alur dan hirarki tata letak."
                    },
                    {
                        q: "According to WCAG 2.1 accessibility guidelines, what is the minimum contrast ratio for normal body text (Level AA)?",
                        options: [
                            "2.5 : 1",
                            "3.0 : 1",
                            "4.5 : 1",
                            "7.0 : 1"
                        ],
                        correct: 2,
                        explanation: "WCAG AA mensyaratkan rasio kontras minimal 4.5:1 untuk teks biasa dan 3:1 untuk teks berukuran besar."
                    },
                    {
                        q: "What is the fundamental difference between UI and UX design?",
                        options: [
                            "UI focuses on visual touchpoints and aesthetics, while UX focuses on the overall user journey and usability",
                            "UI is strictly for mobile apps, while UX is strictly for desktop websites",
                            "UI is frontend coding, while UX is print media graphic design",
                            "UI and UX are identical terms with no distinction"
                        ],
                        correct: 0,
                        explanation: "UI fokus pada tampilan visual (estetika, tipografi, warna), sedangkan UX fokus pada pengalaman menyeluruh dan kemudahan penggunaan."
                    },
                    {
                        q: "What is an Affinity Diagram typically used for in UX synthesis?",
                        options: [
                            "Benchmarking server database response times",
                            "Grouping qualitative research observations into thematic clusters",
                            "Exporting SVG icons to frontend asset folders",
                            "Calculating company equity and revenue splits"
                        ],
                        correct: 1,
                        explanation: "Affinity Diagram digunakan untuk mengelompokkan temuan riset kualitatif menjadi pola atau tema tertentu."
                    },
                    {
                        q: "In usability testing, what does a 'Think Aloud' protocol require participants to do?",
                        options: [
                            "Memorize the entire user interface before testing begins",
                            "Verbalize their thoughts, expectations, and struggles as they navigate tasks",
                            "Rate every button design on a scale of 1 to 10 out loud",
                            "Read the terms of service agreement loudly to the researcher"
                        ],
                        correct: 1,
                        explanation: "Think Aloud protocol meminta partisipan mengutarakan pemikiran dan kebingungan mereka secara langsung saat menggunakan aplikasi."
                    },
                    {
                        q: "What does Fitts's Law state in Human-Computer Interaction (HCI)?",
                        options: [
                            "Users always scan desktop web pages in an F-shaped eye tracking pattern",
                            "The time required to move to a target area is a function of the distance and size of the target",
                            "Monochrome color schemes always convert better than colorful layouts",
                            "Navigation menus must always be positioned at the top-left"
                        ],
                        correct: 1,
                        explanation: "Hukum Fitts menyatakan waktu meraih target bergantung pada jarak ke target dan ukuran target tersebut."
                    },
                    {
                        q: "What is the primary role of Information Architecture (IA) in digital product design?",
                        options: [
                            "Structuring, labeling, and organizing content so users can easily find information",
                            "Optimizing SQL queries to decrease server load time",
                            "Applying drop shadows and gradients to CTA buttons",
                            "Translating English documentation into multiple regional languages"
                        ],
                        correct: 0,
                        explanation: "Information Architecture menata dan mengorganisir informasi agar navigasi dan pencarian konten berjalan intuitif."
                    }
                ]
            },
            'js': {
                title: 'JavaScript ES6+ Quiz',
                module: 'Modern Syntax Assessment',
                breadcrumb: 'JavaScript ES6+',
                timeLimit: 1200,
                defaultAnswers: {},
                questions: [
                    {
                        q: "Manakah cara yang tepat untuk mendeklarasikan konstanta di JavaScript modern (ES6)?",
                        options: ["var PI = 3.14;", "const PI = 3.14;", "constant PI = 3.14;", "let constant PI = 3.14;"],
                        correct: 1,
                        explanation: "Keyword `const` digunakan untuk variabel yang nilainya tidak dapat di-reassign."
                    },
                    {
                        q: "Apa output dari: console.log(typeof NaN)?",
                        options: ["'number'", "'NaN'", "'undefined'", "'object'"],
                        correct: 0,
                        explanation: "Secara teknis di JavaScript, NaN (Not-a-Number) bertipe data 'number'."
                    },
                    {
                        q: "Fitur destructuring assignment pada array `const [a, b] = [10, 20];` akan menghasilkan:",
                        options: ["a = 10 dan b = 20", "a = [10, 20]", "Syntax Error", "b = 10 dan a = 20"],
                        correct: 0,
                        explanation: "Destructuring array mengambil elemen secara berurutan sesuai indeks."
                    },
                    {
                        q: "Bagaimana cara kerja Promise.all()?",
                        options: [
                            "Menunggu semua Promise selesai berhasil, atau langsung reject jika salah satu gagal",
                            "Hanya menjalankan Promise yang pertama kali selesai",
                            "Mengabaikan Promise yang error dan mengembalikan yang berhasil saja",
                            "Mengubah Promise asynchronous menjadi fungsi blocking synchronous"
                        ],
                        correct: 0,
                        explanation: "Promise.all reject seketika jika ada salah satu promise yang mengalami rejection."
                    },
                    {
                        q: "Apa kegunaan operator Optional Chaining `?.`?",
                        options: [
                            "Mencegah error saat mengakses properti dari objek yang bernilai null atau undefined",
                            "Menggabungkan dua array secara otomatis",
                            "Menjalankan perulangan tanpa menggunakan for loop",
                            "Membuat variabel privat dalam class"
                        ],
                        correct: 0,
                        explanation: "Optional chaining `user?.address?.city` mengevaluasi ke undefined jika salah satu referensi bernilai nullish."
                    },
                    {
                        q: "Apa hasil dari `[1, 2, 3].map(x => x * 2)`?",
                        options: ["[2, 4, 6]", "[1, 2, 3]", "6", "undefined"],
                        correct: 0,
                        explanation: "Array.prototype.map mengembalikan array baru dengan setiap elemen dikalikan 2."
                    },
                    {
                        q: "Apa perbedaan utama antara `==` dan `===` di JavaScript?",
                        options: [
                            "`===` memeriksa nilai dan tipe data tanpa konversi tipe otomatis (strict equality)",
                            "`==` memeriksa tipe data lebih ketat daripada `===`",
                            "`===` hanya dapat digunakan untuk perbandingan angka",
                            "Tidak ada perbedaan, keduanya menghasilkan output yang persis sama"
                        ],
                        correct: 0,
                        explanation: "`===` tidak melakukan type coercion sedangkan `==` melakukan konversi tipe otomatis."
                    },
                    {
                        q: "Keyword `async` sebelum deklarasi fungsi memastikan bahwa fungsi tersebut:",
                        options: [
                            "Selalu mengembalikan Promise",
                            "Berjalan di thread terpisah di GPU",
                            "Tidak dapat menerima parameter",
                            "Otomatis memblokir thread JavaScript"
                        ],
                        correct: 0,
                        explanation: "Fungsi async selalu membungkus return valuenya dalam sebuah Promise."
                    },
                    {
                        q: "Apa guna dari operator Spread `...` pada objek `const clone = { ...original };`?",
                        options: [
                            "Menyalin (shallow copy) seluruh enumerable properties dari original ke objek baru",
                            "Menghapus referensi memori dari original",
                            "Mengubah semua properti menjadi huruf kapital",
                            "Mengenkripsi isi objek"
                        ],
                        correct: 0,
                        explanation: "Object spread menyalin shallow copy dari properti objek ke objek target baru."
                    },
                    {
                        q: "Manakah method array yang digunakan untuk mengakumulasi nilai array menjadi satu nilai tunggal?",
                        options: ["reduce()", "filter()", "forEach()", "slice()"],
                        correct: 0,
                        explanation: "`reduce()` mengeksekusi reducer function pada setiap elemen array dan mengembalikan nilai akumulator tunggal."
                    }
                ]
            },
            'react': {
                title: 'React.js & Hooks Quiz',
                module: 'Frontend State Assessment',
                breadcrumb: 'React.js & Hooks',
                timeLimit: 1200,
                defaultAnswers: {},
                questions: [
                    {
                        q: "Hook mana yang digunakan untuk mengelola state lokal pada functional component di React?",
                        options: ["useState", "useEffect", "useContext", "useReducer"],
                        correct: 0,
                        explanation: "`useState` adalah hook dasar untuk mendeklarasikan dan memperbarui state lokal di functional component."
                    },
                    {
                        q: "Kapan efek dari `useEffect(fn, [])` dengan dependency array kosong dijalankan?",
                        options: [
                            "Hanya satu kali setelah initial render (mirip componentDidMount)",
                            "Setiap kali ada state atau props yang berubah",
                            "Sebelum komponen dimasukkan ke dalam DOM",
                            "Hanya saat komponen akan di-unmount"
                        ],
                        correct: 0,
                        explanation: "Dependency array kosong `[]` menandakan efek hanya dipicu satu kali saat mount."
                    },
                    {
                        q: "Apa kegunaan dari `useMemo` di React?",
                        options: [
                            "Mencegah kalkulasi ulang yang berat jika dependencies tidak berubah (memoizing calculation)",
                            "Menyimpan data di localStorage secara otomatis",
                            "Membuat navigasi halaman tanpa reload",
                            "Menggantikan seluruh CSS styling"
                        ],
                        correct: 0,
                        explanation: "`useMemo` meng-cache hasil komputasi berat di antara re-render."
                    },
                    {
                        q: "Apa aturan penting saat menggunakan React Hooks?",
                        options: [
                            "Hanya panggil Hooks di level teratas komponen (jangan di dalam loop atau conditional if)",
                            "Hooks harus dipanggil di dalam file HTML murni",
                            "Setiap komponen hanya boleh memiliki maksimal satu hook",
                            "Hooks wajib diawali dengan kata 'get'"
                        ],
                        correct: 0,
                        explanation: "Rules of Hooks: panggil hooks hanya di top level functional components atau custom hooks."
                    },
                    {
                        q: "Apa fungsi utama dari `useCallback`?",
                        options: [
                            "Mengembalikan instance fungsi yang sama (memoized callback) jika dependency tidak berubah",
                            "Membuat panggilan AJAX otomatis",
                            "Membuat timer interval",
                            "Menghubungkan ke database Firebase"
                        ],
                        correct: 0,
                        explanation: "`useCallback` menjaga referensi fungsi tetap sama antar render untuk optimasi perbandingan props di child."
                    },
                    {
                        q: "Di React, 'lifting state up' berarti:",
                        options: [
                            "Memindahkan state ke komponen parent terdekat agar bisa dibagi ke beberapa child component",
                            "Menghapus seluruh state dan menggantinya dengan HTML statis",
                            "Menyimpan state langsung di window object",
                            "Mengubah functional component menjadi class component"
                        ],
                        correct: 0,
                        explanation: "Lifting state up membagikan state bersama ke common ancestor/parent."
                    },
                    {
                        q: "Mengapa properti `key` sangat penting saat melakukan rendering list di React?",
                        options: [
                            "Membantu React Virtual DOM mengidentifikasi elemen mana yang ditambah, diubah, atau dihapus secara efisien",
                            "Menentukan warna font pada list item",
                            "Sebagai password enkripsi elemen",
                            "Wajib ada agar CSS Flexbox berfungsi"
                        ],
                        correct: 0,
                        explanation: "`key` memberi identitas unik stabil bagi setiap item list untuk rekonsiliasi efisien Virtual DOM."
                    },
                    {
                        q: "Apa tujuan dari React Context API?",
                        options: [
                            "Membagikan data secara global ke pohon komponen tanpa perlu passing props manual lewat setiap tingkat (prop drilling)",
                            "Membuat animasi CSS 3D",
                            "Mengelola multi-threading di JavaScript",
                            "Mempercepat waktu build Webpack"
                        ],
                        correct: 0,
                        explanation: "Context API menyediakan cara untuk berbagi nilai antar komponen tanpa prop drilling."
                    },
                    {
                        q: "Apa return value dari fungsi cleanup yang dikembalikan di dalam `useEffect`?",
                        options: [
                            "Dijalankan sebelum efek dijalankan kembali atau saat komponen di-unmount",
                            "Menghentikan aplikasi agar tidak merender ulang",
                            "Mereset state kembali ke null",
                            "Mengirimkan laporan error ke server"
                        ],
                        correct: 0,
                        explanation: "Cleanup function di useEffect membersihkan subscriptions, timers, atau listeners sebelum efek baru dijalankan atau saat unmount."
                    },
                    {
                        q: "Apa yang terjadi jika Anda memutasi state secara langsung seperti `state.items.push(newItem)`?",
                        options: [
                            "React tidak akan mendeteksi perubahan referensi sehingga komponen tidak akan melakukan re-render",
                            "Aplikasi akan langsung melempar Fatal Crash di browser",
                            "Data otomatis disimpan ke database",
                            "Tidak ada masalah, itu adalah best practice"
                        ],
                        correct: 0,
                        explanation: "State di React harus diperlakukan secara immutable agar mekanisme pendeteksian perubahan bekerja."
                    }
                ]
            },
            'backend': {
                title: 'Backend API & Database Quiz',
                module: 'REST & SQL Assessment',
                breadcrumb: 'Backend API & Database',
                timeLimit: 1200,
                defaultAnswers: {},
                questions: [
                    {
                        q: "Metode HTTP mana yang bersifat idempotent dan biasanya digunakan untuk memperbarui data secara menyeluruh?",
                        options: ["PUT", "POST", "PATCH", "DELETE"],
                        correct: 0,
                        explanation: "PUT bersifat idempotent dan digunakan untuk me-replace seluruh representasi resource target."
                    },
                    {
                        q: "HTTP Status code apa yang menandakan permintaan berhasil dibuat resource baru di server?",
                        options: ["201 Created", "200 OK", "204 No Content", "301 Moved Permanently"],
                        correct: 0,
                        explanation: "Status 201 Created menunjukkan request berhasil dan resource baru telah dibuat di server."
                    },
                    {
                        q: "Apa tujuan utama penggunaan Index pada kolom tabel database relasional (SQL)?",
                        options: [
                            "Mempercepat proses pencarian data (SELECT) dengan mengorbankan sedikit performa INSERT/UPDATE",
                            "Mengenkripsi isi data agar tidak bisa dibaca publik",
                            "Menghapus baris yang memiliki nilai duplikat",
                            "Mengurangi ukuran fisik file database di disk"
                        ],
                        correct: 0,
                        explanation: "Index membuat struktur pencarian cepat (seperti B-Tree) untuk mempercepat query SELECT."
                    },
                    {
                        q: "Apa kepanjangan dan fungsi dari JWT dalam autentikasi API?",
                        options: [
                            "JSON Web Token, token tanpa status (stateless) bertanda tangan digital untuk verifikasi identitas pengguna",
                            "Java Web Terminal, protokol compiler server-side",
                            "JavaScript WebSocket Thread, koneksi streaming dua arah",
                            "Joint Web Technology, konsorsium standarisasi web"
                        ],
                        correct: 0,
                        explanation: "JWT adalah standar terbuka (RFC 7519) untuk transmisi klaim identitas yang aman dan stateless."
                    },
                    {
                        q: "Bagaimana cara terbaik mencegah SQL Injection attack?",
                        options: [
                            "Menggunakan Prepared Statements / Parameterized Queries (atau ORM yang aman)",
                            "Menghilangkan tanda spasi dari input formulir",
                            "Menggunakan database NoSQL saja tanpa validasi",
                            "Menyimpan password dalam format plain text"
                        ],
                        correct: 0,
                        explanation: "Prepared Statements memisahkan query code dari data parameter sehingga injection tidak dapat dieksekusi sebagai query."
                    },
                    {
                        q: "Apa perbedaan antara INNER JOIN dan LEFT JOIN dalam query SQL?",
                        options: [
                            "INNER JOIN hanya mengembalikan baris yang cocok di kedua tabel, LEFT JOIN mengembalikan semua baris tabel kiri ditambah baris yang cocok dari tabel kanan",
                            "INNER JOIN menghapus duplikat sedangkan LEFT JOIN tidak",
                            "LEFT JOIN hanya bisa dipakai jika ada maksimal 2 kolom",
                            "INNER JOIN dan LEFT JOIN memiliki cara kerja yang identik"
                        ],
                        correct: 0,
                        explanation: "LEFT JOIN mempertahankan seluruh record dari tabel sebelah kiri meskipun tidak ada match di tabel kanan."
                    },
                    {
                        q: "Dalam arsitektur REST, apa arti dari karakteristik 'Stateless'?",
                        options: [
                            "Setiap request dari client harus berisi semua informasi yang dibutuhkan server untuk memahami dan memprosesnya",
                            "Server tidak diperbolehkan menyimpan data ke dalam database",
                            "Aplikasi tidak memiliki frontend UI",
                            "Client tidak boleh mengirim header authorization"
                        ],
                        correct: 0,
                        explanation: "REST stateless berarti server tidak menyimpan konteks percakapan/session antar request."
                    },
                    {
                        q: "Apa fungsi dari HTTP Status 429 Too Many Requests?",
                        options: [
                            "Memberitahu client bahwa batas kuota laju permintaan (Rate Limiting) telah terlampaui",
                            "Resource tidak ditemukan di server",
                            "Kredensial login pengguna salah",
                            "Database server sedang mengalami timeout"
                        ],
                        correct: 0,
                        explanation: "Status 429 diterapkan saat rate limiting terpicu untuk mencegah abuse atau brute force."
                    },
                    {
                        q: "Apa prinsip ACID dalam transaksi database relasional?",
                        options: [
                            "Atomicity, Consistency, Isolation, Durability",
                            "Access, Control, Identity, Delivery",
                            "Async, Callback, Interval, Defer",
                            "Action, Command, Interaction, Data"
                        ],
                        correct: 0,
                        explanation: "ACID adalah empat sifat mendasar yang menjamin keandalan transaksi database relasional."
                    },
                    {
                        q: "Teknik hashing password standar industri yang aman dan memiliki salting otomatis adalah:",
                        options: ["Bcrypt / Argon2", "MD5", "SHA-1", "Base64 Encoding"],
                        correct: 0,
                        explanation: "Bcrypt dan Argon2 dirancang khusus untuk password hashing dengan adaptive cost factor dan salting otomatis."
                    }
                ]
            }
        };

        // Determine current quiz topic
        const currentSlug = "{{ $slug ?? 'ui-ux' }}";
        const currentQuizData = quizTopics[currentSlug] || quizTopics['ui-ux'];
        const questionsList = currentQuizData.questions;

        // Apply title & labels to DOM
        document.getElementById('activeQuizBreadcrumb').textContent = currentQuizData.breadcrumb;
        document.getElementById('quizTitleDisplay').textContent = currentQuizData.title;
        document.getElementById('quizModuleDisplay').textContent = currentQuizData.module;
        document.getElementById('topQuizTitleBreadcrumb').textContent = currentQuizData.breadcrumb;

        // State tracking
        let currentIdx = 0;
        let userAnswers = Object.assign({}, currentQuizData.defaultAnswers || {});
        let totalTimeSeconds = currentQuizData.timeLimit || 1182;
        let timerInterval = null;
        let secondsElapsed = 0;

        // Check for saved local draft
        try {
            const savedDraftJson = localStorage.getItem('pixel_quiz_draft_' + currentSlug);
            if (savedDraftJson) {
                const savedDraft = JSON.parse(savedDraftJson);
                if (savedDraft && savedDraft.userAnswers) {
                    userAnswers = savedDraft.userAnswers;
                    if (typeof savedDraft.currentIdx === 'number') currentIdx = savedDraft.currentIdx;
                    if (typeof savedDraft.totalTimeSeconds === 'number') totalTimeSeconds = savedDraft.totalTimeSeconds;
                    if (typeof savedDraft.secondsElapsed === 'number') secondsElapsed = savedDraft.secondsElapsed;
                }
            } else {
                // Quiz is officially started! Auto-save initial draft so that if user navigates back to /quizzes,
                // it immediately appears as "IN PROGRESS" and "Resume Quiz"!
                autoSaveSilent();
            }
        } catch (e) {
            console.warn('LocalStorage error:', e);
        }

        // ── Countdown Timer ──
        function startCountdown() {
            clearInterval(timerInterval);
            updateTimerDisplay();
            timerInterval = setInterval(() => {
                if (totalTimeSeconds > 0) {
                    totalTimeSeconds--;
                    secondsElapsed++;
                    updateTimerDisplay();
                } else {
                    clearInterval(timerInterval);
                    showToastNotification('⏱ Waktu pengerjaan kuis telah habis! Kuis otomatis dikumpulkan.');
                    finishQuiz();
                }
            }, 1000);
        }

        function updateTimerDisplay() {
            const minutes = Math.floor(totalTimeSeconds / 60);
            const seconds = totalTimeSeconds % 60;
            const formatted = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            const digitsEl = document.getElementById('timerDigits');
            if (digitsEl) digitsEl.textContent = formatted;
        }

        function toggleTimerInfo() {
            const minutes = Math.floor(totalTimeSeconds / 60);
            const seconds = totalTimeSeconds % 60;
            showToastNotification(`⏱ Sisa Waktu: ${minutes}m ${seconds}s. Waktu akan berhenti otomatis saat kuis dikumpulkan.`);
        }

        // ── Question Renderer ──
        function renderCurrentQuestion() {
            const qData = questionsList[currentIdx];
            const totalQ = questionsList.length;

            // Update text & progress
            document.getElementById('questionStepText').textContent = `Question ${currentIdx + 1} of ${totalQ}`;
            const percentage = Math.round(((currentIdx + 1) / totalQ) * 100);
            document.getElementById('completedPercentageText').textContent = `${percentage}% Completed`;
            document.getElementById('progressBarFill').style.width = `${percentage}%`;

            // Prompt
            document.getElementById('questionPrompt').textContent = qData.q;

            // Options Container
            const container = document.getElementById('optionsContainer');
            container.innerHTML = '';

            const prefixes = ['A', 'B', 'C', 'D'];
            qData.options.forEach((optText, optIdx) => {
                const isSelected = userAnswers[currentIdx] === optIdx;
                const card = document.createElement('div');
                card.className = `quiz-option-card ${isSelected ? 'selected' : ''}`;
                card.onclick = () => selectOption(optIdx);

                card.innerHTML = `
                    <div class="option-radio">
                        <div class="option-radio-dot"></div>
                    </div>
                    <div class="option-content">
                        <span class="option-prefix">${prefixes[optIdx]}.</span>
                        <span class="option-text">${optText}</span>
                    </div>
                `;
                container.appendChild(card);
            });

            // Update Previous & Next buttons
            const prevBtn = document.getElementById('prevBtn');
            prevBtn.disabled = currentIdx === 0;

            const nextBtn = document.getElementById('nextBtn');
            nextBtn.disabled = currentIdx === totalQ - 1;
            nextBtn.innerHTML = `Next <i data-lucide="chevron-right" size="16"></i>`;

            lucide.createIcons();
        }

        function selectOption(optIdx) {
            userAnswers[currentIdx] = optIdx;
            renderCurrentQuestion();
            autoSaveSilent();
        }

        function goPrevQuestion() {
            if (currentIdx > 0) {
                currentIdx--;
                renderCurrentQuestion();
            }
        }

        function goNextQuestion() {
            if (currentIdx < questionsList.length - 1) {
                currentIdx++;
                renderCurrentQuestion();
            }
        }

        // ── Draft & LocalStorage ──
        function autoSaveSilent() {
            try {
                const draft = {
                    quizSlug: currentSlug,
                    quizTitle: currentQuizData.title,
                    currentIdx: currentIdx,
                    userAnswers: userAnswers,
                    totalTimeSeconds: totalTimeSeconds,
                    secondsElapsed: secondsElapsed,
                    totalQuestions: questionsList.length,
                    updatedAt: new Date().toISOString()
                };
                localStorage.setItem('pixel_quiz_draft_' + currentSlug, JSON.stringify(draft));
            } catch (e) {}
        }

        window.addEventListener('beforeunload', () => {
            autoSaveSilent();
        });

        function saveDraft() {
            autoSaveSilent();
            const answeredCount = Object.keys(userAnswers).length;
            showToastNotification(`✓ Draft tersimpan! (${answeredCount} dari ${questionsList.length} soal tersimpan aman).`);
        }

        function showToastNotification(msg) {
            const toast = document.getElementById('quizToast');
            const msgEl = document.getElementById('toastMsg');
            if (msgEl) msgEl.textContent = msg;
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 2600);
        }

        // ── Confirmation Modal ──
        function openConfirmModal() {
            const answeredCount = Object.keys(userAnswers).length;
            const total = questionsList.length;
            const statusEl = document.getElementById('confirmStatusText');
            
            if (statusEl) {
                if (answeredCount < total) {
                    statusEl.innerHTML = `Anda telah menjawab <strong>${answeredCount}</strong> dari <strong>${total}</strong> pertanyaan. <br><span style="color:#e11d48; font-weight:600;">(Masih ada ${total - answeredCount} soal belum dijawab)</span>`;
                } else {
                    statusEl.innerHTML = `Lengkap! Anda telah menjawab seluruh <strong>${total} dari ${total}</strong> pertanyaan.`;
                }
            }

            document.getElementById('confirmModal').classList.add('show');
            lucide.createIcons();
        }

        function closeConfirmModal() {
            document.getElementById('confirmModal').classList.remove('show');
        }

        function executeSubmitQuiz() {
            closeConfirmModal();
            finishQuiz();
        }

        // ── Quiz Completion & Results ──
        function finishQuiz() {
            clearInterval(timerInterval);

            // Calculate score
            let correctCount = 0;
            questionsList.forEach((q, idx) => {
                if (userAnswers[idx] === q.correct) {
                    correctCount++;
                }
            });

            const scorePercent = Math.round((correctCount / questionsList.length) * 100);

            // Format time spent
            const minsSpent = Math.floor(secondsElapsed / 60);
            const secsSpent = secondsElapsed % 60;
            const formattedTimeSpent = `${String(minsSpent).padStart(2, '0')}:${String(secsSpent).padStart(2, '0')}`;

            document.getElementById('modalScoreDisplay').textContent = `${scorePercent}%`;
            document.getElementById('statCorrectAnswers').textContent = `${correctCount} / ${questionsList.length}`;
            document.getElementById('statTimeSpent').textContent = formattedTimeSpent;

            const msgEl = document.getElementById('modalMessage');
            if (scorePercent >= 80) {
                msgEl.textContent = "Luar biasa! Pemahaman Anda terhadap materi kuis ini sangat memuaskan dan berada di atas rata-rata.";
            } else if (scorePercent >= 60) {
                msgEl.textContent = "Bagus! Anda telah lulus kuis ini dengan hasil evaluasi yang cukup memuaskan.";
            } else {
                msgEl.textContent = "Tetap semangat! Anda dapat mempelajari kembali materi kelas dan mengulang kuis ini kapan saja.";
            }

            // Remove draft now that it's submitted and save completed state
            try {
                localStorage.removeItem('pixel_quiz_draft_' + currentSlug);
                localStorage.setItem('pixel_quiz_completed_' + currentSlug, JSON.stringify({
                    quizSlug: currentSlug,
                    quizTitle: currentQuizData.title,
                    score: scorePercent,
                    correctCount: correctCount,
                    totalQuestions: questionsList.length,
                    completedAt: new Date().toISOString()
                }));
            } catch(e) {}

            // Reset review box visibility
            const reviewBox = document.getElementById('reviewQuestionsBox');
            if (reviewBox) {
                reviewBox.style.display = 'none';
                reviewBox.innerHTML = '';
            }
            const toggleBtnText = document.getElementById('reviewToggleText');
            if (toggleBtnText) toggleBtnText.textContent = `Lihat Pembahasan ${questionsList.length} Soal`;

            document.getElementById('resultModal').classList.add('show');
            lucide.createIcons();
        }

        // ── Review Accordion ──
        function toggleReviewQuestions() {
            const box = document.getElementById('reviewQuestionsBox');
            const toggleText = document.getElementById('reviewToggleText');
            if (!box) return;

            if (box.style.display === 'none' || !box.style.display) {
                let html = '';
                const prefixes = ['A', 'B', 'C', 'D'];

                questionsList.forEach((q, idx) => {
                    const userPick = userAnswers[idx];
                    const isCorrect = userPick === q.correct;
                    const userPickText = userPick !== undefined ? `${prefixes[userPick]}. ${q.options[userPick]}` : 'Tidak dijawab';
                    const correctText = `${prefixes[q.correct]}. ${q.options[q.correct]}`;

                    html += `
                        <div style="background: ${isCorrect ? '#f0fdf4' : '#fff1f2'}; border: 1px solid ${isCorrect ? '#bbf7d0' : '#fecdd3'}; border-radius: 12px; padding: 12px 14px; margin-bottom: 10px;">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 8px; margin-bottom: 6px;">
                                <span style="font-weight: 700; font-size: 0.825rem; color: #0f172a;">${idx + 1}. ${q.q}</span>
                                <span style="font-size: 0.72rem; font-weight: 700; padding: 2px 8px; border-radius: 9999px; background: ${isCorrect ? '#16a34a' : '#e11d48'}; color: #fff; white-space: nowrap;">
                                    ${isCorrect ? '✓ Benar' : '✗ Salah'}
                                </span>
                            </div>
                            <div style="font-size: 0.78rem; color: #475569; margin-bottom: 3px;">
                                <strong>Jawaban Anda:</strong> <span style="color: ${isCorrect ? '#15803d' : '#b91c1c'}; font-weight: 600;">${userPickText}</span>
                            </div>
                            ${!isCorrect ? `
                            <div style="font-size: 0.78rem; color: #15803d; margin-bottom: 3px;">
                                <strong>Kunci Jawaban:</strong> <span style="font-weight: 600;">${correctText}</span>
                            </div>` : ''}
                            ${q.explanation ? `
                            <div style="font-size: 0.74rem; color: #64748b; margin-top: 6px; padding-top: 6px; border-top: 1px dashed ${isCorrect ? '#bbf7d0' : '#fecdd3'};">
                                💡 <em>${q.explanation}</em>
                            </div>` : ''}
                        </div>
                    `;
                });

                box.innerHTML = html;
                box.style.display = 'block';
                if (toggleText) toggleText.textContent = 'Sembunyikan Pembahasan';
            } else {
                box.style.display = 'none';
                if (toggleText) toggleText.textContent = `Lihat Pembahasan ${questionsList.length} Soal`;
            }
        }

        // ── Restart Quiz ──
        function restartQuiz() {
            document.getElementById('resultModal').classList.remove('show');
            currentIdx = 0;
            userAnswers = {};
            totalTimeSeconds = currentQuizData.timeLimit || 1200;
            secondsElapsed = 0;
            try {
                localStorage.removeItem('pixel_quiz_completed_' + currentSlug);
                localStorage.removeItem('pixel_quiz_draft_' + currentSlug);
            } catch(e) {}
            autoSaveSilent();
            startCountdown();
            renderCurrentQuestion();
            showToastNotification('Kuis dimulai ulang dari pertanyaan pertama.');
        }

        function closeResultModalAndReturn() {
            document.getElementById('resultModal').classList.remove('show');
        }

        // ── Header Dropdowns & Actions ──
        function toggleMessageDropdown(e) {
            if (e) e.stopPropagation();
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
            showToastNotification('🔥 Streak Belajar 5 Hari! Pertahankan konsistensi harian Anda.');
        }

        // ── Keyboard Controls ──
        window.addEventListener('keydown', function(e) {
            // Ignore if in inputs or modal is open
            const confirmModal = document.getElementById('confirmModal');
            const resultModal = document.getElementById('resultModal');
            if (confirmModal && confirmModal.classList.contains('show')) {
                if (e.key === 'Escape') closeConfirmModal();
                if (e.key === 'Enter') executeSubmitQuiz();
                return;
            }
            if (resultModal && resultModal.classList.contains('show')) {
                if (e.key === 'Escape') restartQuiz();
                return;
            }

            const key = e.key.toLowerCase();
            if (key === '1' || key === 'a') selectOption(0);
            else if (key === '2' || key === 'b') selectOption(1);
            else if (key === '3' || key === 'c') selectOption(2);
            else if (key === '4' || key === 'd') selectOption(3);
            else if (e.key === 'ArrowLeft') goPrevQuestion();
            else if (e.key === 'ArrowRight') goNextQuestion();
        });

        // ── Click Outside to Close Popups ──
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
        });

        // Close modal on backdrop click
        document.querySelectorAll('.modal-overlay').forEach(overlay => {
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) {
                    if (overlay.id === 'confirmModal') closeConfirmModal();
                    if (overlay.id === 'resultModal') closeResultModalAndReturn();
                }
            });
        });

        // ── Initialization on DOM Load ──
        document.addEventListener('DOMContentLoaded', () => {
            renderCurrentQuestion();
            startCountdown();

            // Profile Dropdown Toggle
            const userProfileBtn = document.getElementById('userProfileBtn');
            const userDropdownMenu = document.getElementById('userDropdownMenu');
            if (userProfileBtn && userDropdownMenu) {
                userProfileBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const msgDropdown = document.getElementById('messageDropdown');
                    const notifDropdown = document.getElementById('notificationDropdown');
                    if (msgDropdown) msgDropdown.classList.remove('show');
                    if (notifDropdown) notifDropdown.classList.remove('show');

                    const isOpen = userDropdownMenu.classList.contains('show');
                    userProfileBtn.classList.toggle('active', !isOpen);
                    userDropdownMenu.classList.toggle('show', !isOpen);
                });
            }
        });
    </script>
</body>
</html>
