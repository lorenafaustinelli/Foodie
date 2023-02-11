<?php

use Illuminate\Database\Seeder;

class UserRecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_recipes')->insert([[

            'user_id' => '1',
            'recipe_id' => '1',
            
        ], [

            'user_id' => '2',
            'recipe_id' => '2',

        ]
        ]);
    }
}
