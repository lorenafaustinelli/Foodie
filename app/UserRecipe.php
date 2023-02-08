<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRecipe extends Model
{
    protected $table = 'user_recipes';

    protected $fillable = [
        'user_id', 'recipe_id',
    ];
}
 