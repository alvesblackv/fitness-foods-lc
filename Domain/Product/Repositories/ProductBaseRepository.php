<?php

namespace Domain\Product\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductBaseRepository
{
    public function createProduct(array $data): bool;

    public function updateProduct(array $data): bool;

    public function deleteProduct(string $code): bool;

    public function findProductByCode(string $code): array;

    public function getAllProducts(): array|LengthAwarePaginator;

    public function createOrUpdate(array $data): bool;
}
