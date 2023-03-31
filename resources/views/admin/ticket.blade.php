@extends('layouts.app')
@section('content') 

<style>

.list-group-item{
  width:1200px;
  height:100px;
}

</style>

<div class="container">
    <h1> Richieste ingredienti </h1>
</br> 
    @if($tickets != '')
        
        @foreach($tickets as $ticket)

        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$ticket->created_at}} </br>
                {{$ticket->text}}
                @if($ticket->status == false)

                    <a class="btn btn-warning" href="{{ route('ticket.status', $ticket->id )}}" role="button">Richiesta aperta</a>
                @else

                    <a class="btn btn-success" href="{{ route('ticket.status', $ticket->id )}}" role="button">Richiesta conclusa</a>

                @endif

            </li>
        </ul>
        </br>
        @endforeach
    @else

    <h4> Per il momento non ci sono richieste. </h4>
    @endif
</div>




@endsection