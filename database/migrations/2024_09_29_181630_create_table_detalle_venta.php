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
            Schema::create('table_detalle_venta', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_venta');
                $table->unsignedBigInteger('id_producto');
                $table->integer('cantidad');
                $table->decimal('precio_unitario', 10, 2);
                $table->decimal('subtotal', 10, 2);
                $table->timestamps();

                $table->foreign('id_venta')->references('id')->on('table_ventas')->onDelete('cascade');
                $table->foreign('id_producto')->references('id')->on('table_productos')->onDelete('cascade');
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_detalle_venta');
    }
};
