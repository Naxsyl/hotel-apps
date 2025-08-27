<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revervations extends Model
{
     protected $fillable = [
        'guest_name',
        'guest_email',
        'guest_phone',
        'guest_status',
        'guest_note',
        'guest_check_in',
        'guest_check_out',
        'guest_id_card',
        'guest_qty',
        'room_id',
        'payment_method',
        'revervation_number',
        'isOnline',
        'isReserve',
        'subtotal',
        'totalAmount',
    ];
}
