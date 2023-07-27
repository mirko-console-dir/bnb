<?php
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\View;
use App\Apartment;
use Carbon\Carbon;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // for ($i=0; $i < 10; $i++) {
    //     $apartment = Apartment::inRandomOrder()->first();
    //     $newView = new View();
    //     $newView->apartment_id = $apartment->id;
    //     // $conteggioViews = Count(Apartment::all()->toArray());
    //     $newView->apartment_id = rand(1, $conteggioViews);
    //     $newView->date = $faker->date($format = 'Y-m-d', $max = 'now');
    //     $newView->view_counter = $faker->numberBetween(15, 300);
    //     $newView->address_ip = $faker->ipv4;
    //     $newView->save();
    // }
    public function run(Faker $faker)
    {
        // assegniamo visite random a tutti gli appartamenti
        // richiamo tutti gli appartamenti
        $apartments = Apartment::all();

        // mesi totali da riempire che son 12
        $totalMonth = Carbon::now()->month;

        // cicliamo ogni mese a parti da jan
        for ($j=1; $j <= $totalMonth; $j++) {
            // ciclio tutti apartments
            foreach ($apartments as $apartment) {
                // per ogni appartamento assegno dai 30 alle 40 visite
                $e = random_int(30, 40);
                for ($i=0; $i < $e; $i++) {
                    // $appartamenti = Apartment::inRandomOrder()->first();
                    $newView = new View;
                    $newView->ip_address = $faker->ipv4();
                    $newView->apartment_id = $apartment->id;
                    // prendi l'anno attuale
                    $year = Carbon::now()->year;
                    // prendi il mese del loop attuale
                    $month = $j;
                    if (strlen($month) == 1) {
                        $month = '0' . $month;
                    }

                    // prendi un giorno tra un range definito
                    $day = random_int(1, 28);

                    $newView->created_at = $year . '-' . $month . '-' . $day . ' 11:00:00';
                    $newView->updated_at = $year . '-' . $month . '-' . $day . ' 11:00:00';
                    $apartment->views()->save($newView);
                }
            }
        }
    }
}