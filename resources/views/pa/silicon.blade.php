{{-- resources/views/sv.blade.php --}}
@extends('layouts.app')

@section('title', 'Silicon Valley Dev Jobs – Remote & Hybrid Engineering Roles')

@section('meta')
    <meta name="description"
          content="Silicon Valley.dev – a minimalist job board for serious engineering roles: remote-first, Silicon Valley–level teams, high-signal listings only.">
@endsection

@section('content')
    <div class="bg-slate-950 text-slate-50">
        {{-- Hero --}}
        <section class="border-b border-slate-800">
            <div class="max-w-5xl mx-auto px-4 py-12 md:py-16">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-8">
                    <div class="space-y-4 md:max-w-xl">
                        <p class="text-xs font-semibold tracking-[0.2em] text-emerald-400 uppercase">
                            siliconvalley.dev
                        </p>
                        <h1 class="text-3xl md:text-4xl font-semibold tracking-tight">
                            High‑signal dev jobs.<br class="hidden md:block">
                            <span class="text-emerald-400">Remote‑first.</span> Silicon Valley–level.
                        </h1>
                        <p class="text-sm md:text-base text-slate-300 leading-relaxed">
                            A minimalist job board for serious engineering roles only.
                            No noise, no spam, no “rockstar ninjas” — just well‑paid,
                            high‑leverage work with teams that ship.
                        </p>

                        <div class="flex flex-wrap items-center gap-3">
                            <a href="{{ route('jobs.create') }}"
                               class="inline-flex items-center gap-2 rounded-full bg-emerald-400 px-4 py-2 text-sm font-medium text-slate-950 hover:bg-emerald-300 transition">
                                Post a job – $199
                                <span class="text-xs font-semibold uppercase tracking-wide bg-slate-950/10 px-2 py-0.5 rounded-full">
                                    30 days live
                                </span>
                            </a>
                            <a href="#jobs"
                               class="text-sm text-slate-300 hover:text-emerald-300 transition">
                                Browse roles
                            </a>
                        </div>

                        <p class="text-[11px] text-slate-500 max-w-md">
                            Remote‑first. Hybrid Bay Area optional.
                            Every listing is manually reviewed. If it’s low‑signal, it doesn’t go live.
                        </p>
                    </div>

                    <div class="md:w-72 lg:w-80">
                        <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-4 space-y-4">
                            <p class="text-xs font-semibold text-slate-400 uppercase tracking-[0.18em]">
                                For hiring teams
                            </p>
                            <ul class="space-y-2 text-xs text-slate-300">
                                <li class="flex gap-2">
                                    <span class="mt-1 h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                    <span>Seen by engineers who actually ship product, not résumé blasters.</span>
                                </li>
                                <li class="flex gap-2">
                                    <span class="mt-1 h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                    <span>Remote‑first, Silicon Valley–level compensation and expectations.</span>
                                </li>
                                <li class="flex gap-2">
                                    <span class="mt-1 h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                    <span>No ATS integration, no fluff — just a clean listing and direct applicants.</span>
                                </li>
                            </ul>
                            <div class="pt-2 border-t border-slate-800">
                                <p class="text-[11px] text-slate-500">
                                    One flat price. No subscriptions. No upsells.
                                    If your role isn’t a fit, we’ll refund you.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Filters / summary --}}
        <section class="border-b border-slate-800 bg-slate-950/80">
            <div class="max-w-5xl mx-auto px-4 py-4 flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                <div class="flex items-center gap-2 text-xs text-slate-300">
                    <span class="inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                    <span>
                        Curated roles only –
                        <span class="font-medium text-slate-100">
                            Remote‑first, with optional Bay Area hybrid.
                        </span>
                    </span>
                </div>
                <div class="flex flex-wrap gap-2 text-[11px]">
                    <span class="inline-flex items-center gap-1 rounded-full border border-slate-700 px-2 py-1 text-slate-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                        Remote‑first
                    </span>
                    <span class="inline-flex items-center gap-1 rounded-full border border-slate-700 px-2 py-1 text-slate-300">
                        SV‑level comp
                    </span>
                    <span class="inline-flex items-center gap-1 rounded-full border border-slate-700 px-2 py-1 text-slate-300">
                        No recruiting spam
                    </span>
                </div>
            </div>
        </section>

        {{-- Job list --}}
        <section id="jobs" class="max-w-5xl mx-auto px-4 py-10 md:py-12">
            {{-- Empty state --}}
            @if($jobs->isEmpty())
                <div class="border border-dashed border-slate-800 rounded-2xl p-8 text-center space-y-3">
                    <p class="text-sm font-medium text-slate-100">
                        No live roles yet.
                    </p>
                    <p class="text-xs text-slate-400 max-w-md mx-auto">
                        This board is intentionally high‑signal. Listings open soon.
                        If you want your role to be one of the first, post it now and
                        it’ll sit at the very top.
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('jobs.create') }}"
                           class="inline-flex items-center gap-2 rounded-full bg-emerald-400 px-4 py-2 text-xs font-medium text-slate-950 hover:bg-emerald-300 transition">
                            Post the first job – $199
                        </a>
                    </div>
                </div>
            @else
                <div class="space-y-6">
                    <div class="flex items-center justify-between gap-3">
                        <h2 class="text-sm font-semibold text-slate-100 tracking-tight">
                            Latest roles
                        </h2>
                        <p class="text-[11px] text-slate-500">
                            {{ $jobs->count() }} active {{ Str::plural('role', $jobs->count()) }}
                        </p>
                    </div>

                    <div class="space-y-3">
                        @foreach($jobs as $job)
                            <article class="group border border-slate-800 rounded-2xl bg-slate-950/60 hover:bg-slate-900/70 transition">
                                <a href="{{ route('jobs.show', $job) }}" class="block p-4 md:p-5">
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                                        <div class="space-y-1">
                                            <div class="flex items-center gap-2 flex-wrap">
                                                <h3 class="text-sm font-semibold text-slate-50 group-hover:text-emerald-300 transition">
                                                    {{ $job->title }}
                                                </h3>
                                                @if($job->is_remote)
                                                    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-400/10 text-emerald-300 border border-emerald-500/40 px-2 py-0.5 text-[10px] font-medium uppercase tracking-wide">
                                                        Remote‑first
                                                    </span>
                                                @endif
                                                @if($job->is_hybrid)
                                                    <span class="inline-flex items-center gap-1 rounded-full bg-slate-800 text-slate-200 border border-slate-700 px-2 py-0.5 text-[10px] font-medium uppercase tracking-wide">
                                                        Hybrid – Bay Area
                                                    </span>
                                                @endif
                                            </div>
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
                                                    <span class="text-slate-400">SV‑level comp</span>
                                                </p>
                                            @endif
                                        </div>

                                        <div class="flex flex-col items-start md:items-end gap-2 text-right">
                                            <p class="text-[11px] text-slate-400">
                                                Posted {{ $job->created_at->diffForHumans() }}
                                            </p>
                                            <div class="flex flex-wrap gap-1 justify-end">
                                                @foreach($job->tags ?? [] as $tag)
                                                    <span class="inline-flex items-center rounded-full bg-slate-900 border border-slate-700 px-2 py-0.5 text-[10px] text-slate-300">
                                                        {{ $tag }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
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

                    {{-- Simple CTA under list --}}
                    <div class="pt-4 border-t border-slate-800 flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                        <p class="text-xs text-slate-400 max-w-md">
                            Want your role in front of engineers who actually ship?
                            No recruiters, no scraped listings, no noise.
                        </p>
                        <a href="{{ route('jobs.create') }}"
                           class="inline-flex items-center gap-2 rounded-full bg-emerald-400 px-4 py-2 text-xs font-medium text-slate-950 hover:bg-emerald-300 transition">
                            Post a job – $199
                        </a>
                    </div>
                </div>
            @endif
        </section>

        {{-- SEO / philosophy block --}}
        <section class="border-t border-slate-800 bg-slate-950/90">
            <div class="max-w-5xl mx-auto px-4 py-10 md:py-12 space-y-6">
                <div class="space-y-2">
                    <h2 class="text-sm font-semibold text-slate-100 tracking-tight">
                        What makes SiliconValley.dev different?
                    </h2>
                    <p class="text-xs text-slate-300 max-w-2xl leading-relaxed">
                        This isn’t a generic job aggregator. It’s a small, opinionated board for
                        high‑signal engineering roles only — remote‑first, with optional Bay Area hybrid.
                        No scraped listings, no recruiter spam, no “we’ll pay you in equity and vibes.”
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-4 text-xs text-slate-300">
                    <div class="space-y-1">
                        <p class="text-[11px] font-semibold text-slate-100 uppercase tracking-[0.16em]">
                            For engineers
                        </p>
                        <p class="text-slate-300">
                            Every role is vetted for seriousness: real compensation, real product, real ownership.
                            If it’s vague, exploitative, or fluff, it doesn’t go live.
                        </p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-[11px] font-semibold text-slate-100 uppercase tracking-[0.16em]">
                            For hiring teams
                        </p>
                        <p class="text-slate-300">
                            You’re not paying for features. You’re paying for signal.
                            Your listing sits in a focused context: engineers who actually want to build.
                        </p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-[11px] font-semibold text-slate-100 uppercase tracking-[0.16em]">
                            For the long term
                        </p>
                        <p class="text-slate-300">
                            The board is intentionally small and slow. No growth hacks, no dark patterns.
                            Just a quiet place where good teams and good engineers find each other.
                        </p>
                    </div>
                </div>

                <p class="text-[11px] text-slate-500">
                    Remote‑first. Silicon Valley–level expectations. If that describes your role or your next move,
                    you’re in the right place.
                </p>
            </div>
        </section>
    </div>
@endsection
