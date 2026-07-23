<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>newyork.dev — Developer Jobs (orks page - new orks city)</title>
<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600&family=Geist+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
/* ── design tokens ── */
:root {
  --bg:        #ffffff;
  --bg-subtle: #f6f8fa;
  --bg-inset:  #f0f2f5;
  --border:    #d0d7de;
  --border-muted: #e8eaed;
  --text-1:    #0d1117;
  --text-2:    #656d76;
  --text-3:    #9198a1;
  --accent:    #0969da;
  --accent-bg: #ddf4ff;
  --accent-fg: #0550ae;
  --green:     #1a7f37;
  --green-bg:  #dafbe1;
  --amber:     #9a6700;
  --amber-bg:  #fff8c5;
  --purple:    #6639ba;
  --purple-bg: #fbefff;
  --salary:    #1a7f37;
  --radius-sm: 6px;
  --radius:    8px;
  --radius-lg: 12px;
}

[data-theme="dark"] {
  --bg:        #0d1117;
  --bg-subtle: #161b22;
  --bg-inset:  #1c2128;
  --border:    #30363d;
  --border-muted: #21262d;
  --text-1:    #e6edf3;
  --text-2:    #7d8590;
  --text-3:    #484f58;
  --accent:    #4493f8;
  --accent-bg: #0d2d6b;
  --accent-fg: #79c0ff;
  --green:     #3fb950;
  --green-bg:  #0d3d1b;
  --amber:     #d29922;
  --amber-bg:  #2d2000;
  --purple:    #bc8cff;
  --purple-bg: #1f1240;
  --salary:    #3fb950;
}

*,*::before,*::after { box-sizing:border-box; margin:0; padding:0; }
[x-cloak] { display:none !important; }

body {
  font-family:'Geist',system-ui,sans-serif;
  background:var(--bg);
  color:var(--text-1);
  min-height:100vh;
  font-size:14px;
  line-height:1.5;
  -webkit-font-smoothing:antialiased;
}

/* ── focus ── */
:focus-visible {
  outline:2px solid var(--accent);
  outline-offset:2px;
}

/* ── scrollbar ── */
::-webkit-scrollbar { width:4px; }
::-webkit-scrollbar-track { background:transparent; }
::-webkit-scrollbar-thumb { background:var(--border); border-radius:2px; }

/* ── NAV ── */
.nav {
  height:56px;
  border-bottom:1px solid var(--border-muted);
  background:var(--bg);
  position:sticky;
  top:0;
  z-index:100;
  display:flex;
  align-items:center;
  padding:0 12px;
  gap:8px;
}
@media (min-width:480px) { .nav { padding:0 16px; gap:10px; } }
@media (min-width:768px) { .nav { gap:12px; } }
.nav-logo {
  font-family:'Geist Mono',monospace;
  font-size:13px;
  font-weight:500;
  color:var(--text-1);
  text-decoration:none;
  display:flex;
  align-items:center;
  gap:6px;
  flex-shrink:0;
}
.nav-logo-dot { color:var(--accent); }
.nav-search {
  width:100%;
  height:32px;
  border:1px solid var(--border);
  border-radius:var(--radius-sm);
  background:var(--bg-subtle);
  color:var(--text-1);
  font-family:inherit;
  font-size:13px;
  padding:0 10px 0 32px;
  transition:border-color .15s,background .15s;
  min-width:0;
}
.nav-search:focus { outline:none; border-color:var(--accent); background:var(--bg); }
.nav-search::placeholder { color:var(--text-3); }
/* On mobile: short fixed width so logo + search + icons fit 360px.
   On md+: grows freely up to 380px. */
.nav-search-wrap {
  position:relative;
  width:100px;
  flex-shrink:1;
}
@media (min-width:480px) { .nav-search-wrap { width:160px; } }
@media (min-width:768px) { .nav-search-wrap { flex:1; width:auto; max-width:380px; } }
.nav-search-icon {
  position:absolute;
  left:9px;
  top:50%;
  transform:translateY(-50%);
  color:var(--text-3);
  pointer-events:none;
  width:14px;
  height:14px;
}
.btn {
  height:32px;
  padding:0 12px;
  border-radius:var(--radius-sm);
  border:1px solid var(--border);
  background:var(--bg-subtle);
  color:var(--text-1);
  font-family:inherit;
  font-size:13px;
  font-weight:500;
  cursor:pointer;
  display:inline-flex;
  align-items:center;
  gap:6px;
  white-space:nowrap;
  transition:background .12s,border-color .12s;
  text-decoration:none;
}
.btn:hover { background:var(--bg-inset); border-color:var(--border); }
.btn-primary {
  background:var(--accent);
  color:#fff;
  border-color:var(--accent);
}
.btn-primary:hover { opacity:.9; background:var(--accent); }
.btn-ghost {
  border-color:transparent;
  background:transparent;
}
.btn-ghost:hover { background:var(--bg-subtle); border-color:transparent; }

/* ── LAYOUT ── */
.layout { display:flex; }

