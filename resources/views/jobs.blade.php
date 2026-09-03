<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>scranton.dev — Developer Jobs</title>

<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@400;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,
<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'>
  <rect width='32' height='32' rx='3' fill='%23fde868' transform='rotate(-3 16 16)'/>
  <text x='50%' y='54%' font-family='sans-serif' font-size='13px' font-weight='700' fill='%23211d14' text-anchor='middle' dominant-baseline='middle'>NY</text>
</svg>">
<style>
/* ══════════════════════════════════════════
   DESIGN TOKENS — paper desk / sticky notes
   ══════════════════════════════════════════ */
:root {
  --paper:        #f6f1de;   /* desk / page background */
  --paper-line:   #e3dcc0;   /* faint grid rule */
  --card:         #fffdf6;   /* index-card white-ish */
  --card-line:    #e7e0c8;
  --ink:          #211d14;   /* primary text — warm near-black */
  --ink-soft:     #6b6250;   /* secondary text */
  --ink-faint:    #a89f88;   /* tertiary / placeholder */
  --sticky:       #fde868;   /* the yellow */
  --sticky-dark:  #f3d80f;
  --sticky-edge:  #d8bf1a;
  --tape:         rgba(255,255,255,.6);
  --flag:         #e2552e;   /* featured / pin accent — used sparingly */
  --flag-bg:      #fbe2d9;
  --green:        #2f6f4e;
  --green-bg:     #dcecdd;
  --blue:         #3b5c8f;
  --blue-bg:      #dde6f2;
  --purple:       #6a4a8f;
  --purple-bg:    #ebe1f4;
  --radius-sm:    4px;
  --radius:       7px;
  --radius-lg:    10px;
  --shadow-card:  0 1px 0 rgba(33,29,20,.04), 0 2px 6px rgba(33,29,20,.06);
  --shadow-sticky:2px 4px 10px rgba(33,29,20,.18);
}

[data-theme="dark"] {
  --paper:        #2a2216;   /* corkboard */
  --paper-line:   #3a3020;
  --card:         #362c1c;
  --card-line:    #473a25;
  --ink:          #f3ecd8;
  --ink-soft:     #c2b696;
  --ink-faint:    #8a7d5f;
  --sticky:       #f3d80f;
  --sticky-dark:  #e0c700;
  --sticky-edge:  #b6a300;
  --tape:         rgba(255,255,255,.12);
  --flag:         #e2683e;
  --flag-bg:      #4a2e20;
  --green:        #7fbf94;
  --green-bg:     #23392c;
  --blue:         #93b3e0;
  --blue-bg:      #22314a;
  --purple:       #c3a4e8;
  --purple-bg:    #362a49;
  --card-line:    #473a25;
  --shadow-card:  0 1px 0 rgba(0,0,0,.2), 0 2px 8px rgba(0,0,0,.35);
  --shadow-sticky:2px 4px 12px rgba(0,0,0,.5);
}

*,*::before,*::after { box-sizing:border-box; margin:0; padding:0; }
[x-cloak] { display:none !important; }

body {
  font-family:'Space Grotesk',system-ui,sans-serif;
  background:
    linear-gradient(var(--paper-line) 1px, transparent 1px) 0 0/100% 28px,
    var(--paper);
  color:var(--ink);
  min-height:100vh;
  font-size:14px;
  line-height:1.5;
  -webkit-font-smoothing:antialiased;
  transition:background-color .2s;
}

.hand { font-family:'Kalam',cursive; }

:focus-visible { outline:2px solid var(--flag); outline-offset:2px; }
::-webkit-scrollbar { width:4px; }
::-webkit-scrollbar-track { background:transparent; }
::-webkit-scrollbar-thumb { background:var(--card-line); border-radius:2px; }

/* ── NAV ── */
.nav {
  height:60px;
  border-bottom:2px solid var(--ink);
  background:var(--card);
  position:sticky;
  top:0;
  z-index:100;
  display:flex;
  align-items:center;
  padding:0 12px;
  gap:8px;
}
@media (min-width:480px) { .nav { padding:0 16px; gap:10px; } }
@media (min-width:768px) { .nav { gap:14px; } }

