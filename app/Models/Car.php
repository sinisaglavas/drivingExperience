<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = "cars";

    protected $fillable = [
        "driver_id",
        "brand",
        "model",
        "year_production",
    ];
    //One-to-many: jedan automobil → više iskustava
    public function experiences()
    {
        return $this->hasMany(Experience::class, 'car_id', 'id')
            ->orderBy('date');
    }

    public function averageGrade()
    {
        return $this->experiences()->avg('grade');
    }

}
