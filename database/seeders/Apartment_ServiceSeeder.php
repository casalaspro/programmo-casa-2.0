<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class Apartment_ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
       $services = Service::all();
       $ids_service = $services->pluck('id')->all();

       $apartments = Apartment::all();
    //    $ids_apartment = $apartment->pluck('id')->all();


        foreach($apartments as $apartment ){

            $random_services = $faker->randomElements($ids_service, null);
            // @dd($random_services);

            foreach($random_services as $service){
                $apartment->services()->attach($service);
                $apartment->save();
                
            }
        }
    }
}