.nav-badge {
  width:34px; height:34px;
  background:var(--sticky);
  border:1.5px solid var(--ink);
  border-radius:3px;
  transform:rotate(-4deg);
  display:flex; align-items:center; justify-content:center;
  font-family:'Kalam',cursive;
  font-weight:700;
  font-size:9px;
  line-height:1.05;
  text-align:center;
  color:var(--ink);
  flex-shrink:0;
  box-shadow:1px 2px 0 rgba(33,29,20,.15);
}
[data-theme="dark"] .nav-badge { color:#1c1608; }

.nav-logo {
  font-weight:700;
  font-size:16px;
  color:var(--ink);
  text-decoration:none;
  display:flex;
  align-items:center;
  gap:8px;
  flex-shrink:0;
  letter-spacing:-.01em;
}
.nav-logo-dot { color:var(--flag); }

.nav-search {
  width:100%;
  height:34px;
  border:1.5px solid var(--ink);
  border-radius:17px;
  background:var(--paper);
  color:var(--ink);
  font-family:inherit;
  font-size:13px;
  padding:0 12px 0 32px;
  transition:box-shadow .15s;
  min-width:0;
}
.nav-search:focus { outline:none; box-shadow:2px 2px 0 var(--ink); }
.nav-search::placeholder { color:var(--ink-faint); }
.nav-search-wrap { position:relative; width:100px; flex-shrink:1; }
@media (min-width:480px) { .nav-search-wrap { width:160px; } }
@media (min-width:768px) { .nav-search-wrap { flex:1; width:auto; max-width:340px; } }
.nav-search-icon {
  position:absolute; left:11px; top:50%; transform:translateY(-50%);
  color:var(--ink-faint); pointer-events:none; width:14px; height:14px;
}

.btn {
  height:34px;
  padding:0 14px;
  border-radius:var(--radius-sm);
  border:1.5px solid var(--ink);
  background:var(--card);
  color:var(--ink);
  font-family:inherit;
  font-size:13px;
  font-weight:500;
  cursor:pointer;
  display:inline-flex;
  align-items:center;
  gap:6px;
  white-space:nowrap;
  transition:transform .1s;
  text-decoration:none;
}
.btn:hover { transform:translate(-1px,-1px); box-shadow:2px 2px 0 var(--ink); }
.btn-primary {
  background:var(--ink);
  color:var(--flag-bg);
  border-color:var(--ink);
}
.btn-primary:hover { box-shadow:2px 2px 0 var(--sticky-edge); }
.btn-ghost { border-color:transparent; background:transparent; }
.btn-ghost:hover { transform:none; box-shadow:none; background:var(--paper); }

/* ── HERO ── */
.hero {
  border-bottom:2px solid var(--ink);
  background:var(--card);
  padding:32px 16px 0;
  position:relative;
  overflow:hidden;
}
@media (min-width:768px) { .hero { padding:44px 24px 0; } }

.hero-inner {
  max-width:1100px;
  margin:0 auto;
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:24px;
  flex-wrap:wrap;
}
.hero-content { max-width:560px; flex:1; min-width:260px; }

.sticky-eyebrow {
  display:inline-flex;
  align-items:center;
  gap:6px;
  background:var(--sticky);
  border:1.5px solid var(--ink);
  border-radius:3px;
  padding:5px 12px;
  font-family:'Kalam',cursive;
  font-weight:700;
  font-size:13px;
  color:var(--ink);
  transform:rotate(-1.5deg);
  margin-bottom:18px;
  box-shadow:1px 2px 0 rgba(33,29,20,.15);
}

.hero-title {
  font-size:32px;
  font-weight:700;
  line-height:1.08;
  letter-spacing:-.02em;
  color:var(--ink);
  margin-bottom:14px;
}
@media (min-width:640px) { .hero-title { font-size:44px; } }

.hero-sub {
  font-size:15px;
  color:var(--ink-soft);
  line-height:1.55;
  margin-bottom:20px;
  max-width:440px;
}

.hero-tags { display:flex; flex-wrap:wrap; gap:8px; margin-bottom:32px; }
.hero-tag {
  background:var(--paper);
  border:1.5px solid var(--ink);
  border-radius:var(--radius-sm);
  padding:7px 12px;
  font-size:12px;
  font-weight:500;
  color:var(--ink);
}

/* decorative sticky-note stack */
.hero-stickies {
  position:relative;
  width:230px;
  height:180px;
  flex-shrink:0;
  display:none;
}
@media (min-width:640px) { .hero-stickies { display:block; } }

.sticky-note {
  position:absolute;
  border:1.5px solid var(--ink);
  border-radius:3px;
  padding:14px 16px;
  box-shadow:var(--shadow-sticky);
}
.sticky-back {
  background:var(--card);
  width:170px;
  top:0; right:34px;
  transform:rotate(-7deg);
  color:var(--ink);
}
.sticky-front {
  background:var(--sticky);
  width:210px;
  bottom:0; right:0;
  transform:rotate(4deg);
  color:var(--ink);
}
.sticky-label {
  font-family:'Kalam',cursive;
  font-weight:700;
  font-size:10.5px;
  letter-spacing:.03em;
  color:var(--flag);
  margin-bottom:5px;
}
.sticky-front .sticky-label { color:var(--ink-soft); }
.sticky-line { font-family:'Kalam',cursive; font-weight:700; font-size:15px; line-height:1.25; }
.sticky-line.small { font-size:11.5px; font-weight:400; color:var(--ink-soft); margin-top:6px; }

/* hero search band */
.hero-search-band {
  max-width:1100px;
  margin:26px auto 0;
  padding-bottom:20px;
  border-top:1px dashed var(--card-line);
  padding-top:20px;
  display:flex;
  flex-wrap:wrap;
  align-items:center;
  gap:12px;
}
.hero-search-wrap { position:relative; flex:1; min-width:220px; max-width:360px; }
.hero-search {
  width:100%;
  height:40px;
  border:1.5px solid var(--ink);
  border-radius:20px;
  background:var(--paper);
  color:var(--ink);
  font-family:inherit;
  font-size:13px;
  padding:0 14px 0 36px;
}
.hero-search:focus { outline:none; box-shadow:2px 2px 0 var(--ink); }
.hero-search::placeholder { color:var(--ink-faint); }
.hero-search-icon {
  position:absolute; left:13px; top:50%; transform:translateY(-50%);
  color:var(--ink-faint); width:15px; height:15px; pointer-events:none;
}
.hero-pills { display:flex; flex-wrap:wrap; gap:6px; flex:2; min-width:220px; }
.hero-pill {
  border:1.5px solid var(--card-line);
  background:var(--paper);
  color:var(--ink-soft);
  border-radius:20px;
  padding:6px 12px;
  font-size:12px;
  font-weight:500;
  cursor:pointer;
  transition:all .12s;
}
.hero-pill:hover { border-color:var(--ink); color:var(--ink); }
.hero-pill.active { background:var(--sticky); border-color:var(--ink); color:var(--ink); }

/* ── LAYOUT ── */
.layout { display:flex; max-width:1440px; margin:0 auto; }

/* ── SIDEBAR ── */
.sidebar {
  width:200px;
  flex-shrink:0;
  border-right:2px dashed var(--card-line);
  height:calc(100vh - 60px);
  position:sticky;
  top:60px;
  overflow-y:auto;
  padding:18px 10px;
}
.sidebar-section {
  font-family:'Kalam',cursive;
  font-size:12px;
  font-weight:700;
  color:var(--ink-faint);
  padding:0 8px 8px;
  margin-top:10px;
}
.sidebar-section:first-child { margin-top:0; }
.filter-item {
  display:flex; align-items:center; gap:8px;
  padding:6px 8px;
  border-radius:var(--radius-sm);
  border:none; background:transparent;
  color:var(--ink-soft);
  font-family:inherit; font-size:13px;
  width:100%; text-align:left; cursor:pointer;
  transition:background .1s,color .1s;
}
.filter-item:hover { background:var(--paper); color:var(--ink); }
.filter-item.active { background:var(--sticky); color:var(--ink); font-weight:600; border:1px solid var(--ink); }
.filter-icon { font-size:13px; width:16px; text-align:center; flex-shrink:0; }
.filter-check { margin-left:auto; color:var(--ink); font-size:11px; flex-shrink:0; }
.sidebar-divider { height:1px; border-top:1px dashed var(--card-line); margin:10px 0; }

@media (max-width:767px) {
  .sidebar { display:none; }
  .sidebar.open {
    display:block !important;
    position:fixed; top:60px; left:0; z-index:300;
    background:var(--card);
    box-shadow:4px 0 24px rgba(0,0,0,.25);
    width:240px;
    border-right:2px solid var(--ink);
  }
}
@media (min-width:768px) and (max-width:1023px) { .sidebar { width:160px; } }

/* ── MAIN ── */
.main { flex:1; min-width:0; padding:20px 16px 40px; max-width:100%; }
@media (min-width:768px) { .main { padding:26px 24px 60px; } }

/* ── SORT STRIP ── */
.sort-strip { display:flex; align-items:center; justify-content:space-between; margin-bottom:18px; flex-wrap:wrap; gap:8px; }
.sort-tabs { display:flex; gap:2px; flex-wrap:wrap; }
.sort-tab {
  height:30px; padding:0 12px;
  border-radius:16px; border:1.5px solid transparent;
  background:transparent; color:var(--ink-soft);
  font-family:inherit; font-size:13px; cursor:pointer;
  transition:all .1s;
}
.sort-tab:hover { background:var(--paper); color:var(--ink); }
.sort-tab.active { background:var(--card); color:var(--ink); font-weight:600; border-color:var(--ink); }
.count-label { font-family:'Kalam',cursive; font-size:13px; color:var(--ink-faint); }

.section-title { font-size:19px; font-weight:700; letter-spacing:-.01em; margin-bottom:4px; }
.section-sub { font-size:13px; color:var(--ink-soft); margin-bottom:18px; }

/* ── CHIPS ── */
.chip {
  display:inline-flex; align-items:center; gap:5px;
  height:26px; padding:0 10px;
  border-radius:14px; border:1.5px solid var(--ink);
  background:var(--sticky); color:var(--ink);
  font-size:12px; font-weight:500; cursor:pointer;
}
.chip-x { font-size:10px; }

/* ── GRID ── */
.grid-layout { display:grid; grid-template-columns:1fr; gap:14px; }
@media (min-width:1024px) { .grid-layout { grid-template-columns:1fr clamp(300px, 30vw, 400px); gap:20px; } }

/* ── JOB CARD (index card) ── */
.job-card {
  border:1.5px solid var(--card-line);
  border-radius:var(--radius);
  padding:16px;
  cursor:pointer;
  background:var(--card);
  box-shadow:var(--shadow-card);
  transition:transform .15s,border-color .15s,box-shadow .15s;
  position:relative;
}
.job-card::before {
  content:'';
  position:absolute;
  top:-6px; left:20px;
  width:38px; height:14px;
  background:var(--tape);
  border:1px solid rgba(33,29,20,.08);
  transform:rotate(-3deg);
  border-radius:1px;
}
.job-card:hover { border-color:var(--ink); transform:translateY(-2px); box-shadow:3px 4px 0 rgba(33,29,20,.1); }
.job-card.selected { border-color:var(--ink); box-shadow:3px 4px 0 var(--sticky-edge); }
.job-card.featured::after {
  content:'★ Featured';
  position:absolute;
  top:12px; right:-1px;
  background:var(--flag);
  color:#fff;
  font-size:10.5px;
  font-weight:600;
  padding:3px 10px 3px 12px;
  border-radius:3px 0 0 3px;
  font-family:'Kalam',cursive;
}

.company-logo {
  width:40px; height:40px;
  border-radius:var(--radius-sm);
  border:1.5px solid var(--ink);
  display:flex; align-items:center; justify-content:center;
  font-family:'Kalam',cursive;
  font-size:13px; font-weight:700;
  color:var(--ink);
  flex-shrink:0;
}

.badge {
  display:inline-flex; align-items:center; gap:3px;
  height:21px; padding:0 8px;
  border-radius:10px;
  font-size:11px; font-weight:600;
  border:1px solid transparent;
}
.badge-green  { background:var(--green-bg); color:var(--green); border-color:var(--green); }
.badge-purple { background:var(--purple-bg); color:var(--purple); border-color:var(--purple); }

.tag {
  display:inline-flex; align-items:center; height:23px; padding:0 9px;
  border-radius:var(--radius-sm);
  border:1.5px dashed var(--card-line);
  background:transparent;
  color:var(--ink-soft);
  font-family:'Kalam',cursive;
  font-size:11.5px; font-weight:700;
  cursor:pointer;
  transition:all .12s;
}
.tag:hover { border-color:var(--ink); color:var(--ink); border-style:solid; }
.tag.active { border-color:var(--ink); border-style:solid; color:var(--ink); background:var(--sticky); }

.salary {
  font-family:'Kalam',cursive;
  font-size:13px; font-weight:700;
  color:var(--ink);
  background:linear-gradient(transparent 55%, var(--sticky) 55%);
  padding:0 2px;
}

.save-btn {
  width:28px; height:28px;
  border-radius:50%;
  border:1.5px solid var(--card-line);
  background:transparent;
  color:var(--ink-faint);
  display:flex; align-items:center; justify-content:center;
  cursor:pointer; flex-shrink:0;
  transition:all .12s;
}
.save-btn:hover { border-color:var(--ink); color:var(--ink); }
.save-btn.saved { border-color:var(--flag); color:var(--flag); background:var(--flag-bg); }

.meta { font-size:12px; color:var(--ink-soft); display:flex; flex-wrap:wrap; align-items:center; gap:4px; }
.meta-sep { color:var(--ink-faint); margin:0 2px; }

/* ── DETAIL PANEL ── */
.detail-panel {
  background:var(--card);
  border:1.5px solid var(--card-line);
  border-radius:var(--radius-lg);
  overflow:hidden;
  position:sticky;
  top:76px;
  max-height:calc(100vh - 92px);
  overflow-y:auto;
  box-shadow:var(--shadow-card);
}
.detail-panel.has-content { border-color:var(--ink); }

.panel-empty { padding:22px; display:flex; flex-direction:column; gap:16px; }
.promo-pulse {
  display:flex; align-items:center; gap:6px;
  font-family:'Kalam',cursive; font-size:13px; font-weight:700; color:var(--ink);
}
.promo-dot { width:8px; height:8px; border-radius:50%; background:var(--flag); animation:pulse 2s ease-in-out infinite; }
@keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.3} }

