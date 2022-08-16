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
        Schema::create('tcc_rates_paq', function (Blueprint $table) {
            $table->id();
            $table->string('municipio_origen')->nullable()->comment('Municipio de origen');
            $table->string('departamento_origen')->nullable()->comment('Departamento de origen');
            $table->string('municipio_destino')->nullable()->comment('Municipio de destino');
            $table->string('departamento_destino')->nullable()->comment('Departamento de destino');
            $table->boolean('aliados')->default(true)->comment('Alianzas');
            $table->boolean('recogida')->default(true)->comment('Recogida');
            $table->boolean('boomerang')->default(true)->comment('Boomerang');
            $table->string('centro_operaciones')->nullable()->comment('Centro de operaciones');
            $table->float('valor')->nullable()->comment('Valor');
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
        Schema::dropIfExists('tcc_rates_paq');
    }
};
