<?php

namespace App\Http\Controllers;

use App\Models\School;


class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('schools.index', compact('schools'));
    }

    public function show($id)
    {
        $School = School::find($id);
        return "School: " . $School->name . " (" . $School->class_name . ")";
    }

    public function store()
    {
        School::create([
            'name' => 'Ali Raza',
            'email' => 'ali' . rand(100,999) . '@school.com',
            'class_name' => '10',
            'is_enrolled' => true,
        ]);
        return "School added!";
    }

    public function destroy($id)
    {
        School::destroy($id);
        return "School removed!";
    }
}