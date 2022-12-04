@extends('layouts.app')

@section('content') 

<div class="container">
<h1> Nuovo Ingrediente </h1> 
</br>
</br>
<form action="/ingredient/store" method="POST" enctype="multipart/form-data">
        
        {{ csrf_field() }}
        
        <div class="mb-3">
        <label for="name_ingredient" class="form-label">Nome</label>
        <input type="text" class="form-control" name="name_ingredient">
        </div>

        </br> 


        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        </br>

        <div class="mb-3">
        <label for="variation" class="form-label">Variazione</label>
        <input type="text" class="form-control" name="variation">
        </div>

        </br>

        <button type="submit" class="btn btn-primary"> Conferma </button>

    </form>


</div>


@endsection