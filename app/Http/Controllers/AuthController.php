<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $req){
        User::create([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'password' => Hash::make($req->input('password')),
        ]);

        return redirect('/login');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $req){

        $creds = $req->only('email', 'password');

        if(Auth::attempt($creds)){
            return redirect('/dashboard');
        }

        return redirect('/login')->with('error', 'Invalid credentials');

    }

    public function logout(Request $req){
        Auth::Logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/login');
    }
}
