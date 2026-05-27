@php
$page_data = [
    'site_name'    => 'newyork.dev',
    'current_date' => date('F j, Y'),
    'spotlight' => [
        'name'        => "Rob 'Bobby' Fantana",
        'aliases'     => "Native, Fanta, Fantana, Robbo, ElBoberino, Bober, Gandalf the Wiseguy, &lt;redacted&gt;, Yo Bobbbbaaayy, MC BO!",
        'created'     => 'Scranton.dev',
        'created_url' => '/',
        'badge'       => 'Vetted',
        'image'       => '/img/sc6.jpg',
        'quote'       => "My code? 60% of the time it works Everytime!",
        'stack'       => 'I Love LAMP / XAMPP // PHP Tools // VB6 // Obj-C',
        'locations'   => 'Toronto (3d/wk) // NiagaraFalls, NY // Tricity, PL // Mordor (Orky Waaaagh!)',
        'im_url'      => '/im/bobby',
        'github'      => 'https://github.com/rvfpl',
        'method'      => 'Old Code, Low Code, Break Shit, Eat Stuff, Refactor. Quabity Ashuance, Repeat. Always Repeat.',
        'real_method' => 'RTD, KISS, Coffee, The Office Reruns',
    ],
    'banner' => [
        'image' => '/img/scindex.jpg',
        'url'   => '/',
        'label' => 'scranton.dev',
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
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    {{--
        No @verbatim wrapper needed.
        CSS @ rules are escaped as @@ so Blade outputs a literal @ character.
        @keyframes  →  @@keyframes
        @media      →  @@media
        Any other lone @ in CSS must also be doubled.
    --}}
    <style>
        :root {
            --clr-bg:         #f8f8f6;
            --clr-surface:    #ffffff;
            --clr-ink:        #111110;
            --clr-muted:      #6b6b68;
            --clr-nav-bg:     #0a0a0a;
            --clr-nav-ink:    #c8c8c0;
            --clr-accent:     #7c73e6;
            --clr-accent-dim: rgba(124,115,230,0.15);
            --clr-border:     #e4e4e0;
            --font-ui:        'JetBrains Mono', monospace;
            --font-body:      'Space Grotesk', sans-serif;
            --ease-expo:      cubic-bezier(0.16, 1, 0.3, 1);
        }

        *, *::before, *::after { box-sizing: border-box; }

        html { background: var(--clr-bg); scroll-behavior: smooth; }
        body {
            font-family: var(--font-body);
            color: var(--clr-ink);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
            margin: 0;
        }

        /* ── NAV ── */
        .site-nav {
            background: var(--clr-nav-bg);
            color: var(--clr-nav-ink);
            border-bottom: 1px solid #1f1f1f;
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .site-nav__inner {
            max-width: 72rem;
            margin: 0 auto;
            padding: 0.5rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .site-nav__logo {
            font-family: var(--font-ui);
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: -0.03em;
            text-decoration: none;
            color: var(--clr-nav-ink);
        }
        .site-nav__logo span { color: var(--clr-accent); }
        .site-nav__date {
            font-family: var(--font-ui);
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #4a4a45;
        }
        .nav-links { display: flex; gap: 2rem; list-style: none; margin: 0; padding: 0; }
        .nav-links__btn {
            font-family: var(--font-ui);
            font-size: 0.625rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            background: none;
            border: none;
            color: var(--clr-nav-ink);
            cursor: pointer;
            padding: 0.25rem 0;
            border-bottom: 1px solid transparent;
            transition: color 0.2s, border-color 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        .nav-links__btn:hover     { color: #fff; }
        .nav-links__btn.is-active { color: var(--clr-accent); border-bottom-color: var(--clr-accent); }
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: #fff;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.25rem;
            line-height: 1;
            transition: transform 0.15s var(--ease-expo);
        }
        .menu-toggle:active { transform: scale(0.88); }
        .mobile-menu {
            display: none;
            background: var(--clr-nav-bg);
            padding: 1rem 1.5rem 1.5rem;
            border-top: 1px solid #1f1f1f;
            gap: 0.75rem;
        }
        .mobile-menu.is-open { display: grid; }
        .mobile-menu .nav-links__btn { font-size: 0.7rem; padding: 0.5rem 0; }

        @@media (min-width: 768px) {
            .menu-toggle { display: none; }
            .mobile-menu { display: none !important; }
            .nav-links   { display: flex; }
        }
        @@media (max-width: 767px) {
            .menu-toggle    { display: block; }
            .nav-desktop    { display: none; }
            .site-nav__date { display: none; }
        }

        /* ── TABS ── */
        .tab-panel.is-hidden { display: none; }

        /* ── SPOTLIGHT CARD ── */
        .spotlight-card {
            display: grid;
            border: 1px solid var(--clr-border);
            background: var(--clr-surface);
            overflow: hidden;
        }
        @@media (min-width: 768px) {
            .spotlight-card { grid-template-columns: 1fr 1fr; }
        }
        .spotlight-card__image-pane {
            position: relative;
            height: 18rem;
            overflow: hidden;
        }
        @@media (min-width: 768px) {
            .spotlight-card__image-pane { height: auto; min-height: 24rem; }
        }
        .spotlight-card__img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border: 4px solid var(--clr-accent);
            transition: transform 0.6s var(--ease-expo);
            will-change: transform;
        }
        .spotlight-card__image-pane:hover .spotlight-card__img { transform: scale(1.04); }
        .img-badge {
            position: absolute;
            left: 1rem;
            background: rgba(10,10,10,0.85);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            border: 1px solid rgba(124,115,230,0.4);
            padding: 0.25rem 0.6rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }
        .img-badge:nth-child(2) { top: 1rem; }    /* Vetted_Dev */
.img-badge:nth-child(3) { top: 2.5rem; }  /* Potato_Cam */
        .img-badge__dot {
            width: 0.4rem;
            height: 0.4rem;
            background: var(--clr-accent);
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }
        @@keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: 0.4; transform: scale(0.75); }
        }
        .spotlight-card__info {
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #0f0f0f;
            color: #d4d4d0;
            gap: 1.5rem;
        }
        .spotlight-card__quote {
            font-family: Georgia, 'Times New Roman', serif;
            font-style: italic;
            font-size: 1.1rem;
            line-height: 1.6;
            color: #e8e8e4;
            border-left: 2px solid var(--clr-accent);
            padding-left: 1rem;
            margin: 0;
        }
        .info-row__value {
            font-family: var(--font-ui);
            font-size: 0.75rem;
            margin-top: 0.3rem;
            line-height: 1.6;
            color: #a0a09c;
        }
        .info-row__value a { color: var(--clr-accent); text-decoration: none; transition: color 0.15s; }
        .info-row__value a:hover { color: #a09fe8; }

        /* ── BANNER ── */
        .site-banner {
            position: relative;
            width: 100%;
            height: 16rem;
            background-image: var(--banner-img);
            background-size: cover;
            background-position: center;
            overflow: hidden;
            display: block;
            text-decoration: none;
            margin-top: 3rem;
        }
        .site-banner__overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.45);
            transition: background 0.45s var(--ease-expo);
        }
        .site-banner:hover .site-banner__overlay { background: rgba(0,0,0,0.18); }
        .site-banner__label {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            height: 100%;
            font-family: var(--font-ui);
            font-size: clamp(1.5rem, 5vw, 2.5rem);
            font-weight: 900;
            color: #fff;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }
        .site-banner__cta { font-size: 0.75rem; letter-spacing: 0.12em; opacity: 0.7; }

        /* ── DIRECTORY ── */
        .directory-row {
            padding: 1rem 1.25rem;
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
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
        }

        /* ── GET FEATURED ── */
        .get-featured {
            display: block;
            text-align: center;
            padding: 1.5rem;
            text-decoration: none;
            border-top: 1px solid var(--clr-border);
            border-left: 3px solid var(--clr-accent);
            font-family: var(--font-ui);
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--clr-muted);
            transition: color 0.2s, background 0.2s;
        }
        .get-featured:hover { color: var(--clr-accent); background: var(--clr-accent-dim); }

        /* ── REVEAL ANIMATIONS ── */
        @@keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .reveal {
            opacity: 0;
            animation: fadeUp 0.65s var(--ease-expo) forwards;
            will-change: transform, opacity;
        }
        .reveal--1 { animation-delay: 0.05s; }
        .reveal--2 { animation-delay: 0.18s; }
        .reveal--3 { animation-delay: 0.32s; }

        /* ── FOOTER ── */
        .site-footer {
            margin-top: auto;
            padding: 1.5rem;
            text-align: center;
            font-family: var(--font-ui);
            font-size: 0.55rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #9b9b96;
            border-top: 1px solid var(--clr-border);
        }

        /* ── UTIL ── */
        .label {
            font-family: var(--font-ui);
            font-size: 0.625rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }
        .label--accent { color: var(--clr-accent); }
    </style>
</head>

<body>

<header class="site-nav" role="banner">
    <div class="site-nav__inner">
        <a href="/" class="site-nav__logo">New<span>York.dev</span></a>
        <time class="site-nav__date text-white" datetime="{{ date('Y-m-d') }}">{{ $page_data['current_date'] }}</time>
        <nav class="nav-desktop" aria-label="Primary navigation">
            <ul class="nav-links" role="list">
                <li><button class="nav-links__btn is-active" data-tab="spotlight">Spotlight</button></li>
                <li><button class="nav-links__btn" data-tab="directory">Directory</button></li>
                <li><a href="#founding-members" class="nav-links__btn">Founding Members</a></li>
                <li><a href="#blog" class="nav-links__btn">Blog</a></li>
            </ul>
        </nav>
        <button class="menu-toggle" id="menu-toggle" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle menu">&#9776;</button>
    </div>
    <nav class="mobile-menu" id="mobile-menu" aria-label="Mobile navigation">
        <button class="nav-links__btn is-active" data-tab="spotlight">Spotlight</button>
        <button class="nav-links__btn" data-tab="directory">Directory</button>
        <a href="#founding-members" class="nav-links__btn">Founding Members</a>
        <a href="#blog" class="nav-links__btn">Blog</a>
    </nav>
</header>

<main style="flex-grow:1; padding: 3rem 1.5rem; max-width: 64rem; margin: 0 auto; width: 100%;">


<section style="margin-bottom: 3rem;">Get you ass(face) featured.
</section>

    {{-- SPOTLIGHT TAB --}}
    <section id="tab-spotlight" class="tab-panel">

        <header class="reveal reveal--1 " style="margin-bottom: 2.5rem; ">
            <p class="label label--accent">Featured &#123;</p>
            <h1 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.02em; margin: 0.4rem 0 0.25rem; line-height: 1.1;">
               YOUR NAME
            </h1>
            {{-- {!! intentional: string contains pre-escaped HTML entity &lt;redacted&gt; --}}
            <p style="font-size: 0.75rem; color: var(--clr-muted); font-family: var(--font-ui); margin-top: 0.25rem;">
               Your dumba aliases
            </p>
            <p style="font-size: 0.8rem; color: var(--clr-muted); margin-top: 0.4rem;">
                Creator of: <a href="{{ $s['created_url'] }}" style="color: var(--clr-accent); text-decoration: none; font-weight: 700;"> yourstuff / yoursite / yourapp</a>
            </p>
        </header>

        <article class="spotlight-card reveal reveal--2 ">
            <div class="spotlight-card__image-pane">
                <img src="{{ $s['image'] }}" alt="Profile photo of {{ $s['name'] }}" class="spotlight-card__img" loading="eager">
                <div class="img-badge"><span class="label" style="color:#fff;">{{ $s['badge'] }}</span></div>
                <div class="img-badge"><span class="img-badge__dot"></span><span class="label" style="color:#fff;">Potato_Cam</span></div>
            </div>
            <div class="spotlight-card__info">
                <blockquote class="spotlight-card__quote">&ldquo;{{ $s['quote'] }}&rdquo;</blockquote>
                <div class="info-row">
                    <p class="label" style="color:#555;">Favorite Tech Stack</p>
                    <p class="info-row__value">{{ $s['stack'] }}</p>
                </div>
                <div class="info-row">
                    <p class="label" style="color:#555;">Base of Operations</p>
                    <p class="info-row__value">{{ $s['locations'] }}</p>
                </div>
                <div class="info-row">
                    <p class="label" style="color:#555;">Socials</p>
                    <p class="info-row__value">
                        <a href="{{ $s['im_url'] }}" target="_blank" rel="noopener">newyork.dev/im/you</a><br>
                        <a href="{{ $s['github'] }}" target="_blank" rel="noopener">{{ $s['github'] }}</a><br>
                         
                    </p>
                </div>
                <div class="info-row">
                    <p class="label" style="color:#555;">Secret Sauce</p>
                    <p class="info-row__value">{{ $s['method'] }}</p>
                </div>
                <div class="info-row">
                    <p class="label" style="color:#555;">The REAL Secret Sauce</p>
                    <p class="info-row__value">{{ $s['real_method'] }}</p>
                </div>
            </div>
        </article>

        <a href="{{ $b['url'] }}"
           class="site-banner reveal reveal--3"
           style="--banner-img: url('{{ $b['image'] }}')"
           aria-label="Visit {{ $b['label'] }}">
            <div class="site-banner__overlay" aria-hidden="true"></div>
            <div class="site-banner__label">
                {{ $b['label'] }}
                <span class="site-banner__cta">[click to visit]</span>
            </div>
        </a>

    </section>

    {{-- DIRECTORY TAB --}}
    <section id="tab-directory" class="tab-panel is-hidden">
        <h2 style="font-size:0.7rem; font-family:var(--font-ui); font-weight:700; letter-spacing:0.15em; text-transform:uppercase; margin-bottom:1.5rem; border-left:2px solid var(--clr-accent); padding-left:0.75rem;">
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

<a href="/getfeatured" class="get-featured">&#10022; Get Featured</a>

<footer class="site-footer">2026 // {{ $page_data['site_name'] }}</footer>

<script>
(() => {
    'use strict';

    const panels  = document.querySelectorAll('.tab-panel');
    const navBtns = document.querySelectorAll('[data-tab]');

    function activateTab(tabName) {
        panels.forEach(p => {
            const hit = p.id === 'tab-' + tabName;
            p.classList.toggle('is-hidden', !hit);
            p.setAttribute('aria-hidden', String(!hit));
        });
        navBtns.forEach(b => {
            const active = b.dataset.tab === tabName;
            b.classList.toggle('is-active', active);
        });
    }

    document.addEventListener('click', e => {
        const btn = e.target.closest('[data-tab]');
        if (btn) { activateTab(btn.dataset.tab); closeMobile(); }
    });

    const toggle = document.getElementById('menu-toggle');
    const drawer = document.getElementById('mobile-menu');

    function closeMobile() {
        drawer.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.textContent = '\u2630';
    }

    toggle.addEventListener('click', () => {
        const open = drawer.classList.contains('is-open');
        open ? closeMobile() : (() => {
            drawer.classList.add('is-open');
            toggle.setAttribute('aria-expanded', 'true');
            toggle.textContent = '\u2715';
        })();
    });

    document.querySelectorAll('.reveal').forEach(el =>
        el.addEventListener('animationend', () => { el.style.willChange = 'auto'; }, { once: true })
    );
})();
</script>

</body>
</html>