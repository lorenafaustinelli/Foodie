<?php

use Illuminate\Database\Seeder;

class RecipeCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_categories')->insert([[

            'recipe_id' => '1',
            'category_id' => '2',
            'category_id2' => '5',
            
        ], [

            'recipe_id' => '2',
            'category_id' => '6',
            'category_id2' => '1',

        ], [

            'recipe_id' => '3',
            'category_id' => '3',
            'category_id2' => '8',

        ],  [

            'recipe_id' => '4',
            'category_id' => '1',
            'category_id2' => '2',

        ]
        ]);
    }
}
