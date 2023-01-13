@extends('layouts.app')

@section('content')

<div class="showrecipe">
    <div class ="Title">
        <h1> {{$recipe->name_recipe}} <h1> 
    </div>

    <div class="Photo">
        <img src="{{ Storage::url($recipe->photo) }}"  alt="foto ricetta" style="width:500px;height:400px;" >
    </div>

    <div class="Info"> 
        <p> Tempo di preparazione: {{ $recipe->time }} minuti </p> 
        <p> Numero di porzioni: {{ $recipe->portion }} </p>
        <p> Categoria: {{ $category_names }} </p> 
    </div>

    <div class ="Ingredient"> 
        @foreach ($ingredient as $i)
        <p> {{ $i }}</p>
        @endforeach
    </div>

    <div class ="Instruction"> 
        <p> {{ $recipe->instruction }}</p>
    </div>





    
</div>
@endsection