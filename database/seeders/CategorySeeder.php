<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryTranslation;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'slug' => 'agriculture',
                'translations' => [
                    'az' => 'Kənd Təsərrüfatı',
                    'en' => 'Agriculture',
                    'ru' => 'Сельское хозяйство',
                ],
            ],
            [
                'slug' => 'office',
                'translations' => [
                    'az' => 'Ofis Mebelləri',
                    'en' => 'Office Furniture',
                    'ru' => 'Офисная мебель',
                ],
            ],
            [
                'slug' => 'home',
                'translations' => [
                    'az' => 'Ev Mebelləri',
                    'en' => 'Home Furniture',
                    'ru' => 'Домашняя мебель',
                ],
            ],
        ];

        foreach ($categories as $data) {

            $category = Category::create([
                'slug' => $data['slug'],
            ]);

            foreach ($data['translations'] as $locale => $title) {
                CategoryTranslation::create([
                    'category_id' => $category->id,
                    'locale'      => $locale,
                    'title'       => $title,
                ]);
            }
        }
    }
}
