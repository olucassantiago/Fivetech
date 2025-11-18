<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historico_produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')
                  ->constrained('produtos')
                  ->onDelete('cascade');

            // Campos usados pelo Model
            $table->string('campo_alterado', 100);
            $table->text('valor_antigo')->nullable();
            $table->text('valor_novo')->nullable();

            // Campo de data esperado no Model
            $table->timestamp('data_alteracao')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historico_produtos');
    }
};
