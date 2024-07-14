<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    protected $fillable = [
        'part_id',
        'name',
        'description',
        'wholesale_price',
        'manufacturer',
    ];

    public function getPriceAttribute()
    {
        $wholesalePrice = $this->wholesale_price;
        $tiers = Price::orderBy('lower_bound', 'desc')->get();

        foreach ($tiers as $tier) {
            if ($wholesalePrice >= $tier->lower_bound) {
                return $wholesalePrice * $tier->multiplier;
            }
        }

        return $wholesalePrice; // Default if no tier matches
    }
}
