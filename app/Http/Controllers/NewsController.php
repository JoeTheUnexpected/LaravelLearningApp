<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\CreateNewsService;
use App\Services\UpdateNewsService;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Cache::tags(['news', 'tags'])->remember('news|page=' . request()->get('page', 1) . ((auth()->check() && auth()->user()->isAdmin()) ? '|admin' : ''), now()->addHour(), function () {
            return News::when(!(auth()->check() && auth()->user()->isAdmin()), function ($query) {
                    $query->whereNotNull('published_at');
                })->with('tags')->latest('published_at')->paginate(5);
        });

        return view('pages.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', News::class);

        return view('pages.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateNewsService  $createNewsService
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsService $createNewsService)
    {
        $this->authorize('create', News::class);

        $createNewsService->create();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  string|int  $routeKey
     * @return \Illuminate\Http\Response
     */
    public function show(string|int $routeKey)
    {
        $news = Cache::tags(['news', 'tags'])->remember("news|key=$routeKey", now()->addHour(), function () use ($routeKey) {
            return News::when(!(auth()->check() && auth()->user()->isAdmin()), function ($query) {
                    $query->whereNotNull('published_at');
                })->where(News::make()->getRouteKeyName(), $routeKey)->with('tags')->firstOrFail();
        });

        return view('pages.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string|int  $routeKey
     * @return \Illuminate\Http\Response
     */
    public function edit(string|int $routeKey)
    {
        $news = Cache::tags(['news', 'tags'])->remember("news|key=$routeKey", now()->addHour(), function () use ($routeKey) {
            return News::when(!(auth()->check() && auth()->user()->isAdmin()), function ($query) {
                    $query->whereNotNull('published_at');
                })->where(News::make()->getRouteKeyName(), $routeKey)->with('tags')->firstOrFail();
        });

        $this->authorize('update', $news);

        return view('pages.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateNewsService  $updateNewsService
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsService $updateNewsService, News $news)
    {
        $this->authorize('update', $news);

        $updateNewsService->update($news);

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
        $this->authorize('delete', $news);

        $news->delete();

        session()->flash('success_message', 'Новость успешно удалена');

        return redirect()->route('news.index');
    }
}
