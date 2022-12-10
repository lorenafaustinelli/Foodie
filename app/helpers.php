<?php 

use App\Ingredient;
use App\Category;
use App\RecipeCategory;

//file che contiene funzioni globali

if (!function_exists('name_ingredient')) {
    function name_ingredient($id)
    {   
        $ingredient = Ingredient::all()->where('id', $id)->pluck('name_ingredient');
        return $ingredient;
    }

}

if (!function_exists('category')) {
    function category($id)
    {   
        $category_id = RecipeCategory::where('recipe_id', $id)->pluck('category_id');
        $category_name = Category::where('id', $category_id)->pluck('name_category');
        return $category_name;
    }

}

?>