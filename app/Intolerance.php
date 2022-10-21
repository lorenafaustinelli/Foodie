<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intolerance extends Model
{
    protected $table = 'intolerances';

    protected $fillable = [
        'name_intolerances'
    ];
}
