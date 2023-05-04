@extends('layouts.app')

@section('content')

<div class="container">
  <h1> Modifica categoria </h1>
  <br>
  <form action="{{route('recipe_category.update', $recipe->id)}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }} 
    <div class="row">
      <div class="card">
        <div class="card-body">
          <table id="RecipeCategoriesTable" class="table">
            <thead>
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

              <input type ="hidden" name = "recipe_id" value="{{ $recipe->id }}"/>

              <tr>
                <div class="form-group">
                  <select class="form-control" name="category_id">
                    @if($recipe_cat->count() > 0)
                      <option value="{{ $recipe_cat->category_id }}"> {{$recipe_cat->cat_name1 }} </option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}"> {{$category->name_category }} </option>
                      @endforeach
                    @else
                      <option value=""></option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}"> {{$category->name_category }} </option>
                      @endforeach
                    @endif
                  </select>
                </div>
                
                <div class="form-group">
                  <select class="form-control" name="category_id2">
                  @if($recipe_cat->count() > 0)
                    @if($recipe_cat->category_id2)
                    <option value="{{ $recipe_cat->category_id2 }}"> {{$recipe_cat->cat_name2 }} </option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{$category->name_category }} </option>
                    @endforeach
                    <option value="">  </option>
                    @else
                    <option value="">  </option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}"> {{$category->name_category }} </option>
                    @endforeach
                    @endif
                  @else
                    <option value="">  </option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}"> {{$category->name_category }} </option>
                    @endforeach
                  @endif
                  </select>
                </div> 
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
    </br>
    </br>
    <div class="d-grid gap-2 col-6 mx-auto"> 
      <button type="submit" class="btn btn-custom">Concludi modifiche</button>
    </div>
  </form>
</div> 
 



@endsection