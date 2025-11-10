<?php

namespace App\Services;

use App\Models\Produto;
use App\Models\Estoque;
use App\Models\MovimentacaoEstoque;
use App\Models\HistoricoProduto;
use Illuminate\Support\Facades\DB;
use Exception;

class EstoqueService
{
    /**
     * Registra entrada de estoque (compra)
     */
    public function registrarEntrada(array $dados)
    {
        DB::beginTransaction();
        try {
            $produto = Produto::findOrFail($dados['produto_id']);
            $estoque = $produto->estoque;

            if (!$estoque) {
                throw new Exception('Produto não possui registro de estoque');
            }

            $quantidadeAnterior = $estoque->quantidade;
            $quantidadeNova = $quantidadeAnterior + $dados['quantidade'];

            // Atualiza o estoque
            $estoque->update(['quantidade' => $quantidadeNova]);

            // Registra a movimentação
            $movimentacao = MovimentacaoEstoque::create([
                'produto_id' => $dados['produto_id'],
                'usuario_id' => $dados['usuario_id'],
                'tipo' => 'entrada',
                'quantidade' => $dados['quantidade'],
                'quantidade_anterior' => $quantidadeAnterior,
                'quantidade_nova' => $quantidadeNova,
                'motivo' => $dados['motivo'] ?? 'Entrada de estoque',
                'observacao' => $dados['observacao'] ?? null,
                'documento' => $dados['documento'] ?? null,
            ]);

            // Registra no histórico de produtos
            HistoricoProduto::create([
                'produto_id' => $dados['produto_id'],
                'campo_alterado' => 'estoque',
                'valor_antigo' => (string) $quantidadeAnterior,
                'valor_novo' => (string) $quantidadeNova,
            ]);

            DB::commit();

            return [
                'success' => true,
                'movimentacao' => $movimentacao->load(['produto', 'usuario']),
                'estoque_atual' => $quantidadeNova
            ];

        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Registra saída de estoque
     */
    public function registrarSaida(array $dados)
    {
        DB::beginTransaction();
        try {
            $produto = Produto::findOrFail($dados['produto_id']);
            $estoque = $produto->estoque;

            if (!$estoque) {
                throw new Exception('Produto não possui registro de estoque');
            }

            $quantidadeAnterior = $estoque->quantidade;
            
            // Valida se tem estoque suficiente
            if ($quantidadeAnterior < $dados['quantidade']) {
                throw new Exception('Estoque insuficiente. Disponível: ' . $quantidadeAnterior);
            }

            $quantidadeNova = $quantidadeAnterior - $dados['quantidade'];

            // Atualiza o estoque
            $estoque->update(['quantidade' => $quantidadeNova]);

            // Registra a movimentação
            $movimentacao = MovimentacaoEstoque::create([
                'produto_id' => $dados['produto_id'],
                'usuario_id' => $dados['usuario_id'],
                'tipo' => 'saida',
                'quantidade' => -$dados['quantidade'], // Negativo para saída
                'quantidade_anterior' => $quantidadeAnterior,
                'quantidade_nova' => $quantidadeNova,
                'motivo' => $dados['motivo'] ?? 'Saída de estoque',
                'observacao' => $dados['observacao'] ?? null,
                'documento' => $dados['documento'] ?? null,
            ]);

            // Registra no histórico
            HistoricoProduto::create([
                'produto_id' => $dados['produto_id'],
                'campo_alterado' => 'estoque',
                'valor_antigo' => (string) $quantidadeAnterior,
                'valor_novo' => (string) $quantidadeNova,
            ]);

            DB::commit();

            return [
                'success' => true,
                'movimentacao' => $movimentacao->load(['produto', 'usuario']),
                'estoque_atual' => $quantidadeNova
            ];

        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Ajuste de estoque (correção manual)
     */
    public function ajustarEstoque(array $dados)
    {
        DB::beginTransaction();
        try {
            $produto = Produto::findOrFail($dados['produto_id']);
            $estoque = $produto->estoque;

            if (!$estoque) {
                throw new Exception('Produto não possui registro de estoque');
            }

            $quantidadeAnterior = $estoque->quantidade;
            $quantidadeNova = $dados['quantidade_nova'];
            $diferenca = $quantidadeNova - $quantidadeAnterior;

            // Atualiza o estoque
            $estoque->update(['quantidade' => $quantidadeNova]);

            // Registra a movimentação
            $movimentacao = MovimentacaoEstoque::create([
                'produto_id' => $dados['produto_id'],
                'usuario_id' => $dados['usuario_id'],
                'tipo' => 'ajuste',
                'quantidade' => $diferenca,
                'quantidade_anterior' => $quantidadeAnterior,
                'quantidade_nova' => $quantidadeNova,
                'motivo' => $dados['motivo'] ?? 'Ajuste de estoque',
                'observacao' => $dados['observacao'] ?? null,
                'documento' => $dados['documento'] ?? null,
            ]);

            // Registra no histórico
            HistoricoProduto::create([
                'produto_id' => $dados['produto_id'],
                'campo_alterado' => 'estoque',
                'valor_antigo' => (string) $quantidadeAnterior,
                'valor_novo' => (string) $quantidadeNova,
            ]);

            DB::commit();

            return [
                'success' => true,
                'movimentacao' => $movimentacao->load(['produto', 'usuario']),
                'estoque_atual' => $quantidadeNova,
                'diferenca' => $diferenca
            ];

        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Busca produtos com estoque baixo
     */
    public function produtosEstoqueBaixo()
    {
        return Produto::with(['categoria', 'estoque'])
            ->whereHas('estoque', function($query) {
                $query->whereColumn('quantidade', '<=', 'produtos.qtd_minima_estoque');
            })
            ->get()
            ->map(function($produto) {
                return [
                    'id' => $produto->id,
                    'nome' => $produto->nome,
                    'codigo' => $produto->codigo,
                    'categoria' => $produto->categoria->nome ?? 'Sem categoria',
                    'quantidade_atual' => $produto->estoque->quantidade,
                    'quantidade_minima' => $produto->qtd_minima_estoque,
                    'diferenca' => $produto->qtd_minima_estoque - $produto->estoque->quantidade,
                ];
            });
    }

    /**
     * Produtos sem estoque (zerados)
     */
    public function produtosSemEstoque()
    {
        return Produto::with(['categoria', 'estoque'])
            ->whereHas('estoque', function($query) {
                $query->where('quantidade', '<=', 0);
            })
            ->get();
    }
}