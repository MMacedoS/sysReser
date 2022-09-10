<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstoqueProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        DROP PROCEDURE IF EXISTS `Atualiza_estoque`;
        CREATE PROCEDURE `Atualiza_estoque` (IN `id_material` INT, IN `quantidade` FLOAT)   BEGIN

         declare contador int(11);

         SELECT COUNT(*) INTO contador FROM estoque WHERE material_id=id_material;



         IF contador > 0 THEN UPDATE estoque SET saldo_anterior=saldo_atual,saldo_atual=saldo_atual+quantidade WHERE material_id=id_material;

         ELSE INSERT INTO estoque (material_id,saldo_anterior,saldo_atual) VALUES (id_material,0,quantidade);

         END IF;

         END;

        ";

        \DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $procedure = "
        DROP PROCEDURE IF EXISTS `Atualiza_estoque`";
        \DB::unprepared($procedure);
    }
}
