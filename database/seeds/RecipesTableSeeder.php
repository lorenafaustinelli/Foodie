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
            'n_saved'     => '0',
            
        ], [
            'id'           => '2',
            'name_recipe' => 'Pasta pomodoro',
            'time'        => '30',
            'portion'     => '3',
            'instruction' => 'Metti in una pentola della passata di pomodoro con l olio e un pizzico di sale. Fai cuocere a fuoco lento fino a quando non si restringe il pomodoro (circa 1 ora/1 ora e mezza). Appena il sugo è pronto fai bollire in una pentola dell acqua, in cui butterai poi la pasta. Togli la pasta un paio di minuti prima rispetto al tempo di cottura indicato sulla confezione e completa la cottura nella pentola in cui è stato fatto cuocere il sugo. Condire con alcune foglie di basilico e servire. ',
            'photo'       => 'public/recipes/pasta.jpg',
            'created_at'  => date('Y-m-d h:i:s'), 
            'updated_at'  => date('Y-m-d h:i:s'),
            'n_saved'     => '0',

        ], [
            'id'           => '3',
            'name_recipe' => 'Pollo al limone',
            'time'        => '30',
            'portion'     => '4',
            'instruction' => 'Per realizzare il pollo al limone per prima cosa grattugiate la scorza del limone e spremetene il succo e filtratelo. Occupatevi poi della pulizia del petto di pollo: dividete a metà il petto, eliminate le parti più grasse e tagliatelo prima a striscioline poi a bocconcini più piccoli. Ora passate il pollo nella farina e mescolate per farla aderire. Ponete un tegame sul fuoco, versate l’olio di oliva e scaldatelo; quando sarà ben caldo versate  i bocconcini di pollo e lasciateli dorare a fiamma media per circa 5 minuti, rigirandoli di tanto in tanto fino a quando saranno ben rosolati. Toglietele dal fuoco e tenetele da parte. Preparate la salsa:in una ciotola versate amido e acqua. Unite anche lo zucchero, la salsa di soia e il succo di limone. Nella stessa padella in cui avete rosolato il pollo versate il liquido ottenuto, lasciate addensare per 1 minuto mescolando con la frusta e versate anche il pollo. Mescolate lentamente e lasciate andare sul fuoco per 3-4 minuti. A fine cottura profumate con la scorza di limone e origano fresco. Servite il pollo al limone ben caldo. ',
            'photo'       => 'public/recipes/pollo.jpg',
            'created_at'  => date('Y-m-d h:i:s'), 
            'updated_at'  => date('Y-m-d h:i:s'),
            'n_saved'     => '0',

        ]
        ]);
    }
}
