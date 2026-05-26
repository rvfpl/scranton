<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.dev — Developer Jobs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-base:#0e0f11;--bg-surface:#161719;--bg-elevated:#1e2023;--bg-hover:#252729;
            --border:#2a2c2f;--border-light:#333538;--text-primary:#f0f0f0;
            --text-secondary:#8b8d93;--text-muted:#555860;
            --accent:#67e8f9;--accent-dim:rgba(103,232,249,0.12);
            --accent-green:#4ade80;--accent-amber:#fbbf24;--accent-purple:#a78bfa;
            --tag-bg:#1e2023;--tag-border:#1c1f27;
        }
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'IBM Plex Sans',sans-serif;background:var(--bg-base);color:var(--text-primary);min-height:100vh}
        [x-cloak]{display:none!important}
        ::-webkit-scrollbar{width:4px}::-webkit-scrollbar-track{background:var(--bg-base)}::-webkit-scrollbar-thumb{background:var(--border-light);border-radius:2px}

        /* NAV */
        .topnav{background:var(--bg-surface);border-bottom:1px solid var(--border);position:sticky;top:0;z-index:50;height:56px}
        .search-input{background:var(--bg-elevated);border:1px solid var(--border);color:var(--text-primary);font-family:'IBM Plex Sans',sans-serif;font-size:13px;transition:border-color .15s}
        .search-input:focus{outline:none;border-color:var(--accent)}
        .search-input::placeholder{color:var(--text-muted)}
        .nav-btn{padding:6px 12px;border-radius:6px;font-size:13px;color:var(--text-secondary);cursor:pointer;transition:all .12s;display:flex;align-items:center;gap:5px;border:none;background:none}
        .nav-btn:hover{color:var(--text-primary);background:var(--bg-elevated)}
        .post-btn{padding:7px 14px;border-radius:6px;font-size:13px;font-weight:600;background:var(--accent);color:#041a1f;border:none;cursor:pointer;transition:opacity .12s;font-family:'IBM Plex Sans',sans-serif}
        .post-btn:hover{opacity:.88}

        /* SIDEBAR */
        .sidebar{width:240px;flex-shrink:0;background:var(--bg-surface);border-right:1px solid var(--border);height:calc(100vh - 56px);position:sticky;top:56px;overflow-y:auto}
        .section-header{font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--text-muted);font-family:'IBM Plex Mono',monospace;padding:16px 16px 8px}
        .filter-pill{display:inline-flex;align-items:center;gap:6px;padding:5px 10px;border-radius:6px;border:1px solid var(--tag-border);background:var(--tag-bg);color:var(--text-secondary);font-size:12px;font-family:'IBM Plex Mono',monospace;cursor:pointer;transition:all .12s;white-space:nowrap}
        .filter-pill:hover{border-color:var(--border-light);color:var(--text-primary);background:var(--bg-hover)}
        .filter-pill.active{border-color:var(--accent);color:var(--accent);background:var(--accent-dim)}

        /* SORT TABS */
        .sort-tab{padding:6px 14px;border-radius:20px;font-size:12px;font-weight:500;cursor:pointer;border:1px solid transparent;color:var(--text-secondary);transition:all .12s;background:none}
        .sort-tab:hover{color:var(--text-primary)}
        .sort-tab.active{border-color:var(--border-light);color:var(--text-primary);background:var(--bg-elevated)}

        /* JOB CARDS */
        .job-card{background:var(--bg-surface);border:1px solid var(--border);border-radius:10px;padding:18px 20px;cursor:pointer;transition:border-color .12s,background .12s;position:relative}
        .job-card:hover{border-color:var(--border-light);background:var(--bg-elevated)}
        .job-card.featured{border-color:rgba(103,232,249,0.25)}
        .job-card.featured::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--accent),transparent);border-radius:10px 10px 0 0}
        .job-card.has-video{border-color:rgba(167,139,250,0.2)}
        .company-logo{width:44px;height:44px;border-radius:8px;background:var(--bg-elevated);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;font-family:'IBM Plex Mono',monospace;font-size:13px;font-weight:600;color:var(--text-secondary);flex-shrink:0}
        .tech-tag{display:inline-flex;align-items:center;gap:4px;padding:3px 8px;border-radius:4px;border:1px solid var(--tag-border);background:var(--tag-bg);color:var(--text-secondary);font-size:11px;font-family:'IBM Plex Mono',monospace;cursor:pointer;transition:all .12s}
        .tech-tag:hover{border-color:var(--border-light);color:var(--text-primary)}
        .badge-featured{padding:2px 7px;border-radius:4px;font-size:10px;font-weight:600;font-family:'IBM Plex Mono',monospace;background:var(--accent-dim);color:var(--accent);border:1px solid rgba(103,232,249,0.2)}
        .badge-remote{padding:2px 7px;border-radius:4px;font-size:10px;font-weight:600;font-family:'IBM Plex Mono',monospace;background:rgba(74,222,128,0.1);color:var(--accent-green);border:1px solid rgba(74,222,128,0.2)}
        .badge-video{padding:2px 7px;border-radius:4px;font-size:10px;font-weight:600;font-family:'IBM Plex Mono',monospace;background:rgba(167,139,250,0.1);color:var(--accent-purple);border:1px solid rgba(167,139,250,0.2)}
        .salary-text{font-family:'IBM Plex Mono',monospace;font-size:13px;color:var(--accent);font-weight:500}
        .save-btn{width:32px;height:32px;border-radius:6px;border:1px solid var(--border);background:transparent;color:var(--text-muted);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .12s;flex-shrink:0}
        .save-btn:hover{border-color:var(--border-light);color:var(--text-primary)}
        .save-btn.saved{border-color:rgba(251,191,36,0.4);color:var(--accent-amber);background:rgba(251,191,36,0.08)}
        .meta-dot::before{content:'·';margin:0 6px;color:var(--text-muted)}

        /* VIDEO */
        .video-wrapper{border-radius:8px;overflow:hidden;border:1px solid var(--border);background:#000;flex-shrink:0}

        /* SKELETON */
        .skeleton{background:linear-gradient(90deg,var(--bg-elevated) 25%,var(--bg-hover) 50%,var(--bg-elevated) 75%);background-size:200% 100%;animation:shimmer 1.5s infinite;border-radius:4px}
        @keyframes shimmer{0%{background-position:200% 0}100%{background-position:-200% 0}}
        .empty-state{text-align:center;padding:60px 20px;color:var(--text-muted);font-family:'IBM Plex Mono',monospace}

        @media(max-width:768px){.sidebar{display:none}.sidebar.mobile-open{display:block;position:fixed;top:56px;left:0;z-index:40;height:calc(100vh - 56px)}}
    </style>
</head>
<body>
<div x-data="{
    savedJobs: JSON.parse(localStorage.getItem('pnw_saved') || '[]'),
    activeFilters: [],
    activeSort: 'latest',
    search: '',
    mobileSidebar: false,

    jobs: [
        {
            id: 1,
            title: 'Senior Laravel Engineer',
            company: 'Rainier Software',
            location: 'Seattle, WA (Hybrid)',
            salary: '$120k – $155k',
            salary_max: 155000,
            tags: ['PHP', 'Laravel', 'Backend', 'Hybrid', 'Senior'],
            posted: '2d ago',
            is_featured: true,
            video_url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            url: 'jobs/senior-php-laravel-engineer-dunder-mifflin-paper-co',
            description: 'Building internal SaaS tooling for a logistics company with a small, pragmatic team.'
        },
        {
            id: 2,
            title: 'Frontend Developer (React)',
            company: 'Cascadia Climate Tech',
            location: 'Remote (PNW)',
            salary: '$95k – $125k',
            salary_max: 125000,
            tags: ['React', 'Frontend', 'TypeScript', 'Remote'],
            posted: '1d ago',
            is_featured: false,
            video_url: null,
            url: '#',
            description: 'Dashboards for real-time climate data visualisation. Greenfield React + Tailwind.'
        },
        {
            id: 3,
            title: 'DevOps / Platform Engineer',
            company: 'Mount Hood Systems',
            location: 'Portland, OR (On-site)',
            salary: '$140k – $180k',
            salary_max: 180000,
            tags: ['DevOps', 'Kubernetes', 'Python', 'Senior'],
            posted: '4d ago',
            is_featured: false,
            video_url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            url: '#',
            description: 'Scale our infra to millions of requests. Forge, Kubernetes, and lots of autonomy.'
        },
        {
            id: 4,
            title: 'Full Stack Engineer',
            company: 'Puget Sound Digital',
            location: 'Seattle, WA (Remote)',
            salary: '$110k – $140k',
            salary_max: 140000,
            tags: ['Laravel', 'React', 'Backend', 'Frontend', 'Remote'],
            posted: '6h ago',
            is_featured: true,
            video_url: null,
            url: '#',
            description: 'Own the stack end-to-end. Laravel API + React frontend for a fintech startup.'
        },
        {
            id: 5,
            title: 'Junior PHP Developer',
            company: 'Victoria Ventures',
            location: 'Victoria, BC (Hybrid)',
            salary: '$65k – $85k',
            salary_max: 85000,
            tags: ['PHP', 'Laravel', 'Backend', 'Hybrid'],
            posted: '3d ago',
            is_featured: false,
            video_url: null,
            url: '#',
            description: 'Great first role in a supportive team. Mentorship included, no enterprise fluff.'
        },
        {
            id: 6,
            title: 'Node.js Backend Engineer',
            company: 'Salish Sea Studios',
            location: 'Vancouver, BC (Remote)',
            salary: '$100k – $130k',
            salary_max: 130000,
            tags: ['Node', 'Backend', 'Remote', 'Senior'],
            posted: '5d ago',
            is_featured: false,
            video_url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            url: '#',
            description: 'Real-time multiplayer features for an indie game platform. Node + WebSockets.'
        }
    ],

    specializations: [
    { key:'HasVideo',  icon:'▶' },
        { key:'Backend',   icon:'⬡' },
        { key:'Frontend',  icon:'◈' },
        { key:'DevOps',    icon:'⟳' },
        { key:'Senior',    icon:'★' },
        { key:'React',     icon:'⚛' },
        { key:'Laravel',   icon:'▲' },
        { key:'PHP',       icon:'⬡' },
        { key:'Remote',    icon:'⌂' },
        { key:'Hybrid',    icon:'⇌' } 
        
    ],

    toggleFilter(k) {
        this.activeFilters.includes(k)
            ? this.activeFilters = this.activeFilters.filter(f => f !== k)
            : this.activeFilters.push(k)
    },
    toggleSave(id) {
        this.savedJobs.includes(id)
            ? this.savedJobs = this.savedJobs.filter(j => j !== id)
            : this.savedJobs.push(id);
        localStorage.setItem('pnw_saved', JSON.stringify(this.savedJobs))
    },
    isSaved(id) { return this.savedJobs.includes(id) },

    filteredJobs() {
        let list = this.jobs.filter(job => {
            const s = this.search.toLowerCase();
            const ms = !s || job.title.toLowerCase().includes(s)
                         || job.company.toLowerCase().includes(s)
                         || (job.tags || []).some(t => t.toLowerCase().includes(s));
            const mf = this.activeFilters.length === 0 || this.activeFilters.every(f => {
                if (f === 'HasVideo') return !!job.video_url;
                return (job.tags || []).includes(f);
            });
            return ms && mf;
        });
        if (this.activeSort === 'salary')   list = list.sort((a,b) => (b.salary_max||0) - (a.salary_max||0));
        if (this.activeSort === 'featured') list = list.sort((a,b) => b.is_featured - a.is_featured);
        return list;
    },

    initials(c) { return c.split(' ').slice(0,2).map(w => w[0]).join('').toUpperCase() },
    logoColor(c) {
        const cols = ['#1e3a5f','#1a3a2a','#2a1a3a','#3a2a1a','#1a2a3a','#2a1a1a'];
        let h = 0; for (let ch of c) h = (h*31 + ch.charCodeAt(0)) & 0xffffffff;
        return cols[Math.abs(h) % cols.length];
    }
}">

