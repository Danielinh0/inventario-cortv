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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->text('action');
            // 1 es creación,2 es eliminación, 3 es entrada, 4 es salida, 5 es restauración, 6 es generacion de reporte
            $table->unsignedBigInteger('tipo')->default(1);
            //LLave foranea de producto, puede ser nulo
            $table->unsignedBigInteger('producto_id')->nullable();

            $table->foreign('producto_id')->references('id_producto')->on('productos')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log');
    }
};
