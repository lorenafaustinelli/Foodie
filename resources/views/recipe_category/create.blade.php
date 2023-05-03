@extends('layouts.app')

@section('content')
<?php 
  //recupero id della ricetta che sto creando
 {{ $id = session()->get('id');}}


?>

<div class="container">
  <h1> Ultimo step! </h1>
  <h2>Associa almeno una categoria alla tua ricetta </h2>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end"><button class="btn btn-icon btn-lg" data-inline="true" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Manca la categoria perfetta per la tua ricetta? Richiedila all'admin dalla sezione di visualizzazione delle categorie"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg></button></div> 
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
          *campi obbligatori
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
 
<script>
  $(document).ready(function(){
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
  });

</script>


@endsection