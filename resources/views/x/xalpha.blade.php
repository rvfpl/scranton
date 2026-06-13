
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="NewYork.dev — Developer jobs across New York State. Browse roles in NYC, Upstate, Tristate, Buffalo, Syracuse, Albany, Rochester, Utica, Niagara, Canada.">
  <meta name="csrf-token" content="ce7300a9702db17d6a945486afb1cabd4ec316c0987158a99d1bfc1bfd9ffb29">
  <title>NewYork.dev · Dev Jobs · Startup · Culture | The New York Dev Hub</title>




  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Lora:ital,wght@0,400;0,600;1,400&family=JetBrains+Mono:wght@400;600&family=Barlow+Condensed:wght@600;700&display=swap" rel="stylesheet">
  
    <script src="js/jsdata.js" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  


  <link rel="stylesheet" href="css/nycss.css">
  <link rel="stylesheet" href="css/nycss2.css?v2">

 <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,
    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'>
      <rect width='32' height='32' rx='4' fill='%23232323'/>
      <circle cx='16' cy='16' r='12' fill='%23C0362C'/>
      <text x='16' y='16' font-family='sans-serif' font-size='11' font-weight='bold' fill='white' text-anchor='middle' dominant-baseline='middle'>NY</text>
    </svg>">
  

  <style>
 
  
  </style>

</head>

<body>

<!-- ════════════════════════════════════════════════
  TICKER
════════════════════════════════════════════════ -->
<div class="ticker-wrap" aria-label="Breaking news">
  <div class="ticker-label">BETA</div>
  <div class="ticker-track" aria-live="polite">
        <span>Advertising Available Here - from 5¢  -seriosuly, a nickle!</span>
        <span>Random Ticker worse than no ticker - experts say</span>
        <span>NewYork.dev voted best NewYork-based tech site - allegedly</span>
        <span>What are we doing now?</span>
        <span>Prediction: NewYork in 6</span>
        <span>Advertising Available Here - from 5¢  -seriosuly, a nickle!</span>
        <span>Random Ticker worse than no ticker - experts say</span>
        <span>NewYork.dev voted best NewYork-based tech site - allegedly</span>
        <span>What are we doing now?</span>
        <span>Prediction: NewYork in 6</span>
      </div>
</div>

<!-- ════════════════════════════════════════════════
  UTILITY BAR
════════════════════════════════════════════════ -->
<div class="util-bar ">
  <div class="max-w-screen-2xl mx-auto px-8 py-1.5 flex justify-between items-center">
    <a href="/" class="reveal reveal-1 hidden md:block">EST<span class="tld">.</span>2026</a>
    <div class="flex items-center gap-3">
            <span>Saturday, June 13, 2026</span>
      <span class="text-gray-400">·</span>
      <span>NYC 79°F, Clear</span>
          </div>
    <div class="flex items-center gap-4">
      <a href="/contact"><span class="text-gray-400">CONTACT</span></a>
      <a href="/login" class="hover:text-gray-800 transition-colors">Log in</a>
    </div>
  </div>
</div>

<!-- ════════════════════════════════════════════════
  MASTHEAD
