<?php

use Illuminate\Database\Seeder;
use App\Image;
use App\Apartment;
use Faker\Generator as Faker;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {



        $images = [
            [
                '1',
                '1',
                'https://a0.muscache.com/im/pictures/8d08454b-645e-42aa-ba69-d12e05424bf9.jpg?im_w=1440'
            ],
            [
                '2',
                '1',
                'https://a0.muscache.com/im/pictures/532b0835-0814-4fef-b7cd-733df2e7f598.jpg?im_w=1440'
            ],
            [
                '3',
                '2',
                'https://a0.muscache.com/im/pictures/627ca4ef-72fd-4672-b7e7-c7b3a1fb0b46.jpg?im_w=1440'
            ],
            [
                '4',
                '2',
                'https://a0.muscache.com/im/pictures/ac4d0a62-6fc0-4f9a-bb41-f49c025039b7.jpg?im_w=1440'
            ],
            [
                '5',
                '3',
                'https://a0.muscache.com/im/pictures/26d704fc-b6e4-4546-9cdc-0566c3dc8de4.jpg?im_w=1440'
            ],
            [
                '6',
                '3',
                'https://a0.muscache.com/im/pictures/84c8aafb-19ce-48a0-9d13-c69c230ffc1f.jpg?im_w=1440'
            ],
            [
                '7',
                '4',
                'https://a0.muscache.com/im/pictures/ab3871a5-6e9b-4aa0-9239-2e8cabb0815b.jpg?im_w=1440'
            ],
            [
                '8',
                '4',
                'https://a0.muscache.com/im/pictures/d8a2d3db-244a-404b-ab38-15cf58ad7f9c.jpg?im_w=1440'
            ],
            [
                '9',
                '5',
                'https://a0.muscache.com/im/pictures/d1518e62-8900-4afb-a428-2ebc57386cf8.jpg?im_w=1440'
            ],
            [
                '10',
                '5',
                'https://a0.muscache.com/im/pictures/ff556dd4-6781-42a9-95b3-1465a3983daa.jpg?im_w=1440'
            ],
            [
                '11',
                '6',
                'https://a0.muscache.com/im/pictures/1b7837d4-a539-485d-a26c-390aed5d0ca0.jpg?im_w=1440'
            ],
            [
                '12',
                '6',
                'https://a0.muscache.com/im/pictures/6fd7bcda-7a09-4e8a-b362-92b084368f1a.jpg?im_w=1440'
            ],
            [
                '13',
                '7',
                'https://a0.muscache.com/im/pictures/b1adefc0-9cf3-43be-9e4b-9c4c522cd6ce.jpg?im_w=1440'
            ],
            [
                '14',
                '7',
                'https://a0.muscache.com/im/pictures/ee406f91-4ec4-423f-8016-869fbfa5ff78.jpg?im_w=1440'
            ],
            [
                '15',
                '8',
                'https://a0.muscache.com/im/pictures/563f4e94-4c2b-42bb-8c79-c2a5d10ffd69.jpg?im_w=1440'
            ],
            [
                '16',
                '8',
                'https://a0.muscache.com/im/pictures/298c25cc-960a-4029-906a-4be1bf273502.jpg?im_w=1440'
            ],
            [
                '17',
                '9',
                'https://a0.muscache.com/im/pictures/5b33764f-0a65-4e5d-af3a-801b0396e0d0.jpg?im_w=1440'
            ],
            [
                '18',
                '9',
                'https://a0.muscache.com/im/pictures/21860877/2eff7459_original.jpg?im_w=1440'
            ],
            [
                '19',
                '10',
                'https://a0.muscache.com/im/pictures/3c1e0030-b56f-4001-a340-8325238bc7cf.jpg?im_w=1200'
            ],
            [
                '20',
                '10',
                'https://a0.muscache.com/im/pictures/c600c8b1-3bd2-4529-a717-e557d5e05860.jpg?im_w=1440'
            ],
            [
                '21',
                '11',
                'https://a0.muscache.com/im/pictures/6ca0ceca-8f43-4098-b63c-a70f86371a91.jpg?im_w=1440'
            ],
            [
                '22',
                '11',
                'https://a0.muscache.com/im/pictures/afac3dcf-1da8-47fd-9eb9-b9120171e72a.jpg?im_w=1440'
            ],
            [
                '23',
                '12',
                'https://a0.muscache.com/im/pictures/21860877/2eff7459_original.jpg?im_w=1440'
            ],
            [
                '24',
                '12',
                'https://a0.muscache.com/im/pictures/816a1c14-daca-41a7-9c34-ea194ec25ea3.jpg?im_w=1440'
            ],
            [
                '25',
                '13',
                'https://a0.muscache.com/im/pictures/be578ef1-034e-4b78-9b77-13080eac06ee.jpg?im_w=1200'
            ],
            [
                '26',
                '13',
                'https://a0.muscache.com/im/pictures/8d7169b3-973f-455e-88be-63908a5a82c9.jpg?im_w=1440'
            ],
            [
                '27',
                '14',
                'https://a0.muscache.com/im/pictures/143bc467-9566-45d5-a6c7-0f63ee03b144.jpg?im_w=1440'
            ],
            [
                '28',
                '14',
                'https://a0.muscache.com/im/pictures/816a1c14-daca-41a7-9c34-ea194ec25ea3.jpg?im_w=1440'
            ],
            [
                '29',
                '15',
                'https://a0.muscache.com/im/pictures/daf2c0d3-edc5-4c0b-aa6e-0e79213b7fbe.jpg?im_w=1440'
            ],
            [
                '30',
                '15',
                'https://a0.muscache.com/im/pictures/83259991/8c7b7898_original.jpg?im_w=1440'
            ],
            [
                '31',
                '16',
                'https://a0.muscache.com/im/pictures/1df288ee-60c2-4b20-b5e1-40a65a3c04f2.jpg?im_w=1440'
            ],
            [
                '32',
                '16',
                'https://a0.muscache.com/im/pictures/06c8c901-6610-4479-b89e-b0e3982c5fee.jpg?im_w=1440'
            ],
            [
                '33',
                '17',
                'https://a0.muscache.com/im/pictures/674900b4-b097-4788-a8f6-967747e9a02b.jpg?im_w=1440'
            ],
            [
                '34',
                '17',
                'https://a0.muscache.com/im/pictures/8db8b798-a33d-4ed3-89d3-399f1880947e.jpg?im_w=1440'
            ],
            [
                '35',
                '18',
                'https://a0.muscache.com/im/pictures/e8a0da9e-a2ad-46e8-8fa7-068e1be5f928.jpg?im_w=1440'
            ],
            [
                '36',
                '18',
                'https://a0.muscache.com/im/pictures/ac9811d2-2390-440e-b531-9ccaae9a504e.jpg?im_w=1440'
            ],
            [
                '37',
                '19',
                'https://a0.muscache.com/im/pictures/ac9811d2-2390-440e-b531-9ccaae9a504e.jpg?im_w=1440'
            ],
            [
                '38',
                '19',
                'https://a0.muscache.com/im/pictures/33647eac-0590-4224-a007-0cbdd03c2664.jpg?im_w=1440'
            ],
            [
                '39',
                '20',
                'https://a0.muscache.com/im/pictures/d79bc6c4-fae2-40d3-8e6c-30473392aa0e.jpg?im_w=1200'
            ],
            [
                '40',
                '20',
                'https://a0.muscache.com/im/pictures/5e09ad8d-3940-40f5-a4be-00953eebd6a2.jpg?im_w=1440'
            ],

        ];

        foreach($images as $image){
            $newImage = new Image();
            $newImage->id = $image[0];
            $newImage->apartment_id = $image[1];
            $newImage->src = $image[2];


            $newImage->save();
        }
        // for($i = 0; $i < 10; $i++) {
        //     $newImage = new Image();
        
        //     // $conteggioImages = Count(Apartment::all()->toArray());
        //     // $new_image->apartment_id = rand(1, $conteggioImages);
        //     $newImage->src = $faker->imageUrl(640, 480, 'animals', true);

        //     $apartments = Apartment::all()->toArray();
        //     $newImage->apartment_id = $apartments[rand(0, Count($apartments)-1)]["id"];
        //     // $new_image->src = $faker->imageUrl(640, 480, 'animals', true);
        //     // $new_image->img_description = $faker->text(15);
        
        //     $newImage->save();
        // }
    }
}