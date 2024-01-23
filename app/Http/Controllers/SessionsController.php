<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create()
    {
        return view("sessions.create");
    }


    public function store(Request $request)
    {
        $attribute = request()->validate([
            'email' => 'required|email',
            'password' => 'required|'
        ]);

        if (! auth()->attempt($attribute)) {

            throw ValidationException::withMessages([
                'email' => 'Your credentials could not be verified'
            ]);

        }

        session()->regenerate();
        return redirect('/')->with('success', 'Welcome Back!');



        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Your credentials could not be verified']);
    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye !');
    }
}
