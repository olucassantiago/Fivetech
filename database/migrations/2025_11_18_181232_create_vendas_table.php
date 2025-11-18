<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();

            // Relacionamentos
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->unsignedBigInteger('cliente_id')->nullable();

            // Dados da venda
            $table->string('forma_pagamento')->default('dinheiro');
            $table->decimal('desconto', 10, 2)->default(0);
            $table->text('observacoes')->nullable();

            $table->string('status')->default('pendente');
            $table->text('motivo_cancelamento')->nullable();

            // Total será atualizado pelo método atualizarTotal()
            $table->decimal('total', 10, 2)->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendas');
    }
};
