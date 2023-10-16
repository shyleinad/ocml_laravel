<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        //'id',
        'user_id',
        'fuel_type_id',
        'vin',
        'lic_plate',
        'make',
        'type',
        'year_of_make',
        'model_code',
        'engine_code',
        'engine_displacement',
        'mot_expires',
        'public'
    ];

    //relationship to user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //relationship to maintenance
    public function maintenances(){
        return $this->hasMany(Maintenance::class, 'vehicle_id');
    }
}
