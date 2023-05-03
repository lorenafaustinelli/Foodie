@extends('layouts.app')

@section('content')
<?php 
  //recupero id della ricetta che sto creando
 {{ $id = session()->get('id');}}


?>

<div class="container">
  <h1> Ultimo step! </h1>
  <h2>Associa almeno una categoria alla tua ricetta </h2>

  <form action="{{route('recipe_category.add')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row">
      <div class="card">
        <div class="card-body">

          <input type ="hidden" name="recipe_id" class="form-control" value="{{ $recipe->id }}" >

          <div class="form-group">
                <select name="category_id" class="form-control" >
                  <option value="" disabled selected>Prima categoria*:</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{$category->name_category }} </option>
                  @endforeach
                </select>
          </div> 

          <div class="form-group">
              <select name="category_id2" class="form-control" >
                <option value="" disabled selected>Seconda categoria:</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}"> {{$category->name_category }} </option>
                @endforeach
              </select>
          </div> 
          <br>
          <div class="d-grid gap-2 col-6 mx-auto"> 
            <button type="submit" class="btn btn-custom">Concludi</button>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    
  </form>
</div> 
 



@endsection