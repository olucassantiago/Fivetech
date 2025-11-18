<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ], [
        'email.required' => 'O campo email é obrigatório.',
        'email.email' => 'Digite um email válido.',
        'password.required' => 'O campo senha é obrigatório.',
        'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Dados inválidos',
            'errors' => $validator->errors()
        ], 422);
    }

    // Buscar usuário pelo email
    $user = User::where('email', $request->email)->first();

    // Verificar se existe e se a senha está correta
    if (!$user || !Hash::check($request->password, $user->senha)) {
        return response()->json([
            'success' => false,
            'message' => 'Credenciais inválidas.'
        ], 401);
    }

    // Gera token de acesso
    $token = $user->createToken('auth-token')->plainTextToken;

    return response()->json([
        'success' => true,
        'message' => 'Login realizado com sucesso!',
        'data' => [
            'user' => [
                'id' => $user->id,
                'name' => $user->nome,
                'email' => $user->email,
                'role' => $user->tipo,
            ],
            'token' => $token,
            'token_type' => 'Bearer'
        ]
    ], 200);
}
}
