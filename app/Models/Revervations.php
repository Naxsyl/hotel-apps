<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revervations extends Model
{
    protected $fillable = [
        'room_id', 
        'revervation_number', 
        'guest_name', 
        'guest_email', 
        'guest_phone', 
        'guest_status', 
        'guest_id_card', 
        'guest_qty', 
        'guest_room_number', 
        'guest_note', 
        'guest_check_in', 
        'guest_check_out', 
        'total_night', 
        'isOnline', 
        'isReserve', 
        'payment_method', 
        'subtotal', 
        'tax', 
        'totalAmount'
    ];
}
