
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="6QJlGlZuqQcuQx5MSoYfeYXnFPwj6xJJRn33O5X6">

<!-- FIX: one favicon set instead of three competing/duplicate link tags -->
<link rel="icon" type="image/x-icon" href="https://czest.eu/favicon-new.ico?v=1781731938">
<link rel="apple-touch-icon" sizes="180x180" href="https://czest.eu/apple-touch-icon.png">

<title>Czest.eu - Częstochowa</title>
<meta name="description" content="Częstochowa po angielsku. Czestochowa English-speaking business directory, travel blog, community hub for expats and international foreign visitors.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://czest.eu">
<meta property="og:title" content="Czest.eu - Częstochowa">
<meta property="og:description" content="Częstochowa po angielsku. English-speaking hub in Czestochowa for foreign visitors and expats.">
<meta property="og:image" content="https://czest.eu/images/og-preview.jpg?v=1">
<link rel="canonical" href="https://czest.eu">

<!-- FIX: a single theme-color, derived from JS rather than two hardcoded <meta> values
     that the old inline script silently disagreed with -->
<meta name="theme-color" content="#0b1120">

<!-- REMOVED: Font Awesome (6.5.1, full stylesheet) — every icon actually used on this
     page is inline SVG. Zero fa- classes appeared anywhere in the source. Re-add only
     if a real usage turns up elsewhere in the app. -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- NOTE: kept as-is, but audit whether Bebas Neue / Graduate are used anywhere —
     no class in this page references them; Poppins 600/800 likewise unreferenced here. -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;800&display=swap" rel="stylesheet">

<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js"></script>

<script>
  // FIX: theme state now lives in one place (an Alpine store) instead of being split
  // between the nav's local x-data and a separate vanilla-JS block at the bottom that
  // referenced DOM ids (#theme-toggle, #theme-toggle-dark-icon) which didn't exist
  // anywhere in the page. That whole second implementation is gone.
  document.addEventListener('alpine:init', () => {
    Alpine.store('theme', {
      dark: localStorage.theme === 'dark' ||
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
      toggle() {
        this.dark = !this.dark;
        localStorage.theme = this.dark ? 'dark' : 'light';
        document.documentElement.classList.toggle('dark', this.dark);
        document.querySelector('meta[name="theme-color"]')
          .setAttribute('content', this.dark ? '#0b1120' : '#ffffff');
      }
    });
    document.documentElement.classList.toggle('dark', Alpine.store('theme').dark);
  });
</script>

