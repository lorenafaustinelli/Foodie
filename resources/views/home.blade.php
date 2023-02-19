@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">            
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>
                <div class="card-body">
                    <!-- Stampo le ricette nella home -->
                    @foreach ($recipes as $recipe)
                    <div class="card">
                        <div class="card-header text-center">
                        <h3> <a href="{{ route('recipe.show', $recipe)}}" class = "l"> {{ $recipe->name_recipe }} </a> </h3>
                        </div>
                        <div class="card-body">
                            <img src="{{ Storage::url($recipe->photo) }}" class="card-img-top"  alt="foto ricetta">
                        </div>
                        <ul class="list-group list-group-flush align-items-center">
                            <li class="list-group-item"> <button type="button" class="btn btn-success" disabled data-bs-toggle="button"> Categoria 1</button> <button type="button" class="btn btn-success" disabled data-bs-toggle="button"> Categoria 2</button></li>
                        </ul>   
                        
                    </div>
</br>
</br>
                    @endforeach
                    
                </div>
                </br>
                    </br>
            </div>
        </div>
    </div>
</div>
@endsection
 