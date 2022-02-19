<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//Route::get('admin/dashboard', 'App\Http\Controllers\Admin\AdminDashboardController@adminDashboardShow'); //old system
Route::get ('admin/dashboard', [AdminDashboardController::class, 'adminDashboardShow']) -> middleware('admin') ->name('admin.dashboard'); //laravel 9 new method
//Route::get('admin/login', 'App\Http\Controllers\Admin\AdminLoginController@showAdminLoginForm'); //old method
Route::get ('admin/login', [AdminLoginController::class, 'showAdminLoginForm']) ->name('admin.login.form'); //laravel 9 new method
Route::post ('admin/login', [AdminLoginController::class, 'AdminLoginSystem']) ->name('admin.login');