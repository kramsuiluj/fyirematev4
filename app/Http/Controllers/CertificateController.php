<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Certificate;
use App\Models\Head;
use App\Models\Payment;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        return view('certificates.index', [
            'certificates' => Certificate::all()
        ]);
    }

    public function create()
    {
        return view('certificates.create', [
            'chiefs' => Head::where('position', 'Chief')->get(),
            'marshals' => Head::where('position', 'Marshal')->get()
        ]);
    }


    public function store()
    {
        $attributes = request()->validate([
            'fsic_id' => ['required', 'numeric'],
            'filled_date' => ['required'],
            'valid_until' => ['required'],
            'occupancy_type' => ['required'],
            'issuance_type' => ['required'],
            'description' => ['required'],
            'establishment' => ['required'],
            'firstname' => ['required'],
            'middlename' => ['required'],
            'lastname' => ['required'],
            'address' => ['required'],
            'postal_code' => ['required', 'numeric'],
            'amount' => ['required', 'numeric'],
            'or_number' => ['required', 'numeric'],
            'payment_date' => ['required'],
            'chief' => ['required'],
            'marshal' => ['required']
        ]);

        $certificate = Certificate::create([
            'fsic_id' => $attributes['fsic_id'],
            'filled_date' => $attributes['filled_date'],
            'occupancy_type' => $attributes['occupancy_type'],
            'issuance_type' => $attributes['issuance_type'],
            'others' => request('others'),
            'description' => $attributes['description'],
            'valid_until' => $attributes['valid_until'],
            'chief' => $attributes['chief'],
            'marshal' => $attributes['marshal'],
            'validity' => 'Valid'
        ]);

        Applicant::create([
            'certificate_id' => $certificate->id,
            'establishment' => $attributes['establishment'],
            'firstname' => $attributes['firstname'],
            'middlename' => $attributes['middlename'],
            'lastname' => $attributes['lastname'],
            'address' => $attributes['address']
        ]);

        Payment::create([
            'certificate_id' => $certificate->id,
            'amount' => $attributes['amount'],
            'or_number' => $attributes['or_number'],
            'date' => $attributes['payment_date']
        ]);

        return redirect(route('certificates.index'))->with('success', 'Application was processed successfully.');
    }
}
