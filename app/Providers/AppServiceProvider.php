<?php

namespace App\Providers;

use App\Core\HumanoIDGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('HumanoIDGenerator', function ($app) {
            return new HumanoIDGenerator($app->make(HumanoIDGenerator::class));
        });
    }
}
