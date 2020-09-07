<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //

protected $fillable=['subCateId','cateId','subCateName'];
protected $table='subcategories';
protected $primaryKey = 'subCateId';

public function subCategories_product()
{
return $this->hasMany('App\Product','subCateId');
}

public function subCategories_Category()
    {
    	return $this->belongsTo('App\Category','cateId');
    }
  
}
