<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return array (
            'code' => $this->faker->numberBetween(11111111,99999999),
            'status' => $this->getStatus(),
            'imported_t' =>  (new \DateTime('2020-02-07T16:00:00Z'))->format('Y-m-d H:i:s'),
            'url' => 'https://world.openfoodfacts.org/product/' . $this->faker->numberBetween(11111111,99999999),
            'creator' => $this->faker->name,
            'last_modified_t' => (new \DateTime('@1572265837'))->format('Y-m-d H:i:s'),
            'product_name' => $this->faker->name,
            'quantity' => $this->faker->numberBetween(100, 900) . ' g (6 x 2 u.)',
            'brands' => $this->faker->company,
            'categories' => $this->faker->realText,
            'labels' => $this->faker->realText,
            'cities' => $this->faker->city,
            'purchase_places' => $this->faker->country,
            'stores' => $this->faker->company,
            'ingredients_text' => $this->faker->realText,
            'traces' => $this->faker->realText,
            'serving_size' => $this->faker->realText,
            'serving_quantity' => $this->faker->randomFloat(),
            'nutriscore_score' => $this->faker->numberBetween(0, 100),
            'nutriscore_grade' => 'd',
            'main_category' => 'en:madeleines',
            'image_url' => $this->faker->imageUrl,
        );
    }

    private function getStatus(): string
    {
        return match (rand(0,2)) {
            0 => 'published',
            1 => 'trash',
            2 => 'draft'
        };
    }
}
