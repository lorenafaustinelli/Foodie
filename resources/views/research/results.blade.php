@extends('layouts.app')

@section('content')
<div class ="container">
<h1> Risultati: </h1>

@foreach($recipe as $recipe)

<div class="grid-layout"> 
       
    <div class="card" style="width: 18rem;">
        <!-- scorro poi le ricette corrispondenti agli id del for precedente -->
        
        <img src="{{ Storage::url($recipe->photo) }}" class="card-img-top" width="250px" height="180px" alt="foto ricetta">
        <div class="card-body">
            <h5 class="card-title">{{ $recipe->name_recipe }}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $recipe->time }} minuti</li>
        </ul>
        <div class="card-body">
            <a href="{{ route('recipe.show', $recipe)}}" class="card-link"> Vedi ricetta</a>
        </div>
        
    </div>

@endforeach

</div>
@endsection