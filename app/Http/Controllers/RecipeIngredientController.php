<?php

namespace App\Http\Controllers;

use App\RecipeIngredient;
use Illuminate\Http\Request;
use App\Ingredient;
use Illuminate\Support\Facades\DB;

class RecipeIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipe_ingredients = RecipeIngredient::all();

        return view('/recipe_ingredient', compact('recipe_ingredients')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipe_ingredient.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'recipe_id' => 'required',
            'ingredient_id' => 'required',
            'quantity' => 'required',
            'measure' => 'required'
        ]);

        $recipe_ingredient = new RecipeIngredient();
        $recipe_ingredient->recipe_id = $request-> recipe_id;
        $recipe_ingredient->ingredient_id = $request-> ingredient_id;
        $recipe_ingredient->quantity = $request-> quantity;
        $recipe_ingredient->measure = $request-> measure;

        $recipe_ingredient->save();
     
        $ing_name = Ingredient::where('id', '=', $request->ingredient_id)
        ->value('name_ingredient');

        $response = [
            'ing_name' => $ing_name,
            'quantity' => $request-> quantity,
            'measure' => $request-> measure
        ];


        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function show(RecipeIngredient $recipeIngredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function edit(RecipeIngredient $recipeIngredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecipeIngredient $recipeIngredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecipeIngredient $recipeIngredient)
    {
        $recipeIngredient->delete();
        return redirect('/');
    }

    
}
