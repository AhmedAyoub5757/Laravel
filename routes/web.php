<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetingController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\NoteController;

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
// Route::get('/about', function (){
//     return view('about');
// });

// Create a route for /greet/{name} that returns "Hello, {name}!" using the captured parameter.
// Route::get('/greet/{name}', function ($name){
//     return "Hello, $name!";
// });

// Create a route for /profile/{username?} where the parameter is optional, defaulting to "Guest" if not provided.
// Route::get('/profile/{username?}', function($username = "Guest"){
//     return "hello, $username!";
// });

// Route::get('/test', function (){
//     return view('test');
// })->name('test');

Route::get('/hello', [GreetingController::class, 'hello']);

Route::get('/greet/{name}', [GreetingController::class, 'greetUser']);

Route::get('/add/{num1}/{num2}', [CalculatorController::class, 'add']);

Route::get('/multiply/{num1}/{num2?}', [CalculatorController::class, 'multiply']);

Route::get('/book', [LibraryController::class, 'showBooks']);

Route::get('/book/{id}', [LibraryController::class, 'showBook']);

Route::get('/search/search/{title}', [LibraryController::class, 'searchTitle']);

Route::get('/books/available/{copies?}', [LibraryController::class, 'checkAvailability']);

Route::get('/vehicles', [VehicleController::class, 'index']);

Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/store', [TaskController::class, 'store']);
Route::get('/tasks/{id}', [TaskController::class, 'show']);
Route::get('/tasks/{id}/done', [TaskController::class, 'markDone']);
Route::get('/tasks/{id}/delete', [TaskController::class, 'destroy']);

Route::get('/notes', [NoteController::class, 'index']);
Route::get('/notes/store', [NoteController::class, 'store']);
Route::get('/notes/{id}', [NoteController::class, 'show']);
Route::get('/notes/{id}/toggle-pin', [NoteController::class, 'togglePin']);
Route::get('/notes/{id}/delete', [NoteController::class, 'delete']);