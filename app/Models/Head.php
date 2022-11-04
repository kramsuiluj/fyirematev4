<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['filter'] ?? false, fn($query, $search) =>
            $query->where('position', $search)
        );
    }

    public function fullname(): string
    {
        return $this->title . ' ' . $this->firstname . ' ' . $this->middlename[0] . '. ' . $this->lastname;
    }
}
