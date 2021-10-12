<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("floor");
            $table->string("bid");
            $table->string("room_type_id");
            $table->string("officename");
            $table->string("roomsize")->nullable();
            $table->string("noofchair")->nullable();
            $table->string("whiteboard")->nullable();
            $table->string("capacity")->default('50');
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
        Schema::dropIfExists('rooms');
    }
}
