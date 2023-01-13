<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate Tag
        Tag::truncate();
        // id: 1
        Tag::create([
            'name' => 'Html',
            'slug' => Str::slug('Html')
        ]);
        // id: 2
        Tag::create([
            'name' => 'Python',
            'slug' => Str::slug('Python')
        ]);
        // id: 3
        Tag::create([
            'name' => 'English Premier League',
            'slug' => Str::slug('English Premier League')
        ]);
        // id: 4
        Tag::create([
            'name' => 'Arsenal',
            'slug' => Str::slug('Arsenal')
        ]);
    }
}
