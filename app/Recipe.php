<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_recipe', 'time', 'portion', 'instruction', 'photo', 'photo2'  //ora funzionano anche jpg e png, ma controllare altri formati
    ];
}