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

    //filter
    public function scopeFilter($query, array $filters){     
        //dd($filters);

        $filterArray = array();

        if ($filters['lic_plate'] ?? false){
            array_push($filterArray, ['public', 'like', $filters['public']]);
            dd($filters);
        }
        
        if($filters['lic_plate'] ?? false){
            //dd($filters);
            $query->where('lic_plate', 'like', '%' . $filters['lic_plate'] . '%');
        }
        
    }
}
