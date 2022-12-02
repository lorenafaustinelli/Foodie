@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                <!-- Stampo le ricette nella home -->
                @foreach ($recipes as $recipe)
                    <h3>{{ $recipe->name_recipe }}</h3>
                    {{ $recipe->photo }}    <!-- CAPIRE COME RENDERE LE IMMAGINI -->
                    <p><a href="#">{{ $recipe->instruction }}</a></p>
                @endforeach
            </div>
        </div>
    </div> 
</div>
@endsection
