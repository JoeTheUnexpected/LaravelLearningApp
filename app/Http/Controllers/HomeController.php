<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\News;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $news = Cache::tags(['news', 'tags'])->remember('latest_news', now()->addHour(), function () {
            return News::with('tags')->whereNotNull('published_at')->latest('published_at')->limit(3)->get();
        });

        $cars = Cache::tags(['cars'])->remember('week_models', now()->addHour(), function () {
            return Car::where('is_new', true)->limit(4)->get();
        });

        return view('pages.home.index', compact('news', 'cars'));
    }
}