/* ── SIDEBAR ── */
.sidebar {
  width:200px;
  flex-shrink:0;
  border-right:1px solid var(--border-muted);
  height:calc(100vh - 56px);
  position:sticky;
  top:56px;
  overflow-y:auto;
  padding:16px 8px;
}
.sidebar-section {
  font-family:'Geist Mono',monospace;
  font-size:11px;
  font-weight:500;
  letter-spacing:.06em;
  text-transform:uppercase;
  color:var(--text-3);
  padding:0 8px 8px;
  margin-top:8px;
}
.sidebar-section:first-child { margin-top:0; }
.filter-item {
  display:flex;
  align-items:center;
  gap:8px;
  padding:5px 8px;
  border-radius:var(--radius-sm);
  border:none;
  background:transparent;
  color:var(--text-2);
  font-family:inherit;
  font-size:13px;
  width:100%;
  text-align:left;
  cursor:pointer;
  transition:background .1s,color .1s;
}
.filter-item:hover { background:var(--bg-subtle); color:var(--text-1); }
.filter-item.active { background:var(--accent-bg); color:var(--accent-fg); font-weight:500; }
.filter-icon { font-size:13px; width:16px; text-align:center; flex-shrink:0; }
.filter-check {
  margin-left:auto;
  color:var(--accent);
  font-size:11px;
  flex-shrink:0;
}
.sidebar-divider { height:1px; background:var(--border-muted); margin:8px 0; }

/* ── MAIN ── */
.main { flex:1; min-width:0; padding:20px 16px 40px; max-width:100%; }
@media (min-width:768px) { .main { padding:24px 24px 60px; } }

/* ── SORT STRIP ── */
.sort-strip {
  display:flex;
  align-items:center;
  justify-content:space-between;
  margin-bottom:16px;
  flex-wrap:wrap;
  gap:8px;
}
.sort-tabs { display:flex; gap:2px; }
.sort-tab {
  height:28px;
  padding:0 10px;
  border-radius:var(--radius-sm);
  border:none;
  background:transparent;
  color:var(--text-2);
  font-family:inherit;
  font-size:13px;
  cursor:pointer;
  transition:background .1s,color .1s;
}
.sort-tab:hover { background:var(--bg-subtle); color:var(--text-1); }
.sort-tab.active {
  background:var(--bg-subtle);
  color:var(--text-1);
  font-weight:500;
  border:1px solid var(--border-muted);
}
.count-label {
  font-family:'Geist Mono',monospace;
  font-size:12px;
  color:var(--text-3);
}

/* ── ACTIVE FILTERS ── */
.chip {
  display:inline-flex;
  align-items:center;
  gap:4px;
  height:24px;
  padding:0 8px;
  border-radius:var(--radius-sm);
  border:1px solid var(--border);
  background:var(--bg-subtle);
  color:var(--text-2);
  font-size:12px;
  cursor:pointer;
  transition:background .1s;
}
.chip:hover { background:var(--bg-inset); }
.chip-x { font-size:10px; color:var(--text-3); }

/* ── GRID ── */
.grid-layout {
  display:grid;
  grid-template-columns:1fr;
  gap:8px;
}
@media (min-width:1024px) {
  .grid-layout { grid-template-columns:1fr 300px; gap:16px; }
}
@media (min-width:1280px) {
  .grid-layout { grid-template-columns:1fr 360px; }
}

/* ── JOB CARD ── */
.job-card {
  border:1px solid var(--border-muted);
  border-radius:var(--radius-lg);
  padding:16px;
  cursor:pointer;
  background:var(--bg);
  transition:border-color .15s,background .15s,box-shadow .15s;
  position:relative;
}
.job-card:hover {
  border-color:var(--border);
  background:var(--bg-subtle);
}
.job-card.selected {
  border-color:var(--accent);
  background:var(--bg-subtle);
  box-shadow:0 0 0 3px rgba(9,105,218,.12);
}
[data-theme="dark"] .job-card.selected {
  box-shadow:0 0 0 3px rgba(68,147,248,.15);
}
.job-card.featured {
  border-left:3px solid var(--accent);
}

/* logo */
.company-logo {
  width:40px;
  height:40px;
  border-radius:var(--radius-sm);
  border:1px solid var(--border-muted);
  display:flex;
  align-items:center;
  justify-content:center;
  font-family:'Geist Mono',monospace;
  font-size:12px;
  font-weight:500;
  color:var(--text-2);
  flex-shrink:0;
  background:var(--bg-subtle);
}

/* badges */
.badge {
  display:inline-flex;
  align-items:center;
  gap:3px;
  height:20px;
  padding:0 7px;
  border-radius:var(--radius-sm);
  font-size:11px;
  font-weight:500;
  font-family:'Geist Mono',monospace;
}
.badge-accent  { background:var(--accent-bg);  color:var(--accent-fg); }
.badge-green   { background:var(--green-bg);   color:var(--green); }
.badge-purple  { background:var(--purple-bg);  color:var(--purple); }

/* tag */
.tag {
  display:inline-flex;
  align-items:center;
  height:22px;
  padding:0 8px;
  border-radius:var(--radius-sm);
  border:1px solid var(--border-muted);
  background:transparent;
  color:var(--text-2);
  font-family:'Geist Mono',monospace;
  font-size:11px;
  cursor:pointer;
  transition:all .12s;
}
.tag:hover { border-color:var(--border); color:var(--text-1); background:var(--bg-subtle); }
.tag.active { border-color:var(--accent); color:var(--accent-fg); background:var(--accent-bg); }

