<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcludedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excluded', function (Blueprint $table) {
            $table->id()->comment('Identificador de la tabla');
            $table->integer('shop_id')->comment('Identificador de la tienda excluida')->references('id')->on('shops');
            $table->integer('user_id')->comment('Identificador del usuario')->references('id')->on('users');
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
        Schema::dropIfExists('excluded');
    }
}
