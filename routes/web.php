<?php

use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');

// });

Route::get('/', [GeneralController::class, 'index'] );
Route::post('/import-users', [GeneralController::class, 'importUsers'])->name('import.users');
Route::get('get-contacts', [GeneralController::class, 'get_contacts'])->name('get.contacts');
Route::get('/users/{id}/edit', [GeneralController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [GeneralController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [GeneralController::class, 'destroy'])->name('users.destroy');