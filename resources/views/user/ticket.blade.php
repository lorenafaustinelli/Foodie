@extends('layouts.app')
@section('content') 

<style>

.list-group-item{
  width:1200px;
  height:100px;
}

</style>

<div class="container">
    <h1> Le mie richieste </h1>
</br> 
    @if($tickets != '')
        
        @foreach($tickets as $ticket)

            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$ticket->created_at}} </br>
                    {{$ticket->text}}
                <span class="badge bg-primary rounded-pill">{{ $ticket->status }}</span>
                </li>
            </ul>
            </br>
        @endforeach
    @else

    <h4> Non hai mai aperto una richiesta! Quando ne avrai aperta una potrai verificare qui come procede. </h4>
    @endif
</div>

@endsection