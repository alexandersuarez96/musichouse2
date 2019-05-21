<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30);
            $table->decimal('duracion',10,2)->default(0);
            $table->UnsignedInteger('singers_id');
            $table->UnsignedInteger('song_types_id');
            $table->timestamps();

            $table->foreign('singers_id')->references('id')
            ->on('singers')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('song_types_id')->references('id')
            ->on('song_types')
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
        Schema::dropIfExists('songs');
    }
}
