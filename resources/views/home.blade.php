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
                            <h3> <a href="{{ route('recipe.show', $recipe)}}" class="card-link"> {{ $recipe->name_recipe }} </a></h3>
                            <img src="{{ Storage::url($recipe->photo) }}" class="card-img-top"  alt="foto ricetta">
                            </br>
                            <button type="button" class="btn btn-success" disabled data-bs-toggle="button"> Categoria 1</button> <button type="button" class="btn btn-success" disabled data-bs-toggle="button"> Categoria 2</button>
                            </br>
                            </br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 