/* salary */
.salary {
  font-family:'Geist Mono',monospace;
  font-size:12px;
  font-weight:500;
  color:var(--salary);
}

/* save button */
.save-btn {
  width:28px;
  height:28px;
  border-radius:var(--radius-sm);
  border:1px solid var(--border-muted);
  background:transparent;
  color:var(--text-3);
  display:flex;
  align-items:center;
  justify-content:center;
  cursor:pointer;
  flex-shrink:0;
  transition:all .12s;
}
.save-btn:hover { border-color:var(--border); color:var(--text-2); background:var(--bg-subtle); }
.save-btn.saved { border-color:var(--amber); color:var(--amber); background:var(--amber-bg); }

/* meta text */
.meta { font-size:12px; color:var(--text-2); display:flex; flex-wrap:wrap; align-items:center; gap:4px; }
.meta-sep { color:var(--text-3); margin:0 2px; }

/* ── DETAIL PANEL ── */
.detail-panel {
  background:var(--bg);
  border:1px solid var(--border-muted);
  border-radius:var(--radius-lg);
  overflow:hidden;
  position:sticky;
  top:72px;
  max-height:calc(100vh - 88px);
  overflow-y:auto;
}
.detail-panel.has-content { border-color:var(--border); }

/* ── EMPTY PANEL ── */
.panel-empty {
  padding:24px;
  display:flex;
  flex-direction:column;
  gap:16px;
}
.promo-pulse {
  display:flex;
  align-items:center;
  gap:6px;
  font-family:'Geist Mono',monospace;
  font-size:11px;
  font-weight:500;
  color:var(--accent);
  margin-bottom:4px;
}
.promo-dot {
  width:6px; height:6px;
  border-radius:50%;
  background:var(--accent);
  animation:pulse 2s ease-in-out infinite;
}
@keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.3} }

.video-wrap {
  width:100%;
  aspect-ratio:16/9;
  border-radius:var(--radius);
  overflow:hidden;
  border:1px solid var(--border-muted);
  background:var(--bg-inset);
  position:relative;
}
.video-overlay {
  position:absolute;
  inset:0;
  display:flex;
  align-items:center;
  justify-content:center;
  cursor:pointer;
  background:rgba(13,17,23,.5);
  border-radius:var(--radius);
  transition:background .15s;
}
.video-overlay:hover { background:rgba(13,17,23,.65); }
.play-circle {
  width:44px; height:44px;
  border-radius:50%;
  background:rgba(255,255,255,.15);
  border:1.5px solid rgba(255,255,255,.3);
  display:flex; align-items:center; justify-content:center;
}
.panel-hint {
  font-size:12px;
  color:var(--text-3);
  line-height:1.6;
}

/* ── DETAIL CONTENT ── */
.detail-inner { padding:20px; }
.detail-header { display:flex; align-items:flex-start; gap:12px; margin-bottom:16px; }
.detail-title { font-size:16px; font-weight:600; color:var(--text-1); line-height:1.3; margin-bottom:2px; }
.detail-company { font-size:13px; color:var(--text-2); }
.detail-divider { height:1px; background:var(--border-muted); margin:16px 0; }
.detail-label {
  font-family:'Geist Mono',monospace;
  font-size:10px;
  font-weight:500;
  letter-spacing:.08em;
  text-transform:uppercase;
  color:var(--text-3);
  margin-bottom:8px;
}
.detail-body { font-size:13px; color:var(--text-2); line-height:1.7; }
.apply-btn {
  height:36px;
  padding:0 16px;
  border-radius:var(--radius-sm);
  background:var(--accent);
  color:#fff;
  font-family:inherit;
  font-size:13px;
  font-weight:500;
  border:none;
  cursor:pointer;
  display:inline-flex;
  align-items:center;
  gap:6px;
  text-decoration:none;
  transition:opacity .12s;
  flex:1;
  justify-content:center;
}
.apply-btn:hover { opacity:.9; }

/* ── STATS ── */
.stat-row {
  display:flex;
  justify-content:space-between;
  align-items:center;
  padding:3px 0;
}
.stat-label { font-size:12px; color:var(--text-2); }
.stat-val { font-family:'Geist Mono',monospace; font-size:12px; font-weight:500; color:var(--text-1); }

/* ── MOBILE SHEET ── */
.sheet-backdrop {
  position:fixed;
  inset:0;
  z-index:200;
  background:rgba(0,0,0,.5);
  backdrop-filter:blur(2px);
  transition:opacity .2s;
}
.sheet {
  position:fixed;
  left:0; right:0; bottom:0;
  z-index:201;
  background:var(--bg);
  border-radius:16px 16px 0 0;
  border-top:1px solid var(--border);
  max-height:92dvh;
  overflow-y:auto;
  transition:transform .28s cubic-bezier(.32,0,.67,0);
}
.sheet.entering { transform:translateY(100%); }
.sheet-handle {
  width:36px; height:4px;
  border-radius:2px;
  background:var(--border);
  margin:12px auto 0;
}

/* ── MOBILE SIDEBAR OVERLAY ── */
@media (max-width:767px) {
  .sidebar {
    display:none;
  }
  .sidebar.open {
    display:block !important;
    position:fixed;
    top:56px; left:0;
    z-index:300;
    background:var(--bg);
    box-shadow:4px 0 24px rgba(0,0,0,.15);
    width:240px;
  }
}
/* 768px–1023px: sidebar is sticky but narrower to leave room for cards */
@media (min-width:768px) and (max-width:1023px) {
  .sidebar { width:160px; }
}

