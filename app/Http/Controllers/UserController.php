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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('user/userPage');
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
        $user = Auth::user();
        if($request->hasfile('piture')){
            $destination = 'public/users'.$user->picture; 
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('public/users', $filename);
            $user->picture = $filename;
        }
        
        if($request['email']){
            $email = $request['email'];
            $user->email = "$email";
        }
        
        if($request['nome'] && $request['cognome']){
            $user->name = $request['nome'];
            $user->surname = $request['surname'];
        }

        $user->save();
        /* $user->picture = $request;

        $image = request()->file('picture')->store('public/users');
        User::where('id', $id)->update('picture', $image); */

        //return redirect()->back();
        return view('user/userPage');
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
