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

        if ($search = $request->string('search')->trim()->value()) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('tags')) {
            $tags = collect(explode(',', $request->string('tags')))
                ->map(fn($t) => trim($t))
                ->filter()
                ->values();

            foreach ($tags as $tag) {
                $query->whereJsonContains('tags', $tag);
            }
        }

        if ($location = $request->string('location')->trim()->value()) {
            $query->where('location', 'like', "%{$location}%");
        }

        match ($request->string('sort')->value()) {
            'salary' => $query->orderByDesc('salary_max')->orderByDesc('published_at'),
            default  => $query->orderByDesc('published_at'),
        };

        $perPage = (int) $request->input('per_page', 20);
        $jobs    = $query->paginate($perPage);

        return response()->json([
            // ✅ Fix: getCollection()->map() returns a plain array, not a paginator object
            'data' => $jobs->getCollection()->map(fn(Job $job) => $job->toApiArray())->values(),
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
     * GET /jobs/{slug}  — Blade view for Poznań and any server-rendered detail page
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

    /**
     * GET /api/v1/feed  — unpaginated feed for bots/scrapers
     * ✅ Fix: moved inside the class
     */
    public function feed(): JsonResponse
    {
        $jobs = Job::where('is_active', true)
            ->latest()
            ->get()
            ->map(fn(Job $job) => $job->toApiArray());

        return response()->json([
            'company'      => 'Poznań Tech Hub',
            'last_updated' => now()->toIso8601String(),
            'jobs'         => $jobs,
        ]);
    }
}