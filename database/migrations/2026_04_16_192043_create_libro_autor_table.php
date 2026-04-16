<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('libro_autor', function (Blueprint $table) {
            $table->unsignedBigInteger('id_libro');
            $table->unsignedBigInteger('id_autor');

            $table->foreign('id_libro')->references('id')->on('libros');
            $table->foreign('id_autor')->references('id')->on('autores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Libro_autor');
    }
};
