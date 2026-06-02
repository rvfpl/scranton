<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>CollegeStation.dev — Elite Engineering Hub</title>
    <!-- GSAP for Animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=JetBrains+Mono&family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root { --bg: #030712; --cyan: #22d3ee; --violet: #818cf8; --card: rgba(15,22,41,0.7); }
        body { background: var(--bg); font-family: 'Outfit', sans-serif; color: #e2e8f0; }
        .glass { background: var(--card); backdrop-filter: blur(12px); border: 1px solid rgba(99,179,237,0.12); }
        .gradient-text { background: linear-gradient(135deg, var(--cyan), var(--violet)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    
#rocket {
    top: 0;
    left: 0;
    z-index: 40;
    /* Changed from none to auto so we can hover */
    pointer-events: auto; 
    cursor: pointer;
}

:root {
    /* Default: Cyber/Glam */
    --bg: #030712;
    --cyan: #22d3ee;
    --violet: #818cf8;
    --text-primary: #e2e8f0;
}

[data-theme='aggie'] {
    --bg: #500000;      /* Maroon base */
    --cyan: #ffffff;     /* White accents */
    --violet: #f9d54e;   /* Aggie Gold highlights */
    --text-primary: #ffffff;
}

body { 
    background: var(--bg); 
    color: var(--text-primary); 
    transition: background 0.5s ease, color 0.5s ease;
}
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/MotionPathPlugin.min.js"></script>
</head>
<body>
 
<nav x-data="{ mobileMenuOpen: false }" class="fixed w-full z-50 px-6 pt-2 pb-1 flex justify-between items-center  bg-slate-950 border-b border-white/5">
    <div class="text-xl ">
        <span class="gradient-text">College</span>Station.dev
    <br/> <span class="text-white text-xs">The Texas node for developers. </span> 
</div>

    <div class="hidden md:flex gap-8 font-mono text-xs">

        <a href="#jobs" class="hover:text-cyan-400 transition">JOBS</a>
        <a href="#forum" class="hover:text-cyan-400 transition"> FORUM</a>
        <a href="#memes" class="hover:text-cyan-400 transition">MEMES</a>
        <button @click="document.documentElement.setAttribute('data-theme', document.documentElement.getAttribute('data-theme') === 'aggie' ? 'light' : 'aggie')"
        class="px-3 py-1 text-[10px] font-mono border border-white/20 rounded hover:bg-white/10 transition">
    AGGIE MODE
</button>
      <a href="#" class="px-6 py-3 border border-cyan-500 text-cyan-400 font-mono rounded text-center hover:bg-cyan-500 hover:text-black transition">JOIN NETWORK</a>

    </div>



    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         class="absolute top-full left-0 w-full bg-black/90 p-8 flex flex-col gap-6 md:hidden border-b border-white/10"
         @click.away="mobileMenuOpen = false">
        <a href="#jobs" @click="mobileMenuOpen = false" class="text-lg font-bold hover:text-cyan-500"> JOBS</a>
        <a href="#forum" @click="mobileMenuOpen = false" class="text-lg font-bold hover:text-cyan-500">  FORUM</a>
        <a href="#memes" @click="mobileMenuOpen = false" class="text-lg font-bold hover:text-cyan-500">  MEMES</a>
        <a href="#" class="mt-4 px-6 py-3 border border-cyan-500 text-cyan-400 font-mono rounded text-center hover:bg-cyan-500 hover:text-gray-800">JOINz NETWORK</a>
  
          <button @click="document.documentElement.setAttribute('data-theme', document.documentElement.getAttribute('data-theme') === 'aggie' ? 'light' : 'aggie')"
        class="px-3 py-1 text-[10px] font-mono border border-white/20 rounded hover:bg-white/10 transition">
    AGGIE MODE
</button>
    </div>

<!-- City/Node Dropdown -->
<div class="relative" x-data="{ cityOpen: false }">
    <button @click="cityOpen = !cityOpen" 
            class="flex items-center gap-2 hover:text-cyan-400 transition font-mono text-xs">
        CITIES ▾
    </button>

    <div x-show="cityOpen" 
         @click.away="cityOpen = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="absolute right-0 mt-4 w-48 glass rounded-xl border border-white/10 p-2 shadow-2xl">
        
        <div class="text-[10px] text-slate-500 font-mono px-3 py-2 uppercase tracking-widest">Texas Nodes</div>
        <a href="https://dfwtx.dev" class="block px-3 py-2 text-sm hover:bg-white/5 rounded-lg transition">Dallas / Fort Worth</a>
        <a href="https://austintx.dev" class="block px-3 py-2 text-sm hover:bg-white/5 rounded-lg transition">Austin</a>
        <a href="https://austintx.dev" class="block px-3 py-2 text-sm hover:bg-white/5 rounded-lg transition">Houston</a>
        <a href="https://austintx.dev" class="block px-3 py-2 text-sm hover:bg-white/5 rounded-lg transition">San Antonio</a>
        <a href="https://austintx.dev" class="block px-3 py-2 text-sm hover:bg-white/5 rounded-lg transition">RGV</a>
        <a href="https://austintx.dev" class="block px-3 py-2 text-sm hover:bg-white/5 rounded-lg transition">El Paso</a>

        <div class="h-px bg-white/5 my-2"></div>
        
        <div class="text-[10px] text-slate-500 font-mono px-3 py-2 uppercase tracking-widest">India Nodes</div>
        <a href="https://bengaluru.dev" class="block px-3 py-2 text-sm hover:bg-white/5 rounded-lg transition">Bengaluru</a>
        <a href="https://pune.dev" class="block px-3 py-2 text-sm hover:bg-white/5 rounded-lg transition">Pune</a>
    </div>
</div>

    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
    </button>
</nav>
 <!-- hide dropdown? -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- HERO -->
    <section class="min-h-screen flex flex-col justify-center items-center px-4 pt-8 pb-12">
<h1 class="text-3xl md:text-4xl font-black text-center my-4">  <span class="gradient-text">College</span>Station: </h1>

       <p> The central node for  developers. Texas Style.</p>
        <h1 class="text-6xl md:text-7xl font-black text-center my-8 pt-12">  <span class="gradient-text">Elite </span>Devs. <span class="text-4xl md:text-5xl">Kinda </span> </h1> 
        <p class="text-slate-400 max-w-xl text-center mb-8">
            AustinTX &bull; DFWTX &bull; ElPasoTX &bull; HoustonTX &bull; RGVTX &bull; SanAntonioTX
        </p>
        <div class="flex gap-4">
            <a href="#jobs" class="px-8 py-4 bg-white text-black font-bold rounded-lg hover:scale-105 transition">Browse Jobs</a>
            <a href="#forum" class="px-8 py-4 border border-white/10 rounded-lg hover:bg-white/5 transition">Join Forum</a>
        </div>
    </section>

    <!-- HUB CONTENT -->
    <main class="max-w-6xl mx-auto px-6 py-20 grid md:grid-cols-3 gap-8">
        
        <!-- Job Board -->
        <div id="jobs" class="md:col-span-2 glass p-8 rounded-2xl">
            <h2 class="text-2xl font-bold mb-6">Latest Opportunities</h2>
            <div class="space-y-4">
                @foreach([['Senior Laravel', 'Remote'], ['AI Engineer', 'College Station'], ['Blockchain Dev', 'Austin']] as $job)
                <div class="p-4 border border-white/5 rounded-xl hover:border-cyan-500/50 transition cursor-pointer">
                    <div class="font-bold">{{ $job[0] }}</div>
                    <div class="text-xs text-slate-500 mt-1 font-mono">{{ $job[1] }}</div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Forum & Memes -->
        <div class="space-y-8">
            <div id="forum" class="glass p-6 rounded-2xl">
                <h3 class="font-bold mb-4 gradient-text">Community Forum</h3>
                <p class="text-sm text-slate-400 mb-4">"Anyone else feeling the Laravel 13 transition?"</p>
                <button class="text-xs border-b border-cyan-500">Read Thread →</button>
            </div>
            <div id="memes" class="glass p-6 rounded-2xl">
                <h3 class="font-bold mb-4 text-violet-400">Dev Memes</h3>
                <div class="h-32 bg-black/40 rounded-lg flex items-center justify-center text-slate-600 italic">
                    [Meme Placeholder]
                </div>
            </div>
        </div>
    </main>

<footer class="text-center text-slate-500 text-xs py-6 border-t border-white/10">
    &copy; 2026 CollegeStation.dev 
</footer>



    <script>
        // Basic Entrance Animation
        gsap.from("nav", { y: -100, duration: 1, ease: "power4.out" });
        gsap.from("section h1", { opacity: 0, y: 50, duration: 1.5, delay: 0.5 });
    </script>


<!-- Rocket SVG -->
<svg id="rocket" viewBox="0 0 50 50" class="fixed w-12 h-12 z-40 pointer-events-none">
    <path d="M25 5L30 20H20L25 5Z" fill="#22d3ee" />
    <circle id="smoke" cx="25" cy="30" r="3" fill="white" opacity="0.6" />
</svg>

<svg id="smoke-container" class="fixed inset-0 w-full h-full z-30 pointer-events-none"></svg>

<svg id="rocket" viewBox="0 0 50 50" class="fixed w-12 h-12 z-40">
    <path d="M25 5L30 20H20L25 5Z" fill="#22d3ee" />
</svg>

<script>
    gsap.registerPlugin(MotionPathPlugin);

    window.addEventListener('load', () => {
        const rocket = document.querySelector("#rocket");
        const smokeContainer = document.querySelector("#smoke-container");

        const rocketTween = gsap.to("#rocket", {
            duration: 8,
            ease: "none",
            repeat: -1,
            motionPath: {
                path: [{x: 100, y: 100}, {x: 400, y: 50}, {x: 700, y: 150}, {x: 1100, y: 150}, {x: 400, y: 250}, {x: 10, y: 10}],
                curviness: 1.25,
                useEntirePath: true
            }
        });

        rocket.addEventListener("mouseenter", () => rocketTween.pause());
        rocket.addEventListener("mouseleave", () => rocketTween.play());

        setInterval(() => {
            const rect = rocket.getBoundingClientRect();
            
            // Create particle inside the SVG container
            const smoke = document.createElementNS("http://www.w3.org/2000/svg", "circle");
            smoke.setAttribute("r", "2");
            smoke.setAttribute("fill", "#a2d3ee");
            smoke.setAttribute("cx", rect.left + 25);
            smoke.setAttribute("cy", rect.top + 25);
            
            smokeContainer.appendChild(smoke);
            
            gsap.to(smoke, { 
                opacity: 0, 
                y: "+=30", 
                x: "-=10",
                duration: 0.8, 
                onComplete: () => smoke.remove() 
            });
        }, 100);
    });
</script>
</body>
</html>