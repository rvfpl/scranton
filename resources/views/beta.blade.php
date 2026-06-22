<?php
require_once __DIR__ . '/data/data.php';

// ── Homepage job sample — pull from same $jobs array, take first 4 featured ──
// $jobs comes from data.php / jsdata.js; we need a PHP-side version for the hero.
// If data.php doesn't expose $phpJobs, fall back to placeholder data.
$heroJobs = $phpJobs ?? [
  ['id'=>'job_001','company'=>'Rain Software',    'title'=>'Senior Laravel Engineer',  'location'=>'NYC (Remote OK)',    'salary'=>'$120k&ndash;$155k','salary_type'=>'yr','tags'=>['Laravel','PHP'],     'video_url'=>'https://www.youtube.com/embed/dQw4w9WgXcQ','url'=>'/jobs','posted'=>'2d ago'],
  ['id'=>'job_002','company'=>'Cascadia Climate', 'title'=>'Frontend Developer (React)','location'=>'Buffalo, NY',       'salary'=>'$95k&ndash;$125k', 'salary_type'=>'yr','tags'=>['React','TypeScript'], 'video_url'=>'','url'=>'/jobs','posted'=>'1d ago'],
  ['id'=>'job_003','company'=>'FinStack Inc',     'title'=>'Platform Engineer',         'location'=>'Remote',            'salary'=>'$140k&ndash;$160k','salary_type'=>'yr','tags'=>['Terraform','Go'],    'video_url'=>'','url'=>'/jobs','posted'=>'3d ago'],
  ['id'=>'job_004','company'=>'NewYork.dev',      'title'=>'Founding Partner Role',     'location'=>'New York (Remote)', 'salary'=>'10&cent;&ndash;25&cent;','salary_type'=>'hr','tags'=>['Partner','Founder'], 'video_url'=>'https://www.youtube.com/embed/dQw4w9WgXcQ','url'=>'/jobs','posted'=>'2d ago'],
];
$heroJobs = array_slice($heroJobs, 0, 4);

