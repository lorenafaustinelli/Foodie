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
            'name_ingredient'   =>      'farina 00',
            'variation'         =>      'farina di riso', 
        ], 
        [   
            'id'              =>      '9',
            'name_ingredient'   =>      'zucchero',
            'variation'         =>      '', 
        ],
        [   
            'id'              =>      '10',
            'name_ingredient'   =>      'olio d\'oliva',
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
        ], [   
            'id'              =>      '14',
            'name_ingredient'   =>      'acqua',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '15',
            'name_ingredient'   =>      'pollo',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '16',
            'name_ingredient'   =>      'burro d\'arachidi',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '17',
            'name_ingredient'   =>      'salsa di soia',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '18',
            'name_ingredient'   =>      'succo di limone',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '19',
            'name_ingredient'   =>      'amido di mais',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '20',
            'name_ingredient'   =>      'scorza di limone',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '21',
            'name_ingredient'   =>      'cipolla',
            'variation'         =>      '', 
        ],[   
            'id'              =>      '22',
            'name_ingredient'   =>      'lievito di birra fresco',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '23',
            'name_ingredient'   =>      'olio extravergine d\'oliva',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '24',
            'name_ingredient'   =>      'farina 0',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '25',
            'name_ingredient'   =>      'calamari',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '26',
            'name_ingredient'   =>      'aglio',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '27',
            'name_ingredient'   =>      'vino bianco',
            'variation'         =>      'birra', 
        ], [   
            'id'              =>      '28',
            'name_ingredient'   =>      'origano',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '29',
            'name_ingredient'   =>      'patate',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '30',
            'name_ingredient'   =>      'pomodorini pelati',
            'variation'         =>      '', 
        ], [   
            'id'              =>      '31',
            'name_ingredient'   =>      'salvia',
            'variation'         =>      '', 
        ]
        ]);
    }
}
