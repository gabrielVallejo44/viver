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
        Schema::create('peticiones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('emisor')->unsigned();
            $table->string('mensaje');
            $table->bigInteger('receptor')->unsigned();
            $table->timestamps();
        });
        Schema::table('peticiones', function(Blueprint $table) {
            //$table->bigInteger('casa')->unsigned();
            $table
                ->foreign('emisor')
                ->references('id')
                ->on('usuarios');
                //->after('id');
            $table
                ->foreign('receptor')
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
        Schema::dropIfExists('peticiones');
    }
};
