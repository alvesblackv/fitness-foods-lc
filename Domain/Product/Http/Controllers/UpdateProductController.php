<?php

namespace Domain\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\Product\Http\Requests\UpdateProductRequest;
use Domain\Product\Repositories\ProductBaseRepository;

class UpdateProductController extends Controller
{
    public function __construct(private readonly ProductBaseRepository $repository)
    {
    }

    public function __invoke(UpdateProductRequest $request)
    {
        $productEdited = $this->repository->updateProduct($request->validated());

        if (!$productEdited) {
            return response()->json(['message' => 'Ops! Aconteceu algo inesperado. Tente novamente mais tarde!'], 422);
        }
        return response()->json(['message' => 'Produto editado com sucesso!']);

    }
}