════════════════════════════════════════════════ -->
<header class="masthead " id="masthead" role="banner">
  <div class="max-w-screen-2xl mx-auto px-3 md:px-6">
    <div class="flex items-center justify-between gap-4 pb-1">

      <button class="hamburger mobile-only" id="hamburger-btn"
              aria-label="Open navigation" aria-expanded="false" aria-controls="mobile-drawer">
        <span></span><span></span><span></span>
      </button>

     <div class="hidden md:flex items-center gap-1 flex-1 border border-cream" aria-label="Secondary navigation">
                <a href="/section/foundingforefathers-1"
           class="section-label hover:text-orange-700 transition-colors px-2 py-1">
          FoundingForeFathers-1        </a>
                <a href="/section/fiveyearplan2"
           class="section-label hover:text-orange-700 transition-colors px-2 py-1">
          FIVEyearplan2        </a>
                <a href="/section/partners-3"
           class="section-label hover:text-orange-700 transition-colors px-2 py-1">
          Partners-3        </a>
                <a href="/section/anthropic"
           class="section-label hover:text-orange-700 transition-colors px-2 py-1">
          Anthropic        </a>
                <a href="/section/inevitable"
           class="section-label hover:text-orange-700 transition-colors px-2 py-1">
          Inevitable        </a>
              </div>

      <div class="text-center  flex-shrink-0">
        <a href="/" class="logo reveal reveal-1">NEWYORK<span class="tld">.</span>DEV</a>
        <p class="logo-sub reveal reveal-2">Allegedly, a Newspaper.</p>
      </div>

      <div class="flex-1 hidden md:flex items-center justify-end gap-3">
        <form action="/search" method="GET" class="search-wrapper desktop-search" role="search">
          <input type="search" name="q" class="search-input" placeholder="BETA Search Coming…"
                 aria-label="Search articles" id="site-search" autocomplete="off"
                 value="">
          <button type="submit" class="search-btn" aria-label="Submit search">⌕</button>
        </form>
        <a href="/subscribe" class="btn-subscribe desktop-subscribe">Sub / Join</a>
      </div>

      <div class="flex items-center gap-3 mobile-only">
        <button id="mobile-search-btn" aria-label="Open search"
                aria-expanded="false" aria-controls="mobile-search-overlay"
                style="background:none;border:none;cursor:pointer;color:var(--ink);padding:4px;font-size:20px;">⌕</button>
        <a href="/subscribe" class="btn-subscribe" style="font-size:10px;padding:6px 12px;">JOIN</a>
      </div>
    </div>

    <div class="nav-scroll-wrap" id="nav-scroll-wrap">
      <nav class="primary-nav md:justify-center bg-amber-50" aria-label="Primary navigation" id="primary-nav">
                <a href="/jobs" class="active">
          Jobs        </a>
                <a href="/startups" class="">
          Startups        </a>
                <a href="/companies" class="">
          Companies        </a>
                <a href="/founders" class="">
          Founders        </a>
                <a href="/culture" class="">
          DevCulture        </a>
                <a href="/beta" class="">
          Beta        </a>
              </nav>
      <span class="nav-scroll-arrow" aria-hidden="true">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="9 18 15 12 9 6"/></svg>
      </span>
    </div>
  </div>
</header>

<!-- ════════════════════════════════════════════════
  MOBILE DRAWER
════════════════════════════════════════════════ -->
<div class="mobile-drawer" id="mobile-drawer" role="dialog" aria-modal="true" aria-label="Navigation menu">
  <div class="drawer-overlay" id="drawer-overlay"></div>
  <div class="drawer-panel">
    <div class="drawer-header">
      <span class="logo" style="font-size:22px;">NEWYORK<span class="tld">.DEV</span></span>
      <button id="drawer-close" aria-label="Close navigation"
              style="background:none;border:none;cursor:pointer;font-size:22px;color:var(--ink);">✕</button>
    </div>
    <nav class="drawer-nav" aria-label="Mobile navigation">
            <a href="/tech">Tech<span class="arrow">→</span></a>
            <a href="/infra">InfraOps<span class="arrow">→</span></a>
            <a href="/apis">APIs<span class="arrow">→</span></a>
            <a href="/ai">AI &amp; ML<span class="arrow">→</span></a>
            <a href="/culture">Culture<span class="arrow">→</span></a>
            <a href="/opinion">Opinion<span class="arrow">→</span></a>
            <a href="/jobs">Jobs<span class="arrow">→</span></a>
            <a href="/newsletters">Newsletters<span class="arrow">→</span></a>
            <a href="/podcasts">Podcasts<span class="arrow">→</span></a>
          </nav>
    <div style="padding:20px;margin-top:auto;border-top:1px solid var(--rule);">
      <a href="/subscribe" class="btn-subscribe" style="width:100%;text-align:center;display:block;">
        Subscribe to the Record
      </a>
      <p style="font-family:'Barlow Condensed',sans-serif;font-size:11px;color:var(--muted);margin-top:10px;text-align:center;letter-spacing:0.06em;">
        Free for devs. Always.
      </p>
    </div>
  </div>
</div>

<!-- ════════════════════════════════════════════════
  MOBILE SEARCH OVERLAY
