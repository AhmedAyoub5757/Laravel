<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = ['Civic', 'Model 3', 'Mustang'];
        return view('vehicles.index', compact('vehicles'));
    }
}
