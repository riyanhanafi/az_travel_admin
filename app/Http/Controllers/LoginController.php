<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Hardcoded credentials
        $validUsername = 'admin';
        $validPassword = '123';

        if ($username === $validUsername && $password === $validPassword) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}
