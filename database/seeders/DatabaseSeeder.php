<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'John',
            'lastname' => 'Doe',
            'email' => 'johndoe@ongola.com',
            'sexe' => '1',
            'type' => '1', // assuming '1' is for admin and '2' is for regular user
            'photo' => null,
            'telephone' => '1234567890',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'), // replace 'password' with your desired password
            'theme_preference' => 'dark',
            'remember_token' => \Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        \App\Models\ReceiveClient::factory(50)->create();
        \App\Models\Partenaires::factory(20)->create();
        \App\Models\Livreurs::factory(50)->create();
        $this->call([
            CommandeSeeder::class,
            SuivieLivraisonSeeder::class,
        ]);
    }
}
