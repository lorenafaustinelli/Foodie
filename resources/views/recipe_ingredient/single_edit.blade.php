@extends('layouts.app')

@section('content')
<?php var_dump($recipe_ing );?>

<div class="container">
  <h2> Modifica ingrediente </h2>

  <form action="{{route('recipe_ingredient.update', $id)}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
      <div class="card">
        <div class="card-body">

              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                
              <input type ="hidden" name = "recipe_id" id="recipe_id" />

              
                <div class="form-group">
                <select class="form-control" name="ingredient_id">
                @foreach ($ingredients as $ing)
                  <option value="{{ $ing->id }}"> {{$ing->name_ingredient }} </option>
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label for="quantity"> </label>
                <input type="number"id="quantity" min="1" max="5000" class="quantity form-control" placeholder="Quantità:">
                </div>

                <div class="form-group">
                    <label for="Unità di misura:"> </label>
                    <select id="measure" class="measure form-control" name="measure">
                        @foreach ($measurements as $measurement)
                        <option value="{{ $measurement->name_measurement }}"> {{$measurement->name_measurement }} </option>
                        @endforeach
                    </select>
                </div> 

        </div>
      </div>
    </div>
    </br>
    </br>
    <div class="d-grid gap-2 col-6 mx-auto"> 
      <button type="submit" class="btn btn-primary">Concludi</button>
    </div>
  </form>

  
</div> 
 



@endsection