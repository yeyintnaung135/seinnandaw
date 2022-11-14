<?php

namespace App\Providers;

use App\Categories;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        //
        $catlist=Categories::where('name','!=','all')->get();
        View::share('catlist', $catlist);
        //for chat
        Schema::defaultStringLength(191);

    }
}
