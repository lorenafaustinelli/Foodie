@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">{{ __('Your Time Line') }}</div>
                <div class="card-body">
                    <!-- Stampo le ricette nella home -->
                    @foreach ($recipes as $recipe)
                        <h3>{{ $recipe->name_recipe }}</h3>
                        <img src="$recipe->photo" alt="">     <!-- CAPIRE COME RENDERE LE IMMAGINI: devrebbe funzionare ma abbiamo solo zip e pdf -->
                        <p><a href="#">{{ $recipe->instruction }}</a></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
