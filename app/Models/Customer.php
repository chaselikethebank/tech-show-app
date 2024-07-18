<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'notes',
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    /**
     * Get all of the works associated with this customer.
     */
    public function works()
    {
        return $this->hasManyThrough(Work::class, Vehicle::class, 'customer_id', 'vehicle_id');
    }
}
