<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $timestamps = false;
    // protected $primaryKey =['proId'];
    protected $fillable = ['proId','cateId','proName','proPrice','proImage','proHowTo','proDescription','proTextIntro','proOrderBy','createdBy','proIsInStock',];
    // protected $primaryKey =['proId'];
    protected $primaryKey = 'proId';

    public function category()
    {
         return $this->belongsTo('App\Category','cateId');
    }


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