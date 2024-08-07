<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $this->call(PricesTableSeeder::class);
        $this->call(PartsTableSeeder::class);
        $this->call(TodosSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(VehicleSeeder::class);
        $this->call(TechSeeder::class);
        $this->call([
            CustomerSeeder::class,
            VehicleSeeder::class,
            TechSeeder::class,
            WorkSeeder::class,
        ]);

       User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

}
