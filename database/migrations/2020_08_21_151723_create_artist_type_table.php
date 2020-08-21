<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_type', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('artist_id');
            $table->unsignedInteger('type_id');

            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('restrict')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist_type');
    }
}
