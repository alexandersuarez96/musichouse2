<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30);
            $table->date('fecha');
            $table->UnsignedInteger('home_musics_id');
            $table->timestamps();
            $table->foreign('home_musics_id')->references('id')
                ->on('home_musics')
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
        Schema::dropIfExists('albums');
    }
}
