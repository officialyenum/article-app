<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate User
        User::truncate();

        //hash password
        $hashPass = Hash::make('password');

        //Seed Admin User
        $user1 = User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Article',
            'email' => 'admin@article.com',
            'password' => $hashPass,
            'role_id' => User::ADMIN
        ]);

        //Save Avatar
        $user1->avatar()->create([
            'title' => 'post image/w0lg2wjzygjok6dyhoyh',
            'slug' => Str::slug('post-imagew0lg2wjzygjok6dyhoyh'),
            'url' => 'https://res.cloudinary.com/dlfu3ltay/image/upload/v1673087568/post%20image/w0lg2wjzygjok6dyhoyh.png',
            'path' => 'https://res.cloudinary.com/dlfu3ltay/image/upload/v1673087568/post%20image/w0lg2wjzygjok6dyhoyh.png',
            'description' => 'image',
            'size' => 373406,
            'mimeType' => 'image',
            'user_id' => $user1->id
        ]);

        //Seed Author User
        $user2 = User::factory()->create([
            'first_name' => 'Author',
            'last_name' => 'Article',
            'email' => 'author@article.com',
            'password' => $hashPass,
            'role_id' => User::AUTHOR
        ]);

        //Save Avatar
        $user2->avatar()->create([
            'title' => 'post image/w0lg2wjzygjok6dyhoyh',
            'slug' => Str::slug('post-imagew0lg2wjzygjok6dyhoyh'),
            'url' => 'https://res.cloudinary.com/dlfu3ltay/image/upload/v1673087568/post%20image/w0lg2wjzygjok6dyhoyh.png',
            'path' => 'https://res.cloudinary.com/dlfu3ltay/image/upload/v1673087568/post%20image/w0lg2wjzygjok6dyhoyh.png',
            'description' => 'image',
            'size' => 373406,
            'mimeType' => 'image',
            'user_id' => $user2->id
        ]);

        //Seed Author User
        $user3 = User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test.user@article.com',
            'password' => $hashPass,
            'role_id' => User::DEFAULT
        ]);

        //Save Avatar
        $user3->avatar()->create([
            'title' => 'post image/w0lg2wjzygjok6dyhoyh',
            'slug' => Str::slug('post-imagew0lg2wjzygjok6dyhoyh'),
            'url' => 'https://res.cloudinary.com/dlfu3ltay/image/upload/v1673087568/post%20image/w0lg2wjzygjok6dyhoyh.png',
            'path' => 'https://res.cloudinary.com/dlfu3ltay/image/upload/v1673087568/post%20image/w0lg2wjzygjok6dyhoyh.png',
            'description' => 'image',
            'size' => 373406,
            'mimeType' => 'image',
            'user_id' => $user3->id
        ]);

        //Create 5 Default Users with factory
        $users = User::factory()->count(5)->create();

        //Save Avatar
        foreach ($users as $user) {
            $user->avatar()->create([
                'title' => 'post image/w0lg2wjzygjok6dyhoyh',
                'slug' => Str::slug('post-imagew0lg2wjzygjok6dyhoyh'),
                'url' => 'https://res.cloudinary.com/dlfu3ltay/image/upload/v1673087568/post%20image/w0lg2wjzygjok6dyhoyh.png',
                'path' => 'https://res.cloudinary.com/dlfu3ltay/image/upload/v1673087568/post%20image/w0lg2wjzygjok6dyhoyh.png',
                'description' => 'image',
                'size' => 373406,
                'mimeType' => 'image',
                'user_id' => $user->id
            ]);
        }
    }
}
