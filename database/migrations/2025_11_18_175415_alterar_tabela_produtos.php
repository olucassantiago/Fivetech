<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::table('produtos', function (Blueprint $table) {
        $table->string('codigo')->nullable();
        $table->decimal('preco_venda', 10, 2)->nullable();
        $table->decimal('preco_custo', 10, 2)->nullable();
        $table->string('unidade')->nullable();
        $table->unsignedBigInteger('categoria_id')->nullable();
        $table->integer('qtd_minima_estoque')->default(0);

        // manter compatibilidade
        $table->renameColumn('preco', 'preco_original')->nullable();
    });
}

public function down()
{
    Schema::table('produtos', function (Blueprint $table) {
        $table->dropColumn([
            'codigo',
            'preco_venda',
            'preco_custo',
            'unidade',
            'categoria_id',
            'qtd_minima_estoque',
        ]);

        $table->renameColumn('preco_original', 'preco');
    });
}

};
