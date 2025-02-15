<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        //id,
        'vehicle_id',
        'mileage',
        'date',
        'work_done',
        'changed_parts',
        'price'
    ];

    //relationship to vehicle
    public function vehicle(){
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    //relationship to docs
    public function docs(){
        return $this->hasMany(Doc::class, 'maintenance_id');
    }

    //filter
    public function scopeFilter($query, array $filters){
        /*
        if($filters['price'] ?? false){
            $query->where('price', 'like', '%' . request('price') . '%');
        }
        */
    }
}
