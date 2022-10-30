@extends('layouts.app')

@section('content') 

<div class="container">
    <h1> Tutti gli ingredienti </h1>

    @foreach($ingredients as $ingredient)
            <tr>
                <th scope="row"> </th>
                <td> {{ $ingredient->name_ingredient}} </td>
                <td> {{ $ingredient->variation }} </td>
            </tr>
            @endforeach
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"> Nome Ingrediente</th>
                <th scope="col"> Variazione </th>
            </tr>
        </thead> 
        <tbody>
            
        </tbody>
    </table>
</div>



@endsection