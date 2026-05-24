<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->title }} at {{ $job->company }} — scranton.dev</title>
    <meta name="description" content="{{ Str::limit($job->description, 160) }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f8f5e9; }
        .sticky-note {
            background: #fff4a8;
            border: 1px solid #e7d970;
            box-shadow: 0 2px 4px rgba(0,0,0,0.06), 0 8px 24px rgba(0,0,0,0.08);
        }
        .office-grid {
            background-image:
                linear-gradient(rgba(0,0,0,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,0,0,0.03) 1px, transparent 1px);
            background-size: 24px 24px;
        }
    </style>
</head>
<body class="min-h-screen office-grid">

    {{-- HEADER --}}
    <header class="sticky top-0 z-50 bg-[#f8f5e9]/90 backdrop-blur border-b border-black/10">
        <div class="max-w-3xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3">
                <div class="sticky-note w-10 h-10 rounded-md flex flex-col items-center justify-center font-extrabold rotate-[-2deg] leading-none">
                    <span class="text-[7px] uppercase opacity-80">scranton</span>
                    <span class="text-[11px]">PA</span>
                </div>
                <span class="font-extrabold text-lg text-gray-900">scranton.dev</span>
            </a>
            <a href="/" class="text-sm text-gray-600 hover:text-black font-medium">← All jobs</a>
        </div>
    </header>

    <main class="max-w-3xl mx-auto px-4 py-12">

        {{-- JOB HEADER --}}
        <div class="mb-8">
            <div class="flex flex-wrap gap-2 mb-4">
                <div class="sticky-note px-3 py-1 rounded-md text-xs font-bold rotate-[-1deg]">
                    {{ str_contains($job->location, 'Remote') ? 'REMOTE' : 'HIRING' }}
                </div>
                @if($job->is_featured)
                    <div class="sticky-note px-3 py-1 rounded-md text-xs font-bold rotate-[1deg]">
                        ⭐ FEATURED
                    </div>
                @endif
                <div class="text-xs uppercase tracking-wide text-gray-500 font-bold flex items-center">
                    Posted {{ $job->posted_label }}
                </div>
            </div>

            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight leading-tight">
                {{ $job->title }}
            </h1>

            <div class="mt-3 text-lg text-gray-600 font-medium">
                {{ $job->company }} &bull; {{ $job->location }}
            </div>

            <div class="mt-2 text-2xl font-extrabold text-gray-900">
                {{ $job->salary_label }}
            </div>
        </div>

        {{-- TAGS --}}
        <div class="flex flex-wrap gap-2 mb-8">
            @foreach($job->tags ?? [] as $tag)
                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-medium border border-black/5">
                    {{ $tag }}
                </span>
            @endforeach
        </div>

        {{-- DESCRIPTION --}}
        <div class="bg-white rounded-3xl border border-black/10 p-8 mb-8">
            <h2 class="text-lg font-extrabold text-gray-900 mb-4">About the role</h2>
            <div class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $job->description }}</div>
        </div>

        {{-- APPLY CTA --}}
        <div class="bg-white rounded-3xl border border-black/10 p-8 text-center">
            <h2 class="text-xl font-extrabold text-gray-900 mb-2">Interested?</h2>
            <p class="text-gray-500 text-sm mb-6">Apply directly or reach out to the hiring team.</p>
            <a href="#" class="inline-flex items-center justify-center rounded-2xl bg-gray-900 text-white px-10 py-4 font-bold text-lg hover:opacity-90 transition">
                Apply for this role →
            </a>
        </div>

    </main>

    <footer class="border-t border-black/10 bg-[#f3eed9] mt-16">
        <div class="max-w-3xl mx-auto px-4 py-8 flex items-center justify-between text-sm text-gray-500">
            <span>&copy; 2026 scranton.dev</span>
            <a href="/" class="hover:text-black font-medium">← Back to all jobs</a>
        </div>
    </footer>

</body>
</html>