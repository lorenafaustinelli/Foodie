@extends('layouts.app')

@section('content')
        
      
        <h1> Ricette </h1>
         <!-- <div class="row g-4 mt-1">
        @forelse($recipe as $key => $row)
        <div class="col-lg-4">

            <div class="card shadow">
            <a href="post/{{ $row->id }}">
            <img src="{{ asset('storage/images/'.$row->image) }}" class="card-img-top img-fluid">
            </a>
            <div class="card-body">
            <p class="btn btn-success rounded-pill btn-sm">{{ $row->time }}</p>
            <div class="card-title fw-bold text-primary h4">{{ $row->name_recipe }}</div>
            <p class="text-secondary">{{ Str::limit($row->instruction, 100) }}</p>
            </div>
        </div>

        </div>
        @empty
            <h2 class="text-center text-secondary p-4">No Recipe found in the database!</h2>
        @endforelse
        <div class="d-flex justify-content-center my-5">
            {{ $recipe->onEachSide(1)->links() }}
        </div>

        </div> -->


@endsection