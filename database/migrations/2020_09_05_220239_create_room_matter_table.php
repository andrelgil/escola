<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomMatterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_matter', function (Blueprint $table) {
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->unsignedBigInteger('matter_id');
            $table->foreign('matter_id')->references('id')->on('matters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_matter');
    }
}
