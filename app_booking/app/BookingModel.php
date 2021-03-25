<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    //
    protected $table="Booking";

    protected $fillable= [
        'id','user_id','queue_id'
    ];
}
