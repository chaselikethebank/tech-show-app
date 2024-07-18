<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
            [
                'customer_id' => 1,  // Naval Ravikant
                'make' => 'Porsche',
                'model' => '911',
                'year' => '1986',
                'color' => 'Red',
                'vin' => 'WP0AB0912GS123456',
                'license_plate' => 'ABC123',
                'notes' => 'Classic 911 model',
                'mileage' => 12345,
                'engine' => '3.2L H6',
                'transmission' => 'Manual',
                'drive_type' => 'RWD',
                'fuel_type' => 'Gasoline',
                'cylinders' => '6',
                'displacement' => '3.2L',
                'horsepower' => '217 HP',
                'torque' => '198 lb-ft',
                'compression_ratio' => '9.3:1',
            ],
            [
                'customer_id' => 1,  // Naval Ravikant
                'make' => 'Porsche',
                'model' => '911 Carrera',
                'year' => '1986',
                'color' => 'Silver',
                'vin' => 'WP0AB0911GS654321',
                'license_plate' => 'DEF456',
                'notes' => 'Upgraded Carrera model',
                'mileage' => 23456,
                'engine' => '3.2L H6',
                'transmission' => 'Manual',
                'drive_type' => 'RWD',
                'fuel_type' => 'Gasoline',
                'cylinders' => '6',
                'displacement' => '3.2L',
                'horsepower' => '217 HP',
                'torque' => '198 lb-ft',
                'compression_ratio' => '9.3:1',
            ],
            [
                'customer_id' => 1,  // Naval Ravikant
                'make' => 'Porsche',
                'model' => '911 Turbo',
                'year' => '1991',
                'color' => 'Black',
                'vin' => 'WP0ZZZ96ZMS123456',
                'license_plate' => 'GHI789',
                'notes' => 'Turbocharged model',
                'mileage' => 34567,
                'engine' => '3.3L Turbo H6',
                'transmission' => 'Manual',
                'drive_type' => 'RWD',
                'fuel_type' => 'Gasoline',
                'cylinders' => '6',
                'displacement' => '3.3L',
                'horsepower' => '320 HP',
                'torque' => '304 lb-ft',
                'compression_ratio' => '8.0:1',
            ],
            [
                'customer_id' => 2,  // Elon Musk
                'make' => 'Bugatti',
                'model' => 'Veyron',
                'year' => '2014',
                'color' => 'Blue',
                'vin' => 'VF9SP2B0XGG000001',
                'license_plate' => 'JKL012',
                'notes' => 'High-performance vehicle',
                'mileage' => 54321,
                'engine' => '8.0L Quad-Turbo W16',
                'transmission' => 'Dual-Clutch',
                'drive_type' => 'AWD',
                'fuel_type' => 'Gasoline',
                'cylinders' => '16',
                'displacement' => '8.0L',
                'horsepower' => '1001 HP',
                'torque' => '922 lb-ft',
                'compression_ratio' => '8.0:1',
            ],
            [
                'customer_id' => 3,  // Marie Forleo
                'make' => 'Mercedes-Benz',
                'model' => '280SL',
                'year' => '1969',
                'color' => 'Black',
                'vin' => '108.040.12.021198',
                'license_plate' => 'MNO345',
                'notes' => 'Classic convertible',
                'mileage' => 67890,
                'engine' => '2.8L I6',
                'transmission' => 'Automatic',
                'drive_type' => 'RWD',
                'fuel_type' => 'Gasoline',
                'cylinders' => '6',
                'displacement' => '2.8L',
                'horsepower' => '168 HP',
                'torque' => '181 lb-ft',
                'compression_ratio' => '8.6:1',
            ],
         ]);
    }
}
