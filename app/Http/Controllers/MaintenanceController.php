<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    //show maintenances view
    public function showMaintenances(){
        return view('maintenance.maintenances');
    }

    
}
