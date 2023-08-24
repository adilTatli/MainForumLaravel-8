<?php

namespace Database\Factories;

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Category::class;

    public function definition()
    {
        $faker = Faker::create();
        return [
            'title' => $faker->word(),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        ];
    }
}
