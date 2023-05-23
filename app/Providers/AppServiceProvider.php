<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\KendaraanRepository;
use App\Services\KendaraanService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(KendaraanRepository::class, function ($app) {
            return new KendaraanRepository();
        });

        $this->app->bind(KendaraanService::class, function ($app) {
            return new KendaraanService($app->make(KendaraanRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
