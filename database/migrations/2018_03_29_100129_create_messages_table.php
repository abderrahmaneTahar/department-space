<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sender_id')->unsigned();
            $table->foreign('sender_id')->references('id')->on('users');
            $table->integer('reciver_id')->unsigned();
            $table->foreign('reciver_id')->references('id')->on('users');
            $table->text('body');
            $table->boolean('read')->default(0);

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
        $table->dropForeign(['sender_id']);
        $table->dropForeign(['reciver_id']);
        Schema::dropIfExists('messages');
    }
}
