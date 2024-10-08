<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// vote route
Route::prefix('vote')->group( function () {

    Route::get('/vote', [VoteController::class, 'showVoteForm'])->name('vote');
    Route::post('/vote', [VoteController::class, 'submitVote'])->name('vote.submit');
    Route::get('/results', [VoteController::class, 'viewResults'])->name('results');
});

// Course routes
Route::prefix('courses')->group(function () {
    Route::get('/departments/ict', function () {
        return view('departments.ict');
    })->name('department.computer_science');

    Route::get('/departments/electrical-engineering', function () {
        return view('departments.electrical-engineering');
    })->name('department.electrical_engineering');

    Route::get('/departments/mechanical-engineering', function () {
        return view('departments.mechanical-engineering');
    })->name('department.mechanical_engineering');

    Route::get('/departments/civil-engineering', function () {
        return view('departments.civil-engineering');
    })->name('department.civil_engineering');

    Route::get('/departments/ labortory Technology', function (){
       return view('depertments.laboratory Technology');
    })->name('depertments.laboratory Technology');

    Route::get('/departments/automotive', function (){
        return view('departments.automotive');
    })->name('departments.automotive');

});

//user route
// Route for storing a new user (POST request)
Route::prefix('users.store')->group(function (){
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

});









// Route::get('/', [HomeController::class, 'index'])->name('home');
