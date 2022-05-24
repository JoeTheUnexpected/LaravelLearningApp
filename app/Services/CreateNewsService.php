<?php

namespace App\Services;

use App\Http\Requests\NewsRequest;
use App\Http\Requests\TagRequest;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class CreateNewsService
{
    public function __construct(
        private NewsRequest $newsRequest,
        private TagRequest $tagRequest,
        private TagsSynchronizer $tagsSynchronizer
    ) {}
    
    public function create()
    {
        DB::transaction(function () {
            $news = News::create($this->newsRequest->validated());
            $this->tagsSynchronizer->sync($this->tagRequest->validated()['tags'], $news);
            session()->flash('success_message', 'Новость успешно создана');
        });
    }
}