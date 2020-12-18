<?php

namespace App\Models\Bookings;

use App\Models\User;
use App\Models\Comments\BookingComment;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    public function path()
    {
        return "/bookings/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(BookingComment::class, 'booking_id');
    }

    public function addComment($body, $comment_owner_id)
    {
        return $this->comments()->create(['body' => $body, 'comment_owner_id' => $comment_owner_id]);
    }
}
