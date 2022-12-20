@extends('layouts.app')

@section('content')

<div class="container">
    <h1> {{$recipe->name_recipe}} <h1> 

    
    <img src="{{ asset('/storage/recipes/$recipe->photo') }}"  alt="Foto ricetta">

    <p> Tempo di preparazione: {{$recipe->time}} </p> 
    <p> Numero di porzioni: {{$recipe->portion}} </p>

    
</div>
@endsection