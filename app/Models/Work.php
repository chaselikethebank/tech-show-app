<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'license_plate',
        'contact_number',
        'email',
        'personal',
        'description',
        'status',
        'sent',
        'scheduled_at',
        'started_at',
        'completed_at',
        'estimated_cost',
        'final_cost',
        'urgent',
        'notes',
        'recall_notes',
        'customer_feedback',
        'customer_rating',
        'service_type',
        'service_duration',
        'technician_assigned',
        'technician_id', // Added technician_id to fillable attributes
        'additional_costs',
        'customer_authorization_timestamp',
        'quality_assurance_check',
        'post_service_follow_up',
        'service_warranty',
        'customer_signature_image',
        'service_photos',
        'referral_source',
        'follow_up_actions',
        'turnaround_time',
        'turnaround_notification',
        'customer_approval_with_signature',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }
}
