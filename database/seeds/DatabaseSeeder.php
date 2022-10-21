<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(IntolerancesTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        
    }
}
