<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
use Image;


class ProfileController extends Controller
{
    public function index()
    {
    	$id = auth()->user()->id;
    	$data['user'] = User::find($id);
    	// dd($data['user']->toArray());


    	return view('backend.profile.profile_show')->with($data);
    }

    public function edit()
    {
    	// dd('test');
    	$id = auth()->user()->id;
    	$data['editData'] = User::find($id);
    	return view('backend.profile.profile_edit')->with($data);
    }

    public function update(Request $request)
    {
    	$request->validate([
            'name' => 'required',
            'email'=>'required|email',
            // 'image' => 'mimes:jpeg,png,jpg|max:5048',

        ]);
        $params = $request->all();
        $id = auth()->user()->id;
        $user = User::find($id);
        // dd($request->file('image'));
        if ($data['img'] = $request->file('image'))
        {
            $data['editImage'] = $user['image'];
            $params['image'] = image_resize($data);
            // dd($params);
            
        }
        $user->update($params);
        return redirect()->route('profile-management.show')->with('info','Faculty update successfully.');
    }
}
