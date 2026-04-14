<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

        public function profilPantai()
    {
        return view('profil');
    }
}