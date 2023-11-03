<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\PasswordChangeController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\IconController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\MenuPermissionController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cache_clear', function(){
	try {
		Artisan::call('config:cache');
		Artisan::call('config:clear');
		Artisan::call('view:clear');
		Artisan::call('route:clear');
		Artisan::call('cache:clear');
		Artisan::call('optimize:clear');
	} catch(\Exception $e) {
		dd($e);
	}
});
	Route::get('/demo',function(){
	return view('
        demo');
});

Auth::routes();

// Frontend Start
Route::get('/',[FrontendController::class, 'index'])->name('home');
    // End Frontend
// Backend
Route::get('/login',function(){
    return view('auth.login');
})->name('login');
Route::get('/logout',[LoginController::class, 'logOut'])->name('logout');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard',[HomeController::class, 'index'])->name('dashboard');
    Route::post('/data/statuschange', [DefaultController::class, 'statusChange'])->name('table.status.change');

    // Menu Management
    Route::group(['prefix' => 'menu-management'],function(){
    	// backend menu
    	Route::get('view',[MenuController::class, 'view'])->name('menu-management.view');
		Route::get('add',[MenuController::class, 'add'])->name('menu-management.add');
    	Route::post('store',[MenuController::class, 'store'])->name('menu-management.store');
    	Route::get('edit/{id}',[MenuController::class, 'edit'])->name('menu-management.edit');
    	Route::post('update/{id}',[MenuController::class, 'update'])->name('menu-management.update');
    	Route::get('delete',[MenuController::class, 'delete'])->name('menu-management.delete');
    	// Icon
    	Route::get('icon/view',[IconController::class, 'view'])->name('menu-management.icon.view');
    	Route::post('icon/store',[IconController::class, 'store'])->name('menu-management.icon.store');
    	Route::get('icon/edit/{id}',[IconController::class, 'edit'])->name('menu-management.icon.edit');
    	Route::post('icon/update',[IconController::class, 'update'])->name('menu-management.icon.update');
    	Route::get('icon/delete',[IconController::class, 'delete'])->name('menu-management.icon.delete');

        // menu Permission
        Route::get('permission/view',[MenuPermissionController::class, 'view'])->name('menu-management.permission.view');
        Route::get('permission/add',[MenuPermissionController::class, 'add'])->name('menu-management.permission.add');
        Route::post('permission/store',[MenuPermissionController::class, 'store'])->name('menu-management.permission.store');
        
        Route::get('permission/get/menu',[MenuPermissionController::class, 'getMenu'])->name('menu-management.permission.get.menu');

		
    });
    // End Menu Management
    // Profile Management
    Route::group(['prefix' => 'profile-management'],function(){
    	Route::get('show',[ProfileController::class, 'index'])->name('profile-management.show');
    	Route::get('edit',[ProfileController::class, 'edit'])->name('profile-management.edit');
		Route::post('update',[ProfileController::class, 'update'])->name('profile-management.update');
        Route::get('password/change',[PasswordChangeController::class, 'index'])->name('profile-management.password.change');
        Route::post('password/update',[PasswordChangeController::class, 'update'])->name('profile-management.password.update');
		
    });
    // End Profile Management

    

    // Frontend Menu
    Route::group(['prefix' => 'frontend-menu'],function(){


        // menu
        Route::get('view',[FrontendMenuController::class, 'view'])->name('frontend-menu.view');
        Route::get('add',[FrontendMenuController::class, 'add'])->name('frontend-menu.add');
        Route::post('store',[FrontendMenuController::class, 'store'])->name('frontend-menu.store');
        Route::get('edit/{id}',[FrontendMenuController::class, 'edit'])->name('frontend-menu.edit');
        Route::post('update/{id}',[FrontendMenuController::class, 'update'])->name('frontend-menu.update');
        Route::get('delete',[FrontendMenuController::class, 'delete'])->name('frontend-menu.delete');
              
    });
    
	});



