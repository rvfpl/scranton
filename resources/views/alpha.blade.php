 cat > /mnt/user-data/outputs/newyork-newspaper-jobs.php << 'PHPEOF'
<?php
require_once __DIR__ . '/data/data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="NewYork.dev — Developer jobs across New York State. Browse roles in NYC, Buffalo, Rochester, Syracuse, Albany and beyond.">
  <meta name="csrf-token" content="<?= e($csrf) ?>">
  <title>Dev Jobs · NewYork.dev | The Developer's Record</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Lora:ital,wght@0,400;0,600;1,400&family=JetBrains+Mono:wght@400;600&family=Barlow+Condensed:wght@600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,
    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'>
      <rect width='32' height='32' rx='4' fill='%230d0d0d'/>
      <circle cx='16' cy='16' r='8' fill='%23C0362C'/>
    </svg>">
  <link rel="stylesheet" href="css/nycss.css">
str: n4CUWxBYnDt39Jx
  <style>
    /* ── JOB BOARD VARIABLES (newspaper palette) ── */
    :root {
      --job-ink:     #0d0d0d;
      --job-paper:   #faf9f7;
      --job-rule:    #d4d0cb;
      --job-muted:   #6b6860;
      --job-accent:  #C0362C;
      --job-accent2: #1a4a8a;
      --job-salary:  #1a4a8a;
      --job-radius:  3px; /* intentionally tight — newspaper feel */
    }

    /* ── LOCATION FILTER STRIP ── */
    .loc-strip {
      display: flex;
      align-items: center;
      gap: 0;
      overflow-x: auto;
      border-top: 1px solid var(--job-rule);
      border-bottom: 3px double var(--job-rule);
      scrollbar-width: none;
    }
    .loc-strip::-webkit-scrollbar { display: none; }

    .loc-pill {
      flex-shrink: 0;
      padding: 7px 14px;
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: .12em;
      text-transform: uppercase;
      color: var(--job-muted);
      border: none;
      border-right: 1px solid var(--job-rule);
      background: transparent;
      cursor: pointer;
      transition: color .12s, background .12s;
      white-space: nowrap;
    }
    .loc-pill:first-child { border-left: none; }
    .loc-pill:hover  { color: var(--job-ink); background: rgba(0,0,0,.04); }
    .loc-pill.active {
      color: #fff;
      background: var(--job-accent);
      border-right-color: var(--job-accent);
    }

    /* ── SORT STRIP ── */
    .sort-strip {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 8px 0;
      border-bottom: 1px solid var(--job-rule);
      gap: 8px;
      flex-wrap: wrap;
    }
    .sort-tabs { display: flex; gap: 0; }
    .sort-tab {
      padding: 4px 10px;
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: .1em;
      text-transform: uppercase;
      color: var(--job-muted);
      border: 1px solid transparent;
      border-radius: var(--job-radius);
      background: none;
      cursor: pointer;
      transition: all .1s;
    }
    .sort-tab:hover  { color: var(--job-ink); }
    .sort-tab.active {
      color: var(--job-ink);
      border-color: var(--job-rule);
      background: rgba(0,0,0,.04);
    }
    .job-count {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      color: var(--job-muted);
    }

    /* ── SEARCH BAR ── */
    .job-search-wrap { position: relative; }
    .job-search {
      width: 100%;
      font-family: 'Lora', serif;
      font-size: 13px;
      padding: 7px 12px 7px 32px;
      border: 1px solid var(--job-rule);
      border-radius: var(--job-radius);
      background: var(--job-paper);
      color: var(--job-ink);
      outline: none;
      transition: border-color .15s;
    }
    .job-search:focus { border-color: var(--job-accent); }
    .job-search::placeholder { color: var(--job-muted); }
    .job-search-icon {
      position: absolute; left: 9px; top: 50%;
      transform: translateY(-50%);
      color: var(--job-muted);
      font-size: 14px;
      pointer-events: none;
    }

    /* ── JOB CARD (newspaper style) ── */
    .job-card {
      padding: 14px 0;
      border-bottom: 1px solid var(--job-rule);
      cursor: pointer;
      transition: background .12s;
      position: relative;
    }
    .job-card:first-child { border-top: 1px solid var(--job-rule); }
    .job-card:hover  { background: rgba(192,54,44,.03); }
    .job-card.selected {
      background: rgba(192,54,44,.05);
      padding-left: 10px;
      margin-left: -10px;
      border-left: 3px solid var(--job-accent);
      margin-right: -2px; /* compensate */
    }
    .job-card.featured::after {
      content: 'FEATURED';
      position: absolute; top: 14px; right: 0;
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 9px; font-weight: 700; letter-spacing: .12em;
      color: var(--job-accent);
      border: 1px solid var(--job-accent);
      padding: 1px 5px;
      border-radius: var(--job-radius);
    }

    .job-company {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 11px; font-weight: 700;
      letter-spacing: .12em; text-transform: uppercase;
      color: var(--job-accent);
      margin-bottom: 3px;
    }
    .job-title {
      font-family: 'Playfair Display', serif;
      font-size: 17px; font-weight: 700;
      line-height: 1.25;
      color: var(--job-ink);
      margin-bottom: 4px;
    }
    .job-title:hover { text-decoration: underline; text-underline-offset: 3px; }
    .job-meta {
      font-family: 'Lora', serif;
      font-size: 12px; color: var(--job-muted);
      display: flex; flex-wrap: wrap; align-items: center; gap: 4px;
      margin-bottom: 6px;
    }
    .job-meta-sep { color: var(--job-rule); }
    .job-salary {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px; font-weight: 600;
      color: var(--job-salary);
    }
    .job-tags { display: flex; flex-wrap: wrap; gap: 4px; }
    .job-tag {
      font-family: 'JetBrains Mono', monospace;
      font-size: 10px;
      padding: 2px 6px;
      border: 1px solid var(--job-rule);
      border-radius: var(--job-radius);
      color: var(--job-muted);
      background: transparent;
      cursor: pointer;
      transition: all .1s;
    }
    .job-tag:hover  { border-color: var(--job-ink); color: var(--job-ink); }
    .job-tag.active {
      border-color: var(--job-accent2);
      color: var(--job-accent2);
      background: rgba(26,74,138,.06);
    }

    /* video / save row */
    .job-card-foot {
      display: flex; align-items: center; justify-content: space-between;
      margin-top: 6px;
    }
    .job-vid-badge {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 10px; font-weight: 700; letter-spacing: .1em;
      color: #6b4fa0;
      border: 1px solid #b89ee0;
      padding: 1px 6px;
      border-radius: var(--job-radius);
      background: rgba(107,79,160,.06);
    }
    .job-save-btn {
      width: 26px; height: 26px;
      border: 1px solid var(--job-rule);
      border-radius: var(--job-radius);
      background: transparent;
      color: var(--job-muted);
      display: flex; align-items: center; justify-content: center;
      cursor: pointer;
      transition: all .12s;
    }
    .job-save-btn:hover  { border-color: var(--job-ink); color: var(--job-ink); }
    .job-save-btn.saved  { border-color: #b8860b; color: #b8860b; background: rgba(184,134,11,.08); }

    /* ── DETAIL PANEL (right col, newspaper feel) ── */
    .detail-panel {
      position: sticky;
      top: 80px;
      max-height: calc(100vh - 96px);
      overflow-y: auto;
      border: 1px solid var(--job-rule);
      border-radius: var(--job-radius);
      background: var(--job-paper);
      scrollbar-width: thin;
    }
    .detail-panel::-webkit-scrollbar { width: 3px; }
    .detail-panel::-webkit-scrollbar-thumb { background: var(--job-rule); }

    .detail-panel-bar {
      height: 3px;
      background: linear-gradient(90deg, var(--job-accent), #6b4fa0);
      opacity: 0;
      transition: opacity .2s;
    }
    .detail-panel.has-content .detail-panel-bar { opacity: 1; }

    .detail-inner { padding: 20px; }
    .detail-company {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 11px; font-weight: 700; letter-spacing: .14em;
      text-transform: uppercase; color: var(--job-accent);
      margin-bottom: 4px;
    }
    .detail-title {
      font-family: 'Playfair Display', serif;
      font-size: 20px; font-weight: 900;
      line-height: 1.2; color: var(--job-ink);
      margin-bottom: 6px;
    }
    .detail-meta {
      font-family: 'Lora', serif;
      font-size: 12px; color: var(--job-muted);
      display: flex; flex-wrap: wrap; gap: 4px; align-items: center;
      margin-bottom: 12px;
    }
    .detail-salary {
      font-family: 'JetBrains Mono', monospace;
      font-size: 15px; font-weight: 600;
      color: var(--job-salary);
      margin-bottom: 16px;
      display: block;
    }
    .detail-divider {
      height: 1px; background: var(--job-rule); margin: 16px 0;
    }
    .detail-label {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 10px; font-weight: 700;
      letter-spacing: .14em; text-transform: uppercase;
      color: var(--job-muted); margin-bottom: 8px;
    }
    .detail-body {
      font-family: 'Lora', serif;
      font-size: 13px; color: var(--job-muted);
      line-height: 1.75;
    }
    .detail-tags { display: flex; flex-wrap: wrap; gap: 5px; margin-bottom: 16px; }
    .detail-tag {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      padding: 3px 8px;
      border: 1px solid var(--job-rule);
      border-radius: var(--job-radius);
      color: var(--job-muted);
    }

    /* apply button — newspaper style */
    .apply-btn {
      display: inline-flex; align-items: center; justify-content: center; gap: 8px;
      padding: 10px 20px;
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 13px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
      background: var(--job-accent); color: #fff;
      border: none; cursor: pointer; text-decoration: none;
      transition: opacity .12s;
      flex: 1;
      border-radius: var(--job-radius);
    }
    .apply-btn:hover { opacity: .88; }

    /* video embed */
    .video-wrap {
      width: 100%; aspect-ratio: 16/9;
      border-radius: var(--job-radius);
      overflow: hidden;
      border: 1px solid var(--job-rule);
      background: #000;
      position: relative;
      margin-bottom: 16px;
    }
    .video-overlay {
      position: absolute; inset: 0;
      display: flex; align-items: center; justify-content: center;
      background: rgba(0,0,0,.45);
      cursor: pointer;
      transition: background .15s;
    }
    .video-overlay:hover { background: rgba(0,0,0,.6); }
    .play-circle {
      width: 48px; height: 48px;
      border-radius: 50%;
      border: 2px solid rgba(255,255,255,.6);
      background: rgba(0,0,0,.5);
      display: flex; align-items: center; justify-content: center;
    }

    /* promo (empty panel) */
    .panel-promo { padding: 20px; }
    .promo-eyebrow {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 10px; font-weight: 700;
      letter-spacing: .14em; text-transform: uppercase;
      color: var(--job-accent);
      display: flex; align-items: center; gap: 6px;
      margin-bottom: 12px;
    }
    .promo-dot {
      width: 6px; height: 6px;
      border-radius: 50%; background: var(--job-accent);
      animation: blink 2s ease-in-out infinite;
    }
    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:.25} }
    .panel-hint {
      font-family: 'Lora', serif;
      font-size: 12px; color: var(--job-muted);
      line-height: 1.65; margin-top: 8px;
    }

    /* ── EMPTY STATE ── */
    .jobs-empty {
      padding: 48px 0; text-align: center;
    }
    .jobs-empty-head {
      font-family: 'Playfair Display', serif;
      font-size: 20px; font-weight: 700; color: var(--job-ink);
      margin-bottom: 8px;
    }
    .jobs-empty-sub {
      font-family: 'Lora', serif;
      font-size: 13px; color: var(--job-muted);
    }

    /* ── TABLOID JOKE STRIP ── */
    .tabloid-strip {
      border-top: 3px double var(--job-rule);
      border-bottom: 3px double var(--job-rule);
      padding: 10px 0;
      margin: 20px 0;
      display: flex;
      gap: 24px;
      overflow-x: auto;
      scrollbar-width: none;
    }
    .tabloid-strip::-webkit-scrollbar { display: none; }
    .tabloid-item {
      flex-shrink: 0;
      max-width: 220px;
    }
    .tabloid-hed {
      font-family: 'Playfair Display', serif;
      font-size: 13px; font-weight: 700;
      font-style: italic;
      color: var(--job-ink);
      line-height: 1.3;
    }
    .tabloid-sub {
      font-family: 'Lora', serif;
      font-size: 11px; color: var(--job-muted);
      line-height: 1.5; margin-top: 2px;
    }
    .tabloid-tag {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 9px; font-weight: 700; letter-spacing: .1em;
      text-transform: uppercase; color: var(--job-accent);
      margin-bottom: 3px;
    }

    /* ── MOBILE SHEET ── */
    .sheet-backdrop {
      position: fixed; inset: 0; z-index: 200;
      background: rgba(0,0,0,.6);
      transition: opacity .2s;
    }
    .sheet {
      position: fixed; left: 0; right: 0; bottom: 0; z-index: 201;
      background: var(--job-paper);
      border-radius: 12px 12px 0 0;
      border-top: 4px solid var(--job-accent);
      max-height: 92dvh; overflow-y: auto;
      transition: transform .28s cubic-bezier(.32,0,.67,0);
    }
    .sheet.entering { transform: translateY(100%); }
    .sheet-handle {
      width: 36px; height: 4px;
      border-radius: 2px; background: var(--job-rule);
      margin: 12px auto 0;
    }

    /* ── ACTIVE FILTER CHIPS ── */
    .filter-chip {
      display: inline-flex; align-items: center; gap: 4px;
      padding: 2px 8px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      border: 1px solid var(--job-rule);
      border-radius: var(--job-radius);
      color: var(--job-muted);
      cursor: pointer;
      background: transparent;
      transition: all .1s;
    }
    .filter-chip:hover { border-color: var(--job-ink); color: var(--job-ink); }
  </style>
