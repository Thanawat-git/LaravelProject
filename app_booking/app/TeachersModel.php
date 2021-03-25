<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeachersModel extends Model
{
    //
    protected $table="Teachers";

    protected $fillable= [
        'id','Title','Teacher_name','Teacher_sur'
    ];
}
