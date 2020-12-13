<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;
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
        # 쿼리 로그
        if (env('SQL_LOG_USE', false)) {
            Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
                Log::info([
                               'sql' => $query->sql,
                               'bindings' => $query->bindings,
                               'time' => $query->time,
                           ]);
            });
        }
    }
}
