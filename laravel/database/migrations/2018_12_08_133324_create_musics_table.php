<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_album')->unsigned();
            $table->foreign('id_album')->references('id')->on('albums')->onDelete('cascade');
            $table->string('title');
            $table->string('track');
            $table->string('duration');
            $table->string('mv');
            $table->text('mv_url')->nullable();
            $table->string('mp3');
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
        Schema::dropIfExists('musics');
    }
}
