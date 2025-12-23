<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse;
use App\Filament\Responses\LogoutResponse as CustomLogoutResponse;
use Illuminate\Support\Facades\Schema; // <--- 1. ADD THIS LINE

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LogoutResponse::class, CustomLogoutResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191); // <--- 2. ADD THIS LINE
    }
}