<!-- NAV -->
<nav class="topnav">
    <div class="flex items-center justify-between h-full px-4 gap-3">
        <a href="/" class="flex items-center gap-2 flex-shrink-0">
            <div style="background:#0d2a2e;border:1px solid rgba(103,232,249,0.3);width:32px;height:32px;border-radius:6px;display:flex;align-items:center;justify-content:center">
                <span style="font-family:'IBM Plex Mono',monospace;font-size:10px;font-weight:600;color:var(--accent)">sv</span>
            </div>
            <span style="font-family:'IBM Plex Mono',monospace;font-size:14px;font-weight:600"><span style="color:var(--accent)">.dev</span></span>
        </a>

        <div class="relative flex-1 max-w-md">
            <input type="text" x-model="search" placeholder="Search jobs, companies, tech..." class="search-input w-full rounded-lg px-4 py-2 pl-9">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4" style="color:var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </div>
   <div class="hidden md:flex items-center gap-1">
            <button class="nav-btn">For Candidates <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg></button>
            <button class="nav-btn">For Employers <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg></button>
        </div>
        <div class="flex items-center gap-2">
            <button class="post-btn hidden sm:block">+ Post Job</button>
            <button class="save-btn" style="width:auto;padding:6px 10px;gap:5px;display:flex;border-radius:6px">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                <span x-show="savedJobs.length > 0" x-text="savedJobs.length" style="font-size:11px;font-family:'IBM Plex Mono',monospace;color:var(--accent-amber)"></span>
            </button>
            <button class="nav-btn md:hidden" @click="mobileSidebar=!mobileSidebar">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>
