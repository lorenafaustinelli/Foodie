@extends('layouts.app')

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

        <input type ="hidden" name = "recipe_id" value="id_recipe"/>
        
        <div class="form-group">
            <label for="seleziona ingrediente"> </label>
            <select class="form-control" id="ingredient_id" name="ingredient_id">
                @foreach ($ingredients as $ingredient)
                  <option value="{{ $ingredient->id }}">{{ $ingredient->name_ingredient }} </option>
                @endforeach
            </select>
        </div> 

        <div class="form-group">
        <label for="quantity"> </label>
        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantità:">
        </div>

        <div class="form-group">
        <label for="measure"> </label>
        <input type="text" name="measure" class="form-control" id="measure" placeholder="Unità di misura:">
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"> Aggiungi </button>
      </div>

      
    </div>
  </div>
</div>

<script>
    $("#ingredientform").submit(function(e){
        e.preventDefault();
        
        let recipe_id = $("#recipe_id").val();
        let ingredient_id = $("#ingredient_id").val();
        let quantity = $("quantity").val();
        let measure = $("measure").val();
        let _token = $("input[name = _token]").val();

        $.ajax({
          url: "{{route('recipe_ingredient.add')}}",
          type:"POST",
          data:{
            recipe_id:recipe_id,
            ingredient_id:ingredient_id,
            quantity:quantity,
            measure:measure,
            _token:_token
          },
          success:function(response)
          {
            if(response)
            {
              $("#RecipeIngredientsTable tbody").prepend('<tr><td>' + response.ingredient_id + '</td><td>' + response.quantity +'</td><td>'+ response.measure +'</td></tr>')
              $("#ingredientform")[0].reset();
              $("#ingredientModal").modal('hide');
            }
          }

        });
        
    });
</script>

@endsection