<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostMenu;
use App\Models\FrontMenuUrl;
use App\Models\FrontMenu;

class FrontendMenuController extends Controller
{
    public function view()
    {
        $data['menus'] = FrontMenu::with('urlLink')->orderBy('parent', 'asc')->orderBy('sort', 'asc')->with('parentMenu')->get();
    	return view('backend.frontend_menu.frontend_menu_view')->with($data);
    }

    public function add()
    {
        $data['posts'] = PostMenu::with('frontUrl')->get();
        $data['menus'] = FrontMenu::where('parent','=','0')->get();
        $data['internal_link'] = FrontMenuUrl::where('url_type','=','1')->get();
    	return view('backend.frontend_menu.frontend_menu_add')->with($data);
    }
    public function store(Request $request)
    {
    	$request->validate([
            'name' => 'required',
            // 'image' => 'mimes:jpeg,png,jpg|max:5048',

        ]);
        if($request->url_type == '0')  //No Link
        {
            $params = $request->all();
            FrontMenu::create($params);
            return redirect()->route('frontend-menu.view')->with('info','Front Menu Added.');
        }
        else if($request->url_type == '1')  //Internal Link
        {
            $params = $request->all();
            $params['url_id'] = $request->internal_route;
            FrontMenu::create($params);
            return redirect()->route('frontend-menu.view')->with('info','Front Menu Added.');
        }
        else if($request->url_type == '2') // External Link
        {
            $params = $request->all();
            // dd($params);
            $params['url_link'] = $params['external_route'];
            $menuUrl = FrontMenuUrl::create($params);
            $params['url_id'] = $menuUrl['id'];
            FrontMenu::create($params);
            return redirect()->route('frontend-menu.view')->with('info','Front Menu Added.');
        }
        else if($request->url_type == '3')   //Post Menu
        {
            $params = $request->all();
            $params['url_id'] = PostMenu::find($request->post_id)->url_id;
            FrontMenu::create($params);
            return redirect()->route('frontend-menu.view')->with('info','Front Menu Added.');
        }
        else
        {
            return redirect()->back()->with('info','Please select a URL type');
        }

    	
    	return redirect()->route('frontend-menu.view')->with('info','Please try again.');
    }

    public function edit($id)
    {
        $data['editData'] = FrontMenu::with('urlLink')->find($id);
        $data['posts'] = PostMenu::with('frontUrl')->get();
        $data['menus'] = FrontMenu::where('parent','=','0')->get();
        $data['internal_link'] = FrontMenuUrl::where('url_type','=','1')->get();
        // d($data['editData']);
        return view('backend.frontend_menu.frontend_menu_add')->with($data);
       
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            // 'image' => 'mimes:jpeg,png,jpg|max:5048',

        ]);
        $params = $request->all();

         $frontMenu = FrontMenu::with('urlLink')->find($id);
        if($request->url_type == '0')  //No Link
        {
        // dd($params);
            if(@$frontMenu['urlLink']['url_type'] == 2)
            {
                $link = FrontMenuUrl::find($frontMenu['url_id']);
                $link->delete();
            }
            $params['url_id'] = Null;
            $frontMenu->update($params);
            return redirect()->route('frontend-menu.view')->with('info','Front Menu Updated.');
        }
        else if($request->url_type == '1')  //Internal Link
        {
            $params['url_id'] = $request->internal_route;
            if(@$frontMenu['urlLink']['url_type'] == 2)
            {

                $link = FrontMenuUrl::find($frontMenu['url_id']);
                $link->delete();
            }

            $frontMenu->update($params);
            return redirect()->route('frontend-menu.view')->with('info','Front Menu Updated.');
        }
        else if($request->url_type == '2') // External Link
        {
            $params['url_link'] = $params['external_route'];
            $menuUrl = FrontMenuUrl::find($frontMenu['url_id']);
            // dd('test');
            if(@$menuUrl['url_type'] == 2)
            {
                 $menuUrl->update($params);
                
                
            }
            else
            {
                $menuUrl = FrontMenuUrl::create($params);
            }
            $params['url_id'] = $menuUrl['id'];
            $frontMenu->update($params);
            return redirect()->route('frontend-menu.view')->with('info','Front Menu Updated.');
        }
        else if($request->url_type == '3')   //Post Menu
        {
                 $params['url_id'] = PostMenu::find($request->post_id)->url_id;

            if(@$frontMenu['urlLink']['url_type'] == 2)
            {
                $link = FrontMenuUrl::find($frontMenu['url_id']);
                $link->delete();
            }
           // dd($params);
            $frontMenu->update($params);
            return redirect()->route('frontend-menu.view')->with('info','Front Menu Updated.');
        }
        else
        {
            return redirect()->back()->with('info','Please select a URL type');
        }

        
        return redirect()->route('frontend-menu.view')->with('info','Please try again.');

    }
    public function delete(Request $request)
    { 

            $id = $request->id;
            $menu = FrontMenu::find($id);
            $url = FrontMenuUrl::find($menu['url_id']);
            if(@$url['url_type'] == 2 )
            {
                $url->delete();
            }
            $menu->delete();
            return redirect()->route('frontend-menu.view');

    }
}
