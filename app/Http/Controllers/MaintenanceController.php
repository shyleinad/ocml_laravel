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
        //show only maintenances that belongs to vehicles of the curent loggedin user
        return view('maintenance.maintenances', [
            'maintenances'=>request()->user()->maintenances()->get()
        ]);

        //showing all result (for debugging purposes or something)
        /*return view('maintenance.maintenances', [
            'maintenances'=>Maintenance::latest()->paginate(25)
        ]);*/
    }

    //show maintenance add form
    public function showMaintenanceAdd(){
        $is_add=true; //so we know we would like to add and not edit
        return view('maintenance.add', [
            'is_add'=>$is_add,
            'vehicles'=>request()->user()->vehicles()->get()
        ]);
    }

    //insert maintenance
    public function insertMaintenance(Request $request){
        //validate
        $formFields=$request->validate([
            'vehicle_id'=>'required',
            'mileage'=>'required',
            'date'=>'required',
            'work_done'=>'required',
            'changed_part'=>'required',
            'price'=>'required',
        ]);

        //insert
        $debug=Maintenance::create($formFields);
        dd($debug);

        //redirect
        //return back()->with('message', 'Szervízbejegyzés sikeresen hozzáadva!');
    }
}
