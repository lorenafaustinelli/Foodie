<?php

namespace App\Http\Controllers;
use App\RecipeCategory;
use App\Category;
use App\Recipe;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recipe = Recipe::orderBy('recipes.created_at', 'desc')->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
        ->get();

        return view('home', compact('recipe'));
    }
}
