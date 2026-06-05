<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GDANSK.DEV | The Baltic Tech Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/MotionPathPlugin.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;800&family=Space+Grotesk:wght@300;700&display=swap');
        :root { --amber-glow: #fbbf24; --baltic-deep: #020617; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: var(--baltic-deep); color: #fff; scroll-behavior: smooth; }
        .h1-font { font-family: 'Space Grotesk', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .float-anim { animation: float 6s ease-in-out infinite; }
        @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-10px); } 100% { transform: translateY(0px); } }
    </style>
</head>
<body class="overflow-x-hidden">

    <nav class="fixed w-full z-50 px-6 py-5 top-0">
        <div class="max-w-7xl mx-auto glass rounded-full px-8 py-3 flex justify-between items-center">
            <div class="text-xl font-black tracking-tighter flex items-center">GDANSK<span class="text-[#fbbf24]">.DEV</span></div>
            
            <div class="hidden md:flex gap-10 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 items-center">
                <a href="#vision" class="hover:text-white transition-colors" data-en="Port" data-pl="Port">Port</a>
                <a href="#engineers" class="hover:text-[#fbbf24] transition-colors" data-en="Shipyard" data-pl="Stocznia">Shipyard</a>
                <a href="#contact" class="hover:text-white transition-colors" data-en="Contact" data-pl="Kontakt">Contact</a>
                
                <div class="flex gap-2 border-l border-white/10 pl-6">
                    <button onclick="switchLang('en')" class="hover:text-white font-bold" id="en-btn">EN</button>
                    <span class="text-slate-600">/</span>
                    <button onclick="switchLang('pl')" class="hover:text-slate-400" id="pl-btn">PL</button>
                </div>
            </div>
            
            <button id="menu-btn" class="md:hidden text-white"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg></button>
        </div>
    </nav>

    <section class="relative min-h-screen flex items-center justify-center pt-20 px-6">
        <div class="max-w-5xl text-center z-10">
            <div class="inline-block px-4 py-1 border border-[#fbbf24]/30 rounded-full text-[#fbbf24] text-[10px] font-bold uppercase tracking-[0.3em] mb-8 float-anim" data-en="North Europe's Digital Shipyard" data-pl="Cyfrowa Stocznia Północnej Europy">
                North Europe's Digital Shipyard
            </div>
            <h1 class="h1-font text-5xl md:text-9xl font-bold tracking-tighter leading-tight mb-8">
                CODE <span class="text-[#fbbf24]">FORGED</span><br><span data-en="BY THE SEA." data-pl="PRZEZ MORZE.">BY THE SEA.</span>
            </h1>
            <p class="text-slate-400 text-lg md:text-xl max-w-2xl mx-auto mb-12 font-light leading-relaxed" data-en="Gdańsk is no longer just a shipyard city. We are the new frontier of European Engineering. High-latitude logic, Baltic grit." data-pl="Gdańsk to już nie tylko miasto stoczniowe. Jesteśmy nową granicą europejskiej inżynierii. Logika wysokich szerokości geograficznych, bałtycka determinacja.">
                Gdańsk is no longer just a shipyard city. We are the new frontier of European Engineering. High-latitude logic, Baltic grit.
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-6">
                <a href="#engineers" class="bg-white text-black px-10 py-5 font-black uppercase tracking-widest hover:bg-[#fbbf24] transition-all" data-en="Explore Talent" data-pl="Poznaj Talenty">Explore Talent</a>
                <a href="#contact" class="glass px-10 py-5 font-black uppercase tracking-widest hover:bg-white/10 transition-all" data-en="Partner with us" data-pl="Współpracuj z nami">Partner with us</a>
            </div>
        </div>
    </section>

    <script>
        function switchLang(lang) {
            // Translate all elements with data attributes
            document.querySelectorAll('[data-en]').forEach(el => {
                el.innerText = el.getAttribute(`data-${lang}`);
            });
            
            // Toggle Active Button Styles
            document.getElementById('en-btn').classList.toggle('text-white', lang === 'en');
            document.getElementById('pl-btn').classList.toggle('text-white', lang === 'pl');
            document.getElementById('en-btn').classList.toggle('text-slate-400', lang !== 'en');
            document.getElementById('pl-btn').classList.toggle('text-slate-400', lang !== 'pl');
        }

        // --- Existing Boat/Menu Logic ---
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => { menu.classList.toggle('hidden'); menu.classList.toggle('flex'); });
    </script>
</body>
</html>