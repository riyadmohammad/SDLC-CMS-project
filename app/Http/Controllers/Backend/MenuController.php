<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Icon;
use Auth;
use DB;
use Image;
use Session;



class MenuController extends Controller
{
    public function view()
    {

        $data['menus'] = Menu::with('parentMenu')->orderBy('parent', 'asc')->orderBy('sort', 'asc')->with('icons')->get();
        // dd($data['menus']->toArray());
    	return view('backend.menu.menu_show')->with($data);
    }

    public function add()
    {
        $data['parent_menu'] = Menu::where('parent','=','0')->get();
    	// dd($data['parent_menu']->toArray());
        $data['icons'] = Icon::get();

    	return view('backend.menu.menu_add')->with($data);
    }
    public function store(Request $request)
    {
    	$request->validate([
            'name' => 'required',
            // 'image' => 'mimes:jpeg,png,jpg|max:5048',

        ]);
    	// dd($request->all());
    	$params = $request->all();
    	Menu::create($params);
    	return redirect()->route('menu-management.view')->with('info','New Menu Added.');
    }

    public function edit($id)
    {
        
        $data['editData'] = Menu::find($id);
        $data['parent_menu'] = Menu::all();
        $data['icons'] = Icon::get();

        // dd($data['icons']->toArray());
        return view('backend.menu.menu_add')->with($data);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            // 'route' => 'required',
            // 'image' => 'mimes:jpeg,png,jpg|max:5048',

        ]);
        $params = $request->all();
        // dd($params);
        $menu = Menu::find($id);
        $menu->update($params);
        return redirect()->route('menu-management.view')->with('info','Menu update successfully.');

    }
    public function delete(Request $request)
    { 

            $id = $request->id;
            $menu = Menu::find($id);
            $menu->delete();
            return redirect()->route('menu-management.view');

    }
}
