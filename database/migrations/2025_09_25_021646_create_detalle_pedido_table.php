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
        Schema::create('detalle_pedido', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_pedido')->unsigned();
            $table->bigInteger('fk_platillo')->unsigned(); // Assuming this will reference a 'platillos' table later
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->timestamps();

            $table->foreign('fk_pedido')->references('id')->on('pedidos');
            // Assuming fk_platillo will reference a 'platillos' table, which is not yet created.
            // $table->foreign('fk_platillo')->references('id')->on('platillos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pedido');
    }
};
