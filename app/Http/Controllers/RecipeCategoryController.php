<?php

namespace App\Http\Controllers;

use App\RecipeCategory;
use App\Category;
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
    public function create()
    {
        return view('recipe_category.create');
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
            'category_id' => 'required'
        ]);

        $recipe_category = new RecipeCategory();
        $recipe_category->recipe_id = $request-> recipe_id;
        $recipe_category->category_id = $request-> category_id;

        $recipe_category->save();

        $name_category = Category::where('id', '=', $request->category_id)
        ->value('name_category');

        $response = [
            'name_category' => $name_category,
        ];


        return response()->json($response);
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
    public function edit(RecipeCategory $recipeCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecipeCategory  $recipeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecipeCategory $recipeCategory)
    {
        //
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
