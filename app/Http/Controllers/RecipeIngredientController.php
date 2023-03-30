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
    public function create($id)
    {   
        $recipe_ingredient = RecipeIngredient::where('recipe_id', $id)->get();
        $recipe = Recipe::find($id);

        if($recipe_ingredient->isEmpty()){

            return view('/recipe_ingredient/create', compact('recipe_ingredient', 'recipe'))->with('id', $id);

        }else{

            foreach($recipe_ingredient  as $ri){
                $ing_id[] = $ri->ingredient_id;
            }

            foreach($ing_id as $ing_id){
                $ing_names[] = app('App\Http\Controllers\IngredientController')->name_ingredient($ing_id);
            }

            $i = 0;
            foreach($recipe_ingredient as $ri){
                $ri->ingredient_name = $ing_names[$i];
                $i = $i + 1;
            }

            return view('/recipe_ingredient/create', compact('recipe_ingredient', 'recipe'))->with('id', $id);
        }    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_u(Request $request)
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

        $recipe_id = $recipe_ingredient->recipe_id;
        $recipe = Recipe::find($recipe_id);
     
        $recipe_ingredient = RecipeIngredient::where('recipe_id', $recipe_id)->get();

        
        
        //return view('/home', compact('recipe_ingredient'))->with('id', $recipe_id);
        return redirect()->route('recipe_ingredient.edit', $recipe_id)->with('recipe', $recipe);
        //return redirect()->back();

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

        $recipe_id = $recipe_ingredient->recipe_id;       
        
        //return view('/home', compact('recipe_ingredient'))->with('id', $recipe_id);
        return redirect()->route('recipe_ingredient.create', $recipe_id)->with('id', $recipe_id);
        //return redirect()->back();

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
        //$id = id della ricetta non del recipe_ingredient
        $recipe_ingredient = RecipeIngredient::where('recipe_id', $id)->get();
        $recipe = Recipe::find($id); 

        if($recipe_ingredient->isEmpty()){

            return view('recipe_ingredient.edit', compact('recipe_ingredient', 'recipe'));

        } else{

            foreach($recipe_ingredient  as $ri){
                $ing_id[] = $ri->ingredient_id;
            }

            foreach($ing_id as $ing_id){
                $ing_names[] = app('App\Http\Controllers\IngredientController')->name_ingredient($ing_id);
            }

            $i = 0;
            foreach($recipe_ingredient as $ri){
                $ri->ingredient_name = $ing_names[$i];
                $i = $i + 1;
            }

            return view('recipe_ingredient.edit', compact('recipe_ingredient', 'recipe'))->with('id', $id);
        }

    }

    public function single_edit($id)
    {   
        //$id = id del recipe_ingredient
        $recipe_ing = RecipeIngredient::find($id);

        $recipe_ing->name_ingredient = app('App\Http\Controllers\IngredientController')->name_ingredient($recipe_ing->ingredient_id);


        return view('recipe_ingredient.single_edit', compact('recipe_ing'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //arriva id di recipe_ingredient
        $input = $request->all();
        $recipe_ingredient = RecipeIngredient::find($id);
        $recipe_ingredient->update($input);

        $recipe_id = $recipe_ingredient->recipe_id;
        $recipe = Recipe::find($recipe_id);
        
        return redirect()->route('recipe_ingredient.edit', $recipe_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe_ing = RecipeIngredient::find($id);
        $recipe_id = $recipe_ing->recipe_id;
        $recipe_ing->delete();

        $recipe = Recipe::find($recipe_id);
        $recipe_ingredient = RecipeIngredient::where('recipe_id', $recipe_id)->get();

        if($recipe_ingredient->isEmpty()){

            return view('/recipe_ingredient/create', compact('recipe', 'recipe_ingredient'))->with('id', $id);

        } else{

            foreach($recipe_ingredient  as $ri){
                $ing_id[] = $ri->ingredient_id;
            }

            foreach($ing_id as $ing_id){
                $ing_names[] = app('App\Http\Controllers\IngredientController')->name_ingredient($ing_id);
            }

            $i = 0;
            foreach($recipe_ingredient as $ri){
                $ri->ingredient_name = $ing_names[$i];
                $i = $i + 1;
            }

            return view('/recipe_ingredient/create', compact('recipe_ingredient', 'recipe'))->with('id', $id);
        }
       
    }

    public function destroy_u($id)
    {
        $recipe_ing = RecipeIngredient::find($id);
        $recipe_id = $recipe_ing->recipe_id;
        $recipe_ing->delete();

        $recipe = Recipe::find($recipe_id);
        $recipe_ingredient = RecipeIngredient::where('recipe_id', $recipe_id)->get();

        if($recipe_ingredient->isEmpty()){

            return view('/recipe_ingredient/edit', compact('recipe', 'recipe_ingredient'))->with('id', $id);

        } else{

            foreach($recipe_ingredient  as $ri){
                $ing_id[] = $ri->ingredient_id;
            }

            foreach($ing_id as $ing_id){
                $ing_names[] = app('App\Http\Controllers\IngredientController')->name_ingredient($ing_id);
            }

            $i = 0;
            foreach($recipe_ingredient as $ri){
                $ri->ingredient_name = $ing_names[$i];
                $i = $i + 1;
            }

            return view('/recipe_ingredient/edit', compact('recipe_ingredient', 'recipe'))->with('id', $id);
        }
       
    }

    
}
