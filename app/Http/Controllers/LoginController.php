<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\UserProvider;

class LoginController extends Controller
{
    public function show()
    {
        return view('pages.login');
    }

    public function authenticat(Request $request)
    {
        $credentials = $request->validate([
            'id' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        } elseif (Auth::guard('dosen')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dosen');
        } elseif (Auth::guard('mahasiswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }



        // if (Auth::attempt($credentials))
        // {
        //     if (Auth::user()->role == 'mahasiswa')
        //     {
        //         $request->session()->regenerate();
        //         return redirect()->intended('/mahasiswa');
        //     } elseif (Auth::user()->role == 'dosen')
        //     {
        //         $request->session()->regenerate();
        //         return redirect()->intended('/dosen');
        //     } else 
        //     {
        //         $request->session()->regenerate();
        //         return redirect()->intended('/admin');
        //     }
        // }

        return back()->with('loginError', 'Login Gagal,');
    }

    public function logout(Request $request)
    {

        if (Auth::guard('admin')->check()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        } elseif (Auth::guard('dosen')->check()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        } elseif (Auth::guard('mahasiswa')->check()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        // return redirect('/login');
    }
}
