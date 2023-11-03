<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;

class UserController extends Controller
{
    
    public function view()
    {
        $data['users'] = User::with('userRole.role')->get();
        // d($data['users']);
    	return view('backend.user.user_view')->with($data);
    }

    public function add()
    {
        $data['roles'] = Role::get();
        // d($data['roles']);
    	return view('backend.user.user_add')->with($data);
    }
    public function store(Request $request)
    {
    	$request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            // 'image' => 'mimes:jpeg,png,jpg|max:5048',

        ]);
        // dd($request->all());
        $params = $request->all();
        $params['password'] = password_hash('1234',PASSWORD_DEFAULT);
        $user = User::where('email',$params['email'])->first();
        // dd($user);
        if($user == '')
        {
            $params['user_id'] = User::create($params)->id;
            // dd($params['user_id']);
            UserRole::create($params);
            return redirect()->route('user-management.user.view')->with('info','New User Added.');
        }

        return redirect()->back()->with('error','User already exist!');
        

    }
    public function edit($id)
    {
        
        $data['editData'] = User::find($id);
        $data['roles'] = Role::get();
        return view('backend.user.user_add')->with($data);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            // 'name' => 'required',
            // 'route' => 'required',
            // 'image' => 'mimes:jpeg,png,jpg|max:5048',

        ]);
        $params = $request->all();
        $user = User::where('email',$params['email'])->where('id','!=',$id)->first();
        
        if($user == '')
        {
            $user_info = User::find($id);
            $user_info->update($params);
            $params['user_id'] = $id;
            // dd($params);
            $user_role = UserRole::where('user_id',$user_info['id'])->first();
            // dd($params);
            if($user_role == '')
            {
                UserRole::create($params);
            }
            else
            {
              $user_role->update($params);  
            }
            
            return redirect()->route('user-management.user.view')->with('info','User info Updated.');
        }
        
        return redirect()->back()->with('error','User already exist!');

    }
    public function delete(Request $request)
    { 

            $id = $request->id;
            $user = User::find($id);
            $role = UserRole::where('user_id',$id)->first();
            $user->delete();
            if($role)
            {
               $role->delete(); 
            }
            
            return redirect()->route('user-management.user.view');

    }
}
