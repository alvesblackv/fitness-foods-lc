<?php

namespace Domain\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\Product\Repositories\ProductBaseRepository;

class ShowProductsController extends Controller
{
    public function __construct(private readonly ProductBaseRepository $repository)
    {
    }

    public function __invoke()
    {
        return response()->json($this->repository->getAllProducts());
    }
}
