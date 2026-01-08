<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id('id_registro')->primary();
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('persona_id');
            $table->date('fecha_registro')->default(now());
            
            // tipo_registro: 1 para entrada, 0 para salida
            $table->boolean('tipo_registro');
            $table->integer('cantidad_registro')->default(0);
            $table->foreign('producto_id')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->foreign('persona_id')->references('id_persona')->on('personas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
