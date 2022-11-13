<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function fsic()
    {
        return $this->belongsTo(Fsic::class);
    }

    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }
}
