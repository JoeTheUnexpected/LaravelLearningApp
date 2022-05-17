<?php

namespace App\Http\Controllers;

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
        return view('pages.inner.clients');
    }
}
