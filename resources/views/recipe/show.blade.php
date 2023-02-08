@extends('layouts.app')

@section('content')

<div class="showrecipe">
    <div class ="Title">
        <h1> {{$recipe->name_recipe}} <h1> 
    </div>

    <div class="Button">
        @if($saved_recipes->where('user_id', '=', Auth::user()->id)->where('recipe_id', '=', $recipe))
            <a class="btn btn-success" role="button" href=""> Salvata </a>
        @else
            <a class="btn btn-success" role="button" href="{{ route('recipe.save', $recipe->id)}}"> Salva ricetta </a>
        @endif
    </div>

    <div class="Photo">
        <img src="{{ Storage::url($recipe->photo) }}"  alt="foto ricetta" style="width:500px;height:400px;" >
    </div>

    <div class ="Ingredient"> 
        <h5> Ingredienti </h5>
        <table id="RecipeShowIngredients" width="300">
        <tbody>
        </br>
        <p> Numero di porzioni: <input type="number" size="1" id="portion" value="{{ $recipe->portion }}" min="1" max = "10" > </p>
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

<script>
$(document).ready(function() {
    $(#portion).change(function(){

      var portion = $('.portion').val();
      alert(portion);
      console.log("hello muddafakka");

    });
  });
  
</script>
@endsection