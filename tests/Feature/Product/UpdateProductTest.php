<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use Tests\TestCase;

class UpdateProductTest extends TestCase
{
    public function test_try_to_update_a_product(): void
    {
        $product = Product::factory()->create();
        $productUpdate = Product::factory()->make()->toArray();
        $response = $this->putJson(route('product-update', ['code' => $product['code']]),
            [
                "status" => $productUpdate['status'],
                "url" => $productUpdate['url'],
                "imported_t" => $productUpdate['imported_t'],
                "creator" => $productUpdate['creator'],
                "product_name" => $productUpdate['product_name'],
                "quantity" => $productUpdate['quantity'],
                "categories" => $productUpdate['categories'] ,
                "labels" => $productUpdate['labels'] ,
                "brands" => $productUpdate['brands'] ,
                "cities" => $productUpdate['cities'] ,
                "purchase_places" => $productUpdate['purchase_places'] ,
                "stores" => $productUpdate['stores'] ,
                "ingredients_text" => $productUpdate['ingredients_text'] ,
                "traces" => $productUpdate['traces'] ,
                "serving_size" => $productUpdate['serving_size'] ,
                "serving_quantity" => $productUpdate['serving_quantity'] ,
                "nutriscore_score" => $productUpdate['nutriscore_score'] ,
                "nutriscore_grade" => $productUpdate['nutriscore_grade'] ,
                "main_category" => $productUpdate['main_category'] ,
                "image_url" => $productUpdate['image_url'] ,
                "last_modified_t" => $productUpdate['last_modified_t']
            ],
            ['x-api-token' => config('services.auth.api_token')]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('products', [
            'code' => $product['code'],
            'product_name' => $productUpdate['product_name']
        ]);
    }
}
