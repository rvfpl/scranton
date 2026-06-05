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
      <div class="w-24 h-8 rounded-md bg-blue-950 text-white flex items-center justify-center hover:bg-blue-800 transition-colors font-semibold">
       EMEA<span style="color:#eee">.dev</span> 
      </div>
    </a>

            <div class="hidden md:flex items-center gap-8 font-medium">
                <a href="#countries" class="hover:text-blue-600">Countries</a>
                <a href="#cities" class="hover:text-blue-600">Cities</a>
                <a href="#reports" class="hover:text-blue-600">Reports</a>
            </div>

        <button @click="mobileMenu = !mobileMenu" type="button" class="md:hidden p-2 text-blue-950 focus:outline-none">
    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path x-show="!mobileMenu" 
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      stroke-linecap="round" 
      stroke-linejoin="round" 
      stroke-width="2" 
      d="M4 6h16M4 12h16M4 18h16" />
        
        <path x-show="mobileMenu" 
              x-cloak 
              stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              d="M6 18L18 6M6 6l12 12" />
    </svg>
</button>


            
        </div>

        <div x-show="mobileMenu" x-cloak class="md:hidden border-t bg-blue-800 px-4 py-5 flex flex-col gap-4 hover:bg-blue-800">
            <a href="#countries" @click="mobileMenu = false" class="text-neutral-400 hover:text-white">Countries</a>
            <a href="#cities" @click="mobileMenu = false" class="text-neutral-400 hover:text-white">Cities</a>
            <a href="#reports" @click="mobileMenu = false" class="text-neutral-400 hover:text-white">Reports</a>
        </div>
    </nav>
 
    
    <section class="pt-24 pb-16 px-4 md:py-32 ">
        <div class="max-w-7xl mx-auto">
            <div class="max-w-5xl">
                <span class="inline-block rounded-full bg-blue-50 text-blue-800 px-4 py-1 text-xs font-bold tracking-wide uppercase">
                    EMEA Intelligence Platform
                </span>
                <h1 class="mt-6 text-5xl md:text-7xl font-extrabold tracking-tighter leading-[1.1] md:my-12">
                    Discover Tech Hubs Across
                    <span class="text-blue-700">Europe, Middle East</span> & <span class="text-blue-700">Africa</span>
                </h1>
                <p class="mt-8 text-xl text-slate-800 max-w-4xl font-semibold">
                    Explore  startup hubs, hiring trends, and dev salaries across 99+ countries.
                </p>

<!-- SEARCH -->
        <div class="mt-8 max-w-2xl">

            <div class="bg-gray-100 rounded-2xl shadow-sm border p-1 hover:bg-blue-500 transition-colors">

            <div class="relative">

    <svg
        class="absolute left-4 top-4 h-5 w-5 text-slate-400 border-r border-gray-300 pr-1"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
    </svg>

    <input
        id="countrySearch"
        type="text"
        placeholder="Search countries, cities, startups..."
        class="w-full pl-12 pr-4 py-4 rounded-2xl border outline-none focus:ring-2 focus:ring-blue-500">

</div>

            </div>

        </div>

    </div>
 
  
             <div class="mt-6 flex gap-4">
    <!-- Explore Countries -->
    <a href="#countries" class="bg-blue-950 text-white px-6 py-4 rounded-xl font-semibold hover:bg-blue-800 transition">
        Explore Countries
    </a>
    
    <!-- View Reports -->
    <a href="#reports" class="bg-white text-blue-950 border border-blue-950 px-6 py-4 rounded-xl font-semibold hover:bg-blue-800 hover:text-white hover:border-blue-800 transition">
        View Reports
    </a>
</div>
            </div>
        </div>
    </section>

<!-- STATS -->
<section class="py-8 bg-blue-950">

    <div class="max-w-7xl mx-auto px-4">

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

            <div class="bg-white rounded-2xl p-4 border">
                <div class="text-2xl font-bold">120+</div>
                <div class="text-slate-500">Countries</div>
            </div>

            <div class="bg-white rounded-2xl p-4 border">
                <div class="text-2xl font-bold">25M+</div>
                <div class="text-slate-500">Developers</div>
            </div>

            <div class="bg-white rounded-2xl p-4 border">
                <div class="text-2xl font-bold">80K+</div>
                <div class="text-slate-500">Startups</div>
            </div>

            <div class="bg-white rounded-2xl p-4 border">
                <div class="text-2xl font-bold">500K+</div>
                <div class="text-slate-500">Open Positions</div>
            </div>

        </div>

    </div>

</section>


@php



$reports = [
    '2026 EMEA Developer Salary Report',
    'Top Startup Ecosystems in Africa',
    'Middle East AI Adoption Index',
    'Remote Engineering Trends Across Europe'
];

@endphp

