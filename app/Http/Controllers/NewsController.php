<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::whereNotNull('published_at')->latest('published_at')->get();

        return view('pages.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NewsRequest  $newsRequest
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $newsRequest)
    {
        News::create($newsRequest->validated());

        session()->flash('success_message', 'Новость успешно создана');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('pages.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('pages.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NewsRequest  $newsRequest
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $newsRequest, News $news)
    {
        $news->update($newsRequest->validated());

        session()->flash('success_message', 'Новость успешно отредактирована');

        return redirect()->route('news.edit', $news);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        session()->flash('success_message', 'Новость успешно удалена');

        return redirect()->route('news.index');
    }
}
