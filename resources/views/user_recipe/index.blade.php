@extends('layouts.app')

@section('content')


<h1> Ricette create da {{ Auth::user()->name }} </h1>

@endsection