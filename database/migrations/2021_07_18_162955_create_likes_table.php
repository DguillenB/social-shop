<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*DB::statement("
          CREATE TABLE `likes` (
            `id` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la tabla',
            `shop_id` BIGINT(20) NOT NULL COMMENT 'Identificador de la tienda',
            `user_id` BIGINT(20) NOT NULL COMMENT 'Identificador del usuario',
            PRIMARY KEY (`id`),
            INDEX `users_id_unique` (`user_id` ASC),
            INDEX `shops_id_unique` (`shop_id` ASC))
          COMMENT = 'Tabla de relación de \"me gusta\" de una tienda por parte de un usuario.',
          ENGINE = InnoDB;;
        ");*/
        
        Schema::create('likes', function (Blueprint $table) {
            $table->id()->comment('Identificador de la tabla');
            $table->integer('shop_id')->comment('Identificador de la tienda')->references('id')->on('shops');
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
        Schema::dropIfExists('likes');
    }
}
