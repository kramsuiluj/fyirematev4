<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fsic extends Model
{
    use HasFactory;

    protected $with = ['payment', 'applicant'];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function applicant()
    {
        return $this->hasOne(Applicant::class);
    }
}
