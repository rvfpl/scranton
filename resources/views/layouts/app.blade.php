<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ lang: 'EN' }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'EMEA.dev') }} — @yield('title', 'Infrastructure Report')</title>

    {{-- Google Fonts: DM Mono + Syne --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:wght@300;400;500&display=swap" rel="stylesheet">

    {{-- Tailwind CSS CDN (replace with compiled asset in production) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Syne', 'sans-serif'],
                        mono: ['DM Mono', 'monospace'],
                    },
                    colors: {
                        ink:   '#0D0F14',
                        slate: { 950: '#0a0d14' },
                        accent: '#2563EB',
                        emerald: { 500: '#10B981' },
                        amber:   { 500: '#F59E0B' },
                        rose:    { 500: '#F43F5E' },
                    },
                }
            }
        }
    </script>

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f8fafc; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }

        /* Grid background pattern */
        .grid-bg {
            background-image:
                linear-gradient(rgba(148,163,184,0.07) 1px, transparent 1px),
                linear-gradient(90deg, rgba(148,163,184,0.07) 1px, transparent 1px);
            background-size: 32px 32px;
        }

        /* Card hover lift */
        .node-card {
            transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
        }
        .node-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 32px -4px rgba(37,99,235,0.10), 0 2px 8px -2px rgba(0,0,0,0.06);
            border-color: #93c5fd;
        }

        /* Pulse dot */
        @keyframes pulse-ring {
            0%   { transform: scale(1); opacity: 1; }
            100% { transform: scale(2.2); opacity: 0; }
        }
        .pulse-dot::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            animation: pulse-ring 1.6s ease-out infinite;
        }
        .pulse-dot.online::after  { background: #10B981; }
        .pulse-dot.degraded::after { background: #F59E0B; }
        .pulse-dot.offline::after  { background: #F43F5E; }

        /* Nav blur */
        .nav-blur {
            backdrop-filter: blur(12px) saturate(1.4);
            -webkit-backdrop-filter: blur(12px) saturate(1.4);
        }
    </style>

    @stack('styles')
</head>
<body class="bg-slate-50 text-ink font-sans antialiased grid-bg min-h-screen">

    {{-- ─── Fixed Navigation ─────────────────────────────────────────── --}}
    @include('partials.nav')

    {{-- ─── Main Content ──────────────────────────────────────────────── --}}
    <main class="pt-16">
        @yield('content')
    </main>

    {{-- ─── Footer ─────────────────────────────────────────────────────── --}}
    <footer class="border-t border-slate-200 bg-white mt-16">
        <div class="max-w-screen-xl mx-auto px-6 py-6 flex flex-col sm:flex-row items-center justify-between gap-3">
            <span class="font-mono text-xs text-slate-400 tracking-widest uppercase">
                &copy; {{ date('Y') }} EMEA.dev — Infrastructure Intelligence Platform
            </span>
            <div class="flex items-center gap-4">
                <a href="#" class="font-mono text-xs text-slate-400 hover:text-accent transition-colors">Privacy</a>
                <a href="#" class="font-mono text-xs text-slate-400 hover:text-accent transition-colors">Status</a>
                <a href="#" class="font-mono text-xs text-slate-400 hover:text-accent transition-colors">API Docs</a>
                <a href="#" class="font-mono text-xs text-slate-400 hover:text-accent transition-colors">CONTACT</a>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>