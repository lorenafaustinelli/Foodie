<?php

use Illuminate\Database\Seeder;

class RecipeIngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_ingredients')->insert([[

            'recipe_id' => '1',
            'ingredient_id' => '7',
            'quantity' => '300',
            'measure' => 'ml',
            
        ], [

            'recipe_id' => '1',
            'ingredient_id' => '8',
            'quantity' => '250',
            'measure' => 'gr',
            
        ], [

            'recipe_id' => '1',
            'ingredient_id' => '9',
            'quantity' => '100',
            'measure' => 'gr',
            
        ], [

            'recipe_id' => '1',
            'ingredient_id' => '13',
            'quantity' => '10',
            'measure' => 'gr'
            
        ], [

            'recipe_id' => '1',
            'ingredient_id' => '12',
            'quantity' => '100',
            'measure' => 'gr'
            
        ], [

            'recipe_id' => '2',
            'ingredient_id' => '1',
            'quantity' => '350',
            'measure' => 'gr'
            
        ], [

            'recipe_id' => '2',
            'ingredient_id' => '2',
            'quantity' => '250',
            'measure' => 'ml'
            
        ], [

            'recipe_id' => '2',
            'ingredient_id' => '5',
            'quantity' => '0',
            'measure' => 'q.b.'
            
        ], [

            'recipe_id' => '2',
            'ingredient_id' => '10',
            'quantity' => '30',
            'measure' => 'ml'
            
        ], [

            'recipe_id' => '2',
            'ingredient_id' => '11',
            'quantity' => '0',
            'measure' => 'q.b.'
            
        ]
        ]);

    }
}
