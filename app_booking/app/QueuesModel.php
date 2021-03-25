<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QueuesModel extends Model
{
    //
    protected $table="Queues";

    protected $fillable= [
        'id','QNo','Status','Date','Time_Strat','Time_End','Sub_id','Teacher_id'
    ];
}
