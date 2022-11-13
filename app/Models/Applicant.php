<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
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

    public function fullname(): string
    {
        return $this->title . ' ' . $this->firstname . ' ' . $this->middlename[0] . '. ' . $this->lastname;
    }
}
