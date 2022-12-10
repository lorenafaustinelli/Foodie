<?php

use Illuminate\Database\Seeder;

class UnityOfMeasurementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unity_of_measurements')->insert([
            [

            'name_measurement'   =>      'gr', 
            
        ], [
            'name_measurement'   =>      'ml',
            
        ], [    
            'name_measurement'   =>      '-',
             
        ]
        ]);
    }
}
