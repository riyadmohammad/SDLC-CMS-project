<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPermission extends Model
{
    use HasFactory;
    public function menu()
    {
    	return $this->hasOne(Menu::class,'id','menu_id');
    }
}
