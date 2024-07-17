<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // creiamo un array di servizi aggiuntivi
        $service_names = ['wi-fi','parcheggio','piscina','spa','vista mare','vista lago','vista fiume','essenziali','tv','balcone','animali','reception','ammobiliato','non ammobiliato','ascensore','climatizzatore'];
        
        // cicliamo i vari servizi
        for($i = 0; $i < count($service_names); $i++ ){
            $new_service = new Service();

            // popolo la colonna dei nomi dei servizi con nomi presi dall'array creato prima 
            $new_service->name = $service_names[$i];
            // salvo i servizi
            $new_service->save();
        }
    }
}
