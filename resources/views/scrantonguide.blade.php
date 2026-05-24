<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>scranton.dev — World's Best Dev Job Board</title>
    <meta name="description" content="Low-noise developer jobs. Remote, backend, Laravel, React, DevOps, and practical engineering roles.">

    <script src="https://cdn.tailwindcss.com"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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

<div x-data="{
    mobileMenu: false,
    filtersOpen: false,
    search: '',
    activeFilters: [],
    jobs: [],
    hasMore: false,
    fetchError: false,

    init() {
        fetch('/api/v1/jobs')
            .then(res => { if (!res.ok) throw new Error(res.status); return res.json(); })
            .then(({ data, meta }) => {
                this.jobs = data;
                this.hasMore = meta?.has_more || false;
            })
            .catch(() => { this.fetchError = true; });
    },

    toggleFilter(filter) {
        if (this.activeFilters.includes(filter)) {
            this.activeFilters = this.activeFilters.filter(f => f !== filter);
        } else {
            this.activeFilters.push(filter);
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

    <header class="sticky top-0 z-50 bg-[#f8f5e9]/90 backdrop-blur border-b border-black/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <div class="flex items-center gap-6">
                    <a href="/post-job" class="flex items-center gap-3">
                        <div class="sticky-note w-12 h-12 rounded-md flex flex-col items-center justify-center font-extrabold rotate-[-2deg] leading-none select-none">
                            <span class="text-[12px] tracking-tighter uppercase">POST</span>
                            <span class="text-[12px] mt-0.5 tracking-wide opacity-80">JOB</span>
                        </div>
                    </a>

                    <a href="/" class="flex items-center gap-3">
                        <div>
                            <div class="font-extrabold text-lg tracking-tight text-gray-900">scranton.dev</div>
                            <div class="text-xs text-gray-500 -mt-1">World's Best Job Board</div>
                        </div>
                    </a>
                </div>

                <nav class="hidden md:flex items-center gap-6 text-sm text-gray-700">
                    <a href="#jobs" class="hover:text-black font-medium transition">Find Jobs</a>
                    <a href="/jobs" class="hover:text-black font-medium transition">Browse All</a>
                    <a href="/pa/scrantonpa" class="hover:text-black font-medium transition">Companies</a>
                    <a href="#newsletter" class="hover:text-black font-medium transition">Newsletter</a>
                </nav>

                <div class="flex items-center gap-3">
                    <a href="/post-job" class="hidden sm:inline-flex items-center rounded-lg bg-gray-900 text-white px-4 py-2 text-sm font-semibold hover:opacity-90 transition">
                        Post Job
                    </a>

                    <button @click="mobileMenu = !mobileMenu" class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg border border-black/10 bg-white" aria-label="Toggle Menu">
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

        <div x-show="mobileMenu" x-cloak class="md:hidden border-t border-black/10 bg-[#f8f5e9]">
            <div class="px-4 py-4 flex flex-col gap-2 text-sm">
                <a @click="mobileMenu = false" href="#jobs" class="rounded-lg px-4 py-3 hover:bg-black/5 font-medium">Jobs</a>
                <a @click="mobileMenu = false" href="/pa/scrantonpa" class="rounded-lg px-4 py-3 hover:bg-black/5 font-medium">Companies</a>
                <a @click="mobileMenu = false" href="#newsletter" class="rounded-lg px-4 py-3 hover:bg-black/5 font-medium">Newsletter</a>
                <a href="/post-job" class="mt-2 text-center rounded-lg bg-gray-900 text-white px-4 py-3 font-semibold">Post Job</a>
            </div>
        </div>
    </header>

    <section class="relative overflow-hidden border-b border-black/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
            <div class="grid lg:grid-cols-1 gap-10 items-center">

                <div>

<div class="inline-flex items-center gap-2 sticky-note rounded-md px-4 py-2 text-sm font-semibold rotate-[-1deg] mb-4">
    💡 Electric City: Silicon Valley of 
    <span class="md:hidden">NEPA</span>
    <span class="hidden md:inline">NE Pennsylvania</span>
</div>

<section class="py-20 bg-white border-t border-black/10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="sticky-note inline-block px-4 py-2 rounded-md rotate-[-1deg] font-bold mb-6">
            Thinking of relocating?
        </div>

        <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">
            Why Scranton?
        </h2>

        <p class="mt-4 text-lg text-gray-700 leading-relaxed max-w-2xl">
            Scranton, PA — also known as the Electric City — is a place where 
            developers can enjoy low‑noise living, high‑signal coffee, and 
            a cost of living that won’t require VC funding.
        </p>

        <div class="mt-10 grid sm:grid-cols-2 gap-10">

            <!-- Cost of Living -->
            <div>
                <h3 class="font-bold text-gray-900 mb-2">Cost of Living</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Rent that doesn’t require a Series A.  
                    Groceries priced like it’s still 2014.  
                    A city where “commute” means 12 minutes, not a podcast season.
                </p>
            </div>

            <!-- Local Universities -->
            <div>
                <h3 class="font-bold text-gray-900 mb-2">Local Universities</h3>
                <ul class="text-gray-600 text-sm leading-relaxed space-y-1">
                    <li>• University of Scranton</li>
                    <li>• Penn State Scranton</li>
                    <li>• Marywood University</li>
                    <li>• Lackawanna College</li>
                </ul>
                <p class="text-gray-500 text-xs mt-1">Plenty of future interns.</p>
            </div>

            <!-- Outdoors -->
            <div>
                <h3 class="font-bold text-gray-900 mb-2">Outdoors & Recreation</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Trails, mountains, ski slopes, and parks — all within 20 minutes.  
                    Perfect for devs who occasionally remember to touch grass.
                </p>
            </div>

            <!-- Local Culture -->
            <div>
                <h3 class="font-bold text-gray-900 mb-2">Local Culture</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Pizza that locals will debate about for hours.  
                    Coffee shops with actual outlets.  
                    A downtown that’s walkable, but only if you’re motivated.
                </p>
            </div>

            <!-- Employers -->
            <div>
                <h3 class="font-bold text-gray-900 mb-2">Employers & Tech Scene</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Healthcare, logistics, finance, and a growing startup ecosystem.  
                    Not quite Silicon Valley — more like Silicon Valley’s 
                    responsible cousin who owns a reliable Pickup... or Subaru.
                </p>
            </div>

            <!-- Travel -->
            <div>
                <h3 class="font-bold text-gray-900 mb-2">Travel & Access</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    NYC: 2 hours.  
                    Philly: 2 hours.  
                    Airport: surprisingly functional.  
                    Traffic: refreshingly absent.
                </p>
            </div>

        </div>

        <div class="mt-12">
            <div class="sticky-note px-4 py-3 rounded-md rotate-[1deg] font-bold inline-block">
                Scranton: High‑signal living for sensible developers.
            </div>
        </div>

    </div>
</section>

    

    <footer class="border-t border-black/10 bg-[#f3eed9]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 py-8">
            <div class="flex flex-col lg:flex-row gap-10 lg:items-start lg:justify-between">

                <div>
                    <div class="font-extrabold text-lg text-gray-900">scranton.dev</div>
                    <div class="text-xs text-gray-600 mt-2 max-w-md leading-relaxed">
                        Structured developer jobs, companies, and hiring signals — without recruiter noise.
                    </div>
                    <div class="font-extrabold text-lg text-gray-900 mt-8">CONTACT</div>
                    <div class="text-xs text-gray-600 mt-2 max-w-md leading-relaxed">
                        office@scranton.dev
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-8 text-sm">
                    <div>
                        <div class="font-bold text-gray-900 mb-3">Jobs</div>
                        <div class="flex flex-col gap-2 text-gray-600">
                            <a href="/jobs" class="hover:text-black">All Jobs</a>
                            <a href="/jobs/remote" class="hover:text-black">Remote Roles</a>
                            <a href="/jobs/backend" class="hover:text-black">Backend</a>
                            <a href="/jobs/frontend" class="hover:text-black">Frontend</a>
                            <a href="/jobs/devops" class="hover:text-black">DevOps</a>
                        </div>
                    </div>

                    <div>
                        <div class="font-bold text-gray-900 mb-3">Companies</div>
                        <div class="flex flex-col gap-2 text-gray-600">
                            <a href="/companies" class="hover:text-black">All Companies</a>
                            <a href="/companies/active" class="hover:text-black">Hiring Now</a>
                            <a href="/companies/startups" class="hover:text-black">Startups</a>
                            <a href="/companies/enterprise" class="hover:text-black">Enterprise</a>
                        </div>
                    </div>

                    <div>
                        <div class="font-bold text-gray-900 mb-3">Locations</div>
                        <div class="flex flex-col gap-2 text-gray-600">
                            <a href="/dev-jobs/new-york" class="hover:text-black">New York</a>
                            <a href="/dev-jobs/chicago" class="hover:text-black">Chicago</a>
                            <a href="/dev-jobs/san-francisco" class="hover:text-black">Bay Area, CA</a>
                            <a href="/dev-jobs/canada" class="hover:text-black">Ontario, CA</a>
                            <a href="/dev-jobs/india" class="hover:text-black">Bengaluru, IN</a>
                        </div>
                    </div>

                    <div>
                        <div class="font-bold text-gray-900 mb-3">Sponsors</div>
                        <div class="flex flex-col gap-2 text-gray-600">
                            <a href="/sponsors" class="hover:text-black">All Sponsors</a>
                            <a href="/sponsorships/featured" class="hover:text-black">Featured Jobs</a>
                            <a href="/sponsorships/homepage" class="hover:text-black">Homepage Slots</a>
                            <a href="/post-job" class="hover:text-black">Post a Job</a>
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

<div>
    <div class="font-bold text-gray-900 mb-3">Scranton / NEPA</div>
    <div class="flex flex-col gap-2 text-gray-600">
        <a href="https://www.scranton.edu" target="_blank" class="hover:text-black">University of Scranton</a>
        <a href="https://scranton.psu.edu" target="_blank" class="hover:text-black">Penn State Scranton</a>
        <a href="https://www.marywood.edu" target="_blank" class="hover:text-black">Marywood University</a>
        <a href="https://www.visitnepa.org" target="_blank" class="hover:text-black">Visit NEPA</a>
        <a href="https://www.discovernepa.com" target="_blank" class="hover:text-black">Local Guide</a>
        <a href="scrantonguide" class="text-xs text-gray-500 mb-2">Thinking of relocating?</a>
    </div>
</div>


                </div>

            </div>

            <div class="mt-12 pt-6 border-t border-black/10 flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between text-xs text-gray-500">
                <div>
                    &copy; 2026 scranton.dev | Structured job graph for developers. All rights reserved.
                </div>
                <div class="flex gap-2 sm:gap-6">
                    <a href="/firsts" class="hover:text-black">Origin Story</a>
                    <a href="/about" class="hover:text-black">About</a>
                    <a href="/api" class="hover:text-black">API</a>
                </div>
            </div>
        </div>
    </footer>

</div>
</body>
</html>