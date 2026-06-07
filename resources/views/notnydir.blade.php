<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directory | {{ request('city', 'Search') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900 p-8">

    <div class="max-w-4xl mx-auto">
        <!-- Search Form -->
        <form action="{{ route('directory') }}" method="GET" class="mb-8 flex gap-2">
            <input type="text" name="city" placeholder="Enter city (e.g. Nashville)..." 
                   value="{{ request('city') }}" class="border p-2 flex-grow rounded">
            <select name="type" class="border p-2 rounded">
                <option value="">All Categories</option>
                <option value="show" {{ request('type') == 'show' ? 'selected' : '' }}>Shows</option>
                <option value="attraction" {{ request('type') == 'attraction' ? 'selected' : '' }}>Attractions</option>
                <option value="hotel" {{ request('type') == 'hotel' ? 'selected' : '' }}>Hotels</option>
            </select>
            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded">Search</button>
        </form>

        <!-- Results List -->
        <div class="grid gap-4">
            @forelse($businesses as $item)
                <div class="bg-white p-4 border rounded shadow-sm hover:border-orange-300 transition">
                    <h2 class="font-bold text-lg">{{ $item->name }}</h2>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">{{ $item->type }} • {{ $item->city }}</p>
                    <a href="#" class="text-orange-600 hover:underline text-sm font-semibold">Book Now →</a>
                </div>
            @empty
                <p>No results found. Try a different city.</p>
            @endforelse
        </div>
    </div>
</body>
</html>