<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionOrder extends Model
{
    use HasFactory;

    public function certificate()
    {
        return $this->belongsTo(Certificate::class, 'certificate_id');
    }
}
