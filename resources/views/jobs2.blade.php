<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>scranton.dev — Developer Jobs</title>
    <meta name="description" content="Low-noise developer jobs. Filtered job graph for engineering professionals.">

    <!-- TailwindCSS Engine -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- AlpineJS State Proxy -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Design System Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-base: #0e0f11;
            --bg-surface: #161719;
            --bg-elevated: #1e2023;
            --bg-hover: #252729;
            --border: #2a2c2f;
            --border-light: #333538;
            --text-primary: #f0f0f0;
            --text-secondary: #8b8d93;
            --text-muted: #555860;
            --accent: #4ade80;
            --accent-dim: rgba(74,222,128,0.12);
            --accent-blue: #60a5fa;
            --accent-amber: #fbbf24;
            --tag-bg: #1e2023;
            --tag-border: #1c1f27;
        }

        body {
            font-family: 'IBM Plex Sans', sans-serif;
            background: var(--bg-base);
            color: var(--text-primary);
        }

        [x-cloak] { display: none !important; }

        /* Custom Platform Scroll Engine */
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: var(--bg-base); }
        ::-webkit-scrollbar-thumb { background: var(--border-light); border-radius: 2px; }

        /* Smooth Shimmer Animations */
        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
        .shimmer-effect {
            background: linear-gradient(90deg, var(--bg-elevated) 25%, var(--bg-hover) 50%, var(--bg-elevated) 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }
    </style>
</head>
<body class="min-h-screen antialiased selection:bg-emerald-500/20 selection:text-emerald-400">

<!-- Global Application Engine State Proxy -->
<div x-data="{
    jobs: [],
    loading: true,
    fetchError: false,
    search: '',
    activeFilters: [],
    activeSort: 'latest',
    savedJobs: JSON.parse(localStorage.getItem('savedJobs') || '[]'),
    mobileSidebar: false,
    specializations: [
        { key: 'Backend', icon: '⬡' },
        { key: 'Frontend', icon: '◈' },
        { key: 'DevOps', icon: '⟳' },
        { key: 'Senior', icon: '★' },
        { key: 'React', icon: '⚛' },
        { key: 'Laravel', icon: '▲' },
        { key: 'PHP', icon: '⬡' },
        { key: 'Remote', icon: '⌂' },
        { key: 'Hybrid', icon: '⇌' }
    ],

    init() {
        fetch('/api/v1/jobs')
            .then(res => { if (!res.ok) throw new Error(res.status); return res.json(); })
            .then(({ data }) => { 
                this.jobs = data || []; 
                this.loading = false; 
            })
            .catch(() => { 
                this.fetchError = true; 
                this.loading = false; 
            });
    },

    toggleFilter(key) {
        if (this.activeFilters.includes(key)) {
            this.activeFilters = this.activeFilters.filter(f => f !== key);
        } else {
            this.activeFilters.push(key);
        }
    },

    toggleSave(id) {
        if (this.savedJobs.includes(id)) {
            this.savedJobs = this.savedJobs.filter(j => j !== id);
        } else {
            this.savedJobs.push(id);
        }
        localStorage.setItem('savedJobs', JSON.stringify(this.savedJobs));
    },

    isSaved(id) { return this.savedJobs.includes(id); },

    filteredJobs() {
        let list = this.jobs.filter(job => {
            const term = this.search.toLowerCase();
            const matchesSearch = !term || 
                job.title.toLowerCase().includes(term) || 
                job.company.toLowerCase().includes(term) || 
                (job.tags || []).some(t => t.toLowerCase().includes(term));
            
            const matchesFilters = this.activeFilters.length === 0 || 
                this.activeFilters.every(f => (job.tags || []).includes(f));
            
            return matchesSearch && matchesFilters;
        });

        if (this.activeSort === 'salary') {
            list.sort((a, b) => (b.salary_max || 0) - (a.salary_max || 0));
        } else if (this.activeSort === 'featured') {
            list.sort((a, b) => (b.is_featured ? 1 : 0) - (a.is_featured ? 1 : 0));
        }
        return list;
    },

    initials(company) {
        if (!company) return '??';
        return company.split(' ').slice(0, 2).map(w => w[0]).join('').toUpperCase();
    },

    logoColor(company) {
        const colors = ['#1e3a5f', '#1a3a2a', '#3a1a2a', '#2a2a1a', '#1a2a3a', '#2a1a3a'];
        let hash = 0;
        for (let i = 0; i < company.length; i++) {
            hash = (hash * 31 + company.charCodeAt(i)) & 0xffffffff;
        }
        return colors[Math.abs(hash) % colors.length];
    }
}">

    <!-- NAVIGATION BAR LAYER -->
    <nav class="h-14 bg-[var(--bg-surface)] border-b border-[var(--border)] sticky top-0 z-50 backdrop-blur-md bg-[var(--bg-surface)]/90">
        <div class="h-full max-w-[1600px] mx-auto flex items-center justify-between px-4 gap-4">
            
            <!-- Branding Matrix -->
            <a href="/" class="flex items-center gap-2 shrink-0 group">
                <div class="bg-emerald-950/60 border border-emerald-500/30 w-8 h-8 rounded-lg flex items-center justify-center transition group-hover:border-emerald-400">
                    <span class="font-mono text-[10px] font-bold text-[var(--accent)]">SV</span>
                </div>
                <span class="font-mono text-sm font-semibold tracking-tight">
                    silicon<span class="text-[var(--accent)]">valley.dev</span>
                </span>
            </a>

            <!-- High Density Global Search Control -->
            <div class="relative flex-1 max-w-md">
                <input 
                    type="text" 
                    x-model="search" 
                    placeholder="Search jobs, companies, infrastructure..." 
                    class="w-full h-9 bg-[var(--bg-elevated)] border border-[var(--border)] text-gray-200 font-sans text-xs rounded-lg pl-9 pr-4 transition placeholder-[var(--text-muted)] focus:outline-none focus:border-[var(--accent)]"
                >
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-[var(--text-muted)]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <!-- Pipeline Filters Desktop Navigation Action Items -->
            <div class="hidden md:flex items-center gap-1">
                <button class="h-8 px-3 text-xs font-medium text-[var(--text-secondary)] rounded-md transition hover:text-[var(--text-primary)] hover:bg-[var(--bg-elevated)] flex items-center gap-1">
                    For Candidates 
                    <svg class="w-3 h-3 opacity-60" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <button class="h-8 px-3 text-xs font-medium text-[var(--text-secondary)] rounded-md transition hover:text-[var(--text-primary)] hover:bg-[var(--bg-elevated)] flex items-center gap-1">
                    For Employers 
                    <svg class="w-3 h-3 opacity-60" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
            </div>

            <!-- Core Operations CTA Controls -->
            <div class="flex items-center gap-2">
                <a href="/post-job" class="hidden sm:block">
                    <button class="h-8 bg-[var(--accent)] text-[#0a1a0f] font-sans text-xs font-bold rounded-md px-4 transition hover:opacity-90 active:scale-[0.98]">
                        + Post Job
                    </button>
                </a>
                
                <button class="h-8 px-3 bg-transparent border border-[var(--border)] text-[var(--text-muted)] rounded-md flex items-center gap-2 transition hover:border-[var(--border-light)] hover:text-[var(--text-primary)]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    <span x-show="savedJobs.length > 0" x-text="savedJobs.length" x-cloak class="font-mono text-xs font-bold text-[var(--accent-amber)]"></span>
                </button>

                <!-- Mobile Navigation Menu Toggle Handle -->
                <button @click="mobileSidebar = !mobileSidebar" class="md:hidden h-8 w-8 flex items-center justify-center text-[var(--text-secondary)] rounded-md transition hover:bg-[var(--bg-elevated)]" aria-label="Toggle Navigation Filter Scope">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- CORE TWO-COLUMN GRID ARCHITECTURE INTERFACE -->
    <div class="max-w-[1600px] mx-auto flex relative">
        
        <!-- SIDEBAR INDEX CONTROLLER FILTER LAYERS -->
        <aside 
            :class="mobileSidebar ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
            class="w-60 shrink-0 bg-[var(--bg-surface)] border-r border-[var(--border)] h-[calc(100vh-56px)] sticky top-14 overflow-y-auto z-40 transition-transform duration-200 ease-in-out fixed inset-y-14 left-0 md:relative md:top-0"
        >
            <div class="font-mono text-[10px] font-bold tracking-wider uppercase text-[var(--text-muted)] px-4 pt-4 pb-2">Specializations</div>
            
            <div class="px-3 pb-3 flex flex-col gap-1">
                <template x-for="spec in specializations" :key="spec.key">
                    <button 
                        @click="toggleFilter(spec.key)" 
                        :class="activeFilters.includes(spec.key) ? 'border-[var(--accent)] text-[var(--accent)] bg-[var(--accent-dim)]' : 'border-[var(--tag-border)] bg-[var(--tag-bg)] text-[var(--text-secondary)] hover:border-[var(--border-light)] hover:text-[var(--text-primary)] hover:bg-[var(--bg-hover)]'" 
                        class="w-full flex items-center gap-2 px-3 py-1.5 rounded-md border text-left font-mono text-xs transition"
                    >
                        <span x-text="spec.icon" class="w-4 text-center text-[11px]"></span>
                        <span x-text="spec.key" class="flex-1"></span>
                        <span x-show="activeFilters.includes(spec.key)" x-cloak class="text-[9px] opacity-60">✕</span>
                    </button>
                </template>
            </div>

            <div class="h-[1px] bg-[var(--border)] my-2mx-3"></div>

            <div class="px-3 py-2" x-show="activeFilters.length > 0" x-cloak>
                <button @click="activeFilters = []" class="w-full h-8 flex items-center justify-center rounded-md border border-red-500/20 bg-red-500/5 text-red-400 font-mono text-xs font-medium transition hover:bg-red-500/10 hover:border-red-500/30">
                    Clear active filters
                </button>
            </div>

            <!-- TELEMETRY RUNTIME SYSTEM STATISTICS PANEL -->
            <div class="font-mono text-[10px] font-bold tracking-wider uppercase text-[var(--text-muted)] px-4 pt-3 pb-2">Context Analytics</div>
            <div class="px-4 pb-4 flex flex-col gap-2 font-mono text-xs">
                <div class="flex justify-between items-center">
                    <span class="text-[var(--text-secondary)]">Index Scale</span>
                    <span class="text-[var(--accent)] font-medium" x-text="jobs.length">0</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[var(--text-secondary)]">Evaluated</span>
                    <span class="text-[var(--text-primary)] font-medium" x-text="filteredJobs().length">0</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[var(--text-secondary)]">Pinned</span>
                    <span class="text-[var(--accent-amber)] font-medium" x-text="savedJobs.length">0</span>
                </div>
            </div>
        </aside>

        <!-- MAIN SYSTEM INDEX PIPELINE -->
        <main class="flex-1 min-w-0 p-4 md:p-6">
            
            <!-- Context Header Operations Filtering Sort Options Layer Layout -->
            <div class="flex items-center justify-between mb-5 flex-wrap gap-4 border-b border-[var(--border)] pb-4">
                <div class="flex items-center gap-1 bg-[var(--bg-surface)] p-0.5 rounded-lg border border-[var(--border)]">
                    <button @click="activeSort = 'latest'" :class="activeSort === 'latest' ? 'bg-[var(--bg-elevated)] border-[var(--border-light)] text-[var(--text-primary)]' : 'text-[var(--text-secondary)] hover:text-[var(--text-primary)]'" class="px-3 py-1.5 rounded-md text-xs font-medium border border-transparent transition">Latest Entries</button>
                    <button @click="activeSort = 'salary'" :class="activeSort === 'salary' ? 'bg-[var(--bg-elevated)] border-[var(--border-light)] text-[var(--text-primary)]' : 'text-[var(--text-secondary)] hover:text-[var(--text-primary)]'" class="px-3 py-1.5 rounded-md text-xs font-medium border border-transparent transition">Yield Yield Matrix</button>
                    <button @click="activeSort = 'featured'" :class="activeSort === 'featured' ? 'bg-[var(--bg-elevated)] border-[var(--border-light)] text-[var(--text-primary)]' : 'text-[var(--text-secondary)] hover:text-[var(--text-primary)]'" class="px-3 py-1.5 rounded-md text-xs font-medium border border-transparent transition">Featured Channels</button>
                </div>
                <div class="font-mono text-xs text-[var(--text-muted)]">
                    <span class="text-[var(--text-secondary)] font-medium" x-text="filteredJobs().length"></span> active threads
                </div>
            </div>

            <!-- Active Sorting Filter Pills Indicator Block Matrix Layout -->
            <div x-show="activeFilters.length > 0" x-cloak class="flex flex-wrap gap-1.5 mb-4">
                <template x-for="f in activeFilters" :key="f">
                    <span @click="toggleFilter(f)" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md border border-[var(--accent)] text-[var(--accent)] bg-[var(--accent-dim)] font-mono text-[11px] cursor-pointer transition hover:opacity-80">
                        <span x-text="f"></span>
                        <span class="text-[9px] opacity-60">✕</span>
                    </span>
                </template>
            </div>

            <!-- SKELETON PLACEHOLDER LOADING COMPONENT VIEW LAYER -->
            <div x-show="loading" class="flex flex-col gap-3">
                <template x-for="i in 3" :key="i">
                    <div class="bg-[var(--bg-surface)] border border-[var(--border)] rounded-xl p-5">
                        <div class="flex gap-4 items-start">
                            <div class="shimmer-effect w-11 h-11 rounded-lg shrink-0"></div>
                            <div class="flex-1 flex flex-col gap-2">
                                <div class="shimmer-effect h-4 w-1/3 rounded"></div>
                                <div class="shimmer-effect h-3 w-1/4 rounded"></div>
                                <div class="flex gap-2 mt-2">
                                    <div class="shimmer-effect h-5 w-14 rounded-full"></div>
                                    <div class="shimmer-effect h-5 w-20 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- NETWORK EXCEPTION ERROR NOTIFICATION PANEL ENGINE -->
            <div x-show="fetchError" x-cloak class="text-center py-16 px-4 border border-red-500/10 bg-red-500/5 rounded-2xl max-w-xl mx-auto my-10">
                <div class="text-2xl mb-2">⚠️</div>
                <h4 class="font-mono text-sm font-semibold text-gray-200">Index Syncer Execution Terminated</h4>
                <p class="text-[var(--text-secondary)] text-xs mt-1 max-w-sm mx-auto">Could not negotiate network handshake payloads with job board graph endpoints.</p>
            </div>

            <!-- JOB BOARD RECTACTIVE FEED COMPONENT ARCHITECTURE -->
            <div x-show="!loading && !fetchError" class="flex flex-col gap-3">
                <template x-for="job in filteredJobs()" :key="job.id">
                    <div 
                        @click="window.location.href = job.url"
                        :class="job.is_featured ? 'border-emerald-500/30 hover:border-emerald-500/50' : 'border-[var(--border)] hover:border-[var(--border-light)]'"
                        class="bg-[var(--bg-surface)] rounded-xl p-5 cursor-pointer transition-all duration-150 relative overflow-hidden group hover:bg-[var(--bg-elevated)]"
                    >
                        <!-- Top Accent Banner Line for high premium tier featured components -->
                        <div x-show="job.is_featured" class="absolute top-0 inset-x-0 h-[2px] bg-gradient-to-r from-[var(--accent)] to-transparent"></div>

                        <div class="flex gap-4 items-start">
                            <!-- Graphical Placeholder Monospace Initial Token Matrix -->
                            <div 
                                :style="`background: ${logoColor(job.company)}`" 
                                class="w-11 h-11 rounded-lg border border-[var(--border)] flex items-center justify-center font-mono text-xs font-bold text-gray-300 shrink-0 select-none shadow-sm"
                                x-text="initials(job.company)"
                            ></div>

                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="min-w-0">
                                        <!-- Node Title Identity Grid Layout Header Block Context -->
                                        <div class="flex flex-wrap items-center gap-x-2 gap-y-1 mb-1">
                                            <h3 class="text-[15px] font-semibold text-[var(--text-primary)] leading-snug tracking-tight group-hover:text-white transition" x-text="job.title"></h3>
                                            <span x-show="job.is_featured" class="px-1.5 py-0.5 rounded bg-[var(--accent-dim)] text-[var(--accent)] border border-emerald-500/20 font-mono text-[9px] font-semibold uppercase tracking-wider">Featured</span>
                                            <span x-show="job.location && job.location.includes('Remote')" class="px-1.5 py-0.5 rounded bg-blue-500/10 text-[var(--accent-blue)] border border-blue-500/20 font-mono text-[9px] font-semibold uppercase tracking-wider">Remote</span>
                                        </div>

                                        <!-- Subtitle Informational Node Metadata Streams -->
                                        <div class="flex flex-wrap items-center text-xs text-[var(--text-secondary)] gap-y-1">
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5 opacity-55" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                                <span x-text="job.company"></span>
                                            </span>
                                            <span class="inline-block mx-2 text-[var(--text-muted)] select-none">·</span>
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5 opacity-55" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                                <span x-text="job.location"></span>
                                            </span>
                                            <span class="inline-block mx-2 text-[var(--text-muted)] select-none">·</span>
                                            <span x-text="job.posted" class="text-[var(--text-muted)]"></span>
                                        </div>
                                    </div>

                                    <!-- Operations Functional Interaction Save Handles Controls -->
                                    <div class="flex items-center gap-3 shrink-0">
                                        <span class="font-mono text-xs font-semibold text-[var(--accent)] tracking-tight bg-[var(--accent-dim)] px-2.5 py-1 rounded-md" x-show="job.salary && job.salary !== 'Salary not disclosed'" x-text="job.salary"></span>
                                        <button 
                                            @click.stop="toggleSave(job.id)"
                                            :class="isSaved(job.id) ? 'border-amber-500/30 text-[var(--accent-amber)] bg-amber-500/5' : 'border-[var(--border)] text-[var(--text-muted)] bg-transparent hover:border-[var(--border-light)] hover:text-[var(--text-primary)]'"
                                            class="w-8 h-8 rounded-lg border flex items-center justify-center transition active:scale-95"
                                            aria-label="Toggle Save Pipeline State"
                                        >
                                            <svg class="w-3.5 h-3.5" :fill="isSaved(job.id) ? 'currentColor' : 'none'" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Functional Array Iteration Tech Badge Layer Tags -->
                                <div class="flex flex-wrap gap-1.5 mt-3.5" @click.stop>
                                    <template x-for="tag in (job.tags || []).slice(0, 5)" :key="tag">
                                        <span 
                                            @click="toggleFilter(tag)"
                                            :class="activeFilters.includes(tag) ? 'border-[var(--accent)] text-[var(--accent)] bg-[var(--accent-dim)]' : 'border-[var(--tag-border)] bg-[var(--tag-bg)] text-[var(--text-secondary)] hover:border-[var(--border-light)] hover:text-[var(--text-primary)]'"
                                            class="inline-flex items-center px-2 py-0.5 rounded border font-mono text-[10px] cursor-pointer transition"
                                            x-text="tag"
                                        ></span>
                                    </template>
                                    <span x-show="(job.tags || []).length > 5" class="inline-flex items-center px-2 py-0.5 rounded border border-[var(--tag-border)] bg-[var(--tag-bg)] text-[var(--text-muted)] font-mono text-[10px] cursor-default" x-text="`+${job.tags.length - 5} more`"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                <!-- PIPELINE EMPTY TERMINAL SEARCH RESULT VIEWS -->
                <div x-show="filteredJobs().length === 0 && !loading" x-cloak class="text-center py-20 border border-dashed border-[var(--border)] rounded-2xl font-mono text-xs text-[var(--text-muted)] max-w-xl mx-auto my-6">
                    <div class="text-3xl mb-4">[ ]</div>
                    <div class="text-[var(--text-secondary)] mb-4">No matching job records found inside current layout filter parameters.</div>
                    <button @click="search = ''; activeFilters = []" class="inline-flex items-center px-4 h-9 rounded-lg border border-[var(--border)] bg-[var(--bg-surface)] text-[var(--text-secondary)] hover:text-[var(--text-primary)] hover:border-[var(--border-light)] transition shadow-sm active:scale-95">
                        Reset Graph Engine Filters
                    </button>
                </div>
            </div>
        </main>
    </div>

    <!-- PERSISTENT FOOTER METRICS SYSTEM -->
    <footer class="border-t border-[var(--border)] bg-[#0a0b0c] mt-20">
        <div class="max-w-[1600px] mx-auto px-6 py-8">
            <div class="flex flex-col sm:flex-row gap-4 sm:items-center sm:justify-between text-[11px] font-mono text-[var(--text-muted)]">
                <div class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-[var(--accent)] inline-block animate-pulse"></span>
                    &copy; 2026 scranton.dev | Structured job graph for engineering segments.
                </div>
                <div class="flex flex-wrap gap-x-6 gap-y-2">
                    <a href="/firsts" class="hover:text-[var(--text-primary)] transition">Origin Story</a>
                    <a href="/about" class="hover:text-[var(--text-primary)] transition">About Data</a>
                    <a href="/api" class="hover:text-[var(--text-primary)] transition">API Core</a>
                </div>
            </div>
        </div>
    </footer>

</div>
</body>
</html>