<?php

namespace App\Providers;

use App\Models\Sentence;
use App\Observers\SentenceObserver;
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
        Sentence::observe(SentenceObserver::class);
    }
}
