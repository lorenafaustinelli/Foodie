<?php

use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
            [

            'name_ingredient'   =>      'pasta',
            'variation'         =>      'pasta di mais', 
            
        ], [
            'name_ingredient'   =>      'guanciale',
            'variation'         =>      'pancetta', 
            
        ], [    
            'name_ingredient'   =>      'uovo',
            'variation'         =>      '', 
        ], [    
            'name_ingredient'   =>      'pepe',
            'variation'         =>      '', 
        ], [    
            'name_ingredient'   =>      'olio',
            'variation'         =>      '', 
        ], [    
            'name_ingredient'   =>      'pecorino',
            'variation'         =>      'grana', 
        ] 
        ]);
    }
}
