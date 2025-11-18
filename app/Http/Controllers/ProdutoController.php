<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Estoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Lista todos os produtos com estoque
     * GET /api/produtos
     */
    public function index(Request $request)
    {
        $query = Produto::with(['categoria', 'estoque']);

        // Filtro por nome ou código
        if ($request->has('busca')) {
            $busca = $request->busca;
            $query->where(function($q) use ($busca) {
                $q->where('nome', 'ILIKE', "%{$busca}%")
                  ->orWhere('codigo', 'ILIKE', "%{$busca}%");
            });
        }

        // Filtro por categoria
        if ($request->has('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        // Filtro por estoque baixo
        if ($request->has('estoque_baixo') && $request->estoque_baixo == true) {
            $query->whereHas('estoque', function($q) {
                $q->whereColumn('quantidade', '<=', 'produtos.qtd_minima_estoque');
            });
        }

        // Ordenação
        $orderBy = $request->get('order_by', 'nome');
        $orderDirection = $request->get('order_direction', 'asc');
        $query->orderBy($orderBy, $orderDirection);

        // Paginação
        $perPage = $request->get('per_page', 15);
        $produtos = $query->paginate($perPage);

        // Adicionar informações calculadas
        $produtos->getCollection()->transform(function ($produto) {
            $produto->margem_lucro = $produto->margemLucro();
            $produto->lucro_unitario = $produto->lucroUnitario();
            $produto->quantidade_estoque = $produto->getQuantidadeEstoque();
            $produto->estoque_baixo = $produto->isEstoqueBaixo();
            return $produto;
        });

        return response()->json([
            'success' => true,
            'data' => $produtos
        ], 200);
    }

    /**
     * Cadastra um novo produto
     * POST /api/produtos
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:100',
            'codigo' => 'required|string|max:50|unique:produtos,codigo',
            'preco_venda' => 'required|numeric|min:0',
            'preco_custo' => 'nullable|numeric|min:0',
            'unidade' => 'nullable|string|max:20',
            'categoria_id' => 'nullable|exists:categorias,id',
            'qtd_minima_estoque' => 'nullable|integer|min:0',
            'descricao' => 'nullable|string',
            'quantidade_inicial' => 'nullable|integer|min:0',
        ], [
            'nome.required' => 'O nome do produto é obrigatório.',
            'codigo.required' => 'O código do produto é obrigatório.',
            'codigo.unique' => 'Este código já está cadastrado.',
            'preco_venda.required' => 'O preço de venda é obrigatório.',
            'categoria_id.exists' => 'Categoria inválida.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Dados inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            // Criar o produto
            $produto = Produto::create([
                'nome' => $request->nome,
                'codigo' => $request->codigo,
                'descricao' => $request->descricao,
                'preco_venda' => $request->preco_venda,
                'preco_custo' => $request->preco_custo ?? 0,
                'unidade' => $request->unidade ?? 'UN',
                'categoria_id' => $request->categoria_id,
                'qtd_minima_estoque' => $request->qtd_minima_estoque ?? 0,
            ]);

            // Criar registro de estoque
            Estoque::create([
                'produto_id' => $produto->id,
                'quantidade' => $request->quantidade_inicial ?? 0,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Produto cadastrado com sucesso!',
                'data' => $produto->load(['categoria', 'estoque'])
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar produto: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Exibe um produto específico
     * GET /api/produtos/{id}
     */
    public function show($id)
    {
        $produto = Produto::with(['categoria', 'estoque'])->find($id);

        if (!$produto) {
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado.'
            ], 404);
        }

        // Adicionar informações calculadas
        $produto->margem_lucro = $produto->margemLucro();
        $produto->lucro_unitario = $produto->lucroUnitario();
        $produto->quantidade_estoque = $produto->getQuantidadeEstoque();
        $produto->estoque_baixo = $produto->isEstoqueBaixo();

        return response()->json([
            'success' => true,
            'data' => $produto
        ], 200);
    }

    /**
     * Atualiza um produto
     * PUT/PATCH /api/produtos/{id}
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado.'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nome' => 'sometimes|required|string|max:100',
            'codigo' => 'sometimes|required|string|max:50|unique:produtos,codigo,' . $id,
            'preco_venda' => 'sometimes|required|numeric|min:0',
            'preco_custo' => 'nullable|numeric|min:0',
            'unidade' => 'nullable|string|max:20',
            'categoria_id' => 'nullable|exists:categorias,id',
            'qtd_minima_estoque' => 'nullable|integer|min:0',
            'descricao' => 'nullable|string',
        ], [
            'nome.required' => 'O nome do produto é obrigatório.',
            'codigo.required' => 'O código do produto é obrigatório.',
            'codigo.unique' => 'Este código já está cadastrado.',
            'preco_venda.required' => 'O preço de venda é obrigatório.',
            'categoria_id.exists' => 'Categoria inválida.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Dados inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        $produto->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Produto atualizado com sucesso!',
            'data' => $produto->load(['categoria', 'estoque'])
        ], 200);
    }

    /**
     * Remove um produto
     * DELETE /api/produtos/{id}
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado.'
            ], 404);
        }

        // O CASCADE do banco vai deletar o estoque automaticamente
        $produto->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produto removido com sucesso!'
        ], 200);
    }

    /**
     * Busca produto por código
     * GET /api/produtos/buscar-codigo/{codigo}
     */
    public function buscarPorCodigo($codigo)
    {
        $produto = Produto::with(['categoria', 'estoque'])
                         ->where('codigo', $codigo)
                         ->first();

        if (!$produto) {
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado.'
            ], 404);
        }

        $produto->margem_lucro = $produto->margemLucro();
        $produto->quantidade_estoque = $produto->getQuantidadeEstoque();

        return response()->json([
            'success' => true,
            'data' => $produto
        ], 200);
    }

    /**
     * Lista produtos com estoque baixo
     * GET /api/produtos/estoque-baixo
     */
    public function estoqueBaixo()
    {
        $produtos = Produto::with(['categoria', 'estoque'])
                          ->whereHas('estoque', function($query) {
                              $query->whereColumn('quantidade', '<=', 'produtos.qtd_minima_estoque');
                          })
                          ->orderBy('nome')
                          ->get();

        $produtos->transform(function ($produto) {
            $produto->quantidade_estoque = $produto->getQuantidadeEstoque();
            return $produto;
        });

        return response()->json([
            'success' => true,
            'data' => $produtos
        ], 200);
    }

    public function paginaProdutos()
    {
        $produtos = Produto::with(['estoque', 'historico'])->get();

        return view('produtos.index', compact('produtos'));
    }


}