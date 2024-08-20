<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Jetstream\HasApiTokens;

class Tech extends User
{
    // use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['works'];
    protected $table = 'techs';

    /**
     * Get all of the works for the tech.
     */
    public function works()
    {
        return $this->hasMany(Work::class, 'technician_id');
    }
}
