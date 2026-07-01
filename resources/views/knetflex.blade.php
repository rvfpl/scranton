<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knetflex | Curated Curation</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%23dc2626'/><text x='50%' y='50%' dominant-baseline='central' text-anchor='middle' font-family='sans-serif' font-weight='bold' font-size='60' fill='white'>K</text></svg>">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .aspect-video { aspect-ratio: 16 / 9; }
        .glass { background: rgba(20, 20, 20, 0.8); backdrop-filter: blur(10px); }
    </style>
</head>
<body class="bg-zinc-950 text-zinc-100 font-sans">

    @php
        $videos = [
            ['id' => 'dQw4w9WgXcQ', 'title' => 'The Masterpiece'],
            ['id' => 'jNQXAC9IVRw', 'title' => 'Digital Zen'],
            ['id' => '9bZkp7q19f0', 'title' => 'Internet History'],
        ];
    @endphp

    <!-- Navigation -->
<nav class="glass sticky top-0 z-50 flex items-center justify-between px-8 py-4 border-b border-zinc-800">
    <div class="text-2xl font-black text-red-600 tracking-tighter italic">KNETFLEX</div>
    
    <div class="hidden md:flex gap-6 text-sm font-medium text-zinc-400">
        <a href="#" class="hover:text-white transition">Home</a>
        <a href="#" class="hover:text-white transition">Archives</a>
    </div>

    <button id="menu-toggle" class="md:hidden text-2xl">☰</button>
</nav>

<div id="mobile-menu" class="hidden md:hidden bg-zinc-900 border-b border-zinc-800 p-6 flex flex-col gap-4 text-center">
    <a href="#" class="hover:text-red-500">Home</a>
    <a href="#" class="hover:text-red-500">Archives</a>
</div>

<!-- Hero Promo Section -->
<section class="relative w-full h-[60vh] flex items-center justify-center bg-zinc-900 border-b border-zinc-800">
    <!-- Optional: Background image would go here with an overlay -->
    <div class="text-center px-4">
        <h1 class="text-5xl md:text-7xl font-black mb-6 text-white tracking-tight">
            NOTHING TO WATCH. <br/>
            <span class="text-red-600">EVERYWHERE.</span>
        </h1>
        <p class="text-zinc-400 text-lg md:text-xl mb-8 max-w-lg mx-auto">
            The ultimate collection of videos you probably already saw and forgot about. No subscription, no algorithm, just chaos.
        </p>
        <a href="knetflex2" 
   class="inline-block bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-full font-bold text-lg transition-transform hover:scale-105">
   Start Watching
</a>
    </div>
</section>


    <!-- Hero -->
    <header class="py-16 px-8 text-center">
        <h1 class="text-5xl font-bold mb-4">My Personal Archive</h1>
        <p class="text-zinc-500">The specific stuff I like, hosted nowhere near a corporate server.</p>
    </header>

    <!-- Grid -->
    <main class="max-w-7xl mx-auto px-6 pb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($videos as $video)
                <div class="group bg-zinc-900 border border-zinc-800 rounded-xl overflow-hidden transition-all hover:border-red-600/50 hover:shadow-2xl hover:shadow-red-900/10">
                    <div class="aspect-video">
                        <iframe 
                            class="w-full h-full" 
                            src="https://www.youtube.com/embed/{{ $video['id'] }}" 
                            loading="lazy" 
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg">{{ $video['title'] }}</h3>
                        <p class="text-xs text-zinc-500 mt-1 uppercase tracking-widest">Selected Video</p>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-10 border-t border-zinc-900 text-center text-zinc-600 text-xs">
        <p class="mb-2 uppercase tracking-widest">Knetflex &copy; {{ date('Y') }}</p>
        <p class="max-w-md mx-auto italic">
            Disclaimer: This site is a satirical parody. I am not Netflix. 
            All videos are property of their respective owners. Please don't sue.
        </p>
    </footer>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        // Toggle the 'hidden' class to show/hide the menu
        mobileMenu.classList.toggle('hidden');
    });
</script>
</html>