
@extends('layouts.app')

@section('content')
<!-- <link href = "{{ asset('css/stile.css')}}" rel = "stylesheet"> -->
<div class="container">
<?php //view per inserire una nuova ricetta, mancano gli ingredienti ?>
<h1> Inserisci una nuova ricetta: </h1>
</br>
</br>
    


    <form action="{{ URL::action('RecipeController@store') }}" method="POST" enctype="multipart/form-data">
        
        {{ csrf_field() }}
        
        <div class="form-group">
            <label for="name_recipe"> </label>
            <input type="text" name="name_recipe" placeholder="Nome ricetta:"> 
        </div>

        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        </br>

        <div class="form-group">
            <label for="Tempo"> </label>
            <input type="number" name="time" placeholder="Tempo di preparazione in minuti:">
        </div>

        </br>

        <div class="form-group">
            <label for="Numero di porzioni"> </label>
            <input type="number" name="portion" placeholder="Numero di porzioni:">
        </div>

        </br>

        <div class="form-group">
            <label for="Istruzioni:"> </label>
            <textarea rows="5" cols="50" name="instruction" placeholder="Istruzioni:">
            </textarea>
        </div>
        <!-- mancano i tag -->
        </br>

        <div class="form-group">
            <label for="photo_1"> </label>
            <input type="file" name="photo" class="form-control" placeholder="Foto:">
        </div>
        
        <input type ="hidden" name = "user_id" value="{{ Auth::user()->id }}"/>
       
        </br>

        <button type="submit" class="btn btn-primary"> Crea e salva!</button>

    </form>


</div>
@endsection