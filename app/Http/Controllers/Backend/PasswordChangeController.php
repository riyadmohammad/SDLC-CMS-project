<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Auth;

class PasswordChangeController extends Controller
{
    //
    public function index()
    {
    	// dd('test');
    	return view('auth.password_change');
    }

    public function update(Request $request)
    {
    	// dd($request->all());
    	$request->validate([
    		// 'new_password' => 'required|min:4|regex:/^(?=\S*[a-z])(?=\S*[\d])\S*$/',
    		'new_password' => 'required|min:4|',
    		'confirm_password' => 'required|same:new_password',
    	]);
    	
    	$auth_id = Auth::user()->id;
    	// dd($auth_id);
    	if($request->new_password == $request->confirm_password)
    	{
    		$previous_password = Auth::user()->password;

    		if(Hash::check($request->old_password,$previous_password))
    		{	
    			$user = User::find($auth_id);
    			$password = Hash::make($request->new_password);
    			// dd($password);
    			$user->password = $password;
    			$user->update();
    			session()->flash('info', 'Password Change Successfully!');
    			return redirect()->route('profile-management.password.change');

    		}
    		else
    		{
    			session()->flash('msg', 'Password does not match with previous password');
    			return redirect()->back();
    		}

    	}
    }
}
