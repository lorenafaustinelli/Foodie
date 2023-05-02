@extends('layouts.app')

@section('content')

<div class="container">
    <h1> Ricette salvate da {{ Auth::user()->name }} </h1>
    </br>
    @if($recipe == '')
        <h3> Non hai salvato nessuna ricetta. </h3>
    @else
    
    <div class="grid-layout"> 
    @foreach($recipe as $recipe) <!-- Scorro tutte le ricette salvate dall'utente-->
        <div class="card card text-center" style="width: 15rem;">
            <img src="{{ Storage::url($recipe->photo) }}" class="card-img-top" width="250px" height="180px" alt="foto ricetta">
            <div class="card-body">
                <a href="{{ route('recipe.show', $recipe->recipe_id)}}" class="lb">{{ $recipe->name_recipe }}</a>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $recipe->time }} minuti</li>
            </ul>
        </div>
    @endforeach
    </div> 
    @endif

</div>

@endsection