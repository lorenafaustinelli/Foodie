@extends('layouts.app')

@section('content')

<div class="container">
  <h1> Ricerca avanzata </h1> 
  </br>


  <form action="{{ url('advanced_search') }}" method="GET" role="advanced_search">
  
  <h4> Nome: </h4> 
  <div class="form-group">
  <div class="row mb-3">
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name_recipe">
    </div>
  </div>
  </div>
  </br>
  <h4> Tempo di preparazione massimo: </h4> 
  <div class="form-group">
  <div class="row mb-3">
    <div class="col-sm-10">
      <input type="number" min="0" max="600" step="5" class="form-control" name="time" placeholder="minuti" id="time" >
    </div>
  </div>
  </div>
  </br>
  <h4> Categorie: </h4> 
  <div class="form-group">
    <div class="w-25">
      <select id="category_id1" class="form-select" aria-label="Default select example" name="category_id1">
      <option selected></option>
        @foreach ($categories as $cat)
          <option value="{{ $cat->id }}"> {{$cat->name_category }} </option>
        @endforeach
      </select>
    </div>
  </div> 
  <div class="form-group">
    <div class="w-25">
      <select id="category_id2" class="form-select" aria-label="Default select example" name="category_id2">
      <option selected></option>
        @foreach ($categories as $cat)
          <option value="{{ $cat->id }}"> {{$cat->name_category }} </option>
        @endforeach
      </select>
    </div>
  </div> 
  </br>
  <h4> Ingredienti: </h4> 
    <div class="form-group">
      <div class="w-25">
        <select id="ingredient_id1" class="form-select" aria-label="Default select example" name="ingredient_id1">
        <option selected></option>
          @foreach ($ingredients as $ing)
            <option value="{{ $ing->id }}"> {{$ing->name_ingredient }} </option>
          @endforeach
        </select>
      </div>
    </div> 
    <div class="form-group">
      <div class="w-25">
        <select id="ingredient_id2" class="form-select" aria-label="Default select example" name="ingredient_id2">
        <option selected></option>
          @foreach ($ingredients as $ing)
            <option value="{{ $ing->id }}"> {{$ing->name_ingredient }} </option>
          @endforeach
        </select>
      </div>
    </div> 
    </br>
    </br>

    <div class="d-grid gap-2 col-6 mx-auto">
      <button class="btn btn-outline-success" type="submit">Cerca</button>
    </div>
  </form> 
    


</div>


@endsection         