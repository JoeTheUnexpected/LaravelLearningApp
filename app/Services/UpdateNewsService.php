<?php

namespace App\Services;

use App\Http\Requests\NewsRequest;
use App\Http\Requests\TagRequest;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class UpdateNewsService
{
    public function __construct(
        private NewsRequest $newsRequest,
        private TagRequest $tagRequest,
        private TagsSynchronizer $tagsSynchronizer
    ) {}

    public function update(News $news)
    {
        DB::transaction(function () use ($news) {
            $news->update($this->newsRequest->validated());
            $this->tagsSynchronizer->sync($this->tagRequest->validated()['tags'], $news);
            session()->flash('success_message', 'Новость успешно отредактирована');
        });
    }
}