</head>

<body>

<!-- ════════════════════════════════════════════════
  TICKER (unchanged from original)
════════════════════════════════════════════════ -->
<div class="ticker-wrap" aria-label="Breaking news">
  <div class="ticker-label">BETA</div>
  <div class="ticker-track" aria-live="polite">
    <?php foreach (array_merge($tickerItems, $tickerItems) as $item): ?>
    <span><?= e($item) ?></span>
    <?php endforeach; ?>
  </div>
</div>

<!-- ════════════════════════════════════════════════
  UTILITY BAR (unchanged)
════════════════════════════════════════════════ -->
<div class="util-bar">
  <div class="max-w-7xl mx-auto px-4 py-1.5 flex justify-between items-center">
    <a href="/" class="reveal reveal-1 hidden md:block">EST<span class="tld">.</span>2026</a>
    <div class="flex items-center gap-3">
      <?php if ($weather): ?>
      <span><?= date('l, F j, Y') ?></span>
      <span class="text-gray-400">·</span>
      <span><?= e($weather) ?></span>
      <?php else: ?>
      <span><?= date('l, F j, Y') ?></span>
      <?php endif; ?>
    </div>
    <div class="flex items-center gap-4">
      <a href="/contact"><span class="text-gray-400">CONTACT</span></a>
      <a href="/login" class="hover:text-gray-800 transition-colors">Log in</a>
    </div>
  </div>
