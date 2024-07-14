<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prices')->insert([
            ['lower_bound' => 0.00, 'multiplier' => 2.5, 'created_at' => now(), 'updated_at' => now()],
            ['lower_bound' => 100.00, 'multiplier' => 2.0, 'created_at' => now(), 'updated_at' => now()],
            ['lower_bound' => 200.00, 'multiplier' => 1.75, 'created_at' => now(), 'updated_at' => now()],
            ['lower_bound' => 300.00, 'multiplier' => 1.5, 'created_at' => now(), 'updated_at' => now()],
            ['lower_bound' => 500.00, 'multiplier' => 1.25, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
