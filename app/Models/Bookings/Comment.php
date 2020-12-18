<?php

namespace App\Models\Bookings;

use App\Models\Bookings\Booking;
use Illuminate\Database\Eloquent\Model;

class BookingComment extends Model
{
    protected $guarded = [];

    public function project() {
        return $this->belongsTo(Booking::class);
    }

    public function path() {
        return "/bookings/{$this->booking->id}/comments/{$this->id}";
    }
}
