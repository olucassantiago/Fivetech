<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'usuario_id',
        'cliente_id',
        'forma_pagamento',
        'desconto',
        'observacoes',
        'status',
        'motivo_cancelamento'
    ];

    public function itens()
    {
        return $this->hasMany(ItemVenda::class);
    }

    public function atualizarTotal()
    {
        $total = $this->itens->sum(function ($item) {
            return $item->quantidade * $item->preco_unitario;
        });

        $this->total = $total - ($this->desconto ?? 0);
        $this->save();
    }
}
