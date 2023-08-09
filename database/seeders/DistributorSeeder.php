<?php

namespace Database\Seeders;

use App\Models\Distributor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Distributor::create([
            'name' => 'King of Fruit',
            'email' => 'marketing@kof.com',
            'whatsapp' => '0',
        ]);
    }
}
