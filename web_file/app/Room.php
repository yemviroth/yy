<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name','name_th','name_ch','price','description','description_th','description_ch','photo','published','created_by','updated_by','room_id','lang'];
    
    // public function details()
    // {
    // 	return $this->hasMany('App\RoomDetail','room_id');
    // }

    public function RoomMain()
    {
    	return $this->belongsTo('App\RoomMain','room_id');
    }
}
