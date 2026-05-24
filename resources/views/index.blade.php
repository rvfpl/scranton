<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>scranton.dev — World's Best Dev Job Board</title>
    <meta name="description" content="Low-noise developer jobs. Remote, backend, Laravel, React, DevOps, and practical engineering roles.">

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght=400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8f5e9;
            color: #1f2937;
        }

        [x-cloak] {
            display: none !important;
        }

        .sticky-note {
            background: #fff4a8;
            border: 1px solid #e7d970;
            box-shadow:
                0 2px 4px rgba(0,0,0,0.06),
                0 8px 24px rgba(0,0,0,0.08);
        }

        .paper-card {
            background: white;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 2px rgba(0,0,0,0.04);
        }

        .job-card:hover {
            transform: translateY(-1px);
            transition: 120ms ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .office-grid {
            background-image:
                linear-gradient(rgba(0,0,0,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,0,0,0.03) 1px, transparent 1px);
            background-size: 24px 24px;
        }
    </style>
</head>

<body class="min-h-screen office-grid">

<!-- Global Application State Root Container -->
<div x-data="{
    mobileMenu: false,
    filtersOpen: false,
    search: '',
    activeFilters: [],
    jobs: [],

    init() {
        fetch('/api/v1/jobs')
  .then(res => { if (!res.ok) throw new Error(res.status); return res.json(); })
  .then(({ data, meta }) => {
    this.jobs = data;
    this.hasMore = meta.has_more;
})
  .catch(() => { this.fetchError = true; });
    },

    toggleFilter(filter) {
        if (this.activeFilters.includes(filter)) {
            this.activeFilters = this.activeFilters.filter(f => f !== filter)
        } else {
            this.activeFilters.push(filter)
        }
    },

    filteredJobs() {
        return this.jobs.filter(job => {
            const matchesSearch = !this.search || 
                job.title.toLowerCase().includes(this.search.toLowerCase()) ||
                job.company.toLowerCase().includes(this.search.toLowerCase()) ||
                job.tags.some(tag => tag.toLowerCase().includes(this.search.toLowerCase()));

            const matchesFilters = this.activeFilters.length === 0 ||
                this.activeFilters.every(filter => job.tags.includes(filter));

            return matchesSearch && matchesFilters;
        });
    }
}">

    {{-- HEADER --}}
  <header class="sticky top-0 z-50 bg-[#f8f5e9]/90 backdrop-blur border-b border-black/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Brand -->
            <!-- Brand -->
<div class="flex items-center gap-6">
    
    <!-- POST JOB -->
    <a href="/post-job" class="flex items-center gap-3">
        <div class="sticky-note w-12 h-12 rounded-md flex flex-col items-center justify-center font-extrabold rotate-[-2deg] leading-none select-none">
            <span class="text-[12px] tracking-tighter uppercase">POST</span>
            <span class="text-[12px] mt-0.5 tracking-wide opacity-80">JOB</span>
        </div>
    </a>

    <!-- scranton.dev -->
    <a href="/" class="flex items-center gap-3">
        <div>
            <div class="font-extrabold text-lg tracking-tight text-gray-900">scranton.dev</div>
            <div class="text-xs text-gray-500 -mt-1">World's Best JobBoard</div>
        </div>
    </a>

