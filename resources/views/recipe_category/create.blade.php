@extends('layouts.app')

@section('content')
<?php 
  {{ $id = session()->get('id'); }}

  //per passare l'id ricetta che si sta creando
  var_dump($id);
?>

<div class="container">
  <h1> Ultimo step! </h1>
  <h2> Associa le categorie corrispondendi alla tua ricetta </h2>
  <div class="row">
    <div class="card">
      <div class="card-header">
        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#categoryModal"> Specifica una categoria </a>
      </div> 
      <div class="card-body">
        <table id="RecipeCategoriesTable" class="table">
          <thead>
            <tr>
              <th>Categoria </th>
            </tr> 
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Aggiungi:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="categoryform">

        <input type ="hidden" name="recipe_id" class="recipe_id form-control" value="{{ $id }}" >
        
        <div class="form-group">
            <label for="seleziona ingrediente"> </label>
            <select name="ingredient_id" class="ingredient_id form-control" name="ingredient_id">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}"> {{$category->name_category }} </option>
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
<div class="d-grid gap-2 col-6 mx-auto">
  <a class="btn btn-primary" href="{{ route('recipe_category.create') }}" role="button">Prosegui</a>
</div>

<?php /*
      
<script>
  $(document).ready(function() {
    $(document).on('click', '.add_ingredient', function(e){
      e.preventDefault();
      //console.log("hello muddafakka");   ahahahah

      var data = {
        
      }

      $.ajaxSetup({

        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      //console.log(data);  
      $.ajax({
          url: "{{route('recipe_ingredient.add')}}",
          type:"POST",
          data:data,
          dataType: "json",
          success:function(response)
          {
            if(response)
            {
              $("#RecipeIngredientsTable tbody").prepend('<tr><td>' + response. + '</td><td>' + response.quantity +'</td><td>'+ response.measure +'</td></tr>')
              $("#ingredientform")[0].reset();
              $("#ingredientModal").modal('hide');
            }
          }
        });
    });
  });
  

</script> */ ?>

@endsection