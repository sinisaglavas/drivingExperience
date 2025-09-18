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

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
}
