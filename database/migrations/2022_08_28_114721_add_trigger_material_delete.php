<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTriggerMaterialDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $trigger = "CREATE TRIGGER trg_DELETE_material AFTER DELETE ON `materiais` FOR EACH ROW
        BEGIN
        CALL Atualiza_estoque(old.id, old.qtdo*(-1));
        END;
       ";
       \DB::unprepared($trigger);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER trg_DELETE_material');
    }
}
