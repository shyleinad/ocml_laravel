<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\Vehicle;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    //show maintenance edit form
    public function showMaintenanceEdit(Maintenance $maintenance){
        $is_add=false; //so we know we would like to edit and not add
        return view('maintenance.edit', [
            'is_add'=>$is_add,
            'maintenance'=>$maintenance,
            'vehicles'=>request()->user()->vehicles()->get()
        ]);
    }

    //insert maintenance
    public function insertMaintenance(Request $request){

        DB::transaction(function() use($request) {
            //validate maintenance form fields
            $formFieldsMaintenance=$request->validate([
                'vehicle_id'=>'required|exists:App\Models\Vehicle,id',
                'mileage'=>'required|integer|max:2999999',
                'date'=>'required|date',
                'work_done'=>'required|string|max:256',
                'changed_parts'=>'required|string|max:1024',
                'price'=>'required|numeric|max:9999999',
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
                    $formFieldsDoc['name']=$doc->getClientOriginalName(); //adding the original name of the file
                    $formFieldsDoc['doc_path']=$doc->store('docs', 'public'); //store the file and get the path
                    Doc::create($formFieldsDoc); //inserting the file
                }
            }
        });
        
        //redirect
        return back()->with('message', 'Szervízbejegyzés sikeresen hozzáadva!');
    }

    //update maintenance
    public function updateMaintenance(Request $request, Maintenance $maintenance){
        //protection
        if ($maintenance->vehicle->user_id!=auth()->id()){
            abort(403, 'Nincs joga ehhez a művelethez!');
        }

        //transaction
        DB::transaction(function() use($request, $maintenance){

            //validate maintenance form fields
            $formFieldsMaintenance=$request->validate([
                'vehicle_id'=>'required|exists:App\Models\Vehicle,id',
                'mileage'=>'required|integer|max:2999999',
                'date'=>'required|date',
                'work_done'=>'required|string|max:256',
                'changed_parts'=>'required|string|max:1024',
                'price'=>'required|numeric|max:9999999',
            ]);

            //validate docs form fields
            $formFieldsDoc=$request->validate([
            //'docs'=>'required',
                'docs.*'=>'mimes:pdf,jpg,jpeg|max:20480'
            ]);

            //add maintenance id to doc
            $formFieldsDoc['maintenance_id']=$maintenance->id;

            //update
            $maintenance->update($formFieldsMaintenance);

            //store docs and insert docs
            $docs=$request->file('docs'); //getting selected files
            if($request->hasFile('docs')){ //if it has something in it
                foreach($docs as $doc){ //loop through the files
                    $formFieldsDoc['name']=$doc->getClientOriginalName(); //adding the original name of the file
                    $formFieldsDoc['doc_path']=$doc->store('docs', 'public'); //store the file and get the path
                    Doc::create($formFieldsDoc); //inserting the file
                }
            }
        });

        //redirect
        return back()->with('message', 'Szervízbejegyzés sikeresen módosítva!');
    }

    //delete doc
    public function deleteDoc(Doc $doc){
        //protection
        if($doc->maintenance->vehicle->user_id!=auth()->id()){
            abort(403, 'Nincs joga ehhez a művelethez!');
        }

        //transaction
        DB::transaction(function() use($doc){
            $doc->delete(); //delete from db
            unlink(storage_path('app/public/'.$doc->doc_path)); //delete from storage
        });

        return back()->with('message', 'Dokumentum sikeresen törölve.');
    }

    //delete maintenance
    public function deleteMaintenance(Request $request, Maintenance $maintenance){
        //protection
        if($maintenance->vehicle->user_id!=auth()->id()){
            abort(403, 'Nincs joga ehhez a művelethez!');
        }

        //getting the docs to delete
        $docs=$maintenance->docs;

        //transaction
        DB::transaction(function() use($request, $maintenance, $docs){
            $maintenance->delete(); //delete maintenance

            //looping thru docs
            foreach($docs as $doc){
                unlink(storage_path('app/public/'.$doc->doc_path)); //delete from storage
            }
        });

        //return/redirect
        return back()->with('message', 'Szervízbejegyzés sikeresen törölve.');
    }
}
