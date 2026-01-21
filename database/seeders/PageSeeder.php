<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\PageTranslation;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | ABOUT PAGE (BASE)
        |--------------------------------------------------------------------------
        */
        $aboutPage = Page::create([
            'slug'       => 'about',
            'header_bg'  => 'pages/page-header-bg.jpg',
            'image_main' => 'pages/about-main.jpg',
            'image_icon' => 'pages/about-icon.png',
            'is_active'  => true,
        ]);

        /*
        |--------------------------------------------------------------------------
        | ABOUT PAGE TRANSLATIONS (AZ / EN / RU)
        |--------------------------------------------------------------------------
        */
        PageTranslation::insert([
            // AZ
            [
                'page_id'          => $aboutPage->id,
                'locale'           => 'az',
                'tagline'          => 'Bizi daha yaxından tanıyın',
                'content_title'    => 'Biz Yüksək Keyfiyyətli Məhsullar Təqdim Edirik',
                'subtitle'         => 'Kənd təsərrüfatı bazarında liderik',
                'description'      => 'Biz müasir texnologiyalarla istehsal olunan, sağlam və keyfiyyətli məhsulları müştərilərimizə təqdim edirik.',
                'feature_1_title'  => 'Təbii Məhsullar',
                'feature_1_text'   => 'Təbiətin özündən gələn, tam təbii məhsullar.',
                'feature_2_title'  => 'Sağlam Qidalar',
                'feature_2_text'   => 'Gündəlik istifadə üçün sağlam və faydalı qidalar.',
            ],

            // EN
            [
                'page_id'          => $aboutPage->id,
                'locale'           => 'en',
                'tagline'          => 'Get to know about us',
                'content_title'    => 'We Sell High-Quality Organic Products',
                'subtitle'         => 'We’re Leader in Agriculture Market',
                'description'      => 'We provide high-quality organic products produced with modern agricultural technologies.',
                'feature_1_title'  => 'Natural Products',
                'feature_1_text'   => 'Pure and natural products directly from nature.',
                'feature_2_title'  => 'Healthy Food',
                'feature_2_text'   => 'Healthy and nutritious food for everyday life.',
            ],

            // RU
            [
                'page_id'          => $aboutPage->id,
                'locale'           => 'ru',
                'tagline'          => 'Узнайте нас лучше',
                'content_title'    => 'Мы продаем качественные органические продукты',
                'subtitle'         => 'Мы лидеры аграрного рынка',
                'description'      => 'Мы предлагаем высококачественные органические продукты, произведенные с использованием современных технологий.',
                'feature_1_title'  => 'Натуральные продукты',
                'feature_1_text'   => 'Экологически чистые продукты от природы.',
                'feature_2_title'  => 'Здоровое питание',
                'feature_2_text'   => 'Полезные продукты для ежедневного питания.',
            ],
        ]);
    }
}
