@php
$prefix=Request::route()->getPrefix();
$route=Route::current()->getName();
$profileImage = auth()->user()->image;
$user = App\Models\User::with('userRole.role')->find(auth()->user()->id);
$role_id = $user['userRole']['role_id'];
$parentRoute= explode('.',$route);
$urlCheck = App\Models\Menu::where('route',$route)->first();
//dd($urlCheck);

//For Admin
if(auth()->user()->id == 1)
{
$menu = App\Models\Menu::with('childMenus')->where('parent','0')->orderBy('sort', 'asc')->get();
$count = 0;
        foreach($menu as $key => $v)
        {
            $arr[$key]['name'] = $v['name'];
            $arr[$key]['route'] = $v['route'];
                foreach($v['childMenus'] as $key1 => $k)
                    {

                    
                $arr1[$count]['child_name'] = $k['name'];
                $arr1[$count]['child_route'] = $k['route'];
                $count++;
                
                }
                
                $arr[$key]['child_menus'] = $arr1;
                $count = 0;
            
        }
        //dd($arr);
}
else
{
    //dd($urlCheck['id']);
    $permission = App\Models\MenuPermission::where('menu_id',$urlCheck['id'])->where('role_id',$role_id)->first();
    //dd($permission);
//dd($permission);
if(!isset($permission))
{
    //return redirect()->back()->with('error','Permission Denied!');
}


$menu = App\Models\Menu::with('childMenus')->where('parent','0')->orderBy('sort', 'asc')->get();
//d($menu);
$count = 0;
        foreach($menu as $key => $v)
        {
            $arr[$key]['name'] = $v['name'];
            $arr[$key]['route'] = $v['route'];

                foreach($v['childMenus'] as $key1 => $k)
                {
                    $per = App\Models\MenuPermission::where('menu_id',$k['id'])->where('role_id',$role_id)->first();
                    
                    
                    if(isset($per['id']))
                    {
                       
                        $arr1[$count]['child_name'] = $k['name'];
                        $arr1[$count]['child_route'] = $k['route'];
                        $count++;
                    }

                }
                $count = 0;
                //dd(isset($arr1));
                    if(isset($arr1))
                    {
                        $arr[$key]['child_menus'] = $arr1;
                        $arr1 = null;
                        
                    }
        }
        //dd($arr);


}
//dd($arr);
//dd($menu);
@endphp
<a href="#" class="brand-link" target="_blank">
    <img src="{{asset('public/backend/dist/img/lu.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Team14</span>
</a>
<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <!-- <img src="{{asset('public/backend/dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image"> -->
            <img src="{{$profileImage != Null ? asset('public/upload/image/'.$profileImage) : asset('public/backend/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Start Dashboard -->
            <li class="nav-item ">
                <a href="{{route('dashboard')}}" class="nav-link {{$parentRoute[0] == 'dashboard'? 'active':'' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <!-- End Dahsboard -->
            <!--  <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tools"></i>
                    <p>
                        Menu Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{route('menu-management.view')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Menu View</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('menu-management.add')}}" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Menu Add</p>
                        </a>
                    </li>
                    
                </ul>
            </li> -->
            @foreach(@$arr as $key => $m)
    
            @if(isset($m['child_menus']))
            <li class="nav-item {{$parentRoute[0] == $m['route']? 'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tools"></i>
                    <p>
                        {{$m['name']}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
               
                @foreach($m['child_menus'] as $key1 => $ch)
                
                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{$ch['child_route']==''? '#':route($ch['child_route'])}}" class="nav-link {{$route == $ch['child_route']? 'active': ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{$ch['child_name']}}</p>
                        </a>
                    </li>
                </ul>
                

                @endforeach
               
            </li>
            @endif
            @endforeach
             
        </ul>
    </nav>
</div>