</div>


                {{-- Desktop Nav --}}
                <nav class="hidden md:flex items-center gap-6 text-sm text-gray-700">
                    <a href="#jobs" class="hover:text-black font-medium transition">Test</a>
                    <a href="#newsletter" class="hover:text-black font-medium transition">2</a>
      
                    <a href="/jobs" class="hover:text-black font-medium transition">More Jobs</a>
                    <a href="/pa/scrantonpa" class="hover:text-black font-medium transition">Companies</a>
                    <a href="#remote" class="hover:text-black font-medium transition">Remote</a>
                    <a href="#newsletter" class="hover:text-black font-medium transition">Newsletter</a>
                </nav>
                {{-- Actions --}}
                <div class="flex items-center gap-3">
                    <a href="/post-job" class="hidden sm:inline-flex items-center rounded-lg bg-gray-900 text-white px-4 py-2 text-sm font-semibold hover:opacity-90 transition">
                        Post Job
                    </a>

                    {{-- Mobile Menu Trigger --}}
                    <button @click="mobileMenu = !mobileMenu" class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg border border-black/10 bg-white">
                       
                          <div class="sticky-note w-11 h-11 rounded-md flex items-center justify-center font-extrabold text-sm rotate-[-2.5deg]">
                        <svg x-show="!mobileMenu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg x-show="mobileMenu" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    </button>
                </div>
            </div>
        </div>

        {{-- MOBILE MENU --}}
        <div x-show="mobileMenu" x-cloak class="md:hidden border-t border-black/10 bg-[#f8f5e9]">
            <div class="px-4 py-4 flex flex-col gap-2 text-sm">
                <a @click="mobileMenu = false" href="#jobs" class="rounded-lg px-4 py-3 hover:bg-black/5 font-medium">Jobs</a>
                <a @click="mobileMenu = false" href="/pa/scrantonpa" class="rounded-lg px-4 py-3 hover:bg-black/5 font-medium">Companies</a>
                <a @click="mobileMenu = false" href="#newsletter" class="rounded-lg px-4 py-3 hover:bg-black/5 font-medium">option3</a>
                <a @click="mobileMenu = false" href="#newsletter" class="rounded-lg px-4 py-3 hover:bg-black/5 font-medium">Newsletter</a>
                <a href="#" class="mt-2 text-center rounded-lg bg-gray-900 text-white px-4 py-3 font-semibold">Post Job</a>
            </div>
        </div>
    </header>

    {{-- HERO --}}
    <section class="relative overflow-hidden border-b border-black/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 sticky-note rounded-md px-4 py-2 text-sm font-semibold rotate-[-1deg] mb-4">
                        📝 Low-noise jobs for normal developers
                    </div>
                    

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight text-gray-900">
    The Scranton Branch<br>of Software Engineering
</h1>

<p class="mt-4 text-lg text-gray-700 leading-relaxed max-w-2xl">
    Regional‑Manager‑Approved developer jobs. 
    Corporate‑friendly. Developer‑tolerable. 
    Powered by coffee, sticky notes, and questionable management decisions.
</p>

<div class="mt-6 flex flex-wrap gap-3 text-sm">
    <div class="sticky-note px-4 py-2 rounded-md font-semibold rotate-[-1deg]">
        Scrappy Jobs for Scrappy Devs
    </div>
    <div class="sticky-note px-4 py-2 rounded-md font-semibold rotate-[1deg]">
        Paperwork‑Free Hiring
    </div>
    <div class="sticky-note px-4 py-2 rounded-md font-semibold rotate-[1deg]">
        Your New Favorite Office Supply: A Job Board
    </div>
</div>


                    <div class="mt-8 flex flex-wrap gap-3 text-sm">
                        
                        <div class="sticky-note px-4 py-2 rounded-md font-semibold rotate-[-1deg]">HR-Friendly</div>
                        <div class="sticky-note px-4 py-2 rounded-md font-semibold rotate-[1deg]">Remote, Hybrid, On-site</div>
                    </div>
                </div>

                {{-- Decorative Stiky Note Stack --}}
                <div class="relative hidden lg:flex justify-center">
                    <div class="absolute top-10 left-20 sticky-note w-64 p-5 rounded-md rotate-[-6deg]">
                        <div class="text-xs uppercase font-bold text-gray-500 mb-2">Hiring</div>
                        <div class="font-bold text-lg">Senior PHP Engineer</div>
                        <div class="text-sm text-gray-700 mt-2">Remote • $160k</div>
                    </div>

                 

                    <div class="sticky-note w-72 p-6 rounded-md rotate-[-2deg] mt-24">
                        <div class="text-xs uppercase font-bold text-gray-500 mb-2">World's Best Dev Jobs</div>
                        <div class="font-bold text-2xl leading-tight">Less hustle / hype.<br>More actual jobs.</div>
                                                <div class="text-sm text-gray-700 mt-2">Hybrid •  ElectricCity</div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- UNIFIED INTERACTIVE SEARCH + FILTERS --}}
    <section id="jobs" class="py-2 border-b border-black/10 bg-white backdrop-blur-md sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex flex-col lg:flex-row lg:items-center gap-3">
                {{-- Unified Functional Input Group --}}
                <div class="flex gap-3">
