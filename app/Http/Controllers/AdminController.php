<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\AdminUserLoginNotification;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rand_pass= str_shuffle('123456789qwertyuioasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM!@#$%^&*()_+}{|:L<>?');
        $user_tmp_pass= substr($rand_pass,5,8);
        $roles=Role::all();
        return view('admin.user.index',[
            'all_roles'=>$roles,
            'tmp_pass' =>$user_tmp_pass,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pass= $request-> password;
        $user = Admin:: create([
            'name'    => $request-> name,
            'username'=> $request->username,
            'email'   => $request->email,
            'password'=> Hash::make($request->password),
            'role_id' => $request->role,
        ]);

        $user -> notify(new AdminUserLoginNotification($user,$pass));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    /*get all user data*/
    public function getUsers(){
        $users=Admin:: latest()-> get();
        $data="";
        $i=1;
        foreach($users as $user){
            $photo = $user -> photo ?? 'avatar.webp';
            $photo_path = url('eshop/img/'.$photo);
            $data .="<tr>";
            $data .="<td>{$i}</td>";
            $data .="<td>{$user->name}</td>";
            $data .="<td>{$user->username}</td>";
            $data .="<td>{$user->role->name}</td>";
            $data .="<td><img style='width:70px; height: 70px;' src=\"{$photo_path}\"></td>";
            
            $data .="<td>{$user->status}</td>";
            $data .= '<td><a  class="btn btn-warning edit-btn" edit_id="'.$user->id.'" data-bs-toggle="modal" href="">Edit</a>
            <a class="btn btn-danger delete-btn" delete_id="'.$user->id.'" href="#">Delete</a></td>';
            $data .="</tr>";
            $i++;
        }
        return $data;
    }
    /**get single admin*/
    public function getAdmin($id){
        $data = Admin::find($id);
        return [
            'id' => $data -> id,
            'name' => $data -> name,
            'username'=> $data -> username,
            'email' => $data -> email,
            'photo' => $data -> photo,
            'photo_path' => url('eshop/img/'),
        ];
        
    }
    //**update admin */
    public function updateAdmin(Request $request){
        $admin_data = Admin::find($request -> edit_id);
        $admin_data -> name = $request -> name;
        $admin_data -> email = $request -> email;
        $admin_data -> username = $request -> username;
        $admin_data -> role_id = $request -> role;
        $admin_data -> update();
    }
}
