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
        <table> 
        <tbody>

        @foreach ($recipe_ing as $i)
            <tr>

            <td>  {{ $i->name_ingredient }} </td> 

            <td> {{ $i->quantity }} </td> 

            <td> {{ $i->measure }} </td> 

            </tr>
        @endforeach 
        
        </tbody>
        </table>
        <p> Numero di porzioni: {{ $recipe->portion }} </p>
    </div>

    <div class ="Instruction">

       
            <p> Categoria: {{ $category_names }} </p> 
            <p> Tempo di preparazione: {{ $recipe->time }} minuti </p>
            <h5> Preparazione </h5> {{ $recipe->instruction }}</p> </div> <!-- tenere </div> qui perchè sennò si disallinea testo -->
            
        


       
</div>
@endsection