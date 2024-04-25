<?php

namespace App\Providers;

use App\Services\TicketActivityService;
use Illuminate\Support\ServiceProvider;

class TicketActivityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(TicketActivityService::class, function () {
            return new TicketActivityService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
