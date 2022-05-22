<?php

namespace App\Http\Controllers;

use App\Models\Car;

class InnerPagesController extends Controller
{
    public function about()
    {
        return view('pages.inner.about');
    }

    public function contact()
    {
        return view('pages.inner.contact');
    }

    public function sales()
    {
        return view('pages.inner.sales');
    }

    public function financial()
    {
        return view('pages.inner.financial');
    }

    public function clients()
    {
        \Debugbar::disable();

        $cars = Car::with('carBody', 'carClass', 'carEngine')->get();

        return view('pages.inner.clients', compact('cars'));
    }

    public function account()
    {
        return view('pages.inner.account');
    }
}
