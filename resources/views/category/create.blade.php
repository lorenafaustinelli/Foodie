@extends('layouts.app')

@section('content') 

<div class="container">
<h1> Nuova Categoria </h1> 
</br>
</br>
<form action="/category/store" method="POST" enctype="multipart/form-data">
        
        {{ csrf_field() }}
        
        <div class="mb-3">
        <label for="name_category" class="form-label">Nome</label>
        <input type="text" class="form-control" name="name_category">
        </div>

        </br> 

        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        </br>

        <button type="submit" class="btn btn-primary"> Conferma </button>

    </form>


</div>


@endsection