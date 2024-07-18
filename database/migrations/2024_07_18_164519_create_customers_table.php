<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // Check if the column exists before adding it
        if (!Schema::hasColumn('vehicles', 'customer_id')) {
            Schema::table('vehicles', function (Blueprint $table) {
                $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        // Drop foreign key constraint in MySQL/PostgreSQL
        if (Schema::hasColumn('vehicles', 'customer_id')) {
            Schema::table('vehicles', function (Blueprint $table) {
                $table->dropForeign(['customer_id']);
            });
        }

        // Drop table after dropping foreign key in MySQL/PostgreSQL
        Schema::dropIfExists('customers');
    }
}
