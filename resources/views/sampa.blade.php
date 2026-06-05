<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sampa .DEV | The Silicon Valley Engine</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Mono:wght@400;500&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --amber: #f59e0b;
            --amber-dim: rgba(245,158,11,0.12);
            --surface: rgba(255,255,255,0.03);
            --border: rgba(255,255,255,0.08);
            --border-hover: rgba(245,158,11,0.45);
        }

        * { box-sizing: border-box; }

        body {
            background-color: #020617; #FF4F00;  #BA160C; 
            color: #e2e8f0;
            font-family: 'DM Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, .brand {
            font-family: 'Syne', sans-serif;
        }

        .mono { font-family: 'DM Mono', monospace; }

        /* Glass utility */
        .glass {
            background: var(--surface);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border);
        }

        /* Subtle grid background */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(245,158,11,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(245,158,11,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
            z-index: 0;
        }

        /* Nav */
        nav { position: fixed; top: 0; left: 0; right: 0; z-index: 100; padding: 1rem 1.5rem; }
        .nav-inner {
            max-width: 80rem;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
        }

        .brand { font-size: 1.35rem; font-weight: 800; letter-spacing: -0.04em; }
        .brand span { color: var(--amber); }

        /* Desktop nav links */
        .nav-links { display: none; gap: 2rem; }
        @media (min-width: 768px) { .nav-links { display: flex; align-items: center; } }

        .nav-link {
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.2s;
        }
        .nav-link:hover { color: #fff; }

        /* Dropdown */
        .dropdown { position: relative; }
        .dropdown-trigger {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #94a3b8;
            transition: color 0.2s;
            padding: 0;
            font-family: 'DM Sans', sans-serif;
        }
        .dropdown-trigger:hover { color: var(--amber); }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: calc(100% + 4px); /* tighter gap */
            width: 11rem;
            border-radius: 0.75rem;
            padding: 0.5rem;
            z-index: 200;
        }
        /* Invisible bridge fills the gap so mouse can travel from trigger → menu */
        .dropdown-menu::before {
            content: '';
            position: absolute;
            top: -8px;
            left: 0;
            right: 0;
            height: 8px;
        }
        .dropdown-menu.open { display: block; }

        .dropdown-item {
            display: block;
            padding: 0.6rem 0.75rem;
            font-size: 0.8rem;
            color: #94a3b8;
            text-decoration: none;
            border-radius: 0.4rem;
            transition: background 0.15s, color 0.15s;
        }
        .dropdown-item:hover { background: var(--amber-dim); color: var(--amber); }

        /* Hamburger */
        .hamburger {
            display: flex;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
        }
        @media (min-width: 768px) { .hamburger { display: none; } }

        .hamburger span {
            display: block;
            width: 22px;
            height: 2px;
            background: #e2e8f0;
            border-radius: 2px;
            transition: transform 0.3s, opacity 0.3s, width 0.3s;
            transform-origin: center;
        }
        .hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        .hamburger.open span:nth-child(2) { opacity: 0; width: 0; }
        .hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

        /* Mobile menu */
        .mobile-menu {
            display: none;
            position: absolute;
            top: calc(100% + 8px);
            left: 1.5rem;
            right: 1.5rem;
            border-radius: 1.25rem;
            padding: 1.5rem;
            flex-direction: column;
            gap: 0.25rem;
            z-index: 99;
            animation: slideDown 0.2s ease;
        }
        .mobile-menu.open { display: flex; }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-8px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .mobile-link {
            display: block;
            padding: 0.65rem 0.75rem;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: #94a3b8;
            text-decoration: none;
            border-radius: 0.5rem;
            transition: background 0.15s, color 0.15s;
        }
        .mobile-link:hover { background: var(--amber-dim); color: var(--amber); }

        .mobile-divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 0.5rem 0;
        }

        .mobile-section-label {
            font-size: 0.6rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #475569;
            padding: 0 0.75rem;
            margin-bottom: 0.25rem;
        }

        /* Hero */
        .hero { padding: 8rem 0.5rem 5rem; text-align: center; position: relative; z-index: 1;  margin: 0 auto; max-width: 80rem; }

        .hero h1 {
            font-size: clamp(2.5rem, 8vw, 5.5rem); 
            font-weight: 800;
            letter-spacing: -0.04em;
            line-height: 1.0;
            margin-bottom: 1.25rem;
        }
        .hero h1 .accent { color: var(--amber); }

        .hero-sub {
            color: #64748b;
            max-width: 32rem;
            margin: 0 auto 0.75rem;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-family: 'DM Mono', monospace;
            font-size: 0.65rem;
            letter-spacing: 0.08em;
            color: var(--amber);
            background: var(--amber-dim);
            border: 1px solid rgba(245,158,11,0.25);
            padding: 0.35rem 0.75rem;
            border-radius: 9999px;
            margin-bottom: 1.5rem;
        }
        .hero-badge::before { content: '●'; font-size: 0.5rem; animation: pulse 2s infinite; }
        @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.3} }

        /* Layout */
        .main-grid {
            max-width: 80rem;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            position: relative;
            z-index: 1;
        }
        @media (min-width: 768px) {
            .main-grid { grid-template-columns: 260px 1fr; }
        }

        /* Sidebar */
        .sidebar { border-radius: 1rem; padding: 1.5rem; height: fit-content; }

        .sidebar h3 {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #94a3b8;
            margin-bottom: 1.25rem;
        }

        .filter-group { margin-bottom: 1.5rem; }

        .filter-group-label {
            font-size: 0.6rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #475569;
            margin-bottom: 0.5rem;
        }

        .filter-label {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.5rem 0;
            cursor: pointer;
            font-size: 0.82rem;
            color: #94a3b8;
            transition: color 0.15s;
            user-select: none;
            border-radius: 0.4rem;
        }
        .filter-label:hover { color: #e2e8f0; }

        .filter-label input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            width: 14px;
            height: 14px;
            border: 1.5px solid #334155;
            border-radius: 3px;
            cursor: pointer;
            transition: background 0.15s, border-color 0.15s;
            flex-shrink: 0;
            position: relative;
        }
        .filter-label input[type="checkbox"]:checked {
            background: var(--amber);
            border-color: var(--amber);
        }
        .filter-label input[type="checkbox"]:checked::after {
            content: '';
            position: absolute;
            left: 3px;
            top: 1px;
            width: 5px;
            height: 8px;
            border: 2px solid #020617;
            border-top: none;
            border-left: none;
            transform: rotate(40deg);
        }
        .filter-label input:checked ~ span { color: #e2e8f0; }

        .filter-count {
            margin-left: auto;
            font-size: 0.6rem;
            font-family: 'DM Mono', monospace;
            background: rgba(255,255,255,0.05);
            padding: 0.1rem 0.4rem;
            border-radius: 9999px;
            color: #475569;
        }

        .clear-btn {
            font-size: 0.65rem;
            font-family: 'DM Mono', monospace;
            color: #475569;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            transition: color 0.2s;
        }
        .clear-btn:hover { color: var(--amber); }

        /* Job cards */
        #jobs-list { display: flex; flex-direction: column; gap: 0.75rem; }

        .job-card {
            border-radius: 0.875rem;
            padding: 1.25rem 1.5rem;
            cursor: pointer;
            transition: border-color 0.2s, transform 0.15s, background 0.2s;
            text-decoration: none;
            display: block;
        }
        .job-card:hover {
            border-color: var(--border-hover);
            background: rgba(245,158,11,0.04);
            transform: translateY(-1px);
        }

        .job-card[data-hidden="true"] { display: none; }

        .job-header { display: flex; justify-content: space-between; align-items: flex-start; gap: 1rem; }

        .job-title { font-size: 1rem; font-weight: 700; line-height: 1.3; color: #e2e8f0; }

        .job-badge {
            font-size: 0.55rem;
            font-family: 'DM Mono', monospace;
            font-weight: 500;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.25rem 0.6rem;
            border-radius: 9999px;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .badge-new { background: rgba(34,197,94,0.12); color: #4ade80; border: 1px solid rgba(34,197,94,0.2); }
        .badge-hot { background: rgba(239,68,68,0.12); color: #f87171; border: 1px solid rgba(239,68,68,0.2); }
        .badge-featured { background: var(--amber-dim); color: var(--amber); border: 1px solid rgba(245,158,11,0.25); }

        .job-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 0.6rem;
            flex-wrap: wrap;
        }

        .job-tag {
            font-size: 0.65rem;
            font-family: 'DM Mono', monospace;
            color: #475569;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }
        .job-tag.highlight { color: var(--amber); }

        .job-category-tag {
            font-size: 0.6rem;
            padding: 0.15rem 0.5rem;
            border-radius: 9999px;
            background: rgba(255,255,255,0.04);
            border: 1px solid var(--border);
            color: #64748b;
            font-family: 'DM Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .no-results {
            display: none;
            text-align: center;
            padding: 3rem 1rem;
            color: #475569;
        }
        .no-results.visible { display: block; }

        /* Spotlight */
        .spotlight-section {
            max-width: 80rem;
            margin: 4rem auto 0;
            padding: 0 1.5rem 5rem;
            position: relative;
            z-index: 1;
        }

        .section-eyebrow {
            font-size: 0.6rem;
            font-family: 'DM Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--amber);
            margin-bottom: 0.5rem;
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            margin-bottom: 1.5rem;
        }

        .spotlight-card {
            border-radius: 1.5rem;
            overflow: hidden;
        }

        .spotlight-inner {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0;
        }
        @media (min-width: 768px) {
            .spotlight-inner { grid-template-columns: 280px 1fr; }
        }

        .spotlight-visual {
            background: linear-gradient(135deg, #1e3a5f 0%, #0f2040 50%, #1a1a2e 100%);
            min-height: 240px;
            position: relative;
            display: flex;
            align-items: flex-end;
            padding: 1.5rem;
            overflow: hidden;
        }

        .spotlight-visual::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 60% 40%, rgba(245,158,11,0.15) 0%, transparent 60%);
        }

        .spotlight-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--amber) 0%, #d97706 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Syne', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: #020617;
            position: relative;
            z-index: 1;
            border: 3px solid rgba(245,158,11,0.4);
            box-shadow: 0 0 30px rgba(245,158,11,0.2);
        }

        .spotlight-node-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 0.55rem;
            font-family: 'DM Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--amber);
            background: var(--amber-dim);
            border: 1px solid rgba(245,158,11,0.25);
            padding: 0.25rem 0.6rem;
            border-radius: 9999px;
            z-index: 1;
        }

        .spotlight-content {
            padding: 2rem 2rem 2rem 2rem;
        }

        .spotlight-role {
            font-size: 0.6rem;
            font-family: 'DM Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--amber);
            margin-bottom: 0.25rem;
        }

        .spotlight-name {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            line-height: 1.1;
            margin-bottom: 0.25rem;
        }

        .spotlight-handle {
            font-size: 0.7rem;
            font-family: 'DM Mono', monospace;
            color: #475569;
            margin-bottom: 1rem;
        }

        .spotlight-quote {
            font-size: 0.9rem;
            color: #94a3b8;
            line-height: 1.6;
            border-left: 2px solid var(--amber);
            padding-left: 1rem;
            margin-bottom: 1.25rem;
            font-style: italic;
        }

        .spotlight-stats {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .stat { display: flex; flex-direction: column; gap: 0.1rem; }
        .stat-value {
            font-family: 'Syne', sans-serif;
            font-size: 1.25rem;
            font-weight: 800;
            color: #e2e8f0;
        }
        .stat-label {
            font-size: 0.6rem;
            font-family: 'DM Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #475569;
        }

        .spotlight-tags {
            display: flex;
            gap: 0.4rem;
            flex-wrap: wrap;
            margin-bottom: 1.5rem;
        }
        .spotlight-tag {
            font-size: 0.6rem;
            font-family: 'DM Mono', monospace;
            padding: 0.25rem 0.6rem;
            border-radius: 9999px;
            background: rgba(255,255,255,0.04);
            border: 1px solid var(--border);
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .spotlight-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.72rem;
            font-weight: 700;
            font-family: 'DM Sans', sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #020617;
            background: var(--amber);
            padding: 0.6rem 1.1rem;
            border-radius: 9999px;
            text-decoration: none;
            transition: background 0.2s, transform 0.15s;
        }
        .spotlight-cta:hover { background: #fbbf24; transform: translateY(-1px); }

        /* Footer */
        footer {
            max-width: 80rem;
            margin: 0 auto;
            padding: 2rem 1.5rem;
            border-top: 1px solid #0f172a;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            position: relative;
            z-index: 1;
        }

        .footer-copy {
            font-size: 0.6rem;
            font-family: 'DM Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #1e293b;
        }

        .footer-nodes {
            display: flex;
            gap: 1.5rem;
        }
        .footer-node {
            font-size: 0.6rem;
            font-family: 'DM Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #334155;
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer-node:hover { color: var(--amber); }
    </style>
</head>
<body>

{{-- ───────────────── NAV ───────────────── --}}
<nav>
    <div class="nav-inner glass" id="nav-inner">
        <a href="/" class="brand">SAMPA<span>.DEV</span></a>

        {{-- Desktop --}}
        <div class="nav-links">
            <a href="#jobs" class="nav-link">Jobs</a>
            <a href="#spotlight" class="nav-link">Spotlight</a>
            <div class="dropdown">
                <button class="dropdown-trigger nav-link">Global Nodes ↓</button>
                <div class="dropdown-menu glass">
                    <a href="https://newyork.dev" class="dropdown-item">The Bay</a>
                    <a href="https://gdansk.dev" class="dropdown-item">The PNW</a>
                    <a href="https://newyork.dev" class="dropdown-item">New York</a>
                    <a href="https://austintx.dev" class="dropdown-item">Austin</a>
                        <a href="https://gdansk.dev" class="dropdown-item">Washington DC</a>
                        <a href="https://gdansk.dev" class="dropdown-item">Ontario</a>
                    <a href="https://bengaluru.dev" class="dropdown-item">Bengaluru</a>
                     <a href="https://bengaluru.dev" class="dropdown-item">New Delhi</a>
                    <a href="https://gdansk.dev" class="dropdown-item">Gdansk</a>
                     <a href="https://gdansk.dev" class="dropdown-item">Bucharest</a>
                     <a href="https://gdansk.dev" class="dropdown-item">SAMPA</a>
                     <a href="https://gdansk.dev" class="dropdown-item">Mexico City</a>
                     <a href="https://gdansk.dev" class="dropdown-item">Buenos Aires</a>
                  
                       
                        <a href="https://gdansk.dev" class="dropdown-item">HCMC</a>
                </div>
            </div>
        </div>

        {{-- Hamburger --}}
        <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    {{-- Mobile menu —— sibling of nav-inner so it drops below it --}}
    <div class="mobile-menu glass" id="mobile-menu" role="dialog" aria-label="Navigation">
        <a href="#jobs"      class="mobile-link" data-close-menu>Jobs</a>
        <a href="#spotlight" class="mobile-link" data-close-menu>Spotlight</a>
        <hr class="mobile-divider">
        <p class="mobile-section-label">Global Nodes</p>
        <a href="https://newyork.dev"   class="mobile-link">New York</a>
        <a href="https://austintx.dev"  class="mobile-link">Austin</a>
        <a href="https://bengaluru.dev" class="mobile-link">Bengaluru</a>
        <a href="https://gdansk.dev"    class="mobile-link">Gdańsk</a>
    </div>
</nav>

{{-- ───────────────── HERO ───────────────── --}}
<section class="hero">
    
    <h1>THE CENTER OF <span class="accent">SCALE</span>.</h1>
    <p class="hero-sub"> Connecting world-class talent to sampa 's most ambitious companies.</p>
</section>



{{-- ───────────────── MAIN GRID ───────────────── --}}
<div class="main-grid">

    {{-- Sidebar / Filters --}} 
    <aside class="sidebar glass"> <div class="hero-badge">Live · Over 4 open roles</div>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.25rem;">


            
            <h3 style="margin:0;">Filter</h3>
            <button class="clear-btn" id="clear-filters">Clear all</button>
        </div>

        <div class="filter-group">
            <p class="filter-group-label">Category</p>
            <label class="filter-label">
                <input type="checkbox" value="ai-ml" data-filter="category">
                <span>AI & ML</span>
                <span class="filter-count">4</span>
            </label>
            <label class="filter-label">
                <input type="checkbox" value="cloud" data-filter="category">
                <span>Cloud Native</span>
                <span class="filter-count">3</span>
            </label>
            <label class="filter-label">
                <input type="checkbox" value="fintech" data-filter="category">
                <span>Fintech</span>
                <span class="filter-count">2</span>
            </label>
            <label class="filter-label">
                <input type="checkbox" value="backend" data-filter="category">
                <span>Backend</span>
                <span class="filter-count">3</span>
            </label>
            <label class="filter-label">
                <input type="checkbox" value="devops" data-filter="category">
                <span>DevOps</span>
                <span class="filter-count">2</span>
            </label>
        </div>

        <div class="filter-group">
            <p class="filter-group-label">Work Type</p>
            <label class="filter-label">
                <input type="checkbox" value="remote" data-filter="type">
                <span>Remote</span>
            </label>
            <label class="filter-label">
                <input type="checkbox" value="hybrid" data-filter="type">
                <span>Hybrid</span>
            </label>
            <label class="filter-label">
                <input type="checkbox" value="onsite" data-filter="type">
                <span>On-site</span>
            </label>
        </div>

        <div class="filter-group">
            <p class="filter-group-label">Seniority</p>
            <label class="filter-label">
                <input type="checkbox" value="senior" data-filter="seniority">
                <span>Senior</span>
            </label>
            <label class="filter-label">
                <input type="checkbox" value="staff" data-filter="seniority">
                <span>Staff</span>
            </label>
            <label class="filter-label">
                <input type="checkbox" value="principal" data-filter="seniority">
                <span>Principal</span>
            </label>
        </div>
    </aside>

    {{-- Job Listings --}}
    <section id="jobs">

        @php
        $jobs = [
            [
                'title'     => 'Senior Laravel Engineer',
                'company'   => 'Stripe',
                'location'  => 'San Francisco',
                'type'      => 'hybrid',
                'seniority' => 'senior',
                'category'  => 'backend',
                'salary'    => '$180k–$240k',
                'badge'     => 'hot',
                'badge_label' => 'Hot',
                'posted'    => '2d ago',
            ],
            [
                'title'     => 'Staff Machine Learning Engineer',
                'company'   => 'OpenAI',
                'location'  => 'San Francisco',
                'type'      => 'hybrid',
                'seniority' => 'staff',
                'category'  => 'ai-ml',
                'salary'    => '$280k–$380k',
                'badge'     => 'featured',
                'badge_label' => 'Featured',
                'posted'    => '1d ago',
            ],
            [
                'title'     => 'Principal Cloud Architect',
                'company'   => 'Vercel',
                'location'  => 'Remote',
                'type'      => 'remote',
                'seniority' => 'principal',
                'category'  => 'cloud',
                'salary'    => '$220k–$290k',
                'badge'     => 'new',
                'badge_label' => 'New',
                'posted'    => '5h ago',
            ],
            [
                'title'     => 'Senior AI Research Engineer',
                'company'   => 'Anthropic',
                'location'  => 'San Francisco',
                'type'      => 'hybrid',
                'seniority' => 'senior',
                'category'  => 'ai-ml',
                'salary'    => '$260k–$340k',
                'badge'     => 'featured',
                'badge_label' => 'Featured',
                'posted'    => '3d ago',
            ],
            [
                'title'     => 'Staff Fintech Backend Engineer',
                'company'   => 'Brex',
                'location'  => 'San Francisco',
                'type'      => 'hybrid',
                'seniority' => 'staff',
                'category'  => 'fintech',
                'salary'    => '$200k–$260k',
                'badge'     => 'new',
                'badge_label' => 'New',
                'posted'    => '1d ago',
            ],
            [
                'title'     => 'Senior DevOps / Platform Engineer',
                'company'   => 'Cloudflare',
                'location'  => 'Remote',
                'type'      => 'remote',
                'seniority' => 'senior',
                'category'  => 'devops',
                'salary'    => '$170k–$220k',
                'badge'     => null,
                'badge_label' => null,
                'posted'    => '4d ago',
            ],
            [
                'title'     => 'Principal ML Infrastructure Engineer',
                'company'   => 'Google DeepMind',
                'location'  => 'Mountain View',
                'type'      => 'onsite',
                'seniority' => 'principal',
                'category'  => 'ai-ml',
                'salary'    => '$300k–$420k',
                'badge'     => 'hot',
                'badge_label' => 'Hot',
                'posted'    => '6h ago',
            ],
            [
                'title'     => 'Senior Cloud Security Engineer',
                'company'   => 'HashiCorp',
                'location'  => 'Remote',
                'type'      => 'remote',
                'seniority' => 'senior',
                'category'  => 'cloud',
                'salary'    => '$190k–$240k',
                'badge'     => null,
                'badge_label' => null,
                'posted'    => '5d ago',
            ],
        ];
        @endphp

        <div id="jobs-list">
            @foreach($jobs as $job)
            <a href="#"
               class="job-card glass"
               data-category="{{ $job['category'] }}"
               data-type="{{ $job['type'] }}"
               data-seniority="{{ $job['seniority'] }}">

                <div class="job-header">
                    <div>
                        <div class="job-title">{{ $job['title'] }}</div>
                        <div class="job-meta">
                            <span class="job-tag highlight">{{ $job['company'] }}</span>
                            <span class="job-tag">📍 {{ $job['location'] }}</span>
                            <span class="job-tag">💰 {{ $job['salary'] }}</span>
                            <span class="job-tag">🕐 {{ $job['posted'] }}</span>
                        </div>
                    </div>
                    @if($job['badge'])
                    <span class="job-badge badge-{{ $job['badge'] }}">{{ $job['badge_label'] }}</span>
                    @endif
                </div>

                <div style="margin-top:0.75rem;display:flex;gap:0.4rem;flex-wrap:wrap;">
                    <span class="job-category-tag">{{ $job['category'] }}</span>
                    <span class="job-category-tag">{{ $job['type'] }}</span>
                    <span class="job-category-tag">{{ $job['seniority'] }}</span>
                </div>
            </a>
            @endforeach
        </div>

        <div class="no-results" id="no-results">
            <p style="font-size:2rem;margin-bottom:0.5rem;">🔍</p>
            <p style="font-weight:700;margin-bottom:0.25rem;color:#e2e8f0;">No matches found</p>
            <p style="font-size:0.8rem;">Try adjusting your filters.</p>
        </div>
    </section>
</div>

{{-- ───────────────── SPOTLIGHT ───────────────── --}}
<section id="spotlight" class="spotlight-section">
    <p class="section-eyebrow">// Talent Spotlight</p>
    <h2 class="section-title">The People Behind The Scale.</h2>

    <div class="spotlight-card glass">
        <div class="spotlight-inner">

            {{-- Visual panel --}}
            <div class="spotlight-visual">
                <span class="spotlight-node-badge">BLR ↔ BAY</span>
                <div class="spotlight-avatar">SC</div>
            </div>

            {{-- Content panel --}}
            <div class="spotlight-content">
                <p class="spotlight-role">Engineering Leader · Distributed Systems</p>
                <h3 class="spotlight-name">"The Bridge Architect"</h3>
                <p class="spotlight-handle">@sarahchen · sampa .dev/sarah-chen</p>

                <blockquote class="spotlight-quote">
                    "The gap between Bay Area ambition and Bengaluru execution isn't a timezone problem — it's a trust infrastructure problem. We solved it."
                </blockquote>

                <div class="spotlight-stats">
                    <div class="stat">
                        <span class="stat-value">200+</span>
                        <span class="stat-label">Engineers Led</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value">2</span>
                        <span class="stat-label">Nodes</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value">4×</span>
                        <span class="stat-label">Team Growth</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value">$1.2B</span>
                        <span class="stat-label">ARR Impact</span>
                    </div>
                </div>

                <div class="spotlight-tags">
                    <span class="spotlight-tag">Distributed Systems</span>
                    <span class="spotlight-tag">Team Scaling</span>
                    <span class="spotlight-tag">Cross-Timezone</span>
                    <span class="spotlight-tag">Platform Eng</span>
                    <span class="spotlight-tag">Ex-Google</span>
                </div>

                <a href="#" class="spotlight-cta">Read Full Story →</a>
            </div>
        </div>
    </div>
</section>

{{-- ───────────────── FOOTER ───────────────── --}}
<footer>
    <span class="footer-copy">© 2026 sampa .DEV — The Silicon Valley Engine</span>
    <div class="footer-nodes">
        <a href="https://newyork.dev"   class="footer-node">NewYork</a>
        <a href="https://austintx.dev"  class="footer-node">AustinTX</a>
        <a href="https://bengaluru.dev" class="footer-node">Bengaluru</a>
        <a href="https://gdansk.dev"    class="footer-node">Gdansk</a>
    </div>
</footer>

<script>
// ─── Desktop Dropdown ───────────────────────────────────────────
const dropdown     = document.querySelector('.dropdown');
const dropdownMenu = document.querySelector('.dropdown-menu');
let   leaveTimer   = null;

function openDropdown() {
    clearTimeout(leaveTimer);
    dropdownMenu.classList.add('open');
}
function closeDropdown() {
    leaveTimer = setTimeout(() => dropdownMenu.classList.remove('open'), 120);
}

dropdown.addEventListener('mouseenter', openDropdown);
dropdown.addEventListener('mouseleave', closeDropdown);
dropdownMenu.addEventListener('mouseenter', openDropdown);
dropdownMenu.addEventListener('mouseleave', closeDropdown);

document.addEventListener('click', (e) => {
    if (!dropdown.contains(e.target)) dropdownMenu.classList.remove('open');
});

// ─── Mobile Menu ────────────────────────────────────────────────
const hamburger  = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobile-menu');

function openMenu() {
    mobileMenu.classList.add('open');
    hamburger.classList.add('open');
    hamburger.setAttribute('aria-expanded', 'true');
}
function closeMenu() {
    mobileMenu.classList.remove('open');
    hamburger.classList.remove('open');
    hamburger.setAttribute('aria-expanded', 'false');
}
function toggleMenu() {
    mobileMenu.classList.contains('open') ? closeMenu() : openMenu();
}

hamburger.addEventListener('click', (e) => { e.stopPropagation(); toggleMenu(); });

// Close on nav link click
document.querySelectorAll('[data-close-menu]').forEach(link => {
    link.addEventListener('click', closeMenu);
});

// Close on outside click
document.addEventListener('click', (e) => {
    if (mobileMenu.classList.contains('open') &&
        !mobileMenu.contains(e.target) &&
        !hamburger.contains(e.target)) {
        closeMenu();
    }
});

// Close on Escape
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeMenu();
});

// ─── Filter Logic ────────────────────────────────────────────────
const filterInputs = document.querySelectorAll('[data-filter]');
const jobCards     = document.querySelectorAll('.job-card');
const noResults    = document.getElementById('no-results');
const clearBtn     = document.getElementById('clear-filters');

function getActiveFilters() {
    const active = { category: [], type: [], seniority: [] };
    filterInputs.forEach(input => {
        if (input.checked) active[input.dataset.filter].push(input.value);
    });
    return active;
}

function applyFilters() {
    const { category, type, seniority } = getActiveFilters();
    let visibleCount = 0;

    jobCards.forEach(card => {
        const matchCat      = category.length  === 0 || category.includes(card.dataset.category);
        const matchType     = type.length      === 0 || type.includes(card.dataset.type);
        const matchSeniority = seniority.length === 0 || seniority.includes(card.dataset.seniority);

        const visible = matchCat && matchType && matchSeniority;
        card.dataset.hidden = visible ? 'false' : 'true';
        if (visible) visibleCount++;
    });

    noResults.classList.toggle('visible', visibleCount === 0);
}

filterInputs.forEach(input => input.addEventListener('change', applyFilters));

clearBtn.addEventListener('click', () => {
    filterInputs.forEach(input => input.checked = false);
    applyFilters();
});
</script>

</body>
</html>