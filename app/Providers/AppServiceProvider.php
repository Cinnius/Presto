<?php

namespace App\Providers;

use App\Models\Category;
use Laravel\Fortify\Fortify;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::loginView(function () {
            return view('auth.login');
        }); 

        if (Schema::hasTable('categories')){
            View::share('categories', Category::all());
        }

        if (Schema::hasTable('announcements')){
            View::share('announcements', Category::all());
        }

        Paginator::useBootstrap();
    }
}
