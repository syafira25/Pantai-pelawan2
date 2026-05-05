<?php

namespace App\Http\Controllers;

use App\Models\ProfilPantai;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = ProfilPantai::first();

        return view('profil', compact('profil'));
    }
}