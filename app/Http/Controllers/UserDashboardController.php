<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function __invoke()
    {
        $now = explode(' ', date(Carbon::now()))[0];
        $month = explode('-', $now)[0] . '-' . explode('-', $now)[1];
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
            $date = explode('-', $now)[0] . '-' . $key;
            $months[$key] = count(Certificate::where('created_at', 'like', '%' . $date . '%')->where('user_id', auth()->user()->id)->get());
        }

        return view('users.index', [
            'total_certificates' => count(Certificate::where('user_id', auth()->user()->id)->get()),
            'certificates_today' => count(Certificate::where('created_at', 'like', '%' . $now . '%')->get()),
            'monthly_certificates' => count(Certificate::where('created_at', 'like', '%' . $month . '%')->get()),
            'monthly_count' => $months
        ]);
    }
}
