<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnityOfMeasurement extends Model
{
    protected $table = 'unity_of_measurements';

    protected $fillable = [
        'name_measurement',
    ];
}
