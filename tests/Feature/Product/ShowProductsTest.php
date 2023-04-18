<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use Tests\TestCase;

class ShowProductsTest extends TestCase
{
    public function test_show_all_products(): void
    {
        Product::factory(15)->create();
        $response = $this->getJson(route('products-show'),
            ['x-api-token' => config('services.auth.api_token')]
        );

        $response->assertStatus(200);
    }
}
