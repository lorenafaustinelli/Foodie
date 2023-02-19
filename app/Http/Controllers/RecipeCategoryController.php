<?php

namespace App\Http\Controllers;

use App\RecipeCategory;
use App\Category;
use App\Recipe;
use Illuminate\Http\Request;

class RecipeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipe_categories = RecipeCategory::all();

        return view('/recipe_category', compact('recipe_categories')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $recipe = Recipe::find($id);
        return view('recipe_category.create', compact('recipe'))->with('id', $id);
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
            'category_id' => 'required',
            'category_id2' => 'nullable'

        ]);

        $recipe_category = new RecipeCategory();
        $recipe_category->recipe_id = $request-> recipe_id;
        $recipe_category->category_id = $request->category_id;
        $recipe_category->category_id2 = $request->category_id2;


        $recipe_category->save();

        return view('/home');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\RecipeCategory  $recipeCategory
     * @return \Illuminate\Http\Response
     */
    public function show(RecipeCategory $recipeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RecipeCategory  $recipeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$id = id della ricetta non del recipe_category
        $recipe_cat = RecipeCategory::where('recipe_id', $id)->get();
        $recipe = Recipe::find($id);
        
        if($recipe_cat->isEmpty()){

            return view('recipe_category.edit', compact('recipe_cat', 'recipe'))->with('id', $id);

        } else {

            foreach($recipe_cat as $recipe_cat){

                $recipe_cat->cat_name1 = app('App\Http\Controllers\CategoryController')->name_category($recipe_cat->category_id);

                if($recipe_cat->category_id2 != ""){

                    $recipe_cat->cat_name2 = app('App\Http\Controllers\CategoryController')->name_category($recipe_cat->category_id2);
                    
                }
            }
        }
        

        return view('recipe_category.edit', compact('recipe_cat', 'recipe'))->with('id', $id);

    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecipeCategory  $recipeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $recipe_cat = RecipeCategory::where('recipe_id', $id)->get();
        foreach($recipe_cat as $rc){
            $recipe_category_id = $rc->id;
        }
        $recipe_category = RecipeCategory::find($recipe_category_id);
        $recipe_category->update($input);

        return redirect()->route('recipes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecipeCategory  $recipeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecipeCategory $recipeCategory)
    {
        //
    }
    //funzione che restituisce il nome di una categoria il cui id è passato come paramentro 
    public function category($id)
    {   
        $category_id = RecipeCategory::where('recipe_id', $id)->pluck('category_id');
        $category_name = Category::where('id', $category_id)->pluck('name_category');
        return $category_name;
    }
}
