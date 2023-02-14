@extends('layouts.app')

@section('content') 

<!--Icon-->
<div class="container text-center">
	<div class="row">
		<div class="col-10">
			@if(Auth::user()->picture) <!-- Se l'utente ha gia scelto un'immagine profilo-->
				<a href="{{ route('user.update') }}"> <!-- La recuperiamo e la visualizziamo-->
					<img src="{{ Storage::url(Auth::user()->picture) }}" class="rounded-circle mb-3" style="width: 150px;" alt="Avatar" />
				</a>
			@else <!-- Altrimenti si visualizza un'immagine predefinita -->
				<a href="#" data-bs-toggle="modal" data-bs-target="#pictureModal">
					<!--<a href="{{ route('user.update') }}" > 
					<input type="file" name="image" >-->
					<img data-toggle="tooltip" title="Click to update your profile picture! :)" src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-circle mb-3" style="width: 150px;" alt="Avatar" />
						<!--<br>   data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Update your profile picture!"
						Questa è un'icona presa da bootstrap - non so se sia utile
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
							<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
							<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
						</svg>-->
				</a>

				<script>
					$(document).ready(function(){
					  $('[data-toggle="tooltip"]').tooltip();   
					});
				</script>
			@endif
			<h5 class="mb-2"><strong>{{ Auth::user()->name}} {{Auth::user()->surname}}</strong></h5>
		</div>
		<div class="col-2"> <!-- Barra laterale -->
			<div class="d-flex" style="height: 750px;">
				<div class="vr"> </div>
				<p style="padding-left: 30px;">
				<div class="text-center">
					<br><br> <br> <br><br><br><br> <br>
					<!-- Modifica nome -->
					<a href="#" data-bs-toggle="modal" data-bs-target="#nameModal" class="text-success"> <strong> Modifica il nome </strong></a> <br><br><br>
					<!-- Modifica email -->
					<a href="#" data-bs-toggle="modal" data-bs-target="#emailModal" class="text-success"> <strong> Modifica l'email </strong></a> <br><br><br>
					<!-- Logout -->
					<a href="{{ route('logout') }}" class="text-success"> <strong>Logout</strong> </a> <br> <br><br>
					<!-- Possibilità di eliminare definitivamente il profilo -->
					<a href="{{ route('user.delete', Auth::id())}}" class="text-success"> <h6 class="mb-2"> <strong>Elimina l'account</strong> </h6> </a>
					
				</div>
				</a>
				</div>
		</div>
	</div>
</div>

<!-- Modals -->

<div class="modal fade" id="pictureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Aggiungi:</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{ route('user.update') }}" method="POST">
				@csrf
				<div class="modal-body">
						<label class="form-label" for="customFile">Default file input example</label>
						<input type="file" class="form-control" id="customFile" name="picture" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" > Aggiungi </button>
				</div>
			</form>
		</div>
	</div>
</div> 

<div class="modal fade" id="nameModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Aggiungi:</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{ route('user.update') }}" method="POST">
				@csrf
				<div class="modal-body">
					<label class="form-label" for="customFile"> Vuoi cambiare nome? </label>
					<input type="string" class="form-control" id="name"  placeholder="Inserisci il tuo nuovo nome">
					<input type="string" class="form-control" id="surname"  placeholder="Inserisci il tuo nuovo cognome">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" > Aggiungi </button>
				</div>
			</form>
		</div>
	</div>
</div> 

<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Aggiungi:</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{ route('user.update') }}" method="POST">
				@csrf
				<div class="modal-body">
						<label class="form-label" for="customFile"> Hai una nuova email? </label>
						<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Inserisci la tua nuova email">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" > Aggiungi </button>
				</div>
			</form>
		</div>
	</div>
</div> 

@endsection