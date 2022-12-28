<?php

namespace App\Http\Controllers;

use Auth;
use App\Recipe;
use App\UserRecipe;
use App\Category;
use App\RecipeCategory;
use App\RecipeIngredient;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipe.create');
    } 


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'name_recipe' => 'required',
            'time' => 'required',
            'portion' => 'required',
            'instruction' => 'required',
            'photo' => 'required'
        ]);

        //dump(request()->all());
        $recipe = new Recipe();
        $recipe->name_recipe = request('name_recipe');
        $recipe->time = request('time');
        $recipe->portion = request('portion');
        $recipe->instruction = request('instruction');
        $recipe->created_at = time();

        $recipe->photo = request()->file('photo')->store('public/recipes');
        if($recipe->photo2){
            $recipe->photo2 = request()->file('photo2')->store('public/recipes');
        }



        /*
        $user_recipe = new UserRecipe();
        $user_recipe->user_id = $u_id;
        */

        $recipe->save();
        $recipe_id = $recipe->id;
        
        //per abbinare la ricetta all'utente
        $user_id =Auth::user()->id; 
        UserRecipe::create(['user_id' => $user_id, 'recipe_id' => $recipe_id]);
        
        //return redirect('recipe');
        //questa viene passato l'id della ricetta per aggiungerlo alla tabella RecipeIngredient nella pagina successiva
        return view('/recipe_ingredient/create')->with('id', $recipe->id);//compact('id'));//)->with('$recipe_id');
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //parte ricetta
        $recipe = Recipe::find($id);  //where('id', $id);
        //parte categoria
        $category_id = RecipeCategory::where('recipe_id', '=', $id)->pluck('category_id');
        if($category_id->isNotEmpty()){
            $category_names = Category::where('id', '=', $category_id)->pluck('name_category');
        }
        //parte ingredienti
        $ingredient_id = RecipeIngredient::where('recipe_id', '=', $id)->pluck('ingredient_id', 'quantity', 'measure');

        if($category_id->isNotEmpty()){
            return view('/recipe/show', compact('recipe', 'category_names'));
        } else{
            return view('/recipe/show', compact('recipe'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Trovo la ricetta in questione
     */
    public function find($id){
        //$recipe = ;
        return $id;//$recipe;
    }

    //funzione per ricerca rapida ricette da layout
    public function search_recipe(Request $request){

        if($request->search){
            $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->search.'%')->latest()->paginate(15);
            return view('research.results', compact('recipe'));
        }else{
            return redirect()->back()->with('message', 'Ricerca a vuoto');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request -> all(); 
        $recipe = RecipeController::find($id);
        $recipe->update($input);

        return redirect('recipe');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = RecipeController::find($id);
        $recipe -> delete();

        return redirect('recipe');
    }
}