.video-wrap {
  width:100%; aspect-ratio:16/9;
  border-radius:var(--radius);
  overflow:hidden;
  border:1.5px solid var(--ink);
  background:var(--paper);
  position:relative;
}
.video-overlay {
  position:absolute; inset:0;
  display:flex; align-items:center; justify-content:center;
  cursor:pointer;
  background:rgba(33,29,20,.55);
  border-radius:var(--radius);
  transition:background .15s;
}
.video-overlay:hover { background:rgba(33,29,20,.7); }
.play-circle {
  width:44px; height:44px; border-radius:50%;
  background:var(--sticky);
  border:1.5px solid var(--ink);
  display:flex; align-items:center; justify-content:center;
}
.play-circle svg path { fill:var(--ink); }
.panel-hint { font-size:12.5px; color:var(--ink-soft); line-height:1.6; }

.detail-inner { padding:20px; }
.detail-header { display:flex; align-items:flex-start; gap:12px; margin-bottom:16px; }
.detail-title { font-size:17px; font-weight:700; color:var(--ink); line-height:1.3; margin-bottom:2px; }
.detail-company { font-size:13px; color:var(--ink-soft); }
.detail-divider { height:1px; border-top:1px dashed var(--card-line); margin:16px 0; }
.detail-label { font-family:'Kalam',cursive; font-size:12px; font-weight:700; color:var(--ink-faint); margin-bottom:8px; }
.detail-body { font-size:13px; color:var(--ink-soft); line-height:1.7; }

