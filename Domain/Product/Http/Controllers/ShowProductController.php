<?php

namespace Domain\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\Product\Repositories\ProductBaseRepository;
use Requests\ShowProductRequest;

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
