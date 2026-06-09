
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newyork.dev — NewYork Developer Jobs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,
<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'>
  <rect width='32' height='32' rx='6' fill='%230d2a2e'/>
  <rect width='30' height='30' x='1' y='1' rx='6' fill='none' stroke='%2367e8f9' stroke-opacity='0.3'/>
  <text x='50%' y='50%' font-family='sans-serif' font-size='14px' font-weight='600' fill='%2367e8f9' text-anchor='middle' dominant-baseline='middle'>BETA</text>
</svg>">
   <style>


.video-wrapper {
    position: relative;
    width: 100%;
    aspect-ratio: 16/9;

    overflow: hidden;
    border-radius: 16px;

    background: #000;

    isolation: isolate;
}

.video-wrapper iframe {
    position: absolute;
    inset: 0;

    width: 100%;
    height: 100%;

    border: 0;

    z-index: 1;
}

.video-play-overlay {
    position: absolute;
    inset: 0;

    display: flex !important;
    align-items: center;
    justify-content: center;

    background: rgba(0,0,0,.45);

    z-index: 50;

    cursor: pointer;

    transition: background .2s ease;
}

.video-play-overlay:hover {
    background: rgba(0,0,0,.60);
}

.play-btn-circle {
    width: 64px;
    height: 64px;

    border-radius: 999px;

    background: rgba(255,255,255,.95);

    display: flex;
    align-items: center;
    justify-content: center;

    box-shadow:
        0 10px 30px rgba(0,0,0,.25);
}



:root {

    /* Base */
    --bg: #f8f8fb;
    --surface: #ffffff;
    --surface-alt: #f3f4f8;

    /* Text */
    --text-primary: #171717;
    --text-secondary: #6b7280;
    --text-muted: #9ca3af;

    /* Borders */
    --border: #e5e7eb;
    --border-hover: #d1d5db;

    /* Brand */
    --accent: #7c3aed;
    --accent-dark: #6d28d9;
    --accent-soft: #f3e8ff;

    /* Status */
    --success: #10b981;
    --warning: #f59e0b;

    /* Misc */
    --salary: #7c3aed;

    /* Shadows */
    --shadow-sm:
        0 1px 2px rgba(0,0,0,.04);

    --shadow-md:
        0 8px 24px rgba(0,0,0,.06);

    --shadow-lg:
        0 20px 50px rgba(0,0,0,.08);

    --shadow-purple:
        0 12px 32px rgba(124,58,237,.15);
}

/* ------------------------------------------------ */
/* RESET */
/* ------------------------------------------------ */

*,
*::before,
*::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

[x-cloak] {
    display: none !important;
}

body {

    font-family: 'Inter', sans-serif;

    min-height: 100vh;

    color: var(--text-primary);

    background:
        radial-gradient(
            circle at top right,
            rgba(124,58,237,.08),
            transparent 35%
        ),
        var(--bg);
}

/* ------------------------------------------------ */
/* SCROLLBAR */
/* ------------------------------------------------ */

::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: transparent;
}

::-webkit-scrollbar-thumb {
    background: #d4d4d8;
    border-radius: 999px;
}

/* ------------------------------------------------ */
/* NAV */
/* ------------------------------------------------ */

.topnav {

    position: sticky;
    top: 0;
    z-index: 50;

    height: 64px;

    background:
        rgba(255,255,255,.85);

    backdrop-filter:
        blur(20px);

    border-bottom:
        1px solid rgba(0,0,0,.06);
}

/* ------------------------------------------------ */
/* SEARCH */
/* ------------------------------------------------ */

.search-input {

    height: 44px;

    background: white;

    border: 1px solid var(--border);

    border-radius: 14px;

    color: var(--text-primary);

    font-size: 14px;

    box-shadow:
        var(--shadow-sm);

    transition:
        border-color .15s ease,
        box-shadow .15s ease;
}

.search-input:focus {

    outline: none;

    border-color: var(--accent);

    box-shadow:
        0 0 0 4px rgba(124,58,237,.12);
}

.search-input::placeholder {
    color: var(--text-muted);
}

/* ------------------------------------------------ */
/* NAV BUTTONS */
/* ------------------------------------------------ */

.nav-btn {

    border: none;

    background: transparent;

    color: var(--text-secondary);

    padding: 8px 12px;

    border-radius: 10px;

    font-size: 14px;

    cursor: pointer;

    transition: all .15s ease;

    display: flex;
    align-items: center;
    gap: 6px;
}

.nav-btn:hover {

    color: var(--text-primary);

    background: rgba(124,58,237,.05);
}

/* ------------------------------------------------ */
/* PRIMARY BUTTONS */
/* ------------------------------------------------ */

