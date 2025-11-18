<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('estoque', function (Blueprint $table) {
            $table->id();

            $table->foreignId('produto_id')
                  ->constrained('produtos')
                  ->onDelete('cascade');

            $table->integer('quantidade')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('estoque');
    }
};