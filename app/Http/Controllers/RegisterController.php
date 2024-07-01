<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    //Untuk mengarahkan dihalaman Register 
    public function show()
    {
        return view('pages.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = Login::create($request->validate());
        auth()->login($user);
        return redirect('/')->with('success', "Akun berhasil di buat!!");
    }
}
