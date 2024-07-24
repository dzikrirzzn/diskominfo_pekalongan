<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\NavItem;
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
    public function boot()
    {
        Carbon::setLocale('id'); // Ubah sesuai dengan lokal yang diinginkan, misalnya 'id' untuk Bahasa Indonesia
        View::composer('layouts.navbarhome', function ($view) {
            $view->with('navItems', NavItem::all());
        });
    }

}