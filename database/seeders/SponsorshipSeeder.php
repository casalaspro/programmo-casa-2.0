<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creiamo il piano di abbonamento base
        $new_base = new Sponsorship();
        $new_base->name = 'Base';
        $new_base->price = 2.99;
        $new_base->duration = 24;

        // creiamo il piano di abbonamento medio
        $new_medium = new Sponsorship();
        $new_medium->name = 'Medium';
        $new_medium->price = 5.99;
        $new_medium->duration = 72;

        // creiamo il piano di abbonamento premium
        $new_premium = new Sponsorship();
        $new_premium->name = 'Premium';
        $new_premium->price = 9.99;
        $new_premium->duration = 144;

        // salviamo i vari piani di abbonamento 
        $new_base->save();
        $new_medium->save();
        $new_premium->save();

    }
}