</div>

<!-- ════════════════════════════════════════════════
  MASTHEAD (unchanged)
════════════════════════════════════════════════ -->
<header class="masthead" id="masthead" role="banner">
  <div class="max-w-7xl mx-auto px-3 md:px-6">
    <div class="flex items-center justify-between gap-4 pb-1.5">

      <button class="hamburger mobile-only" id="hamburger-btn"
              aria-label="Open navigation" aria-expanded="false" aria-controls="mobile-drawer">
        <span></span><span></span><span></span>
      </button>

      <nav class="hidden md:flex items-center gap-1 flex-1" aria-label="Secondary navigation">
        <?php foreach (['Frontend', 'Backend', 'DevOps', 'Security', 'Open Source'] as $section): ?>
        <a href="/section/<?= slug($section) ?>"
           class="section-label hover:text-orange-700 transition-colors px-2 py-1">
          <?= e($section) ?>
        </a>
        <?php endforeach; ?>
      </nav>

      <div class="text-center flex-shrink-0">
        <a href="/" class="logo reveal reveal-1">NEWYORK<span class="tld">.</span>DEV</a>
        <p class="logo-sub reveal reveal-2">Allegedly, a Newspaper.</p>
      </div>

      <div class="flex-1 hidden md:flex items-center justify-end gap-3">
        <form action="/search" method="GET" class="search-wrapper desktop-search" role="search">
          <input type="search" name="q" class="search-input" placeholder="Search the Record…"
                 aria-label="Search articles" id="site-search" autocomplete="off"
                 value="<?= e($_GET['q'] ?? '') ?>">
          <button type="submit" class="search-btn" aria-label="Submit search">⌕</button>
        </form>
        <a href="/subscribe" class="btn-subscribe desktop-subscribe">Subscribe</a>
      </div>

      <div class="flex items-center gap-3 mobile-only">
        <button id="mobile-search-btn" aria-label="Open search"
                aria-expanded="false" aria-controls="mobile-search-overlay"
                style="background:none;border:none;cursor:pointer;color:var(--ink);padding:4px;font-size:20px;">⌕</button>
        <a href="/subscribe" class="btn-subscribe" style="font-size:10px;padding:6px 12px;">JOIN</a>
      </div>
    </div>

    <div class="nav-scroll-wrap" id="nav-scroll-wrap">
      <nav class="primary-nav md:justify-center" aria-label="Primary navigation" id="primary-nav">
        <?php foreach ($navItems as $item): ?>
        <a href="<?= e($item['href']) ?>" class="<?= !empty($item['active']) ? 'active' : '' ?>">
          <?= e($item['label']) ?>
        </a>
        <?php endforeach; ?>
      </nav>
      <span class="nav-scroll-arrow" aria-hidden="true">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="9 18 15 12 9 6"/></svg>
      </span>
    </div>
  </div>
</header>

<!-- ════════════════════════════════════════════════
  MOBILE DRAWER (unchanged)
════════════════════════════════════════════════ -->
<div class="mobile-drawer" id="mobile-drawer" role="dialog" aria-modal="true" aria-label="Navigation menu">
  <div class="drawer-overlay" id="drawer-overlay"></div>
  <div class="drawer-panel">
    <div class="drawer-header">
      <span class="logo" style="font-size:22px;">NEWYORK<span class="tld">.DEV</span></span>
      <button id="drawer-close" aria-label="Close navigation"
              style="background:none;border:none;cursor:pointer;font-size:22px;color:var(--ink);">✕</button>
    </div>
    <nav class="drawer-nav" aria-label="Mobile navigation">
      <?php foreach ($drawerNav as $item): ?>
      <a href="<?= e($item['href']) ?>"><?= e($item['label']) ?><span class="arrow">→</span></a>
      <?php endforeach; ?>
    </nav>
    <div style="padding:20px;margin-top:auto;border-top:1px solid var(--rule);">
      <a href="/subscribe" class="btn-subscribe" style="width:100%;text-align:center;display:block;">
        Subscribe to the Record
      </a>
      <p style="font-family:'Barlow Condensed',sans-serif;font-size:11px;color:var(--muted);margin-top:10px;text-align:center;letter-spacing:0.06em;">
        Free for devs. Always.
      </p>
    </div>
  </div>
</div>

