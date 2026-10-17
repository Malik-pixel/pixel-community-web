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

        /* Header Layout */
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
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
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
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid rgba(226, 232, 240, 0.7);
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.03), 0 4px 6px -2px rgba(15, 23, 42, 0.01);
            position: relative;
            overflow: visible;
        }

        .activity-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .activity-card-title-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .activity-card-title-group h3 {
            font-size: 1.1rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.01em;
            margin: 0;
        }

        .activity-live-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #ecfdf5;
            color: #059669;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 999px;
            border: 1px solid #d1fae5;
        }

        .activity-pulse-dot {
            width: 6px;
            height: 6px;
            background-color: #10b981;
            border-radius: 50%;
            position: relative;
        }

        .activity-pulse-dot::after {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            background-color: rgba(16, 185, 129, 0.45);
            animation: pulse-ring 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse-ring {
            0% { transform: scale(0.9); opacity: 0.9; }
            50% { transform: scale(1.8); opacity: 0; }
            100% { transform: scale(0.9); opacity: 0; }
        }

        /* Period Dropdown */
        .period-dropdown-wrap {
            position: relative;
        }

        .period-select-btn {
            font-size: 0.8rem;
            color: #334155;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            font-weight: 600;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 6px 12px;
            border-radius: 10px;
            transition: all 0.2s ease;
            user-select: none;
        }

        .period-select-btn:hover {
            background-color: #f1f5f9;
            border-color: #cbd5e1;
            color: #0f172a;
        }

        .period-menu {
            position: absolute;
            right: 0;
            top: calc(100% + 6px);
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.12), 0 8px 10px -6px rgba(15, 23, 42, 0.04);
            padding: 6px;
            min-width: 135px;
            z-index: 50;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-6px);
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .period-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .period-option {
            padding: 7px 10px;
            font-size: 0.78rem;
            font-weight: 600;
            color: #475569;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.15s ease;
        }

        .period-option:hover {
            background: #eff6ff;
            color: #1d4ed8;
        }

        .period-option.active {
            background: #eff6ff;
            color: #2563eb;
            font-weight: 700;
        }

        /* Activity Stats */
        .activity-stats-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 6px;
        }

        .activity-stats-header .subtitle {
            font-size: 0.8rem;
            color: #64748b;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            margin: 0;
        }

        .activity-target-pill {
            font-size: 0.7rem;
            font-weight: 700;
            color: #2563eb;
            background: #eff6ff;
            padding: 2px 8px;
            border-radius: 6px;
            border: 1px solid #dbeafe;
        }

        .activity-main-stat {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .activity-main-stat .time {
            font-size: 2rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.03em;
            line-height: 1;
            font-feature-settings: "tnum";
            font-variant-numeric: tabular-nums;
        }

        .badge-green {
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
            color: #059669;
            padding: 4px 9px;
            border-radius: 8px;
            font-size: 0.78rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            border: 1px solid #a7f3d0;
            box-shadow: 0 1px 2px rgba(16, 185, 129, 0.08);
        }

        /* Quick Insight Chips */
        .activity-chips {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 16px;
        }

        .activity-chip {
            background: #f8fafc;
            border: 1px solid #f1f5f9;
            border-radius: 12px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            gap: 9px;
            transition: all 0.2s ease;
        }

        .activity-chip:hover {
            background: #ffffff;
            border-color: #e2e8f0;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
        }

        .activity-chip-icon {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .activity-chip-icon.blue {
            background: #eff6ff;
            color: #2563eb;
        }

        .activity-chip-icon.amber {
            background: #fffbeb;
            color: #d97706;
        }

        .activity-chip-text {
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .activity-chip-label {
            font-size: 0.68rem;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.02em;
        }

        .activity-chip-val {
            font-size: 0.82rem;
            font-weight: 700;
            color: #1e293b;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Modern Interactive SVG Chart */
        .chart-container {
            position: relative;
            width: 100%;
            margin-top: 22px;
        }

        .chart-svg {
            width: 100%;
            height: 165px;
            display: block;
            overflow: visible;
        }

        .chart-grid-line {
            stroke: #eef2f6;
            stroke-width: 1;
            stroke-dasharray: 4 4;
        }

        .chart-axis-label {
            font-size: 9.5px;
            fill: #94a3b8;
            font-weight: 600;
            user-select: none;
            font-family: var(--font-main);
        }

        .chart-path-line {
            fill: none;
            stroke: url(#chartGradLine);
            stroke-width: 3.5;
            stroke-linecap: round;
            stroke-linejoin: round;
            filter: url(#chartDropGlow);
            transition: all 0.4s ease;
        }

        .chart-path-area {
            fill: url(#chartGradArea);
            transition: all 0.4s ease;
        }

        .chart-crosshair {
            stroke: #94a3b8;
            stroke-width: 1.2;
            stroke-dasharray: 3 3;
            opacity: 0;
            transition: opacity 0.15s ease, x1 0.1s ease, x2 0.1s ease;
            pointer-events: none;
        }

        .chart-point-group {
            cursor: pointer;
            outline: none;
            pointer-events: all;
        }

        .chart-point-hit {
            fill: transparent;
            cursor: pointer;
            pointer-events: all;
        }

        .chart-point-halo {
            fill: rgba(37, 99, 235, 0.15);
            transform-origin: center;
            animation: halo-pulse 2s infinite ease-in-out;
            pointer-events: none;
        }

        .chart-point-outer {
            fill: transparent;
            transition: r 0.2s cubic-bezier(0.34, 1.56, 0.64, 1), fill 0.2s ease;
            pointer-events: none;
        }

        .chart-point-dot {
            fill: #ffffff;
            stroke: #2563eb;
            stroke-width: 2.8;
            transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
            pointer-events: none;
        }

        .chart-point-group:hover .chart-point-dot,
        .chart-point-group.active .chart-point-dot {
            r: 6;
            stroke: #1d4ed8;
            stroke-width: 3.5;
            fill: #eff6ff;
        }

        .chart-point-group:hover .chart-point-outer,
        .chart-point-group.active .chart-point-outer {
            fill: rgba(37, 99, 235, 0.2);
            r: 12;
        }

        /* Floating Tooltip */
        .chart-tooltip-box {
            position: absolute;
            pointer-events: none;
            background: #0f172a;
            color: #ffffff;
            padding: 8px 12px;
            border-radius: 10px;
            font-size: 0.75rem;
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.35), 0 4px 6px -2px rgba(15, 23, 42, 0.15);
            transform: translate(-50%, -100%);
            margin-top: -14px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.18s ease, transform 0.18s ease, left 0.15s ease, top 0.15s ease;
            z-index: 30;
            white-space: nowrap;
        }

        .chart-tooltip-box::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            border-width: 5px 5px 0;
            border-style: solid;
            border-color: #0f172a transparent transparent transparent;
        }

        .chart-tooltip-box.visible {
            opacity: 1;
            visibility: visible;
        }

        .tooltip-day-title {
            color: #94a3b8;
            font-size: 0.7rem;
            font-weight: 500;
            margin-bottom: 2px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .tooltip-val-row {
            font-weight: 800;
            font-size: 0.88rem;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .tooltip-tag {
            font-size: 0.65rem;
            background: rgba(59, 130, 246, 0.25);
            color: #93c5fd;
            padding: 1px 5px;
            border-radius: 4px;
            font-weight: 600;
        }

        /* Day Labels */
        .chart-labels-row {
            display: flex;
            justify-content: space-between;
            margin-top: 6px;
            padding: 0 4px 0 32px;
        }

        .day-label-btn {
            background: none;
            border: none;
            font-family: inherit;
            font-size: 0.74rem;
            font-weight: 600;
            color: #94a3b8;
            padding: 3px 6px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }

        .day-label-btn:hover {
            color: #0f172a;
            background: #f1f5f9;
        }

        .day-label-btn.active {
            color: #2563eb;
            font-weight: 700;
            background: #eff6ff;
        }

        .day-label-btn.peak::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background-color: #2563eb;
        }

        /* Bottom Target Bar */
        .activity-target-footer {
            margin-top: 18px;
            padding-top: 14px;
            border-top: 1px solid #f1f5f9;
        }

        .target-footer-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 7px;
        }

        .target-footer-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .target-footer-num {
            font-size: 0.78rem;
            font-weight: 700;
            color: #0f172a;
        }

        .target-footer-num span {
            color: #059669;
            font-size: 0.72rem;
            margin-left: 4px;
            font-weight: 700;
        }

        .target-progress-track {
            height: 6px;
            background: #f1f5f9;
            border-radius: 999px;
            overflow: hidden;
        }

        .target-progress-fill {
            height: 100%;
            width: 100%;
            background: linear-gradient(90deg, #3b82f6 0%, #10b981 100%);
            border-radius: 999px;
            transition: width 0.6s cubic-bezier(0.16, 1, 0.3, 1);
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
            color: var(--text-dark);
            text-decoration: none;
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
            color: var(--text-dark);
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
            .header { padding: 14px 24px; }
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
                        Pixel Community <i data-lucide="chevron-right" size="14"></i> <span>Beranda</span>
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
                            <a href="{{ route('videos') }}" class="view-all">Lihat Semua</a>
                        </div>
                        
                        <div class="learning-list">
                            <!-- Item 1: UI/UX -->
                            <div class="learning-item" onclick="window.location.href='{{ route('learn', ['slug' => 'ui-ux']) }}'">
                                <img src="/images/course_uiux_1790558583074.jpg" alt="UI/UX" class="course-thumb">
                                <div class="course-info">
                                    <h4>UI/UX Design Fundamental</h4>
                                    <p>12/16 Pelajaran Selesai</p>
                                    <div class="progress-container">
                                        <div class="progress-bar"><div class="progress-fill" style="width: 75%"></div></div>
                                        <span class="progress-text">75%</span>
                                    </div>
                                </div>
                                <a href="{{ route('learn', ['slug' => 'ui-ux']) }}" class="btn-outline" onclick="event.stopPropagation();">Lanjutkan</a>
                            </div>
                            <!-- Item 2: React -->
                            <div class="learning-item" onclick="window.location.href='{{ route('learn', ['slug' => 'react']) }}'">
                                <img src="/images/course_react_1790558572624.jpg" alt="Web Dev" class="course-thumb">
                                <div class="course-info">
                                    <h4>Web Development Bootcamp</h4>
                                    <p>10/25 Pelajaran Selesai</p>
                                    <div class="progress-container">
                                        <div class="progress-bar"><div class="progress-fill" style="width: 40%"></div></div>
                                        <span class="progress-text">40%</span>
                                    </div>
                                </div>
                                <a href="{{ route('learn', ['slug' => 'react']) }}" class="btn-outline" onclick="event.stopPropagation();">Lanjutkan</a>
                            </div>
                        </div>
                        
                        <div class="quiz-wrapper" style="margin-top: 24px;">
                            <div class="quiz-card" onclick="window.location.href='{{ route('quizzes.take', ['slug' => 'ui-ux']) }}'" style="cursor: pointer;">
                                <div class="quiz-icon"><i data-lucide="list-todo" size="20"></i></div>
                                <div class="quiz-content">
                                    <h3>Kuis UI/UX</h3>
                                    <p>10 Pertanyaan • 20 Menit</p>
                                </div>
                                <a href="{{ route('quizzes.take', ['slug' => 'ui-ux']) }}" class="btn-outline-dark" onclick="event.stopPropagation();">Mulai Kuis</a>
                            </div>
                            
                            <div class="up-next-card" onclick="window.location.href='{{ route('learn', ['slug' => 'ui-ux']) }}'" style="cursor: pointer;">
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
                        <!-- Card Header -->
                        <div class="activity-card-header">
                            <div class="activity-card-title-group">
                                <h3>Aktivitas</h3>
                                <div class="activity-live-badge">
                                    <span class="activity-pulse-dot"></span>
                                    <span>Aktif</span>
                                </div>
                            </div>
                            
                            <!-- Interactive Dropdown -->
                            <div class="period-dropdown-wrap">
                                <div class="period-select-btn" id="periodTrigger" role="button" tabindex="0">
                                    <span id="currentPeriodLabel">Minggu Ini</span>
                                    <i data-lucide="chevron-down" size="14"></i>
                                </div>
                                <div class="period-menu" id="periodDropdownMenu">
                                    <div class="period-option active" data-period="this_week">Minggu Ini</div>
                                    <div class="period-option" data-period="last_week">Minggu Lalu</div>
                                    <div class="period-option" data-period="this_month">Bulan Ini</div>
                                </div>
                            </div>
                        </div>

                        <!-- Stats Overview -->
                        <div class="activity-stats">
                            <div class="activity-stats-header">
                                <p class="subtitle">
                                    <i data-lucide="clock" size="13" style="color: #64748b;"></i> Total Waktu Belajar
                                </p>
                                <span class="activity-target-pill" id="targetBadge">Target 20j</span>
                            </div>
                            <div class="activity-main-stat">
                                <div class="time" id="heroTimeVal">24h 35m</div>
                                <span class="badge-green" id="heroTrendBadge">
                                    <i data-lucide="arrow-up" size="12"></i> 18%
                                </span>
                            </div>
                        </div>

                        <!-- Quick Micro Insights -->
                        <div class="activity-chips">
                            <div class="activity-chip">
                                <div class="activity-chip-icon blue">
                                    <i data-lucide="zap" size="15"></i>
                                </div>
                                <div class="activity-chip-text">
                                    <span class="activity-chip-label">Rata-rata</span>
                                    <span class="activity-chip-val" id="chipAvgVal">3.5 jam / hari</span>
                                </div>
                            </div>
                            <div class="activity-chip">
                                <div class="activity-chip-icon amber">
                                    <i data-lucide="flame" size="15"></i>
                                </div>
                                <div class="activity-chip-text">
                                    <span class="activity-chip-label">Terproduktif</span>
                                    <span class="activity-chip-val" id="chipPeakVal">Sabtu (5.5h)</span>
                                </div>
                            </div>
                        </div>

                        <!-- Interactive Chart Container -->
                        <div class="chart-container" id="chartWrapper">
                            <!-- Floating Tooltip -->
                            <div class="chart-tooltip-box" id="chartTooltip">
                                <div class="tooltip-day-title">
                                    <span id="tooltipDayName">Sabtu</span>
                                    <span class="tooltip-tag" id="tooltipTag">🔥 Puncak</span>
                                </div>
                                <div class="tooltip-val-row">
                                    <i data-lucide="clock" size="12" style="color: #60a5fa;"></i>
                                    <span id="tooltipTimeVal">5 jam 30 menit</span>
                                </div>
                            </div>

                            <!-- Modern Pro SVG Chart -->
                            <svg viewBox="0 0 340 165" class="chart-svg" preserveAspectRatio="none">
                                <defs>
                                    <!-- Stroke Gradient -->
                                    <linearGradient id="chartGradLine" x1="0%" y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" stop-color="#6366f1" />
                                        <stop offset="50%" stop-color="#2563eb" />
                                        <stop offset="100%" stop-color="#06b6d4" />
                                    </linearGradient>

                                    <!-- Area Fill Gradient -->
                                    <linearGradient id="chartGradArea" x1="0%" y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" stop-color="#3b82f6" stop-opacity="0.22" />
                                        <stop offset="50%" stop-color="#60a5fa" stop-opacity="0.07" />
                                        <stop offset="100%" stop-color="#ffffff" stop-opacity="0" />
                                    </linearGradient>

                                    <!-- Soft Neon Glow Filter -->
                                    <filter id="chartDropGlow" x="-20%" y="-20%" width="140%" height="140%">
                                        <feDropShadow dx="0" dy="5" stdDeviation="4.5" flood-color="#2563eb" flood-opacity="0.25" />
                                    </filter>
                                </defs>

                                <!-- Grid Guidelines -->
                                <line x1="34" y1="45" x2="330" y2="45" class="chart-grid-line" />
                                <text x="24" y="48" text-anchor="end" class="chart-axis-label">6h</text>

                                <line x1="34" y1="80" x2="330" y2="80" class="chart-grid-line" />
                                <text x="24" y="83" text-anchor="end" class="chart-axis-label">4h</text>

                                <line x1="34" y1="115" x2="330" y2="115" class="chart-grid-line" />
                                <text x="24" y="118" text-anchor="end" class="chart-axis-label">2h</text>

                                <line x1="34" y1="150" x2="330" y2="150" stroke="#f1f5f9" stroke-width="1.2" />
                                <text x="24" y="152" text-anchor="end" class="chart-axis-label">0h</text>

                                <!-- Vertical Crosshair (snaps on hover) -->
                                <line id="chartCrosshair" x1="265" y1="25" x2="265" y2="150" class="chart-crosshair" />

                                <!-- Gradient Filled Area under curve -->
                                <path id="chartAreaPath" class="chart-path-area" d="M 42,110 C 60,105 72,94 87,89 C 102,84 117,112 132,119 C 147,126 161,86 176,77 C 191,68 206,101 221,96 C 236,91 250,60 265,54 C 280,48 295,74 310,82 L 310,150 L 42,150 Z" />

                                <!-- Smooth Main Curved Stroke -->
                                <path id="chartLinePath" class="chart-path-line" d="M 42,110 C 60,105 72,94 87,89 C 102,84 117,112 132,119 C 147,126 161,86 176,77 C 191,68 206,101 221,96 C 236,91 250,60 265,54 C 280,48 295,74 310,82" />

                                <!-- Data Points Container (Interactive) -->
                                <g id="chartPointsGroup">
                                    <!-- Sen -->
                                    <g class="chart-point-group" data-index="0">
                                        <circle class="chart-point-outer" cx="42" cy="110" r="0" />
                                        <circle class="chart-point-dot" cx="42" cy="110" r="4.2" />
                                        <circle class="chart-point-hit" cx="42" cy="110" r="16" />
                                    </g>
                                    <!-- Sel -->
                                    <g class="chart-point-group" data-index="1">
                                        <circle class="chart-point-outer" cx="87" cy="89" r="0" />
                                        <circle class="chart-point-dot" cx="87" cy="89" r="4.2" />
                                        <circle class="chart-point-hit" cx="87" cy="89" r="16" />
                                    </g>
                                    <!-- Rab -->
                                    <g class="chart-point-group" data-index="2">
                                        <circle class="chart-point-outer" cx="132" cy="119" r="0" />
                                        <circle class="chart-point-dot" cx="132" cy="119" r="4.2" />
                                        <circle class="chart-point-hit" cx="132" cy="119" r="16" />
                                    </g>
                                    <!-- Kam -->
                                    <g class="chart-point-group" data-index="3">
                                        <circle class="chart-point-outer" cx="176" cy="77" r="0" />
                                        <circle class="chart-point-dot" cx="176" cy="77" r="4.2" />
                                        <circle class="chart-point-hit" cx="176" cy="77" r="16" />
                                    </g>
                                    <!-- Jum -->
                                    <g class="chart-point-group" data-index="4">
                                        <circle class="chart-point-outer" cx="221" cy="96" r="0" />
                                        <circle class="chart-point-dot" cx="221" cy="96" r="4.2" />
                                        <circle class="chart-point-hit" cx="221" cy="96" r="16" />
                                    </g>
                                    <!-- Sab (Peak) -->
                                    <g class="chart-point-group active" data-index="5">
                                        <circle class="chart-point-halo" cx="265" cy="54" r="9" />
                                        <circle class="chart-point-outer" cx="265" cy="54" r="12" fill="rgba(37, 99, 235, 0.2)" />
                                        <circle class="chart-point-dot" cx="265" cy="54" r="5.5" />
                                        <circle class="chart-point-hit" cx="265" cy="54" r="16" />
                                    </g>
                                    <!-- Min -->
                                    <g class="chart-point-group" data-index="6">
                                        <circle class="chart-point-outer" cx="310" cy="82" r="0" />
                                        <circle class="chart-point-dot" cx="310" cy="82" r="4.2" />
                                        <circle class="chart-point-hit" cx="310" cy="82" r="16" />
                                    </g>
                                </g>
                            </svg>
                        </div>

                        <!-- 7 Days Labels -->
                        <div class="chart-labels-row" id="chartLabelsRow">
                            <button type="button" class="day-label-btn" data-index="0">Sen</button>
                            <button type="button" class="day-label-btn" data-index="1">Sel</button>
                            <button type="button" class="day-label-btn" data-index="2">Rab</button>
                            <button type="button" class="day-label-btn" data-index="3">Kam</button>
                            <button type="button" class="day-label-btn" data-index="4">Jum</button>
                            <button type="button" class="day-label-btn peak active" data-index="5">Sab</button>
                            <button type="button" class="day-label-btn" data-index="6">Min</button>
                        </div>

                        <!-- Weekly Goal Progress Bar -->
                        <div class="activity-target-footer">
                            <div class="target-footer-meta">
                                <span class="target-footer-label">
                                    <i data-lucide="target" size="13" style="color: #2563eb;"></i>
                                    <span id="targetFooterLabel">Target Mingguan</span>
                                </span>
                                <span class="target-footer-num">
                                    <span id="targetCurrentVal">24.5</span> / <span id="targetGoalVal">20 Jam</span>
                                    <span id="targetPercentageTag">122% Tercapai 🎉</span>
                                </span>
                            </div>
                            <div class="target-progress-track">
                                <div class="target-progress-fill" id="targetProgressFill" style="width: 100%;"></div>
                            </div>
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

    <!-- Initialize Lucide Icons & Activity Chart -->
    <script>
        lucide.createIcons();

        // --- Activity Chart Interactive Functionality ---
        document.addEventListener('DOMContentLoaded', function() {
            const datasets = {
                this_week: {
                    label: 'Minggu Ini',
                    total: '24h 35m',
                    trend: '18%',
                    trendUp: true,
                    targetBadge: 'Target 20j',
                    avg: '3.5 jam / hari',
                    peak: 'Sabtu (5.5h)',
                    targetLabel: 'Target Mingguan',
                    currentHours: '24.5',
                    goalHours: '20 Jam',
                    percentText: '122% Tercapai 🎉',
                    fillPercent: '100%',
                    peakIndex: 5,
                    days: [
                        { name: 'Senin', short: 'Sen', time: '2 jam 20 menit', tag: 'Awal Minggu', x: 42, y: 110 },
                        { name: 'Selasa', short: 'Sel', time: '3 jam 30 menit', tag: 'Design UI', x: 87, y: 89 },
                        { name: 'Rabu', short: 'Rab', time: '1 jam 50 menit', tag: 'Review Kuis', x: 132, y: 119 },
                        { name: 'Kamis', short: 'Kam', time: '4 jam 15 menit', tag: 'Coding React', x: 176, y: 77 },
                        { name: 'Jumat', short: 'Jum', time: '3 jam 05 menit', tag: 'Mentoring Live', x: 221, y: 96 },
                        { name: 'Sabtu', short: 'Sab', time: '5 jam 30 menit', tag: '🔥 Paling Produktif', x: 265, y: 54 },
                        { name: 'Minggu', short: 'Min', time: '3 jam 55 menit', tag: 'Tugas Akhir', x: 310, y: 82 }
                    ],
                    linePath: 'M 42,110 C 60,105 72,94 87,89 C 102,84 117,112 132,119 C 147,126 161,86 176,77 C 191,68 206,101 221,96 C 236,91 250,60 265,54 C 280,48 295,74 310,82',
                    areaPath: 'M 42,110 C 60,105 72,94 87,89 C 102,84 117,112 132,119 C 147,126 161,86 176,77 C 191,68 206,101 221,96 C 236,91 250,60 265,54 C 280,48 295,74 310,82 L 310,150 L 42,150 Z'
                },
                last_week: {
                    label: 'Minggu Lalu',
                    total: '19h 40m',
                    trend: '8%',
                    trendUp: true,
                    targetBadge: 'Target 20j',
                    avg: '2.8 jam / hari',
                    peak: 'Kamis (4.5h)',
                    targetLabel: 'Target Mingguan',
                    currentHours: '19.7',
                    goalHours: '20 Jam',
                    percentText: '98% Tercapai 👍',
                    fillPercent: '98%',
                    peakIndex: 3,
                    days: [
                        { name: 'Senin', short: 'Sen', time: '1 jam 30 menit', tag: 'Modul Teori', x: 42, y: 124 },
                        { name: 'Selasa', short: 'Sel', time: '2 jam 30 menit', tag: 'Latihan Praktik', x: 87, y: 106 },
                        { name: 'Rabu', short: 'Rab', time: '3 jam 00 menit', tag: 'Studi Kasus', x: 132, y: 98 },
                        { name: 'Kamis', short: 'Kam', time: '4 jam 30 menit', tag: '🔥 Paling Produktif', x: 176, y: 71 },
                        { name: 'Jumat', short: 'Jum', time: '2 jam 30 menit', tag: 'Diskusi Forum', x: 221, y: 106 },
                        { name: 'Sabtu', short: 'Sab', time: '3 jam 15 menit', tag: 'Web Dev Lab', x: 265, y: 94 },
                        { name: 'Minggu', short: 'Min', time: '2 jam 25 menit', tag: 'Evaluasi Mingguan', x: 310, y: 112 }
                    ],
                    linePath: 'M 42,124 C 60,120 72,112 87,106 C 102,100 117,100 132,98 C 147,96 161,77 176,71 C 191,65 206,102 221,106 C 236,110 250,98 265,94 C 280,90 295,108 310,112',
                    areaPath: 'M 42,124 C 60,120 72,112 87,106 C 102,100 117,100 132,98 C 147,96 161,77 176,71 C 191,65 206,102 221,106 C 236,110 250,98 265,94 C 280,90 295,108 310,112 L 310,150 L 42,150 Z'
                },
                this_month: {
                    label: 'Bulan Ini',
                    total: '88h 15m',
                    trend: '24%',
                    trendUp: true,
                    targetBadge: 'Target 80j',
                    avg: '3.1 jam / hari',
                    peak: 'Minggu 3 (26.5h)',
                    targetLabel: 'Target Bulanan',
                    currentHours: '88.2',
                    goalHours: '80 Jam',
                    percentText: '110% Tercapai 🚀',
                    fillPercent: '100%',
                    peakIndex: 5,
                    days: [
                        { name: 'Minggu 1', short: 'M1', time: '20 jam 10 menit', tag: 'Fondasi UI/UX', x: 42, y: 115 },
                        { name: 'Minggu 2', short: 'M2', time: '22 jam 40 menit', tag: 'Wireframing', x: 87, y: 101 },
                        { name: 'Minggu 3', short: 'M3', time: '26 jam 30 menit', tag: 'Sprint Proyek', x: 132, y: 80 },
                        { name: 'Minggu 4', short: 'M4', time: '18 jam 55 menit', tag: 'Review Mentor', x: 176, y: 120 },
                        { name: 'Evaluasi', short: 'Ev', time: '21 jam 20 menit', tag: 'Portofolio', x: 221, y: 105 },
                        { name: 'Puncak', short: 'Pk', time: '28 jam 00 menit', tag: '🔥 Hackathon', x: 265, y: 58 },
                        { name: 'Finis', short: 'Fn', time: '23 jam 40 menit', tag: 'Sertifikasi', x: 310, y: 96 }
                    ],
                    linePath: 'M 42,115 C 60,110 72,105 87,101 C 102,97 117,85 132,80 C 147,75 161,116 176,120 C 191,124 206,109 221,105 C 236,101 250,64 265,58 C 280,52 295,90 310,96',
                    areaPath: 'M 42,115 C 60,110 72,105 87,101 C 102,97 117,85 132,80 C 147,75 161,116 176,120 C 191,124 206,109 221,105 C 236,101 250,64 265,58 C 280,52 295,90 310,96 L 310,150 L 42,150 Z'
                }
            };

            let currentPeriodKey = 'this_week';
            const periodTrigger = document.getElementById('periodTrigger');
            const periodMenu = document.getElementById('periodDropdownMenu');
            const currentPeriodLabel = document.getElementById('currentPeriodLabel');
            const heroTimeVal = document.getElementById('heroTimeVal');
            const heroTrendBadge = document.getElementById('heroTrendBadge');
            const targetBadge = document.getElementById('targetBadge');
            const chipAvgVal = document.getElementById('chipAvgVal');
            const chipPeakVal = document.getElementById('chipPeakVal');
            const chartWrapper = document.getElementById('chartWrapper');
            const chartTooltip = document.getElementById('chartTooltip');
            const tooltipDayName = document.getElementById('tooltipDayName');
            const tooltipTag = document.getElementById('tooltipTag');
            const tooltipTimeVal = document.getElementById('tooltipTimeVal');
            const chartCrosshair = document.getElementById('chartCrosshair');
            const chartLinePath = document.getElementById('chartLinePath');
            const chartAreaPath = document.getElementById('chartAreaPath');
            const chartPointsGroup = document.getElementById('chartPointsGroup');
            const chartLabelsRow = document.getElementById('chartLabelsRow');
            const targetFooterLabel = document.getElementById('targetFooterLabel');
            const targetCurrentVal = document.getElementById('targetCurrentVal');
            const targetGoalVal = document.getElementById('targetGoalVal');
            const targetPercentageTag = document.getElementById('targetPercentageTag');
            const targetProgressFill = document.getElementById('targetProgressFill');

            if (!periodTrigger || !chartWrapper) return;

            // Toggle Period Menu
            periodTrigger.addEventListener('click', function(e) {
                e.stopPropagation();
                periodMenu.classList.toggle('show');
            });

            document.addEventListener('click', function(e) {
                if (!periodTrigger.contains(e.target) && !periodMenu.contains(e.target)) {
                    periodMenu.classList.remove('show');
                }
            });

            // Period Option Selection
            const periodOptions = periodMenu.querySelectorAll('.period-option');
            periodOptions.forEach(opt => {
                opt.addEventListener('click', function(e) {
                    e.stopPropagation();
                    periodOptions.forEach(o => o.classList.remove('active'));
                    this.classList.add('active');
                    const key = this.getAttribute('data-period');
                    if (datasets[key]) {
                        currentPeriodKey = key;
                        currentPeriodLabel.textContent = datasets[key].label;
                        periodMenu.classList.remove('show');
                        renderDataset(datasets[key]);
                    }
                });
            });

            function renderDataset(data) {
                // Update numbers & text
                heroTimeVal.textContent = data.total;
                heroTrendBadge.innerHTML = `<i data-lucide="${data.trendUp ? 'arrow-up' : 'arrow-down'}" size="12"></i> ${data.trend}`;
                if (targetBadge) targetBadge.textContent = data.targetBadge;
                chipAvgVal.textContent = data.avg;
                chipPeakVal.textContent = data.peak;
                targetFooterLabel.textContent = data.targetLabel;
                targetCurrentVal.textContent = data.currentHours;
                targetGoalVal.textContent = data.goalHours;
                targetPercentageTag.textContent = data.percentText;
                targetProgressFill.style.width = data.fillPercent;

                // Update SVG paths
                chartLinePath.setAttribute('d', data.linePath);
                chartAreaPath.setAttribute('d', data.areaPath);

                // Update Points and Day Buttons
                chartPointsGroup.innerHTML = '';
                chartLabelsRow.innerHTML = '';

                data.days.forEach((day, index) => {
                    const isPeak = index === data.peakIndex;
                    
                    // Point group SVG
                    const g = document.createElementNS('http://www.w3.org/2000/svg', 'g');
                    g.setAttribute('class', `chart-point-group ${isPeak ? 'active' : ''}`);
                    g.setAttribute('data-index', index);

                    let innerSvg = '';
                    if (isPeak) {
                        innerSvg += `<circle class="chart-point-halo" cx="${day.x}" cy="${day.y}" r="9" />`;
                        innerSvg += `<circle class="chart-point-outer" cx="${day.x}" cy="${day.y}" r="12" fill="rgba(37, 99, 235, 0.2)" />`;
                        innerSvg += `<circle class="chart-point-dot" cx="${day.x}" cy="${day.y}" r="5.5" />`;
                    } else {
                        innerSvg += `<circle class="chart-point-outer" cx="${day.x}" cy="${day.y}" r="0" />`;
                        innerSvg += `<circle class="chart-point-dot" cx="${day.x}" cy="${day.y}" r="4.2" />`;
                    }
                    innerSvg += `<circle class="chart-point-hit" cx="${day.x}" cy="${day.y}" r="16" />`;
                    g.innerHTML = innerSvg;
                    chartPointsGroup.appendChild(g);

                    // Day button
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = `day-label-btn ${isPeak ? 'peak active' : ''}`;
                    btn.setAttribute('data-index', index);
                    btn.textContent = day.short;
                    chartLabelsRow.appendChild(btn);

                    // Attach events
                    attachHoverEvents(g, index);
                    attachHoverEvents(btn, index);
                });

                if (window.lucide) {
                    lucide.createIcons();
                }

                // Ensure tooltip is hidden by default
                hideTooltip();
            }

            function attachHoverEvents(el, index) {
                el.addEventListener('mouseenter', () => showTooltipForIndex(index));
                el.addEventListener('focus', () => showTooltipForIndex(index));
            }

            function hideTooltip() {
                chartTooltip.classList.remove('visible');
                chartCrosshair.style.opacity = '0';
                
                const data = datasets[currentPeriodKey];
                const allPoints = chartPointsGroup.querySelectorAll('.chart-point-group');
                allPoints.forEach((p, i) => {
                    if (i === data.peakIndex) p.classList.add('active');
                    else p.classList.remove('active');
                });

                const allLabels = chartLabelsRow.querySelectorAll('.day-label-btn');
                allLabels.forEach((l, i) => {
                    if (i === data.peakIndex) l.classList.add('active');
                    else l.classList.remove('active');
                });
            }

            // Hide tooltip when cursor leaves chart or labels row
            chartWrapper.addEventListener('mouseleave', hideTooltip);
            chartLabelsRow.addEventListener('mouseleave', hideTooltip);

            const activityCard = document.querySelector('.activity-card');
            if (activityCard) {
                activityCard.addEventListener('mouseleave', hideTooltip);
            }

            // Global safeguard: if cursor is anywhere outside the chart area, hide tooltip
            document.addEventListener('mousemove', function(e) {
                if (!chartWrapper.contains(e.target) && !chartLabelsRow.contains(e.target)) {
                    if (chartTooltip.classList.contains('visible')) {
                        hideTooltip();
                    }
                }
            });

            function showTooltipForIndex(index) {
                const data = datasets[currentPeriodKey];
                if (!data || !data.days[index]) return;

                const day = data.days[index];

                // Tooltip content
                tooltipDayName.textContent = day.name;
                tooltipTag.textContent = day.tag;
                tooltipTimeVal.textContent = day.time;

                // Position tooltip
                const posX = (day.x / 340) * 100;
                const posY = (day.y / 165) * 100;

                chartTooltip.style.left = `${posX}%`;
                chartTooltip.style.top = `${posY}%`;
                chartTooltip.classList.add('visible');

                // Crosshair position
                chartCrosshair.setAttribute('x1', day.x);
                chartCrosshair.setAttribute('x2', day.x);
                chartCrosshair.style.opacity = '1';

                // Highlight active point & label
                const allPoints = chartPointsGroup.querySelectorAll('.chart-point-group');
                allPoints.forEach((p, i) => {
                    if (i === index) {
                        p.classList.add('active');
                    } else {
                        p.classList.remove('active');
                    }
                });

                const allLabels = chartLabelsRow.querySelectorAll('.day-label-btn');
                allLabels.forEach((l, i) => {
                    if (i === index) {
                        l.classList.add('active');
                    } else {
                        l.classList.remove('active');
                    }
                });
            }

            // Smooth SVG mousemove tracking to snap to nearest day
            const svgEl = chartWrapper.querySelector('.chart-svg');
            if (svgEl) {
                svgEl.addEventListener('mousemove', function(e) {
                    const rect = svgEl.getBoundingClientRect();
                    const mouseX = ((e.clientX - rect.left) / rect.width) * 340;
                    
                    const data = datasets[currentPeriodKey];
                    let closestIdx = 0;
                    let minDist = Infinity;
                    data.days.forEach((d, idx) => {
                        const dist = Math.abs(d.x - mouseX);
                        if (dist < minDist) {
                            minDist = dist;
                            closestIdx = idx;
                        }
                    });
                    showTooltipForIndex(closestIdx);
                });
            }

            // Initial render and hide on load
            renderDataset(datasets[currentPeriodKey]);
            hideTooltip();

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

