<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->string('make');
            $table->string('model');
            $table->string('year');
            $table->string('color')->nullable();
            $table->string('vin')->nullable();
            $table->string('license_plate')->nullable();
            $table->text('notes')->nullable();
            $table->integer('mileage');
            $table->string('engine');
            $table->string('transmission');
            $table->string('drive_type');
            $table->string('fuel_type');
            $table->string('cylinders');
            $table->string('displacement');
            $table->string('horsepower');
            $table->string('torque');
            $table->string('compression_ratio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