<!-- ════════════════════════════════════════════════
  MOBILE SEARCH OVERLAY (unchanged)
════════════════════════════════════════════════ -->
<div class="mobile-search-overlay" id="mobile-search-overlay" role="search" aria-label="Site search">
  <div class="mobile-search-inner">
    <form action="/search" method="GET" style="display:contents;">
      <input type="search" name="q" id="mobile-search-field" class="mobile-search-field"
             placeholder="Search the Record…" aria-label="Search articles" autocomplete="off">
      <button type="submit" class="mobile-search-submit">SEARCH</button>
    </form>
    <button class="mobile-search-close" id="mobile-search-close" aria-label="Close search">✕</button>
  </div>
  <p class="mobile-search-hint">Try: "Laravel", "DevOps", "NY infra"</p>
</div>

<!-- ════════════════════════════════════════════════
  MAIN — JOB BOARD
════════════════════════════════════════════════ -->
<main class="max-w-7xl mx-auto px-4 md:px-6 py-8" id="main-content"
      x-data="jobBoard()" x-init="init()"
      @keydown.escape.window="closeDetail()">

  <!-- Edition badges -->
  <div class="mb-4 flex flex-wrap items-center gap-2">
    <span class="edition-badge"><span>⬡</span> DEV JOBS · <?= date('F Y') ?></span>
    <span class="edition-badge" style="background:#1a1a1a;color:rgba(255,255,255,.6);">
      New York State
    </span>
  </div>

  <!-- Page header -->
  <div class="flex items-baseline justify-between mb-4 border-b-4 border-double border-gray-300 pb-3">
    <h1 style="font-family:'Playfair Display',serif;font-size:clamp(1.6rem,4vw,2.4rem);font-weight:900;line-height:1.1;color:var(--ink,#0d0d0d);">
      Developer Positions
    </h1>
    <p style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6b6860;">
      <span x-text="filteredJobs.length"></span> openings
    </p>
  </div>

  <!-- ── LOCATION FILTER STRIP ── -->
  <div class="loc-strip mb-0" role="tablist" aria-label="Filter by location">
    <template x-for="loc in locations" :key="loc.key">
      <button
        @click="setLocation(loc.key)"
        :class="activeLocation===loc.key ? 'loc-pill active' : 'loc-pill'"
        role="tab"
        :aria-selected="activeLocation===loc.key"
        x-text="loc.label">
      </button>
    </template>
  </div>

  <!-- ── SEARCH + SORT STRIP ── -->
  <div class="sort-strip mt-3">
    <div class="flex items-center gap-6 flex-wrap">
      <!-- search -->
      <div class="job-search-wrap" style="width:220px">
        <span class="job-search-icon" aria-hidden="true">⌕</span>
        <input type="search" x-model="search" placeholder="Role, company, tech…"
               class="job-search" aria-label="Search jobs" autocomplete="off">
      </div>
      <!-- sort tabs -->
      <div class="sort-tabs" role="tablist" aria-label="Sort jobs">
        <button @click="activeSort='featured'" :class="activeSort==='featured'?'sort-tab active':'sort-tab'"
                role="tab" :aria-selected="activeSort==='featured'">Featured</button>
        <button @click="activeSort='latest'"   :class="activeSort==='latest'  ?'sort-tab active':'sort-tab'"
                role="tab" :aria-selected="activeSort==='latest'">Latest</button>
        <button @click="activeSort='salary'"   :class="activeSort==='salary'  ?'sort-tab active':'sort-tab'"
                role="tab" :aria-selected="activeSort==='salary'">High Pay</button>
        <button @click="activeSort='remote'"   :class="activeSort==='remote'  ?'sort-tab active':'sort-tab'"
                role="tab" :aria-selected="activeSort==='remote'">Remote</button>
      </div>
    </div>

    <!-- active filter chips -->
    <div class="flex flex-wrap gap-2" role="list" aria-label="Active filters">
      <template x-for="f in activeFilters" :key="f">
        <button class="filter-chip" @click="toggleFilter(f)" role="listitem"
                :aria-label="'Remove filter: '+f">
          <span x-text="f"></span>
          <span style="font-size:9px;opacity:.6" aria-hidden="true">✕</span>
        </button>
      </template>
      <button x-show="activeFilters.length>0" @click="activeFilters=[]"
              class="filter-chip" style="color:#C0362C;border-color:#C0362C"
              aria-label="Clear all filters">
        Clear all
      </button>
    </div>
  </div>

  <!-- ── TWO-COL GRID: cards + panel ── -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-0 lg:gap-8 mt-4">

    <!-- ── LEFT: job cards + sidebar ── -->
    <div class="lg:col-span-5 xl:col-span-4">

      <!-- tabloid strip — humour interstitial -->
      <div class="tabloid-strip" aria-label="Satirical news" role="complementary">
        <div class="tabloid-item">
          <p class="tabloid-tag">Breaking</p>
          <p class="tabloid-hed">"I'll Just Google It" Now Accounts for 94% of All Senior Engineer Decisions</p>
          <p class="tabloid-sub">Sources confirm Stack Overflow tab count at all-time high.</p>
        </div>
        <div style="width:1px;flex-shrink:0;background:var(--job-rule)"></div>
        <div class="tabloid-item">
          <p class="tabloid-tag">Exclusive</p>
          <p class="tabloid-hed">Local Dev Rewrites Legacy Codebase, Produces Identical Legacy Codebase</p>
          <p class="tabloid-sub">"It's basically the same but in TypeScript," he said proudly.</p>
        </div>
        <div style="width:1px;flex-shrink:0;background:var(--job-rule)"></div>
        <div class="tabloid-item">
          <p class="tabloid-tag">Analysis</p>
          <p class="tabloid-hed">Area Startup Pivots to AI, Is Now Just a Regular Database with a Chatbot</p>
          <p class="tabloid-sub">Valuation unchanged at $40M.</p>
        </div>
      </div>

      <!-- job card list -->
      <div role="list" aria-label="Job listings">
        <template x-for="job in filteredJobs" :key="job.id">
          <article
            class="job-card"
            :class="[job.is_featured?'featured':'', expandedJobId===job.id?'selected':'']"
            role="listitem"
            @click="selectJob(job.id)"
            :aria-selected="expandedJobId===job.id"
            :aria-label="job.title+' at '+job.company">

            <p class="job-company" x-text="job.company"></p>
            <h2 class="job-title" x-text="job.title"></h2>

            <div class="job-meta">
              <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                   style="flex-shrink:0;color:#9b9790" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              </svg>
              <span x-text="job.location"></span>
              <span class="job-meta-sep" aria-hidden="true">·</span>
              <span x-text="job.posted" style="color:#9b9790"></span>
              <span x-show="job.salary" class="job-meta-sep" aria-hidden="true">·</span>
              <span class="job-salary" x-show="job.salary" x-text="job.salary"></span>
            </div>

            <div class="job-tags" @click.stop>
              <template x-for="tag in (job.tags||[]).slice(0,4)" :key="tag">
                <span class="job-tag"
                      :class="activeFilters.includes(tag)?'active':''"
                      @click="toggleFilter(tag)"
                      :aria-pressed="activeFilters.includes(tag)"
                      x-text="tag"></span>
              </template>
            </div>

            <div class="job-card-foot" @click.stop>
              <span x-show="job.video_url" class="job-vid-badge">▶ Video intro</span>
              <span x-show="!job.video_url"></span>
              <button class="job-save-btn"
                      :class="isSaved(job.id)?'saved':''"
                      @click="toggleSave(job.id)"
                      :aria-label="isSaved(job.id)?'Unsave '+job.title:'Save '+job.title"
                      :aria-pressed="isSaved(job.id)">
                <svg width="12" height="12" :fill="isSaved(job.id)?'currentColor':'none'"
                     stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
              </button>
            </div>
          </article>
        </template>

        <!-- empty state -->
        <div x-show="filteredJobs.length===0" class="jobs-empty" role="status">
          <p class="jobs-empty-head">No openings found.</p>
          <p class="jobs-empty-sub">Try adjusting your filters or checking another city.</p>
          <button @click="search='';activeFilters=[];activeLocation='all'"
                  class="job-tag" style="margin-top:16px;padding:6px 14px;font-size:12px">
            Reset all filters
          </button>
        </div>
      </div>

    </div><!-- /left col -->

    <!-- ── MIDDLE: sidebar widgets (most read, newsletter, trending) ── -->
    <aside class="hidden xl:flex xl:col-span-2 flex-col gap-8 pt-2" aria-label="Sidebar">

      <!-- Most Read -->
      <div class="sidebar-widget">
        <p class="sidebar-widget-title">Most Read</p>
        <ol class="ranked-list" style="list-style:none;padding:0;">
          <?php foreach ($mostRead as $i => $headline): ?>
          <li>
            <span class="rank-num"><?= $i + 1 ?></span>
            <a href="#" class="u-link copy-sm"><?= e($headline) ?></a>
          </li>
          <?php endforeach; ?>
        </ol>
      </div>

      <!-- Newsletter CTA -->
      <div class="sidebar-widget" style="background:var(--ink);padding:20px;">
        <p class="sidebar-widget-title" style="color:rgba(255,255,255,.55);">Weekly Briefing</p>
        <p style="font-family:'Playfair Display',serif;font-size:16px;color:#fff;font-weight:700;line-height:1.3;margin-bottom:12px;">
          Dev news that matters.
        </p>
        <form action="/newsletter/subscribe" method="POST" class="flex flex-col gap-3">
          <input type="hidden" name="_token" value="<?= e($csrf) ?>">
          <input type="email" name="email" placeholder="your@email.dev" required
                 aria-label="Your email address"
                 style="font-family:'Lora',serif;font-size:13px;padding:7px 10px;border:1px solid rgba(255,255,255,.2);background:rgba(255,255,255,.08);color:#fff;outline:none;width:100%;">
          <button type="submit" class="btn-subscribe"
                  style="background:#C0362C;width:100%;text-align:center;">Subscribe Free →</button>
        </form>
        <p style="font-family:'Barlow Condensed',sans-serif;font-size:10px;letter-spacing:.06em;color:rgba(255,255,255,.3);margin-top:8px;">
          No spam. Unsubscribe anytime.
        </p>
      </div>

      <!-- Trending tags -->
      <div class="sidebar-widget">
        <p class="sidebar-widget-title">Trending in NYC</p>
        <div class="flex flex-wrap gap-2">
          <?php foreach ($trendingTech as $tech): ?>
          <a href="/tag/<?= slug($tech) ?>" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer">
            <?= e($tech) ?>
          </a>
          <?php endforeach; ?>
        </div>
      </div>

    </aside>

    <!-- ── RIGHT: detail / video panel ── -->
    <div class="hidden lg:block lg:col-span-7 xl:col-span-6">
      <div class="detail-panel" :class="selectedJob?'has-content':''">
        <div class="detail-panel-bar"></div>

        <!-- empty state / promo -->
        <template x-if="!selectedJob">
          <div class="panel-promo">
            <p class="promo-eyebrow">
              <span class="promo-dot" aria-hidden="true"></span>
              Now hiring on NewYork.dev
            </p>
            <div class="video-wrap">
              <div class="video-overlay"
                   x-show="!promoPlaying"
                   @click="promoPlaying=true"
                   role="button" tabindex="0"
                   aria-label="Play intro video"
                   @keydown.enter="promoPlaying=true"
                   @keydown.space.prevent="promoPlaying=true">
                <div class="play-circle">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="white" aria-hidden="true">
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                </div>
              </div>
              <iframe :src="promoPlaying?promoVideoUrl+'?autoplay=1':'about:blank'"
                      loading="lazy" class="w-full h-full" frameborder="0"
                      allow="autoplay;fullscreen" allowfullscreen
                      title="NewYork.dev intro"></iframe>
            </div>
            <p class="panel-hint">Reach 2,000+ New York developers actively looking for their next role.</p>
            <p class="panel-hint" style="margin-top:4px">← Select any listing to preview full details here.</p>
            <a href="/post-job"
               style="display:inline-flex;align-items:center;gap:6px;margin-top:16px;font-family:'Barlow Condensed',sans-serif;font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#C0362C;text-decoration:none;border-bottom:1px solid #C0362C;padding-bottom:2px;">
              Post a role →
            </a>
          </div>
        </template>

        <!-- job detail -->
        <template x-if="selectedJob">
          <div class="detail-inner">

            <!-- header -->
            <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:8px;margin-bottom:12px">
              <div>
                <p class="detail-company" x-text="selectedJob.company"></p>
                <h2 class="detail-title" x-text="selectedJob.title"></h2>
              </div>
              <button @click.stop="closeDetail()" class="job-save-btn" aria-label="Close panel"
                      style="flex-shrink:0;margin-top:4px">
                <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
              </button>
            </div>

            <!-- meta -->
            <div class="detail-meta">
              <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                   aria-hidden="true" style="flex-shrink:0">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              </svg>
              <span x-text="selectedJob.location"></span>
              <span class="job-meta-sep" aria-hidden="true">·</span>
              <span x-text="'Posted '+selectedJob.posted" style="color:#9b9790"></span>
            </div>

            <!-- salary -->
            <span x-show="selectedJob.salary" class="detail-salary" x-text="selectedJob.salary + ' / yr'"></span>

            <!-- video -->
            <template x-if="selectedJob.video_url">
              <div style="margin-bottom:16px" @click.stop>
                <p class="detail-label">Hiring Manager Intro</p>
                <div class="video-wrap">
                  <div class="video-overlay"
                       x-show="!videoPlaying"
                       @click.stop="startVideo()"
                       role="button" tabindex="0"
                       aria-label="Play hiring manager video"
                       @keydown.enter="startVideo()"
                       @keydown.space.prevent="startVideo()">
                    <div class="play-circle">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="white" aria-hidden="true">
                        <path d="M8 5v14l11-7z"/>
                      </svg>
                    </div>
                  </div>
                  <iframe :src="videoPlaying?selectedJob.video_url+'?autoplay=1':'about:blank'"
                          loading="lazy" class="w-full h-full" frameborder="0"
                          allow="autoplay;fullscreen" allowfullscreen
                          :title="selectedJob.company+' hiring video'"></iframe>
                </div>
              </div>
            </template>

            <div class="detail-divider"></div>

            <!-- description -->
            <div style="margin-bottom:16px">
              <p class="detail-label">About the Role</p>
              <p class="detail-body" x-text="selectedJob.description"></p>
            </div>

            <!-- tech stack -->
            <div style="margin-bottom:16px">
              <p class="detail-label">Tech Stack</p>
              <div class="detail-tags">
                <template x-for="tag in (selectedJob.tags||[])" :key="tag">
                  <span class="detail-tag" x-text="tag"></span>
                </template>
              </div>
            </div>

            <div class="detail-divider"></div>

            <!-- actions -->
            <div style="display:flex;align-items:center;gap:8px">
              <a :href="selectedJob.url" class="apply-btn" @click.stop>
                Apply Now
                <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
              </a>
              <button class="job-save-btn"
                      :class="isSaved(selectedJob.id)?'saved':''"
                      @click.stop="toggleSave(selectedJob.id)"
                      :aria-pressed="isSaved(selectedJob.id)"
                      :aria-label="isSaved(selectedJob.id)?'Unsave':'Save this role'"
                      style="width:auto;padding:0 14px;height:38px;gap:6px;font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase">
                <svg width="12" height="12" :fill="isSaved(selectedJob.id)?'currentColor':'none'"
                     stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
                <span x-text="isSaved(selectedJob.id)?'Saved':'Save'"></span>
              </button>
            </div>

          </div>
        </template>
      </div>
    </div><!-- /right col -->

  </div><!-- /two-col grid -->

