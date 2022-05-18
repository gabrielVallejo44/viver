<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imagenes_usuarios', function(Blueprint $table) {
            //$table->bigInteger('id_usuario')->unsigned();
            $table
                ->foreign('id_usuario')
                ->references('id')
                ->on('usuarios');
                //->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
