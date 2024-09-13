<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesSemanalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_semanales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients'); // Asumiendo que tienes una tabla 'socios'
            $table->decimal('monto', 10, 2)->default(1.00); // Actividad semanal de $1
            $table->date('fecha_actividad');
            $table->enum('estado', ['pendiente', 'pagado'])->default('pendiente');
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
        Schema::dropIfExists('actividades_semanales');
    }
}
