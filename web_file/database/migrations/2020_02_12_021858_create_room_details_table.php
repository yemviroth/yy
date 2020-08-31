<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_details', function (Blueprint $table) {
            $table->bigIncrements('roomdetail_id');
            $table->bigInteger('room_id')->unsigned();
            // $table->foreign('room_id')
            //     ->references('id')->on('rooms');                     
            $table->string('text',200)->nullable();
            $table->Integer('order')->nullable();
            $table->string('lang',3)->nullable();
            $table->text('icon')->nullable();  
            $table->string('created_by',200)->nullable();
            $table->string('updated_by',200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_details');
    }
}
