<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeIntolerance extends Model
{
    protected $table = 'recipe_intolerances';

    protected $fillable = [
        'recipe_id', 'intolerance_id',
    ];
}
