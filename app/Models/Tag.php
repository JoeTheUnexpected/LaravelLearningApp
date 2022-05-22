<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function news()
    {
        return $this->morphedByMany(News::class, 'taggable');
    }

    public static function boot()
    {
        parent::boot();

        self::created(function () {
            Cache::tags(['tags'])->flush();
        });

        self::updated(function () {
            Cache::tags(['tags'])->flush();
        });

        self::deleted(function () {
            Cache::tags(['tags'])->flush();
        });
    }
}
