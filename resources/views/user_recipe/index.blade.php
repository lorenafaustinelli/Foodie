@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <h1> Ricette create da {{ Auth::user()->name }} </h1> 
    <br>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-custom " data-bs-toggle="modal" data-bs-target="#FilterModal"> Filtri </button>
        <a class="btn btn-custom" href="{{ route('user.recipe') }}" role="button">Resetta filtri</a> 
    </div>
    <br> <br>
    <div class="grid-layout"> 
    @foreach($recipe as $r) <!-- scorro gli id delle ricette scritte dall'utente --> 
        <div class="card text-center" style="width: 15rem;">
            <!-- scorro poi le ricette corrispondenti agli id del for precedente -->
            
            <img src="{{ Storage::url($r->photo) }}" class="card-img-top" width="250px" height="180px" alt="foto ricetta">
            <div class="card-body">
                <a href="{{ route('recipe.show', $r->id )}}"  class = "lb">{{ $r->name_recipe }}</a>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"> <a href="{{ route('recipe.edit', $r->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg> </a> </li>
                <li class="list-group-item"> <a href="{{ route('recipe.delete', $r->id) }}" class="text-decoration-none"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                </svg> </a> </li>
            </ul>
                                         
        </div>
    @endforeach
    </div> 
</div>

<!-- Modal -->
<div class="modal fade" id="FilterModal" tabindex="-1" aria-labelledby="FilterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="FilterModalLabel">Filtri</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{ route('user_recipe.filter_index') }}" method="GET" enctype="multipart/form-data">

            <div class="modal-body">
                
                <div class="container">
                <h5> Tempo di preparazione massimo: </h5>
                    <input type="number" min="0" max="600" step="5" class="form-control" name="time" placeholder="minuti" id="time" >
                    <br>
                </div>
                <div class="container">
                <h5> Categorie: </h5> 
                    <select id="category_id1" class="form-select" aria-label="Default select example" name="category_id1">
                    <option selected></option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}"> {{$cat->name_category }} </option>
                    @endforeach
                    </select>
                </div> 
                <br>
                <div class="container">
                    <select id="category_id2" class="form-select" aria-label="Default select example" name="category_id2">
                    <option selected></option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}"> {{$cat->name_category }} </option>
                    @endforeach
                    </select>
                </div> 
                <br>
                <div class="container">
                    <h5> Ingrediente: </h5> 
                    <select id="ingredient_id" class="form-select" aria-label="Default select example" name="ingredient_id">
                    <option selected></option>
                        @foreach ($ingredients as $ing)
                        <option value="{{ $ing->id }}"> {{$ing->name_ingredient }} </option>
                        @endforeach
                    </select>
                </div> 

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="submit" class="btn btn-custom">Visualizza</button>
            </div>
        </form>
    </div>
  </div>
</div>

@endsection