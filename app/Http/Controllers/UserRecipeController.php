<?php

namespace App\Http\Controllers;

use App\UserRecipe;
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
        $users_recipes = UserRecipe::where('user_id', '=', $user_id)->pluck('recipe_id');
        return view('user_recipe/index', compact('users_recipes'));
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
