@extends('layouts.app')

@section('content') 

<!--Icon-->
<div class="container text-center">
	<div class="row">
		<div class="col-10">
			<img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-circle mb-3" style="width: 150px;" alt="Avatar" />
			<h5 class="mb-2"><strong>{{ Auth::user()->name}} {{Auth::user()->surname}}</strong></h5>
			<p class="text-muted">Web designer <span class="badge bg-primary">PRO</span></p>
		</div>
		<div class="col-2"> <!-- Barra laterale -->
			prova 
		</div>
	</div>
</div>

<!--Breve descrizione dell'utente-->
<!--Informazioni sull'utente: nome, cognome, email, indirizzo-->
<!--Possibilità di eliminare definitivamente il profilo-->
<!--Conteggio delle ricette scritte-->
<!--Numero delle ricette salvate da altri-->
@endsection