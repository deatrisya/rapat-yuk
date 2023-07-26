<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingList extends Model
{
    use HasFactory;
    // protected $appends = ['status_badge'];

    protected $fillable = [
        'room_id',
        'user_id',
        'date',
        'start_time',
        'end_time',
        'description',
        'status',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
