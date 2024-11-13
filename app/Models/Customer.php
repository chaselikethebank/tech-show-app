<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Customer extends Model {
    use HasFactory;

    protected $fillable = [
        'name', 'company', 'email', 'phone', 'address', 'city', 'state', 'zip', 'notes'
    ];

    protected $dates = [ 'created_at', 'updated_at' ];
    // Ensure these fields are treated as Carbon instances

    /**
    * Get the formatted created_at attribute.
    *
    * @return string
    */

    public function getCreatedAtAttribute( $value ) {
        return $value ? Carbon::parse( $value )->format( 'M d, Y h:i A' ) : 'Not Available';
    }

    /**
    * Get the formatted updated_at attribute.
    *
    * @return string
    */

    public function getUpdatedAtAttribute( $value ) {
        return $value ? Carbon::parse( $value )->format( 'M d, Y h:i A' ) : 'Not Available';
    }

    /**
    * Get all of the works associated with this customer.
    */

    public function works() {
        return $this->hasManyThrough( Work::class, Vehicle::class, 'customer_id', 'vehicle_id' );
    }

    public function vehicles() {
        return $this->hasMany( Vehicle::class );
    }
}
