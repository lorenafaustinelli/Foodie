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

            'id' => '1',
            'recipe_id' => '1',
            'ingredient_id' => '7',
            'quantity' => '300',
            'measure' => 'ml',
            
        ], [
            'id' => '2',
            'recipe_id' => '1',
            'ingredient_id' => '8',
            'quantity' => '250',
            'measure' => 'gr',
            
        ], [
            'id' => '3',
            'recipe_id' => '1',
            'ingredient_id' => '9',
            'quantity' => '100',
            'measure' => 'gr',
            
        ], [
            'id' => '4',
            'recipe_id' => '1',
            'ingredient_id' => '13',
            'quantity' => '10',
            'measure' => 'gr'
            
        ], [
            'id' => '5',
            'recipe_id' => '1',
            'ingredient_id' => '12',
            'quantity' => '100',
            'measure' => 'gr'
            
        ], [
            'id' => '6',
            'recipe_id' => '2',
            'ingredient_id' => '1',
            'quantity' => '350',
            'measure' => 'gr'
            
        ], [
            'id' => '7',
            'recipe_id' => '2',
            'ingredient_id' => '2',
            'quantity' => '250',
            'measure' => 'ml'
            
        ], [
            'id' => '8',
            'recipe_id' => '2',
            'ingredient_id' => '5',
            'quantity' => '0',
            'measure' => 'q.b.'
            
        ], [
            'id' => '9',
            'recipe_id' => '2',
            'ingredient_id' => '10',
            'quantity' => '30',
            'measure' => 'ml'
            
        ], [
            'id' => '10',
            'recipe_id' => '2',
            'ingredient_id' => '11',
            'quantity' => '0',
            'measure' => 'q.b.'
            
        ], [
            'id' => '11',
            'recipe_id' => '3',
            'ingredient_id' => '14',
            'quantity' => '200',
            'measure' => 'ml'
            
        ], [
            'id' => '12',
            'recipe_id' => '3',
            'ingredient_id' => '15',
            'quantity' => '600',
            'measure' => 'gr'
            
        ], [
            'id' => '13',
            'recipe_id' => '3',
            'ingredient_id' => '20',
            'quantity' => '10',
            'measure' => 'gr'
            
        ], [
            'id' => '14',
            'recipe_id' => '3',
            'ingredient_id' => '9',
            'quantity' => '10',
            'measure' => 'gr'
            
        ], [
            'id' => '15',
            'recipe_id' => '3',
            'ingredient_id' => '17',
            'quantity' => '10',
            'measure' => 'gr'
            
        ], [
            'id' => '16',
            'recipe_id' => '3',
            'ingredient_id' => '18',
            'quantity' => '100',
            'measure' => 'ml'
            
        ], [
            'id' => '17',
            'recipe_id' => '3',
            'ingredient_id' => '19',
            'quantity' => '20',
            'measure' => 'gr'
            
        ], [
            'id' => '18',
            'recipe_id' => '3',
            'ingredient_id' => '8',
            'quantity' => '50',
            'measure' => 'gr'
            
        ]
        ]);

    }
}
