<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        return view('admin.activities.index', [
            'activities' => Activity::latest()->get()
        ]);
    }
}
