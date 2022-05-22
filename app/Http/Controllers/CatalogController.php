<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CatalogController extends Controller
{
    public function index()
    {
        $cars = Cache::tags(['cars'])->remember('catalog|page=' . request()->get('page', 1), now()->addHour(), function () {
            return Car::paginate(16);
        });

        return view('pages.catalog.index', compact('cars'));
    }

    public function show(string|int $routeKey)
    {
        $car = Cache::tags(['cars'])->remember("car|key=$routeKey", now()->addHour(), function () use ($routeKey) {
            return Car::with('carBody', 'carClass', 'carEngine', 'category')->where(Car::make()->getRouteKeyName(), $routeKey)->firstOrFail();
        });

        return view('pages.catalog.show', compact('car'));
    }

    public function category(string|int $categoryKey)
    {
        $cars = Cache::tags(['cars'])->remember("cars|category=$categoryKey|page=" . request()->get('page', 1), now()->addHour(), function() use ($categoryKey) {
            $category = Category::where(Category::make()->getRouteKeyName(), $categoryKey)->firstOrFail();
            $categoryIds = Category::descendantsAndSelf($category)->pluck('id')->toArray();
            return Car::whereIn('category_id', $categoryIds)->paginate(16);
        });

        return view('pages.catalog.index', compact('cars'));
    }
}
