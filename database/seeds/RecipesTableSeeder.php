<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([[ 

            'id'           => '1',
            'name_recipe' => 'Crepes',
            'time'        => '20',
            'portion'     => '5',
            'instruction' => 'Inizia versando tutti gli ingredienti secchi in una ciotola. Dopodichè versa pian piano il latte, in modo da creare un composto liscio e omogeneo. Una volta ottenuta una crema senza grumi fai sciogliere un po di burro in una padella; quando è sciolto versa un po di impasto e stendilo per bene con il mestolo in odo che venga una cerchio non troppo spesso. Fai cuocere un paio di minuti per lato e condisci poi con la crema che preferisci.',
            'photo'       => 'public/recipes/crepes.jpg',
            'created_at'  => date('Y-m-d h:i:s'), 
            'updated_at'  => date('Y-m-d h:i:s'),
            
        ], [
            'id'           => '2',
            'name_recipe' => 'Pasta pomodoro',
            'time'        => '30',
            'portion'     => '3',
            'instruction' => 'Metti in una pentola della passata di pomodoro con l olio e un pizzico di sale. Fai cuocere a fuoco lento fino a quando non si restringe il pomodoro (circa 1 ora/1 ora e mezza). Appena il sugo è pronto fai bollire in una pentola dell acqua, in cui butterai poi la pasta. Togli la pasta un paio di minuti prima rispetto al tempo di cottura indicato sulla confezione e completa la cottura nella pentola in cui è stato fatto cuocere il sugo. Condire con alcune foglie di basilico e servire. ',
            'photo'       => 'public/recipes/pasta.jpg',
            'created_at'  => date('Y-m-d h:i:s'), 
            'updated_at'  => date('Y-m-d h:i:s'),

        ]
        ]);
    }
}
