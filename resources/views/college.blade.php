<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollegeStation.dev | Elite Engineering Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 text-slate-900" x-data="{ open: false }">

    <!-- Navigation -->
    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-indigo-600">CollegeStation.dev</span>
                </div>
                
                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="hover:text-indigo-600">Home</a>
                    <a href="/jobs" class="hover:text-indigo-600">Jobs</a>
                    <div class="relative" x-data="{ drop: false }">
                        <button @click="drop = !drop" class="flex items-center hover:text-indigo-600">Nodes ▾</button>
                        <div x-show="drop" @click.away="drop = false" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg p-2">
                            <a href="/dfw" class="block p-2 hover:bg-slate-100">DFW (Texas)</a>
                            <a href="/atx" class="block p-2 hover:bg-slate-100">Austin (Texas)</a>
                            <a href="/atx" class="block p-2 hover:bg-slate-100">Houston (Texas)</a>
                            <a href="/atx" class="block p-2 hover:bg-slate-100">SanAntonio (Texas)</a>
                            <a href="/atx" class="block p-2 hover:bg-slate-100">ElPaso (Texas)</a>
                            <a href="/atx" class="block p-2 hover:bg-slate-100">RGV (Texas)</a>
                        </div>
                    </div>
                </div>

                <!-- Hamburger Button -->
                <button class="md:hidden" @click="open = !open">☰</button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div x-show="open" class="md:hidden p-4 bg-slate-50 border-t">
            <a href="/" class="block py-2">Home</a>
            <a href="/jobs" class="block py-2">Jobs</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <header class="mb-12 text-center">
            <h1 class="text-4xl font-extrabold mb-4">Elite Engineering Talent (amongst others)</h1>
            <p class="text-slate-600">Connecting top-tier devs to high-impact opportunities.</p>
        </header>

        <section class="grid md:grid-cols-3 gap-8">
            <!-- Job Board -->
            <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-sm border">
                <h2 class="text-xl font-bold mb-4">Latest Opportunities</h2>
                <div class="space-y-4">
                    <div class="p-4 border rounded hover:border-indigo-400 cursor-pointer">
                        <h3 class="font-bold">Senior Laravel Engineer</h3>
                        <p class="text-sm text-slate-500">Remote / College Station Hub</p>
                    </div>
                </div>
            </div>

            <!-- Forum / Memes Sidebar -->
            <div class="bg-slate-900 text-white p-6 rounded-lg">
                <h2 class="text-xl font-bold mb-4">Dev Forum & Memes</h2>
                <ul class="space-y-2 text-slate-300">
                    <li>> <a>The "Laravel 13" hype is real</a></li>
                    <li>> <a>Junior vs Senior bug tracking</a></li>
                </ul>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="text-center py-8 text-slate-500 text-sm">
        &copy; 2026 CollegeStation.dev - Engineered for Artisans.
    </footer>
</body>
</html>