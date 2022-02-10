<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaCholloseveroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_chollo_severo', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedInteger('categoria_id');
        $table->unsignedInteger('chollo_severo_id');
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
        Schema::dropIfExists('categoria_chollosevero');
    }
}
