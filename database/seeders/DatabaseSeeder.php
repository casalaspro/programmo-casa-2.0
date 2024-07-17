<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'date_of_birth' => '1988-03-19 10:10:30',
            'password' => Hash::make('admin'),
        ]);

        $this->call([
            UserSeeder::class,
            ApartmentSeeder::class,
            SponsorshipSeeder::class,
            ServiceSeeder::class,
            Apartment_ServiceSeeder::class,
            ViewSeeder::class,
            MessageSeeder::class,
            Apartment_SponsorshipSeeder::class,

        ]);
    }
}
