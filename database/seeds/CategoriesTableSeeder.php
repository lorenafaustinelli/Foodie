<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
     DB::table('categories')->insert([
        [

        'name_category'   =>      'vegano', 
        
    ], [

        'name_category'   =>      'vegetariano',
        
    ], [ 

        'name_category'   =>      'carne',
         
    ], [

        'name_category'   =>       'pesce',
    ], [
        
        'name_category'   =>       'dolci',
    ]
    ]);

}
}
