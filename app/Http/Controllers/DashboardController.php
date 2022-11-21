<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): Factory|View|Application
    {
        $fullDate = explode(" ", date(Carbon::now()))[0];
        $dateArr = explode('-', $fullDate);
        $month = $dateArr[0] . '-' . $dateArr[1];
        $year = $dateArr[0];

        $months = [
            '01' => 0,
            '02' => 0,
            '03' => 0,
            '04' => 0,
            '05' => 0,
            '06' => 0,
            '07' => 0,
            '08' => 0,
            '09' => 0,
            '10' => 0,
            '11' => 0,
            '12' => 0,
        ];

        foreach ($months as $key => $month) {
            $date = $year . '-' . $key;
            $months[$key] = count(Certificate::where('created_at', 'like', '%' . $date . '%')->get());
        }

        return view('dashboard.index', [
            'total_certificates' => count(Certificate::all()),
            'total_completed' => count(Certificate::where('status', 'Completed')->get()),
            'total_incomplete' => count(Certificate::where('status', 'For Inspection')->get()),
            'total_expired' => count(Certificate::where('validity', 'Invalid')->get()),
            'monthly_certificates' => count(Certificate::where('created_at', 'like', '%' . $month . '%')->get()),
            'monthly_completed_certificates' => count(Certificate::where('created_at', 'like', '%' . $month . '%')->where('status', 'Completed')->get()),
            'monthly_count' => $months
        ]);
    }
}
