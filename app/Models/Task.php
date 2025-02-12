<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    use HasFactory;

    protected $fillable = [ 'description', 'status', 'work_id' ];

    public function technicians() {
        return $this->belongsToMany( Technician::class, 'task_technician' );
    }

    public function work() {
        return $this->belongsTo( Work::class );
    }

}
