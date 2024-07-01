<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.test');
    }

    public function mahasiswa()
    {
        return view('pages.mahasiswa');
    }

    public function dosen()
    {
        return view('pages.dosen');
    }

    public function welcome()
    {
        return view('welcome');
    }
}
