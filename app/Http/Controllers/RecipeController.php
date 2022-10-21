<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        //store effettivo dei dati
        //CREA FILE LOG PER VEDERE COSA ARRIVA

        $request->validate([
            'name_recipe' => 'required',
            'time'        => 'required',
            'portion'     => 'required',
            'instruction' => 'required',
            'photo'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id'     => 'required',
        ]);

        //setto il nome dell'immagine e uso storeAs per salvarla nella destinazione e con il nome scelti
        $photo_name = time() . '.' . $request->photo->extension(); //controllare funzione time()
        $request->file('photo')->storeAs('public/images', $photo_name);

        Recipe::create([
            'name_recipe' => $request->name_recipe,
            'time'        => $request->time,
            'portion'     => $request->portion,
            'instruction' => $request->instruction,
            'photo'       => $request->photo_name,
            'user_id'     => $request->user_id,
        ]);

        /*if($request()->hasFile('photo')){
            $photo = request()->file('photo')->getClientOriginalName();
            request()->file('photo')->store('recipe_photos');
            $recipe->update(['photo' => $photo]);
        }

       if($request()->hasFile('photo2')){
            $photo = request()->file('photo2')->getClientOriginalName();
            request()->file('photo2')->storeAs('photo2', $recipe->id . '/' . $photo2, '');
            $recipe->update(['photo2' => $photo2]);
        }

        if($request()->hasFile('photo3')){
            $photo = request()->file('photo3')->getClientOriginalName();
            request()->file('photo3')->storeAs('photo3', $recipe->id . '/' . $photo3, '');
            $recipe->update(['photo3' => $photo3]);
        } */

        return redirect('recipe.index');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        $input = $request -> all(); 
        $recipe = Recipe::find($id);
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
        $recipe -> delete();

        return redirect('recipe');
    }
}
