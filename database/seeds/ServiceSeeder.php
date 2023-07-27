<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $services = ['Wi-fi', 'Posto auto', 'Piscina', 'Portineria', 'Sauna', 'Vista mare'];

        $links = [
            'fas fa-wifi', 
            'fas fa-parking', 
            'fas fa-swimming-pool', 
            'fas fa-concierge-bell', 
            'fas fa-cloud', 
            'fas fa-water'
        ];

        
        foreach ($services as $key => $service) {
            $newService = new Service();
            
            $newService->name = $service;
            $newService->image_link = $links[$key];
            $newService->visibility = false;
            $newService->save();
        }
    }
}
