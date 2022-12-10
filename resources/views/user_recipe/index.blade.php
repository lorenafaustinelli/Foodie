@extends('layouts.app')

@section('content')


<div class="container">
    <h1> Ricette create da {{ Auth::user()->name }} </h1>
    </br>
        <!-- scorro gli id delle ricette scritte dall'utente -->
        @foreach($users_recipes as $ur)
        
            <!-- scorro poi le ricette corrispondenti agli id del for precedente -->
            @foreach($recipes->where('id', '=', $ur) as $recipe)

                <!-- stampo il nome -->
                <h4> {{ $recipe->name_recipe }} </h4>
                <a href="{{ route('recipe.show', $ur)}}"> vedi ricetta </a>
                </br>
                </br>



            @endforeach

        @endforeach

        @endsection
</div>