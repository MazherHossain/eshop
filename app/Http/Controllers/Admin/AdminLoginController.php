<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    //show admin login form
    public function showAdminLoginForm(){
        return view('admin.login');
    }
}