.apply-btn {
  height:38px; padding:0 16px;
  border-radius:var(--radius-sm);
  background:var(--ink); color:var(--sticky);
  font-family:inherit; font-size:13px; font-weight:600;
  border:1.5px solid var(--ink);
  cursor:pointer;
  display:inline-flex; align-items:center; gap:6px;
  text-decoration:none; transition:transform .1s;
  flex:1; justify-content:center;
}
.apply-btn:hover { transform:translate(-1px,-1px); box-shadow:2px 2px 0 var(--sticky-edge); }

.stat-row { display:flex; justify-content:space-between; align-items:center; padding:3px 0; }
.stat-label { font-size:12px; color:var(--ink-soft); }
.stat-val { font-family:'Kalam',cursive; font-size:13px; font-weight:700; color:var(--ink); }

/* ── MOBILE SHEET ── */
.sheet-backdrop { position:fixed; inset:0; z-index:200; background:rgba(33,29,20,.5); backdrop-filter:blur(2px); transition:opacity .2s; }
.sheet {
  position:fixed; left:0; right:0; bottom:0; z-index:201;
  background:var(--card);
  border-radius:16px 16px 0 0;
  border-top:2px solid var(--ink);
  max-height:92dvh; overflow-y:auto;
  transition:transform .28s cubic-bezier(.32,0,.67,0);
}
.sheet.entering { transform:translateY(100%); }
.sheet-handle { width:36px; height:4px; border-radius:2px; background:var(--card-line); margin:12px auto 0; }

/* ── EMPTY STATE ── */
.empty-state { text-align:center; padding:48px 24px; color:var(--ink-faint); }
.empty-icon { font-family:'Kalam',cursive; font-size:26px; margin-bottom:10px; color:var(--ink-faint); transform:rotate(-4deg); display:inline-block; }
.empty-text { font-size:14px; color:var(--ink-soft); margin-bottom:12px; }

/* ── THEME TOGGLE ── */
.theme-btn {
  width:34px; height:34px;
  border-radius:50%;
  border:1.5px solid var(--card-line);
  background:transparent; color:var(--ink-soft);
  display:flex; align-items:center; justify-content:center;
  cursor:pointer; transition:all .12s; flex-shrink:0;
}
.theme-btn:hover { border-color:var(--ink); color:var(--ink); }

/* ── NAV DROPDOWN ── */
.nav-dropdown {
  position:absolute; top:calc(100% + 6px); left:0;
  min-width:160px;
  background:var(--card);
  border:1.5px solid var(--ink);
  border-radius:var(--radius);
  padding:4px; z-index:200;
  box-shadow:3px 4px 0 rgba(33,29,20,.15);
}
.dropdown-item { display:block; padding:7px 10px; border-radius:var(--radius-sm); font-size:13px; color:var(--ink); text-decoration:none; transition:background .1s; }
.dropdown-item:hover { background:var(--paper); }

/* ── FOOTER ── */
.footer {
  border-top:2px solid var(--ink);
  background:var(--card);
  padding:16px 24px;
  display:flex; justify-content:space-between; flex-wrap:wrap; gap:8px;
}
.footer-text { font-size:12px; color:var(--ink-faint); font-family:'Kalam',cursive; }
.footer-links { display:flex; gap:16px; }
.footer-link { font-size:12px; color:var(--ink-faint); text-decoration:none; transition:color .12s; }
.footer-link:hover { color:var(--ink); }

.sr-only { position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; }
</style>
</head>

<body x-data="jobBoard()" x-init="init()" :data-theme="darkMode?'dark':'light'" @keydown.escape.window="closeDetail()">

<!-- ── NAV ── -->
<nav class="nav" role="banner">
  <div class="nav-badge" aria-hidden="true">POST<br>JOB</div>
  <a href="/" class="nav-logo" aria-label="scranton.dev home">
   Scranton<span class="nav-logo-dot">.</span>dev
  </a>

  <div class="nav-search-wrap" role="search">
    <svg class="nav-search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
    </svg>
    <input type="search" x-model="search" placeholder="Search jobs, companies, tech…"
           class="nav-search" aria-label="Search jobs" autocomplete="off">
  </div>

  <div class="hidden md:flex items-center gap-1" style="margin-left:4px">
    <div class="relative" x-data="{open:false}" @click.away="open=false">
      <button @click="open=!open" class="btn btn-ghost" :aria-expanded="open" aria-haspopup="true">
        Candidates
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
             :style="open?'transform:rotate(180deg)':''" style="transition:transform .2s" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
      <div x-show="open" x-cloak class="nav-dropdown" role="menu">
        <a href="/jobs" class="dropdown-item" role="menuitem">Browse jobs</a>
        <a href="/salaries" class="dropdown-item" role="menuitem">Salary insights</a>
      </div>
    </div>
    <div class="relative" x-data="{open:false}" @click.away="open=false">
      <button @click="open=!open" class="btn btn-ghost" :aria-expanded="open" aria-haspopup="true">
        Employers
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
             :style="open?'transform:rotate(180deg)':''" style="transition:transform .2s" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
      <div x-show="open" x-cloak class="nav-dropdown" role="menu">
        <a href="/post-job" class="dropdown-item" role="menuitem">Post a job</a>
        <a href="/pricing" class="dropdown-item" role="menuitem">Pricing</a>
      </div>
    </div>
  </div>

  <div class="flex items-center gap-2" style="margin-left:auto">
    <a href="/post-job" class="btn btn-primary hidden sm:inline-flex">Post a Job</a>

    <button class="btn btn-ghost" style="gap:4px;padding:0 8px" aria-label="Saved jobs">
      <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
      </svg>
      <span x-show="savedJobs.length>0" x-text="savedJobs.length"
            style="font-family:'Kalam',cursive;font-size:12px;color:var(--flag)" aria-live="polite"></span>
    </button>

    <button class="theme-btn" @click="darkMode=!darkMode" :aria-label="darkMode?'Switch to light mode':'Switch to dark mode'">
      <svg x-show="!darkMode" width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
      </svg>
      <svg x-show="darkMode" x-cloak width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
      </svg>
    </button>

    <button class="theme-btn md:hidden" @click="mobileSidebar=!mobileSidebar" :aria-expanded="mobileSidebar" aria-label="Toggle filters">
      <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/>
      </svg>
    </button>
  </div>
</nav>

<!-- ── HERO ── -->
<section class="hero">
  <div class="hero-inner">
    <div class="hero-content">
      <div class="sticky-eyebrow">📌Scranton's Silicon Alley (allegedly)</div>
      <h1 class="hero-title">The break-room<br>bulletin for<br>dev jobs.</h1>
      <p class="hero-sub">Real listings, screened by a human who has definitely worked in an office with a break room. No ping-pong tables, we checked.</p>
      <div class="hero-tags">
        <span class="hero-tag">Sensible jobs for scrappy devs</span>
        <span class="hero-tag">Remote, hybrid, on-site</span>
        <span class="hero-tag">HR-friendly</span>
      </div>
    </div>
    <div class="hero-stickies" aria-hidden="true">
      <div class="sticky-note sticky-back">
        <p class="sticky-label">HIRING</p>
        <p class="sticky-line">Senior PHP<br>Engineer</p>
        <p class="sticky-line small">Remote</p>
      </div>
      <div class="sticky-note sticky-front">
        <p class="sticky-label">world's okayest dev jobs</p>
        <p class="sticky-line">Less hustle.<br>More actual jobs.</p>
        <p class="sticky-line small">Hybrid · NYC</p>
      </div>
    </div>
  </div>

  <div class="hero-search-band">
    <div class="hero-search-wrap">
      <svg class="hero-search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
      </svg>
      <input type="search" x-model="search" placeholder="Search jobs, companies, keywords…" class="hero-search" aria-label="Search jobs">
    </div>
    <div class="hero-pills" role="list" aria-label="Quick filters">
      <template x-for="spec in specializations.filter(s=>s.key!=='HasVideo')" :key="'hp-'+spec.key">
        <button class="hero-pill" :class="activeFilters.includes(spec.key)?'active':''"
                @click="toggleFilter(spec.key)" :aria-pressed="activeFilters.includes(spec.key)"
                x-text="spec.label"></button>
      </template>
    </div>
  </div>
</section>

