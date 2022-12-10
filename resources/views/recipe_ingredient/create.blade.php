@extends('layouts.app')
<?php
  /*<input type ="hidden" name = "recipe_id" value="{{ $recipe_id }}"/> 

       var_dump($id);
  */ 
 
?>
@section('content')


<div class="container">
  <h1> E ora gli ingredienti! </h1>
   <div class="row">
       <div class="card">
            <div class="card-header">
               <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ingredientModal"> Aggiungi un ingrediente </a>
            </div> 
            <div class="card-body">
                <table id="RecipeIngredientsTable" class="table">
                    <thead>
                        <tr>
                            <th>Ingrediente </th>
                            <th>Quantità </th>
                            <th>Unità di misura </th> 
                        </tr> 
                    </thead>
                    <tbody>
                      <tr>
                        
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="ingredientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Aggiungi:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="ingredientform">

        <input type ="hidden" id="recipe_id" class="recipe_id form-control" value="{{ $id }}" >
        
        <div class="form-group">
            <label for="seleziona ingrediente"> </label>
            <select id="ingredient_id" class="ingredient_id form-control" name="ingredient_id">
                @foreach ($ingredients as $ingredient)
                  <option value="{{ $ide = $ingredient->id }}"> {{$ingredient->name_ingredient }} </option>
                @endforeach
            </select>
        </div> 

        <div class="form-group">
        <label for="quantity"> </label>
        <input type="number" id="quantity" class="quantity form-control" placeholder="Quantità:">
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

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_ingredient" > Aggiungi </button>
      </div>

      
    </div>
  </div>
</div> 
<br>
<br>
<?php 

  //per passare l'id della ricetta alla pagina delle categorie
  session()->put('id', $id); ?>
<div class="d-grid gap-2 col-6 mx-auto">
  <a class="btn btn-primary" href="{{ route('recipe_category.create') }}" role="button">Prosegui</a>
</div>

  
<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '.add_ingredient', function(e){
      e.preventDefault();
      //console.log("hello muddafakka");   ahahahah
      
      var data = {
        'recipe_id': $('.recipe_id').val(),
        'ingredient_id': $('.ingredient_id').val(),
        'quantity': $('.quantity').val(),
        'measure': $('.measure').val(),
      }
      $.ajaxSetup({

        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
          url: "{{route('recipe_ingredient.add')}}",
          type:"POST",
          data:data,
          dataType: "json",
          success:function(response)
          {
            if(response)
            {
              $("#RecipeIngredientsTable tbody").prepend('<tr><td>' + response.ingredient_id + '</td><td>' + response.quantity +'</td><td>'+ response.measure +'</td></tr>');
              $("#ingredientform")[0].reset();
              $("#ingredientModal").modal('hide');
            }
          }
        });
    });
  });
  

</script>

@endsection