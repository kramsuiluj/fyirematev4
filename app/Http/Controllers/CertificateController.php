<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Certificate;
use App\Models\Head;
use App\Models\Payment;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function show(Certificate $certificate)
    {
        return view('certificates.show', [
            'certificate' => $certificate
        ]);
    }

    public function index()
    {
        return view('certificates.index', [
            'certificates' => Certificate::latest()->simplePaginate(5)
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
            'user_id' => auth()->user()->id,
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

        activity('Certificate Recorded')->log(auth()->user()->fullname() . ' has added a new certificate in the records. Certificate ID: ' . $certificate->fsic_id);

        return redirect(route('certificates.index'))->with('success', 'Application was processed successfully.');
    }

    public function edit(Certificate $certificate)
    {
        return view('certificates.edit', [
            'certificate' => $certificate,
            'chiefs' => Head::where('position', 'Chief')->get(),
            'marshals' => Head::where('position', 'Marshal')->get()
        ]);
    }

    public function update(Certificate $certificate)
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

        $updatedCertificate = [];
        $updatedApplicant = [];
        $updatedPayment = [];

        if ($attributes['fsic_id'] != $certificate->fsic_id) {
            $updatedCertificate['fsic_id'] = $attributes['fsic_id'];
        }

        if ($attributes['filled_date'] != $certificate->filled_date) {
            $updatedCertificate['filled_date'] = $attributes['filled_date'];
        }

        if ($attributes['occupancy_type'] != $certificate->occupancy_type) {
            $updatedCertificate['occupancy_type'] = $attributes['occupancy_type'];
        }

        if ($attributes['issuance_type'] != $certificate->issuance_type) {
            $updatedCertificate['issuance_type'] = $attributes['issuance_type'];
        }

        if (request('others') != $certificate->others) {
            $updatedCertificate['others'] = request('others');
        }

        if ($attributes['description'] != $certificate->description) {
            $updatedCertificate['description'] = $attributes['description'];
        }

        if ($attributes['valid_until'] != $certificate->valid_until) {
            $updatedCertificate['valid_until'] = $attributes['valid_until'];
        }

        if ($attributes['chief'] != $certificate->chief) {
            $updatedCertificate['chief'] = $attributes['chief'];
        }

        if ($attributes['marshal'] != $certificate->marshal) {
            $updatedCertificate['marshal'] = $attributes['marshal'];
        }

        if ($attributes['establishment'] != $certificate->applicant->establishment) {
            $updatedApplicant['establishment'] = $attributes['establishment'];
        }

        if ($attributes['firstname'] != $certificate->applicant->firstname) {
            $updatedApplicant['firstname'] = $attributes['firstname'];
        }

        if ($attributes['middlename'] != $certificate->applicant->middlename) {
            $updatedApplicant['middlename'] = $attributes['middlename'];
        }

        if ($attributes['lastname'] != $certificate->applicant->lastname) {
            $updatedApplicant['lastname'] = $attributes['lastname'];
        }

        if ($attributes['address'] != $certificate->applicant->address) {
            $updatedApplicant['address'] = $attributes['address'];
        }

        if ($attributes['amount'] != $certificate->payment->amount) {
            $updatedPayment['amount'] = $attributes['amount'];
        }

        if ($attributes['or_number'] != $certificate->payment->or_number) {
            $updatedPayment['or_number'] = $attributes['or_number'];
        }

        if ($attributes['payment_date'] != $certificate->payment->date) {
            $updatedPayment['date'] = $attributes['payment_date'];
        }

        if (count($updatedCertificate) == 0 && count($updatedApplicant) == 0 && count($updatedPayment) == 0) {
            return redirect(route('certificates.index'))->with('success', 'You did not update any field.');
        }

        $certificate->update($updatedCertificate);
        $certificate->applicant->update($updatedApplicant);
        $certificate->payment->update($updatedPayment);

        return redirect(route('certificates.index'))->with('success', 'You have successfully update the certificate you selected.');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        return redirect(route('certificates.index'))->with('success', 'The selected certificate has been successfully deleted.');
    }
}
