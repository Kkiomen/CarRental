<?php

namespace App\Http\Controllers;

use App\Models\CarModel;

class MainController extends Controller
{
    public function index()
    {
        $cars = CarModel::get();
        return view('index', [
            'cars' => $cars
        ]);
    }
}
