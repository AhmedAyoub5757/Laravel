<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;


class FeedbackController extends Controller
{
    public function create(){
        return view('feedback.create');
    }

     public function store(Request $request)
    {
        Feedback::create([
            'customer_name' => $request->input('customer_name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'rating' => $request->input('rating'),
        ]);

        return redirect('/feedback');
    }

    public function index()
    {
        $feedbacks = Feedback::all();
        return view('feedback.index', compact('feedbacks'));
    }
    
}
