<?php

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::whereNotNull('published_at')->latest('published_at')->limit(3)->get();

        return view('pages.home.index', compact('news'));
    }
}
