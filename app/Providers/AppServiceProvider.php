<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Ingredient;
use App\RecipeIngredient;
use App\Category;
use App\UserRecipe;
use App\UnityOfMeasurement;
use App\Recipe;
use App\RecipeCategory;

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
     * @return voidi j
     */
    public function boot()
    {   
        //per rendere visibile da tutte le pagine la variabile ingredients
        view()->composer('*',function($view) {
            $view->with('ingredients', Ingredient::all());
            $view->with('recipe_ingredients', RecipeIngredient::all());
            $view->with('categories', Category::all());
            $view->with('user_recipes', UserRecipe::all());
            $view->with('measurements', UnityOfMeasurement::all());
            $view->with('recipes', Recipe::all());
            $view->with('recipe_categories', RecipeCategory::all());

        });
    }
}
