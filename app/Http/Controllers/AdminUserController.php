<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::where('is_admin', false)->latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => ['required', 'min:5', 'max:25', 'string', 'alpha_num'],
            'position' => ['required', 'max:50', 'string'],
            'firstname' => ['required', 'min:2', 'max:50', 'string',
                Rule::unique('users')
                    ->where('firstname', request('firstname'))
                    ->where('middlename', request('middlename'))
                    ->where('lastname', request('lastname'))
            ],
            'middlename' => ['required', 'min:2', 'max:50', 'string', 'alpha',
                Rule::unique('users')
                    ->where('firstname', request('firstname'))
                    ->where('middlename', request('middlename'))
                    ->where('lastname', request('lastname'))
            ],
            'lastname' => ['required', 'min:2', 'max:50', 'string', 'alpha',
                Rule::unique('users')
                    ->where('firstname', request('firstname'))
                    ->where('middlename', request('middlename'))
                    ->where('lastname', request('lastname'))
            ],
            'password' => ['required', 'min:5', 'confirmed'],
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        User::create($attributes);

        return redirect(route('admin.users.index'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        $updated = [];

        $attributes = request()->validate([
            'username' => ['required', 'min:5', 'max:25', 'string', 'alpha_num'],
            'position' => ['required', 'max:50', 'string'],
            'firstname' => ['required', 'min:2', 'max:50', 'string', 'alpha'],
            'middlename' => ['required', 'min:2', 'max:50', 'string', 'alpha'],
            'lastname' => ['required', 'min:2', 'max:50', 'string', 'alpha']
        ]);

        if ($attributes['username'] != $user->username) {
            $updated['username'] = $attributes['username'];
        }

        if ($attributes['position'] != $user->position) {
            $updated['position'] = $attributes['position'];
        }

        if ($attributes['firstname'] != $user->firstname) {
            $updated['firstname'] = $attributes['firstname'];
        }

        if ($attributes['middlename'] != $user->middlename) {
            $updated['middlename'] = $attributes['middlename'];
        }

        if ($attributes['lastname'] != $user->lastname) {
            $updated['lastname'] = $attributes['lastname'];
        }

        if (count($updated) == 0) {
            return redirect(route('admin.users.index'))->with('success', 'You did not update any field.');
        }

        $user->update($updated);

        return redirect(route('admin.users.index'))->with('success', 'The user details has been updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('admin.users.index'));
    }

}
