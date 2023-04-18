<?php

namespace Domain\Product\Repositories;


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

    public function createOrUpdate(array $data): bool
    {
        $dataCollection = collect($data)
            ->only([
                'code',
                'url',
                'creator',
                'product_name',
                'quantity',
                'brands',
                'categories',
                'labels',
                'cities',
                'purchase_places',
                'stores',
                'ingredients_text',
                'traces',
                'serving_quantity',
                'nutriscore_score',
                'nutriscore_grade',
                'main_category',
                'image_url'
            ])
            ->filter(fn($product) => $product != '');

        $codeFiltered = filter_var($dataCollection['code'], FILTER_SANITIZE_NUMBER_INT);
        $dataCollection->put('code', $codeFiltered);
        try {

            Product::updateOrCreate($dataCollection->toArray());
            return true;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }
    }
}
