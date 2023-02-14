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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['user']], function(){
        
    //Route::get('/home', 'HomeController@index')->name('home');  //assegnazione del nome - Route(home)
    Route::get('/home', function () {
        //prendo dal database le ricette scritte fin'ora, ordinate dall'ultima 
        $recipes = App\Recipe::latest()->get();

        return view('home', [
            'recipes' => $recipes   //passo le ricette alla view
        ]);
    })->name('home');

    //Prove drag and drop
    Route::get('/user/userPage', 'UserController@show')->name('user.show'); 
    Route::post('/user/upPic', 'UserController@update')->name('user.update');

    //SavedRecipe
    Route::get('/saved_recipe/index', 'SavedRecipeController@index')->name('saved.index');
    Route::get('/saved_recipe/save/{id}', 'SavedRecipeController@save')->name('recipe.save');
    Route::get('/saved_recipe/destroy/{id}', 'SavedRecipeController@destroy')->name('recipe.destroy');

    //User

    Route::get('/user/index', 'UserController@index')->name('user.index')->middleware('admin');
    Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.delete');

    //Recipe
    Route::get('/recipe/create', 'RecipeController@create')->name('recipe.create');
    Route::post('/recipe/store', 'RecipeController@store')->name('recipe.store');
    Route::get('/recipe/index', 'RecipeController@index')->name('recipes.index');
    Route::get('/recipe/show/{id}', 'RecipeController@show')->name('recipe.show');
    Route::get('/recipe_destroy/{id}', 'RecipeController@destroy')->name('recipe.delete');
    Route::get('/recipe/edit/{id}', 'RecipeController@edit')->name('recipe.edit');
    Route::post('/recipe/update', 'RecipeController@update')->name('recipe.update');
    
    //RecipeIngredient
    Route::get('/recipe_ingredient', 'RecipeIngredientController@index');
    Route::post('/recipe_ingredient/store', 'RecipeIngredientController@store')->name('recipe_ingredient.add');
    Route::get('/recipe_ingredient/create', 'RecipeIngredientController@create');
    Route::post('/recipe_ingredient/change_quantity', 'RecipeIngredientController@change_quantity')->name('recipe_ingredient.change.quantity');

    //Ingredient
    Route::get('/ingredient/create', 'IngredientController@create')->name('add.ingredient');
    Route::get('/ingredient/index', 'IngredientController@index')->name('ingredients');
    Route::post('/ingredient/store', 'IngredientController@store');
    Route::get('/ingredient/destroy/{id}', 'IngredientController@destroy')->name('ingredient.delete')->middleware('admin');

    //Category
    Route::get('/category/create', 'CategoryController@create')->name('add.category');
    Route::get('/category/index', 'CategoryController@index')->name('categories');
    Route::post('/category/store', 'CategoryController@store');
    Route::get('/category/destroy/{id}', 'CategoryController@destroy')->name('category.delete')->middleware('admin');

    //RecipeCategory
    Route::get('/recipe_category/create', 'RecipeCategoryController@create')->name('recipe_category.create');
    Route::post('/recipe_category/store', 'RecipeCategoryController@store');

    //UserRecipe
    Route::get('/user_recipe/index', 'UserRecipeController@index')->name('user.recipe');

    //Research
    Route::view('/research/advanced_search', '/research/advanced_search')->name('advanced.search');
    Route::get('search', 'RecipeController@search_recipe'); 
    Route::get('/advanced_search', 'RecipeController@advanced_search');
    Route::view('research/results', '/research/results')->name('research.results');

    //Admin 
    Route::view('/permission_denied', '/permission_denied')->name('permission_denied');
    Route::get('/admin/recipe_index', 'AdminController@recipe_index_admin')->name('recipe_index.adm')->middleware('admin');
    Route::get('/admin/ingredient_index', 'AdminController@ingredient_index_admin')->name('ingredient_index.adm')->middleware('admin');
    Route::get('/admin/category_index', 'AdminController@category_index_admin')->name('category_index.adm')->middleware('admin');



});
