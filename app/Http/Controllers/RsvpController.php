<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rsvp;

class RsvpController extends Controller
{
    public function create(){
        return view('rsvp.create');
    }

    public function index(){
        $rsvps = Rsvp::latest()->get();

        return view('rsvp.index', compact('rsvps'));
    }

    public function store(Request $req){
        $validatedData = $req->validate([
            'guest_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'attending' => 'required|boolean',
        ]);

        Rsvp::create($validatedData);

        return redirect()->route('rsvp.create')->with('success', 'RSVP submitted successfully!');
    }
}
