<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movimentacoes_estoque', function (Blueprint $table) {
            $table->id();
            
            // Produto (foreign key manual)
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')
                  ->references('id')
                  ->on('produtos')
                  ->onDelete('cascade');
            
            // Usuario (foreign key manual)
            $table->unsignedBigInteger('usuario_id');
       $table->foreign('usuario_id')
      ->references('id')
      ->on('users') // ✅ nome correto
      ->onDelete('cascade');

            
            // Campos da movimentação
            $table->string('tipo', 20); // entrada, saida, ajuste
            $table->integer('quantidade');
            $table->integer('quantidade_anterior');
            $table->integer('quantidade_nova');
            $table->string('motivo')->nullable();
            $table->text('observacao')->nullable();
            $table->string('documento')->nullable();
            $table->timestamp('data_movimentacao')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimentacoes_estoque');
    }
};