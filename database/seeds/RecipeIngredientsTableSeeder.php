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
            
        ], [
            'id' => '19',
            'recipe_id' => '4',
            'ingredient_id' => '24',
            'quantity' => '500',
            'measure' => 'gr'
            
        ], [
            'id' => '20',
            'recipe_id' => '4',
            'ingredient_id' => '14',
            'quantity' => '340',
            'measure' => 'ml'
            
        ], [
            'id' => '21',
            'recipe_id' => '4',
            'ingredient_id' => '22',
            'quantity' => '7',
            'measure' => 'gr'
            
        ], [
            'id' => '22',
            'recipe_id' => '4',
            'ingredient_id' => '23',
            'quantity' => '30',
            'measure' => 'gr'
            
        ], [
            'id' => '23',
            'recipe_id' => '4',
            'ingredient_id' => '5',
            'quantity' => '0',
            'measure' => 'q.b.'
            
        ], [
            'id' => '24',
            'recipe_id' => '5',
            'ingredient_id' => '25',
            'quantity' => '1',
            'measure' => 'kg'
            
        ], [
            'id' => '25',
            'recipe_id' => '5',
            'ingredient_id' => '26',
            'quantity' => '1',
            'measure' => 'spicchio'
            
        ], [
            'id' => '26',
            'recipe_id' => '5',
            'ingredient_id' => '27',
            'quantity' => '80',
            'measure' => 'gr'
            
        ], [
            'id' => '27',
            'recipe_id' => '5',
            'ingredient_id' => '28',
            'quantity' => '0',
            'measure' => 'q.b'
            
        ], [
            'id' => '28',
            'recipe_id' => '5',
            'ingredient_id' => '5',
            'quantity' => '0',
            'measure' => 'q.b.'
            
        ], [
            'id' => '29',
            'recipe_id' => '5',
            'ingredient_id' => '10',
            'quantity' => '0',
            'measure' => 'q.b.'
            
        ], [
            'id' => '30',
            'recipe_id' => '5',
            'ingredient_id' => '29',
            'quantity' => '700',
            'measure' => 'gr'
            
        ], [
            'id' => '31',
            'recipe_id' => '5',
            'ingredient_id' => '30',
            'quantity' => '200',
            'measure' => 'gr'
            
        ], [
            'id' => '32',
            'recipe_id' => '5',
            'ingredient_id' => '14',
            'quantity' => '200',
            'measure' => 'gr'
            
        ], [
            'id' => '33',
            'recipe_id' => '5',
            'ingredient_id' => '31',
            'quantity' => '0',
            'measure' => 'q.b.'
            
        ], [
            'id' => '34',
            'recipe_id' => '5',
            'ingredient_id' => '4',
            'quantity' => '0',
            'measure' => 'q.b.'
            
        ], [
            'id' => '35',
            'recipe_id' => '6',
            'ingredient_id' => '8',
            'quantity' => '300',
            'measure' => 'gr'
            
        ], [
            'id' => '36',
            'recipe_id' => '6',
            'ingredient_id' => '22',
            'quantity' => '6',
            'measure' => 'gr'
            
        ], [
            'id' => '37',
            'recipe_id' => '6',
            'ingredient_id' => '9',
            'quantity' => '5',
            'measure' => 'gr'
            
        ], [
            'id' => '38',
            'recipe_id' => '6',
            'ingredient_id' => '14',
            'quantity' => '180',
            'measure' => 'gr'
            
        ], [
            'id' => '39',
            'recipe_id' => '6',
            'ingredient_id' => '5',
            'quantity' => '7',
            'measure' => '7'
            
        ]
        ]);

    }
}
