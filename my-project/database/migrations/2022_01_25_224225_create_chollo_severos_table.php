<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCholloSeverosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chollo_severos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('categoria');
            $table->string('url');
            $table->decimal('puntuacion', 8);
            $table->decimal('precio', 8, 2);
            $table->decimal('precio_descuento', 8, 2);
            $table->boolean('disponible');
            $table->string('autor');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chollo_severos');
    }
}
