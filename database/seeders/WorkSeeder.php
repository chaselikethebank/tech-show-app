<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WorkSeeder extends Seeder
{
    public function run()
    {
        // Seed data with valid customer and vehicle IDs
        $works = [
            [
                'customer_id' => 1, // Naval Ravikant
                'vehicle_id' => 1,  // Porsche 911 (1986) - Red
                'technician_id' => 1, // Ensure this ID exists in your technicians table
                'description' => 'Routine maintenance',
                'status' => 'completed',
                'estimated_cost' => 100,
                'final_cost' => 90,
                'scheduled_at' => now(),
                'started_at' => now(),
                'completed_at' => now(),
                'notes' => 'Completed ahead of schedule.',
                // Add more fields if necessary
            ],
            [
                'customer_id' => 2, // Elon Musk
                'vehicle_id' => 4,  // Bugatti Veyron (2014) - Blue
                'technician_id' => 2, // Ensure this ID exists in your technicians table
                'description' => 'Engine check-up',
                'status' => 'inProgress',
                'estimated_cost' => 200,
                'final_cost' => 180,
                'scheduled_at' => now(),
                'started_at' => now(),
                'completed_at' => null,
                'notes' => 'Waiting for parts.',
                // Add more fields if necessary
            ],
            [
                'customer_id' => 3, // Marie Forleo
                'vehicle_id' => 5,  // Mercedes-Benz 280SL (1969) - Black
                'technician_id' => 2, // Ensure this ID exists in your technicians table
                'description' => 'Body repair',
                'status' => 'pending',
                'estimated_cost' => 300,
                'final_cost' => null,
                'scheduled_at' => now(),
                'started_at' => null,
                'completed_at' => null,
                'notes' => 'Pending approval from customer.',
                // Add more fields if necessary
            ],
        ];

        foreach ($works as $work) {
            try {
                DB::table('works')->insert($work);
                Log::info('Inserted work record:', $work);
            } catch (\Exception $e) {
                Log::error('Error seeding works table: ' . $e->getMessage());
            }
        }
    }
}
