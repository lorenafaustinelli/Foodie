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
        'id'              =>      '1',
        'name_category'   =>      'vegano', 
        
    ], [
        'id'              =>      '2',
        'name_category'   =>      'vegetariano',
        
    ], [ 
        'id'              =>      '3',
        'name_category'   =>      'carne',
         
    ], [
        'id'              =>      '4',
        'name_category'   =>       'pesce',
    ], [
        'id'              =>      '5',
        'name_category'   =>       'dolci',
    ], [
        'id'              =>       '6',
        'name_category'   =>        'pasta',
    ], [
        'id'              =>       '7',
        'name_category'   =>        'primi',
    ], [
        'id'              =>       '8',
        'name_category'   =>        'secondi',
    ]
    ]);

}
}
