 {{-- resources/views/sv.blade.php --}}
<!DOCTYPE html>
<html lang="en" class="bg-slate-950 text-slate-50 antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silicon Valley Dev Jobs – Remote & Hybrid Engineering Roles</title>

    <meta name="description"
          content="SiliconValley.dev – a minimalist job board for serious engineering roles: remote-first, Silicon Valley–level teams, high-signal listings only.">

    <meta property="og:title" content="Silicon Valley Dev Jobs">
    <meta property="og:description" content="Remote-first, high-signal engineering roles.">
    <meta property="og:type" content="website">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-slate-50">

    {{-- HEADER / NAV --}}
    <header class="border-b border-slate-800 bg-slate-950/80 backdrop-blur">
        <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="text-sm font-semibold tracking-tight">
                silicon<span class="text-emerald-400">valley</span>.dev
            </a>

            <nav class="flex items-center gap-6 text-xs">
                <a href="#jobs" class="text-slate-300 hover:text-emerald-300 transition">Jobs</a>
                <a href="/about" class="text-slate-300 hover:text-emerald-300 transition">About</a>
                <a href="#"
                   class="rounded-full bg-emerald-400 text-slate-950 px-3 py-1.5 font-medium hover:bg-emerald-300 transition">
                    Post a Job
                </a>
            </nav>
        </div>
    </header>

    {{-- HERO --}}
    <section class="border-b border-slate-800">
        <div class="max-w-5xl mx-auto px-4 py-12 md:py-16">
            <h1 class="text-3xl md:text-4xl font-semibold tracking-tight mb-4">
                Dev jobs.
                <span class="text-emerald-400">Remote‑first.</span> Silicon Valley–level.
            </h1>

            <p class="text-sm md:text-base text-slate-300 max-w-xl mb-6">
                A minimalist job board for serious engineering roles only.
                No noise, no spam — just well‑paid, high‑leverage work with teams that ship.
            </p>

            <a href="#"
               class="inline-flex items-center gap-2 rounded-full bg-emerald-400 px-4 py-2 text-sm font-medium text-slate-950 hover:bg-emerald-300 transition">
                Post a job – $199
            </a>
        </div>
    </section>

    {{-- JOB LIST --}}
    <section id="jobs" class="max-w-5xl mx-auto px-4 py-10 md:py-12">

        @if($jobs->isEmpty())
            {{-- EMPTY STATE --}}
            <div class="border border-dashed border-slate-800 rounded-2xl p-8 text-center space-y-3">
                <p class="text-sm font-medium text-slate-100">No live roles yet.</p>
                <p class="text-xs text-slate-400 max-w-md mx-auto">
                    This board is intentionally high‑signal. Listings open soon.
                    Post the first job and it’ll sit at the very top.
                </p>
                <a href="{{ route('jobs.create') }}"
                   class="inline-flex items-center gap-2 rounded-full bg-emerald-400 px-4 py-2 text-xs font-medium text-slate-950 hover:bg-emerald-300 transition">
                    Post the first job – $199
                </a>
            </div>

        @else
            {{-- JOB LOOP --}}
            <div class="space-y-4">
                @foreach($jobs as $job)
                    <article class="group border border-slate-800 rounded-2xl bg-slate-950/60 hover:bg-slate-900/70 transition">
                        <a href="{{ route('jobs.show', $job) }}" class="block p-4 md:p-5">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                                <div class="space-y-1">
                                    <h3 class="text-sm font-semibold text-slate-50 group-hover:text-emerald-300 transition">
                                        {{ $job->title }}
                                    </h3>

                                    <p class="text-xs text-slate-300">
                                        {{ $job->company_name }}
                                        @if($job->location)
                                            <span class="text-slate-500">•</span>
                                            <span class="text-slate-400">{{ $job->location }}</span>
                                        @endif
                                    </p>

                                    @if($job->salary_range)
                                        <p class="text-[11px] text-emerald-300">
                                            {{ $job->salary_range }}
                                            <span class="text-slate-500">•</span>
                                            SV‑level comp
                                        </p>
                                    @endif
                                </div>

                                <p class="text-[11px] text-slate-400">
                                    Posted {{ $job->created_at->diffForHumans() }}
                                </p>
                            </div>

                            @if($job->short_description)
                                <p class="mt-3 text-xs text-slate-300 line-clamp-2">
                                    {{ $job->short_description }}
                                </p>
                            @endif
                        </a>
                    </article>
                @endforeach
            </div>
        @endif
    </section>

    {{-- FOOTER --}}
    <footer class="border-t border-slate-800 py-8 mt-12">
        <div class="max-w-5xl mx-auto px-4 text-xs text-slate-500 space-y-2">
            <p>siliconvalley.dev — remote‑first, high‑signal engineering roles.</p>
            <p>&copy; {{ date('Y') }} SiliconValley.dev</p>
        </div>
    </footer>

</body>
</html>
