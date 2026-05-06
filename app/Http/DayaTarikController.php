<?php

namespace App\Http\Controllers;

use App\Models\DayaTarik;

class DayaTarikController extends Controller
{
    public function index()
    {
        $dayaTarik = DayaTarik::first();

        return view('daya_tarik', compact('dayaTarik'));
    }
}