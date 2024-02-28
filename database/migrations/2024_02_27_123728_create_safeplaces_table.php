<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSafeplacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('safeplaces', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_lugar',100);
            $table->string('direccion',100);
            $table->string('comuna',100);
            $table->string('horario1',100);
            $table->string('horario2',100);
            $table->integer('estado');
            $table->string('lat',100);
            $table->string('long',100);
            $table->string('email',100);
            $table->string('cell',100);





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('safeplaces');
    }
}
