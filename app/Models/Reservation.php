<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name',
        'capacity',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
