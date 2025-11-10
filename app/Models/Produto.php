<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    /**
     * Nome da tabela (do banco existente)
     */
    protected $table = 'produtos';

    /**
     * A tabela NÃO tem timestamps (created_at, updated_at)
     */
    public $timestamps = false;

    /**
     * Campos que podem ser preenchidos em massa
     */
    protected $fillable = [
        'nome',
        'codigo',
        'descricao',
        'preco_venda',
        'preco_custo',
        'unidade',
        'categoria_id',
        'qtd_minima_estoque',
    ];

    /**
     * Conversões de tipo
     */
    protected $casts = [
        'preco_custo' => 'decimal:2',
        'preco_venda' => 'decimal:2',
        'categoria_id' => 'integer',
        'qtd_minima_estoque' => 'integer',
    ];

    /**
     * Relacionamento com Categoria
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    /**
     * Relacionamento com Estoque
     */
    public function estoque()
    {
        return $this->hasOne(Estoque::class, 'produto_id');
    }

    /**
     * Relacionamento com Histórico
     */
    public function historico()
    {
        return $this->hasMany(HistoricoProduto::class, 'produto_id');
    }

    /**
     * Calcula a margem de lucro (%)
     */
    public function margemLucro(): float
    {
        if ($this->preco_custo == 0) {
            return 0;
        }
        
        $lucro = $this->preco_venda - $this->preco_custo;
        return ($lucro / $this->preco_custo) * 100;
    }

    /**
     * Calcula o lucro unitário
     */
    public function lucroUnitario(): float
    {
        return $this->preco_venda - $this->preco_custo;
    }

    /**
     * Verifica se o estoque está baixo
     */
    public function isEstoqueBaixo(): bool
    {
        if (!$this->estoque) {
            return true;
        }
        return $this->estoque->quantidade <= $this->qtd_minima_estoque;
    }

    /**
     * Retorna a quantidade em estoque
     */
    public function getQuantidadeEstoque(): int
    {
        return $this->estoque ? $this->estoque->quantidade : 0;
    }
}