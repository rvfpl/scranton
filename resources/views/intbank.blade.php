<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NewYork.dev — The Developer's Record. Infrastructure, code culture, and tech dispatches from the city that never deploys.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'NewYork.dev | The Developer\'s Record')</title>

    {{-- Fonts: Playfair Display for editorial weight, Lora for body serif, JetBrains Mono for code --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Lora:ital,wght@0,400;0,600;1,400&family=JetBrains+Mono:wght@400;600&family=Barlow+Condensed:wght@600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ─── Design Tokens ─────────────────────────────── */
        :root {
            --ink:       #0d0d0d;
            --ink-soft:  #2a2a2a;
            --muted:     #6b6b6b;
            --rule:      #d4cfc8;
            --cream:     #faf8f5;
            --accent:    #C0362C;  /* NYT-classic red  #c41230; */
            --accent-dk: #8b0c21;
            --code-bg:   #f4f1ed;
            --gold:      #b8860b;
        }

        /* ─── Base ───────────────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Lora', Georgia, serif;
            background: var(--cream);
            color: var(--ink);
            -webkit-font-smoothing: antialiased;
        }

        /* ─── Breaking-news ticker ───────────────────────── */
        .ticker-wrap {
            background: var(--ink);
            color: #fff;
            overflow: hidden;
            height: 32px;
            display: flex;
            align-items: center;
        }
        .ticker-label {
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 700;
            font-size: 11px;
            letter-spacing: 0.12em;
            background: var(--accent);
            padding: 0 14px;
            height: 100%;
            display: flex;
            align-items: center;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .ticker-track {
            display: flex;
            animation: ticker 38s linear infinite;
            white-space: nowrap;
            padding-left: 24px;
        }
        .ticker-track span {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 12px;
            letter-spacing: 0.04em;
            padding-right: 64px;
            opacity: 0.9;
        }
        .ticker-track span::before {
            content: '//';
            color: var(--accent);
            margin-right: 10px;
            font-weight: 700;
        }
        @keyframes ticker {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* ─── Top utility bar ────────────────────────────── */
        .util-bar {
            border-bottom: 1px solid var(--rule);
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.08em;
            color: var(--muted);
            background: var(--cream);
        }

        /* ─── Masthead ───────────────────────────────────── */
        .masthead {
            border-bottom: 3px double var(--ink);
            padding: 16px 0 12px;
            background: var(--cream);
            position: sticky;
            top: 0;
            z-index: 50;
            transition: box-shadow 0.2s;
        }
        .masthead.scrolled {
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
        }

        .logo {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 900;
            font-size: clamp(28px, 4vw, 44px);
            letter-spacing: -0.03em;
            color: var(--ink);
            text-decoration: none;
            line-height: 1;
        }
 .logo2 {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 900;
            font-size: clamp(18px, 3vw, 24px);
            letter-spacing: -0.03em;
            color: var(--ink);
            text-decoration: none;
            line-height: 1;
        }


.logo2 .tld {
            color: var(--accent);
        }
        .logo .tld {
            color: var(--accent);
        }
        .logo-sub {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 10px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--muted);
            text-align: center;
            margin-top: 2px;
        }

        /* ─── Primary nav ────────────────────────────────── */
        .primary-nav {
            border-top: 1px solid var(--rule);
            border-bottom: 1px solid var(--rule);
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.1em;
        }
        .primary-nav a {
            color: var(--ink);
            text-decoration: none;
            padding: 8px 14px;
            display: inline-flex;
            align-items: center;
            transition: color 0.15s;
            white-space: nowrap;
        }
        .primary-nav a:hover { color: var(--accent); }
        .primary-nav a.active { color: var(--accent); border-bottom: 2px solid var(--accent); }

        /* ─── Hamburger ──────────────────────────────────── */
        .hamburger {
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px;
            display: flex;
            flex-direction: column;
            gap: 5px;
            justify-content: center;
            align-items: center;
        }
        .hamburger span {
            display: block;
            width: 22px;
            height: 1.5px;
            background: var(--ink);
            transition: transform 0.25s, opacity 0.25s, width 0.25s;
            transform-origin: center;
        }
        .hamburger.open span:nth-child(1) { transform: translateY(6.5px) rotate(45deg); }
        .hamburger.open span:nth-child(2) { opacity: 0; width: 0; }
        .hamburger.open span:nth-child(3) { transform: translateY(-6.5px) rotate(-45deg); }

        /* ─── Mobile drawer ──────────────────────────────── */
        .mobile-drawer {
            position: fixed;
            inset: 0;
            z-index: 100;
            pointer-events: none;
        }
        .drawer-overlay {
            position: absolute;
            inset: 0;
            background: rgba(13,13,13,0);
            transition: background 0.3s;
        }
        .drawer-panel {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: min(340px, 88vw);
            background: var(--cream);
            border-right: 2px solid var(--ink);
            transform: translateX(-100%);
            transition: transform 0.32s cubic-bezier(0.4,0,0.2,1);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        .mobile-drawer.open {
            pointer-events: all;
        }
        .mobile-drawer.open .drawer-overlay {
            background: rgba(13,13,13,0.55);
        }
        .mobile-drawer.open .drawer-panel {
            transform: translateX(0);
        }
        .drawer-header {
            border-bottom: 1px solid var(--rule);
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .drawer-nav a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 16px;
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 700;
            font-size: 16px;
            letter-spacing: 0.08em;
            color: var(--ink);
            text-decoration: none;
            border-bottom: 1px solid var(--rule);
            transition: background 0.12s, color 0.12s;
        }
        .drawer-nav a:hover {
            background: rgba(196,18,48,0.04);
            color: var(--accent);
        }
        .drawer-nav .arrow {
            font-size: 14px;
            opacity: 0.4;
        }

        /* ─── Edition badge ──────────────────────────────── */
        .edition-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.14em;
            color: var(--accent);
            border: 1px solid var(--accent);
            padding: 3px 10px;
        }

        /* ─── Section rule labels ────────────────────────── */
        .section-label {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--muted);
        }
        .section-label.red { color: var(--accent); }

        /* ─── Headlines ──────────────────────────────────── */
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', Georgia, serif;
            line-height: 1.15;
        }
        .hed-xl {
            font-size: clamp(32px, 4.5vw, 56px);
            font-weight: 900;
            letter-spacing: -0.02em;
            line-height: 1.08;
        }
        .hed-lg {
            font-size: clamp(22px, 3vw, 32px);
            font-weight: 700;
        }
        .hed-md {
            font-size: clamp(18px, 2vw, 22px);
            font-weight: 700;
        }
        .hed-sm {
            font-size: 17px;
            font-weight: 700;
        }

        /* ─── Byline / dateline ──────────────────────────── */
        .byline {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 12px;
            letter-spacing: 0.06em;
            color: var(--muted);
        }
        .byline strong { color: var(--ink-soft); }

        /* ─── Body copy ──────────────────────────────────── */
        .copy {
            font-size: 16px;
            line-height: 1.78;
            color: var(--ink-soft);
        }
        .copy-sm {
            font-size: 14px;
            line-height: 1.65;
            color: var(--ink-soft);
        }

        /* ─── Rule dividers ──────────────────────────────── */
        .rule { border: none; border-top: 1px solid var(--rule); }
        .rule-bold { border: none; border-top: 2px solid var(--ink); }
        .rule-double { border: none; border-top: 3px double var(--ink); }

        /* ─── Card: article ──────────────────────────────── */
        .article-card {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .article-card a.headline-link {
            text-decoration: none;
            color: inherit;
            transition: color 0.15s;
        }
        .article-card a.headline-link:hover { color: var(--accent); }

        /* ─── Lead image ─────────────────────────────────── */
        .lead-img {
            width: 100%;
            aspect-ratio: 16/9;
            object-fit: cover;
            display: block;
            filter: grayscale(12%) contrast(1.04);
            transition: filter 0.3s;
        }
        .lead-img:hover { filter: grayscale(0%) contrast(1); }

        /* ─── Inline code / tech pill ────────────────────── */
        .tech-tag {
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            font-weight: 600;
            background: var(--code-bg);
            border: 1px solid var(--rule);
            color: var(--ink-soft);
            padding: 2px 7px;
            border-radius: 2px;
        }
        .tech-tag.hot {
            background: rgba(196,18,48,0.08);
            border-color: rgba(196,18,48,0.25);
            color: var(--accent-dk);
        }

        /* ─── Subscribe CTA ──────────────────────────────── */
        .btn-subscribe {
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 700;
            font-size: 11px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            background: var(--ink);
            color: #fff;
            border: none;
            padding: 8px 18px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.15s;
            display: inline-block;
        }
        .btn-subscribe:hover { background: var(--accent); }
        .btn-subscribe.outline {
            background: transparent;
            color: var(--ink);
            border: 1.5px solid var(--ink);
        }
        .btn-subscribe.outline:hover {
            background: var(--ink);
            color: #fff;
        }

        /* ─── Search bar (desktop) ───────────────────────── */
        .search-wrapper { position: relative; }
        .search-input {
            font-family: 'Lora', serif;
            font-size: 13px;
            border: none;
            border-bottom: 1.5px solid var(--ink);
            background: transparent;
            padding: 4px 28px 4px 4px;
            width: 160px;
            outline: none;
            color: var(--ink);
            transition: width 0.25s;
        }
        .search-input:focus { width: 220px; }
        .search-input::placeholder { color: var(--muted); font-style: italic; }
        .search-btn {
            position: absolute;
            right: 2px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--ink);
            font-size: 15px;
            padding: 2px;
            line-height: 1;
        }
        .search-btn:hover { color: var(--accent); }

        /* ─── Mobile search overlay ──────────────────────── */
        .mobile-search-overlay {
            position: fixed;
            inset: 0;
            z-index: 200;
            background: var(--cream);
            display: flex;
            flex-direction: column;
            transform: translateY(-100%);
            transition: transform 0.28s cubic-bezier(0.4,0,0.2,1);
            pointer-events: none;
        }
        .mobile-search-overlay.open {
            transform: translateY(0);
            pointer-events: all;
        }
        .mobile-search-inner {
            padding: 16px 20px;
            border-bottom: 2px solid var(--ink);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .mobile-search-field {
            flex: 1;
            font-family: 'Lora', serif;
            font-size: 18px;
            border: none;
            border-bottom: 1.5px solid var(--ink);
            background: transparent;
            padding: 8px 4px;
            outline: none;
            color: var(--ink);
        }
        .mobile-search-field::placeholder { color: var(--muted); font-style: italic; }
        .mobile-search-close {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
            color: var(--ink);
            padding: 4px;
            flex-shrink: 0;
        }
        .mobile-search-submit {
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 0.1em;
            background: var(--ink);
            color: #fff;
            border: none;
            padding: 10px 18px;
            cursor: pointer;
            flex-shrink: 0;
        }
        .mobile-search-hint {
            padding: 16px 20px;
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 12px;
            letter-spacing: 0.08em;
            color: var(--muted);
        }

        /* ─── Opinion / pull-quote ───────────────────────── */
        .pull-quote {
            border-left: 3px solid var(--accent);
            padding-left: 20px;
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-style: italic;
            line-height: 1.5;
            color: var(--ink);
        }

        /* ─── Sidebar widgets ────────────────────────────── */
        .sidebar-widget {
            padding-top: 16px;
            border-top: 2px solid var(--ink);
        }
        .sidebar-widget-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        /* ─── Ticker: "Most Read" list ───────────────────── */
        .ranked-list li {
            display: flex;
            gap: 14px;
            align-items: flex-start;
            padding: 10px 0;
            border-bottom: 1px solid var(--rule);
        }
        .ranked-list li:last-child { border-bottom: none; }
        .rank-num {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 900;
            color: var(--rule);
            line-height: 1;
            min-width: 22px;
            margin-top: 2px;
        }

        /* ─── Weather / status bar ───────────────────────── */
        .status-pip {
            display: inline-block;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #C0362C; 
            animation: pulse 2s ease-in-out infinite;
        }
        @keyframes pulse {
            0%,100% { opacity: 1; transform: scale(1); }
            50%      { opacity: 0.5; transform: scale(1.4); }
        }

        /* ─── Footer ─────────────────────────────────────── */
        footer {
            background: var(--ink);
            color: rgba(255,255,255,0.75);
        }
        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 36px;
            color: #fff;
            letter-spacing: -0.03em;
        }
        .footer-logo .tld { color: var(--accent); }
        .footer-link {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 12px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: color 0.15s;
        }
        .footer-link:hover { color: #fff; }

        /* ─── Page-load reveal ───────────────────────────── */
        .reveal {
            opacity: 0;
            transform: translateY(12px);
            animation: reveal 0.5s ease forwards;
        }
        @keyframes reveal {
            to { opacity: 1; transform: translateY(0); }
        }
        .reveal-1 { animation-delay: 0.05s; }
        .reveal-2 { animation-delay: 0.12s; }
        .reveal-3 { animation-delay: 0.22s; }
        .reveal-4 { animation-delay: 0.32s; }
        .reveal-5 { animation-delay: 0.42s; }

        /* ─── Hover: article link underline ─────────────── */
        .u-link {
            text-decoration: none;
            color: inherit;
            background-image: linear-gradient(var(--accent), var(--accent));
            background-size: 0 1px;
            background-repeat: no-repeat;
            background-position: 0 100%;
            transition: background-size 0.25s;
        }
        .u-link:hover { background-size: 100% 1px; }

        /* ─── Responsive tweaks ──────────────────────────── */
        @media (max-width: 768px) {
            .primary-nav { display: none; }
            .desktop-search { display: none; }
            .desktop-subscribe { display: none; }
        }
        @media (min-width: 769px) {
            .mobile-only { display: none !important; }
        }
    </style>
</head>
<body>




{{-- ════════════════════════════════════════════════════════
     BREAKING NEWS TICKER
════════════════════════════════════════════════════════ --}}
<div class="ticker-wrap" aria-label="Breaking news">
    <div class="ticker-label">BREAKING</div>
    <div class="ticker-track" aria-live="polite">
        {{-- Duplicated for seamless loop --}}
        @foreach ([
            'Laravel 13 ships with first-class async jobs and native Octane support',
            'NYC passes Digital Infrastructure Act mandating open-source city systems',
            'GitHub Copilot 4.0 integrates Anthropic models across enterprise plans',
            'Cloudflare Workers now free up to 100M requests/day for indie devs',
            'PostgreSQL 18 beta: parallel query planner hits GA next quarter',
            'Local devs protest "vibe coding" after third production incident this week',
        ] as $item)
            <span>{{ $item }}</span>
        @endforeach
        {{-- Duplicate for loop --}}
        @foreach ([
            'Laravel 13 ships with first-class async jobs and native Octane support',
            'NYC passes Digital Infrastructure Act mandating open-source city systems',
            'GitHub Copilot 4.0 integrates Anthropic models across enterprise plans',
            'Cloudflare Workers now free up to 100M requests/day for indie devs',
            'PostgreSQL 18 beta: parallel query planner hits GA next quarter',
            'Local devs protest "vibe coding" after third production incident this week',
        ] as $item)
            <span>{{ $item }}</span>
        @endforeach
    </div>
</div>

{{-- ════════════════════════════════════════════════════════
     UTILITY BAR
════════════════════════════════════════════════════════ --}}
<div class="util-bar hidden md:block">
    <div class="max-w-7xl mx-auto px-6 py-1.5 flex justify-between items-center">

<a href="{{ url('/') }}" class="logo2 reveal reveal-1">
                   NEWY<span class="tld">O</span>RK<span class="tld">.</span>DEV
                </a>


        <div class="flex items-center gap-3">
            <span class="status-pip" title="All systems operational"></span>
            <span>{{ now()->format('l, F j, Y') }}</span>
            <span class="text-gray-400">·</span>
            <span>NYC Weather: 68°F, Partly Cloudy</span>
        </div>
        <div class="flex items-center gap-5">
            <span class="flex items-center gap-2">
                <span class="font-mono text-xs">✓ Bobby</span>
                <span class="text-gray-400"> Fantana</span>
            </span>
            <a href="{{ url('/login') }}" class="hover:text-gray-800 transition-colors">Log in</a>
        </div>
    </div>
</div>

{{-- ════════════════════════════════════════════════════════
     MASTHEAD
════════════════════════════════════════════════════════ --}}
<header class="masthead" id="masthead" role="banner">
    <div class="max-w-7xl mx-auto px-4 md:px-6">

        {{-- Top row --}}
        <div class="flex items-center justify-between gap-4 pb-2">

            {{-- Hamburger (mobile) --}}
            <button
                class="hamburger mobile-only"
                id="hamburger-btn"
                aria-label="Open navigation"
                aria-expanded="false"
                aria-controls="mobile-drawer"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>

            {{-- Desktop: left nav links --}}
            <nav class="hidden md:flex items-center gap-1 flex-1" aria-label="Secondary navigation">
                @foreach (['Frontend', 'Backend', 'DevOps', 'Security', 'Open Source'] as $section)
                    <a href="{{ url('/section/' . str($section)->slug()) }}"
                       class="section-label hover:text-orange-700 transition-colors px-2 py-1">
                        {{ $section }}
                    </a>
                @endforeach
            </nav>

            {{-- Logo --}}
            <div class="text-center flex-shrink-0">
                <a href="{{ url('/') }}" class="logo reveal reveal-1">
                   NEWY<span class="tld">O</span>RK<span class="tld">.</span>DEV
                </a>
                <p class="logo-sub reveal reveal-2">A  Job Board, Memes & More - For the terminally Bored </p>
            </div>

            {{-- Right controls --}}
            <div class="flex-1 hidden md:flex items-center justify-end gap-4">
                {{-- Search --}}
                <form action="{{ url('/search') }}" method="GET" class="search-wrapper desktop-search" role="search">
                    <input
                        type="search"
                        name="q"
                        class="search-input"
                        placeholder="Search the Record…"
                        aria-label="Search articles"
                        id="site-search"
                        autocomplete="off"
                    >
                    <button type="submit" class="search-btn" aria-label="Submit search">⌕</button>
                </form>
                <a href="{{ url('/subscribe') }}" class="btn-subscribe desktop-subscribe">Subscribe</a>
            </div>

            {{-- Mobile: search icon + subscribe --}}
            <div class="flex items-center gap-3 mobile-only">
                <button id="mobile-search-btn" aria-label="Open search" aria-expanded="false" aria-controls="mobile-search-overlay" class="text-xl leading-none" style="background:none;border:none;cursor:pointer;color:var(--ink);padding:4px;">⌕</button>
                <a href="{{ url('/subscribe') }}" class="btn-subscribe" style="font-size:10px; padding: 6px 12px;">Sub</a>
            </div>
        </div>

        {{-- Primary nav (desktop) --}}
        <nav class="primary-nav flex overflow-x-auto md:justify-center" aria-label="Primary navigation" id="primary-nav">
            @php
            $navItems = [
                ['label' => 'THEBAY',          'href' => '/us'],
                ['label' => 'World',          'href' => '/world'],
                ['label' => 'Tech',           'href' => '/tech',    'active' => true],
                ['label' => 'Infrastructure', 'href' => '/infra'],
                ['label' => 'APIs',           'href' => '/apis'],
                ['label' => 'AI & ML',        'href' => '/ai'],
                ['label' => 'Dev Culture',    'href' => '/culture'], 
                ['label' => 'Jobs',           'href' => '/jobs'],
            ];
            @endphp
            @foreach ($navItems as $item)
                <a
                    href="{{ url($item['href']) }}"
                    @class(['active' => $item['active'] ?? false])
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
    </div>
</header>

{{-- ════════════════════════════════════════════════════════
     MOBILE DRAWER
════════════════════════════════════════════════════════ --}}
<div class="mobile-drawer" id="mobile-drawer" role="dialog" aria-modal="true" aria-label="Navigation menu">
    <div class="drawer-overlay" id="drawer-overlay"></div>
    <div class="drawer-panel">
        <div class="drawer-header">
            <span class="logo" style="font-size:22px;">NEWYORK<span class="tld">.DEV</span></span>
            <button
                id="drawer-close"
                aria-label="Close navigation"
                style="background:none;border:none;cursor:pointer;font-size:22px;color:var(--ink);"
            >✕</button>
        </div>

        <nav class="drawer-nav " aria-label="Mobile navigation">
            @foreach ([
                ['label' => 'U.S.',          'href' => '/us'],
                ['label' => 'World',          'href' => '/world'],
                ['label' => 'Tech',           'href' => '/tech'],
                ['label' => 'Infrastructure', 'href' => '/infra'],
                ['label' => 'APIs',           'href' => '/apis'],
                ['label' => 'AI & ML',        'href' => '/ai'],
                ['label' => 'Dev Culture',    'href' => '/culture'],
                
              
                ['label' => 'Jobs',           'href' => '/jobs'],
                ['label' => 'Newsletters',    'href' => '/newsletters'],
                ['label' => 'Podcasts',       'href' => '/podcasts'],
            ] as $item)
                <a href="{{ url($item['href']) }}">
                    {{ $item['label'] }}
                    <span class="arrow">→</span>
                </a>
            @endforeach
        </nav>

        <div style="padding: 20px; margin-top: auto; border-top: 1px solid var(--rule);">
            <a href="{{ url('/subscribe') }}" class="btn-subscribe" style="width:100%; text-align:center; display:block;">
                Subscribe to the Record
            </a>
            <p style="font-family:'Barlow Condensed',sans-serif; font-size:11px; color:var(--muted); margin-top:10px; text-align:center; letter-spacing:0.06em;">
                Free for devs. Always.
            </p>
        </div>
    </div>
</div>

{{-- ════════════════════════════════════════════════════════
     MOBILE SEARCH OVERLAY
════════════════════════════════════════════════════════ --}}
<div
    class="mobile-search-overlay"
    id="mobile-search-overlay"
    role="search"
    aria-label="Site search"
>
    <div class="mobile-search-inner">
        <form action="{{ url('/search') }}" method="GET" style="display:contents;">
            <input
                type="search"
                name="q"
                id="mobile-search-field"
                class="mobile-search-field"
                placeholder="Search the Record…"
                aria-label="Search articles"
                autocomplete="off"
            >
            <button type="submit" class="mobile-search-submit" aria-label="Search">SEARCH</button>
        </form>
        <button class="mobile-search-close" id="mobile-search-close" aria-label="Close search">✕</button>
    </div>
    <p class="mobile-search-hint">Try: "Laravel", "DevOps", "NY infra"</p>
</div>

{{-- ════════════════════════════════════════════════════════
     MAIN CONTENT
════════════════════════════════════════════════════════ --}}
<main class="max-w-7xl mx-auto px-4 md:px-6 py-8" id="main-content">

    {{-- ── Edition badge ── --}}
    <div class="mb-6 reveal reveal-2">
        <span class="edition-badge">
            <span>⬡</span> NewYork EDITION · {{ now()->format('M j, Y') }}
        </span>
    </div>

    {{-- ════ HERO GRID ════ --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-0 mb-8 reveal reveal-3">

        {{-- Lead story --}}
        <article class="lg:col-span-8 lg:pr-8 lg:border-r border-gray-200">
            <div class="article-card">
                <p class="section-label red mb-2">Infrastructure</p>
                <h1 class="hed-xl mb-3">
                    <a href="#" class="u-link">
                        The City's Tech Stack Is Crumbling - and 10,000 Devs Are the Only Fix
                    </a>
                </h1>
                <p class="copy mb-4">
                    A landmark audit of New York's municipal software reveals a fragile patchwork
                    of PHP 5.3, Oracle 11g, and handwritten COBOL holding together systems
                    that process $3.4 billion daily. A new initiative wants to change that — one
                    pull request at a time.
                </p>

                <figure>
                    <img
                        src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=900&h=500&fit=crop&auto=format"
                        alt="Lower Manhattan skyline at dusk"
                        class="lead-img mb-2"
                        loading="eager"
                        width="900" height="500"
                    >
                    <figcaption class="byline">Lower Manhattan, June 2026. <em>Photo: Unsplash</em></figcaption>
                </figure>

                <div class="flex items-center gap-4 mt-3">
                    <p class="byline">By <strong>Marcus Chen</strong> · June 6, 2026</p>
                    <span class="tech-tag">laravel</span>
                    <span class="tech-tag">php</span>
                    <span class="tech-tag hot">urgent</span>
                </div>
            </div>
        </article>

        {{-- Secondary stories column --}}
        <div class="lg:col-span-4 lg:pl-8 flex flex-col gap-0 mt-8 lg:mt-0">

            @php
            $secondaryStories = [
                [
                    'section'   => 'AI & ML',
                    'headline'  => "OpenAI's NYC Data Centre Deal Puts Brooklyn Devs on Notice",
                    'byline'    => 'Priya Okafor',
                    'date'      => 'June 6, 2026',
                    'tags'      => ['ai', 'real-estate'],
                ],
                [
                    'section'   => 'DevOps',
                    'headline'  => 'Kubernetes Operators Take Over Midtown: Inside the Silent Migration',
                    'byline'    => 'Santiago Rivera',
                    'date'      => 'June 5, 2026',
                    'tags'      => ['k8s', 'cloud'],
                ],
                [
                    'section'   => 'Career',
                    'headline'  => 'Staff Engineer Pay Hits $430K at NYC Fintechs — Still Not Enough?',
                    'byline'    => 'Zoe Harrington',
                    'date'      => 'June 5, 2026',
                    'tags'      => ['jobs', 'salary'],
                ],
                 [
                    'section'   => 'Career',
                    'headline'  => 'Staff Engineer Pay Hits $430K at NYC Fintechs — Still Not Enough?',
                    'byline'    => 'Zoe Harrington',
                    'date'      => 'June 5, 2026',
                    'tags'      => ['jobs', 'salary'],
                ],
                

            ];
            @endphp

            @foreach ($secondaryStories as $i => $story)
                <article class="article-card py-5 {{ $loop->last ? '' : 'border-b border-gray-200' }}">
                    <p class="section-label red mb-1">{{ $story['section'] }}</p>
                    <h2 class="hed-sm mb-2">
                        <a href="#" class="u-link">{{ $story['headline'] }}</a>
                    </h2>
                    <div class="flex items-center gap-3">
                        <p class="byline">By <strong>{{ $story['byline'] }}</strong> · {{ $story['date'] }}</p>
                    </div>
                    <div class="flex gap-2 mt-2">
                        @foreach ($story['tags'] as $tag)
                            <span class="tech-tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                </article>
            @endforeach

        </div>
    </div>{{-- /hero grid --}}

    <hr class="rule-double my-8">

    {{-- ════ SECTION: COLUMNS + SIDEBAR ════ --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        {{-- ── Left: 3-col article grid ── --}}
        <section class="lg:col-span-8">

            <p class="section-label mb-5">Latest Dispatches</p>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @php
                $dispatches = [
                    [
                        'section'   => 'APIs',
                        'headline'  => "How Stripe's NYC Team Re-Architected Webhooks to Handle 50M Events/Hour",
                        'image'     => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=500&h=280&fit=crop',
                        'tags'      => ['stripe', 'webhooks'],
                        'byline'    => 'Elena Park',
                    ],
                    [
                        'section'   => 'Open Source',
                        'headline'  => "Filament v4 Released: Laravel's Admin UI Goes Enterprise",
                        'image'     => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=500&h=280&fit=crop',
                        'tags'      => ['laravel', 'filament'],
                        'byline'    => 'Tom Adebayo',
                    ],
                    [
                        'section'   => 'Security',
                        'headline'  => 'Zero-Day in Popular NYC Startup Stack: What You Need to Patch Now',
                        'image'     => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=500&h=280&fit=crop',
                        'tags'      => ['security', 'critical'],
                        'byline'    => 'Dana Vo',
                    ],
                ];
                @endphp

                @foreach ($dispatches as $article)
                    <article class="article-card">
                        <img
                            src="{{ $article['image'] }}"
                            alt="{{ $article['headline'] }}"
                            class="lead-img"
                            style="aspect-ratio:16/10;"
                            loading="lazy"
                            width="500" height="280"
                        >
                        <p class="section-label red mt-3">{{ $article['section'] }}</p>
                        <h3 class="hed-sm mt-1">
                            <a href="#" class="u-link">{{ $article['headline'] }}</a>
                        </h3>
                        <p class="byline mt-2">{{ $article['byline'] }}</p>
                        <div class="flex gap-2 mt-2">
                            @foreach ($article['tags'] as $tag)
                                <span class="tech-tag {{ $tag === 'critical' ? 'hot' : '' }}">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>

            <hr class="rule my-8">

            {{-- Pull quote / Opinion --}}
            <section class="py-4">
                <p class="section-label mb-4">Opinion</p>
                <blockquote class="pull-quote">
                    "We keep building for scale we don't have yet, and ignoring the scale
                    we already can't handle. The city's infrastructure crisis is a mirror
                    of every startup that ever said 'we'll fix it later.'"
                </blockquote>
                <p class="byline mt-4">— <strong>Rosa Martinez</strong>, Principal Engineer at NYC OpenData · <a href="#" class="u-link">Read the column →</a></p>
            </section>

        </section>

        {{-- ── Sidebar ── --}}
        <aside class="lg:col-span-4 flex flex-col gap-8">

            {{-- Most Read --}}
            <div class="sidebar-widget">
                <p class="sidebar-widget-title">Most Read</p>
                <ol class="ranked-list" style="list-style:none; padding:0;">
                    @php
                    $mostRead = [
                        'Why Senior Engineers Are Leaving FAANG for NYC Gov Contracts',
                        'The 10 Postgres Extensions Every NYC Startup Uses in Production',
                        'Tailwind v5 Is Live: The CSS-in-JS Wars Resume',
                        "I Rebuilt the MTA's Trip Planner in a Weekend. Here's What I Learned.",
                        'Laravel Horizon vs Queues in 2026: A Practical Benchmark',
                    ];
                    @endphp
                    @foreach ($mostRead as $i => $headline)
                        <li>
                            <span class="rank-num">{{ $i + 1 }}</span>
                            <a href="#" class="u-link copy-sm">{{ $headline }}</a>
                        </li>
                    @endforeach
                </ol>
            </div>

            {{-- Newsletter CTA --}}
            <div class="sidebar-widget" style="background: var(--ink); padding: 20px;">
                <p class="sidebar-widget-title" style="color:rgba(255,255,255,0.55);">Daily Briefing</p>
                <p style="font-family:'Playfair Display',serif; font-size:18px; color:#fff; font-weight:700; line-height:1.3; margin-bottom:12px;">
                    Dev news that matters, delivered at 08:00.
                </p>
                <form action="{{ url('/newsletter/subscribe') }}" method="POST" class="flex flex-col gap-3">
                    @csrf
                    <input
                        type="email"
                        name="email"
                        placeholder="your@email.dev"
                        required
                        style="
                            font-family:'Lora',serif;
                            font-size:14px;
                            padding:8px 12px;
                            border:1px solid rgba(255,255,255,0.2);
                            background:rgba(255,255,255,0.08);
                            color:#fff;
                            outline:none;
                            width:100%;
                        "
                        aria-label="Your email address"
                    >
                    <button type="submit" class="btn-subscribe" style="background:var(--accent); width:100%; text-align:center;">
                        Subscribe Free →
                    </button>
                </form>
                <p style="font-family:'Barlow Condensed',sans-serif; font-size:10px; letter-spacing:0.06em; color:rgba(255,255,255,0.35); margin-top:10px;">
                    No spam. Unsubscribe anytime. Open source.
                </p>
            </div>

            {{-- Tech stack ticker --}}
            <div class="sidebar-widget">
                <p class="sidebar-widget-title">Trending in NYC</p>
                <div class="flex flex-wrap gap-2">
                    @foreach ([
                        'Laravel 13', 'Livewire 4', 'React 19', 'Bun 2',
                        'PostgreSQL 18', 'Kafka', 'Rust', 'Cloudflare AI',
                        'Tailwind v5', 'htmx', 'Deno 3', 'PHP 9',
                    ] as $tech)
                        <a href="{{ url('/tag/' . str($tech)->slug()) }}" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer">{{ $tech }}</a>
                    @endforeach
                </div>
            </div>

        </aside>
    </div>{{-- /columns + sidebar --}}

    <hr class="rule-double mt-12 mb-8">

    {{-- ════ JOB BOARD TEASER ════ --}}
    <section class="mb-12">
        <div class="flex items-center justify-between mb-5">
            <p class="section-label">Dev Jobs · NYC</p>
            <a href="{{ url('/jobs') }}" class="byline u-link">View all 348 openings →</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @php
            $jobs = [
                ['title' => 'Senior Laravel Engineer',     'company' => 'Relay Finance',      'pay' => '$200–240K', 'tag' => 'remote-ok'],
                ['title' => 'Staff Platform Engineer',      'company' => 'Bloomberg L.P.',     'pay' => '$280–340K', 'tag' => 'hybrid'],
                ['title' => 'DevRel Engineer',              'company' => 'Cloudflare NYC',     'pay' => '$180–220K', 'tag' => 'remote'],
                ['title' => 'Lead Backend (PHP/Go)',        'company' => 'NYC Mayor\'s Office', 'pay' => '$160–190K', 'tag' => 'on-site'],
            ];
            @endphp
            @foreach ($jobs as $job)
                <a href="{{ url('/jobs') }}" style="text-decoration:none; color:inherit;">
                    <div style="border: 1px solid var(--rule); padding: 16px; transition: border-color 0.15s;" class="hover:border-gray-400">
                        <p class="section-label mb-2">{{ $job['company'] }}</p>
                        <p style="font-family:'Playfair Display',serif; font-weight:700; font-size:15px; line-height:1.3; margin-bottom:8px; color:var(--ink);">{{ $job['title'] }}</p>
                        <div class="flex items-center justify-between">
                            <span style="font-family:'JetBrains Mono',monospace; font-size:11px; color:var(--accent); font-weight:600;">{{ $job['pay'] }}</span>
                            <span class="tech-tag">{{ $job['tag'] }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

</main>

{{-- ════════════════════════════════════════════════════════
     FOOTER
════════════════════════════════════════════════════════ --}}
<footer role="contentinfo">

    {{-- Upper footer --}}
    <div style="border-bottom: 1px solid rgba(255,255,255,0.1);">
        <div class="max-w-7xl mx-auto px-4 md:px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-8">

                {{-- Brand --}}
                <div class="md:col-span-2">
                    <p class="footer-logo">NEWYORK<span class="tld">.DEV</span></p>
                    <p style="font-family:'Lora',serif; font-size:14px; line-height:1.7; margin-top:12px; color:rgba(255,255,255,0.5); max-width:360px;">
                      Independent journalism for the dev community.
                    </p>
                    <div class="flex gap-4 mt-6">
                        <a href="#" aria-label="GitHub" class="footer-link" style="font-size:18px;">⌥</a>
                        <a href="#" aria-label="X / Twitter" class="footer-link" style="font-size:18px;">✕</a>
                        <a href="#" aria-label="RSS" class="footer-link" style="font-size:18px;">⊞</a>
                    </div>
                </div>

                {{-- Nav columns --}}
                @php
                $footerCols = [
                    'Sections'  => ['U.S.', 'World', 'Tech', 'Infrastructure', 'APIs', 'AI & ML'],
                    'Company'   => ['About', 'Careers', 'Advertise', 'Press', 'Contact'],
                    'Reader'    => ['Subscribe', 'Newsletters', 'Podcasts', 'Archive', 'RSS'],
                ];
                @endphp
                @foreach ($footerCols as $colTitle => $links)
                    <div>
                        <p style="font-family:'Barlow Condensed',sans-serif; font-size:11px; font-weight:700; letter-spacing:0.18em; color:rgba(255,255,255,0.35); margin-bottom:12px; text-transform:uppercase;">{{ $colTitle }}</p>
                        <ul style="list-style:none; padding:0; display:flex; flex-direction:column; gap:8px;">
                            @foreach ($links as $link)
                                <li>
                                    <a href="{{ url('/' . str($link)->slug()) }}" class="footer-link">{{ $link }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    {{-- Lower footer --}}
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-5 flex flex-col sm:flex-row justify-between items-center gap-3">
        <p style="font-family:'Barlow Condensed',sans-serif; font-size:11px; letter-spacing:0.08em; color:rgba(255,255,255,0.3);">
            &copy; {{ date('Y') }} NewYork.dev, ONCILLAS. All rights reserved.
        </p>
        <div class="flex gap-5">
            @foreach (['Privacy Policy', 'Terms of Service', 'Cookie Settings', 'Accessibility'] as $item)
                <a href="{{ url('/' . str($item)->slug()) }}" class="footer-link" style="font-size:11px;">{{ $item }}</a>
            @endforeach
        </div>
    </div>

</footer>

{{-- ════════════════════════════════════════════════════════
     JAVASCRIPT
════════════════════════════════════════════════════════ --}}
<script>
(function () {
    'use strict';

    // ── Masthead scroll shadow ────────────────────────────
    const masthead = document.getElementById('masthead');
    window.addEventListener('scroll', () => {
        masthead.classList.toggle('scrolled', window.scrollY > 10);
    }, { passive: true });

    // ── Hamburger / drawer ────────────────────────────────
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const drawerClose  = document.getElementById('drawer-close');
    const drawer       = document.getElementById('mobile-drawer');
    const overlay      = document.getElementById('drawer-overlay');

    const openDrawer = () => {
        drawer.classList.add('open');
        hamburgerBtn.classList.add('open');
        hamburgerBtn.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    };
    const closeDrawer = () => {
        drawer.classList.remove('open');
        hamburgerBtn.classList.remove('open');
        hamburgerBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
        hamburgerBtn?.focus();
    };

    hamburgerBtn?.addEventListener('click', () => {
        drawer.classList.contains('open') ? closeDrawer() : openDrawer();
    });
    drawerClose?.addEventListener('click', closeDrawer);
    overlay?.addEventListener('click', closeDrawer);

    // ── Mobile search overlay ─────────────────────────────
    const mobileSearchBtn     = document.getElementById('mobile-search-btn');
    const mobileSearchOverlay = document.getElementById('mobile-search-overlay');
    const mobileSearchField   = document.getElementById('mobile-search-field');
    const mobileSearchClose   = document.getElementById('mobile-search-close');

    const openMobileSearch = () => {
        mobileSearchOverlay.classList.add('open');
        mobileSearchBtn.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
        // Slight delay so the slide-in animation is visible before focus
        setTimeout(() => mobileSearchField?.focus(), 80);
    };
    const closeMobileSearch = () => {
        mobileSearchOverlay.classList.remove('open');
        mobileSearchBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
        mobileSearchBtn?.focus();
    };

    mobileSearchBtn?.addEventListener('click', openMobileSearch);
    mobileSearchClose?.addEventListener('click', closeMobileSearch);

    // ── Close both overlays on Escape ────────────────────
    document.addEventListener('keydown', (e) => {
        if (e.key !== 'Escape') return;
        if (mobileSearchOverlay?.classList.contains('open')) { closeMobileSearch(); return; }
        if (drawer?.classList.contains('open')) { closeDrawer(); }
    });

    // ── Desktop search: focus-expand already handled by CSS.
    //    Wire the input so typing + Enter submits the form.
    //    (The <form> wrapping it handles click on ⌕ button natively.)
    const desktopSearch = document.getElementById('site-search');
    desktopSearch?.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            const q = desktopSearch.value.trim();
            if (q) desktopSearch.closest('form').submit();
        }
    });

})();
</script>

</body>
</html>