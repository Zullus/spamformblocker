<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIPANDHosttoTableBademail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bademails', function($table)
        {
            $table->string('ip')->after('ativo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bademails', function($table)
        {
            $table->dropColumn('ip');
        });
    }
}
