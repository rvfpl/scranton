{{-- resources/views/partials/nav.blade.php --}}
<nav
    x-data="{ search: '' }"
    class="fixed top-0 inset-x-0 z-50 h-16 nav-blur bg-white/80 border-b border-slate-200"
    @keyup.window="$dispatch('nav-search', { q: search })"
>
    <div class="max-w-screen-xl mx-auto h-full px-6 flex items-center gap-6">

        {{-- Logo --}}
        <a href="/" class="flex items-center gap-2 shrink-0">
            <div class="w-7 h-7 rounded-md bg-accent flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2v-4M9 21H5a2 2 0 01-2-2v-4m0 0h18"/>
                </svg>
            </div>
            <span class="font-sans font-800 text-sm tracking-tight text-ink">EMEA<span class="text-accent">.dev</span></span>
        </a>

        {{-- Search --}}
        <div class="relative flex-1 max-w-xs">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z"/>
            </svg>
            <input
                type="search"
                x-model="search"
                @input="$dispatch('nav-search', { q: search })"
                placeholder="Search nodes…"
                class="w-full pl-9 pr-3 py-1.5 text-sm font-mono bg-slate-100 border border-slate-200 rounded-md placeholder-slate-400 text-ink focus:outline-none focus:ring-2 focus:ring-accent/40 focus:border-accent transition"
            />
        </div>

        {{-- Nav Links --}}
        <div class="hidden md:flex items-center gap-1 ml-2">
            @foreach (['Infrastructure', 'Compliance', 'Latency'] as $link)
            <a
                href="#{{ strtolower($link) }}"
                class="px-3 py-1.5 text-sm font-sans font-600 text-slate-500 hover:text-ink hover:bg-slate-100 rounded-md transition-colors"
            >{{ $link }}</a>
            @endforeach
        </div>

        {{-- Spacer --}}
        <div class="flex-1"></div>

        {{-- Language Toggle --}}
        <div x-data="{ lang: 'EN' }" class="flex items-center gap-0.5 bg-slate-100 rounded-lg p-0.5 border border-slate-200">
            @foreach (['EN', 'AR'] as $l)
            <button
                @click="lang = '{{ $l }}'; $dispatch('lang-change', { lang: '{{ $l }}' })"
                :class="lang === '{{ $l }}' ? 'bg-white text-accent shadow-sm font-700' : 'text-slate-500 hover:text-slate-700'"
                class="px-2.5 py-1 text-xs font-mono font-500 rounded-md transition-all duration-150"
            >{{ $l }}</button>
            @endforeach
        </div>

        {{-- Status badge --}}
        <div class="hidden sm:flex items-center gap-1.5 border border-emerald-200 bg-emerald-50 rounded-full px-3 py-1">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            <span class="text-xs font-mono text-emerald-700 font-500">All Systems</span>
        </div>

    </div>
</nav>