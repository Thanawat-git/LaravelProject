<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableQueues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Queues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('QNo');
            $table->string('Status');
            $table->date('Date');
            $table->time('Time_Start');
            $table->time('Time_End');
            $table->unsignedBigInteger('Sub_id')->nullable();
            $table->foreign('Sub_id')->references('id')->on('Subjects');
            $table->unsignedBigInteger('Teacher_id')->nullable();
            $table->foreign('Teacher_id')->references('id')->on('Teachers');
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
        Schema::dropIfExists('Queues');
    }
}
