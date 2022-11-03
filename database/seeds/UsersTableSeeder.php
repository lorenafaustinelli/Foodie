<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //per eseguire solo questo seed usare comando -> php artisan db:seed --class=UsersTableSeeder
     //per eseguire tutti i seeder usare -> php artisan db:seed 
     //attenzione a non eseguire più volte lo stesso seeder perchè sennò li duplica
    public function run()
    {
        DB::table('users')->insert([[

            'name'       =>      'Lorena',
            'surname'    =>      'Faustinelli', 
            'email'      =>      'lorena@foodie.it',
            'admin'      =>      true,
            'password'   =>      bcrypt('password'),
            'created_at' =>      date('Y-m-d h:i:s'), 
            'updated_at'  =>     date('Y-m-d h:i:s'),
            
        ], [

            'name'      =>       'Lisa',
            'surname'   =>       'Giacobazzi', 
            'email'     =>       'lisa@foodie.it',
            'admin'     =>        true,
            'password'  =>        bcrypt('password'),
            'created_at' =>       date('Y-m-d h:i:s'),
            'updated_at'  =>      date('Y-m-d h:i:s'),

        ]
        ]);
    }
}