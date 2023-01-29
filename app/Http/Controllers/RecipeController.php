<?php

namespace App\Http\Controllers;

use Auth;
use App\Recipe;
use App\UserRecipe;
use App\Category;
use App\RecipeCategory;
use App\RecipeIngredient;
use App\Ingredient;
use Illuminate\Support\Facades\DB;

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
        $user_id = Auth::user()->id; 
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

        //dichiarazioni
        $category_names = "";
        $recipe_ing = "";
        //parte ricetta
        $recipe = Recipe::find($id);  //where('id', $id);

        //parte categoria
        $category_id = RecipeCategory::where('recipe_id', '=', $id)->pluck('category_id');

        if($category_id->isNotEmpty()){
            $category_names = Category::where('id', '=', $category_id)->value('name_category');
        }
        //bisogna fare join tra recipe ingredient e ingredient, passando solo gli elementi di recipe ingredient con l'id della ricetta
        //parte ingredienti
        $recipe_ing = DB::table('recipe_ingredients')->where('recipe_id', '=', $id)
        ->join('ingredients', 'ingredients.id', "=", 'recipe_ingredients.ingredient_id')
        ->select('name_ingredient', 'quantity', 'measure')
        ->get();

        return view('/recipe/show', compact('recipe', 'category_names', 'recipe_ing'));

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


    //funzione per ricerca rapida ricette da layout
    public function search_recipe(Request $request){

        if($request->search){
            $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->search.'%')->latest()->paginate(15);
            return view('research.results', compact('recipe'));
        }else{
            return redirect()->back()->with('message', 'Ricerca a vuoto');
        }
    }

    //funzione per ricerca avanzata
    public function advanced_search(Request $request){

        //COMBINAZIONI NAME_RECIPE
        
        if($request->name_recipe){
            //la richiesta ha il campo nome

            if($request->time){
                //la richiesta ha il campo time

                if($request->category_id1){
                    //la richiesta ha il campo category1

                    if($request->category_id2){
                        //la richiesta ha il campo category2

                        if($request->ingredient_id1){
                            //la richiesta ha il campo ingredient_id1

                            if($request->ingredient_id2){

                                //la richiesta ha tutti i campi

                                $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                                ->where('time', 'LIKE', $request->time)
                                ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                                ->where('category_id', 'LIKE', $request->category_id1)
                                ->where('category_id', 'LIKE', $request->category_id2)
                                ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                                ->where('ingredient_id', 'LIKE', $request->ingredient_id1)
                                ->where('ingredient_id', 'LIKE', $request->ingredient_id12)
                                ->paginate(15);
                                return view('research.results', compact('recipe'));

                            }
                            
                            //la richiesta ha name_recipe, time, category_id1, category_id2 e ingredient_id1
                            $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                            ->where('time', 'LIKE', $request->time)
                            ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                            ->where('category_id', 'LIKE', $request->category_id1)
                            ->where('category_id', 'LIKE', $request->category_id2)
                            ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                            ->where('ingredient_id', 'LIKE', $request->ingredient_id1)
                            ->paginate(15);
                            return view('research.results', compact('recipe'));
    

                        }
                        else if($request->ingredient_id2){
                            //la richiesta ha solo name_recipe, time, category_id1, category_id2 e ingredient_id2

                            $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                            ->where('time', 'LIKE', $request->time)
                            ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                            ->where('category_id', 'LIKE', $request->category_id1)
                            ->where('category_id', 'LIKE', $request->category_id2)
                            ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                            ->where('ingredient_id', 'LIKE', $request->ingredient_id2)
                            ->paginate(15);
                            return view('research.results', compact('recipe'));

                        }
                        else{

                            //la richiesta ha i campi name_recipe, time, category_id1 e category_id2
                            $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                            ->where('time', 'LIKE', $request->time)
                            ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                            ->where('category_id', 'LIKE', $request->category_id1)
                            ->where('category_id', 'LIKE', $request->category_id2)
                            ->paginate(15);
                            return view('research.results', compact('recipe'));
                            
                        }

                    }
    
                    //la richiesta ha i campi name_recipe, time e category_id1
                    $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                    ->where('time', 'LIKE', $request->time)
                    ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                    ->where('category_id', 'LIKE', $request->category_id1)
                    ->paginate(15);
                    return view('research.results', compact('recipe'));

                }else if($request->category_id2){

                    if($request->ingredient_id1){

                        if($request->ingredient_id2){
                            //la richiesta ha tutti i campi tranne category_1
                            $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                            ->where('time', 'LIKE', $request->time)
                            ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                            ->where('category_id', 'LIKE', $request->category_id2)
                            ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                            ->where('ingredient_id', 'LIKE', $request->ingredient_id1)
                            ->where('ingredient_id', 'LIKE', $request->ingredient_id12)
                            ->paginate(15);
                            return view('research.results', compact('recipe'));
                        }

                        //la richiesta ha i campi name_recipe, time, category2, ingredient1
                        $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                        ->where('time', 'LIKE', $request->time)
                        ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                        ->where('category_id', 'LIKE', $request->category_id2)
                        ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                        ->where('ingredient_id', 'LIKE', $request->ingredient_id1)
                        ->where('ingredient_id', 'LIKE', $request->ingredient_id12)
                        ->paginate(15);
                        return view('research.results', compact('recipe'));

                    }
                    else if($request->ingredient_id2){
                        //la richiesta ha i campi name_recipe, time, category2, ingredient_id2
                        $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                        ->where('time', 'LIKE', $request->time)
                        ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                        ->where('category_id', 'LIKE', $request->category_id2)
                        ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                        ->where('ingredient_id', 'LIKE', $request->ingredient_id12)
                        ->paginate(15);
                        return view('research.results', compact('recipe'));
                    }
                    else{
                        //la richiesta ha name_recipe, time e category_id2
                        $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                        ->where('time', 'LIKE', $request->time)
                        ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                        ->where('category_id', 'LIKE', $request->category_id2)
                        ->paginate(15);
                        return view('research.results', compact('recipe'));

                    }

                }

                //la richiesta ha solo i campi name_recipe e il campo time
                $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                ->where('time', 'LIKE', $request->time)
                ->paginate(15);
                return view('research.results', compact('recipe'));

            }
            else{

                //request ha il campo name_recipe ma non il campo time

                if($request->category_id1){
                    //request ha il campo nome e category id1

                    if($request->category2){
                        //request ha il campo nome, categoryid1 e categoryid2

                        if($request->ingredient_id1){
                            //request ha il campo name, categoryid1, categoryid2, ingredientid1

                            if($request->ingredient_id2){
                                //request ha tutti i parametri tranne time

                                $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                                ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                                ->where('category_id', 'LIKE', $request->category_id1)
                                ->where('category_id', 'LIKE', $request->category_id2)
                                ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                                ->where('ingredient_id', 'LIKE', $request->ingredient_id1)
                                ->where('ingredient_id', 'LIKE', $request->ingredient_id12)
                                ->paginate(15);
                                return view('research.results', compact('recipe'));

                            }

                            //request ha il campo name, categoryid1, categoryid2, ingredientid1
                            $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                            ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                            ->where('category_id', 'LIKE', $request->category_id1)
                            ->where('category_id', 'LIKE', $request->category_id2)
                            ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                            ->where('ingredient_id', 'LIKE', $request->ingredient_id1)
                            ->paginate(15);
                            return view('research.results', compact('recipe'));

                        }else if($request->ingredient_id2){
                            //request ha i campi name_recipe, category_id1, category_id2, ingredient_id2
                            $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                            ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                            ->where('category_id', 'LIKE', $request->category_id1)
                            ->where('category_id', 'LIKE', $request->category_id2)
                            ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                            ->where('ingredient_id', 'LIKE', $request->ingredient_id1)
                            ->where('ingredient_id', 'LIKE', $request->ingredient_id2)
                            ->paginate(15);
                            return view('research.results', compact('recipe'));

                        }
                        else{
                            //request ha il campo name_recipe, category_id1, category_id2
                            $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                            ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                            ->where('category_id', 'LIKE', $request->category_id1)
                            ->where('category_id', 'LIKE', $request->category_id2)
                            ->paginate(15);
                            return view('research.results', compact('recipe'));

                        }

                    }

                    //la request ha i campi name_recipe e category_id1
                    $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                    ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                    ->where('category_id', 'LIKE', $request->category_id1)
                    ->paginate(15);
                    return view('research.results', compact('recipe'));

                }
                else if($request->category_id2){

                    if($request->ingredient_id1){

                    }else if($request->ingredient_id2){
                        //RIPRENDERE DA QUESTI

                    } else{

                        //la richiesta ha i campi name_recipe e category_id2
                        $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                        ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                        ->where('category_id', 'LIKE', $request->category_id2)
                        ->paginate(15);
                        return view('research.results', compact('recipe'));
                    }
                }
                

            }
            //la ricetta ha solo il campo name_recipe
            $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
            ->paginate(15);
            return view('research.results', compact('recipe'));

        }
        else{

            //non c'è il campo name_recipe

        }

        //PARTE TIME 

    
    } 

    
}