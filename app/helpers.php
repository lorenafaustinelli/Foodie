<?php 

use App\Ingredient;

if (!function_exists('name_ingredient')) {
    function name_ingredient($id)
    {   
        $ingredient = Ingredient::all()->where('id', $id)->pluck('name_ingredient');
        return $ingredient;
    }

}

?>