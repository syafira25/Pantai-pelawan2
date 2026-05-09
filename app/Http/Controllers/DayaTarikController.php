<?php

namespace App\Http\Controllers;

use App\Models\DayaTarik;
use App\Http\Controllers\Admin\AdminDayaTarikController;
use ReflectionClass;

class DayaTarikController extends Controller
{
    public function index()
    {
        $dayaTarik = DayaTarik::first();

        $adminController = new AdminDayaTarikController();
        $reflection = new ReflectionClass($adminController);
        $method = $reflection->getMethod('defaultData');
        $method->setAccessible(true);
        $defaults = $method->invoke($adminController);

        if (!$dayaTarik) {
            $dayaTarik = DayaTarik::create($defaults);
        } else {
            foreach ($defaults as $key => $value) {
                if (
                    is_null($dayaTarik->$key) ||
                    $dayaTarik->$key === '' ||
                    $dayaTarik->$key === 'null'
                ) {
                    $dayaTarik->$key = $value;
                }
            }

            $dayaTarik->save();
        }

        return view('daya_tarik', compact('dayaTarik'));
    }
}