</main><!-- /main -->

<!-- ════════════════════════════════════════════════
  MOBILE BOTTOM SHEET (< lg)
════════════════════════════════════════════════ -->
<div class="sheet-backdrop lg:hidden"
     x-show="expandedJobId!==null&&sheetVisible"
     x-cloak
     :style="sheetVisible?'opacity:1':'opacity:0'"
     @click="closeDetail()"
     aria-hidden="true"
     x-data></div>

<div class="sheet lg:hidden"
     x-show="expandedJobId!==null"
     x-cloak
     :class="sheetVisible?'':'entering'"
     role="dialog" aria-modal="true"
     :aria-label="selectedJob?selectedJob.title+' — '+selectedJob.company:'Job details'"
     @click.stop
     x-data>

  <div class="sheet-handle" aria-hidden="true"></div>

  <template x-if="selectedJob" x-data>
    <div style="padding:16px 20px 56px">

      <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:8px;margin-bottom:10px">
        <div>
          <p class="detail-company" x-text="selectedJob.company"></p>
          <h2 class="detail-title" style="font-size:18px" x-text="selectedJob.title"></h2>
        </div>
        <button @click="closeDetail()" class="job-save-btn" aria-label="Close"
                style="flex-shrink:0;margin-top:4px">
          <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>

      <div class="detail-meta">
        <span x-text="selectedJob.location"></span>
        <span class="job-meta-sep" aria-hidden="true">·</span>
        <span x-text="'Posted '+selectedJob.posted" style="color:#9b9790"></span>
      </div>

      <span x-show="selectedJob.salary" class="detail-salary" x-text="selectedJob.salary + ' / yr'"></span>

      <template x-if="selectedJob.video_url">
        <div style="margin-bottom:16px" @click.stop>
          <p class="detail-label">Hiring Manager Intro</p>
          <div class="video-wrap">
            <div class="video-overlay"
                 x-show="!videoPlaying"
                 @click.stop="startVideo()"
                 role="button" tabindex="0"
                 aria-label="Play hiring manager video"
                 @keydown.enter="startVideo()"
                 @keydown.space.prevent="startVideo()">
              <div class="play-circle">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="white" aria-hidden="true">
                  <path d="M8 5v14l11-7z"/>
                </svg>
              </div>
            </div>
            <iframe :src="videoPlaying?selectedJob.video_url+'?autoplay=1':'about:blank'"
                    loading="lazy" class="w-full h-full" frameborder="0"
                    allow="autoplay;fullscreen" allowfullscreen
                    :title="selectedJob.company+' hiring video'"></iframe>
          </div>
        </div>
      </template>

      <div class="detail-divider"></div>

      <div style="margin-bottom:14px">
        <p class="detail-label">About the Role</p>
        <p class="detail-body" x-text="selectedJob.description"></p>
      </div>

      <div style="margin-bottom:16px">
        <p class="detail-label">Tech Stack</p>
        <div class="detail-tags">
          <template x-for="tag in (selectedJob.tags||[])" :key="tag">
            <span class="detail-tag" x-text="tag"></span>
          </template>
        </div>
      </div>

      <div style="display:flex;gap:8px">
        <a :href="selectedJob.url" class="apply-btn" @click.stop>
          Apply Now
          <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </a>
        <button class="job-save-btn"
                :class="isSaved(selectedJob.id)?'saved':''"
                @click="toggleSave(selectedJob.id)"
                :aria-pressed="isSaved(selectedJob.id)"
                style="width:auto;padding:0 14px;height:38px;gap:6px;font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase">
          <svg width="12" height="12" :fill="isSaved(selectedJob.id)?'currentColor':'none'"
               stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
          </svg>
          <span x-text="isSaved(selectedJob.id)?'Saved':'Save'"></span>
        </button>
      </div>

    </div>
  </template>
