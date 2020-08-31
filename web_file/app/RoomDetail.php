<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomDetail extends Model
{
    //
	//protected $table = 'room_details';

    protected $fillable =['room_id','text','order','lang','icon','created_at','created_by','updated_by'];
    // public function room()
    // {
    // 	return $this->belongsTo('App\Room');
    // }

    public function RoomMain()
    {
    	return $this->belongsTo('App\RoomMain','room_id');
    }
}