════════════════════════════════════════════════ -->
<div class="mobile-search-overlay" id="mobile-search-overlay" role="search" aria-label="Site search">
  <div class="mobile-search-inner">
    <form action="/search" method="GET" style="display:contents;">
      <input type="search" name="q" id="mobile-search-field" class="mobile-search-field"
             placeholder="(Beta) DummySearch the Record…" aria-label="Search articles" autocomplete="off">
      <button type="submit" class="mobile-search-submit">SEARCH</button>
    </form>
    <button class="mobile-search-close" id="mobile-search-close" aria-label="Close search">✕</button>
  </div>
  <p class="mobile-search-hint">Try: "Laravel", "DevOps", "NY infra"</p>
</div>

<!-- ════════════════════════════════════════════════
  MAIN — JOB BOARD
════════════════════════════════════════════════ -->
<main class="max-w-7xl mx-auto px-4 md:px-6 pb-8" id="main-content"
      x-data="jobBoard()" x-init="init()"
      @keydown.escape.window="closeDetail()">

  <!-- tabloid strip -->
  




<div class="tabloid-strip relative group" aria-label="Satirical news" role="complementary">
  
  <button type="button" 
    class="nav-scroll-btn absolute left-0 top-1/2 -translate-y-1/2 z-10 p-2 bg-black/50 text-white rounded-r-lg hidden md:block"
    aria-label="Scroll left"
    onclick="document.querySelector('.tabloid-grid').scrollBy({left: -300, behavior: 'smooth'})">
    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
  </button>

  <div class="tabloid-grid flex overflow-x-auto snap-x scroll-smooth pb-4">
        <article class="tabloid-item flex-shrink-0 w-[80%] md:w-[40%] snap-start">
      <p class="tabloid-tag">Breaking</p>
      <h3 class="tabloid-hed">"I'll Just Google It" Now Accounts for 94% of All Senior Engineer Decisions</h3>
      <p class="tabloid-sub">Sources confirm Stack Overflow tab count at all-time high.</p>
    </article>
    

     <article class="tabloid-item">
        <p class="tabloid-tag">Exclusive</p>
        <h3 class="tabloid-hed">Local Dev Rewrites Legacy Codebase, Produces Identical Legacy Codebase</h3>
        <p class="tabloid-sub">"It's basically the same but in TypeScript," he said proudly.</p>
      </article>
      <article class="tabloid-item">
        <p class="tabloid-tag">Analysis</p>
        <h3 class="tabloid-hed">Area Startup Pivots to AI, Is Now Just a Regular Database with a Chatbot</h3>
        <p class="tabloid-sub">Valuation unchanged at $40M.</p>
      </article>
        <article class="tabloid-item">
        <p class="tabloid-tag">Opinion</p>
              <h3 class="tabloid-hed">NewYork.dev Editor in Trouble</h3> 
        <p class="tabloid-sub">"What is this?  The Onion? - I just can't think of a fourth article. Now, Beat it."</p>  
      </article>
    </div>

  <button type="button" 
    class="nav-scroll-btn absolute right-0 top-1/2 -translate-y-1/2 z-10 p-2 bg-black/50 text-white rounded-l-lg"
    aria-label="Scroll right"
    onclick="document.querySelector('.tabloid-grid').scrollBy({left: 300, behavior: 'smooth'})">
    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
  </button>
