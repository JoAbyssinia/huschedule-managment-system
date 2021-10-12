<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id();
            $table->string("section_id");
            $table->string("room_id");
            $table->string("date")->uniqid(true);
            $table->string("time_id")->uniqid(true);
            $table->string("section");
            $table->string("instructor")->uniqid(true);
            $table->string("course");
            $table->string("department");
            $table->string("modality");
            $table->string("batch");
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
        Schema::dropIfExists('class_schedules');
    }
}