/* ── EMPTY STATE ── */
.empty-state {
  text-align:center;
  padding:48px 24px;
  color:var(--text-3);
}
.empty-icon {
  font-family:'Geist Mono',monospace;
  font-size:24px;
  margin-bottom:10px;
  color:var(--text-3);
}
.empty-text { font-size:14px; color:var(--text-2); margin-bottom:12px; }

/* ── THEME TOGGLE ── */
.theme-btn {
  width:32px; height:32px;
  border-radius:var(--radius-sm);
  border:1px solid var(--border-muted);
  background:transparent;
  color:var(--text-2);
  display:flex; align-items:center; justify-content:center;
  cursor:pointer;
  transition:all .12s;
  flex-shrink:0;
}
.theme-btn:hover { background:var(--bg-subtle); border-color:var(--border); color:var(--text-1); }

/* ── NAV DROPDOWN ── */
.nav-dropdown {
  position:absolute;
  top:calc(100% + 6px);
  left:0;
  min-width:160px;
  background:var(--bg);
  border:1px solid var(--border);
  border-radius:var(--radius);
  padding:4px;
  z-index:200;
  box-shadow:0 8px 24px rgba(0,0,0,.12);
}
.dropdown-item {
  display:block;
  padding:7px 10px;
  border-radius:var(--radius-sm);
  font-size:13px;
  color:var(--text-1);
  text-decoration:none;
  transition:background .1s;
}
.dropdown-item:hover { background:var(--bg-subtle); }

/* ── FOOTER ── */
.footer {
  border-top:1px solid var(--border-muted);
  background:var(--bg-subtle);
  padding:16px 24px;
  display:flex;
  justify-content:space-between;
  flex-wrap:wrap;
  gap:8px;
}
.footer-text { font-size:12px; color:var(--text-3); font-family:'Geist Mono',monospace; }
.footer-links { display:flex; gap:16px; }
.footer-link { font-size:12px; color:var(--text-3); text-decoration:none; transition:color .12s; }
.footer-link:hover { color:var(--text-1); }

/* sr-only for accessibility */
.sr-only {
  position:absolute; width:1px; height:1px;
  padding:0; margin:-1px; overflow:hidden;
  clip:rect(0,0,0,0); white-space:nowrap; border:0;
}
</style>
</head>

<body x-data="jobBoard()" x-init="init()" :data-theme="darkMode?'dark':'light'" @keydown.escape.window="closeDetail()">

<!-- ── NAV ── -->
<nav class="nav" role="banner">
  <a href="/" class="nav-logo" aria-label="newyork.dev home">

    <span class="hover:text-blue-500">NewYork<span class="nav-logo-dot">.</span>dev</span>
  </a>



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
        <a href="/jobs"     class="dropdown-item" role="menuitem">Browse jobs</a>
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
        <a href="/pricing"  class="dropdown-item" role="menuitem">Pricing</a>
      </div>
    </div>
  </div>


  <div class="nav-search-wrap" role="search">
    <svg class="nav-search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
    </svg>
    <input type="search" x-model="search" placeholder="Search jobs, companies, tech…"
           class="nav-search" aria-label="Search jobs" autocomplete="off">
  </div>





  <div class="flex items-center gap-2" style="margin-left:auto">
    <a href="/post-job" class="btn btn-primary hidden sm:inline-flex">Post a job</a>

    <!-- saved counter -->
    <button class="btn btn-ghost" style="gap:4px;padding:0 8px" aria-label="Saved jobs">
      <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
      </svg>
      <span x-show="savedJobs.length>0" x-text="savedJobs.length"
            style="font-family:'Geist Mono',monospace;font-size:11px;color:var(--amber)"
            aria-live="polite"></span>
    </button>

    <!-- dark mode toggle -->
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

    <!-- mobile filter toggle -->
    <button class="theme-btn md:hidden" @click="mobileSidebar=!mobileSidebar"
            :aria-expanded="mobileSidebar" aria-label="Toggle filters">
      <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/>
      </svg>
    </button>
  </div>
</nav>

