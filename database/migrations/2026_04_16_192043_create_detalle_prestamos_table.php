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
        Schema::create('detalle_prestamos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_prestamos');
            $table->unsignedBigInteger('id_libro');

            $table->foreign('id_prestamos')->references('id_prestamos')->on('prestamos');
            $table->foreign('id_libro')->references('id')->on('libros');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_prestamos');
    }
};
