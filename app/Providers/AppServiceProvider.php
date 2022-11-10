<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Ingredient;
use App\RecipeIngredient;

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

        //per rendere visibile da tutte le pagine la variabile ingredients
        view()->composer('*',function($view) {
            $view->with('ingredients', Ingredient::all());
            $view->with('recipe_ingredients', RecipeIngredient::all());
        });
    }
}
