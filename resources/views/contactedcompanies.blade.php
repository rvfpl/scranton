angielski.dev
CODEMA - codema.io (june 26,26)
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The premier developer directory and hybrid job feed for the San Francisco Bay Area and Silicon Valley.">
    <meta name="robots" content="index, follow">
    <title>The Bay Area Dev Directory | thebay.dev</title>
    
    <!-- Tailwind CSS for modern, rapid layouts -->
    <script src="https://tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        baySlate: '#0f172a', /* Deep tech slate blue base */
                        bayNeon: '#38bdf8',  /* High-visibility active blue */
                        nyOrange: '#f97316'  /* Contrast brand color for the NY sister site */
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-baySlate text-slate-100 font-sans antialiased min-h-screen flex flex-col">

    <!-- HEADER / NAVIGATION -->
    <header class="sticky top-0 z-50 bg-baySlate/90 backdrop-blur-md border-b border-slate-800">
        <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
            
            <!-- Logo Brand -->
            <a href="#" class="text-xl font-black tracking-tight flex items-center gap-1.5 hover:opacity-90">
                <span class="text-bayNeon">thebay</span><span class="text-slate-400">.dev</span>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-300">
                <a href="#jobs" class="hover:text-bayNeon transition-colors">Hybrid Jobs</a>
                <a href="#directory" class="hover:text-bayNeon transition-colors">Startup Index</a>
                <a href="https://newyork.dev" target="_blank" rel="noopener" class="text-nyOrange hover:underline flex items-center gap-1">
                    New York Network ↗
                </a>
            </nav>

            <!-- Desktop CTA -->
            <div class="hidden md:block">
                <a href="#post" class="bg-bayNeon text-baySlate font-bold px-4 py-2 rounded-lg text-sm hover:bg-sky-300 transition-colors">
                    Post a Job ($99)
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <button id="menuBtn" class="md:hidden p-2 text-slate-300 hover:text-white focus:outline-none" aria-label="Toggle navigation menu">
                <svg id="menuIconClose" class="hidden w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                <svg id="menuIconOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>

        <!-- Mobile Drawer Overlay Menu -->
        <div id="mobileMenu" class="hidden md:hidden border-t border-slate-800 bg-baySlate px-4 py-6 space-y-4 shadow-xl">
            <nav class="flex flex-col gap-4 text-base font-medium">
                <a href="#jobs" class="text-slate-300 hover:text-bayNeon transition-colors">Hybrid Jobs</a>
                <a href="#directory" class="text-slate-300 hover:text-bayNeon transition-colors">Startup Index</a>
                <a href="https://newyork.dev" target="_blank" rel="noopener" class="text-nyOrange hover:text-orange-400 transition-colors flex items-center gap-1 py-2 border-t border-slate-800">
                    New York Network ↗
                </a>
            </nav>
            <div class="pt-4">
                <a href="#post" class="block text-center bg-bayNeon text-baySlate font-bold px-4 py-3 rounded-lg text-sm hover:bg-sky-300 transition-colors">
                    Post a Job ($99)
                </a>
            </div>
        </div>
    </header>

    <main class="flex-grow max-w-6xl mx-auto w-full px-4 py-8 space-y-12">

        <!-- HERO SECTION -->
        <section class="text-center max-w-3xl mx-auto space-y-6 pt-4">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-white leading-tight">
                The Bay Area Dev Directory
            </h1>
            <p class="text-base md:text-lg text-slate-400 max-w-2xl mx-auto leading-relaxed">
                Your direct line to Silicon Valley and San Francisco hybrid engineering roles, active tech infrastructure, and regional developer networks.
            </p>

            <!-- Search Matrix Bar Component -->
            <div class="bg-slate-900 border border-slate-800 p-2 rounded-xl shadow-2xl max-w-2xl mx-auto flex flex-col sm:flex-row gap-2">
                <input type="text" placeholder="Role or Tech Stack (e.g. PyTorch, React)" class="bg-transparent text-sm text-white placeholder-slate-500 focus:outline-none p-3 flex-grow rounded-lg">
                <select class="bg-slate-800 text-sm text-slate-300 focus:outline-none p-3 rounded-lg cursor-pointer border-r border-transparent">
                    <option value="">All Bay Hubs</option>
                    <option value="sf">SF Proper (SOMA / Hayes)</option>
                    <option value="peninsula">Peninsula (Caltrain Route)</option>
                    <option value="south-bay">South Bay (Palo Alto / SJ)</option>
                    <option value="east-bay">Oakland / East Bay</option>
                </select>
                <button class="bg-bayNeon text-baySlate font-bold px-6 py-3 rounded-lg text-sm hover:bg-sky-300 transition-colors shrink-0">
                    Search Hub
                </button>
            </div>
        </section>

        <!-- HYBRID FEED / JOB COMPONENT -->
        <section id="jobs" class="space-y-4">
            <div class="flex items-center justify-between border-b border-slate-800 pb-2">
                <h2 class="text-lg font-bold uppercase tracking-wider text-slate-400">Live Commuter Grid</h2>
                <span class="text-xs bg-slate-800 text-bayNeon px-2.5 py-1 rounded-full font-mono">Updated Daily</span>
            </div>

            <!-- Programmatic Mock Job List Block -->
            <div class="space-y-3">
                
                <!-- Card 1: SF Proper AI -->
                <div class="bg-slate-900/50 border border-slate-800 p-4 rounded-xl flex flex-col md:flex-row justify-between items-start md:items-center gap-4 hover:border-slate-700 transition-all">
                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="text-xs font-mono px-2 py-0.5 rounded bg-emerald-950 text-emerald-400 border border-emerald-800">🤖 SF AI Wave</span>
                            <span class="text-xs font-mono text-slate-400">3 Days Hybrid</span>
                        </div>
                        <h3 class="text-base font-bold text-white mt-1.5">Senior ML Infrastructure Engineer</h3>
                        <p class="text-xs text-slate-400">Anyscale Core Lab • Hayes Valley, SF</p>
                    </div>
                    <a href="#" class="w-full md:w-auto text-center border border-slate-700 text-slate-300 text-xs font-semibold px-4 py-2 rounded-lg hover:bg-slate-800 transition-colors">Apply</a>
                </div>

                <!-- Card 2: Peninsula / Caltrain -->
                <div class="bg-slate-900/50 border border-slate-800 p-4 rounded-xl flex flex-col md:flex-row justify-between items-start md:items-center gap-4 hover:border-slate-700 transition-all">
                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="text-xs font-mono px-2 py-0.5 rounded bg-sky-950 text-sky-400 border border-sky-900">🌲 Caltrain Line</span>
                            <span class="text-xs font-mono text-slate-400">2 Days Hybrid</span>
                        </div>
                        <h3 class="text-base font-bold text-white mt-1.5">Staff Distributed Systems Architect</h3>
                        <p class="text-xs text-slate-400">Scale AI Matrix • Palo Alto, CA</p>
                    </div>
                    <a href="#" class="w-full md:w-auto text-center border border-slate-700 text-slate-300 text-xs font-semibold px-4 py-2 rounded-lg hover:bg-slate-800 transition-colors">Apply</a>
                </div>

            </div>
        </section>

        <!-- DEFENSIVE BI-COASTAL CROSS PROMOTION WIDGET -->
        <section class="border border-slate-800 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 p-6 md:p-8 flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl">
            <div class="space-y-2 max-w-xl text-center md:text-left">
                <span class="text-xs font-black tracking-widest text-nyOrange uppercase">Bi-Coastal Engineering Hub</span>
                <h3 class="text-xl md:text-2xl font-bold text-white tracking-tight">Operating on Both Coasts?</h3>
                <p class="text-sm text-slate-400 leading-relaxed">
                    Relocating between major US technology clusters or targeting the Atlantic tech surge? Flip over to our flagship sister network at <strong class="text-slate-200">newyork.dev</strong> to view local infrastructure, hybrid roles, and tech grids across Manhattan and Brooklyn.
                </p>
            </div>
            <a href="https://newyork.dev" target="_blank" rel="noopener" class="w-full md:w-auto whitespace-nowrap text-center bg-transparent border-2 border-nyOrange text-nyOrange font-extrabold px-6 py-3 rounded-xl text-sm hover:bg-nyOrange hover:text-white transition-all shadow-lg shadow-nyOrange/10">
                Switch to newyork.dev ↗
            </a>
        </section>


<footer class="bg-baySlate/90 backdrop-blur-md border-t border-slate-800 mt-12">
    <div class="max-w-6xl mx-auto px-4 py-6 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-slate-400">
        <span>© 2026 thebay.dev. All rights reserved.</span>
        <div class="flex gap-4">
            <a href="#privacy" class="hover:text-bayNeon transition-colors">Privacy Policy</a>
            <a href="#terms" class="hover:text-bayNeon transition-colors">Terms of Service</a>
        </div>
    </div>
    </footer>

    </main>
</body>
</html>
