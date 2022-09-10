<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTriggerMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $trigger = "CREATE TRIGGER trg_insert_material AFTER INSERT ON `materiais` FOR EACH ROW
        BEGIN
        CALL Atualiza_estoque(new.id, new.qtdo);
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
        DB::unprepared('DROP TRIGGER trg_insert_material');
    }
}
