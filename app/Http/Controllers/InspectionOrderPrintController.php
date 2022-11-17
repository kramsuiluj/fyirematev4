<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class InspectionOrderPrintController extends Controller
{
    public function __invoke(Certificate $certificate, InspectionOrder $inspectionOrder)
    {
        return view('ios.print');
    }
}
