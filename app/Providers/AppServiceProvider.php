<?php

namespace App\Providers;

use App\Events\NewBookSubscribed;
use App\Listeners\SendSlackNotification;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $listen = [
            NewBookSubscribed::class => [
                SendSlackNotification::class,
            ],


        ];
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
