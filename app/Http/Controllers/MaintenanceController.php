<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    private $is_add=true; //determines if we are adding or editing

    //show maintenances view
    public function showMaintenances(){
        return view('maintenance.maintenances', [
            'maintenances'=>Maintenance::latest()->paginate(25)
        ]);
    }

    //show maintenance add form
    public function showMaintenanceAdd(){
        $is_add=true; //so we know we would like to add and not edit
        return view('maintenance.add', [
            'is_add'=>$is_add,
            'vehicles'=>Vehicle::all()
        ]);
    }
}
