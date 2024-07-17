<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        // creo array di nomi random
        $names = ['Andrea', 'Marco', 'Luca', 'Anna', 'Martina', 'Giada'];

        // creo array di cognomi random 
        $surnames = ['Della Serra', 'Rossi', 'Pisani', 'Corrarati', 'Morellato', 'Costa'];

        // recupero l'id dal model e dalla tabella di apartments
        $apartments = Apartment::all();

        $ids = $apartments->pluck('id')->all();

        // creo ciclo for per generare dati in tabella
        for($i = 0; $i < 20; $i++){

            $new_message = new Message();

            $new_message->apartment_id = $faker->randomElement($ids);
            // popolo la colonna delle mail con dati random
            $new_message->email_sender = $faker->email();
            // popolo la colonna del testo del messaggio con frasi random
            $new_message->text = $faker->paragraph();
            // prendo un nome random dall'array creato prima
            $new_message->name = $faker->randomElement($names);
            // prendo un cognome random dall'array creato prima
            $new_message->surname = $faker->randomElement($surnames);
            // popolo la colonna dei numeri di cellulare con dati random
            $new_message->phone_number = $faker->numerify('+39 ###-###-####');
            // salvo i vari messaggi
            $new_message->save();
        }
    }
}
