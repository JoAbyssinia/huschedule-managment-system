<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('exam_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('time');
            $table->string('department');
            $table->string('modality');
            $table->string('batch');
            $table->string('course');
            $table->integer('invigilator_id');
            $table->integer('classroom_id');
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
        Schema::dropIfExists('exam_schedules');
    }
}
