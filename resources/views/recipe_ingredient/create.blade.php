@extends('layouts.app')
<?php 
  //recupero id della ricetta che sto creando
  {{ $id = session()->get('id'); }}

  
  //var_dump($id);
?>

@section('content')


<div class="container">
  <h1>Step 2 di 3 </h1>
 <h2> Aggiungi gli ingredienti </h2>  
 <div class="d-grid gap-2 d-md-flex justify-content-md-end"><button class="btn btn-icon btn-lg" data-inline="true" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Mancano alcuni ingredienti per la tua ricetta? Richiedili all'admin da: Visualizza->Ingredienti->Richiedi ingrediente"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg></button></div> 
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
                        <td> <a href="{{ route('recipe_ingredient.single_edit_first', $rp->id) }}" class="text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg> </a> </td>
                    <td> <a href="{{ route('recipe_ingredient.delete', $rp->id) }}" class="text-decoration-none"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg> </a> </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                </br>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end"> 
                  <a class="btn btn-custom" href="{{ route('recipe_category.create', $recipe->id) }}" role="button">Prosegui</a>
                </div>
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
      <form action="{{ route('recipe_ingredient.add') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="modal-body">
          <input type ="hidden" name="recipe_id" class="recipe_id form-control" value="{{ $recipe->id }}" >

          <div class="form-group">
              <label for="seleziona ingrediente"> </label>
              <select name="ingredient_id" class="ingredient_id form-control" >
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
  <?php 
  //per passare l'id della ricetta alla pagina delle categorie
  {{ session()->put('id', $id); }} ?>
  


<script>
  $(document).ready(function(){
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
  });

</script>
  


@endsection