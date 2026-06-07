@php
    use Illuminate\Pagination\LengthAwarePaginator;

    $allListings = collect([
        ['name' => 'Eiffel Tower Skip-the-Line', 'city' => 'Paris', 'type' => 'Attraction', 'price' => 59, 'affiliate_url' => '#'],
        ['name' => 'Louvre Museum Premium Entry', 'city' => 'Paris', 'type' => 'Attraction', 'price' => 42, 'affiliate_url' => '#'],
        // ... (rest of your array)
    ]);

    $filtered = $allListings
        ->when(request('city'), fn($c, $city) => $c->filter(fn($i) => str_contains(mb_strtolower($i['city']), mb_strtolower($city))))
        ->when(request('type'), fn($c, $type) => $c->where('type', $type));

    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $perPage = 12;
    $listings = new LengthAwarePaginator(
        $filtered->forPage($currentPage, $perPage),
        $filtered->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()]
    );
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-5xl mx-auto">
        <form method="GET" class="flex gap-4 mb-8">
            <input name="city" placeholder="City..." value="{{ request('city') }}" class="border p-2">
            <button class="bg-orange-500 text-white px-4">SEARCH</button>
        </form>

        <div class="grid grid-cols-3 gap-6">
            @foreach($listings as $item)
                <div class="bg-white p-6 border shadow-sm">
                    <h3 class="font-bold">{{ $item['name'] }}</h3>
                    <p class="text-sm text-gray-500">{{ $item['city'] }}</p>
                    <a href="{{ $item['affiliate_url'] }}" class="text-orange-500 font-bold">Book →</a>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $listings->links() }}
        </div>
    </div>
</body>
</html>