</div>

<!-- ════════════════════════════════════════════════
  FOOTER (unchanged)
════════════════════════════════════════════════ -->
<footer role="contentinfo" style="border-top:4px solid #C0362C;">
  <div style="border-bottom:1px solid rgba(255,255,255,0.1);">
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-12">
      <div class="grid grid-cols-3 sm:grid-cols-3 lg:grid-cols-5 gap-8">
        <div class="col-span-3 sm:col-span-3 lg:col-span-2">
          <p class="footer-logo">NEWYORK<span class="tld">.DEV</span></p>
          (<a href="https://notnewyork.com" class="text-gray-500 hover:text-[#C0362C] transition-colors">
            <b>not</b>newyork.com</a>)
          <p style="font-family:'Lora',serif;font-size:14px;line-height:1.7;margin-top:12px;color:rgba(255,255,255,0.5);max-width:360px;">
            Indy journalism for the dev community.
          </p>
          <div class="flex gap-4 mt-6">
            <a href="#" aria-label="GitHub"    class="footer-link" style="font-size:18px">⌥</a>
            <a href="#" aria-label="X/Twitter" class="footer-link" style="font-size:18px">✕</a>
            <a href="#" aria-label="RSS"       class="footer-link" style="font-size:18px">⊞</a>
          </div>
        </div>
        <?php foreach ($footerCols as $colTitle => $links): ?>
        <div>
          <p style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:.18em;color:rgba(255,255,255,.35);margin-bottom:12px;text-transform:uppercase;">
            <?= e($colTitle) ?>
          </p>
          <ul style="list-style:none;padding:0;display:flex;flex-direction:column;gap:8px;">
            <?php foreach ($links as $link): ?>
            <li><a href="/<?= slug($link) ?>" class="footer-link"><?= e($link) ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="max-w-7xl mx-auto px-4 md:px-6 py-5 flex flex-col-reverse sm:flex-row justify-between items-center gap-3 footer-link">
    <p style="font-family:'Barlow Condensed',sans-serif;font-size:11px;letter-spacing:.08em;color:rgba(255,255,255,.35);">
      &copy; <?= date('Y') ?> NewYork.dev. ONCILLAS. All rights reserved.
    </p>
    <div class="flex gap-5">
      <?php foreach (['Privacy Policy', 'Terms of Service', 'Cookie Settings', 'Accessibility'] as $item): ?>
      <a href="/<?= slug($item) ?>" class="footer-link" style="font-size:11px;"><?= e($item) ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</footer>

