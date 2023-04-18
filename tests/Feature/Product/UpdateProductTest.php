<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use Tests\TestCase;

class UpdateProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_try_to_update_a_product(): void
    {
        $product = Product::factory()->create();
        $productUpdate = Product::factory()->make();
        $response = $this->putJson(route('product-update', ['code' => $product['code']], $productUpdate->toJson()));

        $response->assertStatus(200);
        $this->assertDatabaseHas('products', [
            'code' => $product['code'],
            'product_name' => $productUpdate['product_name']
        ]);
    }
}
