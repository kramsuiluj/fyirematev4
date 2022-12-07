<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Page;

class PrintController extends Controller
{
    public function __invoke(Certificate $certificate)
    {
        $pages = Page::all();

        return view('print', [
            'certificate' => $certificate,
            'page' => Page::firstWhere('is_active', true)
        ]);
    }
}