<!-- ════════════════════════════════════════════════
  JAVASCRIPT
════════════════════════════════════════════════ -->
<script>
/* ── Original site JS (unchanged) ── */
(function () {
  'use strict';

  const masthead = document.getElementById('masthead');
  window.addEventListener('scroll', () => {
    masthead.classList.toggle('scrolled', window.scrollY > 10);
  }, { passive: true });

  document.querySelectorAll('.reveal').forEach(el => {
    el.addEventListener('animationend', () => {
      el.classList.remove('reveal', 'reveal-1', 'reveal-2', 'reveal-3');
    }, { once: true });
  });

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

  const mobileSearchBtn     = document.getElementById('mobile-search-btn');
  const mobileSearchOverlay = document.getElementById('mobile-search-overlay');
  const mobileSearchField   = document.getElementById('mobile-search-field');
  const mobileSearchClose   = document.getElementById('mobile-search-close');

  const openMobileSearch = () => {
    mobileSearchOverlay.classList.add('open');
    mobileSearchBtn.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
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

  document.addEventListener('keydown', (e) => {
    if (e.key !== 'Escape') return;
    if (mobileSearchOverlay?.classList.contains('open')) { closeMobileSearch(); return; }
    if (drawer?.classList.contains('open')) { closeDrawer(); }
  });

  const navWrap = document.getElementById('nav-scroll-wrap');
  const navEl   = document.getElementById('primary-nav');
  const updateNavIndicator = () => {
    if (!navEl || !navWrap) return;
    const { scrollLeft, scrollWidth, clientWidth } = navEl;
    navWrap.classList.toggle('at-end',   scrollLeft + clientWidth >= scrollWidth - 4);
    navWrap.classList.toggle('scrolled', scrollLeft > 8);
  };
  navEl?.addEventListener('scroll', updateNavIndicator, { passive: true });
  updateNavIndicator();
  window.addEventListener('load', updateNavIndicator);

  const desktopSearch = document.getElementById('site-search');
  desktopSearch?.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
      const q = desktopSearch.value.trim();
      if (q) desktopSearch.closest('form').submit();
    }
  });
}());

