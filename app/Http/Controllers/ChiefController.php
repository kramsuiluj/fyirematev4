<?php

namespace App\Http\Controllers;

use App\Models\Chief;
use Illuminate\Validation\Rule;

class ChiefController extends Controller
{
    public function index()
    {
        return view('admin.chiefs.index', [
            'chiefs' => Chief::latest()->simplePaginate(5)
        ]);
    }

    public function create()
    {
        return view('admin.chiefs.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required'],
            'firstname' => ['required', 'string', 'min:2', 'max:50'],
            'middlename' => ['required', 'string', 'min:2', 'max:50'],
            'lastname' => ['required', 'string', 'min:2', 'max:50']
        ]);

        if (request('is_default')) {
            $chiefs = Chief::where('is_default', 1)->latest()->get();

            foreach ($chiefs as $chief) {
                $chief->update([
                    'is_default' => false
                ]);
            }
        }

        $chief = Chief::create($attributes);

        activity('Chief Created')->log('A chief personnel has been created. Output: ' . $chief->fullname());

        return redirect(route('admin.personnel.chiefs.index'))->with('success', 'You have successfully created a Chief Personnel.');
    }

    public function edit(Chief $chief)
    {
        return view('admin.chiefs.edit', [
            'chief' => $chief
        ]);
    }

    public function update(Chief $chief)
    {
        $updated = [];

        $attributes = request()->validate([
            'title' => ['required'],
            'firstname' => ['required', 'string', 'min:2', 'max:50', Rule::unique('chiefs')
                ->where('firstname', [request('firstname')])
                ->where('middlename', [request('middlename')])
                ->where('lastname', [request('lastname')])
                ->ignore($chief)
            ],
            'middlename' => ['required', 'string', 'min:2', 'max:50', Rule::unique('chiefs')
                ->where('firstname', [request('firstname')])
                ->where('middlename', [request('middlename')])
                ->where('lastname', [request('lastname')])
                ->ignore($chief)
            ],
            'lastname' => ['required', 'string', 'min:2', 'max:50', Rule::unique('chiefs')
                ->where('firstname', [request('firstname')])
                ->where('middlename', [request('middlename')])
                ->where('lastname', [request('lastname')])
                ->ignore($chief)
            ],
        ]);

        if ($attributes['title'] != $chief->title) {
            $updated['title'] = $attributes['title'];
        }

        if ($attributes['firstname'] != $chief->firstname) {
            $updated['firstname'] = $attributes['firstname'];
        }

        if ($attributes['middlename'] != $chief->middlename) {
            $updated['middlename'] = $attributes['middlename'];
        }

        if ($attributes['lastname'] != $chief->lastname) {
            $updated['lastname'] = $attributes['lastname'];
        }

        if (count($updated) == 0) {
            return redirect(route('admin.personnel.chiefs.index'))->with('success', 'You did not updated any field.');
        }

        $chief->update($updated);

        activity('Updated Chief')->log('A chief personnel has been updated. [' . $chief->fullname() . ']');

        return redirect(route('admin.personnel.chiefs.index'))->with('success', 'You have successfully updated the chief personnel you selected.');
    }

    public function updateDefault(Chief $chief)
    {
        $chiefs = Chief::where('is_default', true)->latest()->get();

        foreach ($chiefs as $oldChief) {
            $oldChief->update([
                'is_default' => false
            ]);
        }

        $chief->update([
            'is_default' => true
        ]);

        activity('Set Default Chief')->log('A default chief has been set. [' . $chief->fullname() . ']');

        return redirect(route('admin.personnel.chiefs.index'))->with('success', 'You have successfully set the default chief.');
    }

    public function destroy(Chief $chief)
    {
        if ($chief->is_default) {
            return redirect(route('admin.personnel.chiefs.index'))->with('warning', 'You are trying to delete a chief that is set to default.');
        }

        $chief->delete();

        activity('Personnel Deleted')->log('A chief personnel has been deleted. [' . $chief->fullname() . ']');

        return redirect(route('admin.personnel.chiefs.index'))->with('success', 'You have successfully deleted the personnel you selected.');
    }
}
