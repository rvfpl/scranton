<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Job — scranton.dev</title>
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
            <a href="/" class="text-sm text-gray-600 hover:text-black font-medium">← Back to jobs</a>
        </div>
    </header>

    <main class="max-w-3xl mx-auto px-4 py-12">

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-800 rounded-2xl px-6 py-4 font-medium">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- HEADING --}}
        <div class="mb-10">
            <div class="sticky-note inline-block px-4 py-2 rounded-md rotate-[-1deg] font-bold text-sm mb-4">
                📝 Post a Job
            </div>
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">List a developer role.</h1>
            <p class="mt-3 text-gray-600">No recruiter fluff. Just the job, clearly described.</p>
        </div>

        {{-- FORM --}}
        <form method="POST" action="/post-job" class="space-y-6">
            @csrf

            {{-- ERRORS --}}
            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-2xl px-6 py-4 text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <div>⚠ {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            {{-- JOB TITLE --}}
            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2">Job Title *</label>
                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="e.g. Senior Laravel Engineer"
                    class="w-full rounded-2xl border border-black/10 bg-white px-5 py-4 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                >
            </div>

            {{-- COMPANY --}}
            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2">Company Name *</label>
                <input
                    type="text"
                    name="company"
                    value="{{ old('company') }}"
                    placeholder="e.g. Dunder Mifflin"
                    class="w-full rounded-2xl border border-black/10 bg-white px-5 py-4 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                >
            </div>

            {{-- LOCATION --}}
            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2">Location *</label>
                <input
                    type="text"
                    name="location"
                    value="{{ old('location') }}"
                    placeholder="e.g. Scranton, PA (Hybrid) or Remote (US)"
                    class="w-full rounded-2xl border border-black/10 bg-white px-5 py-4 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                >
            </div>

            {{-- SALARY --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-2">Salary Min</label>
                    <input
                        type="number"
                        name="salary_min"
                        value="{{ old('salary_min') }}"
                        placeholder="e.g. 120000"
                        class="w-full rounded-2xl border border-black/10 bg-white px-5 py-4 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                    >
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-2">Salary Max</label>
                    <input
                        type="number"
                        name="salary_max"
                        value="{{ old('salary_max') }}"
                        placeholder="e.g. 160000"
                        class="w-full rounded-2xl border border-black/10 bg-white px-5 py-4 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                    >
                </div>
            </div>

            {{-- TAGS --}}
            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2">Tags</label>
                <p class="text-xs text-gray-500 mb-3">Check all that apply.</p>
                <div class="flex flex-wrap gap-2">
                    @foreach(['PHP','Laravel','React','Vue','Node','Python','DevOps','Frontend','Backend','Remote','Hybrid','Senior','Junior'] as $tag)
                        <label class="flex items-center gap-2 cursor-pointer bg-white border border-black/10 rounded-full px-4 py-2 text-sm font-medium hover:bg-yellow-50 transition">
                            <input
                                type="checkbox"
                                name="tags[]"
                                value="{{ $tag }}"
                                {{ in_array($tag, old('tags', [])) ? 'checked' : '' }}
                                class="accent-gray-900"
                            >
                            {{ $tag }}
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- DESCRIPTION --}}
            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2">Job Description *</label>
                <textarea
                    name="description"
                    rows="6"
                    placeholder="Describe the role, responsibilities, and what you're looking for. No buzzwords."
                    class="w-full rounded-2xl border border-black/10 bg-white px-5 py-4 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-300 resize-none"
                >{{ old('description') }}</textarea>
            </div>

            {{-- SUBMIT --}}
            <div class="pt-2">
                <button
                    type="submit"
                    class="w-full rounded-2xl bg-gray-900 text-white px-8 py-4 font-bold text-lg hover:opacity-90 transition"
                >
                    Post Job →
                </button>
                <p class="text-center text-xs text-gray-400 mt-3">Job goes live immediately after posting.</p>
            </div>

        </form>
    </main>

</body>
</html>