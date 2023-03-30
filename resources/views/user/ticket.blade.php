@extends('layouts.app')
@section('content') 

<div class="container">
    <h1> Le mie richieste </h1>

    @foreach($tickets as $ticket)

        <p> id richiesta: {{ $ticket->id }} </p> 
    @endforeach
</div>

@endsection