<!-- ── LAYOUT ── -->
<div class="layout">

  <!-- SIDEBAR -->
  <aside :class="mobileSidebar?'sidebar open':'sidebar'"
         x-show="mobileSidebar||_hasSidebar"
         @click.away="if(!_hasSidebar) mobileSidebar=false"
         x-cloak role="navigation" aria-label="Job filters">

    <p class="sidebar-section">Filters</p>

    <!-- Post a job shortcut -->
    <a href="/post-job" class="filter-item" style="color:var(--accent);border:1px dashed var(--border-muted);border-radius:var(--radius-sm);margin:0 0 4px">
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

    <button x-show="activeFilters.length>0" @click="activeFilters=[]"
            class="filter-item" style="color:#e5534b;width:100%">
      <span class="filter-icon" aria-hidden="true">✕</span>
      Clear filters
    </button>

    <div class="sidebar-divider" style="margin-top:8px"></div>

    <!-- nav links — mobile only (md+ uses the nav dropdowns) -->
    <p class="sidebar-section md:hidden" style="margin-top:8px">Candidates</p>
    <div class="md:hidden">
      <a href="/jobs"     class="filter-item"><span class="filter-icon" aria-hidden="true">⊞</span>Browse jobs</a>
      <a href="/salaries" class="filter-item"><span class="filter-icon" aria-hidden="true">$</span>Salary insights</a>
    </div>
    <p class="sidebar-section md:hidden">Employers</p>
    <div class="md:hidden">
      <a href="/post-job" class="filter-item"><span class="filter-icon" aria-hidden="true">+</span>Post a job</a>
      <a href="/pricing"  class="filter-item"><span class="filter-icon" aria-hidden="true">◻</span>Pricing</a>
    </div>

    <div class="sidebar-divider" style="margin-top:8px"></div>
    <p class="sidebar-section" style="margin-top:8px">Stats</p>
    <div style="padding:0 8px 16px;display:flex;flex-direction:column;gap:4px">
      <div class="stat-row">
        <span class="stat-label">Total</span>
        <span class="stat-val" x-text="jobs.length"></span>
      </div>
      <div class="stat-row">
        <span class="stat-label">Matching</span>
        <span class="stat-val" x-text="filteredJobs.length"></span>
      </div>
      <div class="stat-row">
        <span class="stat-label">With video</span>
        <span class="stat-val" style="color:var(--purple)" x-text="jobs.filter(j=>j.video_url).length"></span>
      </div>
      <div class="stat-row">
        <span class="stat-label">Saved</span>
        <span class="stat-val" style="color:var(--amber)" x-text="savedJobs.length"></span>
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <main class="main">

    <!-- sort strip -->
    <div class="sort-strip">
      <div class="sort-tabs" role="tablist" aria-label="Sort jobs">
        <button @click="activeSort='featured'" :class="activeSort==='featured'?'sort-tab active':'sort-tab'"
                role="tab" :aria-selected="activeSort==='featured'">Featured</button>
        <button @click="activeSort='remote'"   :class="activeSort==='remote'  ?'sort-tab active':'sort-tab'"
                role="tab" :aria-selected="activeSort==='remote'">Remote</button>
        <button @click="activeSort='hybrid'"   :class="activeSort==='hybrid'  ?'sort-tab active':'sort-tab'"
                role="tab" :aria-selected="activeSort==='hybrid'">Hybrid</button>
        <button @click="activeSort='latest'"   :class="activeSort==='latest'  ?'sort-tab active':'sort-tab'"
                role="tab" :aria-selected="activeSort==='latest'">Latest</button>
        <button @click="activeSort='salary'"   :class="activeSort==='salary'  ?'sort-tab active':'sort-tab'"
                role="tab" :aria-selected="activeSort==='salary'">High pay</button>
      </div>
      <span class="count-label" aria-live="polite">
        <span x-text="filteredJobs.length"></span> listings
      </span>
    </div>

    <!-- active filter chips -->
    <div x-show="activeFilters.length>0" class="flex flex-wrap gap-2 mb-4" role="list" aria-label="Active filters">
      <template x-for="f in activeFilters" :key="f">
        <button class="chip" role="listitem" @click="toggleFilter(f)"
                :aria-label="'Remove filter: '+(specializations.find(s=>s.key===f)?.label||f)">
          <span x-text="specializations.find(s=>s.key===f)?.label||f"></span>
          <span class="chip-x" aria-hidden="true">✕</span>
        </button>
      </template>
    </div>

    <!-- two-col grid -->
    <div class="grid-layout">

      <!-- card list -->
      <div role="list" aria-label="Job listings" style="display:flex;flex-direction:column;gap:8px">

        <template x-for="job in filteredJobs" :key="job.id">
          <article class="job-card"
               :class="[job.is_featured?'featured':'', expandedJobId===job.id?'selected':'']"
               role="listitem"
               @click="selectJob(job.id)"
               :aria-selected="expandedJobId===job.id"
               :aria-label="job.title+' at '+job.company">

            <div style="display:flex;gap:12px;align-items:flex-start">

              <!-- logo -->
              <div class="company-logo" :style="'background:'+logoColor(job.company)"
                   aria-hidden="true" x-text="initials(job.company)"></div>

              <div style="flex:1;min-width:0">
                <!-- title row -->
                <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:8px;margin-bottom:4px">
                  <h3 style="font-size:14px;font-weight:600;color:var(--text-1);line-height:1.3"
                      x-text="job.title"></h3>
                  <div style="display:flex;align-items:center;gap:6px;flex-shrink:0" @click.stop>
                    <span class="salary" x-show="job.salary" x-text="job.salary"
                          style="display:none" class="hidden sm:inline"></span>
                    <button class="save-btn" :class="isSaved(job.id)?'saved':''"
                            @click="toggleSave(job.id)"
                            :aria-label="isSaved(job.id)?'Unsave '+job.title:'Save '+job.title"
                            :aria-pressed="isSaved(job.id)">
                      <svg width="13" height="13" :fill="isSaved(job.id)?'currentColor':'none'"
                           stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                      </svg>
                    </button>
                  </div>
                </div>

                <!-- salary mobile -->
                <div class="sm:hidden" x-show="job.salary" style="margin-bottom:4px">
                  <span class="salary" x-text="job.salary"></span>
                </div>

                <!-- meta row -->
                <div class="meta" style="margin-bottom:10px">
                  <span x-text="job.company"></span>
                  <span class="meta-sep" aria-hidden="true">·</span>
                  <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                       aria-hidden="true" style="flex-shrink:0">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                  </svg>
                  <span x-text="job.location"></span>
                  <span class="meta-sep" aria-hidden="true">·</span>
                  <span x-text="job.posted" style="color:var(--text-3)"></span>
                </div>

                <!-- badges + tags row -->
                <div style="display:flex;flex-wrap:wrap;align-items:center;gap:6px" @click.stop>
                  <span x-show="job.is_featured" class="badge badge-accent">Featured</span>
                  <span x-show="job.location&&job.location.includes('Remote')" class="badge badge-green">Remote</span>
                  <span x-show="job.video_url" class="badge badge-purple">▶ Video</span>
                  <template x-for="tag in (job.tags||[]).slice(0,4)" :key="tag">
                    <span class="tag"
                          :class="activeFilters.includes(tag)?'active':''"
                          @click="toggleFilter(tag)"
                          :aria-pressed="activeFilters.includes(tag)"
                          x-text="tag"></span>
                  </template>
                </div>
              </div>
            </div>
          </article>
        </template>

        <!-- empty state -->
        <div x-show="filteredJobs.length===0" class="empty-state" role="status">
          <div class="empty-icon">{ }</div>
          <p class="empty-text">No matching jobs found</p>
          <button @click="search='';activeFilters=[]" class="btn">Reset filters</button>
        </div>
      </div>

      <!-- DETAIL PANEL (desktop lg+) -->
      <div class="hidden lg:block">
        <div class="detail-panel" :class="selectedJob?'has-content':''">

          <!-- empty / promo -->
          <template x-if="!selectedJob">
            <div class="panel-empty">
              <div class="promo-pulse">
                <span class="promo-dot" aria-hidden="true"></span>
                Now hiring on newyork.dev
              </div>
              <div class="video-wrap">
                <div class="video-overlay"
                     x-show="!promoPlaying"
                     @click="promoPlaying=true"
                     role="button"
                     tabindex="0"
                     aria-label="Play intro video"
                     @keydown.enter="promoPlaying=true"
                     @keydown.space.prevent="promoPlaying=true">
                  <div class="play-circle">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="white" aria-hidden="true">
                      <path d="M8 5v14l11-7z"/>
                    </svg>
                  </div>
                </div>
                <iframe :src="promoPlaying?promoVideoUrl+'?autoplay=1':'about:blank'"
                        loading="lazy" class="w-full h-full" style="border-radius:var(--radius)"
                        frameborder="0" allow="autoplay;fullscreen" allowfullscreen
                        title="newyork.dev intro video"></iframe>
              </div>
              <p class="panel-hint">Reach 2,000+ New York developers actively looking.</p>
              <p class="panel-hint">← Select a listing to preview details here.</p>
            </div>
          </template>

          <!-- job detail -->
          <template x-if="selectedJob">
            <div class="detail-inner">
              <!-- header -->
              <div class="detail-header">
                <div class="company-logo" :style="'background:'+logoColor(selectedJob.company)"
                     aria-hidden="true" x-text="initials(selectedJob.company)"></div>
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

              <!-- meta -->
              <div class="meta" style="margin-bottom:12px">
                <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                </svg>
                <span x-text="selectedJob.location"></span>
                <span class="meta-sep" aria-hidden="true">·</span>
                <span x-text="'Posted '+selectedJob.posted" style="color:var(--text-3)"></span>
              </div>

              <!-- salary -->
              <div x-show="selectedJob.salary" style="margin-bottom:16px">
                <span class="salary" style="font-size:15px" x-text="selectedJob.salary"></span>
                <span style="font-size:11px;color:var(--text-3);font-family:'Geist Mono',monospace;margin-left:6px">/ yr</span>
              </div>

              <!-- video -->
              <template x-if="selectedJob.video_url">
                <div style="margin-bottom:16px" @click.stop>
                  <p class="detail-label">Hiring manager intro</p>
                  <div class="video-wrap">
                    <div class="video-overlay"
                         x-show="!videoPlaying"
                         @click.stop="startVideo()"
                         role="button" tabindex="0"
                         aria-label="Play hiring manager video"
                         @keydown.enter="startVideo()"
                         @keydown.space.prevent="startVideo()">
                      <div class="play-circle">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="white" aria-hidden="true">
                          <path d="M8 5v14l11-7z"/>
                        </svg>
                      </div>
                    </div>
                    <iframe :src="videoPlaying?selectedJob.video_url+'?autoplay=1':'about:blank'"
                            loading="lazy" class="w-full h-full" style="border-radius:var(--radius)"
                            frameborder="0" allow="autoplay;fullscreen" allowfullscreen
                            :title="selectedJob.company+' hiring video'"></iframe>
                  </div>
                </div>
              </template>

              <div class="detail-divider"></div>

              <!-- description -->
              <div style="margin-bottom:16px">
                <p class="detail-label">About the role</p>
                <p class="detail-body" x-text="selectedJob.description"></p>
              </div>

              <!-- tags -->
              <div style="margin-bottom:16px">
                <p class="detail-label">Tech stack</p>
                <div style="display:flex;flex-wrap:wrap;gap:6px">
                  <template x-for="tag in (selectedJob.tags||[])" :key="tag">
                    <span class="tag" x-text="tag"></span>
                  </template>
                </div>
              </div>

              <div class="detail-divider"></div>

              <!-- actions -->
              <div style="display:flex;align-items:center;gap:8px">
                <a :href="selectedJob.url" class="apply-btn" @click.stop>
                  Apply now
                  <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                  </svg>
                </a>
                <button class="btn" :class="isSaved(selectedJob.id)?'save-btn saved':''"
                        @click.stop="toggleSave(selectedJob.id)"
                        :aria-label="isSaved(selectedJob.id)?'Unsave':'Save'"
                        :aria-pressed="isSaved(selectedJob.id)"
                        style="height:36px;gap:6px">
                  <svg width="13" height="13" :fill="isSaved(selectedJob.id)?'currentColor':'none'"
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
      </div>

    </div><!-- /grid -->
  </main>
