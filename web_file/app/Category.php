<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['cateId','cateName','cateDescription','cateOrderBy','created_at','updated_at','cateCreatedBy'];
    protected $primaryKey = 'cateId';

    public function Products()
    {
    	return $this->hasMany('App\Product','cateId');
    }



public function subCategories()
{
return $this->hasMany('App\SubCategory','cateId');
}
    // public function details()
    // {
    // 	return $this->hasMany('App\RoomDetail','room_id');
    // }

    // public function Category()
    // {
    // 	return $this->belongsTo('App\Category','proId');
    // }
}