@extends('layouts.app')

@section('content')
<div class ="container">
<h1> Risultati: </h1>

@foreach($recipe as $recipe)

<p> {{ $recipe->name_recipe }} </p>


@endforeach

</div>
@endsection