<?php

namespace App\Models;

use App\Events\NewsCreated;
use App\Events\NewsDeleted;
use App\Events\NewsUpdated;
use App\Models\Contracts\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Cache;

class News extends Model implements HasTags
{
    use HasFactory;

    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => NewsCreated::class,
        'updated' => NewsUpdated::class,
        'deleted' => NewsDeleted::class,
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public static function boot()
    {
        parent::boot();

        self::created(function () {
            Cache::tags(['news'])->flush();
        });

        self::updated(function () {
            Cache::tags(['news'])->flush();
        });

        self::deleted(function () {
            Cache::tags(['news'])->flush();
        });
    }
}
