<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnfriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('unfriends', function (Blueprint $table) {
        
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('unfriend_id')->unsigned();
            $table->foreign('unfriend_id')->references('id')->on('users');
             $table->primary(['user_id','unfriend_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign(['user_id']);
        $table->dorpForeign('unfriend_id');
        Schema::dropIfExists('unfriends');
    }
}
