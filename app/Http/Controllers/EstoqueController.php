<?php

namespace App\Http\Controllers;

use App\Services\EstoqueService;
use App\Models\MovimentacaoEstoque;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class EstoqueController extends Controller
{
    protected $estoqueService;

    public function __construct(EstoqueService $estoqueService)
    {
        $this->estoqueService = $estoqueService;
    }

    /**
     * Registra entrada de estoque
     * POST /api/estoque/entrada
     */
    public function entrada(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'motivo' => 'nullable|string',
            'observacao' => 'nullable|string',
            'documento' => 'nullable|string',
        ], [
            'produto_id.required' => 'O produto é obrigatório',
            'produto_id.exists' => 'Produto não encontrado',
            'quantidade.required' => 'A quantidade é obrigatória',
            'quantidade.min' => 'A quantidade deve ser maior que zero',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Dados inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $dados = $request->all();
            $dados['usuario_id'] = auth()->id();

            $resultado = $this->estoqueService->registrarEntrada($dados);

            return response()->json([
                'success' => true,
                'message' => 'Entrada de estoque registrada com sucesso!',
                'data' => $resultado
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao registrar entrada: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Registra saída de estoque
     * POST /api/estoque/saida
     */
    public function saida(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'motivo' => 'nullable|string',
            'observacao' => 'nullable|string',
            'documento' => 'nullable|string',
        ], [
            'produto_id.required' => 'O produto é obrigatório',
            'produto_id.exists' => 'Produto não encontrado',
            'quantidade.required' => 'A quantidade é obrigatória',
            'quantidade.min' => 'A quantidade deve ser maior que zero',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Dados inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $dados = $request->all();
            $dados['usuario_id'] = auth()->id();

            $resultado = $this->estoqueService->registrarSaida($dados);

            return response()->json([
                'success' => true,
                'message' => 'Saída de estoque registrada com sucesso!',
                'data' => $resultado
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Ajuste de estoque
     * POST /api/estoque/ajuste
     */
    public function ajuste(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'produto_id' => 'required|exists:produtos,id',
            'quantidade_nova' => 'required|integer|min:0',
            'motivo' => 'required|string',
            'observacao' => 'nullable|string',
        ], [
            'produto_id.required' => 'O produto é obrigatório',
            'produto_id.exists' => 'Produto não encontrado',
            'quantidade_nova.required' => 'A nova quantidade é obrigatória',
            'quantidade_nova.min' => 'A quantidade não pode ser negativa',
            'motivo.required' => 'O motivo do ajuste é obrigatório',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Dados inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $dados = $request->all();
            $dados['usuario_id'] = auth()->id();

            $resultado = $this->estoqueService->ajustarEstoque($dados);

            return response()->json([
                'success' => true,
                'message' => 'Ajuste de estoque realizado com sucesso!',
                'data' => $resultado
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao ajustar estoque: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Histórico completo de movimentações
     * GET /api/estoque/historico
     */
    public function historico(Request $request)
    {
        $query = MovimentacaoEstoque::with(['produto', 'usuario']);

        // Filtro por produto
        if ($request->has('produto_id')) {
            $query->where('produto_id', $request->produto_id);
        }

        // Filtro por tipo
        if ($request->has('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        // Filtro por período
        if ($request->has('data_inicio') && $request->has('data_fim')) {
            $query->periodo($request->data_inicio, $request->data_fim);
        }

        // Ordenação
        $query->orderBy('data_movimentacao', 'desc');

        // Paginação
        $perPage = $request->get('per_page', 20);
        $movimentacoes = $query->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $movimentacoes
        ], 200);
    }

    /**
     * Histórico de um produto específico
     * GET /api/estoque/produto/{id}
     */
    public function historicoProduto($id)
    {
        $produto = Produto::with('estoque')->find($id);

        if (!$produto) {
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado'
            ], 404);
        }

        $movimentacoes = MovimentacaoEstoque::with('usuario')
            ->where('produto_id', $id)
            ->orderBy('data_movimentacao', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'produto' => $produto,
                'estoque_atual' => $produto->estoque->quantidade ?? 0,
                'movimentacoes' => $movimentacoes
            ]
        ], 200);
    }

    /**
     * Produtos com estoque baixo
     * GET /api/estoque/alertas
     */
    public function alertas()
    {
        try {
            $produtos = $this->estoqueService->produtosEstoqueBaixo();

            return response()->json([
                'success' => true,
                'total' => $produtos->count(),
                'data' => $produtos
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao buscar alertas: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Produtos sem estoque
     * GET /api/estoque/sem-estoque
     */
    public function semEstoque()
    {
        try {
            $produtos = $this->estoqueService->produtosSemEstoque();

            return response()->json([
                'success' => true,
                'total' => $produtos->count(),
                'data' => $produtos
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao buscar produtos: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Relatório de movimentações por período
     * GET /api/estoque/relatorio
     */
    public function relatorio(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $movimentacoes = MovimentacaoEstoque::with(['produto', 'usuario'])
            ->periodo($request->data_inicio, $request->data_fim)
            ->get();

        $resumo = [
            'total_entradas' => $movimentacoes->where('tipo', 'entrada')->sum('quantidade'),
            'total_saidas' => abs($movimentacoes->where('tipo', 'saida')->sum('quantidade')),
            'total_ajustes' => $movimentacoes->where('tipo', 'ajuste')->count(),
            'quantidade_movimentacoes' => $movimentacoes->count(),
        ];

        return response()->json([
            'success' => true,
            'periodo' => [
                'inicio' => $request->data_inicio,
                'fim' => $request->data_fim
            ],
            'resumo' => $resumo,
            'movimentacoes' => $movimentacoes
        ], 200);
    }
}