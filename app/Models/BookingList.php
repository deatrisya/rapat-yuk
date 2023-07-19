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

    // protected $appends = ['status_badge'];
    // public function getStatusBadgeAttribute()
    // {
    //     $status = $this->attributes['status'];
    //     $badgeClass = '';

    //     if ($status == 'Pending') {
    //         $badgeClass = 'badge bg-label-primary';
    //     } elseif ($status == 'Disetujui') {
    //         $badgeClass = 'badge bg-label-success';
    //     }

    //     return '<span class="' . $badgeClass . '">' . $status . '</span>';
    // }
}