<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserIntolerance extends Model
{
    protected $table = 'user_intolerances';

    protected $fillable = [
        'user_id', 'intolerance_id',
    ];
}
