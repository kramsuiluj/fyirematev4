<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FsicController extends Controller
{
    public function create()
    {
        return view('certificates.create');
    }
}
