<?php

use App\Http\Controllers\HelloController;
// use App\Http\Controllers\ShiftController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\ShiftController;


// Route::get('/hello', [HelloController::class, 'index']);

Route::get('/', function () {
    return redirect('/login');
});

//ログイン・新規
// Route::get('/registercustomer', [LoginController::class, 'register']);
// Route::post('/confirmNewCustomer', [LoginController::class, 'register_check']);
// Route::post('/addCustomer', [LoginController::class, 'addCustomer']);
// Route::post('/login_check', [LoginController::class, 'loginCheck']);

Route::get('/login', [LoginController::class, 'showLogin']);

// 管理者ログイン
Route::post('/login_check', [LoginController::class, 'loginCheck']);
Route::get('/admin/menu', function () {
    return view('admin.menu');
});
// バイトログイン
Route::get('/staff/menu', function () {
    return view('staff.menu');
})->middleware('auth:staff');


Route::get('/shift', [ShiftController::class, 'showForm']);
Route::post('/shift', [ShiftController::class, 'submitForm']);

// 管理者
// スタッフ追加
// --登録画面
Route::get('/admin/staff/registStaff', [StaffController::class, 'create']);
// --登録処理
Route::post('/admin/staff/registStaff', [StaffController::class, 'store']);

// スタッフ一覧
Route::get('/admin/staff', [StaffController::class, 'index']);

// 編集画面
Route::get('/admin/staff/{id}/edit', [StaffController::class, 'edit']);

// 更新処理
Route::post('/admin/staff/{id}/update', [StaffController::class, 'update']);

//シフト
Route::get('/admin/shift', [ShiftController::class, 'index']);


//スタッフ
// スタッフログイン画面
Route::get('/staff/login', [LoginController::class, 'showStaffLogin']);

// ログイン処理
Route::post('/staff/login_check', [LoginController::class, 'staffLoginCheck']);

// ログアウト
Route::post('/staff/logout', [LoginController::class, 'staffLogout']);