/* ── Alpine job board component ── */
function jobBoard() {
  return {
    _isDesktop: window.innerWidth >= 1024,

    savedJobs:      [],
    activeFilters:  [],
    activeLocation: 'all',
    activeSort:     'featured',
    search:         '',
    expandedJobId:  null,
    sheetVisible:   false,
    videoPlaying:   false,
    promoPlaying:   false,
    promoVideoUrl:  'https://www.youtube.com/embed/dQw4w9WgXcQ',

    locations: [
      { key: 'all',      label: 'All NY' },
      { key: 'nyc',      label: 'New York City' },
      { key: 'upstate',  label: 'Upstate NY' },
      { key: 'buffalo',  label: 'Buffalo' },
      { key: 'rochester',label: 'Rochester' },
      { key: 'syracuse', label: 'Syracuse' },
      { key: 'albany',   label: 'Albany' },
      { key: 'remote',   label: 'Remote' },
    ],

    /* ── sample jobs — replace with PHP-injected JSON in production ──
       Each job has a `region` key matching a location key above.        */
    jobs: [
      {
        id: 1, title: 'Senior Laravel Engineer', company: 'Rainier Software',
        location: 'New York City (Remote OK)', region: 'nyc',
        salary: '$120k – $155k', salary_max: 155000,
        tags: ['PHP','Laravel','Backend','Senior'], posted: '2d ago',
        is_featured: true, video_url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        url: '/jobs/senior-laravel-engineer',
        description: 'Building internal SaaS tooling for a logistics company. Own the backend architecture, work closely with a product-focused founder. PHP 8.3 / Laravel 11, MySQL, Redis on Forge. Clean monolith, great test coverage.',
      },
      {
        id: 2, title: 'Frontend Developer (React)', company: 'Cascadia Climate Tech',
        location: 'Buffalo, NY', region: 'buffalo',
        salary: '$95k – $125k', salary_max: 125000,
        tags: ['React','Frontend','TypeScript'], posted: '1d ago',
        is_featured: true, video_url: null,
        url: '/jobs/frontend-developer-react',
        description: 'Real-time climate data dashboards. Greenfield React + Tailwind project, mission-driven team. TypeScript throughout, Vite build, Recharts for visualisation.',
      },
      {
        id: 3, title: 'DevOps / Platform Engineer', company: 'Mount Hood Systems',
        location: 'Albany, NY', region: 'albany',
        salary: '$140k – $180k', salary_max: 180000,
        tags: ['DevOps','Kubernetes','Python','Senior'], posted: '4d ago',
        is_featured: false, video_url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        url: '/jobs/devops-platform-engineer',
        description: 'Scale infra to millions of requests. Kubernetes on EKS, Terraform, ArgoCD. Platform team lead — direct line to CTO, real budget, sane on-call rotation.',
      },
      {
        id: 4, title: 'Full Stack Engineer', company: 'Puget Sound Digital',
        location: 'Remote (NY-based)', region: 'remote',
        salary: '$110k – $140k', salary_max: 140000,
        tags: ['Laravel','React','Backend','Frontend'], posted: '6h ago',
        is_featured: true, video_url: null,
        url: '/jobs/full-stack-engineer',
        description: 'Laravel API + React frontend for a fintech startup. Small team (5 engineers), async-first culture. Equity included. $2M/day in transactions.',
      },
      {
        id: 5, title: 'Junior PHP Developer', company: 'Upstate Solutions',
        location: 'Rochester, NY', region: 'rochester',
        salary: '$65k – $85k', salary_max: 85000,
        tags: ['PHP','Laravel','Backend'], posted: '3d ago',
        is_featured: false, video_url: null,
        url: '/jobs/junior-php-developer',
        description: 'Great first role in a supportive team. SaaS for local government clients. Senior pairing 2x/week, structured code review, clear growth path to mid-level in 18 months.',
      },
      {
        id: 6, title: 'Node.js Backend Engineer', company: 'Salish Sea Studios',
        location: 'Syracuse, NY (Hybrid)', region: 'syracuse',
        salary: '$100k – $130k', salary_max: 130000,
        tags: ['Node','Backend','Senior'], posted: '5d ago',
        is_featured: false, video_url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        url: '/jobs/nodejs-backend-engineer',
        description: 'Real-time multiplayer features for an indie game platform. Node + WebSockets + Redis Pub/Sub. 40k concurrent connections at peak. $2k/yr learning stipend.',
      },
      {
        id: 7, title: 'Rails Developer', company: 'Hudson Valley Tech',
        location: 'Upstate NY (Hybrid)', region: 'upstate',
        salary: '$90k – $115k', salary_max: 115000,
        tags: ['Ruby','Rails','Backend'], posted: '2d ago',
        is_featured: false, video_url: null,
        url: '/jobs/rails-developer',
        description: 'Greenfield Rails 7 product for the agriculture-tech sector. Small team, big ownership. Hybrid with 2 days in our Hudson Valley office.',
      },
    ],

    get selectedJob() {
      return this.jobs.find(j => j.id === this.expandedJobId) || null;
    },

    get filteredJobs() {
      let list = this.jobs.filter(job => {
        /* location */
        const ml = this.activeLocation === 'all'
          || job.region === this.activeLocation
          || (this.activeLocation === 'remote' && job.location.toLowerCase().includes('remote'));

        /* search */
        const s = this.search.toLowerCase();
        const ms = !s
          || job.title.toLowerCase().includes(s)
          || job.company.toLowerCase().includes(s)
          || (job.tags||[]).some(t => t.toLowerCase().includes(s));

        /* tag filters */
        const mf = this.activeFilters.length === 0
          || this.activeFilters.every(f => (job.tags||[]).includes(f));

        return ml && ms && mf;
      });

      switch (this.activeSort) {
        case 'remote':   return list.sort((a,b) => b.location.toLowerCase().includes('remote') - a.location.toLowerCase().includes('remote'));
        case 'salary':   return list.sort((a,b) => (b.salary_max||0) - (a.salary_max||0));
        case 'featured': return list.sort((a,b) => b.is_featured - a.is_featured);
        case 'latest': {
          const m = s => { const n=parseInt(s); if(s.includes('h')) return n*60; if(s.includes('d')) return n*1440; return 9999; };
          return list.sort((a,b) => m(a.posted) - m(b.posted));
        }
        default: return list;
      }
    },

    init() {
      try {
        const s = localStorage.getItem('ny_dev_saved');
        this.savedJobs = s ? JSON.parse(s) : [];
      } catch { this.savedJobs = []; }

      window.addEventListener('resize', () => {
        const was = this._isDesktop;
        this._isDesktop = window.innerWidth >= 1024;
        if (!was && this._isDesktop && this.expandedJobId !== null) {
          document.body.style.overflow = '';
          this.sheetVisible = false;
        }
      }, { passive: true });
    },

    setLocation(key) {
      this.activeLocation = key;
      /* if a selected job doesn't exist in the new filtered list, clear it */
      if (this.expandedJobId && !this.filteredJobs.find(j => j.id === this.expandedJobId)) {
        this.closeDetail();
      }
    },

    selectJob(id) {
      if (this.expandedJobId === id) { this.closeDetail(); return; }
      this.videoPlaying  = false;
      this.promoPlaying  = false;
      this.expandedJobId = id;
      if (!this._isDesktop) {
        this.sheetVisible = false;
        this.$nextTick(() => { this.sheetVisible = true; });
        document.body.style.overflow = 'hidden';
      }
    },

    closeDetail() {
      this.videoPlaying = false;
      document.body.style.overflow = '';
      if (!this._isDesktop) {
        this.sheetVisible = false;
        setTimeout(() => { this.expandedJobId = null; }, 280);
      } else {
        this.expandedJobId = null;
      }
    },

    startVideo() { this.videoPlaying = true; },

    toggleFilter(k) {
      this.activeFilters = this.activeFilters.includes(k)
        ? this.activeFilters.filter(f => f !== k)
        : [...this.activeFilters, k];
    },

    toggleSave(id) {
      this.savedJobs = this.savedJobs.includes(id)
        ? this.savedJobs.filter(j => j !== id)
        : [...this.savedJobs, id];
      try { localStorage.setItem('ny_dev_saved', JSON.stringify(this.savedJobs)); } catch {}
    },

    isSaved(id) { return this.savedJobs.includes(id); },
  };
}
</script>

</body>
</html>
 

<iframe width="560" height="315" src="https://www.youtube.com/embed/z1QMYk-pi4s?si=lZs-S6sVuEq5NpsA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>