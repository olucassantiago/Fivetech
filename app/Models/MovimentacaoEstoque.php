<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentacaoEstoque extends Model
{
    use HasFactory;

    /**
     * Nome da tabela
     */
    protected $table = 'movimentacoes_estoque';

    /**
     * A tabela não tem updated_at
     */
    public $timestamps = false;

    /**
     * Campos que podem ser preenchidos
     */
    protected $fillable = [
        'produto_id',
        'usuario_id',
        'tipo',
        'quantidade',
        'quantidade_anterior',
        'quantidade_nova',
        'motivo',
        'observacao',
        'documento',
        'data_movimentacao',
    ];

    /**
     * Conversões de tipo
     */
    protected $casts = [
        'data_movimentacao' => 'datetime',
        'quantidade' => 'integer',
        'quantidade_anterior' => 'integer',
        'quantidade_nova' => 'integer',
    ];

    /**
     * Relacionamento com Produto
     */
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    /**
     * Relacionamento com Usuario
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    /**
     * Scope para filtrar por tipo
     */
    public function scopeTipo($query, $tipo)
    {
        return $query->where('tipo', $tipo);
    }

    /**
     * Scope para filtrar por período
     */
    public function scopePeriodo($query, $dataInicio, $dataFim)
    {
        return $query->whereBetween('data_movimentacao', [$dataInicio, $dataFim]);
    }
}