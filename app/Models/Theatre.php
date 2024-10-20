<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    /** @use HasFactory<\Database\Factories\TheatreFactory> */
    use HasFactory;
    protected $fillable = ['name', 'address'];

    public function showtimes()
    {
        $this->hasMany(Showtime::class);
    }

    public function movies()
    {
        $this->hasManyThrough(Movie::class, Showtime::class);
    }

    public function sales()
    {
        $this->hasManyThrough(Sale::class, Showtime::class);
    }
}
