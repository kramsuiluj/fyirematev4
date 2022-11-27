<?php

namespace App\Http\Controllers;

use App\Imports\EstablishmentsImport;
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

        Excel::import(new EstablishmentsImport(), $attributes['establishments_list']);

        return redirect(route('establishments.index'))->with('success', 'You have successfully imported an Establishments List.');
    }
}
