@extends('layouts.app')

@section('content') 
<div class="container"> 
<div id="alerts"> </div>
</div>
<div class="ingredient_index">
    <div class="headers">
        <div class="title"> 
            <h1> Ingredienti </h1>
            </br>
        </div>
        <div class="button">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#TicketModal" >Richiedi ingrediente</button>
            </div>
        </div>
    </div>
  </br>
<div class="table_ing">
   <div class="row">
       <div class="card">
            <div class="card-body">
                <table id="IngredientsTable" class="table">
                    <thead>
                        <tr>
                            <th>Ingrediente </th>
                            <th>Variazione </th>
                        </tr> 
                    </thead>
                    <tbody>
                      @foreach($ingredients as $ingredient)
                      <tr>
                      <td> {{ $ingredient->name_ingredient}} </td>
                      <td> {{ $ingredient->variation }} </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="TicketModal" tabindex="-1" aria-labelledby="TicketModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="TicketModalLabel">Richiedi l'inserimento di un ingrediente:</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="ticket_form">
            @csrf
            <div class="modal-body">
              <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}"/>
              <input type="hidden" name="type" id="type" value="ingrediente"/>
              </br>
              <input type="text" class="form-control" placeholder="descrivi la tua richiesta" name="text" id="text" />
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="button" class="btn btn-primary add_ticket" > Aggiungi </button>
            </div>
        </form>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $(document).on('click', '.add_ticket', function(e){
      e.preventDefault();
      //console.log("hello muddafakka");
      
      var data = {
        'user_id': $('#user_id').val(),
        'type': $('#type').val(),
        'text': $('#text').val(),
      }

      $.ajaxSetup({

        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
          url: "{{ route('ticket.store') }}",
          type:"POST",
          data:data,
          dataType: "json",
          success:function(response)
          {
            if(response)
            {
              $("#TicketModal").modal('hide');
              insert_success();
            }
          }
        });
    });

    function insert_success(){
      $('#alerts').append(
        '<div class="alert alert-success alert-dismissible fade show" role="alert">' 
        +'Richiesta inviata correttamente <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">' +
         '</div>'
      );
    }
  });
  

</script>

@endsection

