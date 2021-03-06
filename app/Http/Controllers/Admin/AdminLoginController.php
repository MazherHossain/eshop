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
    //Admin login redirect
    public function AdminLoginRedirect(){
        return redirect()->route('admin.login.form');
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

    /**
     * Admin Logout
    */
    public function AdminLogout(){
        Auth::guard('admin') -> logout();
        return redirect()-> route('admin.login');
    }
}
