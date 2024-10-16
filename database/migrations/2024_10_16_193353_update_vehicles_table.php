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
            $table->string('color')->nullable()->change();
            $table->string('vin')->nullable()->change();
            $table->string('license_plate')->nullable()->change();
            $table->text('notes')->nullable()->change();
            $table->integer('mileage')->nullable()->change();
            $table->string('engine')->nullable()->change();
            $table->string('transmission')->nullable()->change();
            $table->string('drive_type')->nullable()->change();
            $table->string('fuel_type')->nullable()->change();
            $table->string('cylinders')->nullable()->change();
            $table->string('displacement')->nullable()->change();
            $table->string('horsepower')->nullable()->change();
            $table->string('torque')->nullable()->change();
            $table->string('compression_ratio')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
