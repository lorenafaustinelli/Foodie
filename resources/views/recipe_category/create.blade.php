@extends('layouts.app')

@section('content')
<?php 
  //recupero id della ricetta che sto creando
  {{ $id = session()->get('id'); }}

  
  //var_dump($id);
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
          <tbody>
            
          </tbody>
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
            <label for="seleziona categoria"> </label>
            <select name="category_id" class="category_id form-control" name="category_id">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}"> {{$category->name_category }} </option>
                @endforeach
            </select>
        </div> 
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_category" > Aggiungi </button>
      </div>

      
    </div>
  </div>
</div> 
<br>
<br>
<div class="d-grid gap-2 col-6 mx-auto"> 
  <a class="btn btn-primary" href="{{ url('/home') }}" role="button">Concludi</a>
</div>

      
<script>
  $(document).ready(function() {
    $(document).on('click', '.add_category', function(e){
      e.preventDefault();

      var data = {
        'recipe_id': $('.recipe_id').val(),
        'category_id': $('.category_id').val(),        
      }

      $.ajaxSetup({

        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
          url: "{{route('recipe_category.add')}}",
          type:"POST",
          data:data,
          dataType: "json",
          success:function(response)
          {
            if(response)
            {
              $("#RecipeCategoriesTable tbody").prepend('<tr><td>' + response.category_id +'</td></tr>');
              $("#categoryform")[0].reset();
              $("#categoryModal").modal('hide');
            }
          }
        });
    });
  });
  

</script> 

@endsection