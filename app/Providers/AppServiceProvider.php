<?php

namespace App\Providers;

use App\Models\Patients;
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
        //
        View::share('title', 'Patient Admin');

        // View::composer('patients.index', function($view) {
        //     $view->with('patients', Patients::all());
        // });
    }
}
