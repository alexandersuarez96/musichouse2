<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_songs', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('medios_id');
            $table->UnsignedInteger('songs_id');
            $table->timestamps();

            $table->foreign('medios_id')->references('id')
            ->on('medios')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('songs_id')->references('id')
            ->on('songs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_songs');
    }
}
