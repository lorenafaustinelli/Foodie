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

        return redirect()->back();
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
    public function destroy(Request $request)
    {        
        $id = $request->id;
    
        SavedRecipe::where('recipe_id', $id)->where('user_id', Auth::id())->delete();;

        return redirect()->back();
    }
}
