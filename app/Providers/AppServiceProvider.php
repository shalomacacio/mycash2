<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Correção mysql menor que 5.7
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Correção para Mysql <= 5.6 
        // não precisa no 5.7
         Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
