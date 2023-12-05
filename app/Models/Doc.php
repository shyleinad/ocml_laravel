<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'maintenance_id',
        'name',
        'doc_path'
    ];

    //relationship to maintenance
    public function maintenance(){
        return $this->belongsTo(Maintenance::class, 'maintenance_id');
    }
}
