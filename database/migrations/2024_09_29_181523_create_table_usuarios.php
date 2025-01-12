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
        Schema::create('table_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('correo', 100)->unique();
            $table->string('password', 255);
            $table->unsignedBigInteger('id_rol');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamps();

            $table->foreign('id_rol')->references('id')->on('table_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_usuarios');
    }
};
