<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use Tests\TestCase;

class ShowProductsTest extends TestCase
{
    public function test_show_all_products(): void
    {
        Product::factory(15)->create();
        $response = $this->getJson(route('product-show'));

        $response->assertStatus(200);
    }
}
