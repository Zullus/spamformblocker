<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAccesslog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesslogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip');
            $table->string('reverseip');
            $table->string('useragent');
            $table->string('blockemail');
            $table->string('action');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accesslogs');
    }
}
