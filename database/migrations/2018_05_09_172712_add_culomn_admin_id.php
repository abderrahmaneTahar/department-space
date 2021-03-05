<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCulomnAdminId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::defaultStringLength(191);
        Schema::table('publications', function (Blueprint $table) {
            $table->integer('admin_id')->unsigned()->after('id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropCulomn('admin_id');
        });
    }
}
