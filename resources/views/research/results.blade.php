@extends('layouts.app')

@section('content')
<div class ="container">

@if($recipe->isEmpty())
<h2> La ricerca non ha prodotto risultati. </h2>
@else 
<h1> Risultati: </h1>
</br>
<div class="container">
    </br>
    <div class="grid-layout"> 
    @foreach($recipe as $recipe)
        <div class="card text-center" style="width: 15rem;">
            <!-- scorro poi le ricette corrispondenti agli id del for precedente -->
            
                <img src="{{ Storage::url($recipe->photo) }}" class="card-img-top" width="250px" height="180px" alt="foto ricetta">
                <div class="card-body">
                    <a href="{{ route('recipe.show', $recipe->id )}}" class="lb">{{ $recipe->name_recipe }}</a>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $recipe->time }} minuti  </li> 
                </ul>
            
        </div>
    @endforeach 
    </div> 

</div>

@endif

</div>
@endsection