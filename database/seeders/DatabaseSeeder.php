<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //This calls the seeder classes and runs them
        $this->call([
            MediaSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            CommentSeeder::class
        ]);
    }
}
