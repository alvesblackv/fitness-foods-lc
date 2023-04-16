<?php

namespace App\Repository\Product;


use App\Models\Product;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class ProductEloquentRepository implements ProductBaseRepository
{
    public function createProduct(array $data): bool
    {
        try {
            Product::create($data);
            return true;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }
    }

    public function updateProduct(array $data): bool
    {
        try {
            Product::where('code', '=', $data['code'])
                ->update($data);
            return true;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }
    }

    public function deleteProduct(string $code): bool
    {
        try {
            Product::where('code', '=', $code)
                ->update(['status' => 'trash']);
            return true;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }
    }

    public function findProductByCode(string $code): array
    {
        try {
            return Product::where('code', '=', $code)
                ->first()->toArray();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return [];
        }
    }

    public function getAllProducts(): array|LengthAwarePaginator
    {
        try {
            return Product::orderBy('id', 'DESC')
                ->paginate(10);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return [];
        }
    }
}
