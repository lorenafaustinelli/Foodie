<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    protected $table = 'recipe_ingredients';

    protected $fillable = [
        'recipe_id', 'ingredient_id', 'quantity', 'measure',
    ];
}
