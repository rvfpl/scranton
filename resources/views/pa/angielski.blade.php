<!DOCTYPE html>
<html lang="en" 
      x-data="globalState()" 
      x-init="init()" 
      class="dark bg-[#0a0a0c] text-slate-400 antialiased selection:bg-[#0070f3] selection:text-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>angielski.dev // High-Performance English Coaching for Engineers</title>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .code-font {
            font-family: 'JetBrains Mono', monospace;
        }
        .bg-grid {
            background-image: radial-gradient(rgba(255, 255, 255, 0.015) 1px, transparent 1px);
            background-size: 32px 32px;
        }
        .premium-glow {
            box-shadow: 0 0 50px -12px rgba(0, 112, 243, 0.15);
        }
        [x-cloak] { display: none !important; }
    </style>
    
    <script>
    function globalState() {
    return {
        lang: 'en',
        selectedPlan: 'sprint',
        tier: 'individual', // <-- Add this to track B2B vs Individual toggle
        showWaitlist: false,
        slotsLeft: 5,
        init() {
            const storedLang = localStorage.getItem('lang');
            if (storedLang) this.lang = storedLang;
        },
        setLang(language) {
            this.lang = language;
            localStorage.setItem('lang', language);
        },
        selectPlan(plan) {
            this.selectedPlan = plan;
        },
        reserveSlot() {
            this.showWaitlist = true; 
        }
    }
}
    </script>