<div class="relative flex-1 lg:max-w-xs">
                            <input 
                            type="text"
                            x-model="search"
                            placeholder="Search jobs, companies, keywords..."
                            class="w-full rounded-2xl border border-black/10 bg-white px-4 py-2 pl-12 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-300 transition"
                        >
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-lg select-none">🔎</div>
                    </div>

                    {{-- Mobile Pill-Drawer Toggle Button --}}
                    <button 
                        @click="filtersOpen = !filtersOpen"
                        class="sm:hidden inline-flex items-center justify-center rounded-2xl border border-black/10 bg-white px-4 font-semibold text-gray-800 transition active:scale-95"
                        :class="activeFilters.length > 0 ? 'bg-yellow-100 border-yellow-400' : ''"
                    >
                        Filters <span class="ml-1 bg-gray-900 text-white rounded-full text-xs px-2 py-0.5" x-show="activeFilters.length" x-text="activeFilters.length"></span>
                    </button>
                </div>

                {{-- Reactive Filtering Pills Layout --}}
                <div 
                    :class="filtersOpen ? 'flex' : 'hidden sm:flex'" 
                    class="flex-wrap gap-2.5 transition-all duration-200"
                >
                    <template x-for="filter in ['Remote','Hybrid','Laravel','React','PHP','Senior','Frontend','Backend','DevOps']" :key="filter">
                        <button
                            @click="toggleFilter(filter)"
                            :class="activeFilters.includes(filter)
                                ? 'bg-gray-900 text-white border-gray-900 shadow-sm'
                                : 'bg-white text-gray-700 border-black/10 hover:bg-gray-50'"
                            class="px-4 py-2 rounded-full text-xs font-semibold border transition active:scale-95 select-none"
                        >
                            <span x-text="filter"></span>
                        </button>
                    </template>
                </div>

            </div>
        </div>
    </section>

    {{-- SYSTEM RESULTS VIEW --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-900">Featured / LatestDeveloper Jobs</h2>
                <p class="text-gray-600 mt-1">Curated positions.</p>
            </div>
            <div class="text-sm text-gray-500 font-semibold bg-white border border-black/5 rounded-xl px-3 py-1.5 shadow-sm">
                <span class="text-gray-900" x-text="filteredJobs().length"></span> matches
            </div>
        </div>

        {{-- Dynamic Reactive Feed Container --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 items-start">    

            <template x-for="job in filteredJobs()" :key="job.id">
                <div class="paper-card job-card rounded-3xl p-6 transition flex flex-col gap-4">

                    <div class="flex flex-col h-full justify-between gap-4">                        
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center justify-between gap-2 mb-1">
    <h3 class="text-xl font-extrabold text-gray-900 leading-tight" x-text="job.title"></h3>
    <div class="flex items-center gap-2 flex-shrink-0">
        <div class="sticky-note px-2 py-0.5 rounded-md text-xs font-bold rotate-[-1deg]"
             x-text="job.location.includes('Remote') ? 'REMOTE' : 'HIRING'"></div>
        <div class="text-xs text-gray-400 font-medium" x-text="job.posted"></div>
    </div>
</div>
  <div class="mt-2 text-gray-600 font-medium" x-text="`${job.company} • ${job.location} • ${job.salary}`"></div>
       <p class="mt-3 text-gray-500 text-sm leading-relaxed max-w-xl" x-text="job.description.substring(0, 120) + '...'"></p>

<div class="mt-4 flex flex-wrap gap-2">
    <template x-for="tag in job.tags.slice(0, 3)" :key="tag">
        <div class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-medium border border-black/5" x-text="tag"></div>
    </template>
    <span x-show="job.tags.length > 3" class="text-xs text-gray-400 flex items-center" x-text="'+' + (job.tags.length - 3) + ' more'"></span>
</div>
                            </div>
                        </div>

                        <div class="flex flex-row gap-3 justify-end">
                            <a :href="job.url" class="flex-1 text-center inline-flex items-center justify-center rounded-xl bg-gray-900 text-white px-4 py-2 font-semibold hover:opacity-90 transition">
    View 
</a>
                            <button class="flex-1 text-center inline-flex items-center justify-center rounded-xl border border-black/10 bg-white px-4 py-2 font-medium hover:bg-gray-50 transition">
                                Save
                            </button>
                        </div>

                    </div>
                </div>
            </template>

            {{-- Empty Search Results State --}}
            <div x-show="filteredJobs().length === 0" x-cloak class="text-center py-16 paper-card rounded-3xl">
                <div class="text-4xl mb-3">📭</div>
                <h4 class="font-bold text-lg text-gray-900">No matches found</h4>
                <p class="text-gray-500 text-sm mt-1">Try adjusting your keywords or clearing out your active tag filters.</p>
                <button @click="search = ''; activeFilters = []" class="mt-4 text-sm font-semibold bg-gray-900 text-white px-4 py-2 rounded-xl hover:opacity-90 transition">
                    Reset Engine
                </button>
            </div>
        </div>

        {{-- viewjobs INTERACTIVE CTA --}}
       <div class="mt-12 flex justify-center" x-show="filteredJobs().length > 0">
    <a href="/jobs" 
       class="sticky-note rounded-md px-8 py-4 font-extrabold text-gray-900 rotate-[-1deg] hover:rotate-0 transition shadow-md">
        Load More Jobs
    </a>
</div>
    </main>

    {{-- NEWSLETTER SUBSCRIPTION --}}
    <section id="newsletter" class="py-20 border-t border-black/10 bg-white/60">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="sticky-note inline-block px-4 py-2 rounded-md rotate-[-1deg] font-bold mb-6">Weekly Email</div>
            <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">Jobs worth applying to.</h2>
            <p class="mt-5 text-lg text-gray-700 max-w-2xl mx-auto leading-relaxed">
                One weekly email with curated developer jobs, remote roles, and practical engineering opportunities.
            </p>

            <form class="mt-8 flex flex-col sm:flex-row gap-4 max-w-2xl mx-auto" @submit.prevent="alert('Subscribed successfully!')">
                <input type="email" required placeholder="you@example.com" class="flex-1 rounded-2xl border border-black/10 bg-white px-5 py-4 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                <button type="submit" class="rounded-2xl bg-gray-900 text-white px-8 py-4 font-bold hover:opacity-90 transition">
                    Subscribe
                </button>
            </form>
        </div>
    </section>

{{-- FOOTER LAYER --}}
<footer class="border-t border-black/10 bg-[#f3eed9]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 py-8">

        {{-- TOP ROW --}}
        <div class="flex flex-col lg:flex-row gap-10 lg:items-start lg:justify-between">

            {{-- BRAND --}}
            <div>
                <div class="font-extrabold text-lg text-gray-900">scranton.dev</div>
                <div class="text-xs text-gray-600 mt-2 max-w-md leading-relaxed">
                    Structured developer jobs, companies, and hiring signals — without recruiter noise.
                </div>
            </div>

            {{-- IA: CORE PRODUCT LAYERS --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-8 text-sm">

                {{-- Jobs Layer --}}
                <div>
                    <div class="font-bold text-gray-900 mb-3">Jobs</div>
                    <div class="flex flex-col gap-2 text-gray-600">
                        <a href="/jobs" class="hover:text-black">All Jobs</a>
                        <a href="/jobs/remote" class="hover:text-black">Remote</a>
                        <a href="/jobs/backend" class="hover:text-black">Backend</a>
                        <a href="/jobs/frontend" class="hover:text-black">Frontend</a>
                        <a href="/jobs/devops" class="hover:text-black">DevOps</a>
                    </div>
                </div>

                {{-- Companies Layer --}}
                <div>
                    <div class="font-bold text-gray-900 mb-3">Companies</div>
                    <div class="flex flex-col gap-2 text-gray-600">
                        <a href="/companies" class="hover:text-black">All Companies</a>
                        <a href="/companies/active" class="hover:text-black">Hiring Now</a>
                        <a href="/companies/startups" class="hover:text-black">Startups</a>
                        <a href="/companies/enterprise" class="hover:text-black">Enterprise</a>
                    </div>
                </div>

                {{-- Geography / SEO Layer --}}
                <div>
                    <div class="font-bold text-gray-900 mb-3">Locations</div>
                    <div class="flex flex-col gap-2 text-gray-600">
                        <a href="/dev-jobs/new-york" class="hover:text-black">New York</a>
                        <a href="/dev-jobs/chicago" class="hover:text-black">Chicago</a>
                  
                        <a href="/dev-jobs/san-francisco" class="hover:text-black">BayArea, CA</a>
                       <a href="/dev-jobs/canada" class="hover:text-black">Ontario, CAnada</a>

                        <a href="/dev-jobs/india" class="hover:text-black">Bengaluru, India</a>
                              <a href="/dev-jobs/austin" class="hover:text-black">More Locations</a>
                    </div>
                </div>

                {{-- Monetization Layer --}}
                <div>
                    <div class="font-bold text-gray-900 mb-3">Sponsors</div>
                    <div class="flex flex-col gap-2 text-gray-600">
                        <a href="/sponsors" class="hover:text-black">All Sponsors</a>
                        <a href="/sponsorships/featured" class="hover:text-black">Featured Jobs</a>
                        <a href="/sponsorships/homepage" class="hover:text-black">Homepage Slots</a>
                        <a href="/post-job" class="hover:text-black">Post a Job</a>
                    </div>
                </div>

                {{-- Differentiation Layer (your moat) --}}
                <div>
                    <div class="font-bold text-gray-900 mb-3">Firsts</div>
                    <div class="flex flex-col gap-2 text-gray-600">
                        <a href="/firsts" class="hover:text-black">All Firsts</a>
                        <a href="/firsts/first-job-posted" class="hover:text-black">First Job</a>
                        <a href="/firsts/first-sponsor" class="hover:text-black">First Sponsor</a>
                        <a href="/firsts/first-company" class="hover:text-black">First Company</a>
                    </div>
                </div>

<div>
                    <div class="font-bold text-gray-900 mb-3">Firsts</div>
                    <div class="flex flex-col gap-2 text-gray-600">
                        <a href="/firsts" class="hover:text-black">All Firsts</a>
                        <a href="/firsts/first-job-posted" class="hover:text-black">First Job</a>
                        <a href="/firsts/first-sponsor" class="hover:text-black">First Sponsor</a>
                        <a href="/firsts/first-company" class="hover:text-black">First Company</a>
                    </div>
                </div>


            </div>
        </div>

        {{-- BOTTOM ROW --}}
        <div class="mt-12 pt-6 border-t border-black/10 flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between text-xs text-gray-500">

            <div>
                &copy; 2026 scranton.dev | structured job graph for developers
            </div>

            <div class="flex flex-col sm:flex-row gap-2 sm:gap-6">
                <a href="/firsts" class="hover:text-black">
                    First jobs → platform origin story
                </a>
                <a href="/about" class="hover:text-black">
                    About
                </a>
                <a href="/api" class="hover:text-black">
                    API
                </a>
            </div>

        </div>

    </div>
</footer>
</div>

</body>
</html>