</div>
  <!-- ── LOCATION FILTER STRIP ── -->
  <div class="loc-strip mb-0" role="tablist" aria-label="Filter by location">
    <template x-for="loc in locations" :key="loc.key">
      <button
        @click="setLocation(loc.key)"
        :class="activeLocation===loc.key ? 'loc-pill active' : 'loc-pill'"
        role="tab"
        :aria-selected="activeLocation===loc.key"
        x-text="loc.label">
      </button>
    </template>
  </div>

  <!-- ── SPECIALIZATION FILTER STRIP ── -->
  <div class="spec-strip" role="group" aria-label="Filter by specialization">

    <!-- Special synthetic filters -->
    <button
      class="spec-pill video-pill"
      :class="activeFilters.includes('__video') ? 'active' : ''"
      @click="toggleFilter('__video')"
      :aria-pressed="activeFilters.includes('__video')"
      aria-label="Has video intro">
      ▶ Has Video
    </button>
    <button
      class="spec-pill"
      :class="activeFilters.includes('__hybrid') ? 'active' : ''"
      @click="toggleFilter('__hybrid')"
      :aria-pressed="activeFilters.includes('__hybrid')"
      aria-label="Hybrid roles">
      ⇌ Hybrid
    </button>

    <!-- divider -->
    <span style="width:1px;height:14px;background:var(--job-rule);flex-shrink:0" aria-hidden="true"></span>

    <!-- Tag-based pills — auto-built from all unique tags across jobs -->
    <template x-for="tag in allTags" :key="tag">
      <button
        class="spec-pill"
        :class="activeFilters.includes(tag) ? 'active' : ''"
        @click="toggleFilter(tag)"
        :aria-pressed="activeFilters.includes(tag)"
        x-text="tag">
      </button>
    </template>

  </div>

  <!-- ── SEARCH + SORT STRIP ── -->
  <div class="sort-strip mt-3">
    <div class="flex items-center gap-3 flex-wrap">
      <!-- Edition badge -->
      <div class="flex flex-wrap items-center gap-1.5">
        <span class="edition-badge bg-amber-50">
          <span>⬡</span> June 2026 ·
          <p style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6b6860;">
            <span x-text="filteredJobs.length"></span> openings
          </p>
        </span>
      </div>
      <!-- search -->
      <div class="job-search-wrap" style="max-width:200px">
        <span class="job-search-icon" aria-hidden="true">⌕</span>
        <input type="search" x-model="search" placeholder="Role, company, tech…"
               class="job-search" aria-label="Search jobs" autocomplete="off">
      </div>
      <!-- sort tabs -->
          <div class="flex flex-wrap items-center gap-1.5">
      
  

      <div class="sort-tabs hover:text-red-700" role="tablist" aria-label="Sort jobs">
        <button @click="activeSort='featured'" :class="activeSort==='featured'?'sort-tab active':'sort-tab'"
                role="tab" :aria-selected="activeSort==='featured'">Featured</button>
        <button @click="activeSort='latest'"   :class="activeSort==='latest'  ?'sort-tab active':'sort-tab'"
                role="tab" :aria-selected="activeSort==='latest'">Latest</button>
        <button @click="activeSort='salary'"   :class="activeSort==='salary'  ?'sort-tab active':'sort-tab'"
                role="tab" :aria-selected="activeSort==='salary'">High Pay</button>
        <button @click="activeSort='remote'"   :class="activeSort==='remote'  ?'sort-tab active':'sort-tab'"
                role="tab" :aria-selected="activeSort==='remote'">Remote</button>

   <a href="/post-a-job" 
   target="_blank" 
   rel="noopener noreferrer" class="edition-badge hover:bg-red-800 hover:text-white">
   >
