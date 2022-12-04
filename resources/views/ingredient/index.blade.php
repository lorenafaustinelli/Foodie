@extends('layouts.app')

@section('content') 

<div class="container">
  <h1> Ingredienti </h1>
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
    
@endsection