</div><!-- /layout -->

<!-- ── MOBILE SHEET ── -->
<div class="sheet-backdrop lg:hidden"
     x-show="expandedJobId!==null&&sheetVisible"
     x-cloak
     :style="sheetVisible?'opacity:1':'opacity:0'"
     @click="closeDetail()"
     aria-hidden="true"></div>

<div class="sheet lg:hidden"
     x-show="expandedJobId!==null"
     x-cloak
     :class="sheetVisible?'':'entering'"
     role="dialog"
     aria-modal="true"
     :aria-label="selectedJob?selectedJob.title+' — '+selectedJob.company:'Job details'"
     @click.stop>

  <div class="sheet-handle" aria-hidden="true"></div>

  <template x-if="selectedJob">
    <div style="padding:16px 20px 48px">

      <!-- header -->
      <div style="display:flex;align-items:flex-start;gap:12px;margin-bottom:16px">
        <div class="company-logo" :style="'background:'+logoColor(selectedJob.company)"
             aria-hidden="true" x-text="initials(selectedJob.company)"></div>
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
        <span x-text="'Posted '+selectedJob.posted" style="color:var(--text-3)"></span>
      </div>

      <div x-show="selectedJob.salary" style="margin-bottom:16px">
        <span class="salary" style="font-size:16px" x-text="selectedJob.salary"></span>
        <span style="font-size:11px;color:var(--text-3);font-family:'Geist Mono',monospace;margin-left:6px">/ yr</span>
      </div>

      <!-- video -->
      <template x-if="selectedJob.video_url">
        <div style="margin-bottom:16px" @click.stop>
          <p class="detail-label">Hiring manager intro</p>
          <div class="video-wrap">
            <div class="video-overlay"
                 x-show="!videoPlaying"
                 @click.stop="startVideo()"
                 role="button" tabindex="0"
                 aria-label="Play hiring manager video"
                 @keydown.enter="startVideo()"
                 @keydown.space.prevent="startVideo()">
              <div class="play-circle">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="white" aria-hidden="true">
                  <path d="M8 5v14l11-7z"/>
                </svg>
              </div>
            </div>
            <iframe :src="videoPlaying?selectedJob.video_url+'?autoplay=1':'about:blank'"
                    loading="lazy" class="w-full h-full" style="border-radius:var(--radius)"
                    frameborder="0" allow="autoplay;fullscreen" allowfullscreen
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
          <template x-for="tag in (selectedJob.tags||[])" :key="tag">
            <span class="tag" x-text="tag"></span>
          </template>
        </div>
      </div>

      <div style="display:flex;gap:8px">
        <a :href="selectedJob.url" class="apply-btn" @click.stop>
          Apply now
          <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </a>
        <button class="btn" :class="isSaved(selectedJob.id)?'save-btn saved':''"
                @click="toggleSave(selectedJob.id)"
                :aria-label="isSaved(selectedJob.id)?'Unsave':'Save'"
                :aria-pressed="isSaved(selectedJob.id)"
                style="height:36px;gap:6px">
          <svg width="13" height="13" :fill="isSaved(selectedJob.id)?'currentColor':'none'"
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

