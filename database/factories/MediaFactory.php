<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => 'post image/w0lg2wjzygjok6dyhoyh',
            'slug' => Str::slug('post-imagew0lg2wjzygjok6dyhoyh'),
            'url' => 'https://res.cloudinary.com/dlfu3ltay/image/upload/v1673087568/post%20image/w0lg2wjzygjok6dyhoyh.png',
            'path' => 'https://res.cloudinary.com/dlfu3ltay/image/upload/v1673087568/post%20image/w0lg2wjzygjok6dyhoyh.png',
            'description' => 'image',
            'size' => 373406,
            'mimeType' => 'image'
        ];
    }
}
