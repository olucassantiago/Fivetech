<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoProduto extends Model
{
    use HasFactory;

    protected $table = 'historico_produtos';
    public $timestamps = false;

    protected $fillable = [
        'produto_id',
        'campo_alterado',
        'valor_antigo',
        'valor_novo',
        'data_alteracao',
    ];

    protected $casts = [
        'data_alteracao' => 'datetime',
    ];

    /**
     * Relacionamento com Produto
     */
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}