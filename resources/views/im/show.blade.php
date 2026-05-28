<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $member['name'] }} // newyork.dev</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --clr-bg:         #f8f8f6;
            --clr-surface:    #ffffff;
            --clr-ink:        #111110;
            --clr-muted:      #6b6b68;
            --clr-nav-bg:     #0a0a0a;
            --clr-nav-ink:    #c8c8c0;
            --clr-accent:     #7c73e6;
            --clr-accent-dim: rgba(124,115,230,0.12);
            --clr-border:     #e4e4e0;
            --font-ui:        'JetBrains Mono', monospace;
            --font-body:      'Space Grotesk', sans-serif;
            --ease-expo:      cubic-bezier(0.16, 1, 0.3, 1);
        }

        *, *::before, *::after { box-sizing: border-box; }
        html  { background: var(--clr-bg); }
        body  {
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
            padding: 1rem 1.5rem;
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
            color: #949495;
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
        }
        .nav-links__btn:hover { color: #fff; }
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: #fff;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.25rem;
            line-height: 1;
        }
        .mobile-menu {
            display: none;
            background: var(--clr-nav-bg);
            padding: 1rem 1.5rem 1.5rem;
            border-top: 1px solid #1f1f1f;
            gap: 0.75rem;
        }
        .mobile-menu.is-open { display: grid; }

        @@media (max-width: 767px) {
            .menu-toggle  { display: block; }
            .nav-desktop  { display: none; }
            .site-nav__date { display: none; }
        }

        /* ── CREDENTIAL STAMP ──
           This is the key element that makes the /im/ page feel like
           an archival document rather than a spotlight billboard.
           Quiet authority, not loud promotion.
        */
        .credential {
            border-left: 3px solid var(--clr-accent);
            padding: 1.5rem 2rem;
            background: var(--clr-surface);
            border-bottom: 1px solid var(--clr-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .credential__handle {
            font-family: var(--font-ui);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--clr-accent);
        }
        .credential__meta {
            font-family: var(--font-ui);
            font-size: 0.6rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--clr-muted);
            display: flex;
            gap: 1.5rem;
        }
        .credential__badge {
            font-family: var(--font-ui);
            font-size: 0.55rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            background: var(--clr-accent-dim);
            color: var(--clr-accent);
            border: 1px solid var(--clr-accent);
            padding: 0.25rem 0.6rem;
        }

        /* ── PROFILE CARD ──
           Quieter than the homepage spotlight.
           Light background, document feel.
        */
        .profile-card {
            display: grid;
            border: 1px solid var(--clr-border);
            background: var(--clr-surface);
            overflow: hidden;
        }
        @@media (min-width: 768px) {
            .profile-card { grid-template-columns: 280px 1fr; }
        }
        .profile-card__image-pane {
            position: relative;
            height: 16rem;
            overflow: hidden;
            background: #1a1a1a;
        }
        @@media (min-width: 768px) {
            .profile-card__image-pane { height: auto; }
        }
        .profile-card__img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(20%);
            transition: filter 0.4s var(--ease-expo), transform 0.6s var(--ease-expo);
            will-change: transform;
        }
        .profile-card__image-pane:hover .profile-card__img {
            filter: grayscale(0%);
            transform: scale(1.03);
        }
        .img-badge {
            position: absolute;
            left: 1rem;
            background: rgba(10,10,10,0.85);
            backdrop-filter: blur(6px);
            border: 1px solid rgba(124,115,230,0.4);
            padding: 0.25rem 0.6rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }
        .img-badge:nth-child(2) { top: 1rem; }
        .img-badge:nth-child(3) { top: 2.5rem; }
        .img-badge__dot {
            width: 0.4rem; height: 0.4rem;
            background: var(--clr-accent);
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }
        @@keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: 0.4; transform: scale(0.75); }
        }

        .profile-card__info {
            padding: 2rem 2.5rem;
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }
        .profile-card__name {
            font-size: clamp(1.4rem, 3vw, 1.9rem);
            font-weight: 800;
            letter-spacing: -0.02em;
            line-height: 1.1;
            margin: 0;
        }
        .profile-card__aliases {
            font-family: var(--font-ui);
            font-size: 0.65rem;
            color: var(--clr-muted);
            line-height: 1.7;
        }
        .profile-card__quote {
            font-family: Georgia, serif;
            font-style: italic;
            font-size: 0.95rem;
            line-height: 1.65;
            color: #444;
            border-left: 2px solid var(--clr-border);
            padding-left: 1rem;
            margin: 0;
        }
        .info-row { display: flex; flex-direction: column; gap: 0.2rem; }
        .info-label {
            font-family: var(--font-ui);
            font-size: 0.575rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--clr-muted);
        }
        .info-value {
            font-family: var(--font-ui);
            font-size: 0.72rem;
            color: var(--clr-ink);
            line-height: 1.6;
        }
        .info-value a { color: var(--clr-accent); text-decoration: none; }
        .info-value a:hover { text-decoration: underline; }

        /* ── PROMOTED PROJECT ──
           This is what they were building at time of feature.
           Slightly elevated — it's the thing they paid to promote.
        */
        .promoted {
            border: 1px solid var(--clr-border);
            border-left: 3px solid var(--clr-accent);
            background: var(--clr-surface);
            padding: 1.5rem 2rem;
        }
        .promoted__eyebrow {
            font-family: var(--font-ui);
            font-size: 0.575rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--clr-muted);
            margin-bottom: 0.5rem;
        }
        .promoted__name {
            font-family: var(--font-ui);
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: -0.01em;
            color: var(--clr-ink);
            text-decoration: none;
            transition: color 0.15s;
        }
        .promoted__name:hover { color: var(--clr-accent); }
        .promoted__desc {
            font-size: 0.82rem;
            color: var(--clr-muted);
            margin-top: 0.4rem;
            line-height: 1.6;
        }

        /* ── CURRENT SPOTLIGHT PROMO ──
           Dynamic bottom section — who's on the homepage right now.
           Draws the visitor back to the main site.
        */
        .current-spotlight {
            background: #0f0f0f;
            color: #d4d4d0;
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            border-top: 1px solid #1f1f1f;
        }
        .current-spotlight__label {
            font-family: var(--font-ui);
            font-size: 0.575rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #555;
            margin-bottom: 0.4rem;
        }
        .current-spotlight__name {
            font-family: var(--font-ui);
            font-size: 0.9rem;
            font-weight: 700;
            color: #fff;
        }
        .current-spotlight__link {
            font-family: var(--font-ui);
            font-size: 0.625rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--clr-accent);
            text-decoration: none;
            border: 1px solid var(--clr-accent);
            padding: 0.5rem 1rem;
            transition: background 0.2s, color 0.2s;
        }
        .current-spotlight__link:hover {
            background: var(--clr-accent);
            color: #fff;
        }

        /* ── JOIN CTA ── */
        .join-cta {
            display: block;
            text-align: center;
            padding: 1.5rem;
            text-decoration: none;
            background: var(--clr-bg);
            border-top: 1px solid var(--clr-border);
            font-family: var(--font-ui);
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--clr-muted);
            transition: color 0.2s, background 0.2s;
        }
        .join-cta:hover { color: var(--clr-accent); background: var(--clr-accent-dim); }

        /* ── FOOTER ── */
        .site-footer {
            padding: 1.25rem;
            text-align: center;
            font-family: var(--font-ui);
            font-size: 0.55rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #9b9b96;
            border-top: 1px solid var(--clr-border);
        }

        @@keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .reveal { opacity: 0; animation: fadeUp 0.55s var(--ease-expo) forwards; }
        .reveal--1 { animation-delay: 0.05s; }
        .reveal--2 { animation-delay: 0.15s; }
        .reveal--3 { animation-delay: 0.25s; }
        .reveal--4 { animation-delay: 0.35s; }
    </style>
