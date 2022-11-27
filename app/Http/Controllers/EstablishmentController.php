<?php

namespace App\Http\Controllers;


use App\Models\Establishment;

class EstablishmentController extends Controller
{
    public function index()
    {
        return view('establishments.index', [
            'establishments' => Establishment::filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    public function show(Establishment $establishment)
    {
        return view('establishments.show', [
            'establishment' => $establishment
        ]);
    }

    public function create()
    {
        return view('establishments.create');
    }

    public function destroy(Establishment $establishment)
    {
        $establishment->delete();

        return redirect(route('establishments.index'))->with('success', 'You have successfully deleted the establishment record you selected.');
    }

    public function store()
    {
        $attributes = request()->validate([
            'date' => ['required'],
            'owner' => ['required'],
            'name' => ['required'],
            'address' => ['required'],
            'or_number' => ['required'],
            'ops_number' => ['required'],
            'fsic_number' => ['required'],
            'issuance' => ['required'],
            'occupancy' => ['required'],
        ]);

        Establishment::create($attributes);

        return redirect(route('establishments.index'))->with('success', 'You have successfully added an Establishment Record.');
    }
}
