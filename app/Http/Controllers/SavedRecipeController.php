<?php

namespace App\Http\Controllers;

use Auth;
use App\SavedRecipe;
use Illuminate\Http\Request;
use App\Recipe;
use App\UserRecipe;
use App\Category;
use App\RecipeCategory;
use App\RecipeIngredient;
use App\Ingredient;
use Illuminate\Support\Facades\DB;

class SavedRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $saved_recipes = SavedRecipe::where('user_id', '=', $user_id)->pluck('recipe_id');
        return view('saved_recipe/index', compact('saved_recipes'));
    }

    /**
     * Save the recipe
     *
     * @return \Illuminate\Http\Response
     */
    public function save($id)
    {  
        $user = Auth::user()->id;

        SavedRecipe::create(['user_id' => $user, 'recipe_id' => $id, 'created_at' => time(), 'updated_at' => time()]);

        $recipe = Recipe::find($id);

        $recipe_category = DB::table('recipe_categories')->where('recipe_id', '=', $id)
        ->join('categories', 'categories.id', "=", 'recipe_categories.category_id')
        ->select('name_category')
        ->get();

        //bisogna fare join tra recipe ingredient e ingredient, passando solo gli elementi di recipe ingredient con l'id della ricetta
        //parte ingredienti
        $recipe_ing = DB::table('recipe_ingredients')->where('recipe_id', '=', $id)
        ->join('ingredients', 'ingredients.id', "=", 'recipe_ingredients.ingredient_id')
        ->select('name_ingredient', 'quantity', 'measure')
        ->get();

        return view('/recipe/show', compact('recipe', 'recipe_category', 'recipe_ing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SavedRecipe  $savedRecipe
     * @return \Illuminate\Http\Response
     */
    public function show(SavedRecipe $savedRecipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SavedRecipe  $savedRecipe
     * @return \Illuminate\Http\Response
     */
    public function edit(SavedRecipe $savedRecipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SavedRecipe  $savedRecipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SavedRecipe $savedRecipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SavedRecipe  $savedRecipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(SavedRecipe $savedRecipe)
    {
        //
    }
}
