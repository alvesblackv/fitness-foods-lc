<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Repository\Product\ProductBaseRepository;
use Illuminate\Http\Request;

class UpdateProductController extends Controller
{
    public function __construct(private readonly ProductBaseRepository $repository)
    {
    }

    public function __invoke(Request $request)
    {
        $productEdited = $this->repository->updateProduct($request->validated());

        if ($productEdited) {
            return response()->noContent();
        }
        return response()->json(['message' => 'Ops! Aconteceu algo inesperado. Tente novamente mais tarde!'], 422);
    }
}
