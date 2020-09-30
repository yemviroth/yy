<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campany extends Model
{
    //
    protected $fillable = ['id','campanyName','campanyCEO','campanyReg','campanyPhone','campanyEmail','campanyAddress','campanyOther'];
    //protected $table = ['campany'];
}
