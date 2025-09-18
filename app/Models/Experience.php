<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = "experiences";

    protected $fillable = [
        "driver_id",
        "car_id",
        "grade",
       "comment",
        "date",
    ];

}
