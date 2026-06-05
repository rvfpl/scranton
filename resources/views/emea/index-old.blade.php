@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>EMEA.dev — Infrastructure Report</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:wght@300;400;500&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Syne','sans-serif'],
                mono: ['DM Mono','monospace'],
            },
        }
    }
}
</script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>
[x-cloak]{display:none!important}
::-webkit-scrollbar{width:6px}
::-webkit-scrollbar-track{background:#f8fafc}
::-webkit-scrollbar-thumb{background:#cbd5e1;border-radius:3px}
.grid-bg{
    background-image:
        linear-gradient(rgba(148,163,184,.07) 8px,transparent 11px),
        linear-gradient(90deg,rgba(148,163,184,.07) 1px,transparent 1px);
    background-size:64px 16px;
}
.node-card{transition:transform .18s ease,box-shadow .18s ease,border-color .18s ease}
.node-card:hover{transform:translateY(-2px);box-shadow:0 8px 32px -4px rgba(37,99,235,.10),0 2px 8px -2px rgba(0,0,0,.06);border-color:#93c5fd}
@keyframes pulse-ring{0%{transform:scale(1);opacity:1}100%{transform:scale(2.4);opacity:0}}
.pulse-dot::after{content:'';position:absolute;inset:0;border-radius:9999px;animation:pulse-ring 1.8s ease-out infinite}
.pulse-dot.online::after{background:#10B981}
.pulse-dot.degraded::after{background:#F59E0B}
.pulse-dot.offline::after{background:#F43F5E}
.nav-blur{backdrop-filter:blur(12px) saturate(1.4);-webkit-backdrop-filter:blur(12px) saturate(1.4)}
</style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased grid-bg min-h-screen" style="font-family:'Syne',sans-serif">

<!-- ═══ NAVBAR ═══════════════════════════════════════════════════════════ -->
<nav x-data="{search:'',lang:'EN'}" class="fixed top-0 inset-x-0 z-50 h-16 nav-blur bg-white/80 border-b border-slate-200">
  <div class="max-w-screen-xl mx-auto h-full px-6 flex items-center gap-5">

    <!-- Logo -->
    <a href="#" class="flex items-center gap-2 shrink-0">
      <div class="w-24 h-8 rounded-md bg-blue-600 text-white flex items-center justify-center">
       EMEA<span style="color:#ccc">.dev</span> 
      </div>
    </a>

    <!-- Search -->
    <div class="relative flex-1 max-w-xs">
      <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z"/>
      </svg>
      <input type="search" x-model="search" @input="$dispatch('nav-search',{q:search})"
        placeholder="Search nodes…"
        class="w-full pl-9 pr-3 py-1.5 text-sm bg-slate-100 border border-slate-200 rounded-md placeholder-slate-400 text-slate-900 focus:outline-none focus:ring-2 focus:ring-blue-400/40 focus:border-blue-500 transition"
        style="font-family:'DM Mono',monospace"/>
    </div>

    <!-- Links -->
    <div class="hidden md:flex items-center gap-1 ml-1">
      <a href="#infrastructure" class="px-3 py-1.5 text-sm font-semibold text-slate-500 hover:text-slate-900 hover:bg-slate-100 rounded-md transition-colors">Infrastructure</a>
      <a href="#compliance"     class="px-3 py-1.5 text-sm font-semibold text-slate-500 hover:text-slate-900 hover:bg-slate-100 rounded-md transition-colors">Compliance</a>
      <a href="#latency"        class="px-3 py-1.5 text-sm font-semibold text-slate-500 hover:text-slate-900 hover:bg-slate-100 rounded-md transition-colors">Latency</a>
    </div>

    <div class="flex-1"></div>

    <!-- Lang toggle -->
    <div class="flex items-center gap-0.5 bg-slate-100 rounded-lg p-0.5 border border-slate-200">
      <template x-for="l in ['EN','AR']" :key="l">
        <button @click="lang=l"
          :class="lang===l?'bg-white text-blue-600 shadow-sm font-bold':'text-slate-500 hover:text-slate-700'"
          class="px-2.5 py-1 text-xs rounded-md transition-all duration-150"
          style="font-family:'DM Mono',monospace"
          x-text="l"></button>
      </template>
    </div>

    <!-- Status badge -->
    <div class="hidden sm:flex items-center gap-1.5 border border-emerald-200 bg-emerald-50 rounded-full px-3 py-1">
      <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
      <span class="text-xs text-emerald-700 font-medium" style="font-family:'DM Mono',monospace">All</span>
    </div>
  </div>
</nav>

<!-- ═══ MAIN ══════════════════════════════════════════════════════════════ -->
<main class="pt-16">
<div
  x-data="emeaReport()"
  x-init="init()"
  @nav-search.window="search=$event.detail.q"
  class="max-w-screen-xl mx-auto px-6 py-10 space-y-12"
>

  <!-- ── Report Header ──────────────────────────────────────────────── -->
  <header class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 pb-8 border-b border-slate-200">
    <div class="space-y-2">
      <div class="flex items-center gap-2">
        <span class="text-xs text-blue-600 bg-blue-50 border border-blue-200 px-2 py-0.5 rounded tracking-widest uppercase" style="font-family:'DM Mono',monospace">Live Report</span>
        <span class="text-xs text-slate-400" style="font-family:'DM Mono',monospace">REF-2025-EMEA-INF</span>
      </div>
      <h1 style="font-weight:800;font-size:2rem;line-height:1.15;letter-spacing:-.02em" class="text-slate-900">
        EMEA Infrastructure<br>Node Status Report
      </h1>
      <p class="text-sm text-slate-500" style="font-family:'DM Mono',monospace">
        Last Updated: <span class="text-slate-900 font-medium" id="ts"></span>
      </p>
    </div>

    <!-- KPI strip -->
    <div class="flex flex-wrap items-stretch gap-3">
      <div class="bg-white border border-slate-200 rounded-xl px-5 py-3 text-center min-w-[100px]">
        <div class="text-2xl font-bold text-slate-900" style="line-height:1">24</div>
        <div class="text-xs text-slate-500 mt-1" style="font-family:'DM Mono',monospace">Total Nodes</div>
        <div class="text-[10px] text-slate-400 mt-0.5" style="font-family:'DM Mono',monospace">3 regions</div>
      </div>
      <div class="bg-white border border-slate-200 rounded-xl px-5 py-3 text-center min-w-[100px]">
        <div class="text-2xl font-bold text-emerald-600" style="line-height:1">21</div>
        <div class="text-xs text-slate-500 mt-1" style="font-family:'DM Mono',monospace">Online</div>
        <div class="text-[10px] text-slate-400 mt-0.5" style="font-family:'DM Mono',monospace">87.5% uptime</div>
      </div>
      <div class="bg-white border border-slate-200 rounded-xl px-5 py-3 text-center min-w-[100px]">
        <div class="text-2xl font-bold text-slate-900" style="line-height:1">23ms</div>
        <div class="text-xs text-slate-500 mt-1" style="font-family:'DM Mono',monospace">Avg Latency</div>
        <div class="text-[10px] text-slate-400 mt-0.5" style="font-family:'DM Mono',monospace">p95 this hour</div>
      </div>
      <div class="bg-white border border-slate-200 rounded-xl px-5 py-3 text-center min-w-[100px]">
        <div class="text-2xl font-bold text-blue-600" style="line-height:1">100%</div>
        <div class="text-xs text-slate-500 mt-1" style="font-family:'DM Mono',monospace">Compliance</div>
        <div class="text-[10px] text-slate-400 mt-0.5" style="font-family:'DM Mono',monospace">GDPR+ISO 27001</div>
      </div>
    </div>
  </header>


  <!-- ── Section: Infrastructure ────────────────────────────────────── -->
  <section id="infrastructure" class="space-y-5">
    <div class="flex items-center gap-3 pb-3 border-b border-slate-200">
      <h2 style="font-weight:700;font-size:1.125rem" class="text-slate-900">Node Grid</h2>
      <span class="text-xs text-slate-400 bg-slate-100 border border-slate-200 px-2 py-0.5 rounded" style="font-family:'DM Mono',monospace">24 nodes · 3 sub-regions</span>
    </div>

    <!-- Controls -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
      <!-- Region Filter -->
      <div class="flex items-center gap-1 bg-white border border-slate-200 rounded-lg p-1">
        <template x-for="r in regions" :key="r.id">
          <button @click="activeRegion=r.id"
            :class="activeRegion===r.id?'bg-blue-600 text-white shadow-sm font-semibold':'text-slate-500 hover:text-slate-900 hover:bg-slate-50'"
            class="px-4 py-1.5 text-sm font-semibold rounded-md transition-all duration-150 whitespace-nowrap"
            x-text="r.label"></button>
        </template>
      </div>
      <!-- Legend + Count -->
      <div class="flex items-center gap-5">
        <span class="text-xs text-slate-400" style="font-family:'DM Mono',monospace">
          Showing <span class="text-slate-900 font-semibold" x-text="filteredNodes.length"></span> nodes
        </span>
        <div class="flex items-center gap-3">
          <div class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-emerald-500"></span><span class="text-xs text-slate-500" style="font-family:'DM Mono',monospace">Online</span></div>
          <div class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-amber-500"></span><span class="text-xs text-slate-500" style="font-family:'DM Mono',monospace">Degraded</span></div>
          <div class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-rose-500"></span><span class="text-xs text-slate-500" style="font-family:'DM Mono',monospace">Offline</span></div>
        </div>
      </div>
    </div>

    <!-- Node Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
      <template x-for="node in filteredNodes" :key="node.id">
        <div class="node-card bg-white border border-slate-200 rounded-xl p-5 space-y-4"
          x-transition:enter="transition ease-out duration-200"
          x-transition:enter-start="opacity-0 translate-y-2"
          x-transition:enter-end="opacity-100 translate-y-0">

          <!-- Header -->
          <div class="flex items-start justify-between">
            <div>
              <div style="font-weight:700;font-size:1rem;line-height:1.2" class="text-slate-900" x-text="node.city+'/'+node.country"></div>
              <div class="text-xs text-slate-400 mt-0.5" style="font-family:'DM Mono',monospace" x-text="node.region_label"></div>
            </div>
            <div class="relative w-3 h-3 rounded-full mt-0.5 pulse-dot"
              :class="node.status"
              :style="'background:'+statusColor(node.status)">
            </div>
          </div>

          <div class="h-px bg-slate-100"></div>

          <!-- Metrics -->
          <div class="grid grid-cols-2 gap-3">
            <!-- Latency -->
            <div class="space-y-1">
              <div class="text-[10px] text-slate-400 uppercase tracking-widest" style="font-family:'DM Mono',monospace">Latency</div>
              <div class="text-lg font-medium text-slate-900 leading-none" style="font-family:'DM Mono',monospace" x-text="node.latency ? node.latency+'ms' : '—'"></div>
              <div class="h-1.5 bg-slate-100 rounded-full overflow-hidden mt-1">
                <div class="h-full rounded-full transition-all duration-700"
                  :style="'width:'+Math.min((node.latency/80)*100,100)+'%;background:'+latencyColor(node.latency)">
                </div>
              </div>
            </div>
            <!-- Compliance -->
            <div>
              <div class="text-[10px] text-slate-400 uppercase tracking-widest mb-1.5" style="font-family:'DM Mono',monospace">Compliance</div>
              <div class="flex flex-col gap-1">
                <template x-for="tag in node.compliance" :key="tag">
                  <span class="inline-flex items-center text-[10px] font-medium px-1.5 py-0.5 rounded bg-blue-50 text-blue-700 border border-blue-200 w-fit"
                    style="font-family:'DM Mono',monospace" x-text="tag"></span>
                </template>
              </div>
            </div>
          </div>

          <!-- Footer -->
          <div class="flex items-center justify-between pt-1">
            <span class="text-[10px] text-slate-400" style="font-family:'DM Mono',monospace" x-text="'Updated '+node.updated"></span>
            <span class="text-[10px] px-2 py-0.5 rounded-full font-medium"
              style="font-family:'DM Mono',monospace"
              :class="{
                'bg-emerald-50 text-emerald-700 border border-emerald-200': node.status==='online',
                'bg-amber-50 text-amber-700 border border-amber-200':   node.status==='degraded',
                'bg-rose-50 text-rose-700 border border-rose-200':     node.status==='offline'
              }"
              x-text="node.status.charAt(0).toUpperCase()+node.status.slice(1)"></span>
          </div>
        </div>
      </template>

      <!-- Empty state -->
      <div x-show="filteredNodes.length===0" class="col-span-full py-20 text-center">
        <svg class="w-10 h-10 mx-auto text-slate-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <p class="text-sm text-slate-400" style="font-family:'DM Mono',monospace">No nodes match your filters.</p>
      </div>
    </div>
  </section>


  <!-- ── Section: Compliance ────────────────────────────────────────── -->
  <section id="compliance" class="space-y-5">
    <div class="flex items-center gap-3 pb-3 border-b border-slate-200">
      <h2 style="font-weight:700;font-size:1.125rem" class="text-slate-900">Compliance Matrix</h2>
      <span class="text-xs text-slate-400 bg-slate-100 border border-slate-200 px-2 py-0.5 rounded" style="font-family:'DM Mono',monospace">ISO 27001 · GDPR · NIS2 · SOC 2</span>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
      <div class="bg-white border border-slate-200 rounded-xl p-5 space-y-2">
        <div class="flex items-start justify-between">
          <span class="font-bold text-slate-900">GDPR</span>
          <span class="text-[10px] bg-emerald-50 text-emerald-700 border border-emerald-200 px-2 py-0.5 rounded-full" style="font-family:'DM Mono',monospace">Compliant</span>
        </div>
        <p class="text-xs text-slate-400" style="font-family:'DM Mono',monospace">EU Member States</p>
        <p class="text-xs text-slate-500" style="font-family:'DM Mono',monospace"><span class="text-slate-900 font-semibold">14</span> nodes covered</p>
      </div>
      <div class="bg-white border border-slate-200 rounded-xl p-5 space-y-2">
        <div class="flex items-start justify-between">
          <span class="font-bold text-slate-900">NIS2</span>
          <span class="text-[10px] bg-emerald-50 text-emerald-700 border border-emerald-200 px-2 py-0.5 rounded-full" style="font-family:'DM Mono',monospace">Compliant</span>
        </div>
        <p class="text-xs text-slate-400" style="font-family:'DM Mono',monospace">EU Critical Infra</p>
        <p class="text-xs text-slate-500" style="font-family:'DM Mono',monospace"><span class="text-slate-900 font-semibold">14</span> nodes covered</p>
      </div>
      <div class="bg-white border border-slate-200 rounded-xl p-5 space-y-2">
        <div class="flex items-start justify-between">
          <span class="font-bold text-slate-900">ISO 27001</span>
          <span class="text-[10px] bg-blue-50 text-blue-700 border border-blue-200 px-2 py-0.5 rounded-full" style="font-family:'DM Mono',monospace">Certified</span>
        </div>
        <p class="text-xs text-slate-400" style="font-family:'DM Mono',monospace">All Regions</p>
        <p class="text-xs text-slate-500" style="font-family:'DM Mono',monospace"><span class="text-slate-900 font-semibold">24</span> nodes covered</p>
      </div>
      <div class="bg-white border border-slate-200 rounded-xl p-5 space-y-2">
        <div class="flex items-start justify-between">
          <span class="font-bold text-slate-900">SOC 2 T2</span>
          <span class="text-[10px] bg-amber-50 text-amber-700 border border-amber-200 px-2 py-0.5 rounded-full" style="font-family:'DM Mono',monospace">In Review</span>
        </div>
        <p class="text-xs text-slate-400" style="font-family:'DM Mono',monospace">MENA + Non-EU</p>
        <p class="text-xs text-slate-500" style="font-family:'DM Mono',monospace"><span class="text-slate-900 font-semibold">10</span> nodes covered</p>
      </div>
    </div>
  </section>


  <!-- ── Section: Latency Chart ──────────────────────────────────────── -->
  <section id="latency" class="space-y-5">
    <div class="flex items-center gap-3 pb-3 border-b border-slate-200">
      <h2 style="font-weight:700;font-size:1.125rem" class="text-slate-900">Latency Heatmap</h2>
      <span class="text-xs text-slate-400 bg-slate-100 border border-slate-200 px-2 py-0.5 rounded" style="font-family:'DM Mono',monospace">P95 · Last 60 min</span>
    </div>
    <div class="bg-white border border-slate-200 rounded-xl p-6">
      <canvas id="latency-canvas" style="width:100%;height:160px;display:block"></canvas>
    </div>
  </section>

</div>
</main>

<!-- Footer -->
<footer class="border-t border-slate-200 bg-white mt-10">
  <div class="max-w-screen-xl mx-auto px-6 py-6 flex flex-col sm:flex-row items-center justify-between gap-3">
    <span class="text-xs text-slate-400 tracking-widest uppercase" style="font-family:'DM Mono',monospace">&copy; 2025 EMEA.dev — Infrastructure Intelligence Platform</span>
    <div class="flex items-center gap-4">
      <a href="#" class="text-xs text-slate-400 hover:text-blue-600 transition-colors" style="font-family:'DM Mono',monospace">Privacy</a>
      <a href="#" class="text-xs text-slate-400 hover:text-blue-600 transition-colors" style="font-family:'DM Mono',monospace">Status</a>
      <a href="#" class="text-xs text-slate-400 hover:text-blue-600 transition-colors" style="font-family:'DM Mono',monospace">API Docs</a>
    </div>
  </div>
</footer>

<script>
// ─── Timestamp ────────────────────────────────────────────────────────────
document.getElementById('ts').textContent = new Date().toUTCString().replace('GMT','UTC');

// ─── Alpine: emeaReport ───────────────────────────────────────────────────
function emeaReport() {
  return {
    search: '',
    activeRegion: 'all',
    regions: [
      { id:'all',    label:'All Regions' },
      { id:'eu',     label:'EU (Member)' },
      { id:'non_eu', label:'Non-EU' },
      { id:'mena',   label:'MENA' },
    ],
    nodes: [
      { id:1,  city:'Berlin',     country:'DE', region:'eu',     region_label:'EU Member',  status:'online',   latency:8,  compliance:['GDPR','NIS2'],  updated:'2m ago' },
      { id:2,  city:'Paris',      country:'FR', region:'eu',     region_label:'EU Member',  status:'online',   latency:11, compliance:['GDPR','NIS2'],  updated:'1m ago' },
      { id:3,  city:'Warsaw',     country:'PL', region:'eu',     region_label:'EU Member',  status:'online',   latency:14, compliance:['GDPR','NIS2'],  updated:'3m ago' },
      { id:4,  city:'Amsterdam',  country:'NL', region:'eu',     region_label:'EU Member',  status:'online',   latency:9,  compliance:['GDPR','ISO'],   updated:'1m ago' },
      { id:5,  city:'Madrid',     country:'ES', region:'eu',     region_label:'EU Member',  status:'degraded', latency:32, compliance:['GDPR'],         updated:'5m ago' },
      { id:6,  city:'Vienna',     country:'AT', region:'eu',     region_label:'EU Member',  status:'online',   latency:12, compliance:['GDPR','NIS2'],  updated:'2m ago' },
      { id:7,  city:'Stockholm',  country:'SE', region:'eu',     region_label:'EU Member',  status:'online',   latency:16, compliance:['GDPR'],         updated:'4m ago' },
      { id:8,  city:'Bucharest',  country:'RO', region:'eu',     region_label:'EU Member',  status:'offline',  latency:0,  compliance:['GDPR'],         updated:'18m ago' },
      { id:9,  city:'London',     country:'GB', region:'non_eu', region_label:'Non-EU',     status:'online',   latency:13, compliance:['ISO','SOC2'],   updated:'1m ago' },
      { id:10, city:'Zurich',     country:'CH', region:'non_eu', region_label:'Non-EU',     status:'online',   latency:10, compliance:['ISO'],          updated:'2m ago' },
      { id:11, city:'Oslo',       country:'NO', region:'non_eu', region_label:'Non-EU',     status:'online',   latency:19, compliance:['ISO'],          updated:'3m ago' },
      { id:12, city:'Istanbul',   country:'TR', region:'non_eu', region_label:'Non-EU',     status:'degraded', latency:44, compliance:['ISO'],          updated:'7m ago' },
      { id:13, city:'Kyiv',       country:'UA', region:'non_eu', region_label:'Non-EU',     status:'degraded', latency:61, compliance:['ISO'],          updated:'9m ago' },
      { id:14, city:'Belgrade',   country:'RS', region:'non_eu', region_label:'Non-EU',     status:'online',   latency:21, compliance:['ISO'],          updated:'4m ago' },
      { id:15, city:'Dubai',      country:'AE', region:'mena',   region_label:'MENA',       status:'online',   latency:27, compliance:['ISO','SOC2'],   updated:'2m ago' },
      { id:16, city:'Riyadh',     country:'SA', region:'mena',   region_label:'MENA',       status:'online',   latency:31, compliance:['ISO'],          updated:'3m ago' },
      { id:17, city:'Tel Aviv',   country:'IL', region:'mena',   region_label:'MENA',       status:'online',   latency:25, compliance:['ISO','SOC2'],   updated:'1m ago' },
      { id:18, city:'Cairo',      country:'EG', region:'mena',   region_label:'MENA',       status:'online',   latency:38, compliance:['ISO'],          updated:'6m ago' },
      { id:19, city:'Nairobi',    country:'KE', region:'mena',   region_label:'MENA',       status:'offline',  latency:0,  compliance:['ISO'],          updated:'22m ago' },
      { id:20, city:'Doha',       country:'QA', region:'mena',   region_label:'MENA',       status:'online',   latency:29, compliance:['ISO'],          updated:'4m ago' },
      { id:21, city:'Casablanca', country:'MA', region:'mena',   region_label:'MENA',       status:'online',   latency:42, compliance:['ISO'],          updated:'5m ago' },
      { id:22, city:'Amman',      country:'JO', region:'mena',   region_label:'MENA',       status:'degraded', latency:55, compliance:['ISO'],          updated:'11m ago' },
      { id:23, city:'Tunis',      country:'TN', region:'mena',   region_label:'MENA',       status:'online',   latency:35, compliance:['ISO'],          updated:'3m ago' },
      { id:24, city:'Algiers',    country:'DZ', region:'mena',   region_label:'MENA',       status:'online',   latency:39, compliance:['ISO'],          updated:'7m ago' },
    ],
    get filteredNodes() {
      const q = this.search.toLowerCase().trim();
      return this.nodes.filter(n => {
        const mr = this.activeRegion==='all' || n.region===this.activeRegion;
        const ms = !q || [n.city,n.country,n.region_label,n.status,...n.compliance].some(v=>v.toLowerCase().includes(q));
        return mr && ms;
      });
    },
    statusColor(s){ return {online:'#10B981',degraded:'#F59E0B',offline:'#F43F5E'}[s]||'#94a3b8'; },
    latencyColor(ms){ if(!ms)return '#F43F5E'; if(ms<20)return '#10B981'; if(ms<40)return '#F59E0B'; return '#F43F5E'; },
    init(){ window.addEventListener('nav-search',e=>{ this.search=e.detail.q||''; }); }
  };
}

// ─── Latency Chart ────────────────────────────────────────────────────────
window.addEventListener('DOMContentLoaded', () => {
  const canvas = document.getElementById('latency-canvas');
  if (!canvas) return;

  function draw() {
    const DPR = window.devicePixelRatio || 1;
    const W = canvas.parentElement.clientWidth - 48;
    const H = 160;
    canvas.width  = W * DPR;
    canvas.height = H * DPR;
    canvas.style.width  = W + 'px';
    canvas.style.height = H + 'px';
    const ctx = canvas.getContext('2d');
    ctx.scale(DPR, DPR);

    const series = {
      'EU (avg 11ms)':     [9,11,10,12,14,11,10,13,11,10,11,10],
      'Non-EU (avg 21ms)': [18,22,20,25,28,24,19,22,26,20,21,19],
      'MENA (avg 36ms)':   [31,35,33,38,42,37,34,38,40,36,35,34],
    };
    const colors = {'EU (avg 11ms)':'#2563EB','Non-EU (avg 21ms)':'#8B5CF6','MENA (avg 36ms)':'#F59E0B'};
    const labels = ['60m','55m','50m','45m','40m','35m','30m','25m','20m','15m','10m','Now'];
    const pad = {l:44,r:16,t:26,b:30};
    const cw = W - pad.l - pad.r;
    const ch = H - pad.t - pad.b;
    const maxVal = 55;

    // Y-grid
    ctx.font = '9px DM Mono, monospace';
    [0,.25,.5,.75,1].forEach(f => {
      const y = pad.t + ch*f;
      ctx.strokeStyle = '#f1f5f9'; ctx.lineWidth = 1;
      ctx.beginPath(); ctx.moveTo(pad.l,y); ctx.lineTo(W-pad.r,y); ctx.stroke();
      ctx.fillStyle='#94a3b8'; ctx.textAlign='right';
      ctx.fillText(Math.round(maxVal*(1-f))+'ms', pad.l-6, y+3);
    });

    // X labels
    ctx.fillStyle='#94a3b8'; ctx.textAlign='center';
    labels.forEach((l,i)=>{
      ctx.fillText(l, pad.l+(i/(labels.length-1))*cw, H-8);
    });

    // Series
    Object.entries(series).forEach(([name,data])=>{
      const color = colors[name];
      const pts = data.map((v,i)=>({
        x: pad.l+(i/(data.length-1))*cw,
        y: pad.t+ch*(1-v/maxVal)
      }));

      // Fill
      const grad = ctx.createLinearGradient(0,pad.t,0,pad.t+ch);
      grad.addColorStop(0,color+'30'); grad.addColorStop(1,color+'00');
      ctx.beginPath();
      ctx.moveTo(pts[0].x, pad.t+ch);
      pts.forEach(p=>ctx.lineTo(p.x,p.y));
      ctx.lineTo(pts[pts.length-1].x, pad.t+ch);
      ctx.closePath(); ctx.fillStyle=grad; ctx.fill();

      // Line
      ctx.beginPath(); ctx.strokeStyle=color; ctx.lineWidth=2; ctx.lineJoin='round';
      pts.forEach((p,i)=>i?ctx.lineTo(p.x,p.y):ctx.moveTo(p.x,p.y));
      ctx.stroke();

      // Dots at last point
      ctx.beginPath(); ctx.arc(pts[pts.length-1].x, pts[pts.length-1].y, 3, 0, Math.PI*2);
      ctx.fillStyle=color; ctx.fill();
    });

    // Legend
    let lx = pad.l;
    ctx.textAlign='left';
    Object.entries(colors).forEach(([name,color])=>{
      ctx.fillStyle=color; ctx.fillRect(lx,pad.t-16,18,2.5);
      ctx.fillStyle='#64748b'; ctx.font='10px DM Mono, monospace';
      ctx.fillText(name, lx+22, pad.t-10);
      lx += 160;
    });
  }

  draw();
  window.addEventListener('resize', draw);
});
</script>
</body>
</html>

@endsection