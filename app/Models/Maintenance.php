<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    //relationship to vehicle
    public function vehicle(){
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