</head>
<body>

{{-- ── NAV ── --}}
<header class="site-nav" role="banner">
    <div class="site-nav__inner">
        <a href="/silicon" class="site-nav__logo">New<span>York.dev</span></a>
        <time class="site-nav__date">{{ date('F j, Y') }}</time>
        <nav class="nav-desktop" aria-label="Primary navigation">
            <ul class="nav-links" role="list">
                <li><a href="/" class="nav-links__btn">Spotlight</a></li>
                <li><a href="/im" class="nav-links__btn">Directory</a></li>
                <li><a href="/getfeatured" class="nav-links__btn">Get Featured</a></li>
            </ul>
        </nav>
        <button class="menu-toggle" id="menu-toggle" aria-controls="mobile-menu" aria-expanded="false">&#9776;</button>
    </div>
    <nav class="mobile-menu" id="mobile-menu">
        <a href="/" class="nav-links__btn">Spotlight</a>
        <a href="/im" class="nav-links__btn">Directory</a>
        <a href="/getfeatured" class="nav-links__btn">Get Featured</a>
    </nav>
</header>

{{-- ── CREDENTIAL STAMP ──
     The archival receipt. This is what makes the /im/ page feel
     like a permanent record rather than a profile page.
--}}
<div class="credential reveal reveal--1">
    <div>
        <div class="credential__handle">newyork.dev/im/{{ $member['handle'] ?? 'member' }}</div>
        <div style="font-size:0.7rem; margin-top:0.3rem; color: var(--clr-muted); font-family: var(--font-ui);">
            {{ $member['name'] }}
        </div>
    </div>
    <div class="credential__meta">
        <span>Featured :: {{ $member['date'] }}</span>
        <span>#{{ $member['number'] }}</span>
    </div>
    <span class="credential__badge">{{ $member['badge'] }}</span>
