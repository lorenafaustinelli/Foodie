<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    //prendo dal database le ricette scritte fin'ora, ordinate dall'ultima 
    $recipes = App\Recipe::latest()->get();

    return view('home', [
        'recipes' => $recipes   //passo le ricette alla view
    ]);
});
//Route::resource('recipe', 'RecipeController');

//Prove Lisa
Route::get('/recipe/create', 'RecipeController@create');
//Route::post('/recipe', 'RecipeController@store');
Route::post('/recipe/store', 'RecipeController@store');
//Route::get('/recipe/store', 'RecipeController@store');



//Prove Lorena
Route::post('/recipe_category/store', 'RecipeCategoryController@store');
Route::get('/recipe_category/store', 'RecipeCategoryController@store'); 

//RecipeIngredient
Route::get('/recipe_ingredient', 'RecipeIngredientController@index');
Route::post('/recipe_ingredient/store', 'RecipeIngredientController@store')->name('recipe_ingredient.add');
//Route::get('/recipe_ingredient/store', 'RecipeIngredientController@store');
Route::get('/recipe_ingredient/create', 'RecipeIngredientController@create');

//Ingredient
//Route::get('/recipe_ingredient/create', 'IngredientController@index');
Route::get('/ingredients', 'IngredientController@index');

//RecipeCategory
Route::get('/recipe_category/create', 'RecipeCategoryController@create')->name('recipe_category.create');
Route::post('/recipe_category/create', 'RecipeCategoryController@store')->name('recipe_category.add');

//UserRecipe
Route::get('user_recipe/index', 'UserRecipeController@index')->name('user.recipe');

