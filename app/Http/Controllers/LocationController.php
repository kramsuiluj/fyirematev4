<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Address\Entities\City;
use Yajra\Address\Entities\Province;
use Yajra\Address\Entities\Region;

class LocationController extends Controller
{
    public function index()
    {
        return view('locations.index');
    }

    public function create()
    {
        return view('locations.create', [
            'regions' => Region::all(),
            'provinces' => Province::all(),
            'cities' => City::all()
        ]);
    }
}
