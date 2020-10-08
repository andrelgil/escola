<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSegmentRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('segment_room', function (Blueprint $table) {
            $table->unsignedBigInteger('segment_id');
            $table->foreign('segment_id')->references('id')->on('segments')->onDelete('cascade');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('segment_room');
    }
}