.post-btn,
.apply-btn {

    border: none;

    cursor: pointer;

    border-radius: 12px;

    font-weight: 600;

    color: white;

    background:
        linear-gradient(
            135deg,
            #8b5cf6,
            #7c3aed
        );

    box-shadow:
        var(--shadow-purple);

    transition:
        transform .15s ease,
        box-shadow .15s ease;
}

.post-btn {

    padding: 10px 16px;

    font-size: 14px;
}

.apply-btn {

    padding: 12px 20px;

    font-size: 14px;

    text-decoration: none;

    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.post-btn:hover,
.apply-btn:hover {

    transform: translateY(-1px);

    box-shadow:
        0 16px 40px rgba(124,58,237,.25);
}

/* ------------------------------------------------ */
/* SIDEBAR */
/* ------------------------------------------------ */

.sidebar {

    width: 220px;

    background: transparent;

    border-right: none;

    flex-shrink: 0;
}

.section-header {

    padding: 16px;

    font-size: 11px;

    font-weight: 700;

    letter-spacing: .08em;

    text-transform: uppercase;

    color: var(--text-muted);
}

/* ------------------------------------------------ */
/* FILTER PILLS */
/* ------------------------------------------------ */

.filter-pill {

    display: inline-flex;

    align-items: center;

    gap: 6px;

    padding: 8px 12px;

    background: white;

    border: 1px solid var(--border);

    border-radius: 12px;

    font-size: 13px;

    color: var(--text-secondary);

    cursor: pointer;

    transition: all .15s ease;

    white-space: nowrap;
}

.filter-pill:hover {

    border-color: var(--border-hover);

    color: var(--text-primary);

    transform: translateY(-1px);
}

.filter-pill.active {

    background: var(--accent-soft);

    border-color: #c4b5fd;

    color: var(--accent);
}

/* ------------------------------------------------ */
/* SORT TABS */
/* ------------------------------------------------ */

.sort-tab {

    border: 1px solid transparent;

    background: transparent;

    color: var(--text-secondary);

    padding: 8px 14px;

    border-radius: 999px;

    cursor: pointer;

    transition: all .15s ease;
}

.sort-tab:hover {

    color: var(--text-primary);
}

.sort-tab.active {

    background: white;

    border-color: #ddd6fe;

    color: var(--accent);

    box-shadow: var(--shadow-sm);
}

/* ------------------------------------------------ */
/* JOB CARDS */
/* ------------------------------------------------ */

.job-card {

    position: relative;

    background: white;

    border: 1px solid #ececf1;

    border-radius: 18px;

    padding: 20px;

    cursor: pointer;

    box-shadow: var(--shadow-sm);

    transition:
        transform .15s ease,
        border-color .15s ease,
        box-shadow .15s ease;
}

.job-card:hover {

    transform: translateY(-2px);

    border-color: #ddd6fe;

    box-shadow:
        0 10px 30px rgba(124,58,237,.08);
}

.job-card.featured {

    background:
        linear-gradient(
            to bottom,
            rgba(124,58,237,.04),
            white
        );

    border-color: #c4b5fd;
}

.job-card.selected {

    border-color: var(--accent);

    box-shadow:
        0 0 0 3px rgba(124,58,237,.08);
}

/* ------------------------------------------------ */
/* LOGO */
/* ------------------------------------------------ */

.company-logo {

    width: 52px;
    height: 52px;

    border-radius: 14px;

    background: white;

    border: 1px solid var(--border);

    display: flex;
    align-items: center;
    justify-content: center;

    font-weight: 700;

    color: var(--text-secondary);

    box-shadow: var(--shadow-sm);

    flex-shrink: 0;
}

/* ------------------------------------------------ */
/* TECH TAGS */
/* ------------------------------------------------ */

.tech-tag,
.detail-tag {

    display: inline-flex;

    align-items: center;

    padding: 5px 10px;

    border-radius: 999px;

    background: #fafafa;

    border: 1px solid #ececf1;

    color: var(--text-secondary);

    font-size: 12px;

    transition: all .15s ease;
}

.tech-tag:hover {

    border-color: #c4b5fd;

    color: var(--accent);
}

/* ------------------------------------------------ */
/* BADGES */
/* ------------------------------------------------ */

.badge-featured {

    background: var(--accent-soft);

    color: var(--accent);

    border: 1px solid #ddd6fe;
}

.badge-remote {

    background: #ecfdf5;

    color: var(--success);

    border: 1px solid #a7f3d0;
}

.badge-video {

    background: #f5f3ff;

    color: var(--accent);

    border: 1px solid #ddd6fe;
}

.badge-featured,
.badge-remote,
.badge-video {

    padding: 4px 8px;

    border-radius: 999px;

    font-size: 11px;

    font-weight: 600;
}

/* ------------------------------------------------ */
/* SALARY */
/* ------------------------------------------------ */

.salary-text {

    color: var(--accent);

    font-weight: 700;

    font-size: 14px;
}

/* ------------------------------------------------ */
/* SAVE BUTTON */
/* ------------------------------------------------ */

.save-btn {

    width: 36px;
    height: 36px;

    border-radius: 12px;

    background: white;

    border: 1px solid var(--border);

    color: var(--text-muted);

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;

    transition: all .15s ease;
}

.save-btn:hover {

    border-color: #c4b5fd;

    color: var(--accent);
}

.save-btn.saved {

    background: var(--accent-soft);

    border-color: #c4b5fd;

    color: var(--accent);
}

/* ------------------------------------------------ */
/* DETAIL PANEL */
/* ------------------------------------------------ */

.detail-panel {

    position: sticky;

    top: 84px;

    background: white;

    border: 1px solid #ececf1;

    border-radius: 20px;

    overflow: hidden;

    max-height: calc(100vh - 100px);

    box-shadow:
        var(--shadow-md);
}

.detail-panel-bar {

    height: 4px;

    background:
        linear-gradient(
            90deg,
            #8b5cf6,
            #7c3aed
        );
}

/* ------------------------------------------------ */
/* MOBILE SHEET */
/* ------------------------------------------------ */

.mobile-sheet {

    background: white;

    border-radius: 24px 24px 0 0;

    box-shadow:
        0 -10px 40px rgba(0,0,0,.12);
}

.sheet-bar {

    height: 4px;

    background:
        linear-gradient(
            90deg,
            #8b5cf6,
            #7c3aed
        );
}

.sheet-handle {

    width: 48px;

    height: 5px;

    border-radius: 999px;

    background: #d4d4d8;

    margin: 14px auto;
}

/* ------------------------------------------------ */
/* FOOTER */
/* ------------------------------------------------ */

.footer-link {

    color: var(--text-secondary);

    text-decoration: none;

    transition: color .15s ease;
}

.footer-link:hover {

    color: var(--accent);
}

</style>
</head>
<body>

<div x-data="jobBoard()" x-init="init()" @keydown.escape.window="closeDetail()">

    <!-- ══════════════════════════════ NAV ══════════════════════════════ -->
    <nav class="topnav">
        <div class="flex items-center justify-between h-full px-4 gap-3" style="max-width:1920px;margin:0 auto">
            <a href="/" class="flex items-center gap-2 flex-shrink-0">
                <div style="background:#0d2a2e;border:1px solid rgba(103,232,249,.3);width:32px;height:32px;border-radius:6px;display:flex;align-items:center;justify-content:center">
                    <span style="font-family:'IBM Plex Mono',monospace;font-size:10px;font-weight:600;color:var(--accent)">BETA</span>
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
        
            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                <button @click="open = !open" class="nav-btn flex items-center gap-1">
                    For Candidates 
                    <svg class="w-3 h-3 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-cloak
                    class="absolute top-full mt-2 w-48  border border-gray-200 rounded-lg shadow-xl z-50 p-2 bg-teal-800">
                    <a href="/nycompanies" class="block px-3 py-2 text-sm hover:bg-gray-50 rounded hover:bg-teal-400">Browse Companies</a>
                    <a href="/salaries" class="block px-3 py-2 text-sm hover:bg-gray-50 rounded hover:bg-teal-400">Salary Insights</a>
                </div>
            </div>
        
            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                <button @click="open = !open" class="nav-btn flex items-center gap-1">
                    For Employers 
                    <svg class="w-3 h-3 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-cloak
                    class="absolute top-full mt-2 w-48 border border-gray-200 rounded-lg shadow-xl z-50 p-2 bg-teal-800">
                    <a href="/post-job" class="block px-3 py-2 text-sm hover:bg-gray-50 rounded hover:bg-teal-400"">Post a Job</a>
                    <a href="/pricing" class="block px-3 py-2 text-sm hover:bg-gray-50 rounded hover:bg-teal-400">Pricing Plans</a>
                </div>
            </div>
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
                <span>Specializations</span>
                <span class="hover:text-teal-500 cursor-pointer md:hidden" @click="mobileSidebar = false">[X]</span>
            </div>

          
<div class="px-3 pb-4">
    <a href="<?php echo '/post-job'; ?>" 
       class="filter-pill w-full flex items-center border border-teal-500 text-gray-400 bg-[rgba(103,232,249,.08)] hover:bg-teal-300"
       style="border-radius:6px; font-size:11px; padding:6px 12px;">
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
                                <div class="promo-label">Now hiring on newyork.dev</div>
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
                                    Post a job and reach 2,000+ New York developers actively looking.
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
            <span>© 2026 newyork.dev — developer jobs</span>
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