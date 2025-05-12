<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Veichles'],
            ['name' => 'RealState'],
            ['name' => 'Jobs'],
            ['name' => 'Technology'],
            ['name' => 'Fashion'],
            ['name' => 'Garden'],
            ['name' => 'Sports'],
            ['name' => 'Pets'],
            ['name' => 'Services'],
            ['name' => 'Others'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
