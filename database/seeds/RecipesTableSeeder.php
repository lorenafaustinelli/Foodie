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

        ], [
            'id'           => '4',
            'name_recipe' => 'Focaccia',
            'time'        => '65',
            'portion'     => '4',
            'instruction' => 'Impastate con energia, con il dorso delle mani, come quando fate la pasta fresca: tirate bene bene il panetto con il dorso della mano e riportatelo verso di voi, con movimenti decisi. Ricordatevi di ruotare il panetto di volta in volta di 90° prima di procedere di nuovo a stenderlo sul piano. Una volta che risulterà più omogeneo, potete iniziare a versare l\'olio poco per volta, in 3-4 volte sarà sufficiente. Fatelo assorbire bene impastando sempre sul piano di lavoro.Quando l\'impasto avrà assorbito completamente l\'olio, sarà il momento di aggiungere il sale, tutto in una volta. Stendete un pochino il panetto e versate il sale sulla superficie, quindi impastate molto bene in modo da farlo incorporare e assorbire completamente: ci vorrà qualche istante di lavorazione. Coprite l’impasto con una ciotola e lasciate riposare 15 minuti. E\' importante attendere questo tempo, perché nei momenti di riposo l\'impasto sviluppa la sua maglia glutinica. Passato il tempo di riposo, date dei giri di pieghe "slap&fold", ovvero sollevate l\'impasto con entrambe le mani 10 e sbattetelo sul piano di lavoro, quindi procedete girando di 180° e ripetete l\'operazione sollevando e sbattendo, almeno 2-3 volte. Queste pieghe andranno fatte almeno un paio di volte a distanza di 15 minuti l\'una dall\'altra. Nei 15 minuti farete riposare il vostro impasto sempre coperto con la ciotola. Intervallare riposi e pieghe darà struttura e forza al vostro impasto. Una volta terminati i giri di pieghe, trasferite l\'impasto in ciotola unta con olio di oliva, sigillate bene con la pellicola e lasciate lievitare a temperatura ambiente (tra i 26-28°), per circa 3 ore: dovrà triplicare di volume. Trascorso il tempo di lievitazione oliate una teglia di 25x38 cm 13, versate l’impasto e stendetelo con le mani, sia allargandolo delicatamente verso i bordi, sia premendo con i polpastrelli per stendere su tutta la superficie. Se l\'impasto dovesse ritirarsi, nessuno problema: coprite e lasciate riposare circa 5 minuti, poi potrete stendere ancora l’impasto allargandolo nella teglia delicatamente. Lasciate lievitare ancora la focaccia coperta con pellicola (o con canovaccio umido) per 1 ora. Trascorso il tempo di lievitazione versate sulla focaccia i 60 g di olio e affondate le dita per formare i tipici buchi. Salate la superfice con il sale maldon e cuocete per circa 30 minuti a 200° in forno statico preriscaldato molto bene. Potete posizionarla nel ripiano più basso del forno. Sfornate la focaccia servitela ben calda!',
            'photo'       => 'public/recipes/focaccia.jpg',
            'created_at'  => date('Y-m-d h:i:s'), 
            'updated_at'  => date('Y-m-d h:i:s'),
            'n_saved'     => '0',

        ]
        ]);
    }
}
