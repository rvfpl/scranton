<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EMEA.dev | Developers, Startups & Market Intelligence</title>

    <meta name="description"
          content="Discover developers, startups, salaries, jobs and market intelligence across Europe, Middle East and Africa.">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        .glass {
            backdrop-filter: blur(12px);
            background: rgba(255,255,255,.85);
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900">

@php

$countries = [
    ['name'=>'Poland','code'=>'pl','developers'=>'525K','jobs'=>1243],
    ['name'=>'Germany','code'=>'de','developers'=>'1.1M','jobs'=>5341],
    ['name'=>'United Kingdom','code'=>'uk','developers'=>'1.6M','jobs'=>8210],
    ['name'=>'UAE','code'=>'ae','developers'=>'110K','jobs'=>782],
    ['name'=>'Saudi Arabia','code'=>'sa','developers'=>'175K','jobs'=>991],
    ['name'=>'South Africa','code'=>'za','developers'=>'160K','jobs'=>654],
    ['name'=>'Nigeria','code'=>'ng','developers'=>'320K','jobs'=>844],
    ['name'=>'Kenya','code'=>'ke','developers'=>'125K','jobs'=>421],
];

$reports = [
    '2026 EMEA Developer Salary Report',
    'Top Startup Ecosystems in Africa',
    'Middle East AI Adoption Index',
    'Remote Engineering Trends Across Europe'
];

@endphp

<!-- NAVIGATION -->
<nav class="fixed top-0 left-0 right-0 z-50 border-b bg-white/90 backdrop-blur">
    <div class="max-w-7xl mx-auto px-4">

        <div class="flex h-16 items-center justify-between">

            <a href="/emea"
               class="font-bold text-2xl tracking-tight hover:text-blue-600">
                EMEA.dev</span>
            </a>

            <div class="hidden md:flex items-center gap-8">
                <a href="#countries" class="hover:text-blue-600">Countries</a>
                <a href="#cities" class="hover:text-blue-600">Cities</a>
                <a href="#reports" class="hover:text-blue-600">Reports</a>
                <a href="#newsletter" class="hover:text-blue-600">Newsletter</a>
            </div>

            <button
                onclick="toggleMenu()"
                class="md:hidden">

                <svg class="w-7 h-7"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <div id="mobileMenu"
             class="hidden md:hidden pb-5">

            <div class="flex flex-col gap-4">

                <a href="#countries">Countries</a>
                <a href="#cities">Cities</a>
                <a href="#reports">Reports</a>
                <a href="#newsletter">Newsletter</a>

            </div>
        </div>

    </div>
</nav>

<!-- HERO -->
<section class="pt-32 pb-20">

    <div class="max-w-7xl mx-auto px-4">

        <div class="max-w-4xl">

            <div class="inline-flex rounded-full bg-blue-100 text-blue-700 px-4 py-2 text-sm font-medium">
                EMEA Technology Intelligence Platform
            </div>

            <h1 class="mt-6 text-5xl md:text-7xl font-bold tracking-tight">
                Discover  Tech Ecosystems Across
                <span class="text-blue-700">Europe, Middle East</span> &<span class="text-blue-700"> Africa</span>
            </h1>

            <p class="mt-6 text-xl text-slate-600">
                Explore countries, startup hubs, developer salaries,
                jobs, AI adoption and market intelligence.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">

                <a href="#countries"
                   class="bg-black text-white px-6 py-3 rounded-xl">
                    Explore Countries
                </a>

                <a href="#reports"
                   class="border px-6 py-3 rounded-xl">
                    View Reports
                </a>

            </div>

        </div>

        <!-- SEARCH -->
        <div class="mt-12 max-w-2xl">

            <div class="bg-white rounded-2xl shadow-sm border p-3">

            <div class="relative">

    <svg
        class="absolute left-4 top-4 h-5 w-5 text-slate-400"
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

</section>

<!-- STATS -->
<section class="pb-20">

    <div class="max-w-7xl mx-auto px-4">

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white rounded-2xl p-6 border">
                <div class="text-3xl font-bold">120+</div>
                <div class="text-slate-500">Countries</div>
            </div>

            <div class="bg-white rounded-2xl p-6 border">
                <div class="text-3xl font-bold">25M+</div>
                <div class="text-slate-500">Developers</div>
            </div>

            <div class="bg-white rounded-2xl p-6 border">
                <div class="text-3xl font-bold">80K+</div>
                <div class="text-slate-500">Startups</div>
            </div>

            <div class="bg-white rounded-2xl p-6 border">
                <div class="text-3xl font-bold">500K+</div>
                <div class="text-slate-500">Open Positions</div>
            </div>

        </div>

    </div>

</section>






<!-- COUNTRIES -->
<section id="countries" class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-4">
<div class="flex flex-wrap gap-3 mb-10">

    <button class="px-4 py-2 rounded-full bg-blue-600 text-white">
        All
    </button>

    <button class="px-4 py-2 rounded-full border hover:bg-slate-100">
        Europe
    </button>

    <button class="px-4 py-2 rounded-full border hover:bg-slate-100">
        Middle East
    </button>

    <button class="px-4 py-2 rounded-full border hover:bg-slate-100">
        Africa
    </button>

</div>
        <h2 class="text-4xl font-bold mb-12">
            Browse Countries
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach($countries as $country)

                <a href="/{{ $country['code'] }}"
                   class="border rounded-2xl bg-white p-6 hover:shadow-lg transition">

                    <h3 class="font-bold text-xl">
                        {{ $country['name'] }}
                    </h3>

                    <div class="mt-4 text-sm text-slate-500">
                        Developers: {{ $country['developers'] }}
                    </div>

                    <div class="text-sm text-slate-500">
                        Jobs: {{ number_format($country['jobs']) }}
                    </div>

                </a>

            @endforeach

        </div>

    </div>

</section>

<!-- CITIES -->
<section id="cities" class="py-20">

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

<section class="py-20 bg-white">

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


<section class="py-20">

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



<section class="py-20">

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
<section id="reports" class="py-20 bg-white">

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
<section id="newsletter" class="py-24">

    <div class="max-w-3xl mx-auto px-4 text-center">

        <h2 class="text-4xl font-bold">
            Stay Ahead of the EMEA Market
        </h2>

        <p class="mt-4 text-slate-600">
            Weekly insights on startups, salaries, AI and hiring trends.
        </p>

        <div class="mt-8 flex flex-col md:flex-row gap-4">

            <input
                type="email"
                placeholder="Your email"
                class="flex-1 px-5 py-4 rounded-xl border">

            <button
                class="bg-black text-white px-8 rounded-xl">
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