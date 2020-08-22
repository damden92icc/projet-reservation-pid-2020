<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representation_user', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('representation_id');
            $table->unsignedInteger('user_id');
    
            $table->foreign('representation_id')->references('id')->on('representations')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
    
            
            $table->integer('places');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representation_user');
    }
}
