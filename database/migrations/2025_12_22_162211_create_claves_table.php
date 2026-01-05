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
        Schema::create('claves', function (Blueprint $table) {
            $table->id('id_clave');
            $table->unsignedBigInteger('id_area');
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->integer('contador_clave'); 
            $table->string('valor_clave');
            
            $table->foreign('id_area')->references('id_area')->on('areas')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('set null');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claves');
    }
};
