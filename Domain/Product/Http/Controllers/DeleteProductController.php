<?php

namespace Domain\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\Product\Http\Requests\DeleteProductRequest;
use Domain\Product\Repositories\ProductBaseRepository;

class DeleteProductController extends Controller
{
    public function __construct(private readonly ProductBaseRepository $repository)
    {
    }

    public function __invoke(DeleteProductRequest $request)
    {
        if($this->repository->deleteProduct($request->code)) {
            return response()->json(['message' => 'O produto foi atualizado para o status trash com sucesso!']);
        }
        return response()->json(['message' => 'Ops! Aconteceu algo inesperado'], 422);
    }
}
