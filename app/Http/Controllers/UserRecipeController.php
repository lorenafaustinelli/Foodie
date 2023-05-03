<?php

namespace App\Http\Controllers;

use App\UserRecipe;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Http\Request;

class UserRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user_id = Auth::id();
        $recipe = DB::table('user_recipes')->where('user_id', '=', $user_id)
        ->join('recipes', 'recipes.id', "=", 'user_recipes.recipe_id')->get();
        if($recipe->isEmpty()){
            $recipe= '';
            return view('user_recipe/index', compact('recipe'));
        }
        
        return view('user_recipe/index', compact('recipe'));

    }

    public function filter_index(Request $request)
    {   
        $user_id = Auth::id();
        if($request->time){

            if($request->category_id1){

                if($request->category_id2){

                    if($request->ingredient_id){

                        //tutti i campi

                        $recipe = UserRecipe::where('user_id', '=', $user_id)
                        ->join('recipes', 'recipes.id', "=", 'user_recipes.recipe_id')
                        ->where('time', '<=', $request->time)
                        ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                        ->whereIn('category_id', [$request->category_id1, $request->category_id2])
                        ->whereIn('category_id2', [$request->category_id1, $request->category_id2])
                        ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                        ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                        ->get();

                        return view('user_recipe/index', compact('recipe'));

                    }

                    //tutti i campi tranne ingrediente
                    $recipe = UserRecipe::where('user_id', '=', $user_id)
                    ->join('recipes', 'recipes.id', "=", 'user_recipes.recipe_id')
                    ->where('time', '<=', $request->time)
                    ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                    ->whereIn('category_id', [$request->category_id1, $request->category_id2])
                    ->whereIn('category_id2', [$request->category_id1, $request->category_id2])
                    ->get();

                    return view('user_recipe/index', compact('recipe'));

                }

                //solo tempo e prima categoria
                $recipe = UserRecipe::where('user_id', '=', $user_id)
                ->join('recipes', 'recipes.id', "=", 'user_recipes.recipe_id')
                ->where('time', '<=', $request->time)
                ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                ->whereIn('category_id', [$request->category_id1, $request->category_id2])
                ->get();

                return view('user_recipe/index', compact('recipe'));

            }

            //solo tempo
            $recipe = UserRecipe::where('user_id', '=', $user_id)
            ->join('recipes', 'recipes.id', "=", 'user_recipes.recipe_id')
            ->where('time', '<=', $request->time)
            ->get();

            return view('user_recipe/index', compact('recipe'));

        }
        else if($request->category_id1){

            if($request->category_id2){

                if($request->ingredient_id){

                    //tutti i campi tranne time
                    $recipe = UserRecipe::where('user_id', '=', $user_id)
                    ->join('recipes', 'recipes.id', "=", 'user_recipes.recipe_id')
                    ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                    ->whereIn('category_id', [$request->category_id1, $request->category_id2])
                    ->whereIn('category_id2', [$request->category_id1, $request->category_id2])
                    ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                    ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                    ->get();

                    return view('user_recipe/index', compact('recipe'));

                }

                //solo categorie
                $recipe = UserRecipe::where('user_id', '=', $user_id)
                ->join('recipes', 'recipes.id', "=", 'user_recipes.recipe_id')
                ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                ->whereIn('category_id', [$request->category_id1, $request->category_id2])
                ->whereIn('category_id2', [$request->category_id1, $request->category_id2])
                ->get();

                return view('user_recipe/index', compact('recipe'));
            }

            //solo prima categoria

            $recipe = UserRecipe::where('user_id', '=', $user_id)
            ->join('recipes', 'recipes.id', "=", 'user_recipes.recipe_id')
            ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
            ->whereIn('category_id', [$request->category_id1, $request->category_id2])
            ->get();

            return view('user_recipe/index', compact('recipe'));

        } else if($request->category_id2){

            if($request->ingredient_id){

                //solo categoria 2 e ingrediente

                $recipe = UserRecipe::where('user_id', '=', $user_id)
                ->join('recipes', 'recipes.id', "=", 'user_recipes.recipe_id')
                ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
                ->whereIn('category_id2', [$request->category_id1, $request->category_id2])
                ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
                ->where('ingredient_id', 'LIKE', $request->ingredient_id)
                ->get();

                return view('user_recipe/index', compact('recipe'));

            }

            //solo categoria 2

            $recipe = UserRecipe::where('user_id', '=', $user_id)
            ->join('recipes', 'recipes.id', "=", 'user_recipes.recipe_id')
            ->join('recipe_categories', 'recipe_categories.recipe_id', "=", 'recipes.id')
            ->whereIn('category_id2', [$request->category_id1, $request->category_id2])
            ->get();

            return view('user_recipe/index', compact('recipe'));

        } else if($request->ingredient_id){
            
            //solo campo ingredient
            $recipe = UserRecipe::where('user_id', '=', $user_id)
            ->join('recipes', 'recipes.id', "=", 'user_recipes.recipe_id')
            ->join('recipe_ingredients', 'recipe_ingredients.recipe_id', "=", 'recipes.id')
            ->where('ingredient_id', 'LIKE', $request->ingredient_id)
            ->get();

            return view('user_recipe/index', compact('recipe'));

        } else{

            $recipe = DB::table('user_recipes')->where('user_id', '=', $user_id)
            ->join('recipes', 'recipes.id', "=", 'user_recipes.recipe_id')->get();
        
            return view('user_recipe/index', compact('recipe'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$user_recipe = new UserRecipe();
        $user_recipe->user_id = request('user_id');
        $user_recipe->recipe_id = request('recipe_id');

        $user_recipe->save(); */
        $request->validate([
            'user_id' => 'required',
            'recipe_id' => 'required',
        ]);

        $input = $request->all();

        UserRecipe::firstorCreate([
            'user_id' => $request['user_id'],
            'recipe_id' => $request['recipe_id']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserRecipe  $userRecipe
     * @return \Illuminate\Http\Response
     */
    public function show(UserRecipe $userRecipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserRecipe  $userRecipe
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRecipe $userRecipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserRecipe  $userRecipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRecipe $userRecipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserRecipe  $userRecipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRecipe $userRecipe)
    {
        //
    }

    
}