</div>

{{-- ── MAIN ── --}}
<main style="flex-grow:1; max-width: 64rem; margin: 0 auto; width: 100%; padding: 2.5rem 1.5rem;">

    {{-- Profile card --}}
    <article class="profile-card reveal reveal--2">

        <div class="profile-card__image-pane">
            <img
                src="{{ $member['image'] ?? '/img/placeholder.jpg' }}"
                alt="{{ $member['name'] }}"
                class="profile-card__img"
                loading="eager"
            >
            <div class="img-badge">
                <span style="font-family:var(--font-ui);font-size:0.55rem;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:#fff;">
                    {{ $member['badge'] }}
                </span>
            </div>
            <div class="img-badge">
                <span class="img-badge__dot"></span>
                <span style="font-family:var(--font-ui);font-size:0.55rem;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:#fff;">
                    Potato_Cam
                </span>
            </div>
        </div>

        <div class="profile-card__info">

            <div>
                <h1 class="profile-card__name">{{ $member['name'] }}</h1>
                <p class="profile-card__aliases">{{ $member['aliases'] ?? '' }}</p>
            </div>

            @if(!empty($member['quote']))
            <blockquote class="profile-card__quote">&ldquo;{{ $member['quote'] }}&rdquo;</blockquote>
            @endif

            <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
                <div class="info-row">
                    <span class="info-label">Stack</span>
                    <span class="info-value">{{ $member['stack'] }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Base</span>
                    <span class="info-value">{{ $member['location'] }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Github</span>
                    <span class="info-value">
                        <a href="{{ $member['github'] }}" target="_blank" rel="noopener">{{ $member['github'] }}</a>   
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Secret Sauce</span>
                    <span class="info-value">{{ $member['method'] }}</span>
                    <span class="info-label">Real Secret Sauce</span>
                    <span class="info-value">{{ $member['real_method'] }}</span>
                </div>
            </div>

        </div>
    </article>

    {{-- Promoted project --}}
    <div class="promoted reveal reveal--3" style="margin-top: 1.5rem;">
        <p class="promoted__eyebrow">Promoted during spotlight // {{ $member['date'] }}</p>
        <a href="{{ $member['promoted_url'] ?? '#' }}" class="promoted__name" target="_blank" rel="noopener">
            {{ $member['promoted'] ?? 'Scranton.dev' }}
        </a>
        @if(!empty($member['promoted_desc']))
        <p class="promoted__desc">{{ $member['promoted_desc'] }}</p>
        @endif
    </div>

</main>

{{-- ── CURRENT SPOTLIGHT PROMO ──
     Always shows who is live on the homepage right now.
     Draws the visitor back and demonstrates the product.
     In Laravel: pass $currentSpotlight from controller.
--}}
<div class="current-spotlight reveal reveal--4">
    <div>
        <p class="current-spotlight__label">Currently on the homepage</p>
        <p class="current-spotlight__name">
            {{-- Laravel: {{ $currentSpotlight['name'] }} --}}
            Rob 'Bobby' Fantana
        </p>
    </div>
    <a href="/" class="current-spotlight__link">View Current Spotlight &rarr;</a>
</div>

{{-- ── JOIN CTA ── --}}
<a href="/getfeatured" class="join-cta">
    &#10022; Want your own newyork.dev page?
</a>

<footer class="site-footer">
    2026 // newyork.dev &mdash; <a href="/im" style="color:var(--clr-accent);text-decoration:none;">View all members</a>
</footer>

<script>
(() => {
    const toggle = document.getElementById('menu-toggle');
    const drawer = document.getElementById('mobile-menu');

    toggle.addEventListener('click', () => {
        const open = drawer.classList.contains('is-open');
        drawer.classList.toggle('is-open', !open);
        toggle.setAttribute('aria-expanded', String(!open));
        toggle.textContent = open ? '\u2630' : '\u2715';
    });

    document.querySelectorAll('.reveal').forEach(el =>
        el.addEventListener('animationend', () => { el.style.willChange = 'auto'; }, { once: true })
    );
})();
</script>

</body>
</html>