<!-- ── LAYOUT ── -->
<div class="layout">

  <!-- SIDEBAR -->
  <aside :class="mobileSidebar?'sidebar open':'sidebar'"
         x-show="mobileSidebar||_hasSidebar"
         @click.away="if(!_hasSidebar) mobileSidebar=false"
         x-cloak role="navigation" aria-label="Job filters">

    <p class="sidebar-section">📌 Filters</p>

    <a href="/post-job" class="filter-item" style="color:var(--ink);border:1.5px dashed var(--card-line);border-radius:var(--radius-sm);margin:0 0 4px">
      <span class="filter-icon" aria-hidden="true">+</span>
      Post a job
    </a>

    <div class="sidebar-divider"></div>

    <template x-for="spec in specializations" :key="spec.key">
      <button @click="toggleFilter(spec.key)"
              :class="activeFilters.includes(spec.key)?'filter-item active':'filter-item'"
              :aria-pressed="activeFilters.includes(spec.key)">
        <span class="filter-icon" aria-hidden="true" x-text="spec.icon"></span>
        <span x-text="spec.label"></span>
        <span x-show="activeFilters.includes(spec.key)" class="filter-check" aria-hidden="true">✓</span>
      </button>
    </template>

    <div class="sidebar-divider"></div>

    <button x-show="activeFilters.length>0" @click="activeFilters=[]" class="filter-item" style="color:var(--flag);width:100%">
      <span class="filter-icon" aria-hidden="true">✕</span>
      Clear filters
    </button>

    <div class="sidebar-divider" style="margin-top:8px"></div>

    <p class="sidebar-section md:hidden" style="margin-top:8px">Candidates</p>
    <div class="md:hidden">
      <a href="/jobs" class="filter-item"><span class="filter-icon" aria-hidden="true">⊞</span>Browse jobs</a>
      <a href="/salaries" class="filter-item"><span class="filter-icon" aria-hidden="true">$</span>Salary insights</a>
    </div>
    <p class="sidebar-section md:hidden">Employers</p>
    <div class="md:hidden">
      <a href="/post-job" class="filter-item"><span class="filter-icon" aria-hidden="true">+</span>Post a job</a>
      <a href="/pricing" class="filter-item"><span class="filter-icon" aria-hidden="true">◻</span>Pricing</a>
    </div>

    <div class="sidebar-divider" style="margin-top:8px"></div>
    <p class="sidebar-section" style="margin-top:8px">📍 Board stats</p>
    <div style="padding:0 8px 16px;display:flex;flex-direction:column;gap:4px">
      <div class="stat-row"><span class="stat-label">Total</span><span class="stat-val" x-text="jobs.length"></span></div>
      <div class="stat-row"><span class="stat-label">Matching</span><span class="stat-val" x-text="filteredJobs.length"></span></div>
      <div class="stat-row"><span class="stat-label">With video</span><span class="stat-val" style="color:var(--purple)" x-text="jobs.filter(j=>j.video_url).length"></span></div>
      <div class="stat-row"><span class="stat-label">Saved</span><span class="stat-val" style="color:var(--flag)" x-text="savedJobs.length"></span></div>
    </div>
  </aside>

  <!-- MAIN -->
  <main class="main">

    <h2 class="section-title">Featured &amp; latest developer jobs</h2>
    <p class="section-sub">Curated postings. Coffee-powered vetting. No metrics dashboards were harmed.</p>

    <div class="sort-strip">
      <div class="sort-tabs" role="tablist" aria-label="Sort jobs">
        <button @click="activeSort='featured'" :class="activeSort==='featured'?'sort-tab active':'sort-tab'" role="tab" :aria-selected="activeSort==='featured'">Featured</button>
        <button @click="activeSort='remote'" :class="activeSort==='remote'?'sort-tab active':'sort-tab'" role="tab" :aria-selected="activeSort==='remote'">Remote</button>
        <button @click="activeSort='hybrid'" :class="activeSort==='hybrid'?'sort-tab active':'sort-tab'" role="tab" :aria-selected="activeSort==='hybrid'">Hybrid</button>
        <button @click="activeSort='latest'" :class="activeSort==='latest'?'sort-tab active':'sort-tab'" role="tab" :aria-selected="activeSort==='latest'">Latest</button>
        <button @click="activeSort='salary'" :class="activeSort==='salary'?'sort-tab active':'sort-tab'" role="tab" :aria-selected="activeSort==='salary'">High pay</button>
      </div>
      <span class="count-label" aria-live="polite"><span x-text="filteredJobs.length"></span> matches</span>
    </div>

    <div x-show="activeFilters.length>0" class="flex flex-wrap gap-2 mb-4" role="list" aria-label="Active filters">
      <template x-for="f in activeFilters" :key="f">
        <button class="chip" role="listitem" @click="toggleFilter(f)"
                :aria-label="'Remove filter: '+(specializations.find(s=>s.key===f)?.label||f)">
          <span x-text="specializations.find(s=>s.key===f)?.label||f"></span>
          <span class="chip-x" aria-hidden="true">✕</span>
        </button>
      </template>
    </div>

    <div class="grid-layout">

      <div role="list" aria-label="Job listings" style="display:flex;flex-direction:column;gap:14px">

        <template x-for="job in filteredJobs" :key="job.id">
          <article class="job-card" :class="[job.is_featured?'featured':'', expandedJobId===job.id?'selected':'']"
               role="listitem" @click="selectJob(job.id)" :aria-selected="expandedJobId===job.id"
               :aria-label="job.title+' at '+job.company">

            <div style="display:flex;gap:12px;align-items:flex-start">
              <div class="company-logo" aria-hidden="true" x-text="initials(job.company)"></div>

              <div style="flex:1;min-width:0">
                <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:8px;margin-bottom:4px">
                  <h3 style="font-size:14.5px;font-weight:700;color:var(--ink);line-height:1.3" x-text="job.title"></h3>
                  <div style="display:flex;align-items:center;gap:6px;flex-shrink:0" @click.stop>
                    <span class="salary hidden sm:inline" x-show="job.salary" x-text="job.salary"></span>
                    <button class="save-btn" :class="isSaved(job.id)?'saved':''" @click="toggleSave(job.id)"
                            :aria-label="isSaved(job.id)?'Unsave '+job.title:'Save '+job.title" :aria-pressed="isSaved(job.id)">
                      <svg width="12" height="12" :fill="isSaved(job.id)?'currentColor':'none'" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="8" r="3"/><path stroke-linecap="round" d="M12 11v9"/>
                      </svg>
                    </button>
                  </div>
                </div>

                <div class="sm:hidden" x-show="job.salary" style="margin-bottom:4px">
                  <span class="salary" x-text="job.salary"></span>
                </div>

                <div class="meta" style="margin-bottom:10px">
                  <span x-text="job.company"></span>
                  <span class="meta-sep" aria-hidden="true">·</span>
                  <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true" style="flex-shrink:0">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                  </svg>
                  <span x-text="job.location"></span>
                  <span class="meta-sep" aria-hidden="true">·</span>
                  <span x-text="job.posted" style="color:var(--ink-faint)"></span>
                </div>

                <div style="display:flex;flex-wrap:wrap;align-items:center;gap:6px" @click.stop>
                  <span x-show="job.location&&job.location.includes('Remote')" class="badge badge-green">Remote</span>
                  <span x-show="job.video_url" class="badge badge-purple">▶ Video</span>
                  <template x-for="tag in (job.tags||[]).slice(0,4)" :key="tag">
                    <span class="tag" :class="activeFilters.includes(tag)?'active':''" @click="toggleFilter(tag)"
                          :aria-pressed="activeFilters.includes(tag)" x-text="tag"></span>
                  </template>
                </div>
              </div>
            </div>
          </article>
        </template>

        <div x-show="filteredJobs.length===0" class="empty-state" role="status">
          <div class="empty-icon">¯\_(ツ)_/¯</div>
          <p class="empty-text">No matching jobs found</p>
          <button @click="search='';activeFilters=[]" class="btn">Reset filters</button>
        </div>
      </div>

      <!-- DETAIL PANEL (desktop lg+) -->
      <div class="hidden lg:block">
        <div class="detail-panel" :class="selectedJob?'has-content':''">

          <template x-if="!selectedJob">
            <div class="panel-empty">
              <div class="promo-pulse"><span class="promo-dot" aria-hidden="true"></span>Now hiring on newyork.dev</div>
              <div class="video-wrap">
                <div class="video-overlay" x-show="!promoPlaying" @click="promoPlaying=true" role="button" tabindex="0"
                     aria-label="Play intro video" @keydown.enter="promoPlaying=true" @keydown.space.prevent="promoPlaying=true">
                  <div class="play-circle"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg></div>
                </div>
                <iframe :src="promoPlaying?promoVideoUrl+'?autoplay=1':'about:blank'" loading="lazy" class="w-full h-full"
                        style="border-radius:var(--radius)" frameborder="0" allow="autoplay;fullscreen" allowfullscreen
                        title="newyork.dev intro video"></iframe>
              </div>
              <p class="panel-hint">Reach 2,000+ New York developers actively looking.</p>
              <p class="panel-hint">← Select a listing to preview details here.</p>
            </div>
          </template>

          <template x-if="selectedJob">
            <div class="detail-inner">
              <div class="detail-header">
                <div class="company-logo" aria-hidden="true" x-text="initials(selectedJob.company)"></div>
                <div style="flex:1;min-width:0">
                  <h2 class="detail-title" x-text="selectedJob.title"></h2>
                  <p class="detail-company" x-text="selectedJob.company"></p>
                </div>
                <button @click.stop="closeDetail()" class="save-btn" aria-label="Close detail panel">
                  <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                  </svg>
                </button>
              </div>

              <div class="meta" style="margin-bottom:12px">
                <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                </svg>
                <span x-text="selectedJob.location"></span>
                <span class="meta-sep" aria-hidden="true">·</span>
                <span x-text="'Posted '+selectedJob.posted" style="color:var(--ink-faint)"></span>
              </div>

              <div x-show="selectedJob.salary" style="margin-bottom:16px">
                <span class="salary" style="font-size:16px" x-text="selectedJob.salary"></span>
                <span style="font-size:11px;color:var(--ink-faint);margin-left:6px">/ yr</span>
              </div>

              <template x-if="selectedJob.video_url">
                <div style="margin-bottom:16px" @click.stop>
                  <p class="detail-label">Hiring manager intro</p>
                  <div class="video-wrap">
                    <div class="video-overlay" x-show="!videoPlaying" @click.stop="startVideo()" role="button" tabindex="0"
                         aria-label="Play hiring manager video" @keydown.enter="startVideo()" @keydown.space.prevent="startVideo()">
                      <div class="play-circle"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg></div>
                    </div>
                    <iframe :src="videoPlaying?selectedJob.video_url+'?autoplay=1':'about:blank'" loading="lazy" class="w-full h-full"
                            style="border-radius:var(--radius)" frameborder="0" allow="autoplay;fullscreen" allowfullscreen
                            :title="selectedJob.company+' hiring video'"></iframe>
                  </div>
                </div>
              </template>

              <div class="detail-divider"></div>

              <div style="margin-bottom:16px">
                <p class="detail-label">About the role</p>
                <p class="detail-body" x-text="selectedJob.description"></p>
              </div>

              <div style="margin-bottom:16px">
                <p class="detail-label">Tech stack</p>
                <div style="display:flex;flex-wrap:wrap;gap:6px">
                  <template x-for="tag in (selectedJob.tags||[])" :key="tag"><span class="tag" x-text="tag"></span></template>
                </div>
              </div>

              <div class="detail-divider"></div>

              <div style="display:flex;align-items:center;gap:8px">
                <a :href="selectedJob.url" class="apply-btn" @click.stop>
                  Apply now
                  <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                  </svg>
                </a>
                <button class="btn" :class="isSaved(selectedJob.id)?'save-btn saved':''" @click.stop="toggleSave(selectedJob.id)"
                        :aria-label="isSaved(selectedJob.id)?'Unsave':'Save'" :aria-pressed="isSaved(selectedJob.id)" style="height:38px;gap:6px">
                  <svg width="13" height="13" :fill="isSaved(selectedJob.id)?'currentColor':'none'" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="12" cy="8" r="3"/><path stroke-linecap="round" d="M12 11v9"/>
                  </svg>
                  <span x-text="isSaved(selectedJob.id)?'Saved':'Save'"></span>
                </button>
              </div>
            </div>
          </template>
        </div>
      </div>

    </div>
  </main>
