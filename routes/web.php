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

//Route::get('/home', 'HomeController@index')->name('home');  //assegnazione del nome - Route(home)
Route::get('/home', function () {
    //prendo dal database le ricette scritte fin'ora, ordinate dall'ultima 
    $recipes = App\Recipe::latest()->get();

    return view('home', [
        'recipes' => $recipes   //passo le ricette alla view
    ]);
})->name('home');

Route::get('/userPage', function(){
    $recipes = App\Recipe::all();

    return view('userPage', [
        'recipes' => $recipes
    ]);
})->name('userPage');

//Prove Lisa
Route::get('/recipe/create', 'RecipeController@create')->name('recipe.create');
//Route::post('/recipe', 'RecipeController@store');
Route::post('/recipe/store', 'RecipeController@store');
//Route::get('/recipe/store', 'RecipeController@store');

//Prove Lorena
Route::get('/recipe/show/{id}', 'RecipeController@show')->name('recipe.show');

//RecipeIngredient
Route::get('/recipe_ingredient', 'RecipeIngredientController@index');
Route::post('/recipe_ingredient/store', 'RecipeIngredientController@store')->name('recipe_ingredient.add');
Route::get('/recipe_ingredient/create', 'RecipeIngredientController@create');

//Ingredient
Route::get('/ingredient/create', 'IngredientController@create')->name('add.ingredient');
Route::get('/ingredient/index', 'IngredientController@index')->name('ingredients');
Route::post('/ingredient/store', 'IngredientController@store');

//Category
Route::get('/category/create', 'CategoryController@create');
Route::get('/category/index', 'CategoryController@index');
Route::post('/category/store', 'CategoryController@store');

//RecipeCategory
Route::get('/recipe_category/create', 'RecipeCategoryController@create')->name('recipe_category.create');
Route::post('/recipe_category/create', 'RecipeCategoryController@store')->name('recipe_category.add');
Route::post('/recipe_category/store', 'RecipeCategoryController@store');

//UserRecipe
Route::get('/user_recipe/index', 'UserRecipeController@index')->name('user.recipe');

//Research
Route::view('/research/advanced_search', '/research/advanced_search')->name('advanced.search');
Route::get('search', 'RecipeController@search_recipe'); 
Route::get('/advanced_search', 'RecipeController@advanced_search');
Route::view('research/results', '/research/results')->name('research.results');

