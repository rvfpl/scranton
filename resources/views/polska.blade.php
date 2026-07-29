<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polska. — Developer Jobs - sample title</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,
<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'>
  <rect width='32' height='32' rx='6' fill='%230d2a2e'/>
  <rect width='30' height='30' x='1' y='1' rx='6' fill='none' stroke='%2367e8f9' stroke-opacity='0.3'/>
  <text x='50%' y='50%' font-family='sans-serif' font-size='14px' font-weight='600' fill='%2367e8f9' text-anchor='middle' dominant-baseline='middle'>PL</text>
</svg>">
    <style>
        :root {
            --bg-base:     #0e0f11;
            --bg-surface:  #161719;
            --bg-elevated: #1e2023;
            --bg-hover:    #252729;
            --border:       #2a2c2f;
            --border-light: #333538;
            --text-primary:   #f0f0f0;
            --text-secondary: #8b8d93;
            --text-muted:     #555860;
            --accent:        #67e8f9;
            --accent-dim:    rgba(103,232,249,.12);
            --accent-green:  #4ade80;
            --accent-amber:  #fbbf24;
            --accent-purple: #a78bfa;
            --tag-bg:     #1e2023;
            --tag-border: #1c1f27;
            --salary:     #adad69;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'IBM Plex Sans', sans-serif;
            background: var(--bg-base);
            color: var(--text-primary);
            min-height: 100vh;
        }

        [x-cloak] { display: none !important; }

        ::-webkit-scrollbar       { width: 4px; }
        ::-webkit-scrollbar-track { background: var(--bg-base); }
        ::-webkit-scrollbar-thumb { background: var(--border-light); border-radius: 2px; }

        /* ── NAV ── */
        .topnav {
            background: var(--bg-surface);
            border-bottom: 1px solid var(--border);
            position: sticky; top: 0; z-index: 50;
            height: 56px;
        }
        .search-input {
            background: var(--bg-elevated);
            border: 1px solid var(--border);
            color: var(--text-primary);
            font-family: 'IBM Plex Sans', sans-serif;
            font-size: 13px;
            transition: border-color .15s;
        }
        .search-input:focus        { outline: none; border-color: var(--accent); }
        .search-input::placeholder { color: var(--text-muted); }

        .nav-btn {
            padding: 6px 12px; border-radius: 6px; font-size: 13px;
            color: var(--text-secondary); cursor: pointer; transition: all .12s;
            display: flex; align-items: center; gap: 5px;
            border: none; background: none;
        }
        .nav-btn:hover { color: var(--text-primary); background: var(--bg-elevated); }

        .post-btn {
            padding: 7px 14px; border-radius: 6px; font-size: 13px; font-weight: 600;
            background: var(--accent); color: #041a1f;
            border: none; cursor: pointer; transition: opacity .12s;
            font-family: 'IBM Plex Sans', sans-serif;
        }
        .post-btn:hover { opacity: .88; }

        /* ── SIDEBAR ── */
        .sidebar {
            width: 160px; flex-shrink: 0;
            background: var(--bg-surface);
            border-right: 1px solid var(--border);
            height: calc(100vh - 56px);
            position: sticky; top: 56px;
            overflow-y: auto;
        }
        .section-header {
            font-size: 10px; font-weight: 600; letter-spacing: .1em;
            text-transform: uppercase; color: var(--text-muted);
            font-family: 'IBM Plex Mono', monospace;
            padding: 16px 16px 8px;
        }
        .filter-pill {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 5px 10px; border-radius: 6px;
            border: 1px solid var(--tag-border); background: var(--tag-bg);
            color: var(--text-secondary); font-size: 12px;
            font-family: 'IBM Plex Mono', monospace;
            cursor: pointer; transition: all .12s; white-space: nowrap;
        }
        .filter-pill:hover  { border-color: var(--border-light); color: var(--text-primary); background: var(--bg-hover); }
        .filter-pill.active { border-color: var(--accent); color: var(--accent); background: var(--accent-dim); }

        .sort-tab {
            padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 500;
            cursor: pointer; border: 1px solid transparent;
            color: var(--text-secondary); transition: all .12s; background: none;
        }
        .sort-tab:hover  { color: var(--text-primary); }
        .sort-tab.active { border-color: var(--border-light); color: var(--text-primary); background: var(--bg-elevated); }

        /* ── JOB CARDS ── */
        .job-card {
            background: var(--bg-surface); border: 1px solid var(--border);
            border-radius: 10px; padding: 16px;
            cursor: pointer; transition: border-color .15s, background .15s;
            position: relative;
        }
        .job-card:hover { border-color: var(--border-light); background: var(--bg-elevated); }
        .job-card.featured::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
            background: linear-gradient(90deg, var(--accent), transparent);
            border-radius: 10px 10px 0 0;
        }
        .job-card.has-video { border-color: rgba(167,139,250,.2); }
        .job-card.selected  { border-color: var(--accent) !important; background: var(--bg-elevated); }

        @media (min-width: 1280px) {
            .job-card.selected::after {
                content: ''; position: absolute; top: 50%; right: -1px;
                transform: translateY(-50%);
                width: 3px; height: 40px;
                background: var(--accent); border-radius: 0 3px 3px 0;
            }
        }

        /* ── BADGES / TAGS ── */
        .company-logo {
            width: 44px; height: 44px; border-radius: 8px;
            background: var(--bg-elevated); border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            font-family: 'IBM Plex Mono', monospace; font-size: 13px; font-weight: 600;
            color: var(--text-secondary); flex-shrink: 0;
        }
        .tech-tag {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 3px 8px; border-radius: 4px;
            border: 1px solid var(--tag-border); background: var(--tag-bg);
            color: var(--text-secondary); font-size: 11px;
            font-family: 'IBM Plex Mono', monospace;
            cursor: pointer; transition: all .12s;
        }
        .tech-tag:hover { border-color: var(--border-light); color: var(--text-primary); }

        .badge-featured { padding: 2px 7px; border-radius: 4px; font-size: 10px; font-weight: 600; font-family: 'IBM Plex Mono', monospace; background: var(--accent-dim); color: var(--accent); border: 1px solid rgba(103,232,249,.2); }
        .badge-remote   { padding: 2px 7px; border-radius: 4px; font-size: 10px; font-weight: 600; font-family: 'IBM Plex Mono', monospace; background: rgba(74,222,128,.1); color: var(--accent-green); border: 1px solid rgba(74,222,128,.2); }
        .badge-video    { padding: 2px 7px; border-radius: 4px; font-size: 10px; font-weight: 600; font-family: 'IBM Plex Mono', monospace; background: rgba(167,139,250,.1); color: var(--accent-purple); border: 1px solid rgba(167,139,250,.2); }

        .salary-text { font-family: 'IBM Plex Mono', monospace; font-size: 13px; color: var(--salary); font-weight: 500; }

        .save-btn {
            width: 32px; height: 32px; border-radius: 6px;
            border: 1px solid var(--border); background: transparent;
            color: var(--text-muted);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; transition: all .12s; flex-shrink: 0;
        }
        .save-btn:hover { border-color: var(--border-light); color: var(--text-primary); }
        .save-btn.saved { border-color: rgba(251,191,36,.4); color: var(--accent-amber); background: rgba(251,191,36,.08); }

        .meta-dot::before { content: '·'; margin: 0 6px; color: var(--text-muted); }

        /* ── VIDEO (panel / sheet only) ── */
        .video-wrapper {
            width: 100%; aspect-ratio: 16/9;
            border-radius: 8px; overflow: hidden;
            border: 1px solid var(--border);
            background: #000; position: relative;
        }
        .video-play-overlay {
            position: absolute; inset: 0; z-index: 10;
            cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            background: rgba(0,0,0,.4); border-radius: 8px;
            transition: background .15s;
        }
        .video-play-overlay:hover { background: rgba(0,0,0,.55); }
        .play-btn-circle {
            width: 48px; height: 48px; border-radius: 50%;
            background: rgba(0,0,0,.7);
            border: 2px solid rgba(255,255,255,.15);
            display: flex; align-items: center; justify-content: center;
        }

        /* Admin promo block in empty panel */
        .promo-video-wrap {
            width: 100%; aspect-ratio: 16/9;
            border-radius: 8px; overflow: hidden;
            border: 1px solid rgba(103,232,249,.15);
            background: #000; position: relative;
            margin-bottom: 16px;
        }
        .promo-label {
            font-size: 10px; font-weight: 600; letter-spacing: .1em;
            text-transform: uppercase; color: var(--accent);
            font-family: 'IBM Plex Mono', monospace;
            margin-bottom: 8px;
            display: flex; align-items: center; gap: 6px;
        }
        .promo-label::before {
            content: '';
            display: inline-block; width: 6px; height: 6px;
            border-radius: 50%; background: var(--accent);
            animation: pulse 2s ease-in-out infinite;
        }
        @keyframes pulse {
            0%,100% { opacity: 1; } 50% { opacity: .3; }
        }

        .empty-state { text-align: center; padding: 60px 20px; color: var(--text-muted); font-family: 'IBM Plex Mono', monospace; }

        /* ── DESKTOP DETAIL PANEL ── */
        .detail-panel {
            background: var(--bg-surface); border: 1px solid var(--border);
            border-radius: 10px; overflow: hidden;
            transition: border-color .15s;
            position: sticky; top: 72px;
            max-height: calc(100vh - 88px); overflow-y: auto;
        }
        .detail-panel.has-content { border-color: rgba(103,232,249,.2); }
        .detail-panel-bar { height: 3px; background: linear-gradient(90deg, var(--accent), var(--accent-purple)); opacity: 0; transition: opacity .2s; }
        .detail-panel.has-content .detail-panel-bar { opacity: 1; }

        .apply-btn {
            padding: 10px 20px; border-radius: 8px; font-size: 14px; font-weight: 600;
            background: var(--accent); color: #041a1f;
            border: none; cursor: pointer; transition: opacity .15s;
            font-family: 'IBM Plex Sans', sans-serif;
            display: inline-flex; align-items: center; gap: 8px;
            text-decoration: none;
        }
        .apply-btn:hover { opacity: .88; }

        .detail-tag {
            display: inline-flex; align-items: center;
            padding: 4px 10px; border-radius: 4px;
            border: 1px solid var(--tag-border); background: var(--tag-bg);
            color: var(--text-secondary); font-size: 12px;
            font-family: 'IBM Plex Mono', monospace;
        }

        /* ── MOBILE BOTTOM SHEET ── */
        .mobile-backdrop {
            position: fixed; inset: 0; z-index: 200;
            background: rgba(0,0,0,.7); backdrop-filter: blur(2px);
            transition: opacity .25s ease;
        }
        .mobile-sheet {
            position: fixed; left: 0; right: 0; bottom: 0; z-index: 201;
            background: var(--bg-surface);
            border-radius: 16px 16px 0 0; border-top: 1px solid var(--border-light);
            max-height: 92dvh; overflow-y: auto;
            transform: translateY(0);
            transition: transform .3s cubic-bezier(.32,0,.67,0);
        }
        .mobile-sheet.entering { transform: translateY(100%); }
        .sheet-bar    { height: 3px; background: linear-gradient(90deg, var(--accent), var(--accent-purple)); border-radius: 16px 16px 0 0; }
        .sheet-handle { width: 40px; height: 4px; border-radius: 2px; background: var(--border-light); margin: 12px auto 4px; }

        /* ── SIDEBAR MOBILE ── */
        @media (max-width: 768px) {
            .sidebar { display: none; }
            .sidebar.mobile-open {
                display: block !important;
                position: fixed; top: 56px; left: 0; z-index: 300;
                height: calc(100vh - 56px);
                box-shadow: 10px 0 20px rgba(0,0,0,.5);
            }
        }

        .footer-link { color: var(--text-muted); text-decoration: none; transition: color .12s; font-family: 'IBM Plex Mono', monospace; font-size: 12px; }
        .footer-link:hover { color: var(--text-primary); }
    </style>
