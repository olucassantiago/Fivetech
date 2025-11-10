<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Produto;
use App\Models\ItemVenda;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    public function criar(Request $request)
    {
        $request->validate([
            'itens' => 'required|array|min:1',
            'itens.*.produto_id' => 'required|exists:produtos,id',
            'itens.*.quantidade' => 'required|integer|min:1',
        ]);

        return DB::transaction(function () use ($request) {
            $venda = Venda::create([
                'usuario_id' => auth()->id(),
                'cliente_id' => $request->cliente_id,
                'desconto' => $request->desconto ?? 0,
                'forma_pagamento' => $request->forma_pagamento ?? 'dinheiro',
                'observacoes' => $request->observacoes ?? null,
                'status' => 'pendente'
            ]);

            foreach ($request->itens as $item) {
                $produto = Produto::findOrFail($item['produto_id']);

                if ($produto->quantidade_estoque < $item['quantidade']) {
                    abort(400, "Estoque insuficiente para o produto {$produto->nome}");
                }

                $produto->decrement('quantidade_estoque', $item['quantidade']);

                $venda->itens()->create([
                    'produto_id' => $produto->id,
                    'quantidade' => $item['quantidade'],
                    'preco_unitario' => $produto->preco_venda,
                ]);
            }

            $venda->atualizarTotal();

            return response()->json(['success' => true, 'data' => $venda->load('itens')]);
        });
    }

    public function finalizar($id)
    {
        $venda = Venda::findOrFail($id);
        $venda->status = 'finalizada';
        $venda->save();

        return response()->json(['success' => true, 'data' => $venda]);
    }

    public function cancelar(Request $request, $id)
    {
        $venda = Venda::findOrFail($id);
        foreach ($venda->itens as $item) {
            $item->produto->increment('quantidade_estoque', $item->quantidade);
        }

        $venda->status = 'cancelada';
        $venda->motivo_cancelamento = $request->motivo;
        $venda->save();

        return response()->json(['success' => true, 'data' => $venda]);
    }
}

public function listar()
{
    $vendas = Venda::with('itens.produto')->orderByDesc('created_at')->limit(50)->get();
    return response()->json($vendas);
}

}