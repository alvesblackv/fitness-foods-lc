<?php

namespace Controllers\Product;

use App\Models\Product;
use Tests\TestCase;

class ShowProductTest extends TestCase
{

    public function test_try_to_retrieve_a_product(): void
    {
        $product = Product::factory()->create();
        $response = $this->getJson(route('product-show', ['code' => $product->code]));

        $response->assertOk();
        $this->assertDatabaseHas('products', [
            'code' => $product->code,
            'product_name' => $product->product_name
        ]);
    }

    public function test_try_to_request_a_code_invalid()
    {
        $product = Product::factory()->make();
        $response = $this->getJson(route('product-show', ['code' => $product->code]));

        $response->assertUnprocessable();
    }
}
