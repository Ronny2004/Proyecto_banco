<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Ejecuta las migraciones para crear la tabla `expenses`.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id(); // Crea una columna `id` auto incremental
            $table->string('description'); // Crea una columna `description` de tipo string
            $table->decimal('amount', 10, 2); // Crea una columna `amount` de tipo decimal
            $table->date('date'); // Crea una columna `date` de tipo date
            $table->timestamps(); // Crea columnas `created_at` y `updated_at`
        });
    }

    /**
     * Reversa las migraciones eliminando la tabla `expenses`.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
