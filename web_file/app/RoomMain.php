<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomMain extends Model
{
    protected $fillable = ['name','photo1','photo2','photo3','photo4','photo5','photo6','photo7','published','created_by','updated_by'];
    protected $table = 'room_main';
    //
   

    public function details()
    {
    	return $this->hasMany('App\RoomDetail','room_id');
    }


    
}
