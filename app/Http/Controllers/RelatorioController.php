<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RelatorioController extends Controller
{
    public function totalVendidoPorPeriodo(Request $request)
    {
        $request->validate([
            'de' => 'required|date',
            'ate' => 'required|date'
        ]);

        $total = Venda::where('status', 'finalizada')
            ->whereBetween('created_at', [$request->de, $request->ate])
            ->sum('total');

        return response()->json(['total_vendido' => $total]);
    }

    public function produtosMaisVendidos()
    {
        $result = DB::table('item_vendas')
            ->select('produto_id', DB::raw('SUM(quantidade) as total'))
            ->groupBy('produto_id')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        return response()->json(['mais_vendidos' => $result]);
    }
}
