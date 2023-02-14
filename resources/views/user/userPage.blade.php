<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8|7 Drag And Drop File/Image Upload Examle </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    
</head>
<body>
    
    </div>
</body>
</html>

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
				<div class="vr"></div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->

<div class="modal fade" id="pictureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Aggiungi:</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<!-- Definisco la drop zone-->
				<div id="dropzone">
					<form action="{{ route('user.update') }}" class="dropzone" id="file-upload" enctype="multipart/form-data">
						@csrf
						<div class="dz-message">
							Drag and Drop your new profile picture! :) <br>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button href="{{ route('user.update') }}" type="button" class="btn btn-primary add_ingredient" > Aggiungi </button>
			</div>
		</div>
	</div>
</div> 

<script>
        var dropzone = new Dropzone('#file-upload', {
            previewTemplate: document.querySelector('#preview-template').innerHTML,
            parallelUploads: 1,
            thumbnailHeight: 150,
            thumbnailWidth: 150,
            maxFilesize: 5,
            filesizeBase: 1500,
            thumbnail: function (file, dataUrl) {
                if (file.previewElement) {
                    file.previewElement.classList.remove("dz-file-preview");
                    var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                    for (var i = 0; i < images.length; i++) {
                        var thumbnailElement = images[i];
                        thumbnailElement.alt = file.name;
                        thumbnailElement.src = dataUrl;
                    }
                    setTimeout(function () {
                        file.previewElement.classList.add("dz-image-preview");
                    }, 1);
                }
            }
        });
        
        var minSteps = 6,
            maxSteps = 60,
            timeBetweenSteps = 100,
            bytesPerStep = 100000;
            dropzone.uploadFiles = function (files) {
            var self = this;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));
                for (var step = 0; step < totalSteps; step++) {
                    var duration = timeBetweenSteps * (step + 1);
                    setTimeout(function (file, totalSteps, step) {
                        return function () {
                            file.upload = {
                                progress: 100 * (step + 1) / totalSteps,
                                total: file.size,
                                bytesSent: (step + 1) * file.size / totalSteps
                            };
                            self.emit('uploadprogress', file, file.upload.progress, file.upload
                                .bytesSent);
                            if (file.upload.progress == 100) {
                                file.status = Dropzone.SUCCESS;
                                self.emit("success", file, 'success', null);
                                self.emit("complete", file);
                                self.processQueue();
                            }
                        };
                    }(file, totalSteps, step), duration);
                }
            }
        }
    </script>

<!--Possibilità di eliminare definitivamente il profilo-->
<!--Conteggio delle ricette scritte-->
<!--Numero delle ricette salvate da altri-->
@endsection