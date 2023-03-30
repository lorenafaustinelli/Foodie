@extends('layouts.app')

@section('content')

<div class="showrecipe">
    <div class ="Title">
        <h1> {{$recipe->name_recipe }}<h1>
    </div>

    <div class="Button">
        @foreach($user_id as $id) <!-- Per estrarre il valore dall'array, non è un vero ciclo, avrà sempre un solo giro-->
        @if($id != Auth::id()) <!-- Senza il foreach mi dava Object of class Illuminate\Support\Collection could not be converted to int -->
            @if($saved_recipes->where('user_id', Auth::id())->where('recipe_id', $recipe->id)->count() > 0)
                <a class="btn btn-success" role="button" href="{{ route('recipe.destroy', $recipe->id)}}"> Salvata </a>
            @else
                <a class="btn btn-success" role="button" href="{{ route('recipe.save', $recipe->id)}}"> Salva ricetta </a>
            @endif
        @else
            <a class="btn btn-success" role="button" href="{{ route('recipe.edit', $recipe->id) }}"> Modifica </a>
        @endif
        @endforeach
    </div>

    <div class="Photo">
        <img src="{{ Storage::url($recipe->photo) }}"  alt="foto ricetta" style="width:500px;height:400px;" >
    </div>

    <div class ="Ingredient"> 
        <h5> Ingredienti </h5>
        <table id="RecipeShowIngredients" width="300">
        <tbody>
        </br>
        <p> Numero di porzioni: <input type="number" size="1" id="portion" name="portion" value="{{ $recipe->portion }}" min="1" max = "20" > </p>
        @if($recipe_ing != '')
            @foreach ($recipe_ing as $i)
                <tr>

                <td> {{ $i->name_ingredient }} </td> 

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

<?php
foreach($recipe_ing as $rp){
    $quantity = $rp->quantity;
}
?>

<script>
$(document).ready(function() {
    $(portion).change(function(e){
        e.preventDefault();

        var data = {
            'portion': $('#portion').val(),
            recipe_ing : JSON.stringify(<?php echo $recipe_ing ?>), 
            
        }
        
        //console.log(data);
        $.ajaxSetup({

            headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
          url: "{{route('recipe_ingredient.change.quantity')}}",
          type:"POST",
          data:data,
          dataType: "json",
          success:function(recipe_ing)
          {
            if(recipe_ing)
            {   
                $("#RecipeShowIngredients tbody").html('');
                //console.log(recipe_ing);
                $.each(JSON.parse(recipe_ing), function(key, value){
                    $("#RecipeShowIngredients tbody").append(
                    $('<tr>')
                        .html('<td>' + value.name_ingredient + '</td><td>' + value.quantity +'</td><td>'+ value.measure +'</td>')
                    );
                })
                
            }
          }
        });

    });
  });
  
</script>
@endsection