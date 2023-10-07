<?php

namespace App\Http\Controllers;

use App\Models\Fuel_type;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    private $is_add=true; //determines if we are adding or editing

    //show vehicles view
    public function showVehicles(){
        //show only vehicles that belongs to current logged in user
        return view('vehicle.vehicles', [
            'vehicles'=>request()->user()->vehicles()->paginate(25)
        ]);

        //showing all result
        /*return view('vehicle.vehicles', [
            'vehicles'=>Vehicle::latest()->paginate(25)
        ]);*/ 
    }

    //show vehicle add form
    public function showVehicleAdd(){
        $is_add=true; //so we know we would like to add and not edit
        return view('vehicle.add', [
            'is_add'=>$is_add,
            'fuel_types'=>Fuel_type::all()
        ]);
    }

    //insert vehicle
    public function insertVehicle(Request $request){
        //validate
        $formFields=$request->validate([
            'fuel_type_id' => 'required',
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

        //add user_id
        $formFields['user_id']=auth()->id();
        //dd($formFields);
        
        //insert
        Vehicle::create($formFields);

        //redirect
        return back()->with('message', 'Jármű sikeresen hozzáadva!');
    }

    //show vehicle edit form
    public function showVehicleEdit(Vehicle $vehicle){
        $is_add=false; //so we know we would like to edit and not add
        return view('vehicle.edit', [
            'is_add'=>$is_add,
            'vehicle'=>$vehicle,
            'fuel_types'=>Fuel_type::all()
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
