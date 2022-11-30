<?php

namespace App\Http\Controllers;

use App\RecipeCategory;
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
        $recipe_category = new RecipeCategory();
        $recipe_category->recipe_id = $request-> recipe_id;
        $recipe_category->category_id = $request-> category_id;

        $recipe_category->save();
        return response()->json($recipe_category);
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
}