<!-- ── FOOTER ── -->
<footer class="footer" role="contentinfo">
  <span class="footer-text">© 2026 newyork.dev</span>
  <nav class="footer-links" aria-label="Footer navigation">
    <a href="#"         class="footer-link">About</a>
    <a href="#"         class="footer-link">API</a>
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
      {
        id: 1, title: 'Senior Laravel Engineer', company: 'Rainier Software',
        location: 'Seattle, WA (Remote)', salary: '$120k – $155k', salary_max: 155000,
        tags: ['PHP','Laravel','Backend','Hybrid','Senior'], posted: '2d ago',
        is_featured: true, video_url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        url: 'jobs/senior-php-laravel-engineer',
        description: 'Building internal SaaS tooling for a logistics company with a small, pragmatic team. You will own the backend architecture, work closely with a product-focused founder, and have direct impact on the roadmap. Stack is PHP 8.3 / Laravel 11, MySQL, Redis, deployed on Forge. No microservices nonsense — clean monolith, great test coverage, and a team that actually ships.',
      },
      {
        id: 2, title: 'Frontend Developer (React)', company: 'Cascadia Climate Tech',
        location: 'Hybrid (PNW)', salary: '$95k – $125k', salary_max: 125000,
        tags: ['React','Frontend','TypeScript','Remote'], posted: '1d ago',
        is_featured: true, video_url: null,
        url: 'jobs/frontend-developer-react',
        description: 'Dashboards for real-time climate data visualisation. Greenfield React + Tailwind project with a mission-driven team of 8. You will translate complex environmental datasets into clear, accessible UIs. TypeScript throughout, Vite build, Recharts for visualisation. Remote-friendly with optional office in Portland.',
      },
      {
        id: 3, title: 'DevOps / Platform Engineer', company: 'Mount Hood Systems',
        location: 'Portland, OR (On-site)', salary: '$140k – $180k', salary_max: 180000,
        tags: ['DevOps','Kubernetes','Python','Senior'], posted: '4d ago',
        is_featured: false, video_url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        url: 'jobs/devops-platform-engineer',
        description: 'Scale our infra to millions of requests. Kubernetes on EKS, Terraform, ArgoCD, heavy Python tooling. You will be the platform team — lots of autonomy, direct line to the CTO, and a real budget. On-site in Portland 3 days a week. We are not on-call hell; we have a real rotation.',
      },
      {
        id: 4, title: 'Full Stack Engineer', company: 'Puget Sound Digital',
        location: 'Seattle, WA (Remote)', salary: '$110k – $140k', salary_max: 140000,
        tags: ['Laravel','React','Backend','Frontend','Remote'], posted: '6h ago',
        is_featured: true, video_url: null,
        url: 'jobs/full-stack-engineer',
        description: 'Own the stack end-to-end. Laravel API + React frontend for a fintech startup processing $2M/day in transactions. Small team (5 engineers), async-first culture, fully remote. You will ship features, review PRs, and occasionally touch infra (AWS / RDS). Equity included.',
      },
      {
        id: 5, title: 'Junior PHP Developer', company: 'Victoria Ventures',
        location: 'Victoria, BC (Hybrid)', salary: '$65k – $85k', salary_max: 85000,
        tags: ['PHP','Laravel','Backend','Hybrid'], posted: '3d ago',
        is_featured: false, video_url: null,
        url: 'jobs/junior-php-developer',
        description: 'Great first role in a supportive team. Mentorship included, no enterprise fluff. You will work on a SaaS product used by local government clients. Senior engineer pairing 2x per week, structured code review, and a clear growth path to mid-level within 18 months.',
      },
      {
        id: 6, title: 'Node.js Backend Engineer', company: 'Salish Sea Studios',
        location: 'Vancouver, BC (Remote)', salary: '$100k – $130k', salary_max: 130000,
        tags: ['Node','Backend','Remote','Senior'], posted: '5d ago',
        is_featured: false, video_url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        url: 'jobs/nodejs-backend-engineer',
        description: 'Real-time multiplayer features for an indie game platform. Node + WebSockets + Redis Pub/Sub. We handle 40k concurrent connections at peak. You should care about latency. Fully remote, UTC-8 timezone preferred, generous equipment budget and $2k/yr learning stipend.',
      },
      {
        id: 7, title: 'LAMP / XAMPP Developer', company: 'Bob Studios',
        location: 'Vancouver, BC (Remote)', salary: '$100k – $130k', salary_max: 130000,
        tags: ['LAMP','XAMPP','Backend','Remote'], posted: '5d ago',
        is_featured: false, video_url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        url: 'jobs/lamp-xampp-developer',
        description: 'Work with a legacy LAMP stack and modernize it. You will be responsible for maintaining and improving an existing application. Fully remote, UTC-8 timezone preferred, generous equipment budget and $2k/yr learning stipend.',
      },
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

    get selectedJob() {
      return this.jobs.find(j => j.id === this.expandedJobId) || null;
    },

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
        case 'hybrid':
          return list.sort((a,b) => b.location.toLowerCase().includes('hybrid') - a.location.toLowerCase().includes('hybrid'));
        case 'remote':
          return list.sort((a,b) => b.location.toLowerCase().includes('remote') - a.location.toLowerCase().includes('remote'));
        case 'salary':
          return list.sort((a,b) => (b.salary_max||0) - (a.salary_max||0));
        case 'featured':
          return list.sort((a,b) => b.is_featured - a.is_featured);
        case 'latest': {
          const toMins = s => {
            const n = parseInt(s);
            if (s.includes('h')) return n * 60;
            if (s.includes('d')) return n * 1440;
            return 9999;
          };
          return list.sort((a,b) => toMins(a.posted) - toMins(b.posted));
        }
        default: return list;
      }
    },

    init() {
      try {
        const stored = localStorage.getItem('ny_dev_saved');
        this.savedJobs = stored ? JSON.parse(stored) : [];
      } catch { this.savedJobs = []; }

      window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        this.darkMode = e.matches;
      });

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

    logoColor(c) {
      const palette = [
        '#e8f0fe','#e6f4ea','#fce8e6','#fef7e0',
        '#f1f3f4','#e8eaed','#e4f7fb','#f3e8fd',
      ];
      let h = 0;
      for (const ch of c) h = (Math.imul(h,31) + ch.charCodeAt(0)) | 0;
      return palette[Math.abs(h) % palette.length];
    },
  };
}
</script>
</body>
</html>