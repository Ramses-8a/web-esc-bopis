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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_usuario')->unsigned();
            $table->integer('total');
            $table->bigInteger('fk_estado_pedido')->unsigned();
            $table->bigInteger('fk_metodo_pago')->unsigned()->nullable(); // Assuming nullable for now
            $table->time('hora_recojo');
            $table->time('hora_pedido');
            $table->string('num_orden');
            $table->timestamps();

            $table->foreign('fk_usuario')->references('id')->on('user_movil');
            $table->foreign('fk_estado_pedido')->references('id')->on('estados_pedido');
            // Assuming fk_metodo_pago will reference a 'metodo_pago' table, which is not yet created.
            // $table->foreign('fk_metodo_pago')->references('id')->on('metodo_pago');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
