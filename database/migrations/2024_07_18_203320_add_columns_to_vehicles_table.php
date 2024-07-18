<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            //
            $table->integer('mileage')->after('vin');
            $table->string('engine')->after('mileage');
            $table->string('transmission')->after('engine');
            $table->string('drive_type')->after('transmission');
            $table->string('fuel_type')->after('drive_type');
            $table->string('cylinders')->after('fuel_type');
            $table->string('displacement')->after('cylinders');
            $table->string('horsepower')->after('displacement');
            $table->string('torque')->after('horsepower');
            $table->string('compression_ratio')->after('torque');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn([
                'mileage',
                'engine',
                'transmission',
                'drive_type',
                'fuel_type',
                'cylinders',
                'displacement',
                'horsepower',
                'torque',
                'compression_ratio',
            ]);
        });
    }
};
