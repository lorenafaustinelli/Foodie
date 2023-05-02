<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recipe;
use App\UserRecipe;
use App\SavedRecipe;
use Auth; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = DB::table('users')->latest()->get();
        return view('/user/index', compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function name($id){

        $user = User::find($id); 
        $name = "- ".$user->name." ".$user->surname;

        return $name;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_id = Auth::id();
        $recipe = DB::table('user_recipes')->where('user_id', '=', $user_id)
        ->join('recipes', 'recipes.id', "=", 'user_recipes.recipe_id')
        ->orderBy('n_saved', 'desc')->get();
        
        return view('user/userPage', compact('recipe'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::id());
        $input = $request->all();
        
        $user->update($input);
        if($request->picture){
            $path = request()->file('picture')->store('public/users');
            $user->update(['picture'=>$path]);
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //parte user_recipe
        $user = User::find($id);
        
        UserRecipe::where('user_id', $id)->delete();
        
        //parte saved_recipe
        SavedRecipe::where('user_id', $id)->delete();
        
        //parte user
        $user->delete();

        //return redirect()->back();
        return view('/home');
    }
}
