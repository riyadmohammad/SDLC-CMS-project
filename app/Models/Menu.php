<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','parent','route','sort','icon_id','status'];

    public function parentMenu()
    {
    	return $this->hasOne(Menu::class,'id','parent');
    }
    public function menuPermission()
    {
        return $this->hasMany(MenuPermission::class,'menu_id','id');
    }

    public function childMenus()
    {
    	return $this->hasMany(Menu::class,'parent','id')->orderBy('sort', 'asc');
    }
     public function icons()
    {
        return $this->hasOne(Icon::class,'id','icon_id');
    }
}
