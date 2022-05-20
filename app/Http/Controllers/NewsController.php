<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Http\Requests\TagRequest;
use App\Models\News;
use App\Services\TagsSynchronizer;
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
        $news = News::whereNotNull('published_at')->latest('published_at')->paginate(5);

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
     * @param  TagRequest $tagRequest
     * @param  TagsSynchronizer $tagsSynchronizer
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $newsRequest, TagRequest $tagRequest, TagsSynchronizer $tagsSynchronizer)
    {
        $news = News::create($newsRequest->validated());

        $tags = $tagRequest->validated()['tags'];

        $tagsSynchronizer->sync($tags, $news);

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
     * @param  TagRequest  $tagRequest
     * @param  TagsSynchronizer  $tagsSynchronizer
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $newsRequest, TagRequest $tagRequest, TagsSynchronizer $tagsSynchronizer, News $news)
    {
        $news->update($newsRequest->validated());

        $tags = $tagRequest->validated()['tags'];

        $tagsSynchronizer->sync($tags, $news);

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
