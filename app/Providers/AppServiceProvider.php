<?php

namespace App\Providers;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Http::macro('numbersApi', function (): PendingRequest {
            return Http::baseUrl(rtrim(config('services.numbers_api.base_url'),'/'));
        });
    }
}