</div>

<!-- ── MOBILE SHEET ── -->
<div class="sheet-backdrop lg:hidden" x-show="expandedJobId!==null&&sheetVisible" x-cloak
     :style="sheetVisible?'opacity:1':'opacity:0'" @click="closeDetail()" aria-hidden="true"></div>

<div class="sheet lg:hidden" x-show="expandedJobId!==null" x-cloak :class="sheetVisible?'':'entering'"
     role="dialog" aria-modal="true" :aria-label="selectedJob?selectedJob.title+' — '+selectedJob.company:'Job details'" @click.stop>

  <div class="sheet-handle" aria-hidden="true"></div>

  <template x-if="selectedJob">
    <div style="padding:16px 20px 48px">
      <div style="display:flex;align-items:flex-start;gap:12px;margin-bottom:16px">
        <div class="company-logo" aria-hidden="true" x-text="initials(selectedJob.company)"></div>
        <div style="flex:1;min-width:0">
          <h2 class="detail-title" style="font-size:16px" x-text="selectedJob.title"></h2>
          <p class="detail-company" x-text="selectedJob.company"></p>
        </div>
        <button @click="closeDetail()" class="save-btn" aria-label="Close">
          <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>

      <div class="meta" style="margin-bottom:10px">
        <span x-text="selectedJob.location"></span>
        <span class="meta-sep" aria-hidden="true">·</span>
        <span x-text="'Posted '+selectedJob.posted" style="color:var(--ink-faint)"></span>
      </div>

      <div x-show="selectedJob.salary" style="margin-bottom:16px">
        <span class="salary" style="font-size:16px" x-text="selectedJob.salary"></span>
        <span style="font-size:11px;color:var(--ink-faint);margin-left:6px">/ yr</span>
      </div>

      <template x-if="selectedJob.video_url">
        <div style="margin-bottom:16px" @click.stop>
          <p class="detail-label">Hiring manager intro</p>
          <div class="video-wrap">
            <div class="video-overlay" x-show="!videoPlaying" @click.stop="startVideo()" role="button" tabindex="0"
                 aria-label="Play hiring manager video" @keydown.enter="startVideo()" @keydown.space.prevent="startVideo()">
              <div class="play-circle"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg></div>
            </div>
            <iframe :src="videoPlaying?selectedJob.video_url+'?autoplay=1':'about:blank'" loading="lazy" class="w-full h-full"
                    style="border-radius:var(--radius)" frameborder="0" allow="autoplay;fullscreen" allowfullscreen
                    :title="selectedJob.company+' hiring video'"></iframe>
          </div>
        </div>
      </template>

      <div class="detail-divider"></div>

      <div style="margin-bottom:16px">
        <p class="detail-label">About the role</p>
        <p class="detail-body" style="font-size:14px" x-text="selectedJob.description"></p>
      </div>

      <div style="margin-bottom:20px">
        <p class="detail-label">Tech stack</p>
        <div style="display:flex;flex-wrap:wrap;gap:6px">
          <template x-for="tag in (selectedJob.tags||[])" :key="tag"><span class="tag" x-text="tag"></span></template>
        </div>
      </div>

      <div style="display:flex;gap:8px">
        <a :href="selectedJob.url" class="apply-btn" @click.stop>
          Apply now
          <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </a>
        <button class="btn" :class="isSaved(selectedJob.id)?'save-btn saved':''" @click="toggleSave(selectedJob.id)"
                :aria-label="isSaved(selectedJob.id)?'Unsave':'Save'" :aria-pressed="isSaved(selectedJob.id)" style="height:38px;gap:6px">
          <svg width="13" height="13" :fill="isSaved(selectedJob.id)?'currentColor':'none'" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <circle cx="12" cy="8" r="3"/><path stroke-linecap="round" d="M12 11v9"/>
          </svg>
          <span x-text="isSaved(selectedJob.id)?'Saved':'Save'"></span>
        </button>
      </div>
    </div>
  </template>
</div>

<div style="text-align:center;padding:14px 16px;font-size:12.5px;color:var(--ink-soft);border-top:1px dashed var(--card-line);background:var(--card)">
  Not in New York? No problem! Try <a href="https://notnewyork.com" style="color:var(--flag);font-weight:600"><b>not</b>newyork.com</a> for coast-to-coast remote developer opportunities.
</div>

<!-- ── FOOTER ── -->
<footer class="footer" role="contentinfo">
  <span class="footer-text">© 2026 newyork.dev</span>
  <nav class="footer-links" aria-label="Footer navigation">
    <a href="#" class="footer-link">About</a>
    <a href="#" class="footer-link">API</a>
    <a href="/post-job" class="footer-link">Post a job</a>
  </nav>
</footer>

