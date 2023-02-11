@extends('layouts.app')

@section('content')
    
<div class="container">
    <h1> Ricette di tutti gli utenti  </h1> 
    </br>
    <div class="grid-layout"> 
    @foreach($recipe as $recipe)
        <div class="card" style="width: 18rem;">
            <!-- scorro poi le ricette corrispondenti agli id del for precedente -->
            
                <img src="{{ Storage::url($recipe->photo) }}" class="card-img-top" width="250px" height="180px" alt="foto ricetta">
                <div class="card-body">
                    <a href="{{ route('recipe.show', $recipe->id )}}" class="card-link">{{ $recipe->name_recipe }}</a>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $recipe->time }} minuti  </li> 
                </ul>
            
        </div>
    @endforeach 
    </div> 

</div>



@endsection