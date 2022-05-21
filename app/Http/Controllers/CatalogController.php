<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;

class CatalogController extends Controller
{
    public function index()
    {
        $cars = Car::paginate(16);

        return view('pages.catalog.index', compact('cars'));
    }

    public function show(Car $car)
    {
        return view('pages.catalog.show', compact('car'));
    }

    public function category(Category $category)
    {
        $categoryIds = Category::descendantsAndSelf($category)->pluck('id')->toArray();
        $cars = Car::whereIn('category_id', $categoryIds)->paginate(16);

        return view('pages.catalog.index', compact('cars'));
    }
}
