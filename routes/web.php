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
        
    Route::get('/home', 'HomeController@index')->name('home');  //assegnazione del nome - Route(home)
    // Route::get('/home', function () {
    //     //prendo dal database le ricette scritte fin'ora, ordinate dall'ultima 
    //     $recipes = App\Recipe::latest()->get();

    //     return view('home', [
    //         'recipes' => $recipes   //passo le ricette alla view
    //     ]);
    // })->name('home');


    //SavedRecipe
    Route::get('/saved_recipe/index', 'SavedRecipeController@index')->name('saved.index');
    Route::get('/saved_recipe/save/{id}', 'SavedRecipeController@save')->name('recipe.save');
    Route::get('/saved_recipe/destroy/{id}', 'SavedRecipeController@destroy')->name('recipe.destroy');

    //User
    Route::get('/user/index', 'UserController@index')->name('user.index')->middleware('admin');
    Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.delete');
    Route::get('/user/userPage', 'UserController@show')->name('user.show'); 
    Route::post('/user/upPic', 'UserController@update')->name('user.update');

    //Recipe
    Route::get('/recipe/create', 'RecipeController@create')->name('recipe.create');
    Route::post('/recipe/store', 'RecipeController@store')->name('recipe.store');
    Route::get('/recipe/index', 'RecipeController@index')->name('recipes.index');
    Route::get('/recipe/show/{id}', 'RecipeController@show')->name('recipe.show');
    Route::get('/recipe_destroy/{id}', 'RecipeController@destroy')->name('recipe.delete');
    Route::get('/recipe_destroy2/{id}', 'RecipeController@destroy2')->name('recipe.delete2');
    Route::get('/recipe/edit/{id}', 'RecipeController@edit')->name('recipe.edit');
    Route::post('/recipe/update/{id}', 'RecipeController@update')->name('recipe.update');
    
    //RecipeIngredient
    Route::get('/recipe_ingredient', 'RecipeIngredientController@index');
    Route::post('/recipe_ingredient/store', 'RecipeIngredientController@store')->name('recipe_ingredient.add');
    Route::post('/recipe_ingredient/store_u', 'RecipeIngredientController@store_u')->name('recipe_ingredient.add_u');
    Route::get('/recipe_ingredient/create/{id}', 'RecipeIngredientController@create')->name('recipe_ingredient.create');
    Route::get('/recipe_ingredient/destroy/{id}', 'RecipeIngredientController@destroy')->name('recipe_ingredient.delete');
    Route::get('/recipe_ingredient/destroy_u/{id}', 'RecipeIngredientController@destroy_u')->name('recipe_ingredient.delete_u');
    Route::get('/recipe_ingredient/edit/{id}', 'RecipeIngredientController@edit')->name('recipe_ingredient.edit');
    Route::post('/recipe_ingredient/update/{id}', 'RecipeIngredientController@update')->name('recipe_ingredient.update');
    Route::post('/recipe_ingredient/change_quantity', 'RecipeIngredientController@change_quantity')->name('recipe_ingredient.change.quantity');
    Route::get('/recipe_ingredient/single_edit/{id}', 'RecipeIngredientController@single_edit')->name('recipe_ingredient.single_edit');
    Route::post('/recipe_ingredient/update_first/{id}', 'RecipeIngredientController@update_first')->name('recipe_ingredient.update_first');
    Route::get('/recipe_ingredient/single_edit_first/{id}', 'RecipeIngredientController@single_edit_first')->name('recipe_ingredient.single_edit_first');


    //Ingredient
    Route::get('/ingredient/create', 'IngredientController@create')->name('add.ingredient');
    Route::get('/ingredient/index', 'IngredientController@index')->name('ingredients');
    Route::post('/ingredient/store', 'IngredientController@store');
    Route::get('/ingredient/destroy/{id}', 'IngredientController@destroy')->name('ingredient.delete')->middleware('admin');
    Route::get('/ingredient/edit/{id}', 'IngredientController@edit')->name('ingredient.edit')->middleware('admin');
    Route::post('/ingredient/update/{id}', 'IngredientController@update')->name('ingredient.update')->middleware('admin');


    //Category
    Route::get('/category/create', 'CategoryController@create')->name('add.category');
    Route::get('/category/index', 'CategoryController@index')->name('categories');
    Route::post('/category/store', 'CategoryController@store');
    Route::get('/category/destroy/{id}', 'CategoryController@destroy')->name('category.delete')->middleware('admin');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit')->middleware('admin');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update')->middleware('admin');
    Route::get('/category/show/{id}', 'CategoryController@show')->name('category.show');


    //RecipeCategory
    Route::get('/recipe_category/create/{id}', 'RecipeCategoryController@create')->name('recipe_category.create');
    Route::get('/recipe_category/edit/{id}', 'RecipeCategoryController@edit')->name('recipe_category.edit');
    Route::post('/recipe_category/update/{id}', 'RecipeCategoryController@update')->name('recipe_category.update');
    Route::post('/recipe_category/store', 'RecipeCategoryController@store')->name('recipe_category.add');

    //UserRecipe
    Route::get('/user_recipe/index', 'UserRecipeController@index')->name('user.recipe');
    Route::get('/user_recipe/filter_index', 'UserRecipeController@filter_index')->name('user_recipe.filter_index');

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

    //Ticket
    Route::post('/ticket/store', 'TicketController@store')->name('ticket.store');
    Route::get('/user/ticket', 'TicketController@index')->name('ticket.index');
    Route::get('/admin/ticket', 'TicketController@admin_index')->name('ticket_index.adm');
    Route::get('/ticket/{id}/status', 'TicketController@change_status')->name('ticket.status'); //versione old da non usare
    Route::post('/ticket/{id}/update', 'TicketController@update')->name('ticket.update');
    Route::get('/admin/close_ticket', 'TicketController@close_tickets')->name('close.tickets');
    





});
