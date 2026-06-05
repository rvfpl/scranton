<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMEA.dev | Developers, Startups & Market Intelligence</title>
    <meta name="description" content="Discover developers, startups, salaries, jobs and market intelligence across Europe, Middle East and Africa.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-slate-50 text-slate-900 antialiased">

    <nav x-data="{ mobileMenu: false }" class="fixed w-full z-50 border-b bg-white/90 backdrop-blur">
        <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between">
         
   <!-- Logo -->
    <a href="#" class="flex items-center gap-2 shrink-0">
      <div class="w-24 h-8 rounded-md bg-blue-600 text-white flex items-center justify-center hover:bg-blue-900/90 transition-colors">
       EMEA<span style="color:#ccc">.dev</span> 
      </div>
    </a>

            <div class="hidden md:flex items-center gap-8 font-medium">
                <a href="#countries" class="hover:text-blue-600">Countries</a>
                <a href="#cities" class="hover:text-blue-600">Cities</a>
                <a href="#reports" class="hover:text-blue-600">Reports</a>
            </div>

            <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
            </button>
        </div>

        <div x-show="mobileMenu" x-cloak class="md:hidden border-t bg-white px-4 py-5 flex flex-col gap-4">
            <a href="#countries" @click="mobileMenu = false">Countries</a>
            <a href="#cities" @click="mobileMenu = false">Cities</a>
            <a href="#reports" @click="mobileMenu = false">Reports</a>
        </div>
    </nav>

    <section class="pt-32 pb-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="max-w-4xl">
                <span class="inline-block rounded-full bg-blue-100 text-blue-700 px-4 py-2 text-sm font-bold tracking-wide uppercase">
                    EMEA Intelligence Platform
                </span>
                <h1 class="mt-6 text-5xl md:text-7xl font-extrabold tracking-tighter leading-[1.1]">
                    Discover Tech Hubs Across
                    <span class="text-blue-700">Europe, Middle East</span> & <span class="text-blue-700">Africa</span>
                </h1>
                <p class="mt-8 text-xl text-slate-600 max-w-2xl">
                    Explore data on startup hubs, developer salaries, and hiring trends across 120+ countries.
                </p>
                <div class="mt-10 flex gap-4">
                    <a href="#countries" class="bg-black text-white px-8 py-4 rounded-xl font-semibold hover:bg-slate-800 transition">Explore Countries</a>
                    <a href="#reports" class="bg-white border px-8 py-4 rounded-xl font-semibold hover:bg-slate-50 transition">View Reports</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="border-t bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 text-sm text-slate-500 flex flex-col md:flex-row justify-between items-center gap-6">
            <p>&copy; {{ date('Y') }} EMEA.dev | All rights reserved.</p>
            <div class="flex gap-6 font-mono text-xs">
                <a href="https://newyork.dev" class="hover:text-blue-600 transition">NewYork.dev</a>
                <a href="https://thbay.dev" class="hover:text-blue-600 transition">TheBay.dev</a>
            </div>
        </div> 
    </footer>

</body>
</html>