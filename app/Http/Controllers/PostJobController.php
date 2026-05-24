<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class PostJobController extends Controller
{
    public function show()
    {
        return view('post-job');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:100'],
            'company'     => ['required', 'string', 'max:100'],
            'location'    => ['required', 'string', 'max:100'],
            'salary_min'  => ['nullable', 'integer', 'min:0'],
            'salary_max'  => ['nullable', 'integer', 'min:0'],
            'description' => ['required', 'string', 'max:2000'],
            'tags'        => ['nullable', 'array'],
            'tags.*'      => ['string', 'max:30'],
        ]);

        Job::create([
            ...$validated,
            'is_active'    => true,
            'is_featured'  => false,
            'published_at' => now(),
        ]);

        return redirect('/')->with('success', 'Job posted successfully!');
    }
}