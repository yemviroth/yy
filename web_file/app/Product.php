<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $timestamps = false;
    // protected $primaryKey =['proId'];
    protected $fillable = ['proId','proName','proPrice','proColor1','proColor2','proColor3','proColor4','proColor5','proImage','proHowTo','proDescription','proTextIntro','proOrderBy','createdBy','proIsInStock','cateId','subCateId','proDetail'];
    // protected $primaryKey =['proId'];
    // protected $table = 'products';
    protected $primaryKey = 'proId';

    public function Category()
    {
    	return $this->belongsTo('App\Category','cateId');
    }

    public function SubCategory()
    {
    	return $this->belongsTo('App\SubCategory','subCateId');
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