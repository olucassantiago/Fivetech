<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemVenda extends Model
{
    protected $fillable = [
        'venda_id',
        'produto_id',
        'quantidade',
        'preco_unitario'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function venda()
    {
        return $this->belongsTo(Venda::class);
    }
}
