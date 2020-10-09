<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $fillable= ['dsName','dsPhoto','dsLocation','dsAddress','dsPhone','dsFb','dsIg','dsDescription','created_at','updated_at'];
}
