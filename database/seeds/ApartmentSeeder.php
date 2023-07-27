<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
//ModelsBlade:
use App\Apartment;
use App\User;
use App\Message;
use App\Service;
use App\View;
use App\Sponsor;
use App\Image;
//Faker
use Faker\Generator as Faker;


class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // 20 appartamenti totali
        $apartments = [
            [
                '1',
                'Appartamento al Colosseo',
                'Appartamento nel centro di Roma. Giardino privato, aria condizionata, riscaldamento, WiFi, Netflix, smart TV 50, colazione inclusi nel prezzo!',
                '4',
                '4',
                '2',
                '60',
                '50',
                'https://a0.muscache.com/im/pictures/00a45003-57fa-4c79-bb85-99a211e93367.jpg?im_w=960',
                '41.90717',
                '12.465',
                '0',
                'Italia',
                '(RO)',
                'Roma'
            ],
            [
                '1',
                'Monolocale indipendente con bagno privato',
                'Tutti, senza distinzioni, siete i benvenuti nel mio monolocale con bagno privato in uno dei quartieri più vivaci e centrali della Roma popolare!',
                '3',
                '3',
                '1',
                '40',
                '36',
                'https://a0.muscache.com/im/pictures/ecf0d2f0-15c7-470c-8934-45d320b10a68.jpg?im_w=960',
                '41.90793',
                '12.46557',
                '0',
                'Italia',
                '(RO)',
                'Roma'
            ],
            [
                '1',
                'Suite Termini con Balcone, Wi-Fi e A/C',
                'B&B nel cuore di Roma a soli 5 minuti a piedi dalla Stazione Termini. Bellissima camera con balcone, tv 32", luce per lettura, bagno in camera, materasso in Memory, appendiabiti!',
                '4',
                '3',
                '1',
                '60',
                '56',
                'https://a0.muscache.com/im/pictures/d5196e9e-6b61-467c-9ba5-08addc1a1836.jpg?im_w=960',
                '41.91455',
                '12.46529',
                '0',
                'Italia',
                '(RO)',
                'Roma'
            ],
            [
                '1',
                'Splendido Loft Appartamento',
                'Il mio loft e\' uno spazio ricavato in palazzo del XXVI secolo nel cuore di Roma unico e accogliente',
                '3',
                '3',
                '2',
                '67',
                '76',
                'https://a0.muscache.com/im/pictures/57443d55-779e-4d82-8bce-184546c67fc7.jpg?im_w=1440',
                '41.92127',
                '12.46378',
                '0',
                'Italia',
                '(RO)',
                'Roma'
            ],
            [
                '2',
                'The heart of Napoli',
                'Alloggio molto accogliente situato nel cuore di Napoli a pochissimi passi dai più importanti luoghi di interesse come San Gregorio Armeno,il Duomo, Cappella SanSevero e tanti altri ancora e 100metri dalla famosissima pizzeria da Michele',
                '2',
                '3',
                '2',
                '53',
                '66',
                'https://a0.muscache.com/im/pictures/5f0b83ad-c901-4b7e-922a-7c4e10e3fbc5.jpg?im_w=1200',
                '40.86081',
                '14.26787',
                '0',
                'Italia',
                '(NA)',
                'Napoli'
            ],
            [
                '2',
                'Vecchia Napoli - Santa Lucia',
                'Bilocale su 2 livelli nel bellissimo quartiere di Santa Lucia. Camera da letto soppalcata, salone con letto singolo, cucina, bagno e cabina armadio. Ammezzato senza ascensore. Balcone in salone e aria condizionata.',
                '3',
                '4',
                '2',
                '63',
                '88',
                'https://a0.muscache.com/im/pictures/22634951/506ff622_original.jpg?im_w=1200',
                '40.86228',
                '14.26985',
                '0',
                'Italia',
                '(NA)',
                'Napoli'
            ],
            [
                '2',
                'Da Dora',
                'L\'appartamento è poco distante dal centro storico, c\'è un bellissimo terrazzo a vostra disposizione.
                Siamo a poca distanza dalla stazione, dal porto e dalle strade principali.',
                '3',
                '2',
                '3',
                '63',
                '68',
                'https://a0.muscache.com/im/pictures/1932543/91781983_original.jpg?im_w=1440',
                '40.86482',
                '14.27105',
                '0',
                'Italia',
                '(FI)',
                'Firenze'
            ],
            [
                '2',
                'A casa di Luisa',
                'La camera in questione si può definire un vero e proprio mini appartamento. Situata al centro storico di Napoli,al quarto piano (senza ascensore) di un palazzo antico. potrete usufruire di un comodo letto matrimoniale con materasso in memory e divano letto.',
                '2',
                '2',
                '2',
                '43',
                '58',
                'https://a0.muscache.com/im/pictures/0417a1e4-3db2-4d26-a591-3c156d6c1ad7.jpg?im_w=1200',
                '40.86764',
                '14.26429',
                '0',
                'Italia',
                '(NA)',
                'Napoli'
            ],
            [
                '2',
                'Rossonapoletano B&B Napoli Green',
                'The room includes a double bed and a single bed. Consisting of a desk, cupboard, wardrobe, chair and chest of drawers, air conditioning. the room is chosen by the owner based on the number of people.',
                '4',
                '5',
                '3',
                '83',
                '98',
                'https://a0.muscache.com/im/pictures/c931d94f-a8c2-48de-921e-86b2afa2ac95.jpg?im_w=1200',
                '40.84708',
                '14.26153',
                '0',
                'Italia',
                '(NA)',
                'Napoli'
            ],
            [
                '2',
                'Appartamento nel cuore di Napoli luminoso e intimo',
                'Appartamento luminoso, intimo e silenziosissimo in posizione centrale, a pochi passi dalla metropolitana, Orto Botanico, tutti i musei e attrazioni principali del centro storico.',
                '5',
                '2',
                '3',
                '73',
                '88',
                'https://a0.muscache.com/im/pictures/74c8e9fc-3411-4ebb-a72d-ab032f11d46c.jpg?im_w=1200',
                '40.84868',
                '14.26383',
                '0',
                'Italia',
                '(NA)',
                'Napoli'
            ],
            [
                '3',
                'Suite Monolocale a Rimini Marina Centro',
                'A Rimini Marina Centro c’è una novità: Rimini Bay Suite & Residence. 12 appartamenti, tutti completamente ristrutturati a fine 2019, capaci di ospitare da 2 fino a 7 persone e caratterizzati ognuno da arredi, finiture e servizi esclusivi.',
                '4',
                '3',
                '3',
                '63',
                '68',
                'https://a0.muscache.com/im/pictures/f83c7bcb-a141-4269-a9d9-e704438e73c4.jpg?im_w=1200',
                '44.06474',
                '12.58317',
                '0',
                'Italia',
                '(RI)',
                'Rimini'
            ],
            [
                '3',
                'Casa nuova con giardino,bici, a 800mt mare/fiera',
                'Appartamento fra mare e verde, rinnovato completamente in casa bifamiliare: cucina abitabile, due matrimoniali, terza camera x gioco o eventuale lettino per bimbi, sala con divano letto singolo, ampi spazi esterni per pranzare, giardino, 2 posti auto.',
                '4',
                '4',
                '2',
                '73',
                '88',
                'https://a0.muscache.com/im/pictures/miso/Hosting-9019674/original/4bc77968-ed4c-4e0c-81c6-c41ce9966346.jpeg?im_w=1200',
                '44.06469',
                '12.58184',
                '0',
                'Italia',
                '(RA)',
                "Ragusa"
            ],
            [
                '3',
                'La Casa Rosa Ragusa',
                'L\'appartamento si trova a pochi passi dal mare (600m), proprio di fronte ad una delle poche spiagge libere della riviera, e a qualche minuto dal centro commerciale "Le Befane".',
                '2',
                '3',
                '2',
                '53',
                '68',
                'https://a0.muscache.com/im/pictures/427bfe4c-799c-4c43-8f9b-e7ca010a75f3.jpg?im_w=1200',
                '44.06885',
                '12.57731',
                '0',
                'Italia',
                '(RA)',
                'Ragusa'
            ],
            [
                '3',
                'Casa Vacanze Centro di Firenze',
                'L\'appartamento nuovo, perfettamente arredato è situato in zona tranquilla e silenziosa, ottima per una vacanza o per lavoro. Casa vicina al palacongressi di Rimini e al Centro storico (10 min a piedi ).
                La zona è con parcheggio gratuito.',
                '3',
                '2',
                '2',
                '43',
                '58',
                'https://a0.muscache.com/im/pictures/57c057aa-8bb9-4939-bd52-ac50546ac4b3.jpg?im_w=1200',
                '43.771490',
                '11.257578',
                '0',
                'Italia',
                '(FI)',
                'Firenze'
            ],
            [
                '3',
                'Casa nuova con giardino,bici, a 800mt mare/fiera',
                'Appartamento fra mare e verde, rinnovato completamente in casa bifamiliare: cucina abitabile, due matrimoniali, terza camera x gioco o eventuale lettino per bimbi, sala con divano letto singolo, ampi spazi esterni per pranzare.',
                '5',
                '3',
                '3',
                '73',
                '78',
                'https://a0.muscache.com/im/pictures/55df51a3-442b-44c7-9552-c3aeef619acf.jpg?im_w=1200',
                '44.06036',
                '12.585',
                '0',
                'Italia',
                '(LU)',
                'Viareggio'
            ],
            [
                '4',
                'Finestra sul naviglio',
                'Immergiti nel mix tra moderno e antico di questo appartamento all\'interno di un tipico palazzo di ringhiera, testimonianza della "Vecchia Milano". Arredato con un particolare gusto per gli accostamenti estrosi, ti avvicinerà al cuore della città.',
                '4',
                '2',
                '4',
                '63',
                '58',
                'https://a0.muscache.com/im/pictures/90dc09f7-de36-426b-bef9-4a755cb41d9b.jpg?im_w=1200',
                '45.47019',
                '9.19407',
                '0',
                'Italia',
                '(MI)',
                'Milano'
            ],
            [
                '4',
                'Open Space Loft Navigli Area Milano',
                'Appartamento Loft appena fuori Zona Navigli con Cucina,Soggiorno,Bagno e un soppalco con un letto matrimoniale e un letto singolo per dormire. Il soggiorno è dotato di un grande e comodo divano.',
                '4',
                '3',
                '2',
                '62',
                '64',
                'https://a0.muscache.com/im/pictures/2b988165-34fd-488f-a295-2b27e853c8aa.jpg?im_w=1200',
                '45.46948',
                '9.19183',
                '0',
                'Italia',
                '(MI)',
                'Milano'
            ],
            [
                '4',
                'Grazioso appartamento ben servito',
                'Grazioso appartamento di recente costruzione situato a Bolzano in zona tranquilla composto da sala cucina con divano letto, camera da letto matrimoniale e bagno con doccia.',
                '2',
                '2',
                '2',
                '42',
                '54',
                'https://a0.muscache.com/im/pictures/bd928d67-56a2-413d-b08b-60b40cafe74f.jpg?im_w=1200',
                '45.46864',
                '9.1902',
                '0',
                'Italia',
                '(MI)',
                'Milano'

            ],
            [
                '4',
                'Relax e Design nel Cuore Artistico della Città milanese',
                'Entra in uno spazio che richiama cadenze e ritmi della zona degli artisti con un design curato e moderno, dove i toni morbidi parlano la lingua dell\'ospitalità e della raffinatezza. Spazio alla creatività, dunque: la tua, e quella che qui respirerai.',
                '3',
                '4',
                '3',
                '72',
                '94',
                'https://a0.muscache.com/im/pictures/e525fb71-38e3-4ea3-bff1-16b170034111.jpg?im_w=1200',
                '45.46663',
                '9.18753',
                '0',
                'Italia',
                '(MI)',
                'Milano'
            ],
            [
                '1',
                'Appartamento a Porta Santa Elena, Siena, Colli sienesi',
                'Appartamento nuovo situato in zona Porta Santi, nel centro storico di Cesena. Zona giorno con cucina, zona notte matrimoniale, bagno con doccia. Può ospitare massimo 4 persone: 2 nel matrimoniale + 2 nei divano/letti.',
                '2',
                '4',
                '2',
                '62',
                '64',
                'https://a0.muscache.com/im/pictures/881470d2-d8c0-443f-8c3d-2128a6469ef4.jpg?im_w=1200',
                '44.14192',
                '12.23137',
                '0',
                'Italia',
                '(SI)',
                'Siena'
            ]
        ];

        foreach ($apartments as $apartment) {
            $newApartment = new Apartment();
            $newApartment->user_id = $apartment[0];
            $newApartment->title = $apartment[1];
            $newApartment->description = $apartment[2];
            $newApartment->num_rooms = $apartment[3];
            $newApartment->num_beds = $apartment[4];
            $newApartment->num_baths = $apartment[5];
            $newApartment->mq = $apartment[6];
            $newApartment->price = $apartment[7];
            $newApartment->main_img = $apartment[8];
            $newApartment->latitude = $apartment[9];
            $newApartment->longitude = $apartment[10];
            $newApartment->slug = Str::finish(Str::slug($newApartment->title), rand(1, 1000));
            $newApartment->active = $apartment[11];
            $newApartment->state = $apartment[12];
            $newApartment->province = $apartment[13];
            $newApartment->city = $apartment[14];
            $newApartment->andress = null;
            
            $newApartment->save();

            // $sponsors = Sponsor::inRandomOrder()->limit(3)->get();
            // $newApartment->sponsors()->attach($sponsors);


            $services = Service::inRandomOrder()->get();
            $newApartment->services()->attach($services);
        }
    }
}