@php
    // Added 'region' key for filtering
    $countries = [
        ['name'=>'Poland','code'=>'pl','developers'=>'525K','jobs'=>1243, 'region' => 'Europe'],
        ['name'=>'Germany','code'=>'de','developers'=>'1.1M','jobs'=>5341, 'region' => 'Europe'],
        ['name'=>'UAE','code'=>'ae','developers'=>'110K','jobs'=>782, 'region' => 'Middle East'],
        ['name'=>'Nigeria','code'=>'ng','developers'=>'320K','jobs'=>844, 'region' => 'Africa'],
        ['name'=>'Kenya','code'=>'ke','developers'=>'125K','jobs'=>421, 'region' => 'Africa'],
        ['name'=>'Saudi Arabia','code'=>'sa','developers'=>'175K','jobs'=>991, 'region' => 'Middle East'],
        ['name'=>'South Africa','code'=>'za','developers'=>'160K','jobs'=>654, 'region' => 'Africa'],
        ['name'=>'United Kingdom','code'=>'uk','developers'=>'1.6M','jobs'=>8210, 'region' => 'Europe'],   
    ];

    $regions = ['All', 'Europe', 'Middle East', 'Africa'];
@endphp

<section id="countries" x-data="{ activeRegion: 'All' }" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        
        <div class="flex flex-wrap gap-3 mb-10">
            @foreach($regions as $region)
                <button 
                    @click="activeRegion = '{{ $region }}'"
                    :class="activeRegion === '{{ $region }}' ? 'bg-blue-600 text-white' : 'border hover:bg-slate-100'"
                    class="px-4 py-2 rounded-full transition-colors">
                    {{ $region }}
                </button>
            @endforeach
        </div>

        <h2 class="text-4xl font-bold mb-12">Browse Countries</h2>

      <div class="flex flex-col border rounded-2xl bg-white overflow-hidden">
    @foreach($countries as $country)
        <a href="/{{ $country['code'] }}"
           x-show="activeRegion === 'All' || activeRegion === '{{ $country['region'] }}'"
           class="flex items-center justify-between px-4 py-2 border-b last:border-b-0 hover:bg-slate-50 transition">
            
            <div class="font-bold text-lg">{{ $country['name'] }}</div>
            
            <div class="flex gap-8 text-sm text-slate-500">
                <span class="w-24">Devs: {{ $country['developers'] }}</span>
                <span class="w-24">Jobs: {{ number_format($country['jobs']) }}</span>
            </div>
        </a>
    @endforeach
</div>
    </div>
</section>

<!-- CITIES -->
<section id="cities" class="py-16">

    <div class="max-w-7xl mx-auto px-4">

        <h2 class="text-4xl font-bold mb-12">
            Featured Tech Hubs
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

           <a href="/pl/gdansk"
   class="group bg-white border rounded-2xl p-6 hover:shadow-lg transition">

    <div class="flex justify-between items-center">

        <h3 class="font-semibold">
            Gdańsk 🇵🇱
        </h3>

        <span class="text-xs px-2 py-1 bg-green-100 text-green-700 rounded-full">
            Rising
        </span>

    </div>

    <div class="mt-4 text-sm text-slate-500">
        248 startups · 14,500 developers
    </div>

</a>

            <a href="#" class="bg-white border rounded-2xl p-6">
                Berlin 🇩🇪
            </a>

            <a href="#" class="bg-white border rounded-2xl p-6">
                Dubai 🇦🇪
            </a>

            <a href="#" class="bg-white border rounded-2xl p-6">
                Cape Town 🇿🇦
            </a>

        </div>

    </div>

</section>

<section class="py-16 bg-white">

    <div class="max-w-7xl mx-auto px-4">

        <h2 class="text-4xl font-bold mb-12">
            Featured Startups
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach([
                'FintechHub',
                'CloudForge',
                'AIStack',
                'HealthScale'
            ] as $startup)

                <div class="border rounded-2xl bg-white p-6 hover:shadow-lg">

                    <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center font-bold text-blue-700">
                        {{ substr($startup,0,1) }}
                    </div>

                    <h3 class="font-semibold mt-4">
                        {{ $startup }}
                    </h3>

                    <p class="text-sm text-slate-500 mt-2">
                        High-growth startup operating across EMEA.
                    </p>

                </div>

            @endforeach

        </div>

    </div>

</section>


<section class="py-16 ">

    <div class="max-w-7xl mx-auto px-4">

        <h2 class="text-4xl font-bold mb-12">
            Developer Salary Snapshot
        </h2>

        <div class="grid md:grid-cols-3 gap-6">

            <div class="bg-white rounded-2xl border p-6">
                <div class="text-slate-500">Poland</div>
                <div class="text-3xl font-bold mt-2">€42,000</div>
            </div>

            <div class="bg-white rounded-2xl border p-6">
                <div class="text-slate-500">Germany</div>
                <div class="text-3xl font-bold mt-2">€68,000</div>
            </div>

            <div class="bg-white rounded-2xl border p-6">
                <div class="text-slate-500">UAE</div>
                <div class="text-3xl font-bold mt-2">€58,000</div>
            </div>

        </div>

    </div>

