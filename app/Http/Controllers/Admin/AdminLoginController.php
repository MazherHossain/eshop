<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //show admin login form
    public function showAdminLoginForm(){
        return view('admin.login');
    }
/**
 * Admin Login
*/
    public function AdminLoginSystem(Request $request){
        
        if(Auth::guard('admin')-> attempt([ 'email'=> $request->email,'password'=> $request -> password ])){
            return redirect() -> route('admin.dashboard');
        }
        else{
            return redirect() -> route('admin.login.form');
        }

    }
}
