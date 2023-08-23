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
}