</section>



<section class="py-16 ">

    <div class="max-w-7xl mx-auto px-4">

        <h2 class="text-4xl font-bold mb-12">
            Top Ecosystems
        </h2>

        <div class="overflow-hidden rounded-2xl border bg-white">

            <table class="w-full">

                <thead class="bg-slate-50">
                <tr>
                    <th class="text-left p-4">Rank</th>
                    <th class="text-left p-4">City</th>
                    <th class="text-left p-4">Startups</th>
                    <th class="text-left p-4">Growth</th>
                </tr>
                </thead>

                <tbody>

                <tr class="border-t">
                    <td class="p-4">1</td>
                    <td class="p-4">London</td>
                    <td class="p-4">18,000+</td>
                    <td class="p-4 text-green-600">+18%</td>
                </tr>

                <tr class="border-t">
                    <td class="p-4">2</td>
                    <td class="p-4">Berlin</td>
                    <td class="p-4">12,000+</td>
                    <td class="p-4 text-green-600">+14%</td>
                </tr>

                <tr class="border-t">
                    <td class="p-4">3</td>
                    <td class="p-4">Dubai</td>
                    <td class="p-4">7,500+</td>
                    <td class="p-4 text-green-600">+29%</td>
                </tr>

                </tbody>

            </table>

        </div>

    </div>

</section>




<!-- REPORTS -->
<section id="reports" class="py-16 bg-white">

    <div class="max-w-7xl mx-auto px-4">

        <h2 class="text-4xl font-bold mb-12">
            Latest Intelligence Reports
        </h2>

        <div class="grid md:grid-cols-2 gap-6">

            @foreach($reports as $report)

                <div class="bg-slate-50 rounded-2xl border p-6">

                    <h3 class="font-semibold text-lg">
                        {{ $report }}
                    </h3>

                    <a href="#"
                       class="inline-block mt-4 text-blue-600">
                        Read Report →
                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>

<!-- NEWSLETTER -->
<section id="newsletter" class="py-24 ">

    <div class="max-w-3xl mx-auto px-4 text-center ">

        <h2 class="text-4xl font-bold">
            Stay Ahead of the EMEA Market
        </h2>

        <p class="mt-4 text-slate-600">
            Weekly insights on startups, hiring trends, and salaries.
        </p>

        <div class="mt-8 flex flex-col md:flex-row gap-4">

            <input
                type="email"
                placeholder="Your email"
                class="flex-1 px-5 py-4 rounded-xl border">

            <button
                class="bg-blue-950 text-white px-8 rounded-xl hover:bg-blue-800 transition-colors font-semibold py-4">
                Subscribe
            </button>

        </div>

    </div>

</section>

@php
    $footerLinks = [
        'Explore' => ['Countries' => '#countries', 'Cities' => '#cities', 'Reports' => '#reports'],
        'Resources' => ['Jobs' => '#', 'Salaries' => '#', 'Startups' => '#'],
        'Legal' => ['Privacy' => '#', 'Terms' => '#'],
    ];
@endphp

<footer class="border-t bg-white">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <div class="font-bold text-xl">EMEA.dev</div>
                <p class="mt-3 text-slate-500 text-sm leading-relaxed">
                    Developers, startups and intelligence across Europe, Middle East and Africa.
                </p>
            </div>

            @foreach($footerLinks as $title => $links)
                <div>
                    <h4 class="font-semibold text-slate-900 mb-3">{{ $title }}</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        @foreach($links as $name => $url)
                            <li><a href="{{ $url }}" class="hover:text-blue-600 transition-colors">{{ $name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        <div class="border-t mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-slate-500">
            <p>&copy; {{ date('Y') }} EMEA.dev | All rights reserved.</p>
            
            <div class="flex gap-2 font-mono text-xs">
                <a href="https://newyork.dev" class="hover:text-slate-900 transition-colors">NewYork.dev</a>
                <span class="text-slate-300">|</span>
                <a href="https://thbay.dev" class="hover:text-slate-900 transition-colors">TheBay.dev</a>
                <span class="text-slate-300">|</span>
                <a href="https://bengaluru.dev" class="hover:text-slate-900 transition-colors"> Bengaluru.dev</a>
                 <span class="text-slate-300">|</span>
                <a href="https://gdansk.dev" class="hover:text-slate-900 transition-colors"> Gdansk.dev</a>
            </div>
        </div>
    </div>
</footer>

<script>
function toggleMenu() {
    document
        .getElementById('mobileMenu')
        .classList
        .toggle('hidden');
}
</script>

</body>
</html>