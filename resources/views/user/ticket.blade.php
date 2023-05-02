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

                  {{$ticket->created_at->format('d M Y - H:i')}} </br>
                  {{$ticket->text}}
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#statusModal-{{$ticket->id}}">
                  Stato richiesta
                  </button>

                </li>
            </ul>
            </br>
        @endforeach
    @else

    <h4> Non hai mai aperto una richiesta! Quando ne avrai aperta una potrai verificare qui come procede. </h4>
    @endif
</div>


<!-- Modal -->
@if($tickets != '')
@foreach($tickets as $ticket)

<div class="modal fade" id="statusModal-{{$ticket->id}}" tabindex="-1" aria-labelledby="statusModalLabel-{{$ticket->id}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="statusModalLabel-{{$ticket->id}}">Richiesta #{{$ticket->id}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <div class="modal-body">

            <p> <b> {{ $ticket->message }} </b> </p>
            <p> <b> Tipo richiesta: </b> Inserimento {{ $ticket->type }}</p>
            <p> <b> Motivazione: </b> {{ $ticket->result }} </p>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
        </div>
        
    </div>
  </div>
</div>

@endforeach
@endif


@endsection