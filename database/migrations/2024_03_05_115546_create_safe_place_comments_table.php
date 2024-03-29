<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSafePlaceCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('safe_place_comments', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',200);
            $table->string('email',200);
            $table->text('comentario');
            $table->integer('rating');
            $table->integer('id_safe_place');
            $table->timestamp('time')->useCurrent = true;
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('safe_place_comments');
    }
}
