<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\ItemVenda;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Ganhos Mensais (PostgreSQL)
        $ganhosMensais = Venda::whereRaw("EXTRACT(MONTH FROM created_at) = ?", [now()->month])
            ->whereRaw("EXTRACT(YEAR FROM created_at) = ?", [now()->year])
            ->sum('total');

        // Ganhos Anuais (PostgreSQL)
        $ganhosAnuais = Venda::whereRaw("EXTRACT(YEAR FROM created_at) = ?", [now()->year])
            ->sum('total');

        // Total de Tarefas (fixo)
        $tarefas = 50;

        // Solicitações Pendentes
        $pendentes = Venda::where('status', 'pendente')->count();


        /*
        |--------------------------------------------------------------------------
        | GRÁFICO DE LINHA – Ganhos por mês
        | PostgreSQL NÃO usa MONTH(), então usamos to_char
        |--------------------------------------------------------------------------
        */

        $ganhosPorMes = Venda::select(
                DB::raw("SUM(total) AS total"),
                DB::raw("to_char(created_at, 'MM') AS mes") // 01, 02, 03 ...
            )
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        $labels = $ganhosPorMes->pluck('mes'); // meses
        $values = $ganhosPorMes->pluck('total'); // valores


        /*
        |--------------------------------------------------------------------------
        | GRÁFICO DE PIZZA – Fontes de Receita
        |--------------------------------------------------------------------------
        */

        $fontesReceita = ItemVenda::select(
                DB::raw('SUM(item_vendas.quantidade * item_vendas.preco_unitario) AS total'),
                DB::raw('categorias.nome AS categoria')
            )
            ->join('produtos', 'produtos.id', '=', 'item_vendas.produto_id')
            ->join('categorias', 'categorias.id', '=', 'produtos.categoria_id')
            ->groupBy('categorias.nome')
            ->orderBy('categorias.nome')
            ->get();

        $categorias = $fontesReceita->pluck('categoria');
        $totais     = $fontesReceita->pluck('total');



        return view('dashboard.index', compact(
            'ganhosMensais',
            'ganhosAnuais',
            'tarefas',
            'pendentes',
            'labels',
            'values',
            'categorias',
            'totais'
        ));
    }
}
