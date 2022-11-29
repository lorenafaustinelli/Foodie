@extends('layouts.app')

@section('content')
<?php 
//var_dump($id)
?>
<div class="container">
<h1> Ultimo step! </h1>
<h2> Associa le categorie corrispondendi alla tua ricetta </h2>
<div class="row">
       <div class="card">
            <div class="card-header">
               <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#categoryModal"> Aggiungi una categoria </a>
            </div> 
            <div class="card-body">
                <table id="RecipeIngredientsTable" class="table">
                    <thead>
                        <tr>
                            
                        </tr> 
                    </thead>
                    <tbody>
                      <tr>
                        
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection