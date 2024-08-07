<?php

namespace App\Http\Controllers;

use Auth;
use App\Recipe;
use App\UserRecipe;
use App\Category;
use App\RecipeCategory;
use App\RecipeIngredient;
use App\Ingredient;
use App\SavedRecipe;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $recipe = Recipe::orderBy('name_recipe')->get();

        return view('/recipe/index', compact('recipe'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
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

        $recipe->n_saved = 0;

        /*
        $user_recipe = new UserRecipe();
        $user_recipe->user_id = $u_id;
        */

        $recipe->save();
        $recipe_id = $recipe->id;
        
        //per abbinare la ricetta all'utente
        $user_id = Auth::id(); 
        UserRecipe::create(['user_id' => $user_id, 'recipe_id' => $recipe_id]);

        //passo gli ingredienti a recipe_ingredient.create
        $ingredients = Ingredient::orderBy('name_ingredient')->get();
        
        //return redirect('recipe');
        //questa viene passato l'id della ricetta per aggiungerlo alla tabella RecipeIngredient nella pagina successiva
        return redirect()->route('recipe_ingredient.create', $recipe_id)->with('id', $recipe->id);//compact('id'));//)->with('$recipe_id');
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){   
        //dichiarazioni
        $category_names = "";
        $recipe_ing = "";
        //parte ricetta
        $recipe = Recipe::find($id);  //where('id', $id);

        //parte categoria

        $recipe_category_id = DB::table('recipe_categories')->where('recipe_id', '=', $id)
        ->join('categories', 'categories.id', "=", 'recipe_categories.category_id')
        //->select('name_category')
        ->get();

        $recipe_category_id2 = DB::table('recipe_categories')->where('recipe_id', '=', $id)
        ->join('categories', 'categories.id', "=", 'recipe_categories.category_id2')
        //->select('name_category')
        ->get();

        $recipe_category = $recipe_category_id->merge($recipe_category_id2);

        //bisogna fare join tra recipe ingredient e ingredient, passando solo gli elementi di recipe ingredient con l'id della ricetta
        //parte ingredienti
        $recipe_ing = DB::table('recipe_ingredients')->where('recipe_id', '=', $id)
        ->join('ingredients', 'ingredients.id', "=", 'recipe_ingredients.ingredient_id')
        ->select('name_ingredient', 'quantity', 'measure', 'recipe_id')
        ->get();

        $user_id = DB::table('user_recipes')->where('recipe_id', '=', $id)->pluck('user_id');
        $saved_recipes = SavedRecipe::all();

        return view('/recipe/show', compact('recipe', 'recipe_category', 'recipe_ing', 'user_id', 'saved_recipes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $recipe = Recipe::find($id);

        return view('recipe.edit', compact('recipe'));
    }

    /**
     * Trovo la ricetta in questione
     */
    public function find($id){
        //$recipe = ;
        return $id;//$recipe;
    }

    public function latest($column = 'created_at'){
        return $this->orderBy($column, 'desc');
    } 


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $input = $request -> all(); 
        $recipe = Recipe::find($id);
        $recipe->update($input);
        if($request->photo){
            $path = request()->file('photo')->store('public/recipe');
            $recipe->update(['photo'=>$path]);
        }
        
        $recipe_ingredient = RecipeIngredient::where('recipe_id', $id)->get();
        if($recipe_ingredient->isEmpty()){

            return view('/recipe_ingredient/edit', compact('recipe_ingredient', 'recipe'))->with('id', $id);

        }
        else{

            foreach($recipe_ingredient as $ri){
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

        }


        return view('/recipe_ingredient/edit', compact('recipe_ingredient', 'recipe'))->with('id', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){

        $id = $request->id;
        //parte recipe_categories
        RecipeCategory::where('recipe_id', $id)->delete();

        //parte recipe_ingredients
        RecipeIngredient::where('recipe_id', $id)->delete();

        //parte user_recipe
        UserRecipe::where('recipe_id', $id)->delete();

        //parte saved_recipe
        SavedRecipe::where('recipe_id', $id)->delete();

        //parte recipe
        Recipe::where('id', $id)->delete();

        return redirect()->back();
    }

    public function destroy2(Request $request){

        $id = $request->id;
        //parte recipe_categories
        RecipeCategory::where('recipe_id', $id)->delete();

        //parte recipe_ingredients
        RecipeIngredient::where('recipe_id', $id)->delete();

        //parte user_recipe
        UserRecipe::where('recipe_id', $id)->delete();

        //parte saved_recipe
        SavedRecipe::where('recipe_id', $id)->delete();

        //parte recipe
        Recipe::where('id', $id)->delete();

        $recipe = Recipe::orderBy('recipes.created_at', 'desc')->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
        ->get();

        return redirect()->route('home'); //ho tolto il return view('home') perchè non caricava le categorie
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

                        if($request->ingredient_id){
                            //la richiesta ha il campo ingredient_id
                            
                            //la richiesta ha tutti i campi
                            $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                            ->where('time', '<=', $request->time)
                            ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                            ->whereIn('category_id', [$request->category_id1, $request->category_id2])
                            ->whereIn('category_id2', [$request->category_id1, $request->category_id2])
                            ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                            ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                            ->get();
                            return view('research.results', compact('recipe'));
    

                        }else{

                            //la richiesta ha i campi name_recipe, time, category_id1 e category_id2
                            $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                            ->where('time', '<=', $request->time)
                            ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                            ->whereIn('category_id', [$request->category_id1, $request->category_id2])
                            ->whereIn('category_id2', [$request->category_id1, $request->category_id2])
                            ->get();
                            return view('research.results', compact('recipe'));
                            
                        }

                    }else if($request->ingredient_id){

                        //la request ha i campi name_recipe, time, category_id1 e ingredient_id
                        $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                        ->where('time', '<=', $request->time)
                        ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                        ->where('category_id', $request->category_id1)
                        ->orWhere('category_id2', 'LIKE', $request->category_id1)
                        ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                        ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                        ->get();
                        return view('research.results', compact('recipe'));
                    }
    
                    //la richiesta ha i campi name_recipe, time e category_id1
                    $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                    ->where('time', '<=', $request->time)
                    ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                    ->where('category_id', 'LIKE', $request->category_id1)
                    ->orWhere('category_id2', 'LIKE', $request->category_id1)
                    ->get();
                    return view('research.results', compact('recipe'));

                }else if($request->category_id2){

                    if($request->ingredient_id){

                        //la richiesta ha i campi name_recipe, time, category2, ingredient
                        $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                        ->where('time', '<=', $request->time)
                        ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                        ->where('category_id', 'LIKE', $request->category_id2)
                        ->orWhere('category_id2', 'LIKE', $request->category_id2)
                        ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                        ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                        ->get();
                        return view('research.results', compact('recipe'));

                    } else{
                        //la richiesta ha name_recipe, time e category_id2
                        $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                        ->where('time', '<=', $request->time)
                        ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                        ->where('category_id', 'LIKE', $request->category_id2)
                        ->orWhere('category_id2', 'LIKE', $request->category_id2)
                        ->get();
                        return view('research.results', compact('recipe'));

                    }

                }else if($request->ingredient_id){
                    //la request ha i campi name_recipe, time e ingredient_id
                    $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                    ->where('time', '<=', $request->time)
                    ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                    ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                    ->get();
                    return view('research.results', compact('recipe'));
                }

                //la richiesta ha solo i campi name_recipe e il campo time
                $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                ->where('time', '<=', $request->time)
                ->get();
                return view('research.results', compact('recipe'));

            }
            else if($request->category_id1){
                //request ha il campo name_recipe e category_id1

                if($request->category_id2){
                    //request ha il campo name_recipe, category_id1 e category_id2

                    if($request->ingredient_id){
                        //request ha il campo name, category_id1, category_id2, ingredient_id

                        $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                        ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                        ->whereIn('category_id', [$request->category_id1, $request->category_id2])
                        ->whereIn('category_id2', [$request->category_id1, $request->category_id2])
                        ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                        ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                        ->get();
                        return view('research.results', compact('recipe'));

                    }else{
                        //request ha il campo name_recipe, category_id1, category_id2

                        $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                        ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                        ->whereIn('category_id', [$request->category_id1, $request->category_id2])
                        ->whereIn('category_id2', [$request->category_id1, $request->category_id2])
                        ->get();
                        return view('research.results', compact('recipe'));

                    }

                }else if($request->ingredient_id){
                    //la request ha i campi name_recipe, category_id1 e ingredient_id

                    $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                    ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                    ->where('category_id', 'LIKE', $request->category_id1)
                    ->orWhere('category_id2', 'LIKE', $request->category_id1)
                    ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                    ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                    ->get();
                    return view('research.results', compact('recipe'));
                }

                //la request ha i campi name_recipe e category_id1

                $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                ->where('category_id', 'LIKE', $request->category_id1)
                ->orWhere('category_id2', 'LIKE', $request->category_id1)
                ->get();
                return view('research.results', compact('recipe'));

            } else if($request->category_id2){
                //la request ha i campi name_recipe e category_id2

                if($request->ingredient_id){
                    //la richiesta ha i campi name_recipe e category_id2, ingredient_id

                    $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                    ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                    ->where('category_id', 'LIKE', $request->category_id2)
                    ->orWhere('category_id2', 'LIKE', $request->category_id2)
                    ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                    ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                    ->get();
                    return view('research.results', compact('recipe'));
                
                }else{
                    //la request ha i campi name_recipe e category_id2
                    $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                    ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                    ->where('category_id', 'LIKE', $request->category_id2)
                    ->orWhere('category_id2', 'LIKE', $request->category_id2)
                    ->get();
                    return view('research.results', compact('recipe'));

                }

            } else if($request->ingredient_id){
                //la request ha i campi name_recipe e ingredient_id

                $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
                ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                ->get();
                return view('research.results', compact('recipe'));

            }

            //la ricetta ha solo il campo name_recipe
            $recipe = Recipe::where('name_recipe', 'LIKE', '%'.$request->name_recipe.'%')
            ->get();
            return view('research.results', compact('recipe'));

        }
        else if($request->time){
            //non c'è il campo name_recipe ma il campo time si
            if($request->category_id1){
                //la request ha i campi time e category_id1

                if($request->category_id2){
                    //la request ha i campi time, category_id1 e category_id2

                    if($request->ingredient_id){
                        //la request ha i campi time, category_id1, category_id2 e ingredient_id

                        $recipe = Recipe::where('time', '<=', $request->time)
                        ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                        ->whereIn('category_id', [$request->category_id1, $request->category_id2])
                        ->whereIn('category_id2', [$request->category_id1, $request->category_id2])
                        ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                        ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                        ->get();
                        return view('research.results', compact('recipe'));

                    } else{

                        //request ha i campi time category_id1 e category_id2
                        $recipe = Recipe::where('time', '<=', $request->time)
                        ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                        ->whereIn('category_id', [$request->category_id1, $request->category_id2])
                        ->whereIn('category_id2', [$request->category_id1, $request->category_id2])
                        ->get();
                        return view('research.results', compact('recipe'));
                    }
                } else if($request->ingredient_id){
                    //la request ha i campi time, category_id1, ingredient_id1
                        
                    $recipe = Recipe::where('time', '<=', $request->time)
                    ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                    ->where('category_id', 'LIKE', $request->category_id1)
                    ->orWhere('category_id2', 'LIKE', $request->category_id1)
                    ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                    ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                    ->get();
                    return view('research.results', compact('recipe'));

                }

               //la request ha i campi time, category_id1

               $recipe = Recipe::where('time', '<=', $request->time)
               ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
               ->where('category_id', 'LIKE', $request->category_id1)
               ->orWhere('category_id2', 'LIKE', $request->category_id1)
               ->get();
               return view('research.results', compact('recipe'));


            } else if($request->category_id2){
                //la request ha i campi time e category_id2

                if($request->ingredient_id){
                    //la request ha i campi time, category_id2 e ingredient_id
                    
                    $recipe = Recipe::where('time', '<=', $request->time)
                    ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                    ->where('category_id', 'LIKE', $request->category_id2)
                    ->orWhere('category_id2', 'LIKE', $request->category_id2)
                    ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                    ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                    ->get();
                    return view('research.results', compact('recipe'));

                } 

                $recipe = Recipe::where('time', '<=', $request->time)
                ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                ->where('category_id', 'LIKE', $request->category_id2)
                ->orWhere('category_id2', 'LIKE', $request->category_id2)
                ->get();
                return view('research.results', compact('recipe'));

            } else if($request->ingredient_id){
                //la request ha i campi time e ingredient_id1

                $recipe = Recipe::where('time', '<=', $request->time)
                ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                ->get();
                return view('research.results', compact('recipe'));

            } else {
                //request ha solo il campo time

                $recipe = Recipe::where('time', '<=', $request->time)
                ->get();
                return view('research.results', compact('recipe'));

            }
        } else if($request->category_id1){

            //la request non i campi name_recipe e time ma ha category_id1
            if($request->category_id2){
                //la request ha i campi category_id1 e category_id2

                if($request->ingredient_id){
                    //la request ha i campi category_id1, category_id2 e ingredient_id1

                    $recipe = Recipe::join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                    ->whereIn('category_id', [$request->category_id1, $request->category_id2])
                    ->whereIn('category_id2', [$request->category_id1, $request->category_id2])
                    ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                    ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                    ->get();
                    return view('research.results', compact('recipe'));

                } 
                //la request ha i campi category_id1 e category_id2
                $recipe = RecipeCategory::whereIn('category_id', [$request->category_id1, $request->category_id2])
                ->whereIn('category_id2', [$request->category_id1, $request->category_id2])
                ->join('recipes', 'recipes.id', "=", 'recipe_categories.recipe_id')
                ->get();
                return view('research.results', compact('recipe')); 
                
            } else if($request->ingredient_id){
                //la request ha category_id1 e ingredient_id
                
                $recipe = Recipe::join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                ->where('category_id', 'LIKE', $request->category_id1)
                ->orWhere('category_id2', 'LIKE', $request->category_id1)
                ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                ->get();
                return view('research.results', compact('recipe'));

            } else{
                //la request ha solo category_id1

                $recipe = Recipe::join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                ->where('category_id', 'LIKE', $request->category_id1)
                ->orWhere('category_id2', 'LIKE', $request->category_id1)
                ->get();
                return view('research.results', compact('recipe'));

            }
            
        } else if($request->category_id2){

            //la request non ha name_recipe, time e category_id1 ma ha come primo parametro category_id2

            if($request->ingredient_id){
                //la request ha category_id2 e ingredient_id

                $recipe = Recipe::join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                ->where('category_id', 'LIKE', $request->category_id2)
                ->orWhere('category_id2', 'LIKE', $request->category_id2)
                ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                ->get();
                return view('research.results', compact('recipe'));
                
                
            }else {

                //la request ha solo il campo category_id2
                $recipe = Recipe::join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                ->where('category_id', 'LIKE', $request->category_id2)
                ->orWhere('category_id2', 'LIKE', $request->category_id2)
                ->get();
                return view('research.results', compact('recipe'));

            }

        } else if($request->ingredient_id){
            //la richiesta non ha il campo name_recipe, time, category_id1, category_id2 ma solo ingredient_id1
            
            $recipe = Recipe::join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
            ->where('ingredient_id', 'LIKE', $request->ingredient_id)
            ->get();
            return view('research.results', compact('recipe'));
            

            
        } else {
            //se l'utente non inserisce nessun campo vai a tutte le ricette

            $recipe = DB::table('recipes')->latest()->get();
            return view('research.results', compact('recipe'));
        }
    
    }   
}