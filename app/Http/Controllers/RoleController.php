<?php

namespace App\Http\Controllers;


use App\Models\Role;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Permission::all();
        return view('admin.user.role.index', [
            'all_permission'=> $data,
        ]);
    }

    public function allRoles()
    {
        
        $data=Role::all();
        $list='';
        $count=1;
        foreach($data as $role){
            $status = $role -> status ? 'checked' : '';
        $per_list ='<ul>';
        foreach(json_decode($role -> permission) as $per){
            $per_list .= '<li>'.$per.'</li>';
        }
        $per_list .='</ul>';
        $list .= '<tr>';
        $list .= '<td>'.$count;$count++.'</td>';
        $list .= '<td>'.$role -> name.'</td>';
        $list .= '<td>'.$role -> slug.'</td>';
        $list .= '<td>'.$per_list.'</td>';
        $list .= '<td><label class="switch">
        <input id="role_status" value="'.$role->id.'" type="checkbox" '.$status.'>
        <span class="slider round"></span>
    </label></td>';
        $list .= '<td><a class="btn btn-warning edit-btn" edit_id="'.$role->id.'" data-bs-toggle="modal" href="#role_edit_modal">Edit</a>
        <a class="btn btn-danger delete-btn" delete_id="'.$role->id.'" href="#">Delete</a></td>';
        $list .= '</tr>';
        }
        return $list;
        
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
        Role::create([
            'name'      =>$request->name,
            'slug'      =>Str::slug($request->name),
            'permission'=>json_encode($request->permission)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Role::find($id);

        $all_permission=Permission:: all();
        $permission=[];
        foreach($all_permission as $permission_item){
            array_push($permission,$permission_item-> name);
        }
        $per_list='<ul>';
        foreach($permission as $per){
            $checked='';
            if(in_array($per,json_decode($data->permission))){
                $checked='checked';
            }
            $per_list .= '<li><input name="permission[]" '.$checked.' type="checkbox" value="'.$per.'" id="'.$per.'"><label for="'.$per.'">'.$per.'</label></li>';
        }
        $per_list .='</ul>';
        return [
            'name'      => $data->name,
            'id'        => $data->id,
            'permission'=> $per_list,
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit_data=Role::find($id);
        $edit_data -> name= $request->name;
        $edit_data -> slug= Str::slug($request->name);
        $edit_data -> permission= json_encode($request->permission);
        $edit_data -> update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
    /*Delete Role**/
    public function delRole($id){
        $delete_data = Role::find($id);
        $delete_data->delete();
    }
    /*Status update*/
    public function statusUpdate($id){
        $status_data=Role::find($id);
        if($status_data -> status){
            $status_data -> status= false;
        }
        else{
            $status_data -> status=true;
        }
        $status_data -> update();
    }
}
