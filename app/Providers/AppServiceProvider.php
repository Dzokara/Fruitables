<?php

namespace App\Providers;

use App\Models\Nav;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        $nav = Nav::all();
        View::share('nav',$nav);
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
