<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', 'App\Http\Controllers\Admin\AdminDashboardController@adminDashboardShow');
Route::get('admin/login', 'App\Http\Controllers\Admin\AdminLoginController@showAdminLoginForm');