<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'facility',
        'capacity',
        'availability'
    ];

    public function booking(){
        return $this->hasMany(BookingList::class);
    }
}
