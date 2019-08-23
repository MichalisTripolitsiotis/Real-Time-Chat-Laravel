<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->bigIncrements('cid');
            $table->bigInteger('user_one')->unsigned();
            $table->foreign('user_one')->references('id')->on('users');
            $table->bigInteger('user_two')->unsigned();
            $table->foreign('user_two')->references('id')->on('users');
            $table->string('text');
            $table->string('time');
           
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}
