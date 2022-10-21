<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    protected $table = 'recipe_categories';

    protected $fillable = [
        'recipe_id', 'category_id',
    ];
}
