<?php

use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// Route::get();
// Route::post();
// Route::put();
// Route::delete();
// Route::options();

//Common routes naming
//index - Show all data or patients
//show - Show a single data or patient
//create - Show a form to a new user
//store - Store a data
//edit - Show form to a data
//update - update a data
//destroy - delte a data


// divides a table into sets
Route::controller(UserController::class)->group(function(){
    Route::get('/register','register');
    Route::get('/login','login')->name('login')->middleware('guest');
    Route::post('/login/process','process');
    Route::post('/logout','logout');
    Route::post('/store','store');
});



// divides a table into sets
Route::controller(PatientController::class)->group(function(){
    Route::get('/','index')->middleware('auth');
    Route::get('/add/patient',  'create');
    Route::post('/add/patient','store');
    Route::get('/patient/{id}','show');
    Route::put('/patient/{patient}','update');
    Route::delete('/patient/{patient}','destroy');
});



