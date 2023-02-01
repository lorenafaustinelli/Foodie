@extends('layouts.app')

@section('content')

<div class="showrecipe">
    <div class ="Title">
        <h1> {{$recipe->name_recipe}} <h1> 
    </div>

    <div class="Button">
            <a class="btn btn-success" href="#" role="button">Salva ricetta</a>
    </div>

    <div class="Photo">
        <img src="{{ Storage::url($recipe->photo) }}"  alt="foto ricetta" style="width:500px;height:400px;" >
    </div>

    <div class ="Ingredient"> 
        <h5> Ingredienti </h5>
        <table width="300">
        <tbody>
    @if($recipe_ing != '')
        @foreach ($recipe_ing as $i)
            <tr>

            <td>  {{ $i->name_ingredient }} </td> 

            <td> {{ $i->quantity }} </td> 

            <td> {{ $i->measure }} </td> 

            </tr>
        @endforeach 
    @else 

    @endif
        </tbody>
        </table>
        </br>
        <p> Numero di porzioni: {{ $recipe->portion }} </p>
        
    </div>
    <div class ="Instruction">
    @if($recipe_category != '')

       
            <p> Categoria: @foreach($recipe_category as $cat)  {{ $cat->name_category }} @endforeach </p> 
            <p> Tempo di preparazione: {{ $recipe->time }} minuti </p>
            <h5> Preparazione </h5> {{ $recipe->instruction }}</p> </div> <!-- tenere </div> qui perchè sennò si disallinea testo -->
            
    @else

            <p> Tempo di preparazione: {{ $recipe->time }} minuti </p>
            <h5> Preparazione </h5> {{ $recipe->instruction }}</p> </div> <!-- tenere </div> qui perchè sennò si disallinea testo -->


    @endif


       
</div>
@endsection