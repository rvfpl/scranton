<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Czestflex2 | Curated Curation</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%23121212'/><text x='50%' y='50%' dominant-baseline='central' text-anchor='middle' font-family='sans-serif' font-weight='bold' font-size='60' fill='red'>CZ</text></svg>">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .aspect-video { aspect-ratio: 16 / 9; }
        .glass { background: rgba(20, 20, 20, 0.8); backdrop-filter: blur(10px); }

        .nav-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.95);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s;
            z-index: 1000;
        }
        .nav-overlay.is-active { opacity: 1; visibility: visible; }
        .nav-overlay ul { list-style: none; padding: 0; }
        .nav-overlay a { color: white; font-size: 2rem; text-decoration: none; }

        @keyframes slow-zoom {
            from { transform: scale(1); }
            to { transform: scale(1.15); }
        }
        .animate-slow-zoom { animation: slow-zoom 15s infinite alternate ease-in-out; }

        /* Search dropdown */
        .search-wrap { position: relative; }
        .suggestions {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            width: 100%;
            background: #18181b;
            border: 1px solid #3f3f46;
            border-radius: 0.5rem;
            overflow: hidden;
            z-index: 60;
            max-height: 280px;
            overflow-y: auto;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .suggestion-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 0.9rem;
            cursor: pointer;
            color: #d4d4d8;
            font-size: 0.9rem;
            text-align: left;
        }
        .suggestion-item:hover,
        .suggestion-item.active {
            background: #27272a;
            color: white;
        }
        .suggestion-thumb {
            width: 28px; height: 28px;
            border-radius: 4px;
            background: #3f3f46;
            flex-shrink: 0;
        }
        .video-card-hidden { display: none !important; }
        .no-results {
            grid-column: 1 / -1;
            text-align: center;
            color: #71717a;
            padding: 3rem 0;
        }
    </style>
