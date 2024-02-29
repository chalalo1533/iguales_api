<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiscaliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiscalias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre',200);
            $table->string('direccion',200);
            $table->string('ciudad',100);
            $table->text('covertura');
            $table->string('lat',100);
            $table->string('lon',100);
            $table->string('fono',100);
            $table->string('fono_fax',100);
            $table->integer('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiscalias');
    }
}
