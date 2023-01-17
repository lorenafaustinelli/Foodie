<?php

namespace App;

use App\Ingredient;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    protected $table = 'recipe_ingredients';

    protected $fillable = [
        'recipe_id', 'ingredient_id', 'quantity', 'measure',
    ];

}
