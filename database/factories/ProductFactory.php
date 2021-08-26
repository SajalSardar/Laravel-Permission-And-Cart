<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->text($maxNbchars = 20);
        return [
            "user_id"          => 1,
            'category_id'      => $this->faker->numberBetween(1, 10),
            'title'            => $title,
            'slug'             => Str::slug($title),
            'shot_description' => $this->faker->text(50),
            'description'      => $this->faker->text(500),
            'regular_price'    => $this->faker->numberBetween(50, 500),
            'sell_price'       => $this->faker->numberBetween(40, 400),
            'sku'              => 'EC' . $this->faker->unique()->numberBetween(100, 400),
            'quantity'         => $this->faker->numberBetween(1, 100),
            'image'            => $this->faker->imageUrl($width = 250, $height = 250),
            'stock_status'     => 'instock',
        ];
    }
}
