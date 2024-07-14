<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'timer_running',
        'minutes_worked',
        'timer_started_at',
    ];

    protected $casts = [
        'timer_running' => 'boolean',
        'minutes_worked' => 'integer',
        'timer_started_at' => 'datetime',
    ];


    public function getMinutesWorkedAttribute($value)
    {
        return max(0, $value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
