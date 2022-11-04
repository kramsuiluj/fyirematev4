<?php

namespace App\Http\Controllers;

use App\Models\Head;
use Illuminate\Http\Request;

class HeadController extends Controller
{
    public function index()
    {
        return view('admin.heads.index', [
            'heads' => Head::latest()
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
        $attributes = request()->validate([
            'position' => ['required', 'string'],
            'title' => ['required', 'string'],
            'firstname' => ['required', 'string', 'min:2', 'max:50'],
            'middlename' => ['required', 'string', 'min:2', 'max:50'],
            'lastname' => ['required', 'string', 'min:2', 'max:50']
        ]);

        $updates = [];

        $updates['firstname'] = $this->checkToUpdate($attributes['firstname'], $head->firstname) ?? '';
    }

    protected function checkToUpdate($new, $old){
        if ($new != $old) {
            return $new;
        }
        return false;
    }

    public function destroy(Head $head)
    {
        $head->delete();

        return redirect(route('admin.heads.index'));
    }
}