// {
//     for($i = 0; $i < 10; $i++){

//         $user = User::inRandomOrder()->first();
//         $newApartment = new Apartment;
//         $newApartment->user_id = $user->id;
//         // $newApartment = new Apartment();
//         // $users = Count(User::all()->toArray());
//         // //dave parto da 0 fino al totale di User:all e ripasso come valore id
//         // $newApartment->user_id = rand(1, $users);
//         // $newApartment->user_id = $users[rand(0, Count($users)-1)]["id"];
        
//         $newApartment->title = $faker->sentence(5);

//         $slug = Str::slug($newApartment->title);
//         $slugIniziale = $slug;
//         $apartmentPresente = Apartment::where('slug', $slug)->first();
//         $contatore = 1;
//         while ($apartmentPresente) {
//             $slug = $slugIniziale . '-' . $contatore;
//             $apartmentPresente = Apartment::where('slug', $slug)->first();
//             $contatore++;
//         }
//         $newApartment->slug = $slug;

//         $newApartment->num_rooms = $faker->randomDigit();
//         $newApartment->num_beds = $faker->numberBetween(1, 8);
//         $newApartment->num_baths = $faker->numberBetween(1,6);
//         $newApartment->mq = $faker->numberBetween(45, 500);
//         $newApartment->city = $faker->city();
//         $newApartment->province = $faker->country();
//         $newApartment->state = $faker->state();
//         $newApartment->latitude = $faker->latitude($min = -90, $max = 90);
//         $newApartment->longitude = $faker->longitude($min = -180, $max = 180);
//         $newApartment->description = $faker->paragraph();
//         $newApartment->main_img = $faker->imageUrl(640, 480, 'animals', true);
//         $newApartment->price = $faker->numberBetween(45, 2500);
//         $newApartment->active = true;
        
//         //save
//         $newApartment->save();
        
//     }
// }