<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheBay.dev — Developer Jobs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', system-ui, sans-serif; }
        .job-card { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .job-card:hover { transform: translateY(-8px); box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1); }
    </style>
</head>
<body class="bg-zinc-950 text-zinc-200">

    <!-- HEADER -->
    <header class="sticky top-0 z-50 bg-zinc-900 border-b border-zinc-800">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <span class="text-3xl font-bold bg-gradient-to-r from-violet-500 to-fuchsia-500 bg-clip-text text-transparent">TheBay.dev</span>
            </div>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="#" class="hover:text-white transition">Jobs</a>
                <a href="#" class="hover:text-white transition">Startups</a>
                <a href="#" class="hover:text-white transition">Spotlight</a>
                <a href="#" class="hover:text-white transition">For Recruiters</a>
            </nav>

            <div class="flex items-center gap-4">
                <button onclick="togglePostModal()" 
                        class="hidden sm:flex items-center gap-2 bg-white text-black px-5 py-2.5 rounded-2xl font-semibold text-sm hover:bg-zinc-200 transition">
                    <i class="fa-solid fa-plus"></i>
                    Post a Job
                </button>
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"
                        class="md:hidden text-2xl">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-zinc-900 border-t border-zinc-800">
            <div class="px-6 py-6 flex flex-col gap-4 text-lg">
                <a href="#" class="hover:text-white">Find Jobs</a>
                <a href="#" class="hover:text-white">Featured Startups</a>
                <a href="#" class="hover:text-white">Developer Spotlight</a>
                <a href="#" class="hover:text-white">Post a Job</a>
            </div>
        </div>
    </header>

    <!-- HERO -->
    <section class="bg-gradient-to-br from-zinc-900 via-zinc-950 to-black py-20">
        <div class="max-w-7xl mx-auto px-2 text-center">
            <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">
                Hire or Get Hired.  <span class="bg-gradient-to-r from-violet-400 to-pink-400 bg-clip-text text-transparent">Fast.</span>
            </h1>
            <p class="text-xl text-zinc-400 max-w-3xl mx-auto mb-10">
                The Bay Area's developer-first job board. No spam. Real opportunities.
            </p>

            <div class="max-w-xl mx-auto">
                <div class="relative">
                    <input type="text" id="search" 
                           class="w-full bg-zinc-900 border border-zinc-700 rounded-3xl px-8 py-6 text-lg focus:outline-none focus:border-violet-500 transition"
                           placeholder="Search roles, skills, or companies...">
                    <button onclick="searchJobs()" 
                            class="absolute right-3 top-1/2 -translate-y-1/2 bg-violet-600 hover:bg-violet-700 px-10 py-4 rounded-3xl font-semibold">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- FILTERS -->
    <div class="max-w-7xl mx-auto px-6 py-8 border-b border-zinc-800">
        <div class="flex flex-wrap gap-3">
            <select id="role" class="bg-zinc-900 border border-zinc-700 rounded-2xl px-5 py-3 text-sm">
                <option value="">All Roles</option>
                <option value="frontend">Frontend</option>
                <option value="backend">Backend</option>
                <option value="fullstack">Full Stack</option>
                <option value="mobile">Mobile</option>
                <option value="ai">AI / ML</option>
            </select>
            <select id="location" class="bg-zinc-900 border border-zinc-700 rounded-2xl px-5 py-3 text-sm">
                <option value="">Anywhere</option>
                <option value="remote">Remote</option>
                <option value="europe">Europe</option>
                <option value="usa">USA</option>
            </select>
            <select id="salary" class="bg-zinc-900 border border-zinc-700 rounded-2xl px-5 py-3 text-sm">
                <option value="">Salary Range</option>
                <option value="80k">$80k+</option>
                <option value="120k">$120k+</option>
                <option value="160k">$160k+</option>
            </select>
            <button onclick="applyFilters()" 
                    class="bg-white text-black px-8 py-3 rounded-2xl font-semibold text-sm hover:bg-zinc-200">
                Apply Filters
            </button>
        </div>
    </div>

    <!-- JOBS GRID -->
    <section class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="jobs-container">
            <!-- Populated by JS below -->
        </div>
    </section>

    <!-- SPOTLIGHT -->
    <section class="bg-zinc-900 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl font-bold mb-10 text-center">Developer Spotlight</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-zinc-800 rounded-3xl p-8">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl"></div>
                        <div>
                            <h4 class="font-semibold">Sarah Chen</h4>
                            <p class="text-sm text-zinc-400">Staff Engineer @ Vercel</p>
                        </div>
                    </div>
                    <p class="text-zinc-300">"Built my career through TheBay.dev. Best dev community out there."</p>
                </div>
                <!-- Add more spotlights as needed -->
            </div>
        </div>
    </section>

    <!-- VIDEO / FUN -->
    <section class="py-16 bg-black">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-8">Meet the team behind the best hires</h2>
            <div class="aspect-video bg-zinc-900 rounded-3xl overflow-hidden">
                <iframe width="100%" height="100%" 
                        src="https://www.youtube.com/embed/dQw4w9wgxcq" 
                        title="You know what it is" 
                        frameborder="0" allowfullscreen></iframe>
            </div>
            <p class="text-sm text-zinc-500 mt-4">Pro tip: Never trust a recruiter video without watching first 😉</p>
        </div>
    </section>

    <!-- NEWSLETTER -->
    <section class="py-20 bg-gradient-to-b from-zinc-900 to-black">
        <div class="max-w-xl mx-auto text-center px-6">
            <h2 class="text-4xl font-bold mb-4">Stay ahead in tech</h2>
            <p class="text-zinc-400 mb-8">Weekly curated developer jobs + salary reports. No bullshit.</p>
            
            <div class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                <input type="email" id="email" 
                       class="flex-1 bg-zinc-900 border border-zinc-700 rounded-3xl px-8 py-6 focus:outline-none focus:border-violet-500"
                       placeholder="your@dev.email">
                <button onclick="subscribe()" 
                        class="bg-white text-black font-semibold px-10 py-6 rounded-3xl hover:bg-zinc-100 transition">
                    Subscribe
                </button>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-black py-16 border-t border-zinc-800">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                <div>
                    <span class="text-2xl font-bold bg-gradient-to-r from-violet-500 to-fuchsia-500 bg-clip-text text-transparent">TheBay.dev</span>
                    <p class="text-zinc-500 text-sm mt-2">© 2026. Built for developers, by developers.</p>
                </div>
                <div class="flex gap-8 text-sm">
                    <a href="#" class="hover:text-white">Twitter</a>
                    <a href="#" class="hover:text-white">LinkedIn</a>
                    <a href="#" class="hover:text-white">Discord</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Post Job Modal -->
    <div id="post-modal" class="hidden fixed inset-0 bg-black/80 flex items-center justify-center z-[100]">
        <div class="bg-zinc-900 rounded-3xl p-8 max-w-lg w-full mx-4">
            <h3 class="text-2xl font-bold mb-6">Post a Job ($299 featured)</h3>
            <p class="text-zinc-400 mb-8">Get in front of 40k+ monthly active developers.</p>
            <button onclick="alert('Payment flow would go here (Stripe)')" 
                    class="w-full bg-gradient-to-r from-violet-600 to-fuchsia-600 py-6 rounded-2xl font-semibold text-lg">
                Pay & Post Now
            </button>
            <button onclick="togglePostModal()" class="w-full mt-3 text-zinc-400">Cancel</button>
        </div>
    </div>

    <script>
        // Sample Jobs
        const jobs = [
            { title: "Senior Frontend Engineer", company: "Linear", location: "Remote", salary: "180k–220k", type: "fullstack", featured: true },
            { title: "AI Engineer", company: "Anthropic", location: "SF / Remote", salary: "250k–380k", type: "ai" },
            { title: "Founding Mobile Engineer", company: "Stealth Startup", location: "Europe", salary: "120k–160k", type: "mobile" },
            { title: "Backend Engineer (Go)", company: "Supabase", location: "Remote", salary: "140k–190k", type: "backend" },
        ];

        function renderJobs(filteredJobs) {
            const container = document.getElementById('jobs-container');
            container.innerHTML = filteredJobs.map(job => `
                <div class="job-card bg-zinc-900 border border-zinc-800 rounded-3xl p-8 hover:border-violet-500">
                    ${job.featured ? `<div class="text-xs uppercase tracking-widest text-violet-400 mb-3">Featured</div>` : ''}
                    <h3 class="text-xl font-semibold mb-1">${job.title}</h3>
                    <p class="text-zinc-400">${job.company}</p>
                    <div class="flex gap-3 mt-6 text-sm">
                        <span class="bg-zinc-800 px-4 py-2 rounded-2xl">${job.location}</span>
                        <span class="bg-emerald-900 text-emerald-300 px-4 py-2 rounded-2xl">${job.salary}</span>
                    </div>
                    <button onclick="alert('Applied to ${job.title} at ${job.company}! (Demo)')" 
                            class="mt-8 w-full bg-white text-black py-4 rounded-2xl font-semibold hover:bg-zinc-100">
                        Easy Apply
                    </button>
                </div>
            `).join('');
        }

        function applyFilters() {
            const role = document.getElementById('role').value;
            let filtered = jobs;
            if (role) {
                filtered = jobs.filter(j => j.type === role);
            }
            renderJobs(filtered);
        }

        function searchJobs() {
            alert("Search would filter jobs in real app");
            renderJobs(jobs);
        }

        function togglePostModal() {
            document.getElementById('post-modal').classList.toggle('hidden');
        }

        function subscribe() {
            const email = document.getElementById('email').value;
            if (email) {
                alert("✅ Subscribed! (In real app this would go to ConvertKit / Beehiiv)");
            }
        }

        // Initial render
        renderJobs(jobs);
    </script>
</body>
</html>