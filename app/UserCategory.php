<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    protected $table = 'user_categories';

    protected $fillable = [
        'user_id', 'category_id',
    ];
}
