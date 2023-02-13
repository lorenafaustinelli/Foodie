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
            'id'              =>      '1',
            'name_ingredient'   =>      'pasta',
            'variation'         =>      'pasta di mais', 
            
        ], [
            'id'              =>      '2',
            'name_ingredient'   =>      'passata di pomodoro',
            'variation'         =>      '', 
            
        ], [    
            'id'              =>      '3',
            'name_ingredient'   =>      'uovo',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '4',
            'name_ingredient'   =>      'pepe',
            'variation'         =>      '', 
        ], [  
            'id'              =>      '5',  
            'name_ingredient'   =>      'sale',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '6',
            'name_ingredient'   =>      'grana',
            'variation'         =>      'pecorino', 
        ], 
        [   
            'id'              =>      '7',
            'name_ingredient'   =>      'latte', 
            'variation'         =>      '', 
        ], 
        [   
            'id'              =>      '8',
            'name_ingredient'   =>      'farina',
            'variation'         =>      'farina di riso', 
        ], 
        [   
            'id'              =>      '9',
            'name_ingredient'   =>      'zucchero',
            'variation'         =>      '', 
        ],
        [   
            'id'              =>      '10',
            'name_ingredient'   =>      'olio',
            'variation'         =>      '', 
        ],  
        [   
            'id'              =>      '11',
            'name_ingredient'   =>      'basilico',
            'variation'         =>      '', 
        ], 
        [   
            'id'              =>      '12',
            'name_ingredient'   =>      'nutella',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '13',
            'name_ingredient'   =>      'burro',
            'variation'         =>      '', 
        ]
        ]);
    }
}
