<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TravelHub | Attractions, Hotels & Experiences</title>

    <meta name="description"
          content="Discover attractions, hotels and experiences across top cities.">

    <script src="https://cdn.tailwindcss.com"></script>

    <script defer
        src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">
    </script>
</head>

<body class="bg-slate-50 text-slate-900">

@php

/*
|--------------------------------------------------------------------------
| DATA LAYER
|--------------------------------------------------------------------------
|
| Replace with:
|
| DB::table('experiences')
|   ->when(...)
|   ->paginate(12);
|
*/

$items = collect([

[
'name'=>'Eiffel Tower Skip-the-Line',
'city'=>'Paris',
'type'=>'Attraction',
'price'=>59,
'affiliate_url'=>'https://partner.example.com/eiffel'
],

[
'name'=>'Louvre Museum Premium Entry',
'city'=>'Paris',
'type'=>'Attraction',
'price'=>42,
'affiliate_url'=>'https://partner.example.com/louvre'
],

[
'name'=>'Paris Opera Night Show',
'city'=>'Paris',
'type'=>'Show',
'price'=>89,
'affiliate_url'=>'https://partner.example.com/opera'
],

[
'name'=>'London Eye Fast Track',
'city'=>'London',
'type'=>'Attraction',
'price'=>49,
'affiliate_url'=>'https://partner.example.com/londoneye'
],

[
'name'=>'West End Theatre Experience',
'city'=>'London',
'type'=>'Show',
'price'=>75,
'affiliate_url'=>'https://partner.example.com/westend'
],

[
'name'=>'The Ritz London',
'city'=>'London',
'type'=>'Hotel',
'price'=>399,
'affiliate_url'=>'https://partner.example.com/ritz'
],

[
'name'=>'Burj Khalifa Sky Access',
'city'=>'Dubai',
'type'=>'Attraction',
'price'=>69,
'affiliate_url'=>'https://partner.example.com/burj'
],

[
'name'=>'Atlantis The Palm',
'city'=>'Dubai',
'type'=>'Hotel',
'price'=>520,
'affiliate_url'=>'https://partner.example.com/atlantis'
],

[
'name'=>'Dubai Fountain Show VIP',
'city'=>'Dubai',
'type'=>'Show',
'price'=>35,
'affiliate_url'=>'https://partner.example.com/fountain'
],

[
'name'=>'Colosseum VIP Tour',
'city'=>'Rome',
'type'=>'Attraction',
'price'=>65,
'affiliate_url'=>'https://partner.example.com/colosseum'
],

[
'name'=>'Rome Imperial Hotel',
'city'=>'Rome',
'type'=>'Hotel',
'price'=>210,
'affiliate_url'=>'https://partner.example.com/romehotel'
],

[
'name'=>'Gdańsk Old Town Walking Tour',
'city'=>'Gdansk',
'type'=>'Attraction',
'price'=>19,
'affiliate_url'=>'https://partner.example.com/gdansk'
],

[
'name'=>'Radisson Blu Gdańsk',
'city'=>'Gdansk',
'type'=>'Hotel',
'price'=>145,
'affiliate_url'=>'https://partner.example.com/radisson'
],

[
'name'=>'AmberSky Observation Wheel',
'city'=>'Gdansk',
'type'=>'Attraction',
'price'=>14,
'affiliate_url'=>'https://partner.example.com/ambersky'
],

]);

$city = request('city');
$type = request('type');

$results = $items
->when($city,function($collection) use ($city){

    return $collection->filter(
        fn($item)=> str_contains(
            strtolower($item['city']),
            strtolower($city)
        )
    );

})
->when($type,function($collection) use ($type){

    return $collection->where('type',$type);

});

$page = request()->integer('page',1);

$perPage = 12;

$total = $results->count();

$paginated = $results
->forPage($page,$perPage)
->values();

$pages = (int) ceil($total / $perPage);

@endphp

<nav
x-data="{open:false}"
class="sticky top-0 z-50 bg-white border-b">

<div class="max-w-7xl mx-auto px-4">

<div class="flex items-center justify-between h-16">

<a href="/" class="font-bold text-2xl">
TravelHub
</a>

<div class="hidden md:flex gap-8">

<a href="#" class="hover:text-blue-600">
Attractions
</a>

<a href="#" class="hover:text-blue-600">
Hotels
</a>

<a href="#" class="hover:text-blue-600">
Shows
</a>

</div>

<button
class="md:hidden"
@click="open=!open">

☰

</button>

</div>

<div
x-show="open"
x-transition
class="md:hidden py-4 border-t">

<div class="flex flex-col gap-4">

<a href="#">Attractions</a>
<a href="#">Hotels</a>
<a href="#">Shows</a>

</div>

</div>

</div>

</nav>

<section class="py-10">

<div class="max-w-7xl mx-auto px-4">

<h1 class="text-4xl font-bold">
Discover Experiences Worldwide
</h1>

<p class="mt-3 text-slate-600">
Find attractions, hotels and shows instantly.
</p>

<form
method="GET"
class="mt-8 bg-white rounded-2xl border p-4">

<div class="grid md:grid-cols-3 gap-4">

<input
name="city"
value="{{ request('city') }}"
placeholder="City"
class="border rounded-xl px-4 py-3 w-full">

<select
name="type"
class="border rounded-xl px-4 py-3 w-full">

<option value="">
All Categories
</option>

<option value="Attraction"
    @selected(request('type')==='Attraction')>
    Attractions
</option>

<option value="Hotel"
    @selected(request('type')==='Hotel')>
    Hotels
</option>

<option value="Show"
    @selected(request('type')==='Show')>
    Shows
</option>

</select>

<button
class="bg-black text-white rounded-xl px-6 py-3">

Search

</button>

</div>

</form>

<div class="mt-10">

<div class="flex items-center justify-between mb-6">

<h2 class="text-2xl font-bold">
{{ number_format($total) }} Results
</h2>

</div>

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

@forelse($paginated as $item)

<div
class="bg-white rounded-2xl border p-5 hover:shadow-lg transition">

<div class="flex justify-between">

<span
class="text-xs uppercase tracking-wide text-slate-500">

{{ $item['type'] }}

</span>

<span class="font-bold">
€{{ number_format($item['price']) }}
</span>

</div>

<h3 class="mt-3 text-lg font-semibold">
{{ $item['name'] }}
</h3>

<p class="mt-2 text-slate-600">
{{ $item['city'] }}
</p>

<a
href="{{ $item['affiliate_url'] }}"
target="_blank"
rel="nofollow sponsored noopener noreferrer"
class="mt-5 inline-flex bg-blue-600 text-white px-4 py-2 rounded-lg">

Book Now

</a>

</div>

@empty

<div class="col-span-full">

<div class="bg-white border rounded-2xl p-8">

No results found.

</div>

</div>

@endforelse

</div>

@if($pages > 1)

<div class="mt-10 flex gap-2">

@for($i=1;$i<=$pages;$i++)

<a
href="?{{ http_build_query(array_merge(request()->query(),['page'=>$i])) }}"
class="
px-4 py-2 rounded-lg border
{{ $page === $i ? 'bg-black text-white' : 'bg-white' }}
">

{{ $i }}

</a>

@endfor

</div>

@endif

</div>

</div>

</section>

</body>
</html>