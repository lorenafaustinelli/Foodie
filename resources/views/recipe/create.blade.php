
@extends('layouts.app')

@section('content')

<div class="container">

<h1> Iniziamo con alcune informazioni sulla ricetta: <h1>
    </br>
    <form action="/recipe/store" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table id="RecipeTable" class="table">
                        <thead> 
                            <tr>
                                <input type ="hidden" name = "user_id" value="{{ Auth::user()->id }}"/>
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                
                                <div class="form-group">
                                    <input type="text" name="name_recipe" class="form-control" placeholder="Nome ricetta:"> 
                                </div>

                                <div class="form-group">
                                    <input type="number" min="0" max="490" step="5" name="time" class="form-control" placeholder="Tempo di preparazione in minuti:">
                                </div>

                                <div class="form-group">
                                    <input type="number"  min="1" max="20" name="portion" class="form-control" placeholder="Numero di porzioni:">
                                </div>

                                <div class="form-group">
                                    <textarea rows="5" cols="40" name="instruction" class="form-control" placeholder="Istruzioni:">
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <input type="file" name="photo" class="form-control" placeholder="Foto:">
                                </div>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        </br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary"> Continua </button>
        </div>
    </form>


</div>
@endsection