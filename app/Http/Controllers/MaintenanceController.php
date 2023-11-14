<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\Vehicle;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        DB::transaction(function() use($request) {
            //validate maintenance form fields
            $formFieldsMaintenance=$request->validate([
                'vehicle_id'=>'required',
                'mileage'=>['required', 'integer'],
                'date'=>'required',
                'work_done'=>'required',
                'changed_parts'=>'required',
                'price'=>['required', 'numeric'],
            ]);

            //validate docs form fields
            $formFieldsDoc=$request->validate([
            //'docs'=>'required',
                'docs.*'=>'mimes:pdf,jpg,jpeg|max:20480'
            ]);

            //insert maintenance
            $formFieldsDoc['maintenance_id']=Maintenance::create($formFieldsMaintenance)->id;

            //store docs and insert docs
            $docs=$request->file('docs'); //getting selected files
            if($request->hasFile('docs')){ //if it has something in it
                foreach($docs as $doc){ //loop through the files
                    $formFieldsDoc['doc_path']=$doc->store('docs', 'public'); //store the file and get the path
                    Doc::create($formFieldsDoc); //inserting the file
                    //dd($formFieldDoc['doc_path']);
                }
            }
        });
        
        //redirect
        return back()->with('message', 'Szervízbejegyzés sikeresen hozzáadva!');
    }
}