</nav>

<!-- LAYOUT -->
<div class="flex">

    <!-- SIDEBAR -->
    <aside :class="mobileSidebar ? 'sidebar mobile-open' : 'sidebar hidden md:block'">
        <div class="section-header">Specializations</div>
        <div class="px-3 pb-2 flex flex-col gap-1">
            <template x-for="spec in specializations" :key="spec.key">
                <button @click="toggleFilter(spec.key)" :class="activeFilters.includes(spec.key) ? 'active' : ''" class="filter-pill justify-start w-full text-left" style="border-radius:6px">
                    <span x-text="spec.icon" style="font-size:11px;width:16px;text-align:center"></span>
                    <span x-text="spec.key === 'HasVideo' ? '▶ Has Video' : spec.key"></span>
                    <span x-show="activeFilters.includes(spec.key)" style="margin-left:auto;font-size:9px">✕</span>
                </button>
            </template>
        </div>

        <div style="height:1px;background:var(--border);margin:8px 0"></div>

        <div class="px-3 py-2">
            <button x-show="activeFilters.length > 0" @click="activeFilters=[]" class="filter-pill w-full justify-center" style="border-radius:6px;color:#f87171;border-color:rgba(248,113,113,0.2)">Clear all filters</button>
        </div>

        <div class="section-header mt-2">Stats</div>
        <div class="px-4 pb-4 flex flex-col gap-2">
            <div class="flex justify-between"><span style="font-size:12px;color:var(--text-secondary)">Total</span><span style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--accent)" x-text="jobs.length"></span></div>
            <div class="flex justify-between"><span style="font-size:12px;color:var(--text-secondary)">Matching</span><span style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--text-primary)" x-text="filteredJobs().length"></span></div>
            <div class="flex justify-between"><span style="font-size:12px;color:var(--text-secondary)">With Video</span><span style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--accent-purple)" x-text="jobs.filter(j=>j.video_url).length"></span></div>
            <div class="flex justify-between"><span style="font-size:12px;color:var(--text-secondary)">Saved</span><span style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--accent-amber)" x-text="savedJobs.length"></span></div>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 min-w-0 p-4 md:p-6">
        <div class="flex items-center justify-between mb-5 flex-wrap gap-3">
            <div class="flex items-center gap-2">
                <button @click="activeSort='latest'"   :class="activeSort==='latest'   ? 'active' : ''" class="sort-tab">Latest</button>
                <button @click="activeSort='salary'"   :class="activeSort==='salary'   ? 'active' : ''" class="sort-tab">Best paid</button>
                <button @click="activeSort='featured'" :class="activeSort==='featured' ? 'active' : ''" class="sort-tab">Featured</button>
            </div>
            <div style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--text-muted)">
                <span x-text="filteredJobs().length"></span> offers
            </div>
        </div>

        <!-- ACTIVE FILTER PILLS -->
        <div x-show="activeFilters.length > 0" class="flex flex-wrap gap-2 mb-4">
            <template x-for="f in activeFilters" :key="f">
                <span class="filter-pill active" @click="toggleFilter(f)">
                    <span x-text="f === 'HasVideo' ? '▶ Has Video' : f"></span>
                    <span style="font-size:9px;margin-left:2px">✕</span>
                </span>
            </template>
        </div>

        <!-- JOB CARDS -->
        <div class="flex flex-col gap-3">
            <template x-for="job in filteredJobs()" :key="job.id">
                <div class="job-card"
                     :class="[job.is_featured ? 'featured' : '', job.video_url ? 'has-video' : '']"
                     @click="window.location.href = job.url">

                    <div class="flex gap-3 items-start">
                        <!-- LOGO -->
                        <div class="company-logo" :style="'background:'+logoColor(job.company)" x-text="initials(job.company)"></div>

                        <!-- CENTRE: all text content -->
                        <div class="flex-1 min-w-0">

                            <!-- TITLE ROW: title+badges left, salary+save right (always) -->
                            <div class="flex items-start justify-between gap-2 mb-1">
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <h3 style="font-size:15px;font-weight:600;color:var(--text-primary);line-height:1.3" x-text="job.title"></h3>
                                        <span x-show="job.is_featured" class="badge-featured">featured</span>
                                        <span x-show="job.location && job.location.includes('Remote')" class="badge-remote">remote</span>
                                        <span x-show="job.video_url" class="badge-video">▶ video</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 flex-shrink-0" @click.stop>
                                    <span class="salary-text" x-show="job.salary" x-text="job.salary"></span>
                                    <button class="save-btn" :class="isSaved(job.id) ? 'saved' : ''" @click.stop="toggleSave(job.id)">
                                        <svg class="w-4 h-4" :fill="isSaved(job.id) ? 'currentColor' : 'none'" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                    </button>
                                </div>
                            </div>

                            <!-- META -->
                            <div class="flex flex-wrap items-center mb-3" style="font-size:12px;color:var(--text-secondary)">
                                <svg class="w-3 h-3 mr-1" style="color:var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                <span x-text="job.company"></span>
                                <span class="meta-dot"></span>
                                <svg class="w-3 h-3 mr-1" style="color:var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                <span x-text="job.location"></span>
                                <span class="meta-dot"></span>
                                <span x-text="job.posted" style="color:var(--text-muted)"></span>
                            </div>

                            <!-- VIDEO: mobile = full width; desktop = tucked right via the sibling col -->
                            <div x-show="job.video_url" class="sm:hidden mb-3" @click.stop>
                                <div class="video-wrapper" style="width:100%;aspect-ratio:16/9;position:relative">
                                    <div x-show="!job._videoActiveMobile" @click.stop="job._videoActiveMobile = true"
                                         style="position:absolute;inset:0;z-index:10;cursor:pointer;display:flex;align-items:center;justify-content:center;background:rgba(0,0,0,0.2);border-radius:8px">
                                        <div style="width:42px;height:42px;border-radius:50%;background:rgba(0,0,0,0.7);display:flex;align-items:center;justify-content:center">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="white"><path d="M8 5v14l11-7z"/></svg>
                                        </div>
                                    </div>
                                    <iframe :src="job._videoActiveMobile ? job.video_url + '?autoplay=1' : job.video_url"
                                            class="w-full h-full" frameborder="0" allow="autoplay; fullscreen" allowfullscreen @click.stop></iframe>
                                </div>
                                <p style="font-size:10px;color:var(--text-muted);font-family:'IBM Plex Mono',monospace;margin-top:5px">▶ hiring manager intro</p>
                            </div>

                            <!-- TAGS -->
                            <div class="flex flex-wrap gap-1.5" @click.stop>
                                <template x-for="tag in (job.tags||[]).slice(0,5)" :key="tag">
                                    <span class="tech-tag"
                                          :style="activeFilters.includes(tag) ? 'border-color:var(--accent);color:var(--accent);background:var(--accent-dim)' : ''"
                                          @click="toggleFilter(tag)"
                                          x-text="tag">
                                    </span>
                                </template>
                            </div>
                        </div>

                        <!-- DESKTOP ONLY: right-column video -->
                        <div x-show="job.video_url" class="hidden sm:flex flex-col items-end gap-1 flex-shrink-0" @click.stop>
                            <div class="video-wrapper" style="width:180px;aspect-ratio:16/9;position:relative">
                                <div x-show="!job._videoActiveDesktop" @click.stop="job._videoActiveDesktop = true"
                                     style="position:absolute;inset:0;z-index:10;cursor:pointer;display:flex;align-items:center;justify-content:center;background:rgba(0,0,0,0.15);border-radius:8px">
                                    <div style="width:34px;height:34px;border-radius:50%;background:rgba(0,0,0,0.65);display:flex;align-items:center;justify-content:center">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="white"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>
                                <iframe :src="job._videoActiveDesktop ? job.video_url + '?autoplay=1' : job.video_url"
                                        class="w-full h-full" frameborder="0" allow="autoplay; fullscreen" allowfullscreen @click.stop></iframe>
                            </div>
                            <p style="font-size:10px;color:var(--text-muted);font-family:'IBM Plex Mono',monospace">▶ hiring manager intro</p>
                        </div>

                    </div>
                </div>
            </template>

            <!-- EMPTY STATE -->
            <div x-show="filteredJobs().length === 0" class="empty-state">
                <div style="font-size:28px;margin-bottom:12px;font-family:'IBM Plex Mono',monospace">[ ]</div>
                <div style="font-size:14px;color:var(--text-secondary);margin-bottom:8px">No matching jobs found</div>
                <button @click="search='';activeFilters=[]" class="filter-pill" style="border-radius:6px;margin:0 auto">Reset filters</button>
            </div>
        </div>
    </main>
</div>

<!-- FOOTER -->
<footer style="border-top:1px solid var(--border);background:var(--bg-surface);padding:16px 24px;margin-top:auto">
    <div style="font-size:12px;color:var(--text-muted);font-family:'IBM Plex Mono',monospace;display:flex;justify-content:space-between;flex-wrap:wrap;gap:8px">
        <span>© 2026 .dev — developer  </span>
        <div style="display:flex;gap:16px">
            <a href="#" style="color:var(--text-muted);text-decoration:none;transition:color .12s" onmouseover="this.style.color='var(--text-primary)'" onmouseout="this.style.color='var(--text-muted)'">About</a>
            <a href="#" style="color:var(--text-muted);text-decoration:none;transition:color .12s" onmouseover="this.style.color='var(--text-primary)'" onmouseout="this.style.color='var(--text-muted)'">API</a>
            <a href="#" style="color:var(--text-muted);text-decoration:none;transition:color .12s" onmouseover="this.style.color='var(--text-primary)'" onmouseout="this.style.color='var(--text-primary)'">Post a Job</a>
        </div>
    </div>
</footer>

</div>
</body>
</html>