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
				<a href="{{ route('user.update') }}" > 
				<img data-toggle="tooltip" title="Update your profile picture! :)" src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-circle mb-3" style="width: 150px;" alt="Avatar" />
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
				<div class="vr"></div>
			</div>
		</div>
	</div>
</div>

<!--Breve descrizione dell'utente-->
<!--Informazioni sull'utente: nome, cognome, email, indirizzo-->
<!--Possibilità di eliminare definitivamente il profilo-->
<!--Conteggio delle ricette scritte-->
<!--Numero delle ricette salvate da altri-->
@endsection