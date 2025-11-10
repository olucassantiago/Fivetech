<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;

class LucasController extends Controller
{
    public function index()
    {
      /*  $Produto = Produto::create([
            'nome' => 'Bolo de Pote do Vini',
            'descricao' => 'É uma delícia, igual ele',
            'preco' => 9999.99,
        ]); 
        dd($Produto);
    */
        $produtos = Produto::get();
        return view('lucas', ['produtos' => $produtos]);
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        //dd($dados);
        $produtos = Produto::create([
            'nome' => $dados['nome'],
            'descricao' => $dados['descricao'],
            'preco' => $dados['preco'],
        ]);
    }

}
