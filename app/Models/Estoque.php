<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

    protected $table = 'estoque';
    public $timestamps = false;

    protected $fillable = [
        'produto_id',
        'quantidade',
    ];

    protected $casts = [
        'produto_id' => 'integer',
        'quantidade' => 'integer',
    ];

    /**
     * Relacionamento com Produto
     */
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}