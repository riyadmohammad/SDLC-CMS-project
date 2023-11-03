<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Icon;
use Auth;
use DB;
use Image;
use Session;

class IconController extends Controller
{
    public function view()
    {

        $data['icons'] = Icon::get();
        // $s = d($data['icons']);
        // dd($data['icons']->toArray());
    	return view('backend.menu.icon_show')->with($data);
    }

    public function add()
    {
        $data['parent_menu'] = Icon::where('parent','=','0')->get();
    	return view('backend.menu.menu_add')->with($data);
    }
    public function store(Request $request)
    {
    	$request->validate([
            'name' => 'required',

        ]);
    	$params = $request->all();
    	Icon::create($params);
    	return redirect()->route('menu-management.icon.view')->with('info','New Icon Added.');
    }

    public function edit($id)
    {
        
        $data['editData'] = Menu::find($id);
        $data['parent_menu'] = Menu::all();

        // dd($data['parent_menu']->toArray());
        return view('backend.menu.menu_add')->with($data);
    }
    public function update(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     // 'route' => 'required',
        //     // 'image' => 'mimes:jpeg,png,jpg|max:5048',

        // ]);
        $params['name'] = $request->name;
        $icon = Icon::find($request->id);
        $icon->update($params);
        $data['icons'] = Icon::get();
        return redirect()->route('menu-management.icon.view')->with('info','Icon update successfully.');
        // dd($menu->toArray());

    }
    public function delete(Request $request)
    { 

            $id = $request->id;
            $menu = Icon::find($id);
            $menu->delete();
            return redirect()->route('menu-management.view');

    }
}
