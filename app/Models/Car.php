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
        "yearProduction",
    ];
    //One-to-many: jedan automobil → više iskustava
    public function carExperiences()
    {
        return $this->hasMany(Experience::class, 'car_id', 'id')
            ->orderBy('date');
    }
}
