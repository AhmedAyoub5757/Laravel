<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function add($num1, $num2){
        return "The sum of $num1 and $num2 is: " . ($num1 + $num2);
    }

    public function multiply($num1, $num2 = 4){
        return "the pproduct of $num1 and $num2 is: " . ($num1 * $num2);
    }

    
}
