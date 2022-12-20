@extends('layouts.app')

@section('content')

<div class="container">
    <h1> {{$recipe->name_recipe}} <h1> 

    
    <img src="{{ Storage::url($recipe->photo) }}"  alt="foto ricetta" style="width:500px;height:400px;" >
    </br>
    </br>
    <p> Tempo di preparazione: {{$recipe->time}} </p> 
    </br>
    <p> Numero di porzioni: {{$recipe->portion}} </p>

    
</div>
@endsection