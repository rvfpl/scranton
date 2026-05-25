<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poznań Tech Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    @if($jobs->isNotEmpty())
        @php
            $schemaData = [
                "@context" => "https://schema.org/",
                "@type" => "ItemList",
                "itemListElement" => $jobs->map(function($job, $i) {
                    return [
                        "@type" => "ListItem",
                        "position" => $i + 1,
                        "item" => $job->toApiArray()['schema_markup']
                    ];
                })->toArray()
            ];
        @endphp
        <script type="application/ld+json">
            {!! json_encode($schemaData) !!}
        </script>
    @endif
</head>

<body class="bg-gray-50 text-gray-900">
    <main class="container mx-auto py-10 px-4">
        <h1 class="text-4xl font-bold mb-6">{{ $jobs->count() }} Opportunities</h1>
        
        <div class="grid gap-6">
      @forelse($jobs as $job)
    <div class="bg-white p-6 rounded shadow border-l-4 {{ $job->is_featured ? 'border-yellow-400' : 'border-blue-600' }}">
        <h2 class="text-xl font-bold">{{ $job->title }}</h2>
        <p class="text-gray-600 font-semibold">{{ $job->company }}</p>
        
        <div class="mt-2 text-sm text-gray-500">
            {{ $job->salary_label }}
        </div>

        <p class="mt-4 text-gray-700">{{ $job->description }}</p>

        <div class="mt-4 flex gap-2">
            @foreach($job->tags as $tag)
                <span class="bg-gray-100 px-2 py-1 rounded text-xs">{{ $tag }}</span>
            @endforeach
        </div>
    </div>
@empty
    <p>No jobs found.</p>
@endforelse
        </div>
    </main>
</body>
</html>