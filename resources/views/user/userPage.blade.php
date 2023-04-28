@extends('layouts.app')

@section('content') 

<!--Icon-->
<div class="container text-center">
	<div class="row">
		<div class="col-10">
			@if(Auth::user()->picture) <!-- Se l'utente ha gia scelto un'immagine profilo-->
				<a href="#" data-bs-toggle="modal" data-bs-target="#pictureModal"> <!-- La recuperiamo e la visualizziamo-->
					<img data-toggle="tooltip" title="Click to update your profile picture! :)" src="{{ Storage::url(Auth::user()->picture) }}" class="rounded-circle mb-3" style="width: 150px;" alt="Avatar" />
				</a>
			@else <!-- Altrimenti si visualizza un'immagine predefinita -->
				<a href="#" data-bs-toggle="modal" data-bs-target="#pictureModal">
					<!--<a href="{{ route('user.update') }}" > 
					<input type="file" name="image" >-->
					<img data-toggle="tooltip" title="Click to update your profile picture! :)" src="{{ Storage::url('public/users/default.jpg') }}" class="rounded-circle mb-3" style="width: 150px;" alt="Avatar" />
					<!--<br>   data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Update your profile picture!"
					Questa è un'icona presa da bootstrap - non so se sia utile
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
						<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
						<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
					</svg>-->
				</a>
			@endif
			<script>
				$(document).ready(function(){
				  $('[data-toggle="tooltip"]').tooltip();   
				});
			</script>
			<h5 class="mb-2"><strong>{{ Auth::user()->name}} {{Auth::user()->surname}}</strong></h5>

			<div class="container">
				<br><br>
				<h5> Le tue ricette più popolari </h5> <br>
				</br>
				<div class="grid-layout"> 
					<script> $i = 0 </script>
					@foreach($recipe as $r)
						@if($loop->index < 3) 
							<div class="card text-center" style="width: 15rem;">
								<!-- scorro poi le ricette corrispondenti agli id del for precedente -->
								
								<img src="{{ Storage::url($r->photo) }}" class="card-img-top" width="250px" height="180px" alt="foto ricetta">
								<div class="card-body">
									<a href="{{ route('recipe.show', $r->id )}}" class="lb">{{ $r->name_recipe }}</a>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item"> <a href="{{ route('recipe.edit', $r->id) }}">
									<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
									<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
									<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
									</svg> </a> </li>
									<li class="list-group-item"> <a href="{{ route('recipe.delete', $r->id) }}" class="text-decoration-none"> 
									<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
									<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
									</svg> </a> </li>
								</ul>
															
							</div>
						@else
							@break
						@endif
					@endforeach 
					
				</div> 
			    </div>
		</div>
		<div class="col-2"> <!-- Barra laterale -->
			<div class="d-flex" style="height: 750px;">
				<div class="vr"> </div>
				<p style="padding-left: 45px;">
				<div class="button">
					<div class="text-center">
						<br><br> <br> <br><br><br><br> <br>
						<!-- Modifica nome -->
						<a class="btn btn-outline-primary" role="button" href="#" data-bs-toggle="modal" data-bs-target="#nameModal">  Modifica il nome </a> <br><br><br>
						<!-- Modifica email -->
						<a class="btn btn-outline-primary" role="button" href="#" data-bs-toggle="modal" data-bs-target="#emailModal">  Modifica l'email </a> <br><br><br>
						<!-- Logout -->
						<!-- <a class="btn btn-outline-primary" role="button" href="{{ route('logout') }}"> Logout </a> <br> <br><br> -->
						<!-- Possibilità di eliminare definitivamente il profilo -->
						<a class="btn btn-outline-primary" role="button" href="{{ route('user.delete', Auth::id())}}"> Elimina l'account </a>
					</div>
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
			<form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
						<input type="file" class="form-control" id="picture" name="picture" />
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
					<input type="string" class="form-control" id="name" name="name" placeholder="Inserisci il tuo nuovo nome">
					<input type="string" class="form-control" id="surname" name="surname" placeholder="Inserisci il tuo nuovo cognome">
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
						<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Inserisci la tua nuova email">
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