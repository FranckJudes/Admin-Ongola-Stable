<?php

namespace Database\Seeders;

use App\Models\ReceiveClient;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReceiveClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReceiveClient::create([
            'name' => 'Client 1',
            'adresse' => 'Adresse 1',
            'telephone' => '123456789',
            'cni' => 'CNI123456',
        ]);

        ReceiveClient::create([
            'name' => 'Client 2',
            'adresse' => 'Adresse 2',
            'telephone' => '987654321',
            'cni' => 'CNI654321',
        ]);
    }
}
