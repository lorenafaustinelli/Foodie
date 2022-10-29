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
//Route::resource('recipe', 'RecipeController');

//Prove Lisa
Route::get('/recipe/create', 'RecipeController@create');
//Route::post('/recipe', 'RecipeController@store');
Route::post('/recipe/store', 'RecipeController@store');



//Prove Lorena
Route::post('/recipe_ingredient/store', 'RecipeIngredientController@store');
Route::get('/recipe_ingredient/create', 'RecipeIngredientController@create');
Route::post('/recipe_category/store', 'RecipeCategoryController@store');
Route::get('/recipe_category/store', 'RecipeCategoryController@store');
