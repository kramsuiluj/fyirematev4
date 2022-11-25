<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(): Factory|View|Application
    {
        return view('index');
    }

    public function store(): Redirector|Application|RedirectResponse
    {
        $credentials = request()->validate([
            'username' => ['required', 'min:5', 'max:255', 'alpha_num', Rule::exists('users', 'username')],
            'password' => ['required', Password::min(8)]
        ]);

        if (!auth()->attempt($credentials, request('remember'))) {
            throw ValidationException::withMessages([
                'username' => 'Username or password you entered must\'ve been incorrect.'
            ]);
        }

        session()->regenerate();

        if (auth()->user()->is_admin) {
            activity('login')->log(auth()->user()->fullname() . ' has logged in.');

            return redirect(route('dashboard'))->with('success', 'Welcome ' . ucwords($credentials['username']) . '!');
        }

        activity('login')->log(auth()->user()->fullname() . ' has logged in.');

        return redirect(route('users.dashboard'))->with('success', 'Welcome ' . ucwords($credentials['username']) . '!');

    }

    public function destroy(): Redirector|Application|RedirectResponse
    {
        activity('logout')->log(auth()->user()->fullname() . ' has logged out.');

        auth()->logout();

        return redirect(route('sessions.create'))->with('success', 'You have successfully logged out.');
    }
}
