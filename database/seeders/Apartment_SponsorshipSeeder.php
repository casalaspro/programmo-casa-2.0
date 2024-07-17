<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class Apartment_SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        $sponsorships = Sponsorship::all();

        $ids_sposnorship = $sponsorships->pluck('id')->all();

        $apartments = Apartment::all();
        // $ids_apartment = $apartments->pluck('id')->all();

        // function randomSponsorshipsOnOff($numAppartments, Faker $faker){
        //     $randomArray = [];
        //     for($i = 0; $i < $numAppartments; $i++){
        //         $randomArray[$i] = $faker->radomNumber(0,1);
        //     }
        //     return $randomArray;
        // }

        // $randomOnOffApartments = randomSponsorshipsOnOff(count($apartments));

        foreach($apartments as $apartment ){

            
            $random_sponsorships = $faker->randomElements($ids_sposnorship);
                // @dd($random_services);
    
                foreach($random_sponsorships as $sponsorship){
                        $apartment->sponsorships()->attach($sponsorship);
                        $apartment->save();
                }
            }
            
        }
        
        
    //     foreach($sponsorships as $sponsorship){
    //         $sposnosrship_apartment = $sponsorship->apartments();
    //         $random_apartments = $faker->randomElements($ids_apartment);
    //         foreach($random_apartments as $apartment){
    //             if($sposnosrship_apartment !== $random_apartments ){
    //                 $sposnosrship_apartment->attach($apartment);
    //                 $sponsorship->save();
    
    //             }
    
                        
    //         }
    //     }
    // }
}