@extends('layouts.app')

@section('content')


<div class="container">
    <h1> Ricette create da {{ Auth::user()->name }} </h1>
    <!-- scorro gli id delle ricette scritte dall'utente -->  
    <div class="grid-layout"> 
    @foreach($users_recipes as $ur)
        
       
        <div class="card" style="width: 18rem;">
            <!-- scorro poi le ricette corrispondenti agli id del for precedente -->
            @foreach($recipes->where('id', '=', $ur) as $recipe)
            <img src="{{ Storage::url($recipe->photo) }}" class="card-img-top" alt="foto ricetta">
            <div class="card-body">
                <h5 class="card-title">{{ $recipe->name_recipe }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $recipe->time }} minuti</li>
            </ul>
                @endforeach
            <div class="card-body">
                <a href="{{ route('recipe.show', $ur)}}" class="card-link"> Vedi ricetta</a>
            </div>
            
        </div>
        
    @endforeach
    </div> 

</div>

@endsection