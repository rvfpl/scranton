
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCRANTON.DEV | Holding Co.</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js is required for the hamburger menu to work -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            background-color: #e5e7eb;
        }
        .bureau-serif {
            font-family: 'Times New Roman', Times, serif;
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="text-slate-800 antialiased min-h-screen">

    <!-- Navbar x-data defines the 'open' state for the menu -->
    <nav x-data="{ open: false }" class="bg-slate-900 text-white border-b-4 border-yellow-500 sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-4">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <div class="bg-yellow-500 text-slate-900 font-bold px-2 py-1 text-sm">SDH</div>
                    <span class="text-lg font-bold"><a href="/">SCRANTON.DEV</a></span>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-8 text-sm uppercase tracking-widest">
                    <a href="#" class="hover:text-yellow-500">The Fleet</a>
                    <a href="#" class="hover:text-yellow-500">HQ</a>
                    <a href="https://notnewyork.com" class="hover:text-yellow-500">NotNewYork.com</a>
                </div>

                <!-- Hamburger Button: Toggles the 'open' state -->
                <div class="md:hidden flex items-center">
                    <button @click="open = !open" type="button" class="p-2 text-yellow-500 focus:outline-none">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <!-- Menu Icon (visible when closed) -->
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <!-- Close Icon (visible when open) -->
                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu: Only shows when 'open' is true -->
        <div x-show="open" 
             x-cloak 
             @click.away="open = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             class="md:hidden bg-slate-800 border-t border-slate-700">
            <div class="px-2 pt-2 pb-3 space-y-1 text-center">
                <a href="#" class="block px-3 py-4 text-base hover:bg-slate-700">The Fleet</a>
                <a href="#" class="block px-3 py-4 text-base hover:bg-slate-700">HQ</a>
                <a href="https://notnewyork.com" class="block px-3 py-4 text-base text-yellow-500 font-bold">NotNewYork.com</a>
            </div>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto p-4 mt-4"> 
        <div class="mx-auto p-6 mt-4"><h1 class="text-4xl font-black ">"World's Best Job Board" </h1>
        </div>
        <br><br> 
                <div class="bg-white border-4 border-slate-900 shadow-[10px_10px_0px_0px_rgba(0,0,0,1)] p-8">
            <header class="mb-10 border-b-2 border-dashed border-slate-300 pb-6">
                <h1 class="text-3xl font-black">Regional Manager Dashboard</h1>
                <p class="bureau-serif text-xl italic text-slate-500 mt-2">
                    "I'm not superstitious, but I am a little stitious."
                </p>
                "Welcome to Scranton.dev. Like the great Dunder Mifflin, we run our regional northeast tech talent pipeline out of Lackawanna County, branching into New York, Utica, and Buffalo. No corporate bloat, just paper-clean developer jobs."
          "Whether you're fleeing Manhattan or building in the birthplace of paper, this is the regional hub for shared developers."
            
        <p><br>NB: To make the "Dev Sharing" model work on a standard job board format, you don't need a crazy custom database schema. You just need to tweak your standard Laravel job submission form to include Shared-Utility Fields.

When a company in Scranton or Utica pays $99 to list a job, your form forces them to define the hybrid parameters:

Job Type Dropdown: Instead of just "Full-time" or "Remote", you add:

Fractional (2 Days/Week On-Site)

Regional Shared Dev (Multi-Office)

Local Hybrid (On-Site Required)

The Route Matrix Text Box: A field where the employer writes their regional setup, e.g., "Must be on-site in Scranton on Mondays, and Wilkes-Barre on Thursdays. Remaining days remote."
</p>
<p>"Welcome to the regional branch. If you're tired of the $18 coffees and pretentious design agencies over at our parent company, this is where real people look for regional, shared-hybrid dev work."
PS: no NYC poachers allowed. Now scram!    </p>
        </header>

           <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                
                <div class="p-4 bg-slate-100 border-2 border-slate-900 relative">
                    <div class="absolute top-0 right-0 bg-slate-900 text-white text-[8px] px-2 py-1 font-sans">SOVEREIGN</div>
                    <h3 class="font-bold text-xl uppercase">NewYork.dev</h3>
                    <p class="text-xs bureau-serif italic">Global Primary Hub</p>
                </div>

                <div class="p-4 bg-slate-100 border-2 border-slate-900 relative">
                    <div class="absolute top-0 right-0 bg-slate-900 text-white text-[8px] px-2 py-1 font-sans">SOVEREIGN</div>
                    <h3 class="font-bold text-xl uppercase">BayArea.dev</h3>
                    <p class="text-xs bureau-serif italic">Distributed Innovation</p>
                </div>

                <div class="p-4 bg-slate-100 border-2 border-slate-900 relative">
                    <div class="absolute top-0 right-0 bg-slate-900 text-white text-[8px] px-2 py-1 font-sans">SOVEREIGN</div>
                    <h3 class="font-bold text-xl uppercase">Bengaluru.dev</h3>
                    <p class="text-xs bureau-serif italic">Global Compute Cluster</p>
                </div>

                <div class="p-4 bg-slate-50 border-2 border-slate-900 opacity-80">
                    <h3 class="font-bold text-lg">Gdansk.dev</h3>
                    <p class="text-[10px] uppercase tracking-tighter">EU Tech-Corridor Node</p>
                </div>

               

                <div class="p-4 bg-slate-50 border-2 border-slate-900 opacity-80">
                    <h3 class="font-bold text-lg">Bucharest.dev</h3>
                    <p class="text-[10px] uppercase tracking-tighter">East-EU Talent Node</p>
                </div>

                <div class="p-4 bg-slate-50 border-2 border-slate-900">
                    <h3 class="font-bold text-lg">Amster.dev</h3>
                    <p class="text-[10px] uppercase tracking-tighter">The Anti-Borough</p>
                </div>
                
                <div class="p-4 bg-slate-50 border-2 border-slate-900">
                    <h3 class="font-bold text-lg">TKYO.dev</h3>
                    <p class="text-[10px] uppercase tracking-tighter">Shibuya Precinct Node</p>
                </div>
 <div class="p-4 bg-slate-50 border-2 border-slate-900 opacity-80">
                    <h3 class="font-bold text-lg">HCMC.dev</h3>
                    <p class="text-[10px] uppercase tracking-tighter">SEA Manufacturing Hub</p>
                </div>
 <div class="p-4 bg-slate-50 border-2 border-slate-900">
                    <h3 class="font-bold text-lg">DXBai.dev</h3>
                    <p class="text-[10px] uppercase tracking-tighter">Shibuya Precinct Node</p>
                </div>


                <div class="p-4 bg-yellow-400 border-2 border-slate-900 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                    <h3 class="text-xl italic font-black">office@scranton.dev</h3>
                    <p class="text-[10px] uppercase font-bold text-slate-800">Administrative Contact</p>
                </div>
            </div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    <div class="col-span-1 md:col-span-2 p-6 bg-slate-900 text-white border-4 border-yellow-500">
        <div class="flex justify-between items-start">
            <h3 class="text-3xl font-black italic">CHICAGO.DEV</h3>
            <span class="bg-yellow-500 text-slate-900 text-[10px] px-2 py-1 font-bold">PREMIUM ASSET</span>
        </div>
        <p class="mt-4 bureau-serif opacity-70">Primary Industrial & Commodities Hub. $700B+ Regional GDP Node.</p>
    </div>

    <div class="p-6 bg-white border-4 border-slate-900">
        <h3 class="text-xl font-black">BOSTON.DEV</h3>
        <p class="text-xs bureau-serif text-slate-500 italic">R&D / Biotech Sector</p>
        <div class="mt-4 h-1 w-full bg-slate-200">
            <div class="h-1 bg-green-500 w-full"></div>
        </div>
    </div>

    <div class="p-6 bg-white border-4 border-slate-900">
        <h3 class="text-xl font-black">MEXICOCITY.DEV</h3>
        <p class="text-xs bureau-serif text-slate-500 italic">LATAM Growth Anchor</p>
        
    </div>
<div class="p-6 bg-white border-4 border-slate-900">
        <h3 class="text-xl font-black">BuenosAires.DEV</h3>
        <p class="text-xs bureau-serif text-slate-500 italic">LATAM Growth Anchor</p>
        
    </div>
   

</div>



<div class="space-y-12">

    <section>
        <h2 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400 mb-4 ml-1">Macro-Regional Infrastructure</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="p-6 bg-slate-900 text-white border-4 border-slate-900 shadow-[8px_8px_0px_0px_rgba(255,255,0,1)]">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-2xl font-black italic">ONTARIO.DEV</h3>
                    <span class="text-[10px] bg-yellow-500 text-slate-900 px-2 py-1 font-bold">REGION_HUB</span>
                </div>
                <p class="bureau-serif text-sm text-slate-300">The Golden Horseshoe Corridor. High-density AI talent cluster (Toronto-Waterloo-Ottawa).</p>
            </div>

          

        </div>
    </section>

    <section>
        <h2 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400 mb-4 ml-1">City-Sovereign Nodes</h2>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            
            <div class="p-3 bg-slate-100 border-2 border-slate-900">
                <h4 class="font-bold text-sm">HCMC.DEV</h4>
                <p class="text-[9px] bureau-serif">SEA Cluster</p>
            </div>

            <div class="p-3 bg-slate-100 border-2 border-slate-900">
                <h4 class="font-bold text-sm">GDANSK.DEV</h4>
                <p class="text-[9px] bureau-serif">EU Talent Pool</p>
            </div>

            <div class="p-3 bg-slate-100 border-2 border-slate-900">
                <h4 class="font-bold text-sm">TKYO.DEV</h4>
                <p class="text-[9px] bureau-serif">JP Alpha Hub</p>
            </div>

            <div class="p-3 bg-yellow-400 border-2 border-slate-900">
                <h4 class="font-bold text-sm italic">office@scranton.dev</h4>
                <p class="text-[9px] uppercase font-black">HQ</p>
            </div>

        </div>
    </section>
<section class="mt-8">
    <h2 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400 mb-4">Regional Multi-Node Corridors</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        
        <div class="p-4 bg-slate-900 text-white border-2 border-slate-900">
            <h3 class="font-black text-lg italic">PACIFICNW.DEV</h3>
            <p class="text-[9px] text-yellow-500 font-bold uppercase">SEA | PDX | YVR Relay</p>
            <p class="text-[10px] mt-2 opacity-70 bureau-serif italic">Cascadia Cloud-Corridor Integrated.</p>
        </div>

        <div class="p-4 bg-slate-900 text-white border-2 border-slate-900">
            <h3 class="font-black text-lg italic">NCAROLINA.DEV</h3>
            <p class="text-[9px] text-yellow-500 font-bold uppercase">The Research Triangle Node</p>
            <p class="text-[10px] mt-2 opacity-70 bureau-serif italic">RTP Enterprise Pipeline Active.</p>
        </div>

        <div class="p-4 bg-slate-900 text-white border-2 border-slate-900">
            <h3 class="font-black text-lg italic">ONTARIO.DEV</h3>
            <p class="text-[9px] text-yellow-500 font-bold uppercase">Golden Horseshoe Node</p>
            <p class="text-[10px] mt-2 opacity-70 bureau-serif italic">YYZ | YOW | YKF Distributed Node.</p>
        </div>

    </div>
</section>
</div>





            <footer class="mt-16 pt-8 border-t-2 border-slate-900 text-center space-y-4">
                <p class="text-sm">Operating under the <strong class="underline decoration-yellow-500">notnewyork.com</strong> umbrella.</p>
                <div class="flex justify-center gap-6 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">
                    <a href="#" class="hover:text-slate-900">Fleet Map</a>
                    <span>|</span>
                    <a href="#" class="hover:text-slate-900">Governance</a>
                    <span>|</span>
                    <a href="/" class="hover:text-slate-900">Coffee Log</a>
                </div>
                <p class="text-[9px] text-slate-400 font-mono">
                    &copy; 2026 SCRANTON DEV HOLDINGS. ALL RIGHTS RESERVED. 
                    <br>SYSTEM STATUS: OPERATIONAL. VIBE: CHAOTIC-GOOD.
                </p>
            </footer>
        </div>
  
 <div class="bg-white border-4 border-slate-900 shadow-[10px_10px_0px_0px_rgba(0,0,0,1)] p-8 mt-12">
            <header class="mb-10 border-b-2 border-dashed border-slate-300 pb-6">
                <h1 class="text-3xl font-black ">The Fake Corporate Mission Statement </h1>
                <p class="bureau-serif text-xl italic text-slate-500 mt-2">
                    "If you cannot scuba, what has this all been about?"
                </p>
          
        <p> 
    
You can write a blurb on the page that reads completely straight-faced:

"At NylonCisco, we don't believe geography should limit innovation. By combining the hyper-scaling venture capital pipelines of San Francisco with the raw, blue-collar logistics of the greater Scranton-Wilkes-Barre metro area (Pop. 381,000), we have birthed ScranFrancisco. We are currently disrupting the agribusiness and quality assurance sectors via localized, non-remote telemetry arrays (managed on-site by M. Schrute)."

The Footer Joke
At the very bottom of the page, underneath all of Dwight and Creed’s chaotic, hand-altered HTML elements, you put a highly formal corporate copyright line:

© 2026 NylonCisco Systems / ScranFrancisco Hub. Some Rights Reserved. If you cannot scuba, what has this all been about?
</div>
  </main>
            <footer class="mt-12 pt-6 border-t-2 border-slate-900 text-center">
                <p class="text-sm">Operating under the <strong>notnewyork.com</strong> umbrella.</p>
            </footer>
            <footer class="pt-12 text-center space-y-4">
            <div class="flex justify-center gap-6 text-sm font-bold uppercase tracking-widest text-slate-400">
                <a href="#" class="hover:text-slate-900">Portfolio</a>
                <span>/</span>
                <a href="https://notnewyork.com" class="hover:text-slate-900">NotNewYork.com</a>
            </div>
            <p class="text-[10px] text-slate-400 font-mono">
                &copy; 2026 SCRANTON DEV HOLDINGS. ALL RIGHTS RESERVED. 
                <br>SYSTEM STATUS: NOMINAL. COFFEE: COLD.
            </p>
        </footer>
        </div>
    </main>

</body>
</html>




