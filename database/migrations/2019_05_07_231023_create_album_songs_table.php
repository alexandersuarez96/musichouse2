<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_songs', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('albums_id');
            $table->UnsignedInteger('songs_id');
            $table->timestamps();

            $table->foreign('albums_id')->references('id')
            ->on('albums')
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
        Schema::dropIfExists('album_songs');
    }
}
