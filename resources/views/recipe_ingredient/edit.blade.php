@extends('layouts.app')
<?php
  /*<input type ="hidden" name = "recipe_id" value="{{ $recipe_id }}"/> 
*/
?>
@section('content')

<div class="container">
  <h1> Modifica Ingredienti </h1>
   <div class="row">
       <div class="card">
            <div class="card-header">
              <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ingredientModal"> Aggiungi un ingrediente </a>
            </div> 
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ingrediente </th>
                            <th>Quantità </th>
                            <th>Unità di misura </th> 
                            <th>Modifica </th> 
                            <th>Cancella </th> 
                        </tr> 
                    </thead>
                    <tbody>
                    @foreach($recipe_ingredient ?? '' as $rp)
                      <tr>  
                        <td>  {{ $rp->ingredient_name}}</td>
                        <td>  {{ $rp->quantity }}      </td>
                        <td>  {{ $rp->measure }}       </td>
                        <td> <a href="{{ route('recipe_ingredient.single_edit', $rp->id) }}" class="text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg> </a> </td>
                    <td> <a href="{{ route('recipe_ingredient.delete_u', $rp->id) }}" class="text-decoration-none"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg> </a> </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>


<!-- Modal di inserimento -->
<div class="modal fade" id="ingredientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Aggiungi:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('recipe_ingredient.add_u') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="modal-body">

          <input type ="hidden" name="recipe_id" class="form-control" value="{{ $recipe->id }}" >


          <div class="form-group">
              <label for="seleziona ingrediente"> </label>
              <select name="ingredient_id" class="form-control" name="ingredient_id">
                  @foreach ($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}"> {{$ingredient->name_ingredient }} </option>
                  @endforeach
              </select>
          </div> 

          <div class="form-group">
          <label for="quantity"> </label>
          <input type="number" name="quantity" min="1" max="5000" class="quantity form-control" placeholder="Quantità:">
          </div>

          <div class="form-group">
              <label for="Unità di misura:"> </label>
              <select name="measure" class="measure form-control" name="measure">
                  @foreach($measurements as $measurement)
                    <option value="{{ $measurement->name_measurement }}"> {{$measurement->name_measurement }} </option>
                  @endforeach
              </select>
          </div> 


        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
          <button type="submit" class="btn btn-custom" > Aggiungi </button>
        </div>
      </form>
    </div>
  </div>
</div> 

</br>
</br>
  <!-- oggetti di sessione che vengono mandati da una pagina all'altra -->
  <div class="d-grid gap-2 col-6 mx-auto"> 

    <a class="btn btn-custom" href="{{ route('recipe_category.edit', $recipe->id) }}" role="button">Prosegui</a>

  </div>

  


@endsection