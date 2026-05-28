<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            Alert::toast('Kamu berhasil Login', 'success');
            return redirect()->intended('/dashboard');
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Email atau password tidak sesuai.',
            ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::toast('Kamu berhasil Logout', 'success');
        return redirect('/admin');
    }
}
