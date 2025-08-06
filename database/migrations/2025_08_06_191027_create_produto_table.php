<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('produtos', function (Blueprint $table) {
        $table->id('id_produto');
        $table->string('nome', 100);
        $table->text('descricao')->nullable();
        $table->decimal('preco', 10, 2);
        $table->integer('estoque');
        $table->string('imagem', 255)->nullable();
        $table->unsignedBigInteger('id_categoria');
        $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto');
    }
};
