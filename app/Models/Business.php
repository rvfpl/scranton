<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['city'] ?? null, fn($q, $city) => $q->where('city', 'LIKE', "%$city%"))
              ->when($filters['type'] ?? null, fn($q, $type) => $q->where('type', $type));
    }
}