<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $timestamps = false;
    // protected $primaryKey =['proId'];
    protected $fillable = ['proId','cateId','proName','proPrice','proImage','proHowTo','proDescription','proTextIntro','proOrderBy','createdBy'];
    // protected $primaryKey =['proId'];
//    protected $table ='products';
    // public function details()
    // {
    // 	return $this->hasMany('App\RoomDetail','room_id');
    // }

    // public function Category()
    // {
    // 	return $this->belongsTo('App\Category','proId');
    // }
}