<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id()->comment('Identificador de la tienda');
            $table->string('name', 255)->comment('Nombre de la tienda');
            $table->string('direction', 255)->comment('Dirección de la tienda');
            $table->integer('distance')->comment('Distancia a la que se encuentra la tienda en m.');
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
        Schema::dropIfExists('shops');
    }
}
