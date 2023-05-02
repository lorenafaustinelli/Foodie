@extends('layouts.app')

@section('content') 

<div class="container">
<h1> Modifica Ingrediente </h1> 
</br>

    <form action="{{route('ingredient.update', $ingredient->id)}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table id="IngredientTable" class="table">
                        <thead> 
                            <tr>
                                <div class="form-group">
                                    <label for="name_ingredient" class="form-label">Nome Ingrediente</label>
                                    <input type="text" value="{{ $ingredient->name_ingredient }}" class="form-control" name="name_ingredient">
                                </div>
                                <div class="form-group">
                                    <label for="variation" class="form-label">Variazione</label>
                                    <input type="text" value="{{ $ingredient->variation }}"class="form-control" name="variation">
                                </div>
                                
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        </br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-custom"> Modifica </button>
        </div>
    </form>


</div>


@endsection