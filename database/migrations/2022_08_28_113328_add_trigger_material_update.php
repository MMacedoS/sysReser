<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTriggerMaterialUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $trigger = "CREATE TRIGGER trg_update_material AFTER UPDATE ON `materiais` FOR EACH ROW
        BEGIN
        CALL Atualiza_estoque(new.id, new.qtdo - old.qtdo);
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
        DB::unprepared('DROP TRIGGER trg_update_material');
    }
}
