@extends('layouts.app')

@section('content')


<div class="container">
  <h2> Modifica ingrediente </h2>
  <br>
  <form action="{{route('recipe_ingredient.update_first', $recipe_ing->id)}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
      <div class="card">
        <div class="card-body">

              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              
                <div class="form-group">
                <select class="form-control" name="ingredient_id">
                <option value="{{ $recipe_ing->ingredient_id }}"> {{ $recipe_ing->name_ingredient }} </option>  
                @foreach ($ingredients as $ing)
                  @if($recipe_ing->ingridient_id != $ing->id)
                    <option value="{{ $ing->id }}"> {{$ing->name_ingredient }} </option>
                  @else
                  @endif
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label for="quantity"> </label>
                <input type="number" value ="{{ $recipe_ing->quantity }}" name="quantity" min="1" max="5000" class="quantity form-control" placeholder="Quantità:">
                </div>

                <div class="form-group">
                    <label for="Unità di misura:"> </label>
                    <select name="measure" class="measure form-control" name="measure">
                    <option value="{{ $recipe_ing->measure }}"> {{$recipe_ing->measure }} </option>                      
                        @foreach ($measurements as $measurement)
                          @if($recipe_ing->measure != $measurement->name_measurement)
                            <option value="{{ $measurement->name_measurement }}"> {{$measurement->name_measurement }} </option>
                          @else
                          @endif
                        @endforeach
                    </select>
                </div> 

        </div>
      </div>
    </div>
    </br>
    </br>
    <div class="d-grid gap-2 col-6 mx-auto"> 
      <button type="submit" class="btn btn-custom">Concludi</button>
    </div>
  </form>

  
</div> 
 



@endsection