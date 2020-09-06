<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //

protected $fillable=['subCateId','cateId','subCateName'];
protected $primaryKey = 'subCateId';

public function category()
    {
    return $this->belongsTo('App\Category','cateId');
    }   
}
