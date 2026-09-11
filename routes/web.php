<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetingController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RecipeController;


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



Route::get('/school', [SchoolController::class, 'index'])->name('schools.index');
Route::get('/school/{id}', [SchoolController::class, 'show']);
Route::get('/schools/store', [SchoolController::class, 'store']);
Route::get('/schools/{id}/delete', [SchoolController::class, 'destroy']);


Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/store', [CourseController::class, 'store']);
Route::get('/courses/{id}', [CourseController::class, 'show']);
Route::get('/courses/{id}/update', [CourseController::class, 'update']);
Route::get('/courses/{id}/delete', [CourseController::class, 'destroy']);


Route::get('/members', [MemberController::class, 'index'])->name('members.index');
Route::get('/members/store', [MemberController::class, 'store'])->name('members.store');
Route::get('/members/{id}', [MemberController::class, 'show'])->name('members.show');
Route::get('/members/{id}/update', [MemberController::class, 'update'])->name('members.update');
Route::get('/members/{id}/deactivate', [MemberController::class, 'deactivate'])->name('members.deactivate');
Route::get('/members/{id}/delete', [MemberController::class, 'delete'])->name('members.delete');


Route::get('/feedback/create', [FeedbackController::class, 'create']); // shows the empty form
Route::post('/feedback/store', [FeedbackController::class, 'store']);  // handles the submission
Route::get('/feedback', [FeedbackController::class, 'index']);         // lists all feedback


Route::get('/rsvp', [RsvpController::class, 'create'])->name('rsvp.create');
Route::post('/rsvp/store', [RsvpController::class, 'store'])->name('rsvp.store');
Route::get('/rsvp/responses', [RsvpController::class, 'index'])->name('rsvp.index');


Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function (){
        return "Welcome, " . Auth::user()->name . "! You are logged in.";
    });
});
// Route::get('/dashboard', function () {
//     return "Welcome, " . Auth::user()->name . "! You are logged in.";
// });
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('recipes', RecipeController::class);
