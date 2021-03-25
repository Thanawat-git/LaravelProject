<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectsModel extends Model
{
    //
    protected $table="Subjects";

    protected $fillable= [
        'id','Sub_code','Sub_name'
    ]; //บอกว่าฟิวไหนสามารถเติมข้อความได้บ้าง
}
