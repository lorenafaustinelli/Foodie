@extends('layouts.app')

@section('content')

<h1> E ora gli ingredienti! </h1>

<div class="container">
   <div class="row">
       <div class="card">
            <div class="card-header">
               <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ingredientModal"> Aggiungi un ingrediente </a>
            </div> 
            <div class="card-body">
                <table id="RecipeIngredientTable" class="table">
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

        <div class="form-group">
            <label for="photo2"> </label>
            <input type="text" name="ingredient" class="form-control" placeholder="Ingrediente:">
        </div>

        <div class="form-group">
        <label for="photo2"> </label>
        <input type="text" name="quantity" class="form-control" placeholder="Quantità:">
        </div>

        <div class="form-group">
        <label for="photo2"> </label>
        <input type="text" name="measure" class="form-control" placeholder="Unità di misura:">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
    $("#ingredientform").submit(function(e){
        e.preventDefault();

        //devo andare avanti a mettere i parametri
    })
</script>




@endsection