<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function __invoke()
    {
        return view('print');
    }
}
