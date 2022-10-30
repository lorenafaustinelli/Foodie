@extends('layouts.app')

@section('content') 

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"> Nome Ingrediente</th>
                <th scope="col"> Quantità </th>
                <th scope="col"> Misura </th>
            </tr>
        </thead> 
        <tbody>
            @foreach($recipe_ingredients as $recipe_ingredient)
            <tr>
                <th scope="row"> </th>
                <td> {{ $recipe_ingredient->id_ingredient }} </td>
                <td> {{ $recipe_ingredient->quantity }} </td>
                <td> {{ $recipe_ingredient->measure }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection