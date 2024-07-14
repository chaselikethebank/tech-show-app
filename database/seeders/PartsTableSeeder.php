<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parts')->insert([
            [
                'part_id' => 'BRK-PAD-001',
                'name' => 'Brake Pad',
                'description' => 'High-quality brake pad for all types of cars',
                'wholesale_price' => 25.99,
                'manufacturer' => 'BrakeCo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'part_id' => 'OIL-FLTR-001',
                'name' => 'Oil Filter',
                'description' => 'Durable oil filter for enhanced engine performance',
                'wholesale_price' => 7.99,
                'manufacturer' => 'FilterPro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'part_id' => 'AIR-FLTR-001',
                'name' => 'Air Filter',
                'description' => 'Efficient air filter for cleaner air intake',
                'wholesale_price' => 12.99,
                'manufacturer' => 'AirMaster',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more parts as needed
        ]);
    }
}
