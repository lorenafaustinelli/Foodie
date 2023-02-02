@extends('layouts.app')

@section('content') 

<div class="container">
  <h1> Categorie </h1>
   <div class="row">
       <div class="card">
            <div class="card-body">
                <table id="CategoriesTable" class="table">
                    <thead>
                        <tr>
                            <th>Nome categoria </th>
                        </tr> 
                    </thead>
                    <tbody>
                      @foreach($categories as $category)
                      <tr>
                      <td> {{ $category->name_category}} </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection