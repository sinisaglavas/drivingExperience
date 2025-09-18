<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = "drivers";

    protected $fillable = [
        "name",
        "email",
        "years_experience",
    ];
    //One-to-many: jedan vozac → više iskustava
    public function experience()
    {
        return $this->hasMany(Experience::class, 'driver_id', 'id')
            ->orderBy('date');
    }
}
