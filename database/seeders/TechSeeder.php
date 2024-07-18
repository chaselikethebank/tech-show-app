<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechSeeder extends Seeder
{
    /**
     * Seed the techs table.
     *
     * @return void
     */
    public function run()
    {
        DB::table('techs')->insert([
            [
                'name' => 'Matt',
                'email' => 'matt@example.com',
                'phone' => '+1-111-111-1111',
                'notes' => 'Experienced with a variety of vehicles.',
            ],
            [
                'name' => 'Chase',
                'email' => 'chase@example.com',
                'phone' => '+1-222-222-2222',
                'notes' => 'Expert in European luxury and classic cars.',
            ],
        ]);
    }
}
