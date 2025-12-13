<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/hello', [HelloController::class, 'index']);

Route::get('/', function () {
    return redirect('/login');
});

//ログイン・新規
Route::get('/login', [LoginController::class, 'login']);
Route::get('/registercustomer', [LoginController::class, 'register']);
Route::post('/confirmNewCustomer', [LoginController::class, 'register_check']);
Route::post('/addCustomer', [LoginController::class, 'addCustomer']);
Route::post('/login_check', [LoginController::class, 'loginCheck']);

Route::get('/shift',[ShiftController::class, 'showForm']);
Route::post('/shift', [ShiftController::class, 'submitForm']); 

Route::post('/shift/check', [ShiftController::class, 'check']);

