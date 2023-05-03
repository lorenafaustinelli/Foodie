
@extends('layouts.app')

@section('content')

<style>
    h1{
     color: 063970;
}
</style>

<div class="container">
<h1> <b> Step 1 di 3: </b> </h1> 
<h2> Iniziamo con alcune informazioni sulla ricetta! </h2>
</br>
    
        <div class="row">
            <div class="card" style="width: 72rem;">
                <div class="card-body">
                    <form action="/recipe/store" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <table id="RecipeTable" class="table">
                        <thead> 
                            <tr>
                                
                                <input type ="hidden" name = "user_id" value="{{ Auth::user()->id }}"/>
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                                <div class="form-group">
                                    <h4>Nome:</h4>
                                    <input type="text" name="name_recipe" class="form-control" placeholder="Nome ricetta"> 
                                </div>

                                <div class="form-group">
                                    <h4>Tempo di preparazione in minuti:</h4>
                                    <input type="number" min="0" max="490" step="5" name="time" class="form-control" placeholder="Tempo in minuti">
                                </div>

                                <div class="form-group">
                                    <h4>Numero porzioni:</h4>
                                    <input type="number"  min="1" max="20" name="portion" class="form-control" placeholder="Da 1 a 20">
                                </div>

                                <div class="form-group">
                                    <h4>Preparazione:</h4>
                                    <textarea rows="5" cols="40" name="instruction" class="form-control" placeholder="Istruzioni per la preparazione">
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <h4>Foto del risultato:</h4>
                                    <input type="file" name="photo" class="form-control" placeholder="Carica una foto della tua ricetta">
                                </div>
                            </tr>
                        </thead>
                    </table>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-custom"> Continua </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        

</div>

@endsection