Post a Job - 
</a>       


      </div>
    </div>

    <!-- active filter chips -->
    <div class="flex flex-wrap gap-2" role="list" aria-label="Active filters">
      <template x-for="f in activeFilters" :key="f">
        <button class="filter-chip" @click="toggleFilter(f)" role="listitem"
                :aria-label="'Remove filter: '+(f==='__video'?'Has Video':f==='__hybrid'?'Hybrid':f)">
          <span x-text="f==='__video'?'▶ Has Video':f==='__hybrid'?'⇌ Hybrid':f"></span>
          <span style="font-size:9px;opacity:.6" aria-hidden="true">✕</span>
        </button>
      </template>
      <button x-show="activeFilters.length>0" @click="activeFilters=[]"
              class="filter-chip" style="color:#C0362C;border-color:#C0362C"
              aria-label="Clear all filters">
        Clear all
      </button>
    </div>
  </div>

  <!-- ── TWO-COL GRID ── -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-0 lg:gap-6 mt-4">


    <!-- RIGHT: detail panel (desktop only) -->
    <div class="md:col-span-4 lg:col-span-4"> 
      <div class="detail-panel" :class="selectedJob?'has-content':''">
        <div class="detail-panel-bar"></div>

        <!-- empty state / promo -->
        <template x-if="!selectedJob">
          <div class="panel-promo">
            <p class="promo-eyebrow">
              <span class="promo-dot" aria-hidden="true"></span>
              Now hiring on NewYork.dev
            </p>
            <div class="video-wrap">
              <div class="video-overlay"
                   x-show="!promoPlaying"
                   @click="promoPlaying=true"
                   role="button" tabindex="0"
                   aria-label="Play intro video"
                   @keydown.enter="promoPlaying=true"
                   @keydown.space.prevent="promoPlaying=true">
                <div class="play-circle">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="white" aria-hidden="true">
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                </div>
              </div>
              <iframe :src="promoPlaying?promoVideoUrl+'?autoplay=1':'about:blank'"
                      loading="lazy" class="w-full h-full" frameborder="0"
                      allow="autoplay;fullscreen" allowfullscreen
                      title="NewYork.dev intro"></iframe>
            </div>
            <p class="panel-hint">Say Hi to 100's of NY devs actively looking for their next role.</p>
            <p class="panel-hint" style="margin-top:4px">← Select any listing to preview full details here.</p>
            <a href="/post-job"
               style="display:inline-flex;align-items:center;gap:6px;margin-top:16px;font-family:'Barlow Condensed',sans-serif;font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#C0362C;text-decoration:none;border-bottom:1px solid #C0362C;padding-bottom:2px;">
              Post a role →
            </a>
          </div>
        </template>

        <!-- job detail (desktop) -->
        <template x-if="selectedJob">
          <div class="detail-inner">
            <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:8px;margin-bottom:12px">
              <div>
                <p class="detail-company" x-text="selectedJob.company"></p>
                <h2 class="detail-title" x-text="selectedJob.title"></h2>
              </div>
              <button @click.stop="closeDetail()" class="job-save-btn" aria-label="Close panel"
                      style="flex-shrink:0;margin-top:4px">
                <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
              </button>
            </div>
            <div class="detail-meta">
              <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                   aria-hidden="true" style="flex-shrink:0">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              </svg>
              <span x-text="selectedJob.location"></span>
              <span class="job-meta-sep" aria-hidden="true">·</span>
              <span x-text="'Posted '+selectedJob.posted" style="color:#9b9790"></span>
            </div>
            <span x-show="selectedJob.salary" class="detail-salary" x-text="selectedJob.salary + ' / yr'"></span>
            <template x-if="selectedJob.video_url">
              <div style="margin-bottom:16px" @click.stop>
                <p class="detail-label">Hiring Manager Intro</p>
                <div class="video-wrap">
                  <div class="video-overlay"
                       x-show="!videoPlaying"
                       @click.stop="startVideo()"
                       role="button" tabindex="0"
                       aria-label="Play hiring manager video"
                       @keydown.enter="startVideo()"
                       @keydown.space.prevent="startVideo()">
                    <div class="play-circle">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="white" aria-hidden="true">
                        <path d="M8 5v14l11-7z"/>
                      </svg>
                    </div>
                  </div>
                  <iframe :src="videoPlaying?selectedJob.video_url+'?autoplay=1':'about:blank'"
                          loading="lazy" class="w-full h-full" frameborder="0"
                          allow="autoplay;fullscreen" allowfullscreen
                          :title="selectedJob.company+' hiring video'"></iframe>
                </div>
              </div>
            </template>
            <div class="detail-divider"></div>
            <div style="margin-bottom:16px">
              <p class="detail-label">About the Role</p>
              <p class="detail-body" x-text="selectedJob.description"></p>
            </div>
            <div style="margin-bottom:16px">
              <p class="detail-label">Tech Stack</p>
              <div class="detail-tags">
                <template x-for="tag in (selectedJob.tags||[])" :key="tag">
                  <span class="detail-tag" x-text="tag"></span>
                </template>
              </div>
            </div>
            <div class="detail-divider"></div>
            <div style="display:flex;align-items:center;gap:8px">
              <a :href="selectedJob.url" class="apply-btn" @click.stop>
                Apply Now
                <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
              </a>
              <button class="job-save-btn"
                      :class="isSaved(selectedJob.id)?'saved':''"
                      @click.stop="toggleSave(selectedJob.id)"
                      :aria-pressed="isSaved(selectedJob.id)"
                      :aria-label="isSaved(selectedJob.id)?'Unsave':'Save this role'"
                      style="width:auto;padding:0 14px;height:38px;gap:6px;font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase">
                <svg width="12" height="12" :fill="isSaved(selectedJob.id)?'currentColor':'none'"
                     stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
                <span x-text="isSaved(selectedJob.id)?'Saved':'Save'"></span>
              </button>
            </div>
          </div>
        </template>
      </div> 
  </div>










    <!-- LEFT: job cards -->
    <div class="md:col-span-4 lg:col-span-5">


      <!-- job card list -->
      <div role="list" aria-label="Job listings">
        <template x-for="job in filteredJobs" :key="job.id">
          <article
            class="job-card"
            :class="[job.is_featured?'featured':'', expandedJobId===job.id?'selected':'']"
            role="listitem"
            @click="selectJob(job.id)"
            :aria-selected="expandedJobId===job.id"
            :aria-label="job.title+' at '+job.company">

            <p class="job-company" x-text="job.company"></p>
            <h2 class="job-title" x-text="job.title"></h2>

            <div class="job-meta">
              <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                   style="flex-shrink:0;color:#9b9790" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              </svg>
              <span x-text="job.location"></span>
              <span class="job-meta-sep" aria-hidden="true">·</span>
              <span x-text="job.posted" style="color:#9b9790"></span>
              <span x-show="job.salary" class="job-meta-sep" aria-hidden="true">·</span>
              <span class="job-salary" x-show="job.salary" x-text="job.salary"></span>
            </div>

            <div class="job-tags" @click.stop>
              <template x-for="tag in (job.tags||[]).slice(0,4)" :key="tag">
                <span class="job-tag"
                      :class="activeFilters.includes(tag)?'active':''"
                      @click="toggleFilter(tag)"
                      :aria-pressed="activeFilters.includes(tag)"
                      x-text="tag"></span>
              </template>
            </div>

            <div class="job-card-foot" @click.stop>
              <span x-show="job.video_url" class="job-vid-badge">▶ Video intro</span>
              <span x-show="!job.video_url"></span>
              <button class="job-save-btn"
                      :class="isSaved(job.id)?'saved':''"
                      @click="toggleSave(job.id)"
                      :aria-label="isSaved(job.id)?'Unsave '+job.title:'Save '+job.title"
                      :aria-pressed="isSaved(job.id)">
                <svg width="12" height="12" :fill="isSaved(job.id)?'currentColor':'none'"
                     stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
              </button>
            </div>
          </article>
        </template>

        <!-- empty state -->
        <div x-show="filteredJobs.length===0" class="jobs-empty" role="status">
          <p class="jobs-empty-head">No openings found.</p>
          <p class="jobs-empty-sub">Try adjusting your filters or checking another city.</p>
          <button @click="search='';activeFilters=[];activeLocation='all'"
                  class="job-tag" style="margin-top:16px;padding:6px 14px;font-size:12px">
            Reset all filters
          </button>
        </div>
      </div>
    </div><!-- /left col -->


    <aside class="xl:flex sm:col-span-12 lg:col-span-3 flex-col gap-8 pt-2" aria-label="Sidebar"> <!--  -->
    <img src="img/comic-jobboard-jpg.jpg"> 
      <div class="sidebar-widget">
        <p class="sidebar-widget-title">Most Read</p>
        <ol class="ranked-list" style="list-style:none;padding:0;">
                    <li>
            <span class="rank-num">1</span>
            <a href="#" class="u-link copy-sm">Why Senior Engineers Are Leaving FAANG for NYC Gov Contracts (Answer: &#039;They&#039;re Not&#039;)</a>
          </li>
                    <li>
            <span class="rank-num">2</span>
            <a href="#" class="u-link copy-sm">The 7 Polish cursewords for frustrated devs + 3 in Yiddish/Hebrew</a>
          </li>
                    <li>
            <span class="rank-num">3</span>
            <a href="#" class="u-link copy-sm">Live from Buenos Aires: Did Petey T. Get Abducted by Aliens?</a>
          </li>
                    <li>
            <span class="rank-num">4</span>
            <a href="#" class="u-link copy-sm">Simbang Gabi - 9 Dev Tips for Devs before the Winter Holidays</a>
          </li>
                  </ol>
      </div>
      <div class="sidebar-widget" style="background:var(--ink);padding:20px;">
        <p class="sidebar-widget-title" style="color:rgba(255,255,255,.55);">Weekly Briefing</p>
        <p style="font-family:'Playfair Display',serif;font-size:16px;color:#fff;font-weight:700;line-height:1.3;margin-bottom:12px;">
          Dev news that matters.
        </p>
        <form action="/newsletter/subscribe" method="POST" class="flex flex-col gap-3">
          <input type="hidden" name="_token" value="ce7300a9702db17d6a945486afb1cabd4ec316c0987158a99d1bfc1bfd9ffb29">
          <input type="email" name="email" placeholder="your@email.dev" required
                 aria-label="Your email address"
                 style="font-family:'Lora',serif;font-size:13px;padding:7px 10px;border:1px solid rgba(255,255,255,.2);background:rgba(255,255,255,.08);color:#fff;outline:none;width:100%;">
          <button type="submit" class="btn-subscribe"
                  style="background:#C0362C;width:100%;text-align:center;">Subscribe Free →</button>
        </form>
        <p style="font-family:'Barlow Condensed',sans-serif;font-size:10px;letter-spacing:.06em;color:rgba(255,255,255,.3);margin-top:8px;">
          No spam. Unsubscribe anytime.
        </p>
      </div>
      <div class="sidebar-widget">
        <p class="sidebar-widget-title">Trending in NYC</p>
        <div class="flex flex-wrap gap-2">
                    <a href="/tag/laravel-13" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer">
            Laravel 13          </a>
                    <a href="/tag/livewire-4" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer">
            Livewire 4          </a>
                    <a href="/tag/react-19" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer">
            React 19          </a>
                    <a href="/tag/bun-2" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer">
            Bun 2          </a>
                    <a href="/tag/postgresql-18" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer">
            PostgreSQL 18          </a>
                    <a href="/tag/kafka" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer">
            Kafka          </a>
                    <a href="/tag/rust" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer">
            Rust          </a>
                    <a href="/tag/cloudflare-ai" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer">
            Cloudflare AI          </a>
                    <a href="/tag/tailwind-v5" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer">
            Tailwind v5          </a>
                    <a href="/tag/htmx" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer">
            htmx          </a>
                    <a href="/tag/deno-3" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer">
            Deno 3          </a>
                    <a href="/tag/php-9" class="tech-tag hover:bg-gray-200 transition-colors cursor-pointer">
            PHP 9          </a>
                  </div>
      </div>
    </aside>

  </div><!-- /two-col grid -->

</main>

<!-- ════════════════════════════════════════════════
  MOBILE FULL-SCREEN JOB OVERLAY  (< lg breakpoint)
  Replaces the old bottom-sheet entirely.
  Driven by plain JS so it works independently
  of the Alpine component scope on <main>.
════════════════════════════════════════════════ -->

<!-- Backdrop -->
<div id="job-overlay-backdrop" class="job-overlay-backdrop" aria-hidden="true"></div>

<!-- Overlay panel -->
<div id="job-overlay"
     class="job-overlay"
     role="dialog"
     aria-modal="true"
     aria-label="Job details"
     aria-labelledby="overlay-job-title">

  <!-- Top accent line -->
  <div class="job-overlay-accent"></div>

  <!-- Sticky top bar -->
  <div class="job-overlay-bar">
    <span class="job-overlay-brand">NewYork<span style="color:var(--job-rule)">.</span>Dev</span>
    <button id="job-overlay-close-btn" class="job-overlay-close" aria-label="Close job details">
      <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
      </svg>
      Close
    </button>
  </div>

  <!-- Scrollable content — populated by JS -->
  <div class="job-overlay-content" id="job-overlay-content"></div>

  <!-- Sticky apply footer — populated by JS -->
  <div class="job-overlay-footer" id="job-overlay-footer"></div>

</div>

<!-- ════════════════════════════════════════════════
  FOOTER
════════════════════════════════════════════════ -->
<footer role="contentinfo" style="border-top:4px solid #C0362C;">
  <div style="border-bottom:1px solid rgba(255,255,255,0.1);">
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-12">
      <div class="grid grid-cols-3 sm:grid-cols-3 lg:grid-cols-5 gap-8">
        <div class="col-span-3 sm:col-span-3 lg:col-span-2">
          <p class="footer-logo">NEWYORK<span class="tld">.DEV</span></p>
          (<a href="https://notnewyork.com" class="text-gray-500 hover:text-[#C0362C] transition-colors">
            <b>not</b>newyork.com</a>)
          <p style="font-family:'Lora',serif;font-size:14px;line-height:1.7;margin-top:12px;color:rgba(255,255,255,0.5);max-width:360px;">
           For the dev community.
          </p>
          <div class="flex gap-4 mt-6">
            <a href="#" aria-label="GitHub"    class="footer-link" style="font-size:18px">⌥</a>
            <a href="#" aria-label="X/Twitter" class="footer-link" style="font-size:18px">✕</a>
            <a href="#" aria-label="RSS"       class="footer-link" style="font-size:18px">⊞</a>
          </div>
        </div>
                <div>
          <p style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:.18em;color:rgba(255,255,255,.35);margin-bottom:12px;text-transform:uppercase;">
            Sections          </p>
          <ul style="list-style:none;padding:0;display:flex;flex-direction:column;gap:8px;">
                        <li><a href="/tech" class="footer-link">Tech</a></li>
                        <li><a href="/infrastructure" class="footer-link">Infrastructure</a></li>
                        <li><a href="/apis" class="footer-link">APIs</a></li>
                        <li><a href="/ai-ml" class="footer-link">AI &amp; ML</a></li>
                      </ul>
        </div>
                <div>
          <p style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:.18em;color:rgba(255,255,255,.35);margin-bottom:12px;text-transform:uppercase;">
            Company          </p>
          <ul style="list-style:none;padding:0;display:flex;flex-direction:column;gap:8px;">
                        <li><a href="/about" class="footer-link">About</a></li>
                        <li><a href="/careers" class="footer-link">Careers</a></li>
                        <li><a href="/advertise" class="footer-link">Advertise</a></li>
                        <li><a href="/press" class="footer-link">Press</a></li>
                        <li><a href="/contact" class="footer-link">Contact</a></li>
                      </ul>
        </div>
                <div>
          <p style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:.18em;color:rgba(255,255,255,.35);margin-bottom:12px;text-transform:uppercase;">
            Reader          </p>
          <ul style="list-style:none;padding:0;display:flex;flex-direction:column;gap:8px;">
                        <li><a href="/subscribe" class="footer-link">Subscribe</a></li>
                        <li><a href="/newsletters" class="footer-link">Newsletters</a></li>
                        <li><a href="/podcasts" class="footer-link">Podcasts</a></li>
                        <li><a href="/archive" class="footer-link">Archive</a></li>
                        <li><a href="/rss" class="footer-link">RSS</a></li>
                      </ul>
        </div>
              </div>
    </div>
  </div>
  <div class="max-w-7xl mx-auto px-4 md:px-6 py-5 flex flex-col-reverse sm:flex-row justify-between items-center gap-3 footer-link">
    <p style="font-family:'Barlow Condensed',sans-serif;font-size:11px;letter-spacing:.08em;color:rgba(255,255,255,.35);">
      &copy; 2026 NewYork.dev. ONCILLAS. All rights reserved.
    </p>
    <div class="flex gap-5">
            <a href="/privacy-policy" class="footer-link" style="font-size:11px;">Privacy Policy</a>
            <a href="/terms-of-service" class="footer-link" style="font-size:11px;">Terms of Service</a>
            <a href="/cookie-settings" class="footer-link" style="font-size:11px;">Cookie Settings</a>
            <a href="/accessibility" class="footer-link" style="font-size:11px;">Accessibility</a>
          </div>
  </div>
</footer>



<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'a0b1ac9edcb5c3e5',t:'MTc4MTM1OTc3OQ=='};var a=document.createElement('script');a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>