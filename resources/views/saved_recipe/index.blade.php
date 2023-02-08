@extends('layouts.app')

@section('content')

<div class="container">
    <h1> Ricette salvate da {{ Auth::user()->name }} </h1>
    <div class="grid-layout"> 
    @foreach($saved_recipes->where('user_id', '=', Auth::user()->id) as $us) <!-- Scorro tutte le ricette salvate -->
            @foreach($recipes->where('id', '=', $us->recipe_id) as $recipe) <!-- Prendo da recipe le ricette --> 
                    <div class="card" style="width: 18rem;">
                        <img src="{{ Storage::url($recipe->photo) }}" class="card-img-top" width="250px" height="180px" alt="foto ricetta">
                        <div class="card-body">
                            <a href="{{ route('recipe.show', $us->recipe_id)}}" class="card-link">{{ $recipe->name_recipe }}</a>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $recipe->time }} minuti</li>
                        </ul>
                    </div>
            @endforeach
    @endforeach
    </div> 

</div>

@endsection