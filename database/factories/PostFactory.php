<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::class;
        return array(
            'title' => $faker->words(3, true),
            'description' => $faker->paragraphs(4, true),
            'content' => $faker->text(100),
            'category_id' => $faker->numberBetween(1, 3),
            'thumbnail' => $faker->imageUrl(),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        );
    }
}
