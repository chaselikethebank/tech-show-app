<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->foreignId('technician_id')->constrained('users')->onDelete('cascade');
            $table->string('license_plate')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->text('personal')->nullable();
            $table->text('description');
            $table->enum('status', ['estimate', 'sent_estimate', 'unassigned', 'assigned', 'inProgress', 'pending', 'done', 'edit_request', 'sublet', 'recall'])->default('estimate');
            $table->boolean('sent')->default(false);
            $table->dateTime('scheduled_at')->nullable();
            $table->dateTime('started_at')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->decimal('estimated_cost', 10, 2)->nullable();
            $table->decimal('final_cost', 10, 2)->nullable();
            $table->boolean('urgent')->default(false);
            $table->text('notes')->nullable();
            $table->text('recall_notes')->nullable();
            $table->text('customer_feedback')->nullable();
            $table->enum('customer_rating', ['1_star', '2_stars', '3_stars', '4_stars', '5_stars', 'not_rated'])->default('not_rated');
            $table->enum('service_type', ['maintenance', 'repair', 'customization', 'other'])->nullable();
            $table->text('service_duration')->nullable();
            $table->decimal('additional_costs', 10, 2)->nullable();
            $table->dateTime('customer_authorization_timestamp')->nullable();
            $table->boolean('quality_assurance_check')->default(false);
            $table->dateTime('post_service_follow_up')->nullable();
            $table->text('service_warranty')->nullable();
            $table->string('customer_signature_image')->nullable();
            $table->text('service_photos')->nullable();
            $table->string('referral_source')->nullable();
            $table->enum('follow_up_actions', ['additional_repairs', 'scheduled_maintenance', 'none'])->default('none');
            $table->text('turnaround_time')->nullable();
            $table->dateTime('turnaround_notification')->nullable();
            $table->boolean('customer_approval_with_signature')->default(false);
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
        Schema::dropIfExists('works');
    }
}
