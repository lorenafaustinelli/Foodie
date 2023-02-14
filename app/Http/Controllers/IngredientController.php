<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\RecipeIngredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::orderBy('name_ingredient')->get();

        return view('/ingredient/index', compact('ingredients'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/ingredient/create');
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
            'name_ingredient' => 'required'
        ]); 

        $ingredient = new Ingredient();
        $ingredient->name_ingredient = request('name_ingredient');

        if($request->variation){
            $ingredient->variation = request('variation');
        }

        $ingredient->save();

        $ingredients = Ingredient::orderBy('name_ingredient')->get();
        
        return view('/ingredient/index', compact('ingredients'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredient = Ingredient::find($id);
        return view('/ingredient/edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all(); 
        $ingredient = Ingredient::find($id);
        $ingredient->update($input);

        $ingredients = Ingredient::orderBy('name_ingredient')->get();
        return view('/admin/ingredient_index', compact('ingredients'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredient = Ingredient::find($id);

        //parte recipe_ingredients
        RecipeIngredient::where('ingredient_id', $id); 

        //parte ingredient
        $ingredient->delete();

        $ingredients = Ingredient::orderBy('name_ingredient')->get();
        return view('/admin/ingredient_index', compact('ingredients'));
        
    }

    /**
     * Dato un id come parametro restituisce il nome dell'ingrediente corrispondente
     *
     * @return \Illuminate\Http\Response
     */
    public function name_ingredient($id)
    {
        $ingredient = Ingredient::find($id);
        return $ingredient->name_ingredient;
    }

    
}
