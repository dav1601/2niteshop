<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class PreOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = Products::select('id')->where('stock', '!=', 1)->inRandomOrder()->limit(1)->first()->id;
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->numerify('0' . rand(8, 9) . '########'),
            'products_id' => $id
        ];
    }
}
