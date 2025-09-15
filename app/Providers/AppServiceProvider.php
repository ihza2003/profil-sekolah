<?php

namespace App\Providers;

use App\Models\Medsos;
use App\Models\Profil;
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
        View::composer('*', function ($view) {
            $view->with('medsos', Medsos::with('admin')->first());
        });

        View::composer('*', function ($view) {
            $view->with('profil', Profil::with('admin')->first());
        });
    }
}
