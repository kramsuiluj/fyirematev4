<?php

namespace App\Http\Controllers;

use App\Models\Certificate;

class PrintController extends Controller
{
    public function __invoke(Certificate $certificate)
    {
        return view('print', [
            'certificate' => $certificate
        ]);
    }
}
