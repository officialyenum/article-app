<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate Category
        Category::truncate();
        // id: 1
        Category::factory()->create([
            'name' => 'News',
            'slug' => Str::slug('News')
        ]);
        // id: 2
        Category::factory()->create([
            'name' => 'Entertainment',
            'slug' => Str::slug('Entertainment')
        ]);
        // id: 3
        Category::factory()->create([
            'name' => 'Technology',
            'slug' => Str::slug('Technology')
        ]);
        // id: 4
        Category::factory()->create([
            'name' => 'Sports',
            'slug' => Str::slug('Sports')
        ]);

        //Generate 2 extra Factories
        Category::factory()->count(2)->create();
    }
}
