<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceTranslation;
use App\Models\ServiceSection;
use App\Models\ServiceSectionTranslation;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | SERVICE SECTION (TITLE PART)
        |--------------------------------------------------------------------------
        */
        $section = ServiceSection::create([
            'is_active' => true,
        ]);

        $sectionTranslations = [
            'en' => [
                'tagline' => 'What we’re doing',
                'title'   => 'Services We Offer',
            ],
            'az' => [
                'tagline' => 'Nə edirik',
                'title'   => 'Təklif etdiyimiz Xidmətlər',
            ],
            'ru' => [
                'tagline' => 'Что мы делаем',
                'title'   => 'Наши услуги',
            ],
        ];

        foreach ($sectionTranslations as $locale => $data) {
            ServiceSectionTranslation::create([
                'service_section_id' => $section->id,
                'locale'             => $locale,
                'tagline'            => $data['tagline'],
                'title'              => $data['title'],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | SERVICES ITEMS (CARDS)
        |--------------------------------------------------------------------------
        */
        $services = [
            [
                'image' => 'services/services-v1-img1.jpg',
                'icon'  => 'fa-solid fa-seedling',
                'order' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Agriculture<br>Products',
                        'text'  => 'Lorem ipsum dolor sit ametad pisicing elit sed simply do ut.',
                    ],
                    'az' => [
                        'title' => 'Kənd Təsərrüfatı<br>Məhsulları',
                        'text'  => 'Sadə və təbii kənd təsərrüfatı məhsulları təqdim edirik.',
                    ],
                    'ru' => [
                        'title' => 'Сельскохозяйственные<br>продукты',
                        'text'  => 'Мы предлагаем качественные сельскохозяйственные продукты.',
                    ],
                ],
            ],

            [
                'image' => 'services/services-v1-img2.jpg',
                'icon'  => 'fa-solid fa-wheat-awn',
                'order' => 2,
                'translations' => [
                    'en' => [
                        'title' => 'Fresh<br>Vegetables',
                        'text'  => 'Fresh vegetables directly from organic farms.',
                    ],
                    'az' => [
                        'title' => 'Təzə<br>Tərəvəzlər',
                        'text'  => 'Birbaşa fermalardan təzə tərəvəzlər.',
                    ],
                    'ru' => [
                        'title' => 'Свежие<br>овощи',
                        'text'  => 'Свежие овощи прямо с фермы.',
                    ],
                ],
            ],

            [
                'image' => 'services/services-v1-img3.jpg',
                'icon'  => 'fa-solid fa-chart-line',
                'order' => 3,
                'translations' => [
                    'en' => [
                        'title' => 'Organic<br>Products',
                        'text'  => 'Organic products grown with care and quality.',
                    ],
                    'az' => [
                        'title' => 'Orqanik<br>Məhsullar',
                        'text'  => 'Tam orqanik və sağlam məhsullar.',
                    ],
                    'ru' => [
                        'title' => 'Органические<br>продукты',
                        'text'  => 'Экологически чистые и натуральные продукты.',
                    ],
                ],
            ],

            [
                'image' => 'services/services-v1-img4.jpg',
                'icon'  => 'fa-solid fa-cheese',
                'order' => 4,
                'translations' => [
                    'en' => [
                        'title' => 'Dairy<br>Products',
                        'text'  => 'High-quality dairy products for daily use.',
                    ],
                    'az' => [
                        'title' => 'Süd<br>Məhsulları',
                        'text'  => 'Gündəlik istifadə üçün keyfiyyətli süd məhsulları.',
                    ],
                    'ru' => [
                        'title' => 'Молочные<br>продукты',
                        'text'  => 'Качественные молочные продукты.',
                    ],
                ],
            ],
        ];

        foreach ($services as $item) {
            $service = Service::create([
                'image'     => $item['image'],
                'icon'      => $item['icon'],
                'link'      => 'services-details.html',
                'order'     => $item['order'],
                'is_active' => true,
            ]);

            foreach ($item['translations'] as $locale => $data) {
                ServiceTranslation::create([
                    'service_id' => $service->id,
                    'locale'     => $locale,
                    'title'      => $data['title'],
                    'text'       => $data['text'],
                ]);
            }
        }
    }
}
