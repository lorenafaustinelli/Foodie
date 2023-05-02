@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">            
                    <!-- Stampo le ricette nella home -->
                    @foreach ($recipe as $recipe)
                    <div class="card" style="width: 40rem;">
                        <div class="card-header text-center">
                        <h3> <a href="{{ route('recipe.show', $recipe->recipe_id)}}" class = "l"> {{ $recipe->name_recipe }} </a> </h3>
                        </div>
                        <div class="card-body">
                            <img src="{{ Storage::url($recipe->photo) }}" class="card-img-top"  alt="foto ricetta">
                        </div>
                        <ul class="list-group list-group-flush align-items-center">
                            @if($recipe->category_id2)
                            <li class="list-group-item"> <a class="btn btn-custom" href=" {{ route('category.show', $recipe->category_id )}} " role="button"> {{ $recipe->name_category1 }} </a> <a class="btn btn-custom" href="{{ route('category.show', $recipe->category_id2 )}}" role="button"> {{ $recipe->name_category2 }} </a> </li>
                            @else
                            <li class="list-group-item"> <a class="btn btn-custom" href=" {{ route('category.show', $recipe->category_id )}} " role="button"> {{ $recipe->name_category1 }} </a> </li>
                            @endif
                        </ul>
                    </div>
                    </br>
                    </br>
                    @endforeach
                    
        </div>
    </div>
</div>
@endsection
 