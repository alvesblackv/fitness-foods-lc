<?php

namespace App\Http\Controllers\ApiStatus;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ShowApiStatusController extends Controller
{
    public function __invoke(): \Illuminate\Http\Response
    {
        return response()->noContent();
    }
}
