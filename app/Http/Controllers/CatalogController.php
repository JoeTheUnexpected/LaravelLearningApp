<?php

namespace App\Http\Controllers;

use App\Models\Car;

class CatalogController extends Controller
{
    public function index()
    {
        $cars = Car::get();

        return view('pages.catalog.index', compact('cars'));
    }

    public function show(Car $car)
    {
        return view('pages.catalog.show', compact('car'));
    }
}
