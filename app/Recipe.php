<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';
      
    protected $fillable = [
        'name_recipe', 'time', 'portion', 'instruction', 'photo'
    ];
}
