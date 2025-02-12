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
        Schema::table('technician_work', function (Blueprint $table) {
            // $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');
            // $table->foreign('technician_id')->references('id')->on('technicians')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('technician_work', function (Blueprint $table) {
            // $table->dropForeign(['work_id']);
            // $table->dropForeign(['technician_id']);
        });
    }

};
