<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_songs', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('authors_id');
            $table->UnsignedInteger('songs_id');
            $table->timestamps();

            $table->foreign('authors_id')->references('id')
            ->on('authors')
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
        Schema::dropIfExists('author_songs');
    }
}
