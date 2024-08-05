<?php

namespace Database\Seeders;

use App\Models\Livreurs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivreurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Livreurs::factory()->count(1)->create();
    }
}
