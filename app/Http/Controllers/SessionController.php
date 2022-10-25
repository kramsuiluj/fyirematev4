<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
    public function create()
    {
        return view('index');
    }

    public function store()
    {
        $credentials = request()->validate([
            'username' => ['required', 'min:5', 'max:255', 'alpha_num'],
            'password' => ['']
        ]);
    }
}
