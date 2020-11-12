<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diferencias', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('codigo_producto');
            $table->integer('cantidad_actual');
            $table->integer('cantidad_fisica');
            $table->date('fecha_inventario');
            $table->timestamps();
            $table->foreign('codigo_producto')->references('codigo')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diferencias');
    }
}
