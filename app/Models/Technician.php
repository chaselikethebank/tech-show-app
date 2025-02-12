<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Jetstream\HasApiTokens;

class Technician extends User
{
    use HasFactory, HasProfilePhoto, HasTeams;

    protected $with = ['works'];
    protected $fillable = ['name', 'email', 'phone', 'notes'];
    protected $table = 'technicians';

    public function works()
    {
        return $this->hasMany(Work::class, 'technician_id');
    }
}
