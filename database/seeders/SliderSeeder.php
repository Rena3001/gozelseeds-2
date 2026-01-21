<?php

namespace Database\Seeders;

use App\Models\Slider;
use App\Models\SliderTranslation;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            [
                'image' => 'sliders/slider-1.jpg',
                'order' => 1,
                'translations' => [
                    'az' => [
                        'tagline' => 'Təbii məhsullar istehsal edirik',
                        'title' => 'Kənd Təsərrüfatına <br> Xoş Gəlmisiniz',
                        'text' => 'Yüksək keyfiyyətli və təbii kənd təsərrüfatı məhsulları.',
                    ],
                    'en' => [
                        'tagline' => 'We’re producing natural goods',
                        'title' => 'Welcome to <br> Agriculture Farm',
                        'text' => 'High quality and natural agriculture products.',
                    ],
                    'ru' => [
                        'tagline' => 'Мы производим натуральные продукты',
                        'title' => 'Добро пожаловать <br> в Агро Ферму',
                        'text' => 'Качественные и натуральные сельхоз продукты.',
                    ],
                ],
            ],

            [
                'image' => 'sliders/slider-2.jpg',
                'order' => 2,
                'translations' => [
                    'az' => [
                        'tagline' => 'Sağlam məhsullar',
                        'title' => 'Təbii və Etibarlı <br> Məhsullar',
                        'text' => 'Torpaqdan süfrənizə qədər keyfiyyət.',
                    ],
                    'en' => [
                        'tagline' => 'Healthy products',
                        'title' => 'Natural & Trusted <br> Products',
                        'text' => 'Quality from the soil to your table.',
                    ],
                    'ru' => [
                        'tagline' => 'Здоровые продукты',
                        'title' => 'Натуральные и <br> Надежные продукты',
                        'text' => 'Качество от земли до стола.',
                    ],
                ],
            ],

            [
                'image' => 'sliders/slider-3.jpg',
                'order' => 3,
                'translations' => [
                    'az' => [
                        'tagline' => 'Fermer dəstəyi',
                        'title' => 'Fermerlər üçün <br> Ən yaxşı seçim',
                        'text' => 'Yerəl istehsalı dəstəkləyirik.',
                    ],
                    'en' => [
                        'tagline' => 'Farmer support',
                        'title' => 'Best Choice <br> For Farmers',
                        'text' => 'We support local production.',
                    ],
                    'ru' => [
                        'tagline' => 'Поддержка фермеров',
                        'title' => 'Лучший выбор <br> для фермеров',
                        'text' => 'Мы поддерживаем местное производство.',
                    ],
                ],
            ],
        ];

        foreach ($sliders as $item) {

            $slider = Slider::create([
                'image' => $item['image'],
                'order' => $item['order'],
                'is_active' => true,
            ]);

            foreach ($item['translations'] as $locale => $translation) {
                SliderTranslation::create([
                    'slider_id' => $slider->id,
                    'locale' => $locale,
                    'tagline' => $translation['tagline'],
                    'title' => $translation['title'],
                    'text' => $translation['text'],
                ]);
            }
        }
    }
}
