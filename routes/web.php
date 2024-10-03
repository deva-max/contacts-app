<?php

use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');

// });

Route::get('/', [GeneralController::class, 'index'] );
Route::get('get-contacts', [GeneralController::class, 'get_contacts'])->name('get.contacts');
Route::delete('/users/{id}', [GeneralController::class, 'destroy'])->name('users.destroy');