<script>
function jobBoard() {
  return {
    _isDesktop: window.innerWidth >= 1024,
    _hasSidebar: window.innerWidth >= 768,
    darkMode: window.matchMedia('(prefers-color-scheme: dark)').matches,

    savedJobs: [],
    activeFilters: [],
    activeSort: 'featured',
    search: '',
    mobileSidebar: false,
    expandedJobId: null,
    sheetVisible: false,
    videoPlaying: false,
    promoPlaying: false,
    promoVideoUrl: 'https://www.youtube.com/embed/dQw4w9WgXcQ',

    jobs: [
      { id: 1, title: 'Senior Laravel Engineer', company: 'Rainier Software',
        location: 'Seattle, WA (Remote)', salary: '$120k – $155k', salary_max: 155000,
        tags: ['PHP','Laravel','Backend','Hybrid','Senior'], posted: '2d ago',
        is_featured: true, video_url: 'https://www.youtube.com/embed/tu0cLvZ976Y',
        url: 'jobs/senior-php-laravel-engineer',
        description: 'Building internal SaaS tooling for a logistics company with a small, pragmatic team. You will own the backend architecture, work closely with a product-focused founder, and have direct impact on the roadmap. Stack is PHP 8.3 / Laravel 11, MySQL, Redis, deployed on Forge. No microservices nonsense — clean monolith, great test coverage, and a team that actually ships.' },
      { id: 2, title: 'Frontend Developer (React)', company: 'Cascadia Climate Tech',
        location: 'Hybrid (PNW)', salary: '$95k – $125k', salary_max: 125000,
        tags: ['React','Frontend','TypeScript','Remote'], posted: '1d ago',
        is_featured: true, video_url: null,
        url: 'jobs/frontend-developer-react',
        description: 'Dashboards for real-time climate data visualisation. Greenfield React + Tailwind project with a mission-driven team of 8. You will translate complex environmental datasets into clear, accessible UIs. TypeScript throughout, Vite build, Recharts for visualisation. Remote-friendly with optional office in Portland.' },
      { id: 3, title: 'DevOps / Platform Engineer', company: 'Mount Hood Systems',
        location: 'Portland, OR (On-site)', salary: '$140k – $180k', salary_max: 180000,
        tags: ['DevOps','Kubernetes','Python','Senior'], posted: '4d ago',
        is_featured: false, video_url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        url: 'jobs/devops-platform-engineer',
        description: 'Scale our infra to millions of requests. Kubernetes on EKS, Terraform, ArgoCD, heavy Python tooling. You will be the platform team — lots of autonomy, direct line to the CTO, and a real budget. On-site in Portland 3 days a week. We are not on-call hell; we have a real rotation.' },
      { id: 4, title: 'Full Stack Engineer', company: 'Puget Sound Digital',
        location: 'Seattle, WA (Remote)', salary: '$110k – $140k', salary_max: 140000,
        tags: ['Laravel','React','Backend','Frontend','Remote'], posted: '6h ago',
        is_featured: true, video_url: null,
        url: 'jobs/full-stack-engineer',
        description: 'Own the stack end-to-end. Laravel API + React frontend for a fintech startup processing $2M/day in transactions. Small team (5 engineers), async-first culture, fully remote. You will ship features, review PRs, and occasionally touch infra (AWS / RDS). Equity included.' },
      { id: 5, title: 'Junior PHP Developer', company: 'Victoria Ventures',
        location: 'Victoria, BC (Hybrid)', salary: '$65k – $85k', salary_max: 85000,
        tags: ['PHP','Laravel','Backend','Hybrid'], posted: '3d ago',
        is_featured: false, video_url: null,
        url: 'jobs/junior-php-developer',
        description: 'Great first role in a supportive team. Mentorship included, no enterprise fluff. You will work on a SaaS product used by local government clients. Senior engineer pairing 2x per week, structured code review, and a clear growth path to mid-level within 18 months.' },
      { id: 6, title: 'Node.js Backend Engineer', company: 'Salish Sea Studios',
        location: 'Vancouver, BC (Remote)', salary: '$100k – $130k', salary_max: 130000,
        tags: ['Node','Backend','Remote','Senior'], posted: '5d ago',
        is_featured: false, video_url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        url: 'jobs/nodejs-backend-engineer',
        description: 'Real-time multiplayer features for an indie game platform. Node + WebSockets + Redis Pub/Sub. We handle 40k concurrent connections at peak. You should care about latency. Fully remote, UTC-8 timezone preferred, generous equipment budget and $2k/yr learning stipend.' },
      { id: 7, title: 'LAMP / XAMPP Developer', company: 'Bob Studios',
        location: 'Vancouver, BC (Remote)', salary: '$100k – $130k', salary_max: 130000,
        tags: ['LAMP','XAMPP','Backend','Remote'], posted: '5d ago',
        is_featured: false, video_url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        url: 'jobs/lamp-xampp-developer',
        description: 'Work with a legacy LAMP stack and modernize it. You will be responsible for maintaining and improving an existing application. Fully remote, UTC-8 timezone preferred, generous equipment budget and $2k/yr learning stipend.' },
    ],

    specializations: [
      { key: 'HasVideo', label: 'Has video', icon: '▶' },
      { key: 'Backend',  label: 'Backend',   icon: '⬡' },
      { key: 'Frontend', label: 'Frontend',  icon: '◈' },
      { key: 'DevOps',   label: 'DevOps',    icon: '⟳' },
      { key: 'Senior',   label: 'Senior',    icon: '★' },
      { key: 'React',    label: 'React',     icon: '⚛' },
      { key: 'Laravel',  label: 'Laravel',   icon: '▲' },
      { key: 'PHP',      label: 'PHP',       icon: '⬡' },
      { key: 'Remote',   label: 'Remote',    icon: '⌂' },
      { key: 'Hybrid',   label: 'Hybrid',    icon: '⇌' },
    ],

    get selectedJob() { return this.jobs.find(j => j.id === this.expandedJobId) || null; },

    get filteredJobs() {
      let list = this.jobs.filter(job => {
        const s = this.search.toLowerCase();
        const ms = !s
          || job.title.toLowerCase().includes(s)
          || job.company.toLowerCase().includes(s)
          || (job.tags||[]).some(t => t.toLowerCase().includes(s));
        const mf = this.activeFilters.length === 0
          || this.activeFilters.every(f => {
            if (f === 'HasVideo') return !!job.video_url;
            return (job.tags||[]).includes(f);
          });
        return ms && mf;
      });
      switch (this.activeSort) {
        case 'hybrid': return list.sort((a,b) => b.location.toLowerCase().includes('hybrid') - a.location.toLowerCase().includes('hybrid'));
        case 'remote': return list.sort((a,b) => b.location.toLowerCase().includes('remote') - a.location.toLowerCase().includes('remote'));
        case 'salary': return list.sort((a,b) => (b.salary_max||0) - (a.salary_max||0));
        case 'featured': return list.sort((a,b) => b.is_featured - a.is_featured);
        case 'latest': {
          const toMins = s => { const n = parseInt(s); if (s.includes('h')) return n*60; if (s.includes('d')) return n*1440; return 9999; };
          return list.sort((a,b) => toMins(a.posted) - toMins(b.posted));
        }
        default: return list;
      }
    },

    init() {
      const params = new URLSearchParams(window.location.search);
      const q = params.get('q');
      if (q) this.search = q;

      this.$watch('search', value => {
        const url = new URL(window.location);
        if (value) url.searchParams.set('q', value); else url.searchParams.delete('q');
        history.replaceState({}, '', url);
      });

      try {
        const stored = localStorage.getItem('ny_dev_saved');
        this.savedJobs = stored ? JSON.parse(stored) : [];
      } catch { this.savedJobs = []; }

      window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => { this.darkMode = e.matches; });

      window.addEventListener('resize', () => {
        const was = this._isDesktop;
        this._isDesktop = window.innerWidth >= 1024;
        this._hasSidebar = window.innerWidth >= 768;
        if (!was && this._isDesktop && this.expandedJobId !== null) {
          document.body.style.overflow = '';
          this.sheetVisible = false;
        }
      }, { passive: true });
    },

    selectJob(id) {
      if (this.expandedJobId === id) { this.closeDetail(); return; }
      this.videoPlaying = false;
      this.promoPlaying = false;
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
    initials(c) { return c.split(' ').slice(0,2).map(w=>w[0]).join('').toUpperCase(); },
  };
}
</script>
</body>
</html>