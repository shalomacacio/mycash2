<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ProdutoProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('money', function( $attribute, $value , $parameters , $validator){

            if($value < 0){
                return $value == 0;
            }
            

        });


        Validator::replacer( 'money', function( $message, $attribute , $rule , $parameters){
            return 'Nao permite valor negativo';
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
