<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show register/create form
    public function create()
    {
        return view('users.register');
    }

    // create new users
    public function store(Request $request)
    {
        $formfields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        // Hash password
        $formfields['password'] = bcrypt($formfields['password']);

        // creates user
        $user = User::create($formfields);

        // login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in.');
    }
    // logout users
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out.');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($formfields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are logged in');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }
}
