<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Yajra\Address\Entities\Barangay;
use Yajra\Address\Entities\City;
use Yajra\Address\Entities\Province;
use Yajra\Address\Entities\Region;

class LocationController extends Controller
{
    public function index()
    {
        return view('locations.index', [
            'location' => Location::first(),
            'barangays' => Barangay::where('city_id', Location::first()->city)->get()
        ]);
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

        activity('Location Saved')->log('The system location has been set to [' . Region::firstWhere('region_id', Location::first()->region)->name . ', ' . Province::firstWhere('province_id', Location::first()->province)->name . ', ' . City::firstWhere('city_id', Location::first()->city)->name);

        return redirect(route('locations.index'))->with('success', 'You have successfully set the location of the system.');
    }
}
