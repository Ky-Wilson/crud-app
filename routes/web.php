<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('users',[UserController::class,'loadAllUsers']);
Route::get('/add/users',[UserController::class,'loadAddUserForm']);
Route::post('/add/users',[UserController::class,'AddUser'])->name('AddUser');