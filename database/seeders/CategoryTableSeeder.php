<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        $defaultCategories = [
            ['name' => 'Sport'],
            ['name' => 'Photography'],
            ['name' => 'Music'],
            ['name' => 'Culinary'],
            ['name' => 'Travel'],
            // Tambahkan kategori default lainnya di sini jika diperlukan
        ];

        foreach ($defaultCategories as $categoryData) {
            $slug = Str::slug($categoryData['name']); // Buat slug dari nama kategori
            $category = [
                'name' => $categoryData['name'],
                'slug' => $slug, // Isi kolom slug dengan nilai yang di-generate
            ];

            Category::create($category);
        }
    }
}

