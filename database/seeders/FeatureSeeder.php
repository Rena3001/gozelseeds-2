<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\FeatureTranslation;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            [
                'image' => 'features/features-v1-img1.jpg',
                'background_image' => null,
                'link' => 'services-details.html',
                'button_link' => null,
                'has_button' => false,
                'order' => 1,
                'translations' => [
                    'en' => 'Best Quality <br> Standards',
                    'az' => 'Ən Yüksək <br> Keyfiyyət Standartları',
                    'ru' => 'Лучшие <br> Стандарты Качества',
                ],
            ],
            [
                'image' => 'features/features-v1-img2.jpg',
                'background_image' => null,
                'link' => 'services-details.html',
                'button_link' => null,
                'has_button' => false,
                'order' => 2,
                'translations' => [
                    'en' => 'Smart Organic <br> Services',
                    'az' => 'Ağıllı Orqanik <br> Xidmətlər',
                    'ru' => 'Умные <br> Органические Услуги',
                ],
            ],
            [
                'image' => 'features/features-v1-img3.jpg',
                'background_image' => 'backgrounds/features-one-single-bg.png',
                'link' => null,
                'button_link' => '#',
                'has_button' => true,
                'order' => 3,
                'translations' => [
                    'en' => 'Agriculture <br> Products',
                    'az' => 'Kənd Təsərrüfatı <br> Məhsulları',
                    'ru' => 'Сельскохозяйственные <br> Продукты',
                ],
            ],
        ];

        foreach ($features as $item) {

            $feature = Feature::create([
                'image' => $item['image'],
                'background_image' => $item['background_image'],
                'link' => $item['link'],
                'button_link' => $item['button_link'],
                'has_button' => $item['has_button'],
                'order' => $item['order'],
                'is_active' => true,
            ]);

            foreach ($item['translations'] as $locale => $title) {
                FeatureTranslation::create([
                    'feature_id' => $feature->id,
                    'locale' => $locale,
                    'title' => $title,
                    'button_text' => $item['has_button']
                        ? ($locale === 'az' ? 'Ətraflı Bax'
                            : ($locale === 'ru' ? 'Подробнее' : 'Discover More'))
                        : null,
                ]);
            }
        }
    }
}
