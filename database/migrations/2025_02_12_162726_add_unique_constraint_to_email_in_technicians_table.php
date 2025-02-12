<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('technicians', function (Blueprint $table) {
            $table->unique('email');
        });
    }

    public function down()
    {
        Schema::table('technicians', function (Blueprint $table) {
            $table->dropUnique('technicians_email_unique');
        });
    }

};
