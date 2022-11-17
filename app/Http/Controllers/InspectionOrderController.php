<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\InspectionOrder;
use Illuminate\Http\Request;

class InspectionOrderController extends Controller
{
    public function index(Certificate $certificate)
    {
        return view('ios.index', [
            'certificate' => $certificate,
            'inspection_orders' => $certificate->io
        ]);
    }

    public function create(Certificate $certificate)
    {
        return view('ios.create', [
            'certificate' => $certificate
        ]);
    }

    public function store(Certificate $certificate)
    {
        $attributes = request()->validate([
            'certificate_id' => ['required'],
            'io_number' => ['required'],
            'io_to' => ['required'],
            'proceed' => ['required'],
            'purpose' => ['required'],
            'duration' => ['required'],
            'remarks' => ['required'],
            'processed_at' => ['required', 'date'],
            'chief' => ['required'],
            'marshal' => ['required']
        ]);

        InspectionOrder::create($attributes);

        return redirect(route('ios.index', $certificate->id));
    }
}
