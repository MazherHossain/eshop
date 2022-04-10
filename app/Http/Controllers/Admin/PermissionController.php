<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.permission.index');
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
        $data=Permission::where('name',$request->name)->get();
        if(count($data)>0){
            return false;
        }
        else{
            Permission::create([
                'name' => $request-> name,
                'slug' => Str::slug($request-> name),
            ]);
            return true;
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }

    /*Get All Permission*/
    public function getAllPermission()
    {
        $data=Permission::all();
        $list='';
        $count=1;
        foreach($data as $permission){           
        $list .= '<tr>';
        $list .= '<td>'.$count;$count++.'</td>';
        $list .= '<td>'.$permission -> name.'</td>';
        $list .= '<td>'.$permission -> slug.'</td>';        
        $list .= '<td><a class="btn btn-danger delete-btn" delete_id="'.$permission->id.'" href="#">Delete</a></td>';
        }
        $list .= '</tr>';
        return $list;
    }
}
