<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->json('produtos');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('frete', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            $table->string('cep');
            $table->timestamps();
        });        
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}


