<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate Post
        Post::truncate();

        //Factory Generate 10 Posts
        $posts = Post::factory()->count(10)->create();

        foreach ($posts as $post) {
            $post->media()->create([
                'title' => 'post image/w0lg2wjzygjok6dyhoyh',
                'slug' => Str::slug('post-imagew0lg2wjzygjok6dyhoyh'),
                'url' => 'https://res.cloudinary.com/dlfu3ltay/image/upload/v1673087568/post%20image/w0lg2wjzygjok6dyhoyh.png',
                'path' => 'https://res.cloudinary.com/dlfu3ltay/image/upload/v1673087568/post%20image/w0lg2wjzygjok6dyhoyh.png',
                'description' => 'image',
                'size' => 373406,
                'mimeType' => 'image',
                'user_id' => 1
            ]);
            $max = random_int(1,6);
            $numbers = range(1, $max);
            shuffle($numbers);
            $maxSlice = random_int(1,3);
            $random_number_array = array_slice($numbers ,0,$maxSlice);
            $post->tags()->attach($random_number_array);
        }
    }
}