</head>
<body>

<div x-data="jobBoard()" x-init="init()" @keydown.escape.window="closeDetail()">

    <!-- ══════════════════════════════ NAV ══════════════════════════════ -->
    <nav class="topnav">
        <div class="flex items-center justify-between h-full px-4 gap-3" style="max-width:1920px;margin:0 auto">
            <a href="/" class="flex items-center gap-2 flex-shrink-0">
                <div style="background:#0d2a2e;border:1px solid rgba(103,232,249,.3);width:32px;height:32px;border-radius:6px;display:flex;align-items:center;justify-content:center">
                    <span style="font-family:'IBM Plex Mono',monospace;font-size:10px;font-weight:600;color:var(--accent)">NY</span>
                </div>
                <span style="font-family:'IBM Plex Mono',monospace;font-size:12px;font-weight:600">
                    <span style="color:var(--accent)">.</span>dev
                </span>
            </a>

            <div class="relative flex-1 max-w-md">
                <input type="text" x-model="search" placeholder="Search jobs, companies, tech…"
                       class="search-input w-full rounded-lg px-4 py-2 pl-9">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4" style="color:var(--text-muted)"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>

            <div class="hidden md:flex items-center gap-1">
                <button class="nav-btn">For Candidates <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg></button>
                <button class="nav-btn">For Employers  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg></button>
            </div>

            <div class="flex items-center gap-2">
                <button class="post-btn hidden sm:block">++ Post Job</button>
                <button class="save-btn" style="width:auto;padding:6px 10px;gap:5px;border-radius:6px">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    <span x-show="savedJobs.length > 0" x-text="savedJobs.length"
                          style="font-size:11px;font-family:'IBM Plex Mono',monospace;color:var(--accent-amber)"></span>
                </button>
                <button class="nav-btn md:hidden" @click="mobileSidebar = !mobileSidebar">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- ══════════════════════════════ LAYOUT ══════════════════════════════ -->
    <div class="flex">

        <!-- SIDEBAR -->
        <aside :class="mobileSidebar ? 'sidebar mobile-open' : 'sidebar'"
               x-show="mobileSidebar || _isDesktop"
               @click.away="if (!_isDesktop) mobileSidebar = false"
               x-cloak>

            <div class="section-header flex justify-between items-center">
                <span>Specializations ¢</span>
                <span class="hover:text-teal-500 cursor-pointer md:hidden" @click="mobileSidebar = false">[X]</span>
            </div>

            <div class="px-3 pb-4">
                <a href="/post-job" class="filter-pill w-full flex items-center"
                   style="border-radius:6px;font-size:11px;padding:6px 12px;" class="border-teal;color:#aaa; bg-[rgba(103,232,249,.08)]  hover:bg-teal-300">
                    + Post Job
                </a>
            </div>

            <div class="px-3 pb-2 flex flex-col gap-1">
                <template x-for="spec in specializations" :key="spec.key">
                    <button @click="toggleFilter(spec.key)"
                            :class="activeFilters.includes(spec.key) ? 'active' : ''"
                            class="filter-pill justify-start w-full text-left"
                            style="border-radius:6px">
                        <span x-text="spec.icon" style="font-size:11px;width:16px;text-align:center"></span>
                        <span x-text="spec.label"></span>
                        <span x-show="activeFilters.includes(spec.key)" style="margin-left:auto;font-size:9px">✕</span>
                    </button>
                </template>
            </div>

            <div style="height:1px;background:var(--border);margin:5px 0"></div>
            <div class="px-3 py-2">
                <button x-show="activeFilters.length > 0" @click="activeFilters = []"
                        class="filter-pill w-full justify-center"
                        style="border-radius:6px;color:#f87171;border-color:rgba(248,113,113,.2)">
                    Clear filters
                </button>
            </div>

            <div class="section-header mt-1">Stats</div>
            <div class="px-4 pb-4 flex flex-col gap-2">
                <div class="flex justify-between">
                    <span style="font-size:12px;color:var(--text-secondary)">Total</span>
                    <span style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--accent)" x-text="jobs.length"></span>
                </div>
                <div class="flex justify-between">
                    <span style="font-size:12px;color:var(--text-secondary)">Matching</span>
                    <span style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--text-primary)" x-text="filteredJobs.length"></span>
                </div>
                <div class="flex justify-between">
                    <span style="font-size:12px;color:var(--text-secondary)">With Video</span>
                    <span style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--accent-purple)" x-text="jobs.filter(j=>j.video_url).length"></span>
                </div>
                <div class="flex justify-between">
                    <span style="font-size:12px;color:var(--text-secondary)">Saved</span>
                    <span style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--accent-amber)" x-text="savedJobs.length"></span>
                </div>
            </div>

            <div class="px-4 pb-4 flex flex-col gap-2">
                <span style="font-size:12px;color:var(--text-secondary)">For Candidates</span>
                <span style="font-size:12px;color:var(--text-secondary)">For Employers</span>
            </div>
        </aside>

        <!-- MAIN -->
        <main class="flex-1 min-w-0 p-2 md:p-8">

            <!-- SORT TABS -->
            <div class="flex items-center justify-between mb-4 flex-wrap gap-1">
                <div class="flex items-center gap-1">
                    <button @click="activeSort='featured'" :class="activeSort==='featured'?'active':''" class="sort-tab">Featured</button>
                    <button @click="activeSort='remote'"   :class="activeSort==='remote'  ?'active':''" class="sort-tab">Remote</button>
                    <button @click="activeSort='hybrid'"   :class="activeSort==='hybrid'  ?'active':''" class="sort-tab">Hybrid</button>
                    <button @click="activeSort='latest'"   :class="activeSort==='latest'  ?'active':''" class="sort-tab">Latest</button>
                    <button @click="activeSort='salary'"   :class="activeSort==='salary'  ?'active':''" class="sort-tab">HighPay</button>
                </div>
                <div style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--text-muted)">
                    <span x-text="filteredJobs.length"></span> offers
                </div>
            </div>

            <!-- ACTIVE FILTER PILLS -->
            <div x-show="activeFilters.length > 0" class="flex flex-wrap gap-2 mb-4">
                <template x-for="f in activeFilters" :key="f">
                    <span class="filter-pill active" @click="toggleFilter(f)">
                        <span x-text="specializations.find(s=>s.key===f)?.label || f"></span>
                        <span style="font-size:9px;margin-left:2px">✕</span>
                    </span>
                </template>
            </div>

            <!-- ══════════════ TWO-COL GRID ══════════════ -->
            <div class="grid grid-cols-1 xl:grid-cols-6 gap-4">

                <!-- JOB CARD LIST -->
                <div class="flex flex-col gap-2 xl:col-span-4">

                    <template x-for="job in filteredJobs" :key="job.id">
                        <div class="job-card"
                             :class="[job.is_featured?'featured':'', job.video_url?'has-video':'', expandedJobId===job.id?'selected':'']"
                             @click="selectJob(job.id)">

                            <div class="flex gap-3 items-start">

                                <!-- LOGO + BADGES -->
                                <div class="flex flex-col items-center flex-shrink-0 w-8 gap-3 md:w-12">
                                    <div class="company-logo" :style="'background:'+logoColor(job.company)"
                                         x-text="initials(job.company)"></div>
                                    <div class="flex flex-col items-center gap-1 w-full">
                                        <span x-show="job.is_featured" class="badge-featured" style="font-size:9px;padding:1px 4px">feat.</span>
                                        <span x-show="job.location && job.location.includes('Remote')" class="badge-remote" style="font-size:9px;padding:1px 4px">rem</span>
                                        <span x-show="job.video_url" class="badge-video" style="font-size:9px;padding:1px 4px">▶ vid</span>
                                    </div>
                                </div>

                                <!-- CARD CONTENT -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between gap-2 mb-1">
                                        <h3 style="font-size:15px;font-weight:600;color:var(--text-primary);line-height:1.3"
                                            x-text="job.title"></h3>
                                        <div class="flex items-center gap-2 flex-shrink-0" @click.stop>
                                            <span class="salary-text hidden sm:inline" x-show="job.salary" x-text="job.salary"></span>
                                            <button class="save-btn" :class="isSaved(job.id)?'saved':''" @click="toggleSave(job.id)">
                                                <svg class="w-4 h-4" :fill="isSaved(job.id)?'currentColor':'none'" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Salary mobile -->
                                    <div class="sm:hidden mb-1" x-show="job.salary">
                                        <span class="salary-text" x-text="job.salary"></span>
                                    </div>

                                    <!-- Meta -->
                                    <div class="flex flex-wrap items-center mb-3"
                                         style="font-size:12px;color:var(--text-secondary)">
                                        <svg class="w-3 h-3 mr-1" style="color:var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                        <span x-text="job.company"></span>
                                        <span class="meta-dot"></span>
                                        <svg class="w-3 h-3 mr-1" style="color:var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        </svg>
                                        <span x-text="job.location"></span>
                                        <span class="meta-dot"></span>
                                        <span x-text="job.posted" style="color:var(--text-muted)"></span>
                                    </div>

                                    <!-- Tags -->
                                    <div class="flex flex-wrap gap-1.5" @click.stop>
                                        <template x-for="tag in (job.tags||[]).slice(0,5)" :key="tag">
                                            <span class="tech-tag"
                                                  :style="activeFilters.includes(tag)?'border-color:var(--accent);color:var(--accent);background:var(--accent-dim)':''"
                                                  @click="toggleFilter(tag)"
                                                  x-text="tag"></span>
                                        </template>
                                    </div>
                                </div>
                                <!-- No video thumbnails on cards — videos live in panel/sheet only -->
                            </div>
                        </div>
                    </template>

                    <div x-show="filteredJobs.length === 0" class="empty-state">
                        <div style="font-size:28px;margin-bottom:12px;font-family:'IBM Plex Mono',monospace">[ ]</div>
                        <div style="font-size:14px;color:var(--text-secondary);margin-bottom:8px">No matching jobs found</div>
                        <button @click="search=''; activeFilters=[]" class="filter-pill" style="border-radius:6px;margin:0 auto">Reset filters</button>
                    </div>
                </div><!-- /card list -->

                <!-- ══════ DESKTOP DETAIL PANEL (xl only) ══════ -->
                <div class="hidden xl:block xl:col-span-2">
                    <div class="detail-panel" :class="selectedJob ? 'has-content' : ''">
                        <div class="detail-panel-bar"></div>

                        <!-- ── EMPTY STATE: admin promo ── -->
                        <template x-if="!selectedJob">
                            <div class="p-5">
                                <div class="promo-label">Now hiring on .orks.pl</div>
                                <div class="promo-video-wrap">
                                    <!-- Overlay shown until user clicks play -->
                                    <div class="video-play-overlay"
                                         x-show="!promoPlaying"
                                         @click="promoPlaying = true"
                                         style="background:rgba(4,26,31,.85)">
                                        <div style="text-align:center">
                                            <div class="play-btn-circle" style="margin:0 auto 10px">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="white"><path d="M8 5v14l11-7z"/></svg>
                                            </div>
                                            <p style="font-family:'IBM Plex Mono',monospace;font-size:10px;color:var(--accent);letter-spacing:.05em">Watch intro</p>
                                        </div>
                                    </div>
                                    <iframe
                                        :src="promoPlaying ? promoVideoUrl + '?autoplay=1' : 'about:blank'"
                                        loading="lazy"
                                        class="w-full h-full"
                                        style="border-radius:8px"
                                        frameborder="0"
                                        allow="autoplay;fullscreen"
                                        allowfullscreen></iframe>
                                </div>
                                <p style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--text-muted);line-height:1.7;margin-bottom:4px">
                                    Post a job and reach 12,000+ Polish developers actively looking.
                                </p>
                                <p style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--text-muted);line-height:1.7">
                                    ← Select any listing to preview full details here.
                                </p>
                            </div>
                        </template>

                        <!-- ── JOB DETAIL ── -->
                        <template x-if="selectedJob">
                            <div class="p-5">
                                <!-- Header -->
                                <div class="flex items-start gap-3 mb-4">
                                    <div class="company-logo flex-shrink-0"
                                         :style="'background:'+logoColor(selectedJob.company)"
                                         x-text="initials(selectedJob.company)"></div>
                                    <div class="flex-1 min-w-0">
                                        <h2 style="font-size:16px;font-weight:700;color:var(--text-primary);line-height:1.3;margin-bottom:3px"
                                            x-text="selectedJob.title"></h2>
                                        <p style="font-size:13px;color:var(--text-secondary)" x-text="selectedJob.company"></p>
                                    </div>
                                    <button @click.stop="closeDetail()" class="save-btn flex-shrink-0" title="Close">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>

                                <!-- Meta -->
                                <div class="flex flex-wrap gap-x-4 gap-y-1 mb-4" style="font-size:12px;color:var(--text-secondary)">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3 h-3" style="color:var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                        <span x-text="selectedJob.location"></span>
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3 h-3" style="color:var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span x-text="'Posted ' + selectedJob.posted"></span>
                                    </span>
                                </div>

                                <!-- Salary -->
                                <div x-show="selectedJob.salary" class="mb-4">
                                    <span class="salary-text" style="font-size:15px" x-text="selectedJob.salary"></span>
                                    <span style="font-size:11px;color:var(--text-muted);font-family:'IBM Plex Mono',monospace;margin-left:6px">/ year</span>
                                </div>

                                <!--
                                    VIDEO — panel version.
                                    x-if destroys & recreates the iframe every time selectedJob changes,
                                    so there is never a stale/paused video carrying over.
                                    videoPlaying is reset to false in selectJob(), so the overlay
                                    always appears first — user must explicitly press play each visit.
                                -->
                                <template x-if="selectedJob.video_url">
                                    <div class="mb-5" @click.stop>
                                        <p style="font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--text-muted);font-family:'IBM Plex Mono',monospace;margin-bottom:8px">
                                            Hiring manager intro
                                        </p>
                                        <div class="video-wrapper">
                                            <div class="video-play-overlay"
                                                 x-show="!videoPlaying"
                                                 @click.stop="startVideo()">
                                                <div class="play-btn-circle">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="white"><path d="M8 5v14l11-7z"/></svg>
                                                </div>
                                            </div>
                                            <!--
                                                src is either the real URL with autoplay, or about:blank.
                                                Switching back to about:blank (on job deselect via x-if destroy)
                                                immediately stops the iframe — no lingering audio.
                                            -->
                                            <iframe
                                                :src="videoPlaying ? selectedJob.video_url + '?autoplay=1' : 'about:blank'"
                                                loading="lazy"
                                                class="w-full h-full"
                                                style="border-radius:8px"
                                                frameborder="0"
                                                allow="autoplay;fullscreen"
                                                allowfullscreen
                                                @click.stop></iframe>
                                        </div>
                                    </div>
                                </template>

                                <div style="height:1px;background:var(--border);margin-bottom:16px"></div>

                                <!-- Description -->
                                <div class="mb-5">
                                    <p style="font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--text-muted);font-family:'IBM Plex Mono',monospace;margin-bottom:10px">About the role</p>
                                    <p style="font-size:13px;color:var(--text-secondary);line-height:1.7" x-text="selectedJob.description"></p>
                                </div>

                                <!-- Tags -->
                                <div class="mb-5">
                                    <p style="font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--text-muted);font-family:'IBM Plex Mono',monospace;margin-bottom:8px">Tech stack</p>
                                    <div class="flex flex-wrap gap-1.5">
                                        <template x-for="tag in (selectedJob.tags||[])" :key="tag">
                                            <span class="detail-tag" x-text="tag"></span>
                                        </template>
                                    </div>
                                </div>

                                <div style="height:1px;background:var(--border);margin-bottom:16px"></div>

                                <!-- Actions -->
                                <div class="flex items-center gap-3">
                                    <a :href="selectedJob.url" class="apply-btn" @click.stop>
                                        Apply Now
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                    </a>
                                    <button class="save-btn"
                                            :class="isSaved(selectedJob.id)?'saved':''"
                                            @click.stop="toggleSave(selectedJob.id)"
                                            style="width:auto;padding:0 14px;gap:6px;height:40px;border-radius:8px;font-size:13px;color:var(--text-secondary)">
                                        <svg class="w-4 h-4" :fill="isSaved(selectedJob.id)?'currentColor':'none'" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                        <span x-text="isSaved(selectedJob.id)?'Saved':'Save'"></span>
                                    </button>
                                </div>
                            </div>
                        </template>

                    </div>
                </div><!-- /xl col -->

            </div><!-- /grid -->
        </main>
    </div><!-- /layout flex -->

    <!-- ════════════════ MOBILE BOTTOM SHEET (< xl) ════════════════ -->
    <div class="mobile-backdrop xl:hidden"
         x-show="expandedJobId !== null && sheetVisible"
         x-cloak
         :style="sheetVisible ? 'opacity:1' : 'opacity:0'"
         @click="closeDetail()"></div>

    <div class="mobile-sheet xl:hidden"
         x-show="expandedJobId !== null"
         x-cloak
         :class="sheetVisible ? '' : 'entering'"
         @click.stop>

        <div class="sheet-bar"></div>
        <div class="sheet-handle"></div>

        <template x-if="selectedJob">
            <div class="px-5 pb-8 pt-2">

                <!-- Header -->
                <div class="flex items-start gap-3 mb-4">
                    <div class="company-logo flex-shrink-0"
                         :style="'background:'+logoColor(selectedJob.company)"
                         x-text="initials(selectedJob.company)"></div>
                    <div class="flex-1 min-w-0">
                        <h2 style="font-size:17px;font-weight:700;color:var(--text-primary);line-height:1.3;margin-bottom:2px"
                            x-text="selectedJob.title"></h2>
                        <p style="font-size:13px;color:var(--text-secondary)" x-text="selectedJob.company"></p>
                    </div>
                    <button @click="closeDetail()" class="save-btn flex-shrink-0" title="Close">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Meta -->
                <div class="flex flex-wrap gap-x-4 gap-y-1 mb-3" style="font-size:12px;color:var(--text-secondary)">
                    <span class="flex items-center gap-1">
                        <svg class="w-3 h-3" style="color:var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        <span x-text="selectedJob.location"></span>
                    </span>
                    <span class="flex items-center gap-1">
                        <svg class="w-3 h-3" style="color:var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span x-text="'Posted ' + selectedJob.posted"></span>
                    </span>
                </div>

                <!-- Salary -->
                <div x-show="selectedJob.salary" class="mb-4">
                    <span class="salary-text" style="font-size:16px" x-text="selectedJob.salary"></span>
                    <span style="font-size:11px;color:var(--text-muted);font-family:'IBM Plex Mono',monospace;margin-left:6px">/ year</span>
                </div>

                <!--
                    VIDEO — sheet version.
                    Same x-if pattern as the panel: destroyed on close, recreated on open.
                    videoPlaying is reset on every selectJob() call, so the overlay always
                    appears first. One video playing at a time is guaranteed because only
                    one sheet or panel can be open simultaneously.
                -->
                <template x-if="selectedJob.video_url">
                    <div class="mb-5" @click.stop>
                        <p style="font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--text-muted);font-family:'IBM Plex Mono',monospace;margin-bottom:8px">
                            Hiring manager intro
                        </p>
                        <div class="video-wrapper">
                            <div class="video-play-overlay"
                                 x-show="!videoPlaying"
                                 @click.stop="startVideo()">
                                <div class="play-btn-circle">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="white"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                            <iframe
                                :src="videoPlaying ? selectedJob.video_url + '?autoplay=1' : 'about:blank'"
                                loading="lazy"
                                class="w-full h-full"
                                style="border-radius:8px"
                                frameborder="0"
                                allow="autoplay;fullscreen"
                                allowfullscreen
                                @click.stop></iframe>
                        </div>
                    </div>
                </template>

                <div style="height:1px;background:var(--border);margin-bottom:16px"></div>

                <!-- Description -->
                <div class="mb-5">
                    <p style="font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--text-muted);font-family:'IBM Plex Mono',monospace;margin-bottom:10px">About the role</p>
                    <p style="font-size:14px;color:var(--text-secondary);line-height:1.75" x-text="selectedJob.description"></p>
                </div>

                <!-- Tags -->
                <div class="mb-6">
                    <p style="font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--text-muted);font-family:'IBM Plex Mono',monospace;margin-bottom:8px">Tech stack</p>
                    <div class="flex flex-wrap gap-1.5">
                        <template x-for="tag in (selectedJob.tags||[])" :key="tag">
                            <span class="detail-tag" x-text="tag"></span>
                        </template>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-3">
                    <a :href="selectedJob.url" class="apply-btn flex-1 justify-center" @click.stop>
                        Apply Now
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <button class="save-btn"
                            :class="isSaved(selectedJob.id)?'saved':''"
                            @click="toggleSave(selectedJob.id)"
                            style="width:auto;padding:0 16px;gap:6px;height:44px;border-radius:8px;font-size:13px;color:var(--text-secondary)">
                        <svg class="w-4 h-4" :fill="isSaved(selectedJob.id)?'currentColor':'none'" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        <span x-text="isSaved(selectedJob.id)?'Saved':'Save'"></span>
                    </button>
                </div>

            </div>
        </template>
    </div><!-- /mobile sheet -->

    <!-- FOOTER -->
    <footer style="border-top:1px solid var(--border);background:var(--bg-surface);padding:16px 24px;margin-top:auto">
        <div style="font-size:12px;color:var(--text-muted);font-family:'IBM Plex Mono',monospace;display:flex;justify-content:space-between;flex-wrap:wrap;gap:8px">
            <span>© 2026 .orks.pl — developer jobs</span>
            <div style="display:flex;gap:16px">
                <a href="#" class="footer-link">About</a>
                <a href="#" class="footer-link">API</a>
                <a href="/post-job" class="footer-link">Post a Job</a>
            </div>
        </div>
    </footer>

