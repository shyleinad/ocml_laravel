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

    //show vehicle add form
    public function showVehicleAdd(){
        return view('vehicle.add');
    }

    //insert vehicle
    public function insertVehicle(Request $request){
        
    }

    //show vehicle edit form
    public function showVehicleEdit(Vehicle $vehicle){
        return view('vehicle.edit', [
            'vehicle'=>$vehicle
        ]);
    }

    //update vehicle
    public function updateVehicle(Request $request, Vehicle $vehicle){
        //protection
        if($vehicle->user_id!=auth()->id()){
            abort(403, 'Nincs joga ehhez a művelethez!');
        }

        //validate
        $formFields=$request->validate([
            'vin'=>'required',
            'lic_plate'=>'required',
            'make'=>'required',
            'type'=>'required',
            'year_of_make'=>'required',
            'model_code'=>'required',
            'engine_code'=>'required',
            'engine_displacement'=>'required',
            'mot_expires'=>'required',
            
        ]);

        //update
        $vehicle->update($formFields);

        //redirect
        return back()->with('message', 'Jármű sikeresen módosítva!');
    }

    //delete vehicle
    public function deleteVehicle(Vehicle $vehicle){
        //protection
        if($vehicle->user_id!=auth()->id()){
            abort(403, 'Nincs joga ehhez a művelethez!');
        }

        $vehicle->delete();
        return back()->with('message', 'Jármű sikeresen módosítva!');
    }
}
