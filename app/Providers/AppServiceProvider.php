<?php

namespace Realmessenger\Providers;

use Illuminate\Support\ServiceProvider;

use Realmessenger\Message;
use Realmessenger\Observers\MessageObserver;

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
        Message::observe(MessageObserver::class);
    }
}