</head>
<body class="bg-[#0a0a0c] min-h-screen relative overflow-x-hidden">
    <!-- Sophisticated Background Pattern -->
    <div class="absolute inset-0 bg-grid pointer-events-none z-0"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[400px] bg-gradient-to-b from-[#0070f3]/5 to-transparent blur-[120px] pointer-events-none z-0"></div>

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 px-6 py-4 backdrop-blur-md border-b bg-[#0a0a0c]/70 border-white/5">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <span class="text-white font-semibold tracking-tight text-lg">
                angielski<span class="text-[#0070f3]">.dev</span>
            </span>                 
            <div class="flex border border-white/10 p-1 rounded-md bg-black/40 items-center gap-1">
                <button @click="setLang('pl')"
                        :class="lang === 'pl' ? 'bg-[#0070f3] text-white' : 'opacity-60 hover:opacity-100 text-slate-400'"
                        class="px-2.5 py-1 text-xs font-medium rounded transition-all">PL</button>                                    
                <button @click="setLang('en')"
                        :class="lang === 'en' ? 'bg-[#0070f3] text-white' : 'opacity-60 hover:opacity-100 text-slate-400'"
                        class="px-2.5 py-1 text-xs font-medium rounded transition-all">EN</button>
            </div>
        </div>
    </nav>

    <main class="relative z-10 pt-40 pb-24 px-6 max-w-5xl mx-auto space-y-24">
        
        <!-- Hero Section -->
        <section class="space-y-6 text-center md:text-left">
            <div class="inline-flex items-center gap-2 border border-[#0070f3]/20 bg-[#0070f3]/5 px-3 py-1 rounded-full text-xs font-medium text-[#0070f3] tracking-wide">

                <span x-show="lang === 'en'">Premium Cohort Update — SUMMER 2026</span>
                <span x-show="lang === 'pl'" x-cloak>Edycja Premium — LATO 2026</span>
            </div>
            
            <h1 class="text-4xl md:text-6xl font-bold text-white tracking-tight leading-[1.1] max-w-4xl">
                <span x-show="lang === 'en'">
                    You code beautifully in <span class="text-slate-500">Python, Rust, and Go</span>. 
                    <span class="bg-gradient-to-r from-white via-slate-200 to-slate-400 bg-clip-text text-transparent">Now negotiate with true authority.</span>
                </span>
                <span x-show="lang === 'pl'" x-cloak>
                    Kodujesz bezbłędnie w <span class="text-slate-500">Rust, Python i Go</span>. 
                    <span class="bg-gradient-to-r from-white via-slate-200 to-slate-400 bg-clip-text text-transparent">Czas na komunikację z pozycją autorytetu.</span>
                </span>
            </h1>

            <p class="max-w-2xl text-lg md:text-xl text-slate-400 font-light leading-relaxed">
                <span x-show="lang === 'en'">
                    Elite business communication architectures engineered explicitly for Senior Developers, Tech Leads, and Engineering Managers dealing with US & UK clients.
                </span>
                <span x-show="lang === 'pl'" x-cloak>
                    Zaawansowane programy komunikacji biznesowej zaprojektowane dla Seniorów, Tech Leadów oraz EM-ów współpracujących bezpośrednio z rynkiem USA i UK.
                </span>
            </p>

            <div class="pt-4 flex flex-col sm:flex-row justify-center md:justify-start gap-4">
                <a href="#pricing" class="bg-[#0070f3] text-white px-8 py-4 rounded-lg text-sm font-semibold hover:bg-[#0062d4] transition-all text-center shadow-lg shadow-[#0070f3]/20">
                    <span x-show="lang === 'en'">Review Frameworks & Pricing</span>
                    <span x-show="lang === 'pl'" x-cloak>Zobacz pakiety i cennik</span>
                </a>
                <div class="flex items-center justify-center gap-2 text-xs text-slate-500 code-font">
                    <a href="sys_arch"><span>Host: Bobby — International Business Communication Consultant</span></a>
                </div>
            </div>
        </section>

        <!-- Social Proof / Experience Ecosystem -->
        <section class="border-y border-white/5 py-12" x-data="{ open: true }">
            <div class="flex justify-between items-center cursor-pointer group mb-8" @click="open = !open">
                <h2 class="text-xs font-semibold text-slate-400 tracking-widest uppercase">
                    Trusted by Engineers and Leaders operating at
                </h2>
                <span class="text-xs text-[#0070f3] group-hover:underline" x-text="open ? 'Hide details' : 'Show details'"></span>
            </div>
            
            <div x-show="open" x-collapse class="grid grid-cols-2 md:grid-cols-4 gap-y-8 gap-x-12 opacity-50 grayscale contrast-200">
                <div class="flex flex-col"><span class="text-lg font-bold text-white tracking-tight">SIEMENS</span><span class="text-[9px] tracking-wider text-slate-400">ENERGY SECTOR</span></div>
                <div class="flex flex-col"><span class="text-lg font-bold text-white tracking-tight">FAANG REMOTE</span><span class="text-[9px] tracking-wider text-slate-400">EUROPE NODES</span></div>
                <div class="flex flex-col"><span class="text-lg font-bold text-white tracking-tight">eSky</span><span class="text-[9px] tracking-wider text-slate-400">POLAND ENTERPRISE</span></div>
                <div class="flex flex-col"><span class="text-lg font-bold text-white tracking-tight">JTI</span><span class="text-[9px] tracking-wider text-slate-400">GLOBAL L&D</span></div>
                <div class="flex flex-col"><span class="text-lg font-bold text-white tracking-tight">US CONSULATE</span><span class="text-[9px] tracking-wider text-slate-400">PUBLIC AFFAIRS</span></div>
                <div class="flex flex-col"><span class="text-lg font-bold text-white tracking-tight">VAZCO</span><span class="text-[9px] tracking-wider text-slate-400">SOFTWARE HOUSE</span></div>
                <div class="flex flex-col"><span class="text-lg font-bold text-white tracking-tight">ACTRA</span><span class="text-[9px] tracking-wider text-slate-400">NORTH AMERICA</span></div>
                <div class="flex flex-col"><span class="text-lg font-bold text-white tracking-tight">ACADEMIA</span><span class="text-[9px] tracking-wider text-slate-400">RESEARCH FACULTY</span></div>
            </div>
        </section>

        <!-- Before / After Refactor Logic (The absolute killer feature) -->
        <section class="space-y-8">
            <div class="max-w-2xl">
                <h2 class="text-xs font-bold tracking-widest text-[#0070f3] uppercase mb-2">The Concept</h2>
                <h3 class="text-2xl md:text-3xl font-bold text-white tracking-tight">Linguistic Refactoring</h3>
                <p class="text-slate-400 mt-2 font-light">We do not drill schoolbook grammar rules. We replace hesitant, low-authority code-phrases with objective, boardroom-ready architecture declarations.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6 code-font">
                <div class="bg-black/40 border border-white/5 rounded-xl p-6 space-y-4">
                    <div class="text-xs text-rose-400 font-semibold tracking-wider uppercase flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span> Raw Technical Communication
                    </div>
                    <div class="text-sm text-slate-400 italic bg-[#0e0e12] p-4 rounded-lg border border-white/[0.02]">
                        "I think maybe we could delay the migration because there might be some risk with the current implementation."
                    </div>
                    <div class="text-xs text-[#0070f3] font-semibold tracking-wider uppercase flex items-center gap-2 pt-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#0070f3]"></span> Upgraded Authoritative Translation
                    </div>
                    <div class="text-sm text-white bg-[#0070f3]/5 p-4 rounded-lg border border-[#0070f3]/20">
                        "I recommend delaying the migration to Q3. The current execution structure introduces significant deployment vulnerabilities for the payments architecture."
                    </div>
                </div>

                <div class="bg-black/40 border border-white/5 rounded-xl p-6 space-y-4">
                    <div class="text-xs text-rose-400 font-semibold tracking-wider uppercase flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span> Raw Technical Communication
                    </div>
                    <div class="text-sm text-slate-400 italic bg-[#0e0e12] p-4 rounded-lg border border-white/[0.02]">
                        "I’m not sure if this deadline is realistic, we are working very hard but it's tough."
                    </div>
                    <div class="text-xs text-[#0070f3] font-semibold tracking-wider uppercase flex items-center gap-2 pt-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#0070f3]"></span> Upgraded Authoritative Translation
                    </div>
                    <div class="text-sm text-white bg-[#0070f3]/5 p-4 rounded-lg border border-[#0070f3]/20">
                        "This timeline introduces unacceptable technical risk. We require two additional development iterations to assure a stable system launch."
                    </div>
                </div>
            </div>
        </section>

        <!-- Dynamic Scenarios -->
        <section class="border-t border-white/5 pt-16" x-data="{ open: false }">
            <div class="flex justify-between items-center cursor-pointer pb-4 border-b border-white/5 group" @click="open = !open">
                <div>
                    <h3 class="text-xl font-semibold text-white tracking-tight">Core Curriculum Protocols</h3>
                    <p class="text-xs text-slate-500 mt-1">Specific performance frameworks built for high-stakes business environments.</p>
                </div>
                <span class="text-slate-400 group-hover:text-[#0070f3] transition-transform font-bold" :class="open ? 'rotate-180' : ''">↓</span>
            </div>

            <div x-show="open" x-collapse class="mt-8 grid md:grid-cols-3 gap-6 text-sm">
                <div class="bg-black/20 border border-white/5 p-6 rounded-xl space-y-2">
                    <div class="text-white font-medium text-base">01 / System Design Scenarios</div>
                    <p class="text-slate-400 font-light leading-relaxed">Articulate high-load distributed architectures without verbal fillers. We clean your default cadence to project certainty during heavy stakeholder audits.</p>
                </div>
                <div class="bg-black/20 border border-white/5 p-6 rounded-xl space-y-2">
                    <div class="text-white font-medium text-base">02 / Stakeholder Boundary Control</div>
                    <p class="text-slate-400 font-light leading-relaxed">Master the art of elegant disagreement. Defend your team against sudden scope creep, unrealistic milestones, and technical debt build-up without burning commercial relationships.</p>
                </div>
                <div class="bg-black/20 border border-white/5 p-6 rounded-xl space-y-2">
                    <div class="text-white font-medium text-base">03 / Global Elite Interview Syncs</div>
                    <p class="text-slate-400 font-light leading-relaxed">Tailored preparation protocols for technical screening tracks at major US, UK, and Euro remote giants. Optimize behavioral answers and maximize salary tiering options.</p>
                </div>
            </div>
        </section>

        <!-- Credentials Framework -->
        <section class="bg-[#0e0e12] border border-white/5 rounded-2xl p-8 premium-glow">
            <div class="max-w-2xl space-y-4">
                <h4 class="text-xs font-bold tracking-widest text-[#0070f3] uppercase">The Expert Layer</h4>
                <h3 class="text-2xl font-bold text-white tracking-tight">Linguistic Pedagogy Meets Corporate Strategy</h3>
                <p class="text-slate-400 font-light leading-relaxed text-sm">
                    Your training cycles are executed under the direct oversight of a multi-disciplinary background designed to address cross-border technical trade.
                </p>
                <div class="grid grid-cols-2 gap-4 text-xs code-font pt-2 text-slate-300">
                    <div class="flex items-center gap-2"><span class="text-[#0070f3]">•</span> MBA: Strategy & Negotiation Layer</div>
                    <div class="flex items-center gap-2"><span class="text-[#0070f3]">•</span> Certified Canadian Educator Status</div>
                    <div class="flex items-center gap-2"><span class="text-[#0070f3]">•</span> US Commercial Service Alignment</div>
                    <div class="flex items-center gap-2"><span class="text-[#0070f3]">•</span> Behavioral Performance & Coaching</div>
                </div>
            </div>
        </section>

        <!-- Pricing Section (Resource Allocation) -->
      <!-- Pricing Section (Resource Allocation) -->
<section id="pricing" class="space-y-12 border-t border-white/5 pt-16">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="max-w-xl">
            <h2 class="text-xs font-bold tracking-widest text-[#0070f3] uppercase mb-2">Cohort Enrollment</h2>
            <h3 class="text-3xl font-bold text-white tracking-tight">Flexible Frameworks</h3>
            <p class="text-slate-400 mt-2 font-light text-sm">
                <span x-show="lang === 'en'">All operations follow high-intensity, structured timeline execution. Optimized for engineering throughput.</span>
                <span x-show="lang === 'pl'" x-cloak>Wszystkie sesje opierają się na intensywnej współpracy warsztatowej. Optymalizacja pod kątem efektywności IT.</span>
            </p>
        </div>

        <!-- Filter Switch Toggle -->
        <div class="flex p-1 border border-white/10 bg-black/40 rounded-xl self-start md:self-end">
            <button @click="tier = 'individual'" 
                    :class="tier === 'individual' ? 'bg-[#0070f3] text-white' : 'text-slate-400 hover:text-white'"
                    class="px-4 py-2 rounded-lg text-xs font-semibold transition-all">
                <span x-show="lang === 'en'">For Individuals</span>
                <span x-show="lang === 'pl'" x-cloak>Dla Inżynierów</span>
            </button>
            <button @click="tier = 'b2b'" 
                    :class="tier === 'b2b' ? 'bg-[#0070f3] text-white' : 'text-slate-400 hover:text-white'"
                    class="px-4 py-2 rounded-lg text-xs font-semibold transition-all">
                <span x-show="lang === 'en'">For Companies (B2B)</span>
                <span x-show="lang === 'pl'" x-cloak>Dla Firm (B2B)</span>
            </button>
        </div>
    </div>

    <!-- TIER 1: INDIVIDUAL PLANS -->
    <div x-show="tier === 'individual'" x-transition:enter="transition ease-out duration-200" class="grid md:grid-cols-3 gap-8">
        <!-- SPRINT PACK -->
        <div @click="selectPlan('sprint')" 
             :class="selectedPlan === 'sprint' ? 'border-[#0070f3] bg-[#0070f3]/[0.02] ring-1 ring-[#0070f3]' : 'border-white/5 bg-black/20 hover:border-white/10'"
             class="p-6 rounded-2xl cursor-pointer transition-all flex flex-col justify-between relative group">
            <div>
                <div class="text-white font-semibold text-lg flex items-center justify-between">
                    <span>Sprint Framework</span>
                    <span class="text-[10px] uppercase font-mono px-2 py-0.5 rounded border border-white/10 bg-black text-slate-400">14-Day Cycle</span>
                </div>
                <p class="text-xs text-slate-500 mt-1">Minimum entry requirement: B1 English efficiency</p>
                <ul class="mt-6 space-y-3 text-sm font-light text-slate-300 border-t border-white/5 pt-4">
                    <li class="flex items-center gap-2">✔ 2 × 27-min Immersive High-Intensity Syncs</li>
                    <li class="flex items-center gap-2">✔ Async Architecture Review Support (1/Cycle)</li>
                    <li class="flex items-center gap-2">✔ High-Frequency Conversational Audits</li>
                </ul>
            </div>
            <div class="pt-8 border-t border-white/5 mt-6">
                <div class="text-2xl font-bold text-white">360 PLN <span class="text-xs font-light text-slate-500">/ cycle</span></div>
                <div class="text-[10px] text-slate-500 font-mono mt-1">Approx. 180 PLN per tactical milestone session</div>
            </div>
        </div>

        <!-- ACCELERATOR TRACK -->
        <div @click="selectPlan('accelerator')" 
             :class="selectedPlan === 'accelerator' ? 'border-[#0070f3] bg-[#0070f3]/[0.02] ring-1 ring-[#0070f3]' : 'border-white/5 bg-black/20 hover:border-white/10'"
             class="p-6 rounded-2xl cursor-pointer transition-all flex flex-col justify-between relative group premium-glow">
            <div class="absolute top-0 right-6 -translate-y-1/2 bg-[#0070f3] text-white text-[9px] px-2.5 py-0.5 rounded-full font-semibold tracking-wider uppercase">Most Selected</div>
            <div>
                <div class="text-white font-semibold text-lg flex items-center justify-between">
                    <span>Accelerator Track</span>
                    <span class="text-[10px] uppercase font-mono px-2 py-0.5 rounded border border-[#0070f3]/20 bg-[#0070f3]/5 text-[#0070f3]">14-Day Cycle</span>
                </div>
                <p class="text-xs text-slate-500 mt-1">Complete system fluency acceleration</p>
                <ul class="mt-6 space-y-3 text-sm font-light text-slate-300 border-t border-white/5 pt-4">
                    <li class="flex items-center gap-2 font-medium text-white">✔ Everything included in Sprint Framework</li>
                    <li class="flex items-center gap-2">✔ + 2 Structural Micro-Sprints</li>
                    <li class="flex items-center gap-2">✔ + Priority 24-Hour Review SLA Matrix</li>
                    <li class="flex items-center gap-2">✔ + Deep-Dive Live Presentation Prep</li>
                </ul>
            </div>
            <div class="pt-8 border-t border-white/5 mt-6">
                <div class="text-2xl font-bold text-white">720 PLN <span class="text-xs font-light text-slate-500">/ cycle</span></div>
                <div class="text-[10px] text-slate-400 font-mono mt-1">6 highly targeted interactions per sprint window</div>
            </div>
        </div>

        <!-- EXECUTIVE FRAMEWORK -->
        <div @click="selectPlan('executive')" 
             :class="selectedPlan === 'executive' ? 'border-[#0070f3] bg-[#0070f3]/[0.02] ring-1 ring-[#0070f3]' : 'border-white/5 bg-black/20 hover:border-white/10'"
             class="p-6 rounded-2xl cursor-pointer transition-all flex flex-col justify-between relative group">
            <div>
                <div class="text-white font-semibold text-lg flex items-center justify-between">
                    <span>Executive Mode</span>
                    <span class="text-[10px] uppercase font-mono px-2 py-0.5 rounded border border-white/10 bg-black text-slate-400">Custom Track</span>
                </div>
                <p class="text-xs text-slate-500 mt-1">For Founders, Operators & Tech Executives</p>
                <ul class="mt-6 space-y-3 text-sm font-light text-slate-300 border-t border-white/5 pt-4">
                    <li class="flex items-center gap-2">✔ Priority Schedule Routing & Same-Day Auditing</li>
                    <li class="flex items-center gap-2">✔ VC, Boardroom, and M&A Simulated Challenges</li>
                    <li class="flex items-center gap-2 text-[#0070f3] font-medium">✔ Direct, unfiltered access to strategic strategy assets</li>
                </ul>
            </div>
            <div class="pt-8 border-t border-white/5 mt-6">
                <div class="text-2xl font-bold text-white">1800 PLN <span class="text-xs font-light text-slate-500">/ cycle</span></div>
                <div class="text-[10px] text-slate-500 font-mono mt-1">High-stakes corporate communication governance</div>
            </div>
        </div>
    </div>

    <!-- TIER 2: B2B CORPORATE PLANS -->
    <div x-show="tier === 'b2b'" x-transition:enter="transition ease-out duration-200" x-cloak class="grid md:grid-cols-2 gap-8">
        <!-- CUSTOM ENTERPRISE TRACK -->
        <div class="p-8 rounded-2xl border border-white/5 bg-black/20 flex flex-col justify-between space-y-6">
            <div class="space-y-4">
                <div class="text-white font-semibold text-xl flex items-center justify-between">
                    <span x-show="lang === 'en'">Custom Syllabus Matrix</span>
                    <span x-show="lang === 'pl'" x-cloak>Indywidualny Program Warsztatów</span>
                    <span class="text-[10px] uppercase font-mono px-2 py-0.5 rounded border border-[#0070f3]/30 bg-[#0070f3]/5 text-[#0070f3]">1-on-1 Dedicated</span>
                </div>
                <p class="text-sm text-slate-400 font-light leading-relaxed">
                    <span x-show="lang === 'en'">For engineers preparing for highly specialized milestones: architecting global project handovers, preparing technical keynote presentations, or migrating into cross-border management brackets.</span>
                    <span x-show="lang === 'pl'" x-cloak>Dla deweloperów przygotowujących się do unikalnych kamieni milowych: prowadzenia międzynarodowych wdrożeń, autorskich prezentacji technicznych czy przejścia na stanowiska managerskie w strukturach US/UK.</span>
                </p>
                <ul class="space-y-2.5 text-xs font-mono text-slate-400 pt-2">
                    <li>• Bespoke material design mapping your tech stack</li>
                    <li>• Direct alignment with organizational architecture terminology</li>
                    <li>• Fully flexible schedule routing options</li>
                </ul>
            </div>
            <div class="pt-6 border-t border-white/5">
                <a href="mailto:english@angielski.dev?subject=Custom%20Syllabus%20Inquiry" class="inline-block w-full text-center bg-transparent border border-white/10 hover:border-white/30 text-white px-6 py-3 rounded-xl text-xs font-semibold transition-all">
                    <span x-show="lang === 'en'">Contact for Custom Parameters</span>
                    <span x-show="lang === 'pl'" x-cloak>Zapytaj o program dedykowany</span>
                </a>
            </div>
        </div>

        <!-- B2B TEAM VELOCITY / BULK ACCOUNTS -->
        <div class="p-8 rounded-2xl border border-[#0070f3]/20 bg-[#0070f3]/[0.01] flex flex-col justify-between space-y-6 premium-glow">
            <div class="space-y-4">
                <div class="text-white font-semibold text-xl flex items-center justify-between">
                    <span x-show="lang === 'en'">Team Velocity Protocol</span>
                    <span x-show="lang === 'pl'" x-cloak>Pakiety Zespołowe dla IT</span>
                    <span class="text-[10px] uppercase font-mono px-2 py-0.5 rounded bg-[#0070f3] text-black font-semibold">Bulk Allocation</span>
                </div>
                <p class="text-sm text-slate-400 font-light leading-relaxed">
                    <span x-show="lang === 'en'">Scale structural business English across your engineering layers, product departments, or management core. We clear regional communication latency for scale software houses and distributed organizations.</span>
                    <span x-show="lang === 'pl'" x-cloak>Podnieś standard płynności językowej w całych zespołach deweloperskich, działach produktowych lub strukturach zarządczych. Skutecznie eliminujemy bariery językowe w polskich software house'ach.</span>
                </p>
                <div class="p-3 bg-black/40 rounded-xl border border-white/5 text-xs flex items-center justify-between">
                    <span class="text-slate-400 font-light">3+ Developer Seats Allocation:</span>
                    <span class="text-emerald-400 font-semibold font-mono">Volume Discounts Apply</span>
                </div>
            </div>
            <div class="pt-6 border-t border-white/5">
                <a href="mailto:english@angielski.dev?subject=B2B%20Bulk%20Team%20Discount%20Inquiry" class="inline-block w-full text-center bg-[#0070f3] hover:bg-[#0062d4] text-white px-6 py-3 rounded-xl text-xs font-semibold transition-all shadow-lg shadow-[#0070f3]/10">
                    <span x-show="lang === 'en'">Request B2B Corporate Offer (Faktura VAT)</span>
                    <span x-show="lang === 'pl'" x-cloak>Zapytaj o ofertę B2B i rabat grupowy</span>
                </a>
            </div>
        </div>
    </div>

    <!-- CTA Container -->
    <div class="mt-16 flex flex-col md:flex-row items-center justify-between gap-8 bg-black/40 border border-white/5 p-8 rounded-2xl">
        <div class="space-y-1 text-center md:text-left">
            <h4 class="text-white font-medium text-lg">Ready to deploy your integration plan?</h4>
            <p class="text-xs text-slate-500 font-light">Secure your cohort allocation. Handshake configuration takes less than 2 minutes.</p>
        </div>
        <button @click="reserveSlot()" class="w-full md:w-auto bg-[#0070f3] text-white px-10 py-4 rounded-xl text-sm font-semibold hover:bg-[#0062d4] transition-all shadow-lg shadow-[#0070f3]/10">
            Deploy Selected Track
        </button>
    </div>
</section>
    </main>

    <!-- Modal System Integration Container -->
    <div x-show="showWaitlist" 
         x-transition:enter="transition ease-out duration-200" 
         x-transition:enter-start="opacity-0 scale-98" 
         x-transition:enter-end="opacity-100 scale-100" 
         x-cloak 
         class="fixed inset-0 flex items-center justify-center bg-black/80 z-[100] backdrop-blur-md px-6">
        <div class="w-full max-w-md p-8 rounded-2xl border border-white/10 bg-[#0e0e12] shadow-2xl premium-glow">
            <div class="text-white mb-6 flex items-center gap-3">
                <span class="w-2 h-2 rounded-full bg-[#0070f3] animate-ping"></span>
                <span class="font-semibold text-base tracking-tight">Initializing Cohort Reservation</span>
            </div>
            
            <div class="space-y-3 text-sm border-y border-white/5 py-4 my-6">
                <div class="flex justify-between"><span class="text-slate-500">Target Framework:</span><span class="text-[#0070f3] font-mono uppercase font-semibold" x-text="selectedPlan"></span></div>
                <div class="flex justify-between"><span class="text-slate-500">Operational Window:</span><span class="text-white font-light">Immediate 14-Day Cycle Deployment</span></div>
                <div class="flex justify-between"><span class="text-slate-500">Allocation Status:</span><span class="text-emerald-400 font-medium">Slot Reserved & Authenticated</span></div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <a href="/schedule" class="flex-1 text-center bg-[#0070f3] text-white px-5 py-3 rounded-xl text-xs font-semibold hover:bg-[#0062d4] transition-all">
                    Confirm & Book Session
                </a>
                <button @click="showWaitlist = false" class="px-5 py-3 rounded-xl border border-white/10 text-xs font-medium text-slate-400 hover:text-white transition-all bg-transparent">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</body>
</html>