<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('reservas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('email');
        $table->string('destino');
        $table->date('fecha_inicio');
        $table->date('fecha_fin');
        $table->integer('habitaciones');
        $table->timestamps(); // Esta línea añade created_at y updated_at
    });
}