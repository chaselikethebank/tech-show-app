<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WorkSeeder extends Seeder
{
    public function run()
    {
        $works = [
            [
                'customer_id' => 1,
                'vehicle_id' => 1,
                'technician_id' => 1,
                'description' => 'Routine maintenance',
                'status' => 'completed',
                'estimated_cost' => 100,
                'final_cost' => 90,
                'scheduled_at' => now(),
                'started_at' => now(),
                'completed_at' => now(),
                'notes' => 'Completed ahead of schedule.',
            ],
            [
                'customer_id' => 2,
                'vehicle_id' => 4,
                'technician_id' => 2,
                'description' => 'Engine check-up',
                'status' => 'inProgress',
                'estimated_cost' => 200,
                'final_cost' => 180,
                'scheduled_at' => now(),
                'started_at' => now(),
                'completed_at' => null,
                'notes' => 'Waiting for parts.',
            ],
            [
                'customer_id' => 3,
                'vehicle_id' => 5,
                'technician_id' => 2,
                'description' => 'Body repair',
                'status' => 'pending',
                'estimated_cost' => 300,
                'final_cost' => null,
                'scheduled_at' => now(),
                'started_at' => null,
                'completed_at' => null,
                'notes' => 'Pending approval from customer.',
            ],
            [
                'customer_id' => 4,
                'vehicle_id' => 14,
                'technician_id' => 1,
                'description' => 'Oil change',
                'status' => 'completed',
                'estimated_cost' => 50,
                'final_cost' => 45,
                'scheduled_at' => now(),
                'started_at' => now(),
                'completed_at' => now(),
                'notes' => 'Completed on time.',
            ],
            [
                'customer_id' => 5,
                'vehicle_id' => 18,
                'technician_id' => 2,
                'description' => 'Tire rotation',
                'status' => 'inProgress',
                'estimated_cost' => 75,
                'final_cost' => 70,
                'scheduled_at' => now(),
                'started_at' => now(),
                'completed_at' => null,
                'notes' => 'In progress.',
            ],
            [
                'customer_id' => 6,
                'vehicle_id' => 22,
                'technician_id' => 1,
                'description' => 'Brake pads replacement',
                'status' => 'pending',
                'estimated_cost' => 150,
                'final_cost' => null,
                'scheduled_at' => now(),
                'started_at' => null,
                'completed_at' => null,
                'notes' => 'Pending approval.',
            ],
            [
                'customer_id' => 7,
                'vehicle_id' => 25,
                'technician_id' => 2,
                'description' => 'Battery replacement',
                'status' => 'completed',
                'estimated_cost' => 100,
                'final_cost' => 95,
                'scheduled_at' => now(),
                'started_at' => now(),
                'completed_at' => now(),
                'notes' => 'Completed successfully.',
            ],
            [
                'customer_id' => 8,
                'vehicle_id' => 28,
                'technician_id' => 1,
                'description' => 'Air filter replacement',
                'status' => 'inProgress',
                'estimated_cost' => 25,
                'final_cost' => 20,
                'scheduled_at' => now(),
                'started_at' => now(),
                'completed_at' => null,
                'notes' => 'In progress.',
            ],
            [
                'customer_id' => 9,
                'vehicle_id' => 29,
                'technician_id' => 2,
                'description' => 'Spark plug replacement',
                'status' => 'pending',
                'estimated_cost' => 120,
                'final_cost' => null,
                'scheduled_at' => now(),
                'started_at' => null,
                'completed_at' => null,
                'notes' => 'Pending approval.',
            ],
            [
                'customer_id' => 10,
                'vehicle_id' => 15,
                'technician_id' => 1,
                'description' => 'Transmission flush',
                'status' => 'completed',
                'estimated_cost' => 80,
                'final_cost' => 75,
                'scheduled_at' => now(),
                'started_at' => now(),
                'completed_at' => now(),
                'notes' => 'Completed on schedule.',
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
