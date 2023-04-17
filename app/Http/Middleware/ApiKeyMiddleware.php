<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->hasHeader('api_key')) {
            return response()->json(['message' => 'Você não possui permissão para acessar esse endpoint'], 401);
        }

        if($request->header('api_key') != config('services.auth.api_token')) {
            return response()->json(['message' => 'Você não possui permissão para acessar esse endpoint'], 401);
        }

        return $next($request);
    }
}
