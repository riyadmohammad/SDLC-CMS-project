<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuPermission;
use App\Models\Role;
use App\Models\Menu;

class MenuPermissionController extends Controller
{
    
    public function view()
    {
        // dd("test");
        $data['permission'] = MenuPermission::get();
    	return view('backend.menu.menu_permission_view')->with($data);
    }

    public function add()
    {
        $data['roles'] = Role::get();
        $data['menu'] = Menu::where('parent',0)->get();
        // d($data['menu']);
    	return view('backend.menu.menu_permission_add')->with($data);
    }
    public function getMenu(Request $request)
	{
		$parent = $request->parent;
		$role = $request->role;
		$data['menu'] = Menu::with('menuPermission')->where('parent','!=',0)->where('parent',$request->parent)->get();
		$data['permission_menu'] = MenuPermission::where('role_id',$role)->with('menu')->whereHas('menu', function($q ) use ($parent)
			{
    			$q->where('parent','!=', 0)->where('parent',$parent);
			})->get();

			return response()->json($data);
	}
    public function store(Request $request)
    {
    	$request->validate([
            // 'name' => 'required',
            // 'image' => 'mimes:jpeg,png,jpg|max:5048',

        ]);
        $params = $request->all();
        $menu = Menu::where('parent',$params['parent'])->get();
        $parent_menu = MenuPermission::where('menu_id',$params['parent'])->where('role_id',$params['role'])->first();
            if(isset($parent_menu) && !isset($params['sub']))
            {
                $parent_menu->delete();
            }
        	foreach($menu as $key => $v)
       		{
        	$val = MenuPermission::where('menu_id',$v['id'])->where('role_id',$params['role'])->first();
        	if(isset($val))
        	{
        		$val->delete();
        	}
        	
        	}

        if(isset($params['sub']))
        {
        	if(!isset($parent_menu))
        	{
        		$p = new MenuPermission;
        		$p['role_id'] = $params['role'];
        		$p['menu_id'] = $params['parent'];
        		$p->save();
       		}
        	foreach($params['sub'] as $key => $k)
        	{
        	$pam = new MenuPermission;
        	$pam['role_id'] = $params['role'];
        	$pam['menu_id'] = $k;
        	$pam->save();
        	}
        }
        
        
        return redirect()->back()->with('info','User Role permission updated.');
        

    }
   
    
}
