<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Post::class;

    public function definition()
    {
        $faker = Faker::create();
        return array(
            'title' => $faker->words(3, true),
            'description' => $faker->paragraphs(4, true),
            'content' => $faker->text(100),
            'category_id' => $faker->numberBetween(1, 5),
            'user_id' => User::factory(),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        );
    }
}
