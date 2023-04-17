<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ShowProductRequest;
use App\Repository\Product\ProductBaseRepository;
use Illuminate\Http\Request;

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
