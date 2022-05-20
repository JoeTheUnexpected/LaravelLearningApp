<?php

namespace App\Services;

use App\Models\Contracts\HasTags;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    public function sync(Collection $tags, HasTags $model)
    {
        $syncIds = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $syncIds[] = $tag->id;
        }

        $model->tags()->sync($syncIds);
    }
}