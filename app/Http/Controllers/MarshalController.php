<?php

namespace App\Http\Controllers;

use App\Models\Marshal;
use Illuminate\Validation\Rule;

class MarshalController extends Controller
{
    public function index()
    {
        return view('admin.marshals.index', [
            'marshals' => Marshal::latest()->simplePaginate(5)
        ]);
    }

    public function create()
    {
        return view('admin.marshals.create');
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
            $marshals = Marshal::where('is_default', 1)->latest()->get();

            foreach ($marshals as $marshal) {
                $marshal->update([
                    'is_default' => false
                ]);
            }
        }

        $marshal = Marshal::create($attributes);

        activity('Marshal Created')->log('A chief personnel has been created. Output: ' . $marshal->fullname());

        return redirect(route('admin.personnel.marshals.index'))->with('success', 'You have successfully created a Marshal Personnel.');
    }

    public function edit(Marshal $marshal)
    {
        return view('admin.marshals.edit', [
            'marshal' => $marshal
        ]);
    }

    public function update(Marshal $marshal)
    {
        $updated = [];

        $attributes = request()->validate([
            'title' => ['required'],
            'firstname' => ['required', 'string', 'min:2', 'max:50', Rule::unique('chiefs')
                ->where('firstname', [request('firstname')])
                ->where('middlename', [request('middlename')])
                ->where('lastname', [request('lastname')])
                ->ignore($marshal)
            ],
            'middlename' => ['required', 'string', 'min:2', 'max:50', Rule::unique('chiefs')
                ->where('firstname', [request('firstname')])
                ->where('middlename', [request('middlename')])
                ->where('lastname', [request('lastname')])
                ->ignore($marshal)
            ],
            'lastname' => ['required', 'string', 'min:2', 'max:50', Rule::unique('chiefs')
                ->where('firstname', [request('firstname')])
                ->where('middlename', [request('middlename')])
                ->where('lastname', [request('lastname')])
                ->ignore($marshal)
            ],
        ]);

        if ($attributes['title'] != $marshal->title) {
            $updated['title'] = $attributes['title'];
        }

        if ($attributes['firstname'] != $marshal->firstname) {
            $updated['firstname'] = $attributes['firstname'];
        }

        if ($attributes['middlename'] != $marshal->middlename) {
            $updated['middlename'] = $attributes['middlename'];
        }

        if ($attributes['lastname'] != $marshal->lastname) {
            $updated['lastname'] = $attributes['lastname'];
        }

        if (count($updated) == 0) {
            return redirect(route('admin.personnel.marshals.index'))->with('success', 'You did not updated any field.');
        }

        $marshal->update($updated);

        activity('Updated Marshal')->log('A marshal personnel has been updated. [' . $marshal->fullname() . ']');

        return redirect(route('admin.personnel.marshals.index'))->with('success', 'You have successfully updated the marshal personnel you selected.');
    }

    public function updateDefault(Marshal $marshal)
    {
        $marshals = Marshal::where('is_default', true)->latest()->get();

        foreach ($marshals as $oldMarshal) {
            $oldMarshal->update([
                'is_default' => false
            ]);
        }

        $marshal->update([
            'is_default' => true
        ]);

        activity('Set Default Marshal')->log('A default marshal has been set. [' . $marshal->fullname() . ']');

        return redirect(route('admin.personnel.marshals.index'))->with('success', 'You have successfully set the default marshal.');
    }

    public function destroy(Marshal $marshal)
    {
        if ($marshal->is_default) {
            return redirect(route('admin.personnel.chiefs.index'))->with('warning', 'You are trying to delete a marshal that is set to default.');
        }

        $marshal->delete();

        activity('Personnel Deleted')->log('A marshal personnel has been deleted. [' . $marshal->fullname() . ']');

        return redirect(route('admin.personnel.marshals.index'))->with('success', 'You have successfully deleted the personnel you selected.');
    }
}