</head>
<body class="bg-zinc-950 text-zinc-100 font-sans">

    <!-- Navigation -->
    <nav class="glass sticky top-0 z-50 flex items-center justify-between px-8 py-4 border-b border-zinc-800 gap-6">
        <a href="knetflex" class="text-2xl font-black text-red-600 hover:text-red-700 transition-colors duration-300 ease-in-out tracking-tighter italic shrink-0">Czestflix2</a>

        <!-- Search bar (desktop, in-nav) -->
        <div class="search-wrap hidden md:block flex-1 max-w-md">
            <input
                id="nav-search-input"
                type="text"
                placeholder="Search titles..."
                autocomplete="off"
                class="w-full bg-zinc-800 border border-zinc-700 px-4 py-2 rounded-lg text-white text-sm focus:outline-none focus:border-red-600 transition-colors"
            >
            <div id="nav-suggestions" class="suggestions hidden"></div>
        </div>

        <div class="hidden md:flex gap-6 text-sm font-medium text-zinc-400 shrink-0">
            <a href="#" class="hover:text-white transition">Home</a>
            <a href="#" class="hover:text-white transition">Archives</a>
        </div>
    </nav>

    <!-- Hamburger Button -->
    <button
      id="nav-toggle"
      class="fixed top-5 right-5 z-[1001] p-3 bg-zinc-800 rounded-full hover:bg-zinc-700 transition-colors duration-300 ease-in-out"
      aria-label="Toggle menu"
    >
      ☰
    </button>

    <nav class="nav-overlay p-8 flex flex-col items-center justify-between">
        <div class="text-3xl font-black text-red-600 tracking-tighter">KNETFLEX</div>

        <div class="flex flex-col items-center gap-8 w-full">
            <div class="search-wrap w-64">
                <input
                    id="overlay-search-input"
                    type="text"
                    placeholder="Search titles..."
                    autocomplete="off"
                    class="bg-zinc-800 border border-zinc-700 px-4 py-2 rounded-lg text-white focus:outline-none focus:border-red-600 w-64"
                >
                <div id="overlay-suggestions" class="suggestions hidden"></div>
            </div>

            <ul class="text-center space-y-6">
                <li><a href="#" class="text-2xl font-light hover:text-red-500 transition-colors">Home</a></li>
                <li><a href="#" class="text-2xl font-light hover:text-red-500 transition-colors">Archives</a></li>
                <li><a href="#" class="text-2xl font-light hover:text-red-500 transition-colors">New Arrivals</a></li>
            </ul>
        </div>

        <div class="text-zinc-500 text-sm">
            notnewyork.com &copy; 2026
        </div>
    </nav>

    <!-- Hero Promo Section -->
    <section id="hero" class="relative w-full h-[60vh] flex items-end justify-start overflow-hidden border-b border-zinc-800 bg-black">
        <!-- Default state: ambient gif background, dimmed -->
        <div id="hero-default" class="absolute inset-0 z-0 bg-zinc-900">
            <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExNHJ4ZzVqbmV4ZzVqbmV4ZzVqbmV4ZzVqbmV4ZzVqbmV4ZzVqJmVwPXYxX2ludGVybmFsX2dpZl9ieV9pZCZjdD1n/3o7TKMGpxxHOGTdzJC/giphy.gif"
                 class="w-full h-full object-cover opacity-50 animate-slow-zoom">
            <div class="absolute inset-0 bg-zinc-900/70"></div>
        </div>

        <!-- Featured state: live, interactive player — full brightness, not dimmed -->
        <div id="hero-player-wrap" class="absolute inset-0 z-10 hidden">
            <iframe
                id="hero-player"
                class="w-full h-full"
                src=""
                frameborder="0"
                allow="autoplay; encrypted-media"
                allowfullscreen>
            </iframe>
            <!-- subtle bottom gradient so the title/button stay legible over any video -->
            <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-black/80 to-transparent pointer-events-none"></div>
        </div>

        <div id="hero-meta" class="relative z-20 px-8 pb-6 hidden">
            <p class="uppercase tracking-widest text-red-500 text-xs font-bold mb-1">Now Featured</p>
            <h2 id="hero-title" class="text-2xl md:text-3xl font-black mb-3"></h2>
            <button id="hero-clear" class="text-sm text-zinc-200 border border-zinc-500 rounded-full px-4 py-1.5 hover:border-red-600 hover:text-white transition-colors bg-black/40">
                Back to default
            </button>
        </div>
    </section>

    <!-- Hero -->

    <header class="py-16 px-8 text-center">
        <h1 class="text-5xl font-bold mb-4">My Personal Archive</h1>
        <p class="text-zinc-500">The specific stuff I like, hosted nowhere near a corporate server.</p>
    </header>

    <!-- Grid -->
    <main class="max-w-7xl mx-auto px-6 pb-20">
        <div id="video-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- cards are rendered by JS from the VIDEOS array below -->
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-10 border-t border-zinc-900 text-center text-zinc-600 text-xs">
        <p class="mb-2 uppercase tracking-widest">Knetflex &copy; 2026</p>
        <p class="max-w-md mx-auto italic">
            Disclaimer: This site is a satirical parody. I am not Netflix.
            All videos are property of their respective owners. Please don't sue.
        </p>
    </footer>

    <!-- Load YouTube API Library -->
    <script src="https://www.youtube.com/iframe_api"></script>

    <script>
      // ---------------------------------------------------------------
      // Video data
      // ---------------------------------------------------------------
      const VIDEOS = [
        { id: 'tu0cLvZ976Y', title: 'The Me' },
        { id: 'jNQXAC9IVRw', title: 'Digital Zen' },
        { id: 'dQw4w9WgXcQ', title: 'The Masterpiece' },
        { id: '9bZkp7q19f0', title: 'Internet History' },
      ];

      const grid = document.getElementById('video-grid');
      let players = [];

      function thumbUrl(id) {
        return `https://i.ytimg.com/vi/${id}/mqdefault.jpg`;
      }

      function renderGrid(list) {
        grid.innerHTML = '';
        players = [];

        if (list.length === 0) {
          grid.innerHTML = `<div class="no-results">No titles match your search.</div>`;
          return;
        }

        list.forEach((video) => {
          const card = document.createElement('div');
          card.className = 'video-container group bg-zinc-900 border border-zinc-800 rounded-xl overflow-hidden transition-all hover:border-red-600/50';
          card.innerHTML = `
            <div class="aspect-video relative">
                <iframe
                    class="youtube-video w-full h-full"
                    src="https://www.youtube.com/embed/${video.id}?enablejsapi=1&rel=0"
                    frameborder="0"
                    allow="autoplay; encrypted-media"
                    allowfullscreen>
                </iframe>
            </div>
            <div class="p-5 flex items-center justify-between gap-3">
                <h3 class="font-bold text-lg">${video.title}</h3>
                <button class="feature-btn shrink-0 text-xs font-semibold text-zinc-400 border border-zinc-700 rounded-full px-3 py-1 hover:border-red-600 hover:text-white transition-colors" data-id="${video.id}">
                    Feature
                </button>
            </div>
          `;
          card.querySelector('.feature-btn').addEventListener('click', () => setHero(video));
          grid.appendChild(card);
        });

        // re-bind the YouTube API to the freshly rendered iframes
        if (window.YT && window.YT.Player) {
          bindPlayers();
        }
      }

      function bindPlayers() {
        const iframes = document.querySelectorAll('.youtube-video');
        iframes.forEach((iframe) => {
          players.push(new YT.Player(iframe, {
            events: { 'onStateChange': onPlayerStateChange }
          }));
        });
      }

      function onPlayerStateChange(event) {
        if (event.data === YT.PlayerState.PLAYING) {
          players.forEach(player => {
            if (player.getIframe() !== event.target.getIframe()) {
              player.pauseVideo();
            }
          });
        }
      }

      function onYouTubeIframeAPIReady() {
        bindPlayers();
      }

      // ---------------------------------------------------------------
      // Hero feature section: clicking "Feature" on a card (or picking
      // a search suggestion) swaps the hero's ambient gif for a live,
      // autoplaying embed of that video.
      // ---------------------------------------------------------------
      const heroDefault = document.getElementById('hero-default');
      const heroPlayerWrap = document.getElementById('hero-player-wrap');
      const heroPlayer = document.getElementById('hero-player');
      const heroMeta = document.getElementById('hero-meta');
      const heroTitle = document.getElementById('hero-title');
      const heroClear = document.getElementById('hero-clear');

      function setHero(video) {
        heroPlayer.src = `https://www.youtube.com/embed/${video.id}?autoplay=1&mute=1&controls=1&rel=0&loop=1&playlist=${video.id}`;
        heroDefault.classList.add('hidden');
        heroPlayerWrap.classList.remove('hidden');
        heroTitle.textContent = video.title;
        heroMeta.classList.remove('hidden');
        document.getElementById('hero').scrollIntoView({ behavior: 'smooth', block: 'start' });
      }

      function clearHero() {
        heroPlayer.src = '';
        heroPlayerWrap.classList.add('hidden');
        heroDefault.classList.remove('hidden');
        heroMeta.classList.add('hidden');
      }

      heroClear.addEventListener('click', clearHero);

      // ---------------------------------------------------------------
      // Search + suggestions dropdown (wired to both the nav bar input
      // and the hamburger overlay input, so they behave identically)
      // ---------------------------------------------------------------
      function setupSearch(inputId, suggestionsId) {
        const input = document.getElementById(inputId);
        const box = document.getElementById(suggestionsId);
        let activeIndex = -1;
        let currentMatches = [];
        let debounceTimer = null;

        function matches(query) {
          const q = query.trim().toLowerCase();
          if (!q) return [];
          return VIDEOS.filter(v => v.title.toLowerCase().includes(q));
        }

        function renderSuggestions(list) {
          currentMatches = list;
          activeIndex = -1;

          if (list.length === 0) {
            box.classList.add('hidden');
            box.innerHTML = '';
            return;
          }

          box.innerHTML = list.map((v, i) => `
            <div class="suggestion-item" data-index="${i}" data-id="${v.id}">
                <div class="suggestion-thumb" style="background-image:url('${thumbUrl(v.id)}');background-size:cover;background-position:center;"></div>
                <span>${v.title}</span>
            </div>
          `).join('');
          box.classList.remove('hidden');

          box.querySelectorAll('.suggestion-item').forEach((el) => {
            el.addEventListener('click', () => {
              const id = el.dataset.id;
              selectVideo(id);
            });
          });
        }

        function selectVideo(id) {
          const video = VIDEOS.find(v => v.id === id);
          if (!video) return;
          input.value = video.title;
          box.classList.add('hidden');
          renderGrid([video]);
          setHero(video);
        }

        function applyFilter() {
          const list = matches(input.value);
          if (input.value.trim() === '') {
            renderGrid(VIDEOS);
          } else {
            renderGrid(list);
          }
        }

        input.addEventListener('input', () => {
          clearTimeout(debounceTimer);
          debounceTimer = setTimeout(() => {
            renderSuggestions(matches(input.value));
            applyFilter();
          }, 150);
        });

        input.addEventListener('keydown', (e) => {
          if (box.classList.contains('hidden')) return;
          const items = box.querySelectorAll('.suggestion-item');

          if (e.key === 'ArrowDown') {
            e.preventDefault();
            activeIndex = Math.min(activeIndex + 1, items.length - 1);
          } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            activeIndex = Math.max(activeIndex - 1, 0);
          } else if (e.key === 'Enter') {
            e.preventDefault();
            if (activeIndex >= 0 && currentMatches[activeIndex]) {
              selectVideo(currentMatches[activeIndex].id);
            } else {
              box.classList.add('hidden');
            }
            return;
          } else if (e.key === 'Escape') {
            box.classList.add('hidden');
            return;
          } else {
            return;
          }

          items.forEach((el, i) => el.classList.toggle('active', i === activeIndex));
        });

        input.addEventListener('blur', () => {
          // small delay so click on a suggestion still registers
          setTimeout(() => box.classList.add('hidden'), 120);
        });

        input.addEventListener('focus', () => {
          if (input.value.trim()) renderSuggestions(matches(input.value));
        });
      }

      document.addEventListener('DOMContentLoaded', () => {
        // hamburger nav toggle
        const navToggle = document.getElementById('nav-toggle');
        const navOverlay = document.querySelector('.nav-overlay');
        if (navToggle && navOverlay) {
          navToggle.addEventListener('click', () => {
            navOverlay.classList.toggle('is-active');
            navToggle.textContent = navOverlay.classList.contains('is-active') ? '✕' : '☰';
          });
        }

        // initial grid render
        renderGrid(VIDEOS);

        // wire up both search inputs (top nav + overlay menu)
        setupSearch('nav-search-input', 'nav-suggestions');
        setupSearch('overlay-search-input', 'overlay-suggestions');
      });
    </script>

</body>
</html>