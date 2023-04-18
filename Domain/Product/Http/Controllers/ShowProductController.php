<?php

namespace Domain\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\Product\Http\Requests\ShowProductRequest;
use Domain\Product\Repositories\ProductBaseRepository;

class ShowProductController extends Controller
{
    public function __construct(private readonly ProductBaseRepository $repository)
    {
    }

    public function __invoke(ShowProductRequest $request)
    {
        return $this->repository->findProductByCode($request->code);
    }
}
