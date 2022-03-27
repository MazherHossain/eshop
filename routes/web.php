<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//Route::get('admin/dashboard', 'App\Http\Controllers\Admin\AdminDashboardController@adminDashboardShow'); //old system
Route::get ('admin/dashboard', [AdminDashboardController::class, 'adminDashboardShow']) -> middleware('admin') ->name('admin.dashboard'); //laravel 9 new method
//Route::get('admin/login', 'App\Http\Controllers\Admin\AdminLoginController@showAdminLoginForm'); //old method
Route::get ('admin/login', [AdminLoginController::class, 'showAdminLoginForm']) ->name('admin.login.form'); //laravel 9 new method
Route::get ('admin', [AdminLoginController::class, 'AdminLoginRedirect']); //laravel 9 new method
Route::post ('admin/login', [AdminLoginController::class, 'AdminLoginSystem']) ->name('admin.login');
Route::get ('admin/logout', [AdminLoginController::class, 'AdminLogout']) ->name('admin.logout');

//Admin role crud
Route::resource('role', RoleController::class);
Route::get('all-roles', [RoleController::class,'allRoles']);
Route::get('del-role/{id}', [RoleController::class,'delRole']);
Route::get('status-update/{id}', [RoleController::class,'statusUpdate']);