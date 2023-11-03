<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DefaultController extends Controller
{
    public function statusChange(Request $request){
    	// dd('test');
        $id  = $request->input('id');
        $status  = $request->input('status');
        $tablename  = $request->input('tablename');
        DB::table($tablename)->where('id',$id)->update(['status'=>$status]);
        return DB::table($tablename)->where('id',$id)->first()->status;
    }
}
