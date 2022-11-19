<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\InspectionOrder;
use Illuminate\Http\Request;

class InspectionOrderPrintController extends Controller
{
    public function __invoke(Certificate $certificate, InspectionOrder $inspectionOrder)
    {
        return view('ios.print', [
            'certificate' => $certificate,
            'io' => $inspectionOrder
        ]);
    }
}
