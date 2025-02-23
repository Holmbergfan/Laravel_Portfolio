<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Visa inloggningssida
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Hantera inloggning
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Försök logga in med web-guard (session)
        if (Auth::attempt($credentials)) {
            // Om lyckad inloggning -> gå till projektlistan
            return redirect()->intended('/admin/projects');
        }

        // Annars, tillbaka med felmeddelande
        return redirect('login')->with('error', 'Invalid credentials');
    }

    // Logga ut
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
