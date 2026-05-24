<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int         $id
 * @property string      $title
 * @property string      $company
 * @property string      $location
 * @property int|null    $salary_min
 * @property int|null    $salary_max
 * @property string      $description
 * @property array       $tags
 * @property bool        $is_active
 * @property bool        $is_featured
 * @property Carbon|null $published_at
 * @property Carbon|null $expires_at
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'company',
        'location',
        'salary_min',
        'salary_max',
        'description',
        'tags',
        'is_active',
        'is_featured',
        'published_at',
        'expires_at',
    ];


 protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Job $job) {
            $job->slug = \Illuminate\Support\Str::slug($job->title . '-' . $job->company);
        });
    }



    

    
    protected $casts = [
        'tags'         => 'array',   // stored as JSON in DB, auto cast to PHP array
        'salary_min'   => 'integer',
        'salary_max'   => 'integer',
        'is_active'    => 'boolean',
        'is_featured'  => 'boolean',
        'published_at' => 'datetime',
        'expires_at'   => 'datetime',
    ];

    // -------------------------------------------------------------------------
    // Scopes
    // -------------------------------------------------------------------------

    /** Only live, non-expired listings. */
    public function scopeActive(Builder $query): Builder
    {
        return $query
            ->where('is_active', true)
            ->where(function (Builder $q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>', now());
            });
    }

    /** Featured jobs first. */
    public function scopeFeaturedFirst(Builder $query): Builder
    {
        return $query->orderByDesc('is_featured');
    }

    // -------------------------------------------------------------------------
    // Accessors
    // -------------------------------------------------------------------------

    /**
     * Human-readable salary string, e.g. "$130,000 - $160,000" or "$90,000".
     */
    public function getSalaryLabelAttribute(): string
    {
        if (! $this->salary_min && ! $this->salary_max) {
            return 'Salary not disclosed';
        }

        if ($this->salary_min && $this->salary_max && $this->salary_min !== $this->salary_max) {
            return '$' . number_format($this->salary_min) . ' – $' . number_format($this->salary_max);
        }

        $amount = $this->salary_max ?? $this->salary_min;
        return '$' . number_format($amount);
    }

    /**
     * "2 days ago", "just now", etc.
     */
    public function getPostedLabelAttribute(): string
    {
        return $this->published_at
            ? $this->published_at->diffForHumans()
            : $this->created_at->diffForHumans();
    }

    // -------------------------------------------------------------------------
    // API shape
    // -------------------------------------------------------------------------

    /**
     * The exact shape the Alpine.js frontend expects.
     * Keeps controller and view decoupled from raw DB columns.
     */
    public function toApiArray(): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'company'     => $this->company,
            'location'    => $this->location,
            'salary'      => $this->salary_label,
            'salary_min'  => $this->salary_min,
            'salary_max'  => $this->salary_max,
            'description' => $this->description,
            'tags'        => $this->tags ?? [],
            'is_featured' => $this->is_featured,
            'posted'      => $this->posted_label,
            'url'         => '/jobs/' . $this->slug, // add named route when ready
        ];
    }
}
