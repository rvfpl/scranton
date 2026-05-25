<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * GET /api/v1/jobs
     *
     * Supported query params:
     *   ?search=laravel          — searches title, company, description
     *   ?tags=Remote,Laravel     — comma-separated tag filter (AND logic)
     *   ?location=remote         — filter by location keyword
     *   ?per_page=20             — results per page (max 100)
     *   ?page=1                  — page number
     *   ?sort=latest|salary      — sort order (default: latest)
     */
    public function index(Request $request): JsonResponse
    {
        $request->validate([
            'search'   => ['nullable', 'string', 'max:100'],
            'tags'     => ['nullable', 'string'],
            'location' => ['nullable', 'string', 'max:100'],
            'per_page' => ['nullable', 'integer', 'min:1', 'max:100'],
            'sort'     => ['nullable', 'string', 'in:latest,salary'],
        ]);

        $query = Job::query()->active();

        // --- Full-text search across key columns ---
        if ($search = $request->string('search')->trim()->value()) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // --- Tag filter (AND: job must have ALL requested tags) ---
        if ($request->filled('tags')) {
            $tags = collect(explode(',', $request->string('tags')))
                ->map(fn($t) => trim($t))
                ->filter()
                ->values();

            foreach ($tags as $tag) {
                // JSON column: works on MySQL 5.7+, PostgreSQL, SQLite 3.38+
                $query->whereJsonContains('tags', $tag);
            }
        }

        // --- Location keyword filter ---
        if ($location = $request->string('location')->trim()->value()) {
            $query->where('location', 'like', "%{$location}%");
        }

        // --- Sorting ---
        match ($request->string('sort')->value()) {
            'salary' => $query->orderByDesc('salary_max')->orderByDesc('published_at'),
            default  => $query->orderByDesc('published_at'),
        };

        $perPage = (int) $request->input('per_page', 20);
        $jobs    = $query->paginate($perPage);

        return response()->json([
            'data' => $jobs->map(fn(Job $job) => $job->toApiArray()),
            'meta' => [
                'total'        => $jobs->total(),
                'per_page'     => $jobs->perPage(),
                'current_page' => $jobs->currentPage(),
                'last_page'    => $jobs->lastPage(),
                'has_more'     => $jobs->hasMorePages(),
            ],
        ]);
    }



    /**
 * GET /jobs/{slug}
 */
public function detail(string $slug): \Illuminate\View\View
{
    $job = Job::where('slug', $slug)
               ->where('is_active', true)
               ->firstOrFail();

    return view('jobs.detail', compact('job'));
}

    /**
     * GET /api/v1/jobs/{job}
     */
    public function show(Job $job): JsonResponse
    {
        abort_unless($job->is_active, 404);

        return response()->json([
            'data' => $job->toApiArray(),
        ]);
    }
}


// Add this to your JobController
public function feed(): JsonResponse
{
    // Use a simplified query for bots (no pagination, just all active jobs)
    $jobs = Job::where('is_active', true)
        ->latest()
        ->get()
        ->map(fn(Job $job) => $job->toApiArray());

    return response()->json([
        'company' => 'Poznań Tech Hub',
        'last_updated' => now()->toIso8601String(),
        'jobs' => $jobs
    ]);
}