// Promo video URL (same as job board)
$promoVideoUrl = 'https://www.youtube.com/embed/dQw4w9WgXcQ';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="NewYork.dev &mdash; The Developer's Record. Infrastructure, code culture, and tech dispatches from the city that never deploys.">
  <meta name="csrf-token" content="<?= e($csrf) ?>">
  <title>NewYork.dev &middot; The Developer's Record</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Lora:ital,wght@0,400;0,600;1,400&family=JetBrains+Mono:wght@400;600&family=Barlow+Condensed:wght@600;700&display=swap" rel="stylesheet">

  <script src="js/jsdata.js?v6.2" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,
    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'>
      <rect width='32' height='32' rx='4' fill='%230d0d0d'/>
      <circle cx='16' cy='16' r='8' fill='%23C0362C'/>
    </svg>">

  <link rel="stylesheet" href="css/nycss2.css?v5">

  <style>
    :root {
      --lp-ink:   #0d0d0d;
      --lp-cream: #faf8f5;
      --lp-rule:  #d4cfc8;
      --lp-red:   #C0362C;
      --lp-muted: #6b6b6b;
      --lp-gold:  #b8860b;
      --lp-blue:  #1a4a8a;
    }


 


    /* ── Column rule ── */
    .col-rule { border-right: 1px solid var(--lp-rule); }
    @media (max-width: 1023px) { .col-rule { border-right: none; } }

    /* ── Flag ── */
    .flag {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 10px; font-weight: 700;
      letter-spacing: .2em; text-transform: uppercase;
      color: var(--lp-muted);
      border-top: 2px solid var(--lp-ink);
      padding-top: 5px; margin-bottom: 14px; display: block;
    }
    .flag.red { color: var(--lp-red); border-color: var(--lp-red); }

    /* ── Kicker ── */
    .kicker {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 10px; font-weight: 700;
      letter-spacing: .16em; text-transform: uppercase;
      color: var(--lp-red); margin-bottom: 6px; display: block;
    }

    /* ── Lead headline ── */
    .lead-hed {
      font-family: 'Playfair Display', serif;
      font-size: clamp(26px, 4vw, 50px); font-weight: 900;
      line-height: 1.06; letter-spacing: -.02em; color: var(--lp-ink);
    }
    .lead-hed a { text-decoration: none; color: inherit; }
    .lead-hed a:hover { color: var(--lp-red); }

    /* ── Deck ── */
    .deck { font-family: 'Lora', serif; font-size: 15px; line-height: 1.65; color: var(--lp-muted); margin-top: 10px; }

    /* ── Column headline ── */
    .col-hed { font-family: 'Playfair Display', serif; font-size: 16px; font-weight: 700; line-height: 1.25; color: var(--lp-ink); }
    .col-hed a { text-decoration: none; color: inherit; }
    .col-hed a:hover { color: var(--lp-red); }

    /* ── Byline ── */
    .byl { font-family: 'Barlow Condensed', sans-serif; font-size: 11px; letter-spacing: .06em; color: var(--lp-muted); margin-top: 6px; }
    .byl strong { color: var(--lp-ink); }

    /* ── Dividers ── */
    .hr-single { border: none; border-top: 1px solid var(--lp-rule); margin: 0; }
    .hr-double { border: none; border-top: 3px double var(--lp-ink); margin: 0; }

    /* ── Pull quote ── */
    .pull-quote-hp { border-left: 3px solid var(--lp-red); padding-left: 18px; font-family: 'Playfair Display', serif; font-size: clamp(15px, 2vw, 19px); font-style: italic; line-height: 1.55; color: var(--lp-ink); }

    /* ── View more ── */
    .view-more { display: inline-flex; align-items: center; gap: 5px; font-family: 'Barlow Condensed', sans-serif; font-size: 11px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; color: var(--lp-red); text-decoration: none; border-bottom: 1px solid var(--lp-red); padding-bottom: 1px; margin-top: 12px; transition: opacity .15s; }
    .view-more:hover { opacity: .7; }

    /* ═══════════════════════════════
       HERO JOB PANEL (right column)
    ═══════════════════════════════ */
    .hero-job-panel {
      border: 1px solid var(--lp-rule);
      background: #fff;
    }
    .hero-job-panel-bar {
      height: 3px;
      background: linear-gradient(90deg, var(--lp-red), #6b4fa0);
    }

    /* promo video inside hero panel */
    .hero-video-wrap {
      width: 100%; aspect-ratio: 16/9;
      background: var(--lp-ink);
      position: relative; overflow: hidden;
      cursor: pointer;
    }
    .hero-video-wrap iframe {
      width: 100%; height: 100%;
      border: none; display: block;
    }
    .hero-video-overlay {
      position: absolute; inset: 0;
      display: flex; align-items: center; justify-content: center;
      background: rgba(0,0,0,.45);
      transition: background .15s;
    }
    .hero-video-overlay:hover { background: rgba(0,0,0,.6); }
    .hero-play-circle {
      width: 44px; height: 44px;
      border-radius: 50%; border: 2px solid rgba(255,255,255,.6);
      background: rgba(192,54,44,.85);
      display: flex; align-items: center; justify-content: center;
    }
    .hero-video-eyebrow {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 9px; font-weight: 700; letter-spacing: .18em; text-transform: uppercase;
      color: rgba(255,255,255,.5);
      position: absolute; bottom: 10px; left: 12px;
    }

    /* job mini-cards inside hero panel */
    .hero-job-item {
      display: block; text-decoration: none; color: inherit;
      padding: 11px 14px;
      border-bottom: 1px solid var(--lp-rule);
      transition: background .1s, padding-left .1s;
      cursor: pointer;
    }
    .hero-job-item:last-child { border-bottom: none; }
    .hero-job-item:hover { background: rgba(192,54,44,.03); padding-left: 18px; }
    .hero-job-co {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 9px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase;
      color: var(--lp-red); margin-bottom: 1px;
    }
    .hero-job-title {
      font-family: 'Playfair Display', serif;
      font-size: 14px; font-weight: 700; line-height: 1.25;
      color: var(--lp-ink); margin-bottom: 3px;
    }
    .hero-job-meta {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 10px; letter-spacing: .04em; color: var(--lp-muted);
      display: flex; align-items: center; gap: 4px; flex-wrap: wrap;
    }
    .hero-job-pay {
      font-family: 'JetBrains Mono', monospace;
      font-size: 10px; font-weight: 600; color: var(--lp-blue);
    }
    .hero-job-vid {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 8px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
      color: #6b4fa0; border: 1px solid #b89ee0;
      padding: 1px 5px; margin-left: auto; white-space: nowrap; flex-shrink: 0;
    }

    /* hero panel footer */
    .hero-panel-foot {
      padding: 10px 14px;
      border-top: 2px solid var(--lp-ink);
      display: flex; align-items: center; justify-content: space-between;
      background: var(--lp-ink);
    }
    .hero-panel-foot-label {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 10px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
      color: rgba(255,255,255,.5);
    }
    .hero-panel-foot-cta {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 10px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
      color: #fff; text-decoration: none;
      background: var(--lp-red); padding: 5px 12px;
      transition: background .15s;
    }
    .hero-panel-foot-cta:hover { background: #a02a22; }

    /* ═══════════════════════════════
       MARKETPLACE SPOTLIGHT
    ═══════════════════════════════ */
    .marketplace-strip { background: var(--lp-ink); border-top: 3px solid var(--lp-red); border-bottom: 3px solid var(--lp-red); }
    .marketplace-col { padding: 24px 28px; }
    .marketplace-col + .marketplace-col { border-left: 1px solid rgba(255,255,255,.1); }
    @media (max-width: 767px) {
      .marketplace-col + .marketplace-col { border-left: none; border-top: 1px solid rgba(255,255,255,.1); }
      .marketplace-col { padding: 18px 16px; }
    }
    .mp-eyebrow { font-family: 'Barlow Condensed', sans-serif; font-size: 9px; font-weight: 700; letter-spacing: .22em; text-transform: uppercase; color: rgba(255,255,255,.4); margin-bottom: 8px; display: block; }
    .mp-headline { font-family: 'Playfair Display', serif; font-size: clamp(17px, 2.2vw, 24px); font-weight: 900; color: #fff; line-height: 1.15; margin-bottom: 4px; }
    .mp-meta { font-family: 'Barlow Condensed', sans-serif; font-size: 11px; letter-spacing: .06em; color: rgba(255,255,255,.45); margin-bottom: 10px; display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
    .mp-rate { font-family: 'JetBrains Mono', monospace; font-size: 12px; font-weight: 600; color: #f4a090; }
    .mp-tags { display: flex; flex-wrap: wrap; gap: 4px; margin-bottom: 12px; }
    .mp-tag { font-family: 'JetBrains Mono', monospace; font-size: 9px; font-weight: 600; padding: 2px 6px; border: 1px solid rgba(255,255,255,.18); color: rgba(255,255,255,.6); }
    .mp-divider { height: 1px; background: rgba(255,255,255,.1); margin: 10px 0; }
    .mp-cta { display: inline-flex; align-items: center; gap: 6px; font-family: 'Barlow Condensed', sans-serif; font-size: 11px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; color: #fff; text-decoration: none; border-bottom: 1px solid rgba(255,255,255,.35); padding-bottom: 1px; transition: border-color .15s, color .15s; }
    .mp-cta:hover { color: #f4a090; border-color: #f4a090; }
    .mp-cta-primary { display: inline-flex; align-items: center; gap: 6px; font-family: 'Barlow Condensed', sans-serif; font-size: 11px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; background: var(--lp-red); color: #fff; padding: 7px 14px; text-decoration: none; transition: background .15s; }
    .mp-cta-primary:hover { background: #a02a22; }
    .mp-avail-pill { font-family: 'Barlow Condensed', sans-serif; font-size: 9px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; padding: 2px 7px; border: 1px solid rgba(255,255,255,.2); color: rgba(255,255,255,.5); }
    .mp-avail-pill.seeking { border-color: #f4a090; color: #f4a090; }

    /* ═══════════════════════════════
       DISPATCH CARDS (3-col on lg)
    ═══════════════════════════════ */
    .dispatch-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 0;
    }
    @media (min-width: 1024px) {
      .dispatch-grid { grid-template-columns: repeat(3, 1fr); }
      .dispatch-card + .dispatch-card { border-left: 1px solid var(--lp-rule); padding-left: 20px; margin-left: 20px; }
    }
    .dispatch-card { padding-bottom: 20px; margin-bottom: 20px; border-bottom: 1px solid var(--lp-rule); }
    @media (min-width: 1024px) { .dispatch-card { border-bottom: none; margin-bottom: 0; padding-bottom: 0; } }
    .dispatch-img { width: 100%; aspect-ratio: 16/10; object-fit: cover; filter: grayscale(12%); margin-bottom: 10px; display: block; }

    /* ═══════════════════════════════
       HOMEPAGE JOB/DEV TEASERS
    ═══════════════════════════════ */
    .job-teaser { border-bottom: 1px solid var(--lp-rule); padding: 12px 0; text-decoration: none; color: inherit; display: block; transition: background .12s, padding-left .12s; }
    .job-teaser:first-child { border-top: 1px solid var(--lp-rule); }
    .job-teaser:hover { background: rgba(192,54,44,.03); padding-left: 6px; }
    .job-teaser-co { font-family: 'Barlow Condensed', sans-serif; font-size: 10px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; color: var(--lp-red); margin-bottom: 1px; }
    .job-teaser-title { font-family: 'Playfair Display', serif; font-size: 14px; font-weight: 700; line-height: 1.25; color: var(--lp-ink); margin-bottom: 3px; }
    .job-teaser-meta { font-family: 'Barlow Condensed', sans-serif; font-size: 10px; letter-spacing: .04em; color: var(--lp-muted); display: flex; align-items: center; gap: 4px; }
    .job-teaser-pay { font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 600; color: var(--lp-blue); }
    .dev-teaser { border-bottom: 1px solid var(--lp-rule); padding: 12px 0; text-decoration: none; color: inherit; display: block; transition: background .12s, padding-left .12s; }
    .dev-teaser:first-child { border-top: 1px solid var(--lp-rule); }
    .dev-teaser:hover { background: rgba(192,54,44,.03); padding-left: 6px; }
    .dev-teaser-name { font-family: 'Playfair Display', serif; font-size: 14px; font-weight: 700; color: var(--lp-ink); margin-bottom: 1px; }
    .dev-teaser-role { font-family: 'Barlow Condensed', sans-serif; font-size: 10px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--lp-muted); margin-bottom: 3px; }
    .dev-teaser-meta { font-family: 'Barlow Condensed', sans-serif; font-size: 10px; letter-spacing: .04em; color: var(--lp-muted); display: flex; align-items: center; gap: 4px; }
    .dev-teaser-rate { font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 600; color: var(--lp-red); }
    .dev-seek-pill { font-family: 'Barlow Condensed', sans-serif; font-size: 8px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; padding: 1px 5px; border: 1px solid var(--lp-red); color: var(--lp-red); flex-shrink: 0; }

    /* ═══════════════════════════════
       CHAMPIONSHIP BANNER
    ═══════════════════════════════ */
    .champ-banner { background: #0a1628; border: 1px solid #1a4a8a; padding: 12px 18px; display: flex; align-items: center; gap: 14px; margin-bottom: 28px; }
    .champ-banner-badge { font-family: 'Barlow Condensed', sans-serif; font-size: 9px; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; background: var(--lp-blue); color: #fff; padding: 3px 8px; flex-shrink: 0; }
    .champ-banner-text { font-family: 'Barlow Condensed', sans-serif; font-size: 13px; font-weight: 600; letter-spacing: .04em; color: rgba(255,255,255,.8); flex: 1; }
    .champ-banner-text strong { color: #fff; }
    .champ-banner-cta { font-family: 'Barlow Condensed', sans-serif; font-size: 11px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; background: var(--lp-red); color: #fff; padding: 6px 14px; text-decoration: none; flex-shrink: 0; white-space: nowrap; transition: background .15s; }
    .champ-banner-cta:hover { background: #a02a22; }
    @media (max-width: 640px) { .champ-banner { flex-wrap: wrap; } .champ-banner-cta { width: 100%; text-align: center; } }

    /* ═══════════════════════════════
       EDITION STRIP
    ═══════════════════════════════ */
    .edition-strip { display: flex; align-items: center; justify-content: space-between; padding: 7px 0; margin-bottom: 22px; border-bottom: 1px solid var(--lp-rule); flex-wrap: wrap; gap: 8px; }
    .edition-strip-left { font-family: 'Barlow Condensed', sans-serif; font-size: 11px; font-weight: 700; letter-spacing: .14em; color: var(--lp-red); display: flex; align-items: center; gap: 8px; }
    .edition-strip-right { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
    .edition-pill { font-family: 'Barlow Condensed', sans-serif; font-size: 10px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; padding: 3px 10px; border: 1px solid var(--lp-rule); color: var(--lp-muted); text-decoration: none; transition: background .12s, color .12s, border-color .12s; }
    .edition-pill:hover { border-color: var(--lp-ink); color: var(--lp-ink); }
    .edition-pill.active { background: var(--lp-ink); border-color: var(--lp-ink); color: #fff; }

    /* ═══════════════════════════════
       MOBILE JOB OVERLAY
       (homepage version — same pattern
       as job board overlay)
    ═══════════════════════════════ */
    .hp-job-overlay-backdrop {
      display: none; position: fixed; inset: 0;
      background: rgba(0,0,0,.55); z-index: 400;
      opacity: 0; transition: opacity .25s ease;
    }
    .hp-job-overlay-backdrop.visible { display: block; opacity: 1; }
    .hp-job-overlay {
      position: fixed; bottom: 0; left: 0; right: 0;
      height: 92dvh;
      background: var(--lp-cream);
      z-index: 401;
      transform: translateY(100%);
      transition: transform .3s cubic-bezier(.32,.72,0,1);
      display: flex; flex-direction: column; overflow: hidden;
    }
    .hp-job-overlay.open { transform: translateY(0); }
    .hp-job-overlay-accent { height: 3px; background: linear-gradient(90deg, var(--lp-red), #6b4fa0); flex-shrink: 0; }
    .hp-job-overlay-bar {
      display: flex; align-items: center; justify-content: space-between;
      padding: 10px 16px; border-bottom: 1px solid var(--lp-rule);
      background: var(--lp-cream); flex-shrink: 0;
    }
    .hp-job-overlay-brand { font-family: 'Barlow Condensed', sans-serif; font-size: 12px; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; color: var(--lp-ink); }
    .hp-job-overlay-close { display: flex; align-items: center; gap: 5px; font-family: 'Barlow Condensed', sans-serif; font-size: 11px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; background: none; border: 1px solid var(--lp-rule); padding: 5px 10px; cursor: pointer; color: var(--lp-muted); }
    .hp-job-overlay-content { flex: 1; overflow-y: auto; -webkit-overflow-scrolling: touch; padding: 20px 16px; }
    .hp-job-overlay-footer { flex-shrink: 0; padding: 12px 16px; border-top: 1px solid var(--lp-rule); background: var(--lp-cream); display: flex; gap: 8px; }
    @media (min-width: 1024px) { .hp-job-overlay, .hp-job-overlay-backdrop { display: none !important; } }
  </style>
</head>

<!-- ════════════ bodyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy ════════════ -->

<body>

<!-- ════════════ TICKER ════════════ -->
<div class="ticker-wrap" aria-label="Breaking news">
  <div class="ticker-label">BETA</div>
  <div class="ticker-track" aria-live="polite">
    <?php foreach (array_merge($tickerItems, $tickerItems) as $item): ?>
    <span class="ticker-item">
      <?php if (is_array($item)): ?>
        <?php if (!empty($item['url'])): ?><a href="<?= e($item['url']) ?>"><?= e($item['text']) ?></a><?php else: ?><?= e($item['text']) ?><?php endif; ?>
      <?php else: ?>
        <?= e($item) ?>
      <?php endif; ?>
    </span>
    <?php endforeach; ?>
  </div>
</div>

<!-- ════════════ UTILITY BAR ════════════ -->
<div class="util-bar">
  <div class="max-w-7xl mx-auto px-4 py-1.5 flex justify-between items-center">
    <a href="/" class="reveal reveal-1 hidden md:block">EST<span class="tld">.</span>2026</a>
    <div class="flex items-center gap-3">
      <?php if ($weather): ?>
      <span><?= date('l, F j, Y') ?></span><span class="text-gray-400">&middot;</span><span><?= e($weather) ?></span>
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

<!-- ════════════ MASTHEAD ════════════ -->
<header class="masthead" id="masthead" role="banner">
  <div class="max-w-7xl mx-auto px-3 md:px-6">
    <div class="flex items-center justify-between gap-4 pb-1.5">
    
      <button class="hamburger mobile-only" id="hamburger-btn"
              aria-label="Open navigation" aria-expanded="false" aria-controls="mobile-drawer">
        <span></span><span></span><span></span>
      </button>


      <nav class="hidden md:flex items-center gap-1 flex-1" aria-label="Secondary navigation">
        <?php foreach (['Frontend','Backend','DevOps','Security','Open Source'] as $section): ?>
        <a href="/section/<?= slug($section) ?>" class="section-label hover:text-orange-700 transition-colors px-2 py-1"><?= e($section) ?></a>
        <?php endforeach; ?>
      </nav>
      <div class="text-center flex-shrink-0">
        <a href="/" class="logo reveal reveal-1">NEWYORK<span class="tld">.</span>DEV</a>
        <p class="logo-sub reveal reveal-2">Allegedly, a Newspaper.</p>
      </div>
      <div class="flex-1 hidden md:flex items-center justify-end gap-3">
        <form action="/search" method="GET" class="search-wrapper desktop-search" role="search">
          <input type="search" name="q" class="search-input" placeholder="Search the Record..."
                 aria-label="Search articles" id="site-search" autocomplete="off"
                 value="<?= e($_GET['q'] ?? '') ?>">
          <button type="submit" class="search-btn" aria-label="Submit search">&#8981;</button>
        </form>
        <a href="/subscribe" class="btn-subscribe desktop-subscribe">Subscribe</a>
      </div>
      <div class="flex items-center gap-3 mobile-only">
        <button id="mobile-search-btn" aria-label="Open search" aria-expanded="false"
                style="background:none;border:none;cursor:pointer;color:var(--ink);padding:4px;font-size:20px;">&#8981;</button>
        <a href="/subscribe" class="btn-subscribe" style="font-size:10px;padding:6px 12px;">JOIN</a>
      </div>
    </div>
    <div class="nav-scroll-wrap" id="nav-scroll-wrap">
      <nav class="primary-nav md:justify-center" aria-label="Primary navigation" id="primary-nav">
        <?php foreach ($navItems as $item): ?>
        <a href="<?= e($item['href']) ?>" class="<?= !empty($item['active']) ? 'active' : '' ?>"><?= e($item['label']) ?></a>
        <?php endforeach; ?>
      </nav>
      <span class="nav-scroll-arrow" aria-hidden="true">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="9 18 15 12 9 6"/></svg>
      </span>
    </div>
  </div>
</header>

<!-- ════════════ MOBILE DRAWER ════════════ -->
<div class="mobile-drawer" id="mobile-drawer" role="dialog" aria-modal="true" aria-label="Navigation menu">
  <div class="drawer-overlay" id="drawer-overlay"></div>
  <div class="drawer-panel">
    <div class="drawer-header">
      <span class="logo" style="font-size:22px;">NEWYORK<span class="tld">.DEV</span></span>
      <button id="drawer-close" aria-label="Close navigation"
              style="background:none;border:none;cursor:pointer;font-size:22px;color:var(--ink);">&#10005;</button>
    </div>
    <nav class="drawer-nav" aria-label="Mobile navigation">
      <?php foreach ($drawerNav as $item): ?>
      <a href="<?= e($item['href']) ?>"><?= e($item['label']) ?><span class="arrow">&#8594;</span></a>
      <?php endforeach; ?>
    </nav>
    <div style="padding:20px;margin-top:auto;border-top:1px solid var(--rule);">
      <a href="/subscribe" class="btn-subscribe" style="width:100%;text-align:center;display:block;">Subscribe to the Record</a>
      <p style="font-family:'Barlow Condensed',sans-serif;font-size:11px;color:var(--muted);margin-top:10px;text-align:center;letter-spacing:0.06em;">Free for devs. Always.</p>
    </div>
  </div>
</div>

<!-- ════════════ MOBILE SEARCH ════════════ -->
<div class="mobile-search-overlay" id="mobile-search-overlay" role="search" aria-label="Site search">
  <div class="mobile-search-inner">
    <form action="/search" method="GET" style="display:contents;">
      <input type="search" name="q" id="mobile-search-field" class="mobile-search-field"
             placeholder="Search the Record..." aria-label="Search articles" autocomplete="off">
      <button type="submit" class="mobile-search-submit">SEARCH</button>
    </form>
    <button class="mobile-search-close" id="mobile-search-close" aria-label="Close search">&#10005;</button>
  </div>
  <p class="mobile-search-hint">Try: "Laravel", "DevOps", "NY infra"</p>
</div>





 <!-- tabloid strip -->
  
<div class="max-w-7xl mx-auto tabloid-strip relative group" aria-label="Satirical news" role="complementary">
  
  <button type="button" 
    class="nav-scroll-btn absolute left-0 top-1/2 -translate-y-1/2 z-10 p-2 bg-black/50 text-white rounded-r-lg hidden md:block"
    aria-label="Scroll left"
    onclick="document.querySelector('.tabloid-grid').scrollBy({left: -300, behavior: 'smooth'})">
    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
  </button>

  <div class="tabloid-grid flex overflow-x-auto snap-x scroll-smooth pb-2">

 <article class="tabloid-item bg-amber-50  w-[80%] md:w-[22%] snap-start">
      <p class="tabloid-tag">We Know</p>
      <h3 class="tabloid-hed">Most Visitors are here for the
        <a href="/jobs" class="bg-red-600 text-white px-1  rounded transition-colors duration-300 ease-in-out hover:bg-white hover:text-red-600">  Job Board</a></h3>
  <p class="tabloid-sub">  - So we're making it easier Click the Tab, or just browse.</p>  
</article>


        <article class="tabloid-item   w-[80%] md:w-[22%] snap-start">
      <p class="tabloid-tag">Breaking2</p>
      <h3 class="tabloid-hed">"I'll Just Google It"  -
              <a href="/post-a-job" class=" text-red-700 px-1  rounded transition-colors duration-300 ease-in-out  hover:text-red-900 bg-amber-50 ">  Post an Opening</a> </h3>

      <p class="tabloid-sub">Stack Overflow tab count at all-time high.</p>
    </article>
    

        <article class="tabloid-item w-[80%] md:w-[22%] snap-start">
        <p class="tabloid-tag">Exclusive3</p>
        <h3 class="tabloid-hed">Local Dev Rewrites Legacy Codebase, Produces Identical Legacy Codebase</h3>
        <p class="tabloid-sub">"It's basically the same but in TypeScript," he said proudly.</p>
      </article>
      
        <article class="tabloid-item w-[80%] md:w-[22%] snap-start">
        <p class="tabloid-tag">Analysis4</p>
        <h3 class="tabloid-hed">Area Startup Pivots to AI, Is Now Just a Regular Database with a Chatbot</h3>
        <p class="tabloid-sub">Valuation unchanged at $40M.</p>
      </article>

        <article class="tabloid-item flex-shrink-0 w-[80%] md:w-[22%] snap-start">
        <p class="tabloid-tag">Opinion5</p>
              <h3 class="tabloid-hed">NewYork.dev Editor in Trouble</h3> 
        <p class="tabloid-sub">"What is this?  The Onion? - I just can't think of a fourth article. Now, Beat it."</p>  
      </article>
    </div>

  <button type="button" 
    class="nav-scroll-btn absolute right-0 top-1/2 -translate-y-1/2 z-10 p-2 bg-black/50 text-white rounded-l-lg"
    aria-label="Scroll right"
    onclick="document.querySelector('.tabloid-grid').scrollBy({left: 300, behavior: 'smooth'})">
    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
  </button>
</div>




<!-- ════════════ MAIN ════════════ -->
<main class="max-w-7xl mx-auto px-4 md:px-6 pt-4 pb-4" id="main-content">
 


  <!-- Championship banner -->
  <div class="hidden champ-banner reveal reveal-1" role="complementary">
    <span class="champ-banner-badge">&#127942; NYC Wins</span>
    <p class="champ-banner-text">
      <strong>New York won it all.</strong>
      Celebrating &mdash; $26 off for the first 26 companies to post a role in 2026.
    </p>
    <a href="/post-a-job?promo=NYC26" class="champ-banner-cta">Claim the deal &rarr;</a>
  </div>

  <!-- Edition strip -->
  <div class="edition-strip reveal reveal-2">
    <div class="edition-strip-left">
      <span>&#11041;</span>
      <span><?= date('F j, Y') ?> &middot; New York Edition</span>
    </div>
    <div class="edition-strip-right">
      <a href="/jobs"      class="edition-pill">Dev Jobs</a>
      <a href="/devs"      class="edition-pill">Hire a Dev</a>
      <a href="/subscribe" class="edition-pill active">Subscribe Free</a>
    </div>
  </div>

  <!-- ════════════════════════════════════
    HERO GRID
    Left 8 cols: lead article
    Right 4 cols: video + latest job cards
  ════════════════════════════════════ -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-0 mb-0 reveal reveal-3">

  
 


    <!-- Right: video + latest jobs -->
    <aside class="lg:col-span-3 lg:pr-2 flex flex-col" aria-label="Latest openings">

      <!-- Promo video -->
      <div class="hero-job-panel mb-0" style="border-bottom:none;">
        <div class="hero-job-panel-bar"></div>
        <div class="hero-video-wrap" id="hero-video-wrap">
          <div class="hero-video-overlay" id="hero-video-overlay"
               role="button" tabindex="0" aria-label="Play intro video"
               onclick="startHeroVideo()" onkeydown="if(event.key==='Enter'||event.key===' ')startHeroVideo()">
            <div class="hero-play-circle">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="white" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
            </div>
            <span class="hero-video-eyebrow">Now hiring on NewYork.dev</span>
          </div>
          <iframe id="hero-video-iframe" src="about:blank" loading="lazy"
                  style="width:100%;height:100%;border:none;display:block;"
                  allow="autoplay;fullscreen" allowfullscreen title="NewYork.dev intro"></iframe>
        </div>
      </div>

      <!-- Latest job cards -->
      <div class="hero-job-panel" style="flex:1;border-top:none;">
        <div style="padding:8px 14px 4px;border-bottom:1px solid var(--lp-rule);">
          <span style="font-family:'Barlow Condensed',sans-serif;font-size:9px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--lp-muted);">Latest Openings</span>
        </div>

        <?php foreach ($heroJobs as $job): ?>
        <div class="hero-job-item"
             data-job-id="<?= e($job['id']) ?>"
             data-job-company="<?= e($job['company']) ?>"
             data-job-title="<?= e($job['title']) ?>"
             data-job-location="<?= e($job['location']) ?>"
             data-job-salary="<?= $job['salary'] ?>"
             data-job-salary-type="<?= e($job['salary_type']) ?>"
             data-job-tags="<?= e(implode(',', $job['tags'])) ?>"
             data-job-video="<?= e($job['video_url']) ?>"
             data-job-url="<?= e($job['url']) ?>"
             data-job-posted="<?= e($job['posted']) ?>"
             onclick="openHpJobOverlay(this)"
             role="button" tabindex="0"
             onkeydown="if(event.key==='Enter')openHpJobOverlay(this)"
             aria-label="<?= e($job['title']) ?> at <?= e($job['company']) ?>">
          <p class="hero-job-co"><?= e($job['company']) ?></p>
          <p class="hero-job-title"><?= e($job['title']) ?></p>
          <div class="hero-job-meta">
            <svg width="8" height="8" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
            </svg>
            <span><?= e($job['location']) ?></span>
            <span style="color:var(--lp-rule)">&middot;</span>
            <span class="hero-job-pay"><?= $job['salary'] ?></span>
            <?php if ($job['video_url']): ?>
            <span class="hero-job-vid">&#9654; Video</span>
            <?php endif; ?>
          </div>
        </div>
        <?php endforeach; ?>

        <div class="hero-panel-foot">
          <span class="hero-panel-foot-label"><?= count($heroJobs) ?> of <?= count($phpJobs ?? $heroJobs) ?> openings</span>
          <a href="/jobs" class="hero-panel-foot-cta">Browse All &rarr;</a>
        </div>
      </div>

    </aside>


  <!-- Lead article -->
    <article class="lg:col-span-6 col-rule py-4 lg:pr-3 lg:pl-3 lg:py-0 ">
      <span class="flag red">Infrastructure</span>
      <h1 class="lead-hed mb-3">
        <a href="#">NYC's Tech Stack Is Crumbling - and 10,000 Devs Are the Only Fix</a>
      </h1>
      <p class="deck mb-5">
        An audit of New York's municipal software reveals a fragile patchwork of PHP&nbsp;5.3,
        Oracle&nbsp;11g, and handwritten COBOL holding together systems that process $3.4&nbsp;billion
        daily. A new initiative wants to change that &mdash; one pull request at a time.
      </p>
      <figure>
        <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=900&h=400&fit=crop&auto=format"
             alt="Lower Manhattan skyline at dusk"
             class="lead-img" loading="eager" width="900" height="400"
             style="margin-bottom:8px;">
        <figcaption class="byl">Lower Manhattan, June 2026. <em>Photo: Unsplash</em></figcaption>
      </figure>
      <div class="flex items-center gap-3 mt-4 flex-wrap">
        <p class="byl">By <strong>Robert Chen</strong> &middot; June 6, 2026</p>
        <span class="tech-tag">php</span>
        <span class="tech-tag">infrastructure</span>
        <span class="tech-tag hot">urgent</span>
      </div>
    </article>


    <!-- Devs column -->
    <section class="lg:col-span-3 lg:pl-5 mt-8 lg:mt-0">
      <span class="flag">Available Devs</span>
      <?php
      $featuredDevs = [
        ['name'=>'Alex Rivera', 'role'=>'Senior Full-Stack',     'location'=>'Brooklyn',        'rate'=>'$130k&ndash;$155k','seeking'=>true],
        ['name'=>'Priya Mehta', 'role'=>'DevOps / Platform Eng', 'location'=>'Manhattan',       'rate'=>'$120/hr',          'seeking'=>false],
        ['name'=>'Marcus T.',   'role'=>'React / TypeScript',    'location'=>'Queens',          'rate'=>'$95k&ndash;$120k', 'seeking'=>true],
        ['name'=>'Sarah K.',    'role'=>'ML / AI Engineer',      'location'=>'Upstate (Remote)','rate'=>'$150/hr',          'seeking'=>false],
      ];
      foreach ($featuredDevs as $dev):
      ?>
      <a href="/devs" class="dev-teaser">
        <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:8px;">
          <div>
            <p class="dev-teaser-name"><?= e($dev['name']) ?></p>
            <p class="dev-teaser-role"><?= e($dev['role']) ?></p>
          </div>
          <?php if ($dev['seeking']): ?>
          <span class="dev-seek-pill" style="margin-top:3px;">Looking</span>
          <?php endif; ?>
        </div>
        <div class="dev-teaser-meta">
          <svg width="8" height="8" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
          </svg>
          <span><?= e($dev['location']) ?></span>
          <span style="color:var(--lp-rule)">&middot;</span>
          <span class="dev-teaser-rate"><?= $dev['rate'] ?></span>
        </div>
      </a>
      <?php endforeach; ?>
      <a href="/devs" class="view-more">Browse all devs &rarr;</a>

      <hr class="hr-single my-6">

      <!-- Newsletter -->
      <div style="background:var(--ink);padding:18px;">
        <p style="font-family:'Barlow Condensed',sans-serif;font-size:9px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:rgba(255,255,255,.4);margin-bottom:8px;">Weekly Briefing</p>
        <p style="font-family:'Playfair Display',serif;font-size:15px;color:#fff;font-weight:700;line-height:1.3;margin-bottom:10px;">Dev news that matters.</p>
        <form action="/newsletter/subscribe" method="POST" class="flex flex-col gap-2">
          <input type="hidden" name="_token" value="<?= e($csrf) ?>">
          <input type="email" name="email" placeholder="your@email.dev" required
                 aria-label="Email address"
                 style="font-family:'Lora',serif;font-size:13px;padding:7px 10px;border:1px solid rgba(255,255,255,.2);background:rgba(255,255,255,.08);color:#fff;outline:none;width:100%;">
          <button type="submit" class="btn-subscribe" style="background:var(--accent);width:100%;text-align:center;">Subscribe Free &rarr;</button>
        </form>
        <p style="font-family:'Barlow Condensed',sans-serif;font-size:9px;letter-spacing:.06em;color:rgba(255,255,255,.3);margin-top:8px;">No spam. Unsubscribe anytime.</p>
      </div>

      <!-- Trending -->
      <div style="margin-top:18px;padding-top:14px;border-top:2px solid var(--ink);">
        <p style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;margin-bottom:10px;">Trending in NYC</p>
        <div class="flex flex-wrap gap-2">
          <?php foreach (($trendingTech ?? ['Laravel 13','React 19','Bun 2','Rust','Kafka','htmx','PostgreSQL 18']) as $tech): ?>
          <a href="/tag/<?= slug($tech) ?>" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer"><?= e($tech) ?></a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>



  </div><!-- /hero grid -->

  <hr class="hr-double my-8">

  <!-- ════════════════════════════════════
    MARKETPLACE SPOTLIGHT
  ════════════════════════════════════ 
  <div class="marketplace-strip mb-8" role="complementary" aria-label="Marketplace spotlight">
    <div class="grid grid-cols-1 md:grid-cols-2">
      <div class="marketplace-col">
        <span class="mp-eyebrow">Featured Role &middot; NewYork.dev/jobs</span>
        <p class="mp-headline">Senior Laravel Engineer</p>
        <div class="mp-meta">
          <span>Rain Software</span><span style="color:rgba(255,255,255,.2)">&middot;</span>
          <span>NYC (Remote OK)</span><span style="color:rgba(255,255,255,.2)">&middot;</span>
          <span class="mp-rate">$120k&ndash;$155k</span>
        </div>
        <div class="mp-tags">
          <?php foreach (['Laravel','PHP','PostgreSQL','Docker','AWS'] as $t): ?><span class="mp-tag"><?= $t ?></span><?php endforeach; ?>
        </div>
        <div class="mp-divider"></div>
        <div style="display:flex;align-items:center;gap:14px;flex-wrap:wrap;">
          <a href="/jobs" class="mp-cta">Browse all openings &rarr;</a>
          <a href="/post-a-job" class="mp-cta-primary">Post a Role</a>
        </div>
      </div>
      <div class="marketplace-col">
        <span class="mp-eyebrow">Featured Dev &middot; NewYork.dev/devs</span>
        <p class="mp-headline">Alex Rivera</p>
        <div class="mp-meta">
          <span>Senior Full-Stack</span><span style="color:rgba(255,255,255,.2)">&middot;</span>
          <span>Brooklyn, NYC</span><span style="color:rgba(255,255,255,.2)">&middot;</span>
          <span class="mp-rate">$130k&ndash;$155k</span>
        </div>
        <div style="display:flex;gap:5px;margin-bottom:10px;flex-wrap:wrap;">
          <span class="mp-avail-pill seeking">Actively Looking</span>
          <span class="mp-avail-pill">Open to Full-Time</span>
        </div>
        <div class="mp-tags">
          <?php foreach (['Laravel','Vue','PostgreSQL','Docker'] as $t): ?><span class="mp-tag"><?= $t ?></span><?php endforeach; ?>
        </div>
        <div class="mp-divider"></div>
        <div style="display:flex;align-items:center;gap:14px;flex-wrap:wrap;">
          <a href="/devs" class="mp-cta">Browse all devs &rarr;</a>
          <a href="/list-yourself" class="mp-cta-primary">List Yourself</a>
        </div>
      </div>
    </div>
  </div>
-->


  <!-- ════════════════════════════════════
    THREE-COLUMN SECTION
    Dispatches (3-col on lg) | Jobs | Devs
  ════════════════════════════════════ -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">

    <!-- Dispatches — 5 cols, 3-col grid inside -->
    <section class="lg:col-span-9 col-rule lg:pr-8">
      <span class="flag">Latest Dispatches</span>
      <?php
      $dispatches = $dispatches ?? [
        ['section'=>'DevOps',      'headline'=>'Terraform 2.0 drops state lock &mdash; NY teams are not ready',       'byline'=>'S. Kim &middot; Jun 13', 'image'=>'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=500&h=280&fit=crop'],
        ['section'=>'Open Source', 'headline'=>"A Bronx dev's side project just hit 12k GitHub stars",                'byline'=>'M. Osei &middot; Jun 11', 'image'=>'https://images.unsplash.com/photo-1556075798-4825dfaaf498?w=500&h=280&fit=crop'],
        ['section'=>'Security',    'headline'=>'Rate-limiting is not authentication. NY fintechs keep confusing them', 'byline'=>'L. Torres &middot; Jun 10','image'=>'https://images.unsplash.com/photo-1563206767-5b18f218e8de?w=500&h=280&fit=crop'],
      ];
      ?>
      <div class="dispatch-grid">
        <?php foreach ($dispatches as $i => $article): ?>
        <article class="dispatch-card">
          <img src="<?= e($article['image']) ?>" alt="" loading="lazy" class="dispatch-img">
          <span class="kicker"><?= e($article['section']) ?></span>
          <h3 class="col-hed"><a href="#"><?= $article['headline'] ?></a></h3>
          <p class="byl"><?= $article['byline'] ?></p>
        </article>
        <?php endforeach; ?>
      </div>

      <hr class="hr-single my-6">
      <div>
        <span class="flag">Opinion</span>
        <blockquote class="pull-quote-hp">
          &ldquo;We keep building for scale we don&rsquo;t have yet, and ignoring the scale we already can&rsquo;t handle.&rdquo;
        </blockquote>
        <p class="byl mt-3">&mdash; <strong>RVF</strong>, Principal Eng. NYC OpenData &middot; <a href="#" class="u-link">Read the column &rarr;</a></p>
      </div>






  <hr class="hr-double mt-4 mb-8">

  <!-- Most Read -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-0">
    <div style="padding-right:24px;border-right:1px solid var(--lp-rule);" class="hidden md:block">
      <span class="flag">Most Read</span>
      <p style="font-family:'Playfair Display',serif;font-size:13px;font-style:italic;color:var(--lp-muted);line-height:1.6;">What the NY dev community is reading this week.</p>
    </div>
    <?php
    $mostRead = $mostRead ?? [
      "Why Senior Engineers Are Leaving FAANG for NYC Gov Contracts (Answer: They're Not)",
      "The 7 Polish cursewords for frustrated devs + 3 in Yiddish",
      "Simbang Gabi &mdash; 9 Dev Tips before the Winter Holidays",
    ];
    foreach (array_slice($mostRead, 0, 3) as $i => $headline):
    ?>
    <article style="padding:0 20px;<?= $i < 2 ? 'border-right:1px solid var(--lp-rule);' : '' ?>">
      <span style="font-family:'Playfair Display',serif;font-size:28px;font-weight:900;color:var(--lp-rule);line-height:1;display:block;margin-bottom:6px;"><?= $i + 1 ?></span>
      <h3 style="font-family:'Playfair Display',serif;font-size:14px;font-weight:700;line-height:1.4;color:var(--lp-ink);">
        <a href="#" class="u-link"><?= $headline ?></a>
      </h3>
    </article>
    <?php endforeach; ?>
  </div>



 


    </section>








    <!-- Devs column -->
    <section class="lg:col-span-3 lg:pl-8 mt-8 lg:mt-0">
      <span class="flag">Available Devs</span>
      <?php
      $featuredDevs = [
        ['name'=>'Alex Rivera', 'role'=>'Senior Full-Stack',     'location'=>'Brooklyn',        'rate'=>'$130k&ndash;$155k','seeking'=>true],
        ['name'=>'Priya Mehta', 'role'=>'DevOps / Platform Eng', 'location'=>'Manhattan',       'rate'=>'$120/hr',          'seeking'=>false],
        ['name'=>'Marcus T.',   'role'=>'React / TypeScript',    'location'=>'Queens',          'rate'=>'$95k&ndash;$120k', 'seeking'=>true],
        ['name'=>'Sarah K.',    'role'=>'ML / AI Engineer',      'location'=>'Upstate (Remote)','rate'=>'$150/hr',          'seeking'=>false],
      ];
      foreach ($featuredDevs as $dev):
      ?>
      <a href="/devs" class="dev-teaser">
        <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:8px;">
          <div>
            <p class="dev-teaser-name"><?= e($dev['name']) ?></p>
            <p class="dev-teaser-role"><?= e($dev['role']) ?></p>
          </div>
          <?php if ($dev['seeking']): ?>
          <span class="dev-seek-pill" style="margin-top:3px;">Looking</span>
          <?php endif; ?>
        </div>
        <div class="dev-teaser-meta">
          <svg width="8" height="8" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
          </svg>
          <span><?= e($dev['location']) ?></span>
          <span style="color:var(--lp-rule)">&middot;</span>
          <span class="dev-teaser-rate"><?= $dev['rate'] ?></span>
        </div>
      </a>
      <?php endforeach; ?>
      <a href="/devs" class="view-more">Browse all devs &rarr;</a>

      <hr class="hr-single my-6">

      <!-- Newsletter -->
      <div style="background:var(--ink);padding:18px;">
        <p style="font-family:'Barlow Condensed',sans-serif;font-size:9px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:rgba(255,255,255,.4);margin-bottom:8px;">Weekly Briefing</p>
        <p style="font-family:'Playfair Display',serif;font-size:15px;color:#fff;font-weight:700;line-height:1.3;margin-bottom:10px;">Dev news that matters.</p>
        <form action="/newsletter/subscribe" method="POST" class="flex flex-col gap-2">
          <input type="hidden" name="_token" value="<?= e($csrf) ?>">
          <input type="email" name="email" placeholder="your@email.dev" required
                 aria-label="Email address"
                 style="font-family:'Lora',serif;font-size:13px;padding:7px 10px;border:1px solid rgba(255,255,255,.2);background:rgba(255,255,255,.08);color:#fff;outline:none;width:100%;">
          <button type="submit" class="btn-subscribe" style="background:var(--accent);width:100%;text-align:center;">Subscribe Free &rarr;</button>
        </form>
        <p style="font-family:'Barlow Condensed',sans-serif;font-size:9px;letter-spacing:.06em;color:rgba(255,255,255,.3);margin-top:8px;">No spam. Unsubscribe anytime.</p>
      </div>

      <!-- Trending -->
      <div style="margin-top:18px;padding-top:14px;border-top:2px solid var(--ink);">
        <p style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;margin-bottom:10px;">Trending in NYC</p>
        <div class="flex flex-wrap gap-2">
          <?php foreach (($trendingTech ?? ['Laravel 13','React 19','Bun 2','Rust','Kafka','htmx','PostgreSQL 18']) as $tech): ?>
          <a href="/tag/<?= slug($tech) ?>" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer"><?= e($tech) ?></a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

  </div><!-- /three col -->

  <hr class="hr-double mt-4 mb-8"> 
  </div>

</main>

<!-- ════════════ MOBILE JOB OVERLAY (homepage) ════════════ -->
<div id="hp-job-overlay-backdrop" class="hp-job-overlay-backdrop" aria-hidden="true"></div>
<div id="hp-job-overlay" class="hp-job-overlay" role="dialog" aria-modal="true" aria-label="Job details">
  <div class="hp-job-overlay-accent"></div>
  <div class="hp-job-overlay-bar">
    <span class="hp-job-overlay-brand">NewYork<span style="color:var(--lp-rule)">.</span>Dev</span>
    <button id="hp-overlay-close-btn" class="hp-job-overlay-close" aria-label="Close job details">
      <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
      </svg>
      Close
    </button>
  </div>
  <div class="hp-job-overlay-content" id="hp-overlay-content"></div>
  <div class="hp-job-overlay-footer" id="hp-overlay-footer"></div>
</div>

<!-- ════════════ FOOTER ════════════ -->
<footer role="contentinfo" style="border-top:4px solid #C0362C;">
  <div style="border-bottom:1px solid rgba(255,255,255,0.1);">
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-12">
      <div class="grid grid-cols-3 sm:grid-cols-3 lg:grid-cols-5 gap-8">
        <div class="col-span-3 sm:col-span-3 lg:col-span-2">
          <p class="footer-logo">NEWYORK<span class="tld">.DEV</span></p>
          (<a href="https://notnewyork.com" class="text-gray-500 hover:text-[#C0362C] transition-colors"><b>not</b>newyork.com</a>)
          <p style="font-family:'Lora',serif;font-size:14px;line-height:1.7;margin-top:12px;color:rgba(255,255,255,0.5);max-width:360px;">Indy journalism for the dev community.</p>
          <div class="flex gap-4 mt-6">
            <a href="#" aria-label="GitHub"    class="footer-link" style="font-size:18px">&#8997;</a>
            <a href="#" aria-label="X/Twitter" class="footer-link" style="font-size:18px">&#10005;</a>
            <a href="#" aria-label="RSS"       class="footer-link" style="font-size:18px">&#10753;</a>
          </div>
        </div>
        <?php foreach ($footerCols as $colTitle => $links): ?>
        <div>
          <p style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:.18em;color:rgba(255,255,255,.35);margin-bottom:12px;text-transform:uppercase;"><?= e($colTitle) ?></p>
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
  <div class="max-w-7xl mx-auto px-4 md:px-6 py-5 flex flex-col-reverse sm:flex-row justify-between items-center gap-3">
    <p style="font-family:'Barlow Condensed',sans-serif;font-size:11px;letter-spacing:.08em;color:rgba(255,255,255,.35);">&copy; <?= date('Y') ?> NewYork.dev. ONCILLAS. All rights reserved.</p>
    <div class="flex gap-5">
      <?php foreach (['Privacy Policy','Terms of Service','Cookie Settings','Accessibility'] as $item): ?>
      <a href="/<?= slug($item) ?>" class="footer-link" style="font-size:11px;"><?= e($item) ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</footer>

<!-- ════════════ JS ════════════ -->
<script>
(function () {
  'use strict';

  /* ── Masthead shrink ── */
  const masthead = document.getElementById('masthead');
  window.addEventListener('scroll', () => {
    masthead.classList.toggle('scrolled', window.scrollY > 10);
  }, { passive: true });

  /* ── Reveal cleanup ── */
  document.querySelectorAll('.reveal').forEach(el => {
    el.addEventListener('animationend', () => {
      el.classList.remove('reveal','reveal-1','reveal-2','reveal-3');
    }, { once: true });
  });



  /* ── Mobile search ── */
  const mobileSearchBtn     = document.getElementById('mobile-search-btn');
  const mobileSearchOverlay = document.getElementById('mobile-search-overlay');
  const mobileSearchField   = document.getElementById('mobile-search-field');
  const mobileSearchClose   = document.getElementById('mobile-search-close');
  const openMobileSearch  = () => { mobileSearchOverlay.classList.add('open'); mobileSearchBtn.setAttribute('aria-expanded','true'); document.body.style.overflow='hidden'; setTimeout(() => mobileSearchField?.focus(), 80); };
  const closeMobileSearch = () => { mobileSearchOverlay.classList.remove('open'); mobileSearchBtn.setAttribute('aria-expanded','false'); document.body.style.overflow=''; mobileSearchBtn?.focus(); };
  mobileSearchBtn?.addEventListener('click', openMobileSearch);
  mobileSearchClose?.addEventListener('click', closeMobileSearch);

  /* ── Escape ── */
  document.addEventListener('keydown', e => {
    if (e.key !== 'Escape') return;
    if (mobileSearchOverlay?.classList.contains('open')) { closeMobileSearch(); return; }
    if (drawer?.classList.contains('open')) closeDrawer();
    if (document.getElementById('hp-job-overlay')?.classList.contains('open')) closeHpOverlay();
  });

 

  /* ── Nav indicator ── */
  const navWrap = document.getElementById('nav-scroll-wrap');
  const navEl   = document.getElementById('primary-nav');
  const updateNav = () => {
    if (!navEl || !navWrap) return;
    const { scrollLeft, scrollWidth, clientWidth } = navEl;
    navWrap.classList.toggle('at-end',   scrollLeft + clientWidth >= scrollWidth - 4);
    navWrap.classList.toggle('scrolled', scrollLeft > 8);
  };
  navEl?.addEventListener('scroll', updateNav, { passive: true });
  window.addEventListener('load', updateNav);
  updateNav();

  /* ── Desktop search enter ── */
  document.getElementById('site-search')?.addEventListener('keydown', e => {
    if (e.key === 'Enter') { const q = e.target.value.trim(); if (q) e.target.closest('form').submit(); }
  });

})();

/* ── Hero video ── */
const PROMO_URL = '<?= $promoVideoUrl ?>';

function startHeroVideo() {
  const overlay = document.getElementById('hero-video-overlay');
  const iframe  = document.getElementById('hero-video-iframe');
  if (!iframe) return;
  iframe.src = PROMO_URL + '?autoplay=1';
  if (overlay) overlay.style.display = 'none';
}

/* ══════════════════════════════════════
   MOBILE JOB OVERLAY — homepage version
══════════════════════════════════════ */
const hpOverlay   = document.getElementById('hp-job-overlay');
const hpBackdrop  = document.getElementById('hp-job-overlay-backdrop');
const hpContent   = document.getElementById('hp-overlay-content');
const hpFooter    = document.getElementById('hp-overlay-footer');
const hpCloseBtn  = document.getElementById('hp-overlay-close-btn');
let hpPrevFocus   = null;

function openHpJobOverlay(el) {
  // On desktop the panel is hidden via CSS; clicking goes straight to /jobs
  if (window.innerWidth >= 1024) {
    window.location.href = el.dataset.jobUrl || '/jobs';
    return;
  }

  hpPrevFocus = document.activeElement;

  const co      = el.dataset.jobCompany  || '';
  const title   = el.dataset.jobTitle    || '';
  const loc     = el.dataset.jobLocation || '';
  const salary  = el.dataset.jobSalary   || '';
  const stype   = el.dataset.jobSalaryType === 'hr' ? ' / hr' : ' / yr';
  const tags    = (el.dataset.jobTags || '').split(',').filter(Boolean);
  const videoUrl= el.dataset.jobVideo   || '';
  const url     = el.dataset.jobUrl     || '/jobs';
  const posted  = el.dataset.jobPosted  || '';

  const tagsHTML  = tags.map(t => `<span class="detail-tag">${t}</span>`).join('');
  const videoHTML = videoUrl ? `
    <div style="margin-bottom:16px;">
      <p class="detail-label">Hiring Manager Intro</p>
      <div class="video-wrap" style="background:#000;">
        <div class="video-overlay" id="hp-overlay-play" role="button" tabindex="0" aria-label="Play video" style="cursor:pointer;">
          <div class="play-circle">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="white"><path d="M8 5v14l11-7z"/></svg>
          </div>
        </div>
        <iframe id="hp-overlay-video-iframe" src="about:blank" class="w-full h-full" frameborder="0"
                allow="autoplay;fullscreen" allowfullscreen title="${title} video"></iframe>
      </div>
    </div>` : '';

  hpContent.innerHTML = `
    <p class="detail-company" style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--lp-red);margin-bottom:4px;">${co}</p>
    <h2 class="detail-title" style="font-family:'Playfair Display',serif;font-size:20px;font-weight:900;line-height:1.2;color:var(--lp-ink);margin-bottom:8px;">${title}</h2>
    <div style="font-family:'Lora',serif;font-size:12px;color:var(--lp-muted);display:flex;flex-wrap:wrap;align-items:center;gap:5px;margin-bottom:10px;">
      <svg width="10" height="10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
      <span>${loc}</span>
      <span style="color:var(--lp-rule)">&middot;</span>
      <span style="color:#9b9790">Posted ${posted}</span>
    </div>
    <span style="font-family:'JetBrains Mono',monospace;font-size:15px;font-weight:600;color:var(--lp-blue);display:block;margin-bottom:14px;">${salary}${stype}</span>
    ${videoHTML}
    <div style="height:1px;background:var(--lp-rule);margin:14px 0;"></div>
    <div style="margin-bottom:12px;">
      <p class="detail-label" style="font-family:'Barlow Condensed',sans-serif;font-size:9px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--lp-muted);margin-bottom:6px;">Tech Stack</p>
      <div style="display:flex;flex-wrap:wrap;gap:5px;">${tagsHTML}</div>
    </div>
    <div style="height:1px;background:var(--lp-rule);margin:14px 0;"></div>
    <p style="font-family:'Lora',serif;font-size:13px;color:var(--lp-muted);font-style:italic;">
      Click &ldquo;View on Job Board&rdquo; below to see the full listing, apply, and see more roles.
    </p>
  `;

  hpFooter.innerHTML = `
    <a href="${url}" class="apply-btn" style="flex:1;text-align:center;display:flex;align-items:center;justify-content:center;gap:6px;padding:10px 20px;font-family:'Barlow Condensed',sans-serif;font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;background:var(--lp-red);color:#fff;text-decoration:none;">
      View on Job Board
      <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
    </a>
  `;

  // wire video play button
  const playBtn = document.getElementById('hp-overlay-play');
  const iframe  = document.getElementById('hp-overlay-video-iframe');
  if (playBtn && iframe) {
    playBtn.addEventListener('click', () => {
      iframe.src = videoUrl + '?autoplay=1';
      playBtn.style.display = 'none';
    });
  }

  hpOverlay.classList.add('open');
  hpBackdrop.classList.add('visible');
  document.body.style.overflow = 'hidden';
  hpOverlay.setAttribute('aria-hidden','false');
  setTimeout(() => hpCloseBtn?.focus(), 50);
}

function closeHpOverlay() {
  hpOverlay.classList.remove('open');
  hpBackdrop.classList.remove('visible');
  document.body.style.overflow = '';
  hpOverlay.setAttribute('aria-hidden','true');
  const iframe = document.getElementById('hp-overlay-video-iframe');
  if (iframe) iframe.src = 'about:blank';
  if (hpPrevFocus) hpPrevFocus.focus();
}

hpCloseBtn?.addEventListener('click', closeHpOverlay);
hpBackdrop?.addEventListener('click', closeHpOverlay);
</script>

</body>
</html>