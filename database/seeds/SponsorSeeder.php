<?php

use Illuminate\Database\Seeder;
use App\Sponsor;
use App\Apartment;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
                "price" => 2.99,
                "duration" => 24,
                "description" => "sponsorizza i tuoi appartamenti per 24 ore"
            ],
            [
                "price" => 5.99,
                "duration" => 72,
                "description" => "sponsorizza i tuoi appartamenti per 72 ore"
            ],
            [
                "price" => 9.99,
                "duration" => 144,
                "description" => "sponsorizza i tuoi appartamenti per 144 ore"
            ]
        ];

        foreach($sponsors as $sponsor){
            $newSponsor = new Sponsor();

            $newSponsor->price = $sponsor["price"];
            $newSponsor->duration = $sponsor["duration"];
            $newSponsor->description = $sponsor["description"];
            $newSponsor->save();
        }
    }
}