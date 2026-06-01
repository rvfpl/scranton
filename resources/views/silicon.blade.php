@php
$page_data = [
    'site_name'    => 'newyork.dev',
    'current_date' => date('F j, Y'),
    'spotlight' => [
        'name'        => "Rob 'Bobby' Fantana",
        'aliases'     => "Native, Fanta, Robbo, ElBoberino, MC BO!",
        'created'     => 'Scranton.dev',
        'created_url' => '/',
        'badge'       => 'Vetted',
        'image'       => '/img/sc6.jpg',
        'quote'       => "My code? 60% of the time it works Everytime!",
        'stack'       => 'I Love LAMP / XAMPP // PHP Tools // VB6 // Obj-C',
        'current_stack' => 'Still LAMP, but I  dabble in   newer tech... Laravel, TALL',
        'locations'   => 'Toronto (3d/wk) / Niagara,NY / Tricity,PL / Mordor (Waaagh!)',
        'im_url'      => '/im/bobby',
        'github'      => 'https://github.com/rvfpl',
        'method'      => 'Old Code, Low Code, Break Shit, Eat Stuff, Refactor. Quabity Ashuance, Repeat. Always Repeat.',
        'real_method' => 'RTD, KISS, Coffee',
    ],
    'banner' => [
        'image'       => '/img/scindex.jpg',
        'url'         => '/',
        'label'       => 'scranton.dev',
        'tagline'     => ' NEPA-inspired. Remote-Ready. The Modern Old-School Dev Portal',
        'description' => 'Scranton.dev started as one dev\'s fix for a broken hiring loop - too many ATS blasts,ghost-posts, not enough real signal. 
        It\'s a job board with a sticky-note soul: handpicked roles and direct conversations instead of automated rejection emails.

 No recruiter spam, no black-hole applications - just people who ship, looking for work worth doing.
 Scranton.dev is a job board for developers who are tired of shouting into the ATS void. The aesthetic is unapologetically analog - sticky notes, real names, actual humans 
 - because that\'s how good hires used to happen before the tracking software took over.
 It is  is a lean job board for companies that want candidates, not conversions. No ATS middleware, no keyword-stuffed profiles 
 - just a curated pool of companies and builders from NEPA and beyond.

Remote roles welcome. The platform\'s office-desk aesthetic isn\'t just a gimmick; it\'s a philosophy: human-scale hiring, direct outreach, and the kind of B2B shortlist you used to get from a trusted colleague. 
NEPA inspired. Good devs everywhere.'
,
    ],
];
$s = $page_data['spotlight'];
$b = $page_data['banner'];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page_data['site_name'] }} // Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* ─────────────────────────────────────────
           DESIGN TOKENS
        ───────────────────────────────────────── */
        :root {
            --clr-bg:          #f5f5f3;
            --clr-surface:     #ffffff;
            --clr-ink:         #0e0e0d;
            --clr-muted:       #696966;
            --clr-nav-bg:      #080808;
            --clr-nav-ink:     #c2c2ba;
            --clr-accent:      #6c63e0;
            --clr-accent-dim:  rgba(108,99,224,0.12);
            --clr-accent-glow: rgba(108,99,224,0.35);
            --clr-border:      #e2e2de;
            --clr-card-bg:     #0c0c0c;
            --clr-card-label:  #5a5a56; /* FIX: was #555 — near-invisible on #0f0f0f */
            --font-ui:         'JetBrains Mono', monospace;
            --font-body:       'Space Grotesk', sans-serif;
            --ease-expo:       cubic-bezier(0.16, 1, 0.3, 1);
            --ease-spring:     cubic-bezier(0.34, 1.56, 0.64, 1);
            --radius:          2px; /* sharp, intentional */
        }

        *, *::before, *::after { box-sizing: border-box; }
        html  { background: var(--clr-bg); scroll-behavior: smooth; }
        body  {
            font-family: var(--font-body);
            color: var(--clr-ink);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
            margin: 0;
        }

        /* ─────────────────────────────────────────
           NAV
           CHANGE: added scroll-shadow JS class,
                   tightened logo size, cleaner
                   active indicator (bottom border
                   replaced by left-side tick on mobile)
        ───────────────────────────────────────── */
        .site-nav {
            background: var(--clr-nav-bg);
            color: var(--clr-nav-ink);
            border-bottom: 1px solid #1c1c1c;
            position: sticky;
            top: 0;
            z-index: 50;
            transition: box-shadow 0.3s;
        }
        .site-nav.is-scrolled {
            box-shadow: 0 4px 24px rgba(0,0,0,0.5);
        }
        .site-nav__inner {
            max-width: 72rem;
            margin: 0 auto;
            padding: 0 1.5rem;
            height: 3rem; /* FIX: explicit height instead of vertical padding — prevents jank on mobile */
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1.5rem;
        }
        .site-nav__logo {
            font-family: var(--font-ui);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            text-decoration: none;
            color: var(--clr-nav-ink);
            flex-shrink: 0;
        }
        .site-nav__logo span { color: var(--clr-accent); }

        /* CHANGE: date styled as a pill badge instead of plain text */
        .site-nav__date {
            font-family: var(--font-ui);
            font-size: 0.58rem;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #adadad;
            background: #141414;
            border: 1px solid #272727;
            padding: 0.2rem 0.55rem;
            border-radius: 2px;
            flex-shrink: 0;
        }

        .nav-links { display: flex; gap: 1.75rem; list-style: none; margin: 0; padding: 0; }
        .nav-links__btn {
            font-family: var(--font-ui);
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            background: none;
            border: none;
            color: #5c5c58;
            cursor: pointer;
            padding: 0.2rem 0;
            position: relative;
            transition: color 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        /* CHANGE: animated underline instead of static border-bottom */
        .nav-links__btn::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--clr-accent);
            transition: width 0.25s var(--ease-expo);
        }
        .nav-links__btn:hover       { color: #d0d0c8; }
        .nav-links__btn:hover::after,
        .nav-links__btn.is-active::after { width: 100%; }
        .nav-links__btn.is-active   { color: var(--clr-accent); }

        .menu-toggle {
            display: none;
            background: none;
            border: 1px solid #2a2a2a;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            padding: 0.3rem 0.5rem;
            line-height: 1;
            transition: border-color 0.15s, transform 0.15s var(--ease-expo);
        }
        .menu-toggle:active { transform: scale(0.9); }

        .mobile-menu {
            display: none;
            background: #050505;
            padding: 0.75rem 1.5rem 1.25rem;
            border-top: 1px solid #1c1c1c;
            gap: 0;
        }
        .mobile-menu.is-open { display: grid; }
        /* CHANGE: mobile nav items have left-border active indicator */
        .mobile-menu .nav-links__btn {
            font-size: 0.68rem;
            padding: 0.6rem 0 0.6rem 0.75rem;
            border-left: 2px solid transparent;
            transition: border-color 0.2s, color 0.2s;
        }
        .mobile-menu .nav-links__btn.is-active {
            border-left-color: var(--clr-accent);
        }
        .mobile-menu .nav-links__btn::after { display: none; }

        @@media (min-width: 768px) {
            .menu-toggle  { display: none; }
            .mobile-menu  { display: none !important; }
            .nav-links    { display: flex; }
        }
        @@media (max-width: 767px) {
            .menu-toggle    { display: block; }
            .nav-desktop    { display: none; }
            .site-nav__date { display: none; }
        }

        /* ─────────────────────────────────────────
           TABS
        ───────────────────────────────────────── */
        .tab-panel.is-hidden { display: none; }

        /* ─────────────────────────────────────────
           EDITORIAL HEADER
           CHANGE: full redesign — issue badge,
                   large display text, ruled divider
        ───────────────────────────────────────── */
        .editorial-header {
            padding:2rem 0 2rem;
            border-bottom: 1px solid var(--clr-border);
            margin-bottom: 2rem;
        }
        .editorial-header__eyebrow {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }
        .issue-badge {
            font-family: var(--font-ui);
            font-size: 0.55rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            background: var(--clr-accent);
            color: #fff;
            padding: 0.3rem 0.65rem;
            border-radius: 2px;
        }
        .issue-rule {
            flex: 1;
            height: 1px;
            background: var(--clr-border);
        }
        .editorial-header__title {
             font-size: clamp(2.4rem, 6vw, 3.5rem);
            font-weight: 800;
            letter-spacing: -0.04em;
            line-height: 0.95;
            margin: 0 0 1rem;
        }
        .editorial-header__title em {
            font-style: normal;
            color: var(--clr-accent);
        }
        .editorial-header__meta {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }
        .meta-chip {
            font-family: var(--font-ui);
            font-size: 0.58rem;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--clr-muted);
        }
        .meta-chip + .meta-chip::before {
            content: '//';
            margin-right: 1.5rem;
            color: var(--clr-border);
        }

        /* ─────────────────────────────────────────
           SPOTLIGHT CARD
           CHANGES:
             - label colors fixed (#555 → var(--clr-card-label))
             - badge order fixed (Vetted top, Potato_Cam below)
             - quote improved with accent underline
             - info-row gets a subtle separator
             - photo has accent-glow on hover
        ───────────────────────────────────────── */
        .spotlight-wrap { margin-bottom: 0.75rem; }

        .spotlight-header {
            margin-bottom: 1.25rem;
        }
        .spotlight-header__eyebrow {
            font-family: var(--font-ui);
            font-size: 0.58rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--clr-accent);
            margin-bottom: 0.5rem;
        }
        .spotlight-header__name {
            font-size: clamp(1.4rem, 3.5vw, 2.2rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            line-height: 1.05;
            margin: 0 0 0.3rem;
        }
        .spotlight-header__aliases {
            font-size: 0.72rem;
            color: var(--clr-muted);
            font-family: var(--font-ui);
            line-height: 1.6;
        }
        .spotlight-header__creator {
            font-size: 0.78rem;
            color: var(--clr-muted);
            margin-top: 0.5rem;
        }
        .spotlight-header__creator a {
            color: var(--clr-accent);
            text-decoration: none;
            font-weight: 600;
            border-bottom: 1px solid var(--clr-accent-dim);
            transition: border-color 0.2s;
        }
        .spotlight-header__creator a:hover { border-bottom-color: var(--clr-accent); }

        .spotlight-card {
            display: grid;
            border: 1px solid var(--clr-border);
            background: var(--clr-surface);
            overflow: hidden;
        }
        @@media (min-width: 768px) {
            .spotlight-card { grid-template-columns: 3fr  3fr 6fr; }
        }

        .spotlight-card__image-pane {
            position: relative;
            height: 20rem;
            overflow: hidden;
            background: #0a0a0a;
        }
        @@media (min-width: 768px) {
            .spotlight-card__image-pane { height: auto; min-height: 26rem; }
        }
        .spotlight-card__img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* FIX: removed 4px accent border — broken on object-fit:cover
               CHANGE: replaced with box-shadow glow on hover */
            filter: grayscale(100%);
            transition: transform 0.65s var(--ease-expo), filter 0.5s, box-shadow 0.5s;
            will-change: transform, filter;
        }
        .spotlight-card:hover .spotlight-card__img {
            filter: grayscale(0%);
            transform: scale(1.04);
        }

        /* CHANGE: accent line along left edge of image pane (replaces misplaced border) */
        .spotlight-card__image-pane::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--clr-accent);
            z-index: 2;
        }

        /* ── Badges
           FIX: swapped nth-child positions so Vetted badge is topmost
                (more important credential shown first)
                Potato_Cam is a fun/secondary label so it sits below
        ── */
        .img-badge {
            position: absolute;
                      /* CHANGE: moved to right — left edge is taken by accent bar */
            background: rgba(8,8,8,0.88);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(108,99,224,0.3);
            padding: 0.22rem 0.55rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            z-index: 3;
        }
        /* FIX: Vetted badge on top, Potato_Cam below */
        .img-badge--vetted    { top: 1rem;  right: 1rem;}
        .img-badge--secondary { top: 0.6rem; left:0.2rem }

        .img-badge__dot {
            width: 0.35rem;
            height: 0.35rem;
            background: #7c73e6; /* indigo — signals "verified" */
            border-radius: 50%;
            animation: pulse 2.5s ease-in-out infinite;
        }
        @@keyframes pulse {
            0%, 100% { opacity: 1;   transform: scale(1); }
            50%       { opacity: 0.3; transform: scale(0.7); }
        }

        /* ── Info pane ── */
        .spotlight-card__info {
            padding: 2rem 1.75rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--clr-card-bg);
            color: #d0d0cc;
            gap: 0; /* CHANGE: gaps managed by info-row margin so separators align */
        }

        /* CHANGE: quote has decorative top/bottom rules instead of just left border */
        .spotlight-card__quote {
            font-family: Georgia, 'Times New Roman', serif;
            font-style: italic;
            font-size: 1.05rem;
            line-height: 1.65;
            color: #eaeae6;
            border-top: 1px solid #1e1e1e;
            border-bottom: 1px solid #1e1e1e;
            padding: 1.1rem 0 1.1rem 1rem;
            margin: 0 0 1.5rem;
            position: relative;
        }
        .spotlight-card__quote::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--clr-accent);
        }

        /* FIX: info-row labels are now visible on dark background */
        .info-row {
            padding: 0.85rem 0;
            border-bottom: 1px solid #161616;
        }
        .info-row:last-child { border-bottom: none; }

        .info-row__label {
            font-family: var(--font-ui);
            font-size: 0.58rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--clr-card-label); /* FIX: was hardcoded #555 */
            margin: 0 0 0.3rem;
        }
        .info-row__value {
            font-family: var(--font-ui);
            font-size: 0.73rem;
            line-height: 1.65;
            color: #9090  8c;
            margin: 0;
        }
        .info-row__value a {
            color: var(--clr-accent);
            text-decoration: none;
            transition: color 0.15s;
        }
        .info-row__value a:hover { color: #a8a2f0; }

        /* ─────────────────────────────────────────
           BANNER
           CHANGE: taller, accent corner marks,
                   label refinement
        ───────────────────────────────────────── */
        .site-banner {
            display: block;
            position: relative;
            width: 100%;
            height: 14rem;
            background-image: var(--banner-img);
            background-size: cover;
            background-position: center;
            overflow: hidden;
            text-decoration: none;
            margin-top: 2rem;
        }
        .site-banner__overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.65) 0%, rgba(0,0,0,0.3) 100%);
            transition: background 0.45s var(--ease-expo);
        }
        .site-banner:hover .site-banner__overlay {
            background: linear-gradient(135deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.1) 100%);
        }

        /* CHANGE: decorative corner accents */
        .site-banner::before,
        .site-banner::after {
            content: '';
            position: absolute;
            width: 1.5rem;
            height: 1.5rem;
            z-index: 2;
            transition: width 0.3s var(--ease-expo), height 0.3s var(--ease-expo);
        }
        .site-banner::before {
            top: 1rem; left: 1rem;
            border-top: 2px solid var(--clr-accent);
            border-left: 2px solid var(--clr-accent);
        }
        .site-banner::after {
            bottom: 1rem; right: 1rem;
            border-bottom: 2px solid var(--clr-accent);
            border-right: 2px solid var(--clr-accent);
        }
        .site-banner:hover::before,
        .site-banner:hover::after {
            width: 2.5rem;
            height: 2.5rem;
        }
        .site-banner__label {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            height: 100%;
            text-align: center;
        }
        .site-banner__title {
            font-family: var(--font-ui);
            font-size: clamp(1.4rem, 4.5vw, 2.4rem);
            font-weight: 900;
            color: #fff;
            letter-spacing: 0.15em;
            text-transform: uppercase;
        }
        .site-banner__cta {
            font-family: var(--font-ui);
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.5);
            transition: color 0.3s;
        }
        .site-banner:hover .site-banner__cta { color: rgba(255,255,255,0.85); }

        /* ─────────────────────────────────────────
           DIRECTORY
        ───────────────────────────────────────── */
        .directory-row {
            padding: 1rem 1.25rem;
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: border-color 0.2s, background 0.2s;
        }
        .directory-row:hover {
            border-color: var(--clr-accent);
            background: var(--clr-accent-dim);
        }
        .badge-verified {
            font-family: var(--font-ui);
            font-size: 0.55rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            background: #f0fdf4;
            color: #16a34a;
            padding: 0.2rem 0.5rem;
            border: 1px solid #bbf7d0;
        }

        /* ─────────────────────────────────────────
           GET FEATURED
           CHANGE: more prominent, two-tone treatment
        ───────────────────────────────────────── */
        .get-featured {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 1.25rem;
            text-decoration: none;
            background: #0a0a0a;
            border-top: 1px solid #1c1c1c;
            font-family: var(--font-ui);
            font-size: 0.62rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #4a4a46;
            transition: color 0.25s, background 0.25s;
        }
        .get-featured:hover  { color: var(--clr-accent); background: #0f0f0f; }
        .get-featured__arrow {
            font-size: 0.8rem;
            transition: transform 0.3s var(--ease-spring);
        }
        .get-featured:hover .get-featured__arrow { transform: translateX(4px); }

        /* ─────────────────────────────────────────
           REVEAL ANIMATIONS
        ───────────────────────────────────────── */
        @@keyframes fadeUp {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .reveal {
            opacity: 0;
            animation: fadeUp 0.7s var(--ease-expo) forwards;
        }
        .reveal--1 { animation-delay: 0.05s; }
        .reveal--2 { animation-delay: 0.2s;  }
        .reveal--3 { animation-delay: 0.38s; }

        /* ─────────────────────────────────────────
           FOOTER
        ───────────────────────────────────────── */
        .site-footer {
            margin-top: auto;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-family: var(--font-ui);
            font-size: 0.53rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #6a6a66;
            border-top: 1px solid var(--clr-border);
        }
        .footer-right { color: #3a3a38; }

        /* ─────────────────────────────────────────
           UTILITY
        ───────────────────────────────────────── */
        .label {
            font-family: var(--font-ui);
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <header class="site-nav" id="site-nav" role="banner">
<div class="site-nav__inner bg-red-700 text-white text-xs"> 
    
    sponsored | contact us to advertise 
    </div>
    </header>
{{-- ── NAV ── --}}
<header class="site-nav" id="site-nav" role="banner"> 

    <div class="site-nav__inner ">
        <a href="/" class="site-nav__logo">NewYork<span>.dev</span></a>

        <time class="site-nav__date" datetime="{{ date('Y-m-d') }}">{{ $page_data['current_date'] }}</time>

        <nav class="nav-desktop" aria-label="Primary navigation">
            <ul class="nav-links" role="list">
                <li><button class="nav-links__btn is-active" data-tab="spotlight">Spotlight</button></li>
                <li><button class="nav-links__btn"           data-tab="directory">Directory</button></li>
                <li><a href="#founding-members" class="nav-links__btn">Founding Members</a></li>
                <li><a href="#blog"             class="nav-links__btn">Blog</a></li>
            </ul>
        </nav>

        <button class="menu-toggle" id="menu-toggle"
                aria-controls="mobile-menu"
                aria-expanded="false"
                aria-label="Toggle menu">&#9776;</button>
    </div>

    <nav class="mobile-menu" id="mobile-menu" aria-label="Mobile navigation">
        <button class="nav-links__btn is-active" data-tab="spotlight">Spotlight</button>
        <button class="nav-links__btn"           data-tab="directory">Directory</button>
        <a href="#founding-members" class="nav-links__btn">Founding Members</a>
        <a href="#blog"             class="nav-links__btn">Blog</a>
    </nav>
</header>

<main style="flex-grow:1; padding: 0 1.25rem; max-width: 72rem; margin: 0 auto; width: 100%;">

    {{-- ── EDITORIAL HEADER ── --}}
    <div class="editorial-header reveal reveal--1">
        <div class="editorial-header__eyebrow">
            <span class="issue-badge">June 2026</span>
            <span class="issue-rule" aria-hidden="true"></span>
            <span class="label" style="color: var(--clr-muted); white-space: nowrap;">NEWYORK</span>
        </div>
        <h1 class="editorial-header__title">
           <em>Best  Devs</em><br>&amp; Startups
        </h1>
        <div class="editorial-header__meta">
            <span class="meta-chip">Discover  Verified Builders</span>
            
        </div>  
    </div> 

    {{-- ── SPOTLIGHT TAB ── --}}
    <section id="tab-spotlight" class="tab-panel spotlight-wrap bg-gray-50 p-4 rounded-lg">

        <header class="spotlight-header reveal reveal--1">
            <p class="spotlight-header__eyebrow">Featured {</p>
            <h2 class="spotlight-header__name">{{ $s['name'] }}</h2>
            <p class="spotlight-header__aliases">{{ $s['aliases'] }}</p>
          
            <p class="spotlight-header__creator">  Creator of: <a href="{{ $s['created_url'] }}">{{ $s['created'] }}</a>
            </p> <span class="spotlight-header__eyebrow">}</span>
        </header>

        <article class="spotlight-card reveal reveal--2">

            <div class="spotlight-card__image-pane">
                <img src="{{ $s['image'] }}"
                     alt="Profile photo of {{ $s['name'] }}"
                     class="spotlight-card__img"
                     loading="eager">

                {{--
                    FIX: badge order — Vetted (credential) on top,
                         Potato_Cam (fun/secondary) below.
                         Switched from nth-child to explicit classes
                         so markup order has no effect on positioning.
                --}}
                <div class="img-badge img-badge--vetted">
                    
                    <span class="label" style="color:#fff; font-size:0.55rem;">{{ $s['badge'] }}</span>
                </div>
                <div class="img-badge img-badge--secondary"> <span class="img-badge__dot"></span>
                    <span class="label" style="color:#777; font-size:0.52rem;">Potato_Cam</span>
                </div>
            </div>

            <div class="spotlight-card__info">
                <blockquote class="spotlight-card__quote">
                    &ldquo;{{ $s['quote'] }}&rdquo;
                </blockquote>

                <div class="info-row">
                    <p class="info-row__label">Favorite Tech Stack</p>
                    <p class="info-row__value">{{ $s['stack'] }}</p>
                </div>
                 <div class="info-row">
                    <p class="info-row__label">Current Tech Stack</p>
                    <p class="info-row__value">{{ $s['current_stack'] }}</p>
                </div>
                <div class="info-row">
                    <p class="info-row__label">Base of Operations</p>
                    <p class="info-row__value">{{ $s['locations'] }}</p>
                </div>
                <div class="info-row">
                    <p class="info-row__label">Socials</p>
                    <p class="info-row__value">
                        <a href="{{ $s['im_url'] }}" target="_blank" rel="noopener">newyork.dev/im/bobby</a><br>
                        repo.or.cz/??? &mdash;
                        <a href="{{ $s['github'] }}" target="_blank" rel="noopener">{{ $s['github'] }}</a>
                    </p>
                </div>
                <div class="info-row">
                    <p class="info-row__label">Secret Sauce</p>
                    <p class="info-row__value">{{ $s['method'] }}</p>
                </div>
                <div class="info-row">
                    <p class="info-row__label">The Real Secret Sauce</p>
                    <p class="info-row__value">{{ $s['real_method'] }}</p>
                </div>

 <div class="info-row">
 <a href="/nominate" class="" style="color: var(--clr-accent); text-decoration: none;"> Nominate a Builder |</a>
 <br> <a href="/nominate" class="info-row__value" style="color: var(--clr-accent); text-decoration: none;">   See All Founding Members</a>  
</div>
            </div>


{{-- col 3 --}}
<div class="new px-2 py-8">
     <div class=" mx-auto max-w-2xl text-center">
          <h3 class="project-blurb__name font-bold"> Featured Project: 
          <br>   <a href="{{ $b['url'] }}" class="project-blurb__link text-indigo-500">{{ $b['label'] }}</a>  — The Scranton Branch  
 
                   
                </h3>
            </div>
   {{-- ── BANNER ── --}}
        <a href="{{ $b['url'] }}"
           class="site-banner reveal reveal--3"
           style="--banner-img: url('{{ $b['image'] }}')"
           aria-label="Visit {{ $b['label'] }}">
            <div class="site-banner__overlay" aria-hidden="true"></div>
            <div class="site-banner__label">
                <span class="site-banner__title">{{ $b['label'] }}</span>
                <span class="site-banner__cta">click to visit &rarr;&rarr;</span>
            </div>
        </a>

        {{-- ── PROJECT DESCRIPTION ── --}}
        <div class="project-blurb reveal reveal--3 mt-8 mb-8 px-8 sm:px-12">
            <div class="project-blurb__left">
                <p class="label" style="color: var(--clr-accent); margin:0 0 0.4rem;">About the Project</p>
               
                 <p class="project-blurb__tagline font-black my-4">{{ $b['tagline'] }}</p>
            </div>
            <p class="project-blurb__desc">{{ $b['description'] }}</p>
        </div>
    </div>

            
        </article>


   <div class="info-row">   <p class="info-row__label">NewYork.dev</p>   </div>
 </section>
    
        {{-- ── BANNER ── --}}
        <a href="{{ $b['url'] }}"
           class="site-banner reveal reveal--3"
           style="--banner-img: url('{{ $b['image'] }}')"
           aria-label="Visit {{ $b['label'] }}">
            <div class="site-banner__overlay" aria-hidden="true"></div>
            <div class="site-banner__label">
                <span class="site-banner__title">{{ $b['label'] }}</span>
                <span class="site-banner__cta">click to visit &rarr;&rarr;</span>
            </div>
        </a>

        {{-- ── PROJECT DESCRIPTION ── --}}
        <div class="project-blurb reveal reveal--3 mt-8 mb-16 px-16">
            <div class="project-blurb__left">
                <p class="label" style="color: var(--clr-accent); margin:0 0 0.4rem;">About the Project</p>
                <h3 class="project-blurb__name ">
                    <a href="{{ $b['url'] }}" class="project-blurb__link">{{ $b['label'] }}</a>
                </h3>
                 <p class="project-blurb__tagline font-black my-4">{{ $b['tagline'] }}</p>
            </div>
            <p class="project-blurb__desc">{{ $b['description'] }}</p>
        </div>

    </section>

        {{-- ── EDITORIAL HEADER ── --}}
    <div class="editorial-header reveal reveal--1">
        <div class="editorial-header__eyebrow">
            <span class="issue-badge">NEWYORK</span>
            <span class="issue-rule" aria-hidden="true"></span>
            <span class="label" style="color: var(--clr-muted); ">thebay &bull; THEPNW  &bull; ONTARIO &bull; Austintx &bull; dfwtx &bull; 
                WASHINGTON<b>DC</b>  </span>
        </div>
        <h1 class="editorial-header__title">
           <em>Best  Devs</em><br>&amp; Startups
        </h1>
        <div class="editorial-header__meta">
            <span class="meta-chip">Discover  Verified Builders</span>
            
        </div>
    </div>

    {{-- ── DIRECTORY TAB ── --}}
    <section id="tab-directory" class="tab-panel is-hidden">
        <h2 style="font-size:0.65rem; font-family:var(--font-ui); font-weight:700;
                   letter-spacing:0.15em; text-transform:uppercase;
                   margin-bottom:1.5rem;
                   border-left:2px solid var(--clr-accent); padding-left:0.75rem;">
            Verified Builders
        </h2>
        <div style="display:flex; flex-direction:column; gap:0.5rem;">
            {{-- Laravel: @foreach($builders as $builder) @include('partials.directory-row') @endforeach --}}
            <div class="directory-row">
                <span style="font-weight:600; font-size:0.8rem;">John_Smith</span>
                <span class="badge-verified">Verified</span>
            </div>
        </div>
    </section>

</main>

{{-- CHANGE: richer get-featured strip at bottom --}}
<a href="/getfeatured" class="get-featured">
    <span class="text-gray-300">Get Featured on {{ $page_data['site_name'] }}</span>
    <span class="get-featured__arrow">&rarr;&rarr;</span>
</a>

<footer class="site-footer bg-black">
    <span>&copy; 2026  {{ $page_data['site_name'] }}</span>
    <span class="footer-right">  TBC &#9829; </span>
</footer>

<script>
(() => {
    'use strict';

    /* ── Tabs ── */
    const panels  = document.querySelectorAll('.tab-panel');
    const navBtns = document.querySelectorAll('[data-tab]');

    function activateTab(tabName) {
        panels.forEach(p => {
            const hit = p.id === 'tab-' + tabName;
            p.classList.toggle('is-hidden', !hit);
            p.setAttribute('aria-hidden', String(!hit));
        });
        navBtns.forEach(b => {
            b.classList.toggle('is-active', b.dataset.tab === tabName);
        });
    }

    document.addEventListener('click', e => {
        const btn = e.target.closest('[data-tab]');
        if (btn) { activateTab(btn.dataset.tab); closeMobile(); }
    });

    /* ── Mobile menu ── */
    const toggle = document.getElementById('menu-toggle');
    const drawer = document.getElementById('mobile-menu');

    function closeMobile() {
        drawer.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.textContent = '\u2630';
    }

    toggle.addEventListener('click', () => {
        const isOpen = drawer.classList.contains('is-open');
        if (isOpen) {
            closeMobile();
        } else {
            drawer.classList.add('is-open');
            toggle.setAttribute('aria-expanded', 'true');
            toggle.textContent = '\u2715';
        }
    });

    /* ── CHANGE: sticky nav scroll shadow ── */
    const nav = document.getElementById('site-nav');
    const scrollObserver = new IntersectionObserver(
        ([e]) => nav.classList.toggle('is-scrolled', e.intersectionRatio < 1),
        { threshold: [1], rootMargin: '-1px 0px 0px 0px' }
    );
    scrollObserver.observe(nav);

    /* ── Cleanup will-change after animation ── */
    document.querySelectorAll('.reveal').forEach(el =>
        el.addEventListener('animationend', () => { el.style.willChange = 'auto'; }, { once: true })
    );
})();
</script>

</body>
</html>