<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetingController extends Controller
{
    public function hello(){
        return "Hello from the controller!";
    }

    public function greetUser($name){
        return "Hey there, $name!";
    }
}

