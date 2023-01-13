<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $rand = random_int(10,20);
        $randPost = random_int(1,10);
        $randUser = random_int(3,6);
        $content = fake()->sentence($rand);
        return [
            'content' => $content,
            'post_id' => $randPost,
            'user_id' => $randUser,
        ];
    }
}
