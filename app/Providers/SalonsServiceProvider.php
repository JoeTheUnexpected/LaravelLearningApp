<?php

namespace App\Providers;

use App\Services\SalonsClientService;
use Illuminate\Support\ServiceProvider;

class SalonsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(SalonsClientService::class, function () {
            return new SalonsClientService(config('salons.api.host'), config('salons.api.key'));
        });
    }
}
