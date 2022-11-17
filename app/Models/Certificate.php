<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $with = ['applicant', 'payment', 'io'];

    public function applicant()
    {
        return $this->hasOne(Applicant::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function io()
    {
        return $this->hasMany(InspectionOrder::class);
    }
}
