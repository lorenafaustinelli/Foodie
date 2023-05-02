@extends('layouts.app')
@section('content') 

<style>

.list-group-item{
  width:1200px;
  height:100px;
}

</style>

<div class="container">
    <h1> Richieste concluse</h1>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <p> <a href="{{ route('ticket_index.adm') }}"> Vai alle richieste aperte </a> </p>
    </div>
    @if($close_tickets == '') 
        <h4> Per il momento non hai completato delle richieste. </h4>
        
    @else

        @foreach($close_tickets as $op)

            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    
                    Richiesta #{{$op->id}} - {{$op->created_at->format('d M Y - H:i')}} {{$op->user_name}} </br>
                    {{$op->text}}
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestModal-{{$op->id}}">
                        Gestisci richiesta 
                    </button>

                </li>
            </ul>
            </br>
        @endforeach

    @endif
</div>

<!-- Modal -->

@if($close_tickets != '')
@foreach($close_tickets as $ticket)
<div class="modal fade" id="requestModal-{{$ticket->id}}" tabindex="-1" aria-labelledby="requestModalLabel-{{$ticket->id}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="requestModalLabel-{{$ticket->id}}">Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('ticket.update', $ticket->id) }}" method="POST" enctype="multipart/form-data">
		@csrf

        <div class="modal-body">
            <p> <b> Tipo richiesta: </b> {{$ticket->type}}</p>
            <div class="form-check">
                <input class="form-check-input" value="0" type="radio" name="status" id="status" <?php if($ticket->status == 0){ echo 'checked'; }?> >
                <label class="form-check-label" for="status">
                    Richiesta aperta
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="1" type="radio" name="status" id="status" <?php if($ticket->status == 1){ echo 'checked'; }?>>
                <label class="form-check-label" for="status">
                    Richiesta conclusa
                </label>
            </div>
            </br>
            <p> <b> Esito: </b> </p>

            <input type="text" class="form-control" name="result" value="{{ $ticket->result }}">

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
            <button type="submit" class="btn btn-primary">Salva</button>
        </div>
        
      </form>
    </div>
  </div>
</div>
@endforeach


@endif






@endsection