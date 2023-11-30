<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilesToTableDenunciasfiscalia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('denunciafiscalia', function (Blueprint $table) {
            $table->string('email');
            $table->string('imagen1');
            $table->string('imagen2');
            $table->string('archivo1');
            $table->string('archivo2');
            $table->string('estado');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('denunciafiscalia', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('imagen1');
            $table->dropColumn('imagen2');
            $table->dropColumn('archivo1');
            $table->dropColumn('archivo2');
            $table->dropColumn('estado');
        });
    }
}
