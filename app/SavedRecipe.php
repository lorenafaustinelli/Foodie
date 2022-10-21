<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedRecipe extends Model
{
    protected $table = 'saved_recipes';

    protected $fillable = [
        'user_id', 'recipe_id',
    ];
}
