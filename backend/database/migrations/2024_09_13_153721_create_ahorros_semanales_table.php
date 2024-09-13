<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAhorrosSemanalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahorros_semanales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients'); // Asumiendo que tienes una tabla 'socios'
            $table->decimal('monto', 10, 2);
            $table->date('fecha_ahorro');
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
        Schema::dropIfExists('ahorros_semanales');
    }
}
