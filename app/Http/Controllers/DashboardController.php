<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): Factory|View|Application
    {
        return view('dashboard.index', [
            'total_certificates' => count(Certificate::all()),
            'total_completed' => count(Certificate::where('status', 'Completed')->get()),
            'total_incomplete' => count(Certificate::where('status', 'For Inspection')->get()),
            'total_expired' => count(Certificate::where('validity', 'Invalid')->get())
        ]);
    }
}
