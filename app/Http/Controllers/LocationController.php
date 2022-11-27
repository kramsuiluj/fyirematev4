<?php

namespace App\Http\Controllers;

use App\Models\Location;
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
            'provinces' => Province::filter(request(['region']))->get(),
            'cities' => City::filter(request(['region', 'province']))->get()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'region' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'postal_code' => ['required']
        ]);

        if (count(Location::all()) >= 1) {
            Location::truncate();
        }

        Location::create($attributes);

        return redirect(route('locations.index'))->with('success', 'You have successfully set the location of the system.');
    }
}
