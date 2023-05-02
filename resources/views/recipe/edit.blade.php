@extends('layouts.app')

@section('content')

<div class="container">

<h1> Modifica le informazioni generali della ricetta <h1>
</br>
    <form action="{{route('recipe.update', $recipe->id)}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="card"> 
                <div class="card-body">
                    <table id="RecipeTable" class="table">
                        <thead> 
                            <tr>
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                
                                <div class="form-group">
                                    <input type="text" name="name_recipe" class="form-control" value="{{$recipe->name_recipe}}" placeholder="Nome ricetta:"> 
                                </div>

                                <div class="form-group">
                                    <input type="number" min="0" max="490" step="5" name="time" class="form-control" value="{{$recipe->time}}" placeholder="Tempo di preparazione in minuti:">
                                </div>

                                <div class="form-group">
                                    <input type="number"  min="1" max="20" name="portion" class="form-control" value="{{$recipe->portion}}" placeholder="Numero di porzioni:">
                                </div>

                                <div class="form-group">
                                    <textarea rows="5" cols="40" name="instruction" class="form-control" placeholder="Istruzioni:"> {{ $recipe->instruction }}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <input type="file" name="photo" class="form-control" placeholder="Foto:" >
                                </div>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        </br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-custom"> Continua modifiche </button>
        </div>
    </form>


</div>
@endsection