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
            'total_completed' => 99,
            'total_incomplete' => 50,
            'total_expired' => 16
        ]);
    }
}