<style>
  html { max-width: 100%; overflow-x: clip; }
  body { max-width: 100%; position: relative; }

  /* FIX: was previously defined twice with conflicting widths (8px vs 4px) for the
     same .no-scrollbar/.custom-scrollbar pairing. One definition now. */
  .custom-scrollbar::-webkit-scrollbar { width: 6px; }
  .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
  .custom-scrollbar::-webkit-scrollbar-thumb { background: #f97316; border-radius: 10px; }
  .custom-scrollbar { scrollbar-width: thin; scrollbar-color: #f97316 transparent; }

  [x-cloak] { display: none !important; }

  /* REMOVED: .czech-flag-full / .czech-gradient-rw / .czech-gradient-e — defined in the
     original stylesheet but not applied to any element on this page. Dead CSS. */
</style>
</head>

<body class="font-sans antialiased bg-white dark:bg-[#0b1120] transition-colors">
<div class="min-h-screen bg-gray-100 dark:bg-slate-950 w-full"
     x-data="{
        languages: [
          { code: 'pl', label: 'POLSKI' }, { code: 'en', label: 'ENGLISH' },
          { code: 'ua', label: 'Українська' }, { code: 'it', label: 'ITALIANO' },
          { code: 'cs', label: 'ČEŠTINA' }, { code: 'de', label: 'DEUTSCH' },
          { code: 'es', label: 'ESPAÑOL' }, { code: 'fr', label: 'FRANÇAIS' }
        ],
        categories: [
          { slug: 'animals', label: 'Animals', icon: '🐾', count: 0 },
          { slug: 'automotive', label: 'Automotive', icon: '🚗', count: 0 },
          { slug: 'blog', label: 'Blog', icon: '📝', count: 0 },
          { slug: 'dining', label: 'Dining', icon: '🍽️', count: 0 },
          { slug: 'education', label: 'Education', icon: '🎓', count: 0 },
          { slug: 'electronics', label: 'Electronics', icon: '💻', count: 0 }
        ],
        members: [
          { name: 'czest', score: 490 }, { name: 'pop', score: 20 },
          { name: 'zzz', score: 10 }, { name: 'paula', score: 10 }, { name: 'notpaula', score: 10 }
        ]
     }">

<!-- FIX: this is now the ONLY language array and ONLY categories array on the page.
     The desktop dropdown, the mobile grid, the hero quick-filter, and the category
     grid section all loop over the same data with x-for instead of four separate
     hand-written copies. Update the list once, every view updates. -->

<a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 bg-blue-600 text-white px-4 py-2 rounded-lg z-[100]">
  Skip to content / Przejdź do treści
</a>

<nav x-data="{ mobileMenu: false }" class="sticky top-0 z-50 backdrop-blur-xl bg-white/80 dark:bg-[#0b1120]/80 border-b border-gray-200 dark:border-white/10">
  <div class="max-w-[1520px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">

      <div class="bg-red-700 px-2 py-1 rounded">
        <a href="https://czest.eu" class="flex items-center text-2xl font-black tracking-tighter text-white">
          <span>CZEST</span><span class="dark:text-orange-500">.eu</span>
        </a>
      </div>

      <div class="flex items-center space-x-3">

        <!-- Language switcher: single x-for, was previously 25 hand-written <a> tags -->
        <div class="relative" x-data="{ open: false, current: 'PL' }">
          <button @click="open = !open" @click.outside="open = false"
                  :aria-expanded="open" aria-haspopup="listbox"
                  class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gray-100 dark:bg-white/5 border border-gray-200 dark:border-white/10 text-gray-700 dark:text-gray-200 font-black text-xs">
            <span x-text="current"></span>
            <svg class="w-3 h-3 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-width="3" d="M19 9l-7 7-7-7" /></svg>
          </button>
          <ul x-show="open" x-cloak role="listbox" @keydown.escape.window="open = false"
              class="absolute right-0 mt-2 w-44 bg-white dark:bg-[#111827] border border-gray-200 dark:border-white/10 rounded-2xl shadow-2xl py-2 z-[60] max-h-48 overflow-y-auto custom-scrollbar">
            <template x-for="lang in languages" :key="lang.code">
              <li role="option">
                <a :href="'https://czest.eu/lang/' + lang.code"
                   @click="current = lang.code.toUpperCase()"
                   class="flex items-center justify-between px-4 py-2 text-sm font-bold text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-white/5">
                  <span x-text="lang.label"></span>
                  <span class="text-[10px] font-black opacity-30" x-text="lang.code.toUpperCase()"></span>
                </a>
              </li>
            </template>
          </ul>
        </div>

        <button @click="$store.theme.toggle()" aria-label="Toggle dark mode"
                class="hidden md:flex p-1.5 rounded-xl bg-gray-100 dark:bg-white/5 border border-gray-200 dark:border-white/10">
          <span x-show="!$store.theme.dark">🌙</span><span x-show="$store.theme.dark">☀️</span>
        </button>

        <div class="hidden md:flex items-center space-x-3 ml-4 border-l border-gray-200 dark:border-white/10 pl-4">
          <a href="https://czest.eu/login" class="text-sm font-bold text-gray-600 dark:text-gray-300">Zaloguj</a>
          <a href="https://czest.eu/register" class="px-5 py-2.5 rounded-xl bg-red-700 dark:bg-orange-500 text-white font-black text-sm">DOŁĄCZ</a>
        </div>

        <button @click="mobileMenu = !mobileMenu" :aria-expanded="mobileMenu" aria-controls="mobile-menu"
                aria-label="Toggle navigation menu"
                class="w-12 h-12 flex flex-col items-center justify-center rounded-xl bg-gray-100 dark:bg-white/5 lg:hidden">
          <div class="w-6 h-4 flex flex-col justify-between">
            <span :class="mobileMenu ? 'rotate-45 translate-y-1.5' : ''" class="block h-0.5 w-6 bg-gray-900 dark:bg-white transition-all"></span>
            <span :class="mobileMenu ? 'opacity-0' : ''" class="block h-0.5 w-6 bg-gray-900 dark:bg-white transition-all"></span>
            <span :class="mobileMenu ? '-rotate-45 -translate-y-2' : ''" class="block h-0.5 w-6 bg-gray-900 dark:bg-white transition-all"></span>
          </div>
        </button>
      </div>
    </div>
  </div>

  <div id="mobile-menu" x-show="mobileMenu" x-cloak x-transition class="fixed inset-0 top-[60px] z-[100] min-h-screen bg-white dark:bg-[#0b112b] overflow-y-auto pb-32 lg:hidden">
    <div class="p-6 space-y-8">
      <div class="grid grid-cols-2 gap-3">
        <a href="https://czest.eu/login" class="w-full py-4 text-center rounded-2xl font-bold bg-gray-50 dark:bg-white/5">Zaloguj</a>
        <a href="https://czest.eu/register" class="w-full py-4 text-center rounded-2xl font-black bg-orange-500 text-white">DOŁĄCZ</a>
      </div>

      <button @click="$store.theme.toggle()" class="w-full flex items-center justify-between px-5 py-4 rounded-2xl bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10">
        <span class="text-sm font-bold text-gray-700 dark:text-gray-200">Dark Mode</span>
        <div class="w-10 h-6 bg-gray-200 dark:bg-orange-500/20 rounded-full relative">
          <div class="absolute top-1 left-1 dark:left-5 w-4 h-4 bg-white dark:bg-orange-500 rounded-full transition-all"></div>
        </div>
      </button>

      <!-- same languages array, same x-for, rendered as a grid instead of a list -->
      <div>
        <span class="text-xs font-black uppercase text-gray-400 mb-4 block">Select Language</span>
        <div class="grid grid-cols-4 gap-2">
          <template x-for="lang in languages" :key="lang.code">
            <a :href="'https://czest.eu/lang/' + lang.code" class="flex items-center justify-center p-3 rounded-xl border bg-gray-50 dark:bg-white/5 dark:border-white/10">
              <span class="text-xs font-black uppercase" x-text="lang.code"></span>
            </a>
          </template>
        </div>
      </div>
    </div>
  </div>
</nav>

<main id="main-content" class="pb-6 px-1 w-full">
  <div class="max-w-[1920px] mx-auto px-0 sm:px-4">
    <section class="relative overflow-hidden bg-white dark:bg-[#0b1120] py-12 sm:py-32 text-center">
      <div class="relative max-w-[1520px] mx-auto px-4 sm:px-6 lg:px-8">

        <h1 class="text-7xl md:text-8xl font-black tracking-tighter text-gray-700 dark:text-white mb-4 leading-[0.9]">
          <span class="text-transparent bg-clip-text bg-gradient-to-r pr-2 from-orange-500 to-red-600">CZEST</span>.eu
        </h1>
        <p class="dark:text-gray-300"><strong>LOKALNE OGŁOSZENIA i PRZEWODNIK PO CZĘSTOCHOWIE &amp; JURZE</strong></p>

        <div class="mx-auto mt-8 px-2 max-w-[720px]" x-data="{ open: false, selectedCategory: 'All Categories', categorySlug: '' }">
          <form action="https://czest.eu/directory" method="GET" class="relative">
            <input type="hidden" name="category" x-model="categorySlug">
            <div class="flex flex-col md:flex-row items-center bg-gray-50 dark:bg-white/10 rounded-2xl md:rounded-full border border-gray-200 dark:border-gray-800 p-2 focus-within:border-orange-500">
              <div class="flex-1 flex items-center px-4 w-full">
                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <label for="search" class="sr-only">Search listings</label>
                <input id="search" type="text" name="search" autocomplete="off" placeholder="Znajdź Usługi • Mieszkania • Praca • Społeczność..."
                       class="w-full border-none focus:ring-0 bg-transparent text-gray-700 dark:text-gray-100 placeholder-gray-500 text-base py-3 font-bold">
              </div>

              <div class="relative w-full md:w-auto px-8" @click.away="open = false">
                <button type="button" @click="open = !open" :aria-expanded="open" aria-haspopup="listbox"
                        class="w-full flex items-center justify-between gap-4 px-4 py-3 text-xs font-black uppercase tracking-widest text-gray-600 dark:text-gray-300 hover:text-orange-500">
                  <span x-text="selectedCategory"></span>
                  <svg class="w-4 h-4" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 9l-7 7-7-7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>

                <!-- FIX: this dropdown now loops over the same `categories` array used by
                     the grid below. The original had a broken extra <a> tag wedged
                     between two <span>s inside the "All Categories" row — removed. -->
                <ul x-show="open" x-cloak role="listbox" @keydown.escape.window="open = false"
                    class="absolute z-50 right-0 mt-4 w-72 bg-[#161e2e] border-2 border-orange-500/20 rounded-2xl shadow-2xl overflow-hidden max-h-64 overflow-y-auto custom-scrollbar py-2">
                  <li role="option" @click="selectedCategory = 'All Categories'; categorySlug = ''; open = false"
                      class="flex items-center justify-between px-6 py-4 hover:bg-orange-500 hover:text-white cursor-pointer">
                    <span class="text-[12px] font-black text-gray-300 group-hover:text-white uppercase tracking-wider">All Categories</span>
                    <span class="text-[9px] font-bold text-gray-600">ALL</span>
                  </li>
                  <template x-for="cat in categories" :key="cat.slug">
                    <li role="option" @click="selectedCategory = cat.label; categorySlug = cat.slug; open = false"
                        class="flex items-center justify-between px-6 py-4 hover:bg-orange-500 hover:text-white cursor-pointer border-t border-white/5">
                      <span class="text-[12px] font-black text-gray-300 group-hover:text-white uppercase tracking-wider" x-text="cat.label"></span>
                      <span class="text-[9px] font-bold text-gray-600" x-text="cat.icon"></span>
                    </li>
                  </template>
                </ul>
              </div>

              <button type="submit" class="w-full md:w-auto px-10 py-3.5 bg-orange-400 text-white hover:bg-white hover:text-orange-500 font-black rounded-xl md:rounded-full uppercase text-xs tracking-[0.2em]">
                <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
              </button>
            </div>
          </form>
          <p class="dark:text-gray-300 my-8">Usługi • Mieszkania • Kupuj i Sprzedawaj po polsku lub po angielsku</p>
        </div>

        <a href="/rules" class="inline-block px-6 py-4 rounded-2xl bg-white dark:bg-white/5 border-2 border-gray-200 dark:border-white/10 text-gray-900 dark:text-white font-bold text-lg hover:bg-gray-50 dark:hover:bg-white/10 mb-12">
          + Dodaj Ogłoszenie
        </a>

        <div class="flex flex-wrap justify-center gap-3 mt-6">
          <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Trending:</span>
          <a href="/directory?search=English" class="text-xs font-bold text-orange-500 hover:underline">#English</a>
          <a href="/directory?search=Dev" class="text-xs font-bold text-orange-500 hover:underline">#Dev</a>
          <a href="/directory?search=Apartment" class="text-xs font-bold text-orange-500 hover:underline">#Apartment</a>
        </div>

        <!-- Category grid: same `categories` array, real per-category icons instead of
             📍 repeated six times. "0 Listings" only renders if the count is genuinely 0,
             which it still is here — that's a data question for the backend, not a
             template fix; flagging rather than silently hiding it. -->
        <div class="max-w-7xl mx-auto px-1 mt-20">
          <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-black tracking-tighter text-gray-900 dark:text-white uppercase">Szukaj Kategoriami</h2>
            <a href="https://czest.eu/directory" class="text-xs font-bold text-orange-500 uppercase tracking-widest hover:underline">View All →</a>
          </div>
          <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 gap-3">
            <template x-for="cat in categories" :key="cat.slug">
              <a :href="'https://czest.eu/directory?category=' + cat.slug"
                 class="group py-6 px-3 bg-white dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-2xl text-center hover:border-orange-500 hover:shadow-md hover:shadow-orange-500/10">
                <div class="w-12 h-12 bg-gray-50 dark:bg-white/5 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                  <span class="text-2xl" x-text="cat.icon"></span>
                </div>
                <h3 class="text-sm font-black text-gray-900 dark:text-white uppercase tracking-tight" x-text="cat.label"></h3>
                <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold" x-text="cat.count + ' Listings'"></p>
              </a>
            </template>
          </div>
        </div>

        <section class="max-w-4xl mx-auto px-4 mt-24">
          <div class="flex flex-col md:flex-row items-end justify-between mb-12 gap-4">
            <div>
              <span class="text-orange-500 font-black text-xs uppercase tracking-[0.2em] mb-2 block">Spotlight</span>
              <h2 class="text-4xl font-black tracking-tighter text-gray-900 dark:text-white uppercase leading-none">Featured Business</h2>
            </div>
            <p class="max-w-md text-gray-500 text-sm font-medium">Hand-picked local experts and enterprises verified by the Czest.eu community.</p>
          </div>
          <div class="p-12 border-2 border-dashed border-gray-200 dark:border-gray-800 rounded-[2.5rem] text-center">
            <p class="text-gray-500 font-bold uppercase tracking-widest text-xs">No featured listings currently available.</p>
          </div>
        </section>

        <div class="mt-12 bg-gray-50 dark:bg-white/5 rounded-[3rem] p-8 md:p-16 border border-gray-100 dark:border-white/5 max-w-7xl mx-auto">
          <div class="max-w-3xl mb-12 text-left">
            <span class="text-orange-500 font-black text-xs uppercase tracking-[0.2em]">The Community</span>
            <h2 class="text-4xl font-black text-gray-900 dark:text-white mt-2 tracking-tighter">Częstochowa Expert Network</h2>
          </div>

          <!-- Same pattern: one `members` array, one card template, instead of five
               near-identical hand-copied blocks. -->
          <div class="flex flex-wrap gap-6">
            <template x-for="member in members" :key="member.name">
              <div class="flex items-center gap-4 bg-white dark:bg-gray-900 p-4 rounded-2xl shadow-sm border border-gray-50 dark:border-white/5">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-400 to-red-600 flex items-center justify-center text-white font-black uppercase" x-text="member.name.charAt(0)"></div>
                <div class="text-left">
                  <h4 class="font-bold text-gray-900 dark:text-white" x-text="member.name"></h4>
                  <p class="text-xs text-orange-500 font-black uppercase" x-text="'Score: ' + member.score"></p>
                </div>
              </div>
            </template>
          </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-16 max-w-7xl mx-auto border-t border-gray-100 dark:border-white/5 pt-12">
          <div><div class="text-3xl font-black text-gray-900 dark:text-white">1.2k+</div><div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Active Ads</div></div>
          <div><div class="text-3xl font-black text-gray-900 dark:text-white">500+</div><div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Verified Pro's</div></div>
          <div><div class="text-3xl font-black text-gray-900 dark:text-white">24h</div><div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Avg. Response</div></div>
          <div><div class="text-3xl font-black text-gray-900 dark:text-white">Czest</div><div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Local Focus</div></div>
        </div>
      </div>
    </section>
  </div>
</main>

<footer class="bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800 pt-16 pb-8">
  <div class="max-w-7xl mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
      <div>
        <span class="text-2xl font-black tracking-tighter"><span class="text-orange-500">CZ</span>EST.eu</span>
        <p class="mt-4 text-gray-500 text-sm leading-relaxed">Najszybciej rozwijający się portal ogłoszeniowy w Częstochowie.</p>
      </div>
      <div>
        <h4 class="font-bold text-gray-900 dark:text-white mb-4 uppercase text-xs tracking-widest">Portal</h4>
        <ul class="space-y-2 text-sm text-gray-500">
          <li><a href="https://czest.eu/czestochowa-blog" class="hover:text-blue-600">Blog miejski</a></li>
          <li><a href="https://czest.eu/directory" class="hover:text-blue-600">Katalog firm</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-bold text-gray-900 dark:text-white mb-4 uppercase text-xs tracking-widest">Pomoc</h4>
        <ul class="space-y-2 text-sm text-gray-500">
          <li><a href="https://czest.eu/rules" class="hover:text-blue-600">Regulamin</a></li>
          <li><a href="https://czest.eu/contact" class="hover:text-blue-600">Kontakt</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-bold text-gray-900 dark:text-white mb-4 uppercase text-xs tracking-widest">Social</h4>
        <!-- FIX: removed dead href="#" links (they were jumping the page to top on
             click with no real target). Swap in real URLs when available. -->
        <div class="flex gap-3">
          <span class="w-8 h-8 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-[10px] font-bold" title="Facebook (link pending)">FB</span>
          <span class="w-8 h-8 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-[10px] font-bold" title="Instagram (link pending)">IG</span>
        </div>
      </div>
    </div>
    <!-- FIX: removed the stray, unstyled "<p>oncillas.com</p>" that was sitting in the
         original footer with no apparent connection to the rest of the page. -->
    <div class="pt-8 border-t border-gray-100 dark:border-gray-800 flex flex-col md:flex-row justify-between items-center gap-4">
      <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">&copy; 2026 CZEST.eu.</p>
      <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Made with <span class="text-red-500">❤</span> in Częstochowa</p>
    </div>
  </div>
</footer>

<div x-data="{ show: false }" @scroll.window.passive="show = window.scrollY > 400" class="fixed bottom-6 right-6 z-[9999]">
  <button x-show="show" x-cloak x-transition @click="window.scrollTo({top:0, behavior:'smooth'})"
          aria-label="Back to top"
          class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-2xl active:scale-95 border-2 border-white/10">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 15l7-7 7 7" /></svg>
  </button>
</div>

</div>
</body>
</html>