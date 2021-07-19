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
        DB::statement("
          CREATE TABLE `likes` (
            `id` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la tabla',
            `shop_id` BIGINT(20) NOT NULL COMMENT 'Identificador de la tienda',
            `user_id` BIGINT(20) NOT NULL COMMENT 'Identificador del usuario',
            PRIMARY KEY (`id`),
            INDEX `users_id_unique` (`user_id` ASC),
            INDEX `shops_id_unique` (`shop_id` ASC))
          COMMENT = 'Tabla de relación de \"me gusta\" de una tienda por parte de un usuario.',
          ENGINE = InnoDB;;
        ");
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
