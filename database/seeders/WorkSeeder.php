<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class WorksTableSeeder extends Seeder
{
    public function run()
    {
        // Define the statuses
        $statuses = [
            'estimate',
            'sent_estimate',
            'unassigned',
            'assigned',
            'inProgress',
            'pending',
            'done',
            'edit_request',
            'sublet',
            'recall',
        ];

        // Define the customer and vehicle IDs
        $customers = [1, 2, 3, 4, 5, 6, 7];
        $vehicles = [1, 2, 3, 4, 5];

        // Define a set of dummy data for seeding with each status
        $data = [];
        $now = Carbon::now();

        foreach ($statuses as $index => $status) {
            $data[] = [
                'customer_id' => $customers[$index % count($customers)], // Rotate through customers
                'vehicle_id' => $vehicles[$index % count($vehicles)], // Rotate through vehicles
                'technician_id' => rand(1, 10), // Random technician_id for testing
                'license_plate' => strtoupper(substr(md5(rand()), 0, 6)),
                'contact_number' => '123-456-' . rand(1000, 9999),
                'email' => 'customer' . ($index % count($customers) + 1) . '@example.com',
                'personal' => 'Personal notes for ' . $status,
                'description' => 'Description for ' . $status,
                'status' => $status,
                'sent' => (bool)rand(0, 1),
                'scheduled_at' => $now->addDays(rand(1, 10)),
                'started_at' => $now->addDays(rand(1, 10)),
                'completed_at' => $now->addDays(rand(1, 10)),
                'estimated_cost' => rand(50, 200),
                'final_cost' => rand(60, 220),
                'urgent' => (bool)rand(0, 1),
                'notes' => 'Additional notes for ' . $status,
                'recall_notes' => 'Recall notes for ' . $status,
                'customer_feedback' => 'Feedback for ' . $status,
                'customer_rating' => ['1_star', '2_stars', '3_stars', '4_stars', '5_stars'][array_rand(['1_star', '2_stars', '3_stars', '4_stars', '5_stars'])],
                'service_type' => ['maintenance', 'repair', 'customization', 'other'][array_rand(['maintenance', 'repair', 'customization', 'other'])],
                'service_duration' => rand(1, 5) . ' hours',
                'additional_costs' => rand(10, 50),
                'customer_authorization_timestamp' => $now->addDays(rand(1, 10)),
                'quality_assurance_check' => (bool)rand(0, 1),
                'post_service_follow_up' => $now->addMonth(),
                'service_warranty' => rand(1, 3) . ' years',
                'customer_signature_image' => 'signature' . rand(1, 10) . '.png',
                'service_photos' => 'photo' . rand(1, 10) . '.jpg',
                'referral_source' => ['Google', 'Referral', 'Social Media', 'Other'][array_rand(['Google', 'Referral', 'Social Media', 'Other'])],
                'follow_up_actions' => ['additional_repairs', 'scheduled_maintenance', 'none'][array_rand(['additional_repairs', 'scheduled_maintenance', 'none'])],
                'turnaround_time' => rand(1, 7) . ' days',
                'turnaround_notification' => $now->addDays(rand(1, 7)),
                'customer_approval_with_signature' => (bool)rand(0, 1),
            ];
        }

         DB::table('works')->insert($data);
    }
}
