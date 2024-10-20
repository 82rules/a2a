<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    /** @use HasFactory<\Database\Factories\ShowtimeFactory> */
    use HasFactory;

    protected $fillable = ['theatre_id', 'movie_id', 'slots', 'chairs', 'price'];

    public function theatre()
    {
        return $this->belongsTo(Theatre::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function sales()
    {
        $this->hasMany(Sale::class);;
    }
}
