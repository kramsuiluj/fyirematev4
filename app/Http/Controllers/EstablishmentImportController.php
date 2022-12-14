<?php

namespace App\Http\Controllers;

use App\Imports\EstablishmentsImport;
use App\Models\Establishment;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EstablishmentImportController extends Controller
{
    public function import()
    {
        return view('establishments.import');
    }

    public function upload()
    {
        $attributes = request()->validate([
            'establishments_list' => ['required']
        ]);

        $imports = Excel::import(new EstablishmentsImport(), $attributes['establishments_list']);

        if (Establishment::latest()->get()[0]) {
            activity('Establishment Record Imported')->log('Establishment record(s) has been imported. : ');
        }



        activity('Establishment Record Imported')->log('Establishment record(s) has been imported. ID of the latest Establishment before importing: ');

        return redirect(route('establishments.index'))->with('success', 'You have successfully imported an Establishments List.');
    }
}
