<?php

use Illuminate\Database\Seeder;

class IntolerancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intolerances')->insert([
            [

            'name_intolerance'   =>      'glutine', 
            
        ], [
            'name_intolerance'   =>      'lattosio',
            
        ], [    
            'name_intolerance'   =>      'lieviti',
             
        ]
        ]);
    }
}
