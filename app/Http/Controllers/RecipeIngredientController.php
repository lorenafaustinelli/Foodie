<?php

namespace App\Http\Controllers;

use App\RecipeIngredient;
use App\Recipe;
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

    //funzione per modificare la quantità degli ingredienti nella visualizzazione della ricetta
    public function change_quantity(Request $request){

        $portion = $request->portion;
        $recipe_ing = json_decode($request->recipe_ing);

        //scorro recipe_ing per salvarmi le quantità degli ingredienti
        foreach($recipe_ing as $rp){
            $name_ingredient = $rp -> name_ingredient;
            $quantity[] = $rp -> quantity;
            $measure = $rp -> measure;
            $recipe_id = $rp -> recipe_id;
            
        }
        //prendo dal db la quantità orifinale delle porzioni per poter effettuare i calcoli
        $portion_or = Recipe::where('id', $recipe_id)
        ->select('portion')
        ->first(); 
        
        //essendo che portion_or è un oggetto con dentro un valore uso intval per estrarlo
        $portion_o = intval($portion_or->portion);

        //calcolo le quantità per la porzione richiesta dall'utente
        foreach($quantity as $q){
            $qu[] = ceil(($q / $portion_o) * $portion);
        }

        //cambio i valori delle quantità nell'array originale
        $i = 0;
        foreach($recipe_ing as $rp){
            $rp->quantity = $qu[$i];
            $i = $i + 1;
        }

        $recipe_ing = json_encode($recipe_ing);
        //$response = [
            //'portion' => $request->portion,
            //'recipe_ing' => $recipe_ing,
        //];
        
        return response()->json($recipe_ing);

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
    public function edit($id)
    {   
        $recipe_ingredient = RecipeIngredient::where('recipe_id', $id)->get();
        return view('recipe_ingredient.edit', compact('recipe_ingredient'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //$input = $request -> all(); 
        //$recipe_ingredient = RecipeIngredient::find($request->recipe_id);
        //$recipe_ingredient->update($input);

        $recipe_id = $request->recipe_id;

        $recipe_ingredient = RecipeIngredient::where('recipe_id', $recipe_id)->get();
        //$recipe_ingr = json_decode($request->recipe_ing);

        //$id = $recipe_ingredient->recipe_id;
     
        /*$recipe_ing = RecipeIngredient::where('recipe_id', $request-> recipe_id);

        foreach($recipe_ing as $ri){
            $ing_id[] = $ri->ingredient_id;
        }

        foreach($ing_id as $ing_id){
            $ing_names[] = app('App\Http\Controllers\IngredientController')->name_ingredient($ing_id);
        }

        $i = 0;
        foreach($recipe_ing as $ri){
            $ri->ingredient_name = $ing_names[$i];
            $i = $i + 1;
        }
        */
        //return view('/recipe_ingredient/edit', compact('recipe_ing'))->with('id', $id);
        //$response = [
          //  'ok' => "ok"
        //];

        $recipe_ing = json_encode($recipe_ingredient);
        
        return response()->json($recipe_ing);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe_ingredient = RecipeIngredient::find($id);
        $recipe_ingredient->delete();
        
        return redirect()->back();
    }

    
}
