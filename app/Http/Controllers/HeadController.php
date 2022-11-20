<?php

namespace App\Http\Controllers;

use App\Models\Head;
use Illuminate\Http\Request;

class HeadController extends Controller
{
    public function index()
    {
        return view('admin.heads.index', [
            'heads' => Head::latest()->simplePaginate(5),
            'heads_filter' => Head::latest()
                ->filter(request(['filter']))
                ->get()
        ]);
    }

    public function create()
    {
        return view('admin.heads.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'position' => ['required', 'string'],
            'title' => ['required', 'string'],
            'firstname' => ['required', 'string', 'min:2', 'max:50'],
            'middlename' => ['required', 'string', 'min:2', 'max:50'],
            'lastname' => ['required', 'string', 'min:2', 'max:50']
        ]);

        Head::create($attributes);

        return redirect(route('admin.heads.index'))->with('success', 'You have successfully created a personnel.');
    }

    public function edit(Head $head)
    {
        return view('admin.heads.edit', compact('head'));
    }

    public function update(Head $head)
    {
        $updated = [];

        $attributes = request()->validate([
            'position' => ['required', 'string'],
            'title' => ['required', 'string'],
            'firstname' => ['required', 'string', 'min:2', 'max:50'],
            'middlename' => ['required', 'string', 'min:2', 'max:50'],
            'lastname' => ['required', 'string', 'min:2', 'max:50']
        ]);

        if ($attributes['position'] != $head->position) {
            $updated['position'] = $attributes['position'];
        }

        if ($attributes['title'] != $head->title) {
            $updated['title'] = $attributes['title'];
        }

        if ($attributes['firstname'] != $head->firstname) {
            $updated['firstname'] = $attributes['firstname'];
        }

        if ($attributes['middlename'] != $head->middlename) {
            $updated['middlename'] = $attributes['middlename'];
        }

        if ($attributes['lastname'] != $head->lastname) {
            $updated['lastname'] = $attributes['lastname'];
        }

        if (count($updated) == 0) {
            return redirect(route('admin.heads.index'))->with('success', 'You did not update any field.');
        }

        return redirect(route('admin.heads.index'))->with('success', 'You have successfully updated the personnel details.');
    }

    public function destroy(Head $head)
    {
        $head->delete();

        return redirect(route('admin.heads.index'));
    }
}
