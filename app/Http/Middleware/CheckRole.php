<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Não autenticado'
            ], 401);
        }

        // Usar 'tipo' ao invés de 'role'
        $userRole = strtolower(auth()->user()->tipo);

        // Converter roles para lowercase
        $roles = array_map('strtolower', $roles);

        if (!in_array($userRole, $roles)) {
            return response()->json([
                'success' => false,
                'message' => 'Acesso negado. Privilégios insuficientes.'
            ], 403);
        }

        return $next($request);
    }
}