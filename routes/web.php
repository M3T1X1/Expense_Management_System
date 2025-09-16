<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('expenses', ExpanseController::class);
Route::get('/home', [ExpenseController::class, 'index'])->name('home');
