<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function view()
    {
        $data['roles'] = Role::get();
        // d($data['users']);
    	return view('backend.user.user_role_view')->with($data);
    }

    public function add()
    {
        // dd('test');
    	return view('backend.user.user_add');
    }
    public function store(Request $request)
    {
    	$request->validate([
            // 'title' => 'required',
            // 'image' => 'mimes:jpeg,png,jpg|max:5048',

        ]);
        // dd($request->all());
        $params = $request->all();
        Role::create($params);
        
        return redirect()->route('user-management.role.view')->with('info','New User Role Added.');

    }
    public function edit($id)
    {
        
        $data['editData'] = Role::find($id);
        return view('backend.user.user_add')->with($data);
    }
    public function update(Request $request)
    {
        $request->validate([
            // 'name' => 'required',
            // 'route' => 'required',
            // 'image' => 'mimes:jpeg,png,jpg|max:5048',

        ]);
        $params = $request->all();
        // dd($params['id']);
        $role = Role::find($params['id']);
        $role->update($params);
        return redirect()->route('user-management.role.view')->with('info','User Role updated.');

    }
    public function delete(Request $request)
    { 

            $id = $request->id;
            $role = Role::find($id);
            $role->delete();
            return redirect()->route('user-management.role.view');

    }
}
