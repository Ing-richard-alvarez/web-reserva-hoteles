<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['id','hotel_id','main_guest', 'identification_number_guest', 'amount_people', 'amount_night', 'start_date_booking', 'end_date_booking', 'booking_price', 'booking_status'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

}