</div><!-- /x-data root -->

<script>
function jobBoard() {
    return {
        /* ── viewport ── */
        _isDesktop: window.innerWidth >= 1280,

        /* ── UI state ── */
        savedJobs:     [],
        activeFilters: [],
        activeSort:    'featured',
        search:        '',
        mobileSidebar: false,
        expandedJobId: null,
        sheetVisible:  false,

        /*
         * VIDEO STATE — single source of truth.
         *
         * videoPlaying: whether the job video in the currently open panel/sheet
         *               is playing. Reset to false on every selectJob() call.
         *               There is only ever ONE panel or sheet open, so this one
         *               boolean covers both contexts — no parallel playback possible.
         *
         * promoPlaying: the admin promo in the empty-state panel. Separate flag
         *               because it lives outside the job selection lifecycle.
         *               It stops naturally when any job is selected (x-if destroys
         *               the promo template and sets its iframe src to about:blank).
         */
        videoPlaying: false,
        promoPlaying:  false,

        /* ── admin promo — swap this URL in the blade/controller as needed ── */
        promoVideoUrl: 'https://www.youtube.com/embed/dQw4w9WgXcQ',

        /* ── data ── */
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
            { key: 'HasVideo',  label: 'Has Video', icon: '▶' },
            { key: 'Backend',   label: 'Backend',   icon: '⬡' },
            { key: 'Frontend',  label: 'Frontend',  icon: '◈' },
            { key: 'DevOps',    label: 'DevOps',    icon: '⟳' },
            { key: 'Senior',    label: 'Senior',    icon: '★' },
            { key: 'React',     label: 'React',     icon: '⚛' },
            { key: 'Laravel',   label: 'Laravel',   icon: '▲' },
            { key: 'PHP',       label: 'PHP',       icon: '⬡' },
            { key: 'Remote',    label: 'Remote',    icon: '⌂' },
            { key: 'Hybrid',    label: 'Hybrid',    icon: '⇌' },
        ],

        /* ── computed ── */
        get selectedJob() {
            return this.jobs.find(j => j.id === this.expandedJobId) || null;
        },

        get filteredJobs() {
            let list = this.jobs.filter(job => {
                const s  = this.search.toLowerCase();
                const ms = !s
                    || job.title.toLowerCase().includes(s)
                    || job.company.toLowerCase().includes(s)
                    || (job.tags || []).some(t => t.toLowerCase().includes(s));
                const mf = this.activeFilters.length === 0
                    || this.activeFilters.every(f => {
                        if (f === 'HasVideo') return !!job.video_url;
                        return (job.tags || []).includes(f);
                    });
                return ms && mf;
            });

            switch (this.activeSort) {
                case 'hybrid':
                    return list.sort((a,b) =>
                        b.location.toLowerCase().includes('hybrid') - a.location.toLowerCase().includes('hybrid'));
                case 'remote':
                    return list.sort((a,b) =>
                        b.location.toLowerCase().includes('remote') - a.location.toLowerCase().includes('remote'));
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

        /* ── lifecycle ── */
        init() {
            try {
                const stored = localStorage.getItem('orks_saved');
                this.savedJobs = stored ? JSON.parse(stored) : [];
            } catch { this.savedJobs = []; }

            window.addEventListener('resize', () => {
                const wasDesktop = this._isDesktop;
                this._isDesktop = window.innerWidth >= 1280;
                if (!wasDesktop && this._isDesktop && this.expandedJobId !== null) {
                    document.body.style.overflow = '';
                    this.sheetVisible = false;
                }
            }, { passive: true });
        },

        /* ── actions ── */
        selectJob(id) {
            if (this.expandedJobId === id) { this.closeDetail(); return; }

            /*
             * Always reset videoPlaying to false before switching jobs.
             * This ensures:
             *  1. The play overlay reappears on every job visit.
             *  2. The iframe src stays 'about:blank' until the user clicks play,
             *     so no video starts loading — or playing — without intent.
             *  3. Since x-if on the video template destroys the old iframe when
             *     selectedJob changes, any in-progress video is hard-stopped.
             */
            this.videoPlaying = false;

            /*
             * Stop the promo video when a job is selected.
             * Setting promoPlaying=false swaps the promo iframe src to about:blank,
             * which stops playback immediately (YouTube honours src removal).
             * The promo template itself is destroyed by x-if once selectedJob is set.
             */
            this.promoPlaying = false;

            this.expandedJobId = id;

            if (!this._isDesktop) {
                this.sheetVisible = false;
                this.$nextTick(() => { this.sheetVisible = true; });
                document.body.style.overflow = 'hidden';
            }
        },

        closeDetail() {
            /*
             * Stop any playing video before closing.
             * videoPlaying=false → iframe src → about:blank → YouTube stops.
             * x-if then destroys the iframe node on the next tick.
             */
            this.videoPlaying = false;
            document.body.style.overflow = '';

            if (!this._isDesktop) {
                this.sheetVisible = false;
                setTimeout(() => { this.expandedJobId = null; }, 280);
            } else {
                this.expandedJobId = null;
            }
        },

        /*
         * startVideo() is the single entry point for playing any job video.
         * It sets videoPlaying=true which binds the real URL into the iframe src.
         * Called from both the panel and the sheet — same flag, same iframe swap.
         */
        startVideo() {
            this.videoPlaying = true;
        },

        toggleFilter(k) {
            this.activeFilters.includes(k)
                ? this.activeFilters = this.activeFilters.filter(f => f !== k)
                : this.activeFilters.push(k);
        },

        toggleSave(id) {
            this.savedJobs = this.savedJobs.includes(id)
                ? this.savedJobs.filter(j => j !== id)
                : [...this.savedJobs, id];
            try { localStorage.setItem('orks_saved', JSON.stringify(this.savedJobs)); } catch {}
        },

        isSaved(id)  { return this.savedJobs.includes(id); },
        initials(c)  { return c.split(' ').slice(0,2).map(w => w[0]).join('').toUpperCase(); },

        logoColor(c) {
            const palette = [
                '#1e3a5f','#1a3a2a','#2a1a3a','#3a2a1a',
                '#1a2a3a','#2a1a1a','#1a3a3a','#3a1a2a',
            ];
            let h = 0;
            for (const ch of c) h = (Math.imul(h, 31) + ch.charCodeAt(0)) | 0;
            return palette[Math.abs(h) % palette.length];
        },
    };
}
</script>

</body>
</html>