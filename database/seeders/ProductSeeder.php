<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Kateqoriyalar slug-a görə alınır
        $categories = Category::pluck('id', 'slug');

        $products = [
            [
                'slug' => 'brown-bread',
                'image' => 'products/brown-bread.png',
                'categories' => ['agriculture'],
                'translations' => [
                    'az' => [
                        'title' => 'Qəhvəyi Çörək',
                        'description' => 'Təbii və sağlam kənd təsərrüfatı məhsulu.',
                    ],
                    'en' => [
                        'title' => 'Brown Bread',
                        'description' => 'Natural and healthy agricultural product.',
                    ],
                    'ru' => [
                        'title' => 'Коричневый хлеб',
                        'description' => 'Натуральный и полезный сельскохозяйственный продукт.',
                    ],
                ],
            ],
            [
                'slug' => 'office-table',
                'image' => 'products/office-table.png',
                'categories' => ['office'],
                'translations' => [
                    'az' => [
                        'title' => 'Ofis Masası',
                        'description' => 'Müasir dizaynlı və funksional ofis masası.',
                    ],
                    'en' => [
                        'title' => 'Office Table',
                        'description' => 'Modern and functional office desk.',
                    ],
                    'ru' => [
                        'title' => 'Офисный стол',
                        'description' => 'Современный и функциональный офисный стол.',
                    ],
                ],
            ],
        ];

        foreach ($products as $data) {

            // Product
            $product = Product::create([
                'slug'      => $data['slug'],
                'image'     => $data['image'],
                'is_active' => true,
            ]);

            // Product Translations
            foreach ($data['translations'] as $locale => $trans) {
                ProductTranslation::create([
                    'product_id' => $product->id,
                    'locale'     => $locale,
                    'title'      => $trans['title'],
                    'description'=> $trans['description'],
                ]);
            }

            // Category attach (pivot)
            $categoryIds = collect($data['categories'])
                ->map(fn ($slug) => $categories[$slug] ?? null)
                ->filter()
                ->toArray();

            $product->categories()->attach($categoryIds);
        }
    }
}
