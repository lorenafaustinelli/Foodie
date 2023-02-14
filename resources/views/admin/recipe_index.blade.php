@extends('layouts.app')

@section('content')
    
<div class="container">
    <h1> Ricette di tutti gli utenti  </h1> 
    </br>
    <div class="grid-layout"> 
    @foreach($recipe as $recipe)
        <div class="card card text-center" style="width: 18rem;">
            <!-- scorro poi le ricette corrispondenti agli id del for precedente -->
            
                <img src="{{ Storage::url($recipe->photo) }}" class="card-img-top" width="250px" height="180px" alt="foto ricetta">
                <div class="card-body">
                    <a href="{{ route('recipe.show', $recipe->id )}}" class="card-link">{{ $recipe->name_recipe }}</a>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $recipe->time }} minuti  </li> 
                    <li> <a href="{{ route('recipe.delete', $recipe->id) }}" class="text-decoration-none"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                        </svg> 
                    </a> </li>
                </ul>
            
        </div>
    @endforeach 
    </div> 

</div>