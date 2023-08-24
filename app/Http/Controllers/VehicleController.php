<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    //show vehicles view
    public function showVehicles(){
        return view('vehicle.vehicles', [
            'vehicles'=>Vehicle::latest()->paginate(25)
        ]);
    }

    //show vehicle edit form
    public function showVehicleEdit(Vehicle $vehicle){
        return view('vehicle.edit', [
            'vehicle'=>$vehicle
        ]);
    }
}
