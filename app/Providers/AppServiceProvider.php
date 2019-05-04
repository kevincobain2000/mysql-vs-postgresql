<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Support\QueryLogger;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(QueryLogger::class, function (Container $app) {
            return new QueryLogger($app);
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
