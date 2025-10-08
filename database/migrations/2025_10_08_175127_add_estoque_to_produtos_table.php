<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            if (!Schema::hasColumn('produtos', 'estoque')) {
                $table->integer('estoque')->default(0);
            }
            if (!Schema::hasColumn('produtos', 'descricao')) {
                $table->text('descricao')->nullable();
            }
            if (!Schema::hasColumn('produtos', 'imagem')) {
                $table->string('imagem')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['estoque', 'descricao', 'imagem']);
        });
    }
};
