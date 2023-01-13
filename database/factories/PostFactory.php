<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomNos = random_int(2,4);
        $randomWords = random_int(50,100);
        $title = fake()->sentence($randomNos);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => fake()->sentence($randomWords),
            'category_id' => random_int(1,6),
            'user_id' => random_int(1,2)
        ];
    }
}
