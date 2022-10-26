<?php

namespace App\Http\Controllers;

use App\Models\Head;
use Illuminate\Validation\Rules\Enum;

class HeadController extends Controller
{
    public function create()
    {
        return view('admin.heads.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'position' => ['required', 'string'],
            'title' => ['required', 'string'],
            'firstname' => ['required', 'string', 'min:2', 'max:50'],
            'middlename' => ['required', 'string', 'min:2', 'max:50'],
            'lastname' => ['required', 'string', 'min:2', 'max:50']
        ]);

        Head::create($attributes);

        dd($attributes);
    }
}
