<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'Naval Ravikant',
                'company' => 'AngelList',
                'email' => 'naval@angellist.com',
                'phone' => '+1-123-456-7890',
                'address' => '123 Startup Blvd',
                'city' => 'San Francisco',
                'state' => 'CA',
                'zip' => '94107',
                'notes' => 'Entrepreneur and angel investor',
            ],
            [
                'name' => 'Elon Musk',
                'company' => 'Tesla, SpaceX',
                'email' => 'elon@tesla.com',
                'phone' => '+1-234-567-8901',
                'address' => '3500 Deer Creek Road',
                'city' => 'Palo Alto',
                'state' => 'CA',
                'zip' => '94304',
                'notes' => 'CEO and founder of Tesla and SpaceX',
            ],
            [
                'name' => 'Marie Forleo',
                'company' => 'Marie Forleo International',
                'email' => 'marie@marieforleo.com',
                'phone' => '+1-345-678-9012',
                'address' => 'New York City',
                'city' => 'New York',
                'state' => 'NY',
                'zip' => '10001',
                'notes' => 'Entrepreneur and author',
            ],
            [
                'name' => 'Tim Ferriss',
                'company' => 'Tim Ferriss LLC',
                'email' => 'tim@timferriss.com',
                'phone' => '+1-456-789-0123',
                'address' => 'Portola Valley',
                'city' => 'California',
                'state' => 'CA',
                'zip' => '94028',
                'notes' => 'Author and podcaster',
            ],
            [
                'name' => 'James Clear',
                'company' => 'James Clear LLC',
                'email' => 'james@jamesclear.com',
                'phone' => '+1-567-890-1234',
                'address' => 'Columbus',
                'city' => 'Ohio',
                'state' => 'OH',
                'zip' => '43215',
                'notes' => 'Author of Atomic Habits',
            ],
            [
                'name' => 'Jerry Seinfeld',
                'company' => 'Seinfeld Productions',
                'email' => 'jerry@seinfeld.com',
                'phone' => '+1-678-901-2345',
                'address' => 'New York City',
                'city' => 'New York',
                'state' => 'NY',
                'zip' => '10001',
                'notes' => 'Comedian and actor',
            ],
            [
                'name' => 'James Cameron',
                'company' => 'Lightstorm Entertainment',
                'email' => 'james@lightstorm.com',
                'phone' => '+1-789-012-3456',
                'address' => 'Santa Monica',
                'city' => 'California',
                'state' => 'CA',
                'zip' => '90401',
                'notes' => 'Filmmaker and director',
            ],
        ]);
    }
}
