<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Create a route for /about that returns the text "This is the About page"
Route::get('/about', function (){
    return view('about');
});
// Create a route for /greet/{name} that returns "Hello, {name}!" using the captured parameter.
Route::get('/greet/{name}', function ($name){
    return "Hello, $name!";
});
// Create a route for /profile/{username?} where the parameter is optional, defaulting to "Guest" if not provided.
Route::get('/profile/{username?}', function($username = "Guest"){
    return "hello, $username!";
});

Route::get('/test', function (){
    return view('test');
})->name('test');