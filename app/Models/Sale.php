<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /** @use HasFactory<\Database\Factories\SaleFactory> */
    use HasFactory;
    protected $fillable = ['showtime_id', 'slot', 'chairs', 'cost'];

    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }

}
