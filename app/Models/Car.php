<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Car extends Model
{
    use HasFactory;

    public function carBody()
    {
        return $this->belongsTo(CarBody::class);
    }

    public function carClass()
    {
        return $this->belongsTo(CarClass::class);
    }

    public function carEngine()
    {
        return $this->belongsTo(CarEngine::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function boot()
    {
        parent::boot();

        self::created(function () {
            Cache::tags(['cars'])->flush();
        });

        self::updated(function () {
            Cache::tags(['cars'])->flush();
        });

        self::deleted(function () {
            Cache::tags(['cars'